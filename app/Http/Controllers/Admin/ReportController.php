<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceDetail;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Halaman Laporan
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        // Ambil semua kelas untuk pilihan filter laporan
        $classes = SchoolClass::orderBy('name')->get();

        return view('admin.reports.index', compact('classes'));
    }

    /*
    |--------------------------------------------------------------------------
    | Generate Laporan
    |--------------------------------------------------------------------------
    */

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'date_from' => [
                'required',
                'date',
            ],

            'date_to' => [
                'required',
                'date',
                'after_or_equal:date_from',
            ],

            'class_id' => [
                'nullable',
                'exists:classes,id',
            ],

            'format' => [
                'required',
                'in:pdf,excel',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Ambil Nama Kelas
        |--------------------------------------------------------------------------
        */

        $className = 'Semua Kelas';

        if (!empty($validated['class_id'])) {
            $selectedClass = SchoolClass::find($validated['class_id']);

            if ($selectedClass) {
                $className = $selectedClass->name;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Query Data Absensi
        |--------------------------------------------------------------------------
        */

        $details = AttendanceDetail::with([
            'student.schoolClass',
            'session.teachingSchedule.subject',
            'session.teachingSchedule.teacher',
        ])
            ->whereHas('session', function ($q) use ($validated) {
                $q->whereBetween('date', [
                    $validated['date_from'],
                    $validated['date_to'],
                ]);
            })

            /*
            |--------------------------------------------------------------------------
            | FILTER KELAS
            |--------------------------------------------------------------------------
            */

            ->when(
                !empty($validated['class_id']),
                function ($q) use ($validated) {
                    $q->whereHas('student', function ($studentQuery) use ($validated) {
                        $studentQuery->where(
                            'class_id',
                            $validated['class_id']
                        );
                    });
                }
            )

            ->orderBy('id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Tambahkan Nama Kelas ke Data Range
        |--------------------------------------------------------------------------
        */

        $validated['class_name'] = $className;

        /*
        |--------------------------------------------------------------------------
        | Generate Excel
        |--------------------------------------------------------------------------
        */

        if ($validated['format'] === 'excel') {
            return $this->generateExcel(
                $details,
                $validated
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Generate PDF
        |--------------------------------------------------------------------------
        */

        return $this->generatePdf(
            $details,
            $validated
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT EXCEL
    |--------------------------------------------------------------------------
    */

    private function generateExcel($details, array $range)
    {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('Laporan Absensi');

        /*
        |--------------------------------------------------------------------------
        | PAGE SETUP
        |--------------------------------------------------------------------------
        */

        $sheet->getPageSetup()
            ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

        $sheet->getPageSetup()
            ->setPaperSize(PageSetup::PAPERSIZE_A4);

        $sheet->getPageSetup()
            ->setFitToWidth(1);

        $sheet->getPageSetup()
            ->setFitToHeight(0);

        $sheet->getPageMargins()
            ->setTop(0.5)
            ->setRight(0.4)
            ->setLeft(0.4)
            ->setBottom(0.5);

        /*
        |--------------------------------------------------------------------------
        | LOGO SEKOLAH
        |--------------------------------------------------------------------------
        */

        $logoPath = public_path(
            'images/logo-sekolah.png'
        );

        if (file_exists($logoPath)) {
            $drawing = new Drawing();

            $drawing->setName('Logo MA Az-Zahra');
            $drawing->setDescription('Logo MA Az-Zahra');
            $drawing->setPath($logoPath);
            $drawing->setHeight(90);
            $drawing->setCoordinates('A1');
            $drawing->setOffsetX(8);
            $drawing->setOffsetY(5);
            $drawing->setWorksheet($sheet);
        }

        /*
        |--------------------------------------------------------------------------
        | HEADER SEKOLAH
        |--------------------------------------------------------------------------
        */

        $sheet->mergeCells('B1:I1');

        $sheet->setCellValue(
            'B1',
            'MA AZ-ZAHRA PARONGPONG'
        );

        $sheet->getStyle('B1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 18,
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getRowDimension(1)->setRowHeight(35);

        /*
        |--------------------------------------------------------------------------
        | JUDUL LAPORAN
        |--------------------------------------------------------------------------
        */

        $sheet->mergeCells('B2:I2');

        $sheet->setCellValue(
            'B2',
            'LAPORAN ABSENSI SISWA'
        );

        $sheet->getStyle('B2')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | KELAS
        |--------------------------------------------------------------------------
        */

        $sheet->mergeCells('A4:I4');

        $sheet->setCellValue(
            'A4',
            'Kelas: ' . $range['class_name']
        );

        $sheet->getStyle('A4')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 11,
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | PERIODE
        |--------------------------------------------------------------------------
        */

        $sheet->mergeCells('A5:I5');

        $sheet->setCellValue(
            'A5',
            'Periode: ' .
            date('d/m/Y', strtotime($range['date_from'])) .
            ' s.d. ' .
            date('d/m/Y', strtotime($range['date_to']))
        );

        $sheet->getStyle('A5')->applyFromArray([
            'font' => [
                'size' => 11,
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | TANGGAL CETAK
        |--------------------------------------------------------------------------
        */

        $sheet->mergeCells('A6:I6');

        $sheet->setCellValue(
            'A6',
            'Dicetak: ' . now()->format('d/m/Y H:i')
        );

        $sheet->getStyle('A6')->applyFromArray([
            'font' => [
                'italic' => true,
                'size' => 10,
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | REKAP
        |--------------------------------------------------------------------------
        */

        $rekap = [
            'HADIR' => 0,
            'IZIN' => 0,
            'SAKIT' => 0,
            'ALFA' => 0,
        ];

        foreach ($details as $detail) {
            if (isset($rekap[$detail->status])) {
                $rekap[$detail->status]++;
            }
        }

        $sheet->mergeCells('A8:I8');

        $sheet->setCellValue(
            'A8',
            'REKAP ABSENSI'
        );

        $sheet->getStyle('A8')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | REKAP STATUS
        |--------------------------------------------------------------------------
        */

        $rekapHeaders = [
            'A9' => 'HADIR',
            'C9' => 'IZIN',
            'E9' => 'SAKIT',
            'G9' => 'ALFA',
        ];

        foreach ($rekapHeaders as $cell => $value) {
            $sheet->setCellValue(
                $cell,
                $value
            );

            $sheet->getStyle($cell)->applyFromArray([
                'font' => [
                    'bold' => true,
                ],

                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ],

                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ]);
        }

        $rekapValues = [
            'A10' => $rekap['HADIR'],
            'C10' => $rekap['IZIN'],
            'E10' => $rekap['SAKIT'],
            'G10' => $rekap['ALFA'],
        ];

        foreach ($rekapValues as $cell => $value) {
            $sheet->setCellValue(
                $cell,
                $value
            );

            $sheet->getStyle($cell)->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 14,
                ],

                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ],

                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | HEADER TABEL
        |--------------------------------------------------------------------------
        */

        $headerRow = 12;

        $headers = [
            "A{$headerRow}" => 'No',
            "B{$headerRow}" => 'Tanggal',
            "C{$headerRow}" => 'Kelas',
            "D{$headerRow}" => 'Mata Pelajaran',
            "E{$headerRow}" => 'Guru',
            "F{$headerRow}" => 'NIS',
            "G{$headerRow}" => 'Nama Siswa',
            "H{$headerRow}" => 'Status',
            "I{$headerRow}" => 'Keterangan',
        ];

        foreach ($headers as $cell => $value) {
            $sheet->setCellValue(
                $cell,
                $value
            );
        }

        /*
        |--------------------------------------------------------------------------
        | STYLE HEADER
        |--------------------------------------------------------------------------
        */

        $sheet->getStyle("A{$headerRow}:I{$headerRow}")
            ->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 11,
                ],

                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                    'wrapText' => true,
                ],

                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],

                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => 'D9EAF7',
                    ],
                ],
            ]);

        $sheet->getRowDimension($headerRow)->setRowHeight(30);

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $row = 13;

        $no = 1;

        foreach ($details as $detail) {
            $tanggal = optional(
                $detail->session
            )->date?->format('d/m/Y');

            $kelas = optional(
                $detail->student->schoolClass
            )->name ?? '-';

            $mapel = optional(
                $detail->session?->teachingSchedule?->subject
            )->name ?? '-';

            $guru = optional(
                $detail->session?->teachingSchedule?->teacher
            )->name ?? '-';

            $nis = $detail->student->nis ?? '-';

            $nama = $detail->student->name ?? '-';

            $status = $detail->status;

            $keterangan = $detail->keterangan ?? '-';

            $sheet->setCellValue(
                "A{$row}",
                $no
            );

            $sheet->setCellValue(
                "B{$row}",
                $tanggal ?? '-'
            );

            $sheet->setCellValue(
                "C{$row}",
                $kelas
            );

            $sheet->setCellValue(
                "D{$row}",
                $mapel
            );

            $sheet->setCellValue(
                "E{$row}",
                $guru
            );

            $sheet->setCellValueExplicit(
                "F{$row}",
                $nis,
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
            );

            $sheet->setCellValue(
                "G{$row}",
                $nama
            );

            $sheet->setCellValue(
                "H{$row}",
                $status
            );

            $sheet->setCellValue(
                "I{$row}",
                $keterangan
            );

            /*
            |--------------------------------------------------------------------------
            | BORDER DATA
            |--------------------------------------------------------------------------
            */

            $sheet->getStyle(
                "A{$row}:I{$row}"
            )->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                            ],
                        ],

                        'alignment' => [
                            'vertical' => Alignment::VERTICAL_CENTER,
                        ],
                    ]);

            /*
            |--------------------------------------------------------------------------
            | CENTER
            |--------------------------------------------------------------------------
            */

            $sheet->getStyle(
                "A{$row}:F{$row}"
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );

            $sheet->getStyle(
                "H{$row}"
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $statusCell = "H{$row}";

            $statusStyle = [];

            if ($status === 'HADIR') {
                $statusStyle = [
                    'font' => [
                        'bold' => true,
                    ],

                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => [
                            'rgb' => 'E8F5E9',
                        ],
                    ],
                ];
            } elseif ($status === 'IZIN') {
                $statusStyle = [
                    'font' => [
                        'bold' => true,
                    ],

                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => [
                            'rgb' => 'FFF8E1',
                        ],
                    ],
                ];
            } elseif ($status === 'SAKIT') {
                $statusStyle = [
                    'font' => [
                        'bold' => true,
                    ],

                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => [
                            'rgb' => 'E3F2FD',
                        ],
                    ],
                ];
            } elseif ($status === 'ALFA') {
                $statusStyle = [
                    'font' => [
                        'bold' => true,
                    ],

                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => [
                            'rgb' => 'FFEBEE',
                        ],
                    ],
                ];
            }

            if (!empty($statusStyle)) {
                $sheet->getStyle(
                    $statusCell
                )->applyFromArray(
                        $statusStyle
                    );
            }

            $row++;

            $no++;
        }

        /*
        |--------------------------------------------------------------------------
        | COLUMN WIDTH
        |--------------------------------------------------------------------------
        */

        $sheet->getColumnDimension('A')->setWidth(6);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(14);
        $sheet->getColumnDimension('D')->setWidth(24);
        $sheet->getColumnDimension('E')->setWidth(24);
        $sheet->getColumnDimension('F')->setWidth(14);
        $sheet->getColumnDimension('G')->setWidth(28);
        $sheet->getColumnDimension('H')->setWidth(12);
        $sheet->getColumnDimension('I')->setWidth(30);

        /*
        |--------------------------------------------------------------------------
        | WRAP TEXT
        |--------------------------------------------------------------------------
        */

        if ($row > 13) {
            $sheet->getStyle(
                "A13:I" . ($row - 1)
            )->getAlignment()
                ->setWrapText(true);
        }

        /*
        |--------------------------------------------------------------------------
        | FREEZE HEADER
        |--------------------------------------------------------------------------
        */

        $sheet->freezePane('A13');

        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        if ($row > 13) {
            $sheet->setAutoFilter(
                "A12:I" . ($row - 1)
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PRINT AREA
        |--------------------------------------------------------------------------
        */

        $sheet->getPageSetup()
            ->setPrintArea(
                "A1:I" . ($row + 1)
            );

        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        $sheet->getHeaderFooter()
            ->setOddFooter(
                '&CMA Az-Zahra - Sistem Informasi Absensi'
            );

        /*
        |--------------------------------------------------------------------------
        | NAMA FILE
        |--------------------------------------------------------------------------
        */

        $classSlug = $range['class_name'] === 'Semua Kelas'
            ? 'Semua-Kelas'
            : \Illuminate\Support\Str::slug($range['class_name']);

        $filename =
            'Laporan-Absensi-' .
            $classSlug .
            '-' .
            $range['date_from'] .
            '-sd-' .
            $range['date_to'] .
            '.xlsx';

        /*
        |--------------------------------------------------------------------------
        | DOWNLOAD
        |--------------------------------------------------------------------------
        */

        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(
            function () use ($writer) {
                $writer->save('php://output');
            },
            $filename,
            [
                'Content-Type' =>
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',

                'Cache-Control' =>
                    'max-age=0',
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PRINT / PDF
    |--------------------------------------------------------------------------
    */

    private function generatePdf($details, array $range)
    {
        return view('admin.reports.print', [
            'details' => $details,
            'range' => $range,
        ]);
    }
}