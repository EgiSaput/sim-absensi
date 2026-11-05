@extends('layouts.app')

@section('title', 'Edit Tahun Ajaran')

@section('content')

<style>
    /* =====================================================
       PAGE
    ===================================================== */

    .academic-edit-page {
        width: 100%;
        max-width: 920px;
        margin: 0 auto;
        padding-bottom: 25px;
    }

    /* =====================================================
       HEADER
    ===================================================== */

    .academic-edit-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 22px;
    }

    .academic-edit-header-left {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }

    .academic-edit-header-icon {
        width: 46px;
        height: 46px;
        flex: 0 0 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e8f6fd;
        color: #0788c9;
        border-radius: 12px;
        font-size: 17px;
    }

    .academic-edit-title {
        margin: 0;
        color: #1e293b;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -.3px;
    }

    .academic-edit-description {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .academic-edit-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 38px;
        padding: 0 13px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        background: #fff;
        color: #64748b;
        text-decoration: none;
        font-size: 10px;
        font-weight: 500;
        white-space: nowrap;
        transition: all .18s ease;
    }

    .academic-edit-back:hover {
        background: #f8fcff;
        border-color: #bae6fd;
        color: #0788c9;
        transform: translateY(-1px);
    }

    /* =====================================================
       MAIN CARD
    ===================================================== */

    .academic-edit-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        box-shadow: 0 6px 22px rgba(15, 23, 42, .035);
    }

    .academic-edit-card-header {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 20px 23px;
        border-bottom: 1px solid #f1f5f9;
    }

    .academic-edit-card-header-icon {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0f9ff;
        color: #0788c9;
        border-radius: 9px;
        font-size: 13px;
    }

    .academic-edit-card-title {
        margin: 0;
        color: #1e293b;
        font-size: 13px;
        font-weight: 700;
    }

    .academic-edit-card-subtitle {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 9px;
    }

    .academic-edit-card-body {
        padding: 23px;
    }

    /* =====================================================
       ERROR
    ===================================================== */

    .academic-edit-error {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        padding: 13px 14px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 10px;
        color: #991b1b;
        font-size: 9px;
        line-height: 1.5;
    }

    .academic-edit-error-icon {
        margin-top: 1px;
        color: #dc2626;
        font-size: 12px;
    }

    .academic-edit-error strong {
        display: block;
        margin-bottom: 4px;
        font-weight: 700;
    }

    .academic-edit-error ul {
        margin: 5px 0 0;
        padding-left: 17px;
    }

    .academic-edit-error li {
        margin-bottom: 2px;
    }

    /* =====================================================
       FORM GRID
    ===================================================== */

    .academic-edit-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 19px;
    }

    /* =====================================================
       SECTION
    ===================================================== */

    .academic-edit-section {
        grid-column: 1 / -1;
        display: flex;
        align-items: center;
        gap: 7px;
        padding-bottom: 9px;
        border-bottom: 1px solid #f1f5f9;
        color: #0788c9;
        font-size: 10px;
        font-weight: 700;
    }

    .academic-edit-section i {
        font-size: 10px;
    }

    /* =====================================================
       FORM GROUP
    ===================================================== */

    .academic-edit-group {
        min-width: 0;
    }

    .academic-edit-label {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 7px;
        color: #334155;
        font-size: 10px;
        font-weight: 600;
    }

    .academic-edit-required {
        color: #ef4444;
    }

    /* =====================================================
       INPUT
    ===================================================== */

    .academic-edit-input-wrap {
        position: relative;
    }

    .academic-edit-input-icon {
        position: absolute;
        top: 50%;
        left: 13px;
        z-index: 2;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 11px;
        pointer-events: none;
        transition: color .18s ease;
    }

    .academic-edit-input,
    .academic-edit-select {
        width: 100%;
        height: 43px;
        box-sizing: border-box;
        padding: 10px 12px 10px 36px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        outline: none;
        background: #fff;
        color: #334155;
        font-size: 10px;
        transition: all .18s ease;
    }

    .academic-edit-input::placeholder {
        color: #cbd5e1;
    }

    .academic-edit-input:hover,
    .academic-edit-select:hover {
        border-color: #cbd5e1;
    }

    .academic-edit-input:focus,
    .academic-edit-select:focus {
        border-color: #0788c9;
        box-shadow: 0 0 0 3px rgba(7, 136, 201, .08);
    }

    .academic-edit-input-wrap:focus-within
    .academic-edit-input-icon {
        color: #0788c9;
    }

    .academic-edit-select {
        cursor: pointer;
    }

    /* =====================================================
       HELP
    ===================================================== */

    .academic-edit-help {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =====================================================
       ACTIVE BOX
    ===================================================== */

    .academic-edit-active {
        grid-column: 1 / -1;
        display: flex;
        align-items: flex-start;
        gap: 11px;
        padding: 15px;
        background: #f8fcff;
        border: 1px solid #dbeffc;
        border-radius: 11px;
        transition: all .18s ease;
    }

    .academic-edit-active:hover {
        border-color: #bae6fd;
        background: #f5fbff;
    }

    .academic-edit-checkbox {
        position: relative;
        width: 19px;
        height: 19px;
        flex: 0 0 19px;
        margin-top: 1px;
    }

    .academic-edit-checkbox input {
        width: 19px !important;
        height: 19px !important;
        margin: 0 !important;
        cursor: pointer;
        accent-color: #0788c9;
    }

    .academic-edit-active-content {
        flex: 1;
        min-width: 0;
    }

    .academic-edit-active-title {
        margin: 0;
        color: #334155;
        font-size: 10px;
        font-weight: 700;
    }

    .academic-edit-active-description {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =====================================================
       CURRENT STATUS
    ===================================================== */

    .academic-edit-current-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 8px;
        padding: 4px 8px;
        border-radius: 20px;
        font-size: 8px;
        font-weight: 600;
    }

    .academic-edit-status-active {
        background: #ecfdf5;
        color: #15803d;
    }

    .academic-edit-status-inactive {
        background: #f1f5f9;
        color: #64748b;
    }

    .academic-edit-status-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
    }

    /* =====================================================
       PREVIEW
    ===================================================== */

    .academic-edit-preview {
        grid-column: 1 / -1;
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 16px;
        background: linear-gradient(
            135deg,
            #f8fcff 0%,
            #f0f9ff 100%
        );
        border: 1px solid #dbeffc;
        border-radius: 11px;
    }

    .academic-edit-preview-icon {
        width: 43px;
        height: 43px;
        flex: 0 0 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e0f2fe;
        color: #0788c9;
        border-radius: 10px;
        font-size: 14px;
    }

    .academic-edit-preview-label {
        margin: 0;
        color: #94a3b8;
        font-size: 8px;
    }

    .academic-edit-preview-name {
        margin: 3px 0 0;
        color: #075985;
        font-size: 15px;
        font-weight: 700;
        line-height: 1.2;
    }

    .academic-edit-preview-semester {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 6px;
        padding: 4px 8px;
        background: #e0f2fe;
        color: #0369a1;
        border-radius: 6px;
        font-size: 8px;
        font-weight: 600;
    }

    /* =====================================================
       FOOTER
    ===================================================== */

    .academic-edit-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 23px;
        padding-top: 18px;
        border-top: 1px solid #f1f5f9;
    }

    .academic-edit-required-info {
        color: #94a3b8;
        font-size: 8px;
    }

    .academic-edit-required-info span {
        color: #ef4444;
    }

    .academic-edit-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* =====================================================
       BUTTONS
    ===================================================== */

    .academic-edit-btn-cancel,
    .academic-edit-btn-update {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        height: 39px;
        padding: 0 15px;
        border-radius: 9px;
        font-size: 10px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all .18s ease;
    }

    .academic-edit-btn-cancel {
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #64748b;
    }

    .academic-edit-btn-cancel:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #334155;
    }

    .academic-edit-btn-update {
        border: 0;
        background: #0788c9;
        color: #fff;
        box-shadow: 0 4px 10px rgba(7, 136, 201, .16);
    }

    .academic-edit-btn-update:hover {
        background: #0676ad;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(7, 136, 201, .2);
    }

    .academic-edit-btn-update:active,
    .academic-edit-btn-cancel:active {
        transform: translateY(0);
    }

    /* =====================================================
       INFO
    ===================================================== */

    .academic-edit-info {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 15px;
        padding: 13px 15px;
        background: #f8fcff;
        border: 1px solid #dbeffc;
        border-radius: 11px;
    }

    .academic-edit-info-icon {
        margin-top: 1px;
        color: #0788c9;
        font-size: 12px;
    }

    .academic-edit-info-title {
        margin: 0;
        color: #075985;
        font-size: 9px;
        font-weight: 700;
    }

    .academic-edit-info-text {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 8px;
        line-height: 1.55;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .academic-edit-page {
            max-width: 100%;
        }

        .academic-edit-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .academic-edit-back {
            width: 100%;
        }

        .academic-edit-card-body {
            padding: 19px;
        }

        .academic-edit-card-header {
            padding: 18px 19px;
        }

        .academic-edit-grid {
            grid-template-columns: 1fr;
        }

        .academic-edit-section,
        .academic-edit-active,
        .academic-edit-preview {
            grid-column: auto;
        }

        .academic-edit-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .academic-edit-actions {
            width: 100%;
        }

        .academic-edit-btn-cancel,
        .academic-edit-btn-update {
            flex: 1;
        }
    }

    @media (max-width: 430px) {

        .academic-edit-title {
            font-size: 18px;
        }

        .academic-edit-header-icon {
            width: 42px;
            height: 42px;
            flex-basis: 42px;
        }

        .academic-edit-card-body {
            padding: 16px;
        }

        .academic-edit-card-header {
            padding: 16px;
        }

        .academic-edit-actions {
            flex-direction: column;
        }

        .academic-edit-btn-cancel,
        .academic-edit-btn-update {
            width: 100%;
            flex: none;
        }

        .academic-edit-preview {
            align-items: flex-start;
        }
    }
