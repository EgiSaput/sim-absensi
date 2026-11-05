@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<style>
    /* =====================================================
       DASHBOARD BASE
    ===================================================== */

    .dashboard {
        width: 100%;
        max-width: 100%;
        color: #1e293b;
    }

    /* =====================================================
       WELCOME CARD
    ===================================================== */

    .welcome-card {
        position: relative;
        overflow: hidden;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;

        padding: 26px 28px;
        margin-bottom: 22px;

        border-radius: 18px;

        color: #fff;

        background:
            linear-gradient(
                135deg,
                #0788c9 0%,
                #087bb5 55%,
                #06699d 100%
            );

        box-shadow:
            0 10px 30px rgba(7, 136, 201, .16);
    }

    .welcome-card::before {
        content: "";
        position: absolute;

        width: 180px;
        height: 180px;

        right: -65px;
        top: -80px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .07);
    }

    .welcome-card::after {
        content: "";
        position: absolute;

        width: 120px;
        height: 120px;

        right: 80px;
        bottom: -85px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .05);
    }

    .welcome-content {
        position: relative;
        z-index: 2;
    }

    .welcome-title {
        margin: 0 0 7px;

        font-size: 21px;
        font-weight: 700;
        letter-spacing: -.3px;
    }

    .welcome-text {
        max-width: 650px;

        margin: 0;

        font-size: 11px;
        line-height: 1.7;

        color: rgba(255, 255, 255, .86);
    }

    .welcome-icon {
        position: relative;
        z-index: 2;

        width: 64px;
        height: 64px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 16px;

        background: rgba(255, 255, 255, .13);
        border: 1px solid rgba(255, 255, 255, .15);

        font-size: 25px;

        backdrop-filter: blur(5px);
    }

    /* =====================================================
       RESET PASSWORD ALERT
    ===================================================== */

    .reset-alert {
        display: flex;
        align-items: center;
        gap: 13px;

        padding: 14px 16px;
        margin-bottom: 22px;

        background: #fffaf5;

        border: 1px solid #fed7aa;
        border-radius: 14px;

        box-shadow: 0 4px 15px rgba(234, 88, 12, .04);
    }

    .reset-alert-icon {
        width: 42px;
        height: 42px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: #ffedd5;
        color: #ea580c;

        font-size: 15px;
    }

    .reset-alert-content {
        flex: 1;
        min-width: 0;
    }

    .reset-alert-title {
        margin: 0;

        font-size: 12px;
        font-weight: 700;

        color: #9a3412;
    }

    .reset-alert-text {
        margin: 3px 0 0;

        font-size: 10px;
        line-height: 1.5;

        color: #c2410c;
    }

    .reset-alert-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        padding: 9px 13px;

        flex-shrink: 0;

        border-radius: 9px;

        background: #ea580c;
        color: #fff;

        font-size: 10px;
        font-weight: 600;

        text-decoration: none;

        transition:
            transform .2s ease,
            background .2s ease,
            box-shadow .2s ease;
    }

    .reset-alert-button:hover {
        background: #c2410c;
        color: #fff;

        transform: translateY(-1px);

        box-shadow: 0 5px 14px rgba(234, 88, 12, .18);
    }

    /* =====================================================
       STATISTICS
    ===================================================== */

    .stats-grid {
        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 15px;

        margin-bottom: 22px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;

        display: flex;
        align-items: center;
        gap: 13px;

        padding: 17px;

        min-width: 0;

        background: #fff;

        border: 1px solid #e8eef4;
        border-radius: 14px;

        box-shadow:
            0 5px 18px rgba(15, 23, 42, .035);

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);

        border-color: #d7eaf5;

        box-shadow:
            0 9px 25px rgba(15, 23, 42, .07);
    }

    .stat-icon {
        width: 45px;
        height: 45px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        font-size: 16px;
    }

    .stat-icon.blue {
        background: #e8f6fd;
        color: #0788c9;
    }

    .stat-icon.green {
        background: #ecfdf5;
        color: #16a34a;
    }

    .stat-icon.orange {
        background: #fff7ed;
        color: #ea580c;
    }

    .stat-icon.purple {
        background: #f5f3ff;
        color: #7c3aed;
    }

    .stat-info {
        min-width: 0;
    }

    .stat-label {
        margin-bottom: 3px;

        font-size: 10px;
        font-weight: 500;

        color: #64748b;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .stat-number {
        font-size: 21px;
        font-weight: 750;

        line-height: 1.2;

        color: #172033;
    }

    /* =====================================================
       CHART GRID
    ===================================================== */

    .dashboard-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 1.55fr)
            minmax(280px, 1fr);

        gap: 17px;

        margin-bottom: 25px;
    }

    .dashboard-card {
        min-width: 0;

        padding: 20px;

        background: #fff;

        border: 1px solid #e8eef4;
        border-radius: 15px;

        box-shadow:
            0 5px 18px rgba(15, 23, 42, .035);
    }

    .card-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;

        gap: 10px;

        margin-bottom: 15px;
    }

    .card-title {
        margin: 0;

        font-size: 14px;
        font-weight: 700;

        color: #1e293b;
    }

    .card-description {
        margin: 4px 0 0;

        font-size: 10px;
        line-height: 1.5;

        color: #94a3b8;
    }

    .chart-container {
        position: relative;

        width: 100%;
        height: 270px;
    }

    /* =====================================================
       QUICK ACCESS
    ===================================================== */

    .quick-section {
        margin-top: 2px;
    }

    .quick-header {
        margin-bottom: 14px;
    }

    .quick-title {
        margin: 0;

        font-size: 16px;
        font-weight: 700;

        color: #172033;
    }

    .quick-description {
        margin: 4px 0 0;

        font-size: 10px;
        line-height: 1.5;

        color: #94a3b8;
    }

    .quick-grid {
        display: grid;

        grid-template-columns:
            repeat(5, minmax(0, 1fr));

        gap: 12px;
    }

    .quick-card {
        position: relative;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        min-height: 110px;

        padding: 15px 10px;

        text-align: center;
        text-decoration: none;

        background: #fff;

        border: 1px solid #e8eef4;
        border-radius: 13px;

        color: #475569;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, .025);

        transition:
            transform .2s ease,
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .quick-card:hover {
        transform: translateY(-3px);

        border-color: #b9e1f5;

        background: #fbfdff;

        color: #0788c9;

        box-shadow:
            0 8px 22px rgba(15, 23, 42, .06);
    }

    .quick-icon {
        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 9px;

        border-radius: 10px;

        background: #e8f6fd;
        color: #0788c9;

        font-size: 15px;

        transition: transform .2s ease;
    }

    .quick-card:hover .quick-icon {
        transform: scale(1.06);
    }

    .quick-card-title {
        font-size: 10px;
        font-weight: 650;

        line-height: 1.4;
    }

    .quick-card-subtitle {
        margin-top: 3px;

        font-size: 8px;
        line-height: 1.3;

        color: #94a3b8;
    }

    /* =====================================================
       QUICK ACCESS COLORS
    ===================================================== */

    .quick-card.green .quick-icon {
        background: #ecfdf5;
        color: #16a34a;
    }

    .quick-card.orange .quick-icon {
        background: #fff7ed;
        color: #ea580c;
    }

    .quick-card.purple .quick-icon {
        background: #f5f3ff;
        color: #7c3aed;
    }

    .quick-card.red .quick-icon {
        background: #fef2f2;
        color: #dc2626;
    }

    /* =====================================================
       TABLET
    ===================================================== */

    @media (max-width: 1100px) {

        .stats-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

        .quick-grid {
            grid-template-columns:
                repeat(4, minmax(0, 1fr));
        }
    }

    /* =====================================================
       SMALL LAPTOP / TABLET
    ===================================================== */

    @media (max-width: 850px) {

        .dashboard-grid {
            grid-template-columns: 1fr;
        }

        .quick-grid {
            grid-template-columns:
                repeat(3, minmax(0, 1fr));
        }
    }

    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 600px) {

        .welcome-card {
            padding: 20px;

            border-radius: 15px;
        }

        .welcome-title {
            font-size: 17px;
        }

        .welcome-text {
            font-size: 10px;
        }

        .welcome-icon {
            width: 50px;
            height: 50px;

            border-radius: 13px;

            font-size: 20px;
        }

        .stats-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 10px;
        }

        .stat-card {
            padding: 13px;

            gap: 9px;
        }

        .stat-icon {
            width: 37px;
            height: 37px;

            border-radius: 9px;

            font-size: 13px;
        }

        .stat-label {
            font-size: 9px;
        }

        .stat-number {
            font-size: 18px;
        }

        .dashboard-card {
            padding: 16px;
        }

        .chart-container {
            height: 240px;
        }

        .quick-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 10px;
        }

        .quick-card {
            min-height: 105px;
        }

        .reset-alert {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .reset-alert-button {
            width: 100%;
        }
    }

    /* =====================================================
       SMALL PHONE
    ===================================================== */

    @media (max-width: 400px) {

        .welcome-card {
            padding: 17px;
        }

        .welcome-icon {
            display: none;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-card {
            padding: 12px;
        }

        .dashboard-card {
            padding: 14px;
        }

        .chart-container {
            height: 220px;
        }

        .quick-grid {
            grid-template-columns: 1fr 1fr;
        }

        .quick-card {
            min-height: 100px;
        }
    }
</style>


<div class="dashboard">

    {{-- =================================================
         WELCOME
    ================================================== --}}

    <div class="welcome-card">

        <div class="welcome-content">

            <h1 class="welcome-title">
                Selamat Datang, {{ auth()->user()->name }}
            </h1>

            <p class="welcome-text">
                Kelola data sekolah dan aktivitas absensi
                melalui dashboard admin.
            </p>

        </div>

        <div class="welcome-icon">
            <i class="fa-solid fa-school"></i>
        </div>

    </div>


    {{-- =================================================
         RESET PASSWORD ALERT
    ================================================== --}}

    @if($pendingResetRequests > 0)

        <div class="reset-alert">

            <div class="reset-alert-icon">
                <i class="fa-solid fa-key"></i>
            </div>

            <div class="reset-alert-content">

                <p class="reset-alert-title">
                    Permintaan Reset Password
                </p>

                <p class="reset-alert-text">
                    Ada
                    <strong>{{ $pendingResetRequests }}</strong>
                    permintaan reset password yang menunggu tindakan.
                </p>

            </div>

            <a
                href="{{ route('admin.password-requests.index') }}"
                class="reset-alert-button"
            >
                Lihat Permintaan
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    @endif


    {{-- =================================================
         STATISTICS
    ================================================== --}}

    <div class="stats-grid">

        {{-- GURU --}}
        <div class="stat-card">

            <div class="stat-icon blue">
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>

            <div class="stat-info">

                <div class="stat-label">
                    Total Guru
                </div>

                <div class="stat-number">
                    {{ $totalGuru }}
                </div>

            </div>

        </div>


        {{-- SISWA --}}
        <div class="stat-card">

            <div class="stat-icon green">
                <i class="fa-solid fa-user-graduate"></i>
            </div>

            <div class="stat-info">

                <div class="stat-label">
                    Total Siswa
                </div>

                <div class="stat-number">
                    {{ $totalSiswa }}
                </div>

            </div>

        </div>


        {{-- KELAS --}}
        <div class="stat-card">

            <div class="stat-icon orange">
                <i class="fa-solid fa-school"></i>
            </div>

            <div class="stat-info">

                <div class="stat-label">
                    Total Kelas
                </div>

                <div class="stat-number">
                    {{ $totalKelas }}
                </div>

            </div>

        </div>


        {{-- ABSENSI --}}
        <div class="stat-card">

            <div class="stat-icon purple">
                <i class="fa-solid fa-calendar-check"></i>
            </div>

            <div class="stat-info">

                <div class="stat-label">
                    Sesi Absensi Hari Ini
                </div>

                <div class="stat-number">
                    {{ $absensiHariIni }}
                </div>

            </div>

        </div>

    </div>


    {{-- =================================================
         CHARTS
    ================================================== --}}

    <div class="dashboard-grid">

        {{-- BAR CHART --}}
        <div class="dashboard-card">

            <div class="card-header">

                <div>

                    <h3 class="card-title">
                        Statistik Sekolah
                    </h3>

                    <p class="card-description">
                        Ringkasan data utama sistem
                    </p>

                </div>

            </div>

            <div class="chart-container">
                <canvas id="schoolChart"></canvas>
            </div>

        </div>


        {{-- DOUGHNUT --}}
        <div class="dashboard-card">

            <div class="card-header">

                <div>

                    <h3 class="card-title">
                        Aktivitas Hari Ini
                    </h3>

                    <p class="card-description">
                        Perbandingan data utama
                    </p>

                </div>

            </div>

            <div class="chart-container">
                <canvas id="activityChart"></canvas>
            </div>

        </div>

    </div>


    {{-- =================================================
         QUICK ACCESS
    ================================================== --}}

    <div class="quick-section">

        <div class="quick-header">

            <h2 class="quick-title">
                Akses Cepat
            </h2>

            <p class="quick-description">
                Akses fitur administrasi sekolah dengan cepat.
            </p>

        </div>


        <div class="quick-grid">

            {{-- DASHBOARD --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-house"></i>
                </div>

                <div class="quick-card-title">
                    Dashboard
                </div>

                <div class="quick-card-subtitle">
                    Ringkasan sistem
                </div>

            </a>


            {{-- GURU --}}
            <a
                href="{{ route('admin.teachers.index') }}"
                class="quick-card green"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>

                <div class="quick-card-title">
                    Data Guru
                </div>

                <div class="quick-card-subtitle">
                    Kelola guru
                </div>

            </a>


            {{-- SISWA --}}
            <a
                href="{{ route('admin.students.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>

                <div class="quick-card-title">
                    Data Siswa
                </div>

                <div class="quick-card-subtitle">
                    Kelola siswa
                </div>

            </a>


            {{-- KELAS --}}
            <a
                href="{{ route('admin.classes.index') }}"
                class="quick-card orange"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-school"></i>
                </div>

                <div class="quick-card-title">
                    Data Kelas
                </div>

                <div class="quick-card-subtitle">
                    Kelola kelas
                </div>

            </a>


            {{-- MAPEL --}}
            <a
                href="{{ route('admin.subjects.index') }}"
                class="quick-card purple"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-book"></i>
                </div>

                <div class="quick-card-title">
                    Mata Pelajaran
                </div>

                <div class="quick-card-subtitle">
                    Kelola pelajaran
                </div>

            </a>


            {{-- TAHUN AJARAN --}}
            <a
                href="{{ route('admin.academic-years.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>

                <div class="quick-card-title">
                    Tahun Ajaran
                </div>

                <div class="quick-card-subtitle">
                    Periode akademik
                </div>

            </a>


            {{-- JADWAL --}}
            <a
                href="{{ route('admin.schedules.index') }}"
                class="quick-card green"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <div class="quick-card-title">
                    Jadwal Mengajar
                </div>

                <div class="quick-card-subtitle">
                    Kelola jadwal
                </div>

            </a>


            {{-- MONITORING --}}
            <a
                href="{{ route('admin.monitoring.index') }}"
                class="quick-card orange"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-chart-line"></i>
                </div>

                <div class="quick-card-title">
                    Monitoring Absensi
                </div>

                <div class="quick-card-subtitle">
                    Pantau kehadiran
                </div>

            </a>


            {{-- LAPORAN --}}
            <a
                href="{{ route('admin.reports.index') }}"
                class="quick-card purple"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-file-lines"></i>
                </div>

                <div class="quick-card-title">
                    Laporan
                </div>

                <div class="quick-card-subtitle">
                    Laporan absensi
                </div>

            </a>


            {{-- RESET PASSWORD --}}
            <a
                href="{{ route('admin.password-requests.index') }}"
                class="quick-card red"
            >

                <div class="quick-icon">
                    <i class="fa-solid fa-key"></i>
                </div>

                <div class="quick-card-title">
                    Reset Password
                </div>

                <div class="quick-card-subtitle">
                    Permintaan akun
                </div>

            </a>

        </div>

    </div>

</div>


{{-- =====================================================
     CHART.JS
====================================================== --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        /* =================================================
           STATISTIK SEKOLAH
        ================================================== */

        const schoolCanvas =
            document.getElementById('schoolChart');

        if (schoolCanvas) {

            new Chart(schoolCanvas, {

                type: 'bar',

                data: {

                    labels: [
                        'Guru',
                        'Siswa',
                        'Kelas',
                        'Absensi'
                    ],

                    datasets: [{

                        label: 'Jumlah',

                        data: [
                            {{ $totalGuru }},
                            {{ $totalSiswa }},
                            {{ $totalKelas }},
                            {{ $absensiHariIni }}
                        ],

                        backgroundColor: [
                            '#0788c9',
                            '#16a34a',
                            '#ea580c',
                            '#7c3aed'
                        ],

                        borderRadius: 7,

                        borderSkipped: false,

                        barThickness: 34

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    animation: {
                        duration: 700
                    },

                    plugins: {

                        legend: {
                            display: false
                        },

                        tooltip: {

                            backgroundColor: '#172033',

                            titleFont: {
                                size: 11
                            },

                            bodyFont: {
                                size: 10
                            },

                            padding: 10,

                            cornerRadius: 8

                        }

                    },

                    scales: {

                        y: {

                            beginAtZero: true,

                            ticks: {

                                precision: 0,

                                color: '#94a3b8',

                                font: {
                                    size: 9
                                }

                            },

                            grid: {
                                color: '#eef2f7'
                            }

                        },

                        x: {

                            ticks: {

                                color: '#64748b',

                                font: {
                                    size: 9
                                }

                            },

                            grid: {
                                display: false
                            }

                        }

                    }

                }

            });

        }


        /* =================================================
           AKTIVITAS
        ================================================== */

        const activityCanvas =
            document.getElementById('activityChart');

        if (activityCanvas) {

            new Chart(activityCanvas, {

                type: 'doughnut',

                data: {

                    labels: [
                        'Guru',
                        'Siswa',
                        'Kelas',
                        'Absensi'
                    ],

                    datasets: [{

                        data: [
                            {{ $totalGuru }},
                            {{ $totalSiswa }},
                            {{ $totalKelas }},
                            {{ $absensiHariIni }}
                        ],

                        backgroundColor: [
                            '#0788c9',
                            '#16a34a',
                            '#ea580c',
                            '#7c3aed'
                        ],

                        borderWidth: 3,

                        borderColor: '#ffffff',

                        hoverOffset: 5

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    cutout: '68%',

                    animation: {
                        duration: 800
                    },

                    plugins: {

                        legend: {

                            position: 'bottom',

                            labels: {

                                padding: 13,

                                usePointStyle: true,

                                pointStyle: 'circle',

                                color: '#64748b',

                                font: {
                                    size: 9
                                }

                            }

                        },

                        tooltip: {

                            backgroundColor: '#172033',

                            titleFont: {
                                size: 11
                            },

                            bodyFont: {
                                size: 10
                            },

                            padding: 10,

                            cornerRadius: 8

                        }

                    }

                }

            });

        }

    });

</script>

@endsection