</style>


<div class="academic-edit-page">

    {{-- =================================================
         HEADER
    ================================================== --}}

    <div class="academic-edit-header">

        <div class="academic-edit-header-left">

            <div class="academic-edit-header-icon">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>

            <div>
                <h1 class="academic-edit-title">
                    Edit Tahun Ajaran
                </h1>

                <p class="academic-edit-description">
                    Perbarui informasi tahun ajaran dan semester.
                </p>
            </div>

        </div>

        <a
            href="{{ route('admin.academic-years.index') }}"
            class="academic-edit-back"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>

    </div>


    {{-- =================================================
         FORM CARD
    ================================================== --}}

    <div class="academic-edit-card">

        <div class="academic-edit-card-header">

            <div class="academic-edit-card-header-icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>

            <div>
                <h2 class="academic-edit-card-title">
                    Informasi Tahun Ajaran
                </h2>

                <p class="academic-edit-card-subtitle">
                    Periksa kembali data sebelum menyimpan perubahan.
                </p>
            </div>

        </div>


        <div class="academic-edit-card-body">

            {{-- =================================================
                 ERROR
            ================================================== --}}

            @if ($errors->any())

                <div class="academic-edit-error">

                    <div class="academic-edit-error-icon">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>

                    <div>

                        <strong>
                            Terdapat kesalahan:
                        </strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            @endif


            {{-- =================================================
                 FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('admin.academic-years.update', $year) }}"
            >

                @csrf
                @method('PUT')


                <div class="academic-edit-grid">

                    {{-- SECTION --}}

                    <div class="academic-edit-section">

                        <i class="fa-solid fa-calendar-days"></i>

                        Data Tahun Ajaran

                    </div>


                    {{-- NAMA TAHUN AJARAN --}}

                    <div class="academic-edit-group">

                        <label
                            for="academicYear"
                            class="academic-edit-label"
                        >
                            Nama Tahun Ajaran
                            <span class="academic-edit-required">*</span>
                        </label>

                        <div class="academic-edit-input-wrap">

                            <i class="fa-solid fa-calendar academic-edit-input-icon"></i>

                            <input
                                type="text"
                                name="name"
                                id="academicYear"
                                class="academic-edit-input"
                                value="{{ old('name', $year->name) }}"
                                placeholder="Contoh: 2025/2026"
                                required
                            >

                        </div>

                        <p class="academic-edit-help">
                            Gunakan format tahun seperti 2025/2026.
                        </p>

                    </div>


                    {{-- SEMESTER --}}

                    <div class="academic-edit-group">

                        <label
                            for="academicSemester"
                            class="academic-edit-label"
                        >
                            Semester
                            <span class="academic-edit-required">*</span>
                        </label>

                        <div class="academic-edit-input-wrap">

                            <i class="fa-solid fa-book-open academic-edit-input-icon"></i>

                            <select
                                name="semester"
                                id="academicSemester"
                                class="academic-edit-select"
                                required
                            >

                                <option
                                    value="ganjil"
                                    {{ old('semester', $year->semester) == 'ganjil' ? 'selected' : '' }}
                                >
                                    Ganjil
                                </option>

                                <option
                                    value="genap"
                                    {{ old('semester', $year->semester) == 'genap' ? 'selected' : '' }}
                                >
                                    Genap
                                </option>

                            </select>

                        </div>

                        <p class="academic-edit-help">
                            Pilih semester sesuai periode akademik.
                        </p>

                    </div>


                    {{-- =================================================
                         STATUS AKTIF
                    ================================================== --}}

                    <div class="academic-edit-active">

                        <div class="academic-edit-checkbox">

                            <input
                                type="checkbox"
                                name="is_active"
                                id="isActive"
                                value="1"
                                {{ old('is_active', $year->is_active) ? 'checked' : '' }}
                            >

                        </div>

                        <div class="academic-edit-active-content">

                            <p class="academic-edit-active-title">
                                Jadikan Tahun Ajaran Aktif
                            </p>

                            <p class="academic-edit-active-description">
                                Tahun ajaran ini akan digunakan sebagai
                                periode aktif dalam sistem.
                            </p>


                            @if ($year->is_active)

                                <span class="academic-edit-current-status academic-edit-status-active">

                                    <span class="academic-edit-status-dot"></span>

                                    Saat ini Aktif

                                </span>

                            @else

                                <span class="academic-edit-current-status academic-edit-status-inactive">

                                    <span class="academic-edit-status-dot"></span>

                                    Saat ini Tidak Aktif

                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- =================================================
                         PREVIEW
                    ================================================== --}}

                    <div class="academic-edit-preview">

                        <div class="academic-edit-preview-icon">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>

                        <div>

                            <p class="academic-edit-preview-label">
                                Preview Tahun Ajaran
                            </p>

                            <p
                                class="academic-edit-preview-name"
                                id="previewYear"
                            >
                                {{ old('name', $year->name) }}
                            </p>

                            <span
                                class="academic-edit-preview-semester"
                                id="previewSemester"
                            >

                                <i class="fa-solid fa-book-open"></i>

                                {{ old('semester', $year->semester) == 'genap' ? 'Genap' : 'Ganjil' }}

                            </span>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     FOOTER
                ================================================== --}}

                <div class="academic-edit-footer">

                    <div class="academic-edit-required-info">
                        <span>*</span>
                        Wajib diisi
                    </div>

                    <div class="academic-edit-actions">

                        <a
                            href="{{ route('admin.academic-years.index') }}"
                            class="academic-edit-btn-cancel"
                        >
                            <i class="fa-solid fa-xmark"></i>
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="academic-edit-btn-update"
                        >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Perbarui Data
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =================================================
         INFO
    ================================================== --}}

    <div class="academic-edit-info">

        <div class="academic-edit-info-icon">
            <i class="fa-solid fa-circle-info"></i>
        </div>

        <div>

            <p class="academic-edit-info-title">
                Perhatian
            </p>

            <p class="academic-edit-info-text">
                Pastikan data tahun ajaran dan semester sudah benar.
                Jika dijadikan aktif, periode ini akan digunakan
                sebagai tahun ajaran yang sedang berjalan.
            </p>

        </div>

    </div>

</div>


{{-- =====================================================
     LIVE PREVIEW
====================================================== --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const yearInput =
            document.getElementById('academicYear');

        const semesterInput =
            document.getElementById('academicSemester');

        const previewYear =
            document.getElementById('previewYear');

        const previewSemester =
            document.getElementById('previewSemester');


        function updatePreview() {

            const year = yearInput.value.trim();

            previewYear.textContent =
                year !== ''
                    ? year
                    : '2025/2026';


            const semester =
                semesterInput.value;

            const semesterName =
                semester === 'genap'
                    ? 'Genap'
                    : 'Ganjil';


            previewSemester.innerHTML =
                '<i class="fa-solid fa-book-open"></i> '
                + semesterName;
        }


        yearInput.addEventListener(
            'input',
            updatePreview
        );


        semesterInput.addEventListener(
            'change',
            updatePreview
        );


        updatePreview();

    });
</script>

@endsection