@extends('layouts.app')

@section('title', 'Tambah Tahun Ajaran')

@section('content')

<style>
    /* =========================================================
       ACADEMIC YEAR CREATE PAGE
    ========================================================= */

    .academic-create-page {
        width: 100%;
        max-width: 960px;
        margin: 0 auto;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .academic-create-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 20px;
    }

    .academic-create-header-left {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .academic-create-header-icon {
        width: 46px;
        height: 46px;
        flex: 0 0 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #e8f6fd;
        color: #0788c9;
        font-size: 17px;
    }

    .academic-create-title {
        margin: 0;
        color: #1e293b;
        font-size: 21px;
        font-weight: 700;
        line-height: 1.2;
    }

    .academic-create-description {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    /* =========================================================
       BACK BUTTON
    ========================================================= */

    .academic-create-back {
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
        font-weight: 600;
        white-space: nowrap;
        transition: all .18s ease;
    }

    .academic-create-back:hover {
        border-color: #bae6fd;
        background: #f8fcff;
        color: #0788c9;
        transform: translateY(-1px);
    }

    /* =========================================================
       MAIN CARD
    ========================================================= */

    .academic-create-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        box-shadow: 0 6px 24px rgba(15, 23, 42, .04);
    }

    .academic-create-card-top {
        height: 3px;
        background: #0788c9;
    }

    .academic-create-card-content {
        padding: 25px;
    }

    /* =========================================================
       FORM HEADER
    ========================================================= */

    .academic-create-form-header {
        display: flex;
        align-items: center;
        gap: 11px;
        padding-bottom: 18px;
        margin-bottom: 21px;
        border-bottom: 1px solid #f1f5f9;
    }

    .academic-create-form-header-icon {
        width: 36px;
        height: 36px;
        flex: 0 0 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #f0f9ff;
        color: #0788c9;
        font-size: 13px;
    }

    .academic-create-form-title {
        margin: 0;
        color: #1e293b;
        font-size: 13px;
        font-weight: 700;
    }

    .academic-create-form-subtitle {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =========================================================
       ERROR
    ========================================================= */

    .academic-create-error {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 19px;
        padding: 12px 14px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 9px;
        color: #991b1b;
        font-size: 9px;
    }

    .academic-create-error > i {
        margin-top: 1px;
        color: #dc2626;
    }

    .academic-create-error-content {
        flex: 1;
    }

    .academic-create-error-title {
        margin: 0;
        font-weight: 700;
    }

    .academic-create-error-list {
        margin: 5px 0 0;
        padding-left: 17px;
    }

    .academic-create-error-list li {
        margin-bottom: 2px;
    }

    /* =========================================================
       FORM GRID
    ========================================================= */

    .academic-create-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .academic-create-section-title {
        grid-column: 1 / -1;
        display: flex;
        align-items: center;
        gap: 7px;
        padding-bottom: 9px;
        border-bottom: 1px solid #f1f5f9;
        color: #0788c9;
        font-size: 9px;
        font-weight: 700;
    }

    .academic-create-field {
        min-width: 0;
    }

    /* =========================================================
       LABEL
    ========================================================= */

    .academic-create-label {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 7px;
        color: #334155;
        font-size: 10px;
        font-weight: 650;
    }

    .academic-create-required {
        color: #ef4444;
    }

    /* =========================================================
       INPUT
    ========================================================= */

    .academic-create-input-wrapper {
        position: relative;
    }

    .academic-create-input-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        z-index: 2;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 11px;
        pointer-events: none;
        transition: color .18s ease;
    }

    .academic-create-input,
    .academic-create-select {
        width: 100%;
        height: 43px;
        box-sizing: border-box;
        padding: 10px 12px 10px 36px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        outline: none;
        background: #fff;
        color: #334155;
        font-family: inherit;
        font-size: 10px;
        transition:
            border-color .18s ease,
            box-shadow .18s ease,
            background .18s ease;
    }

    .academic-create-input:hover,
    .academic-create-select:hover {
        border-color: #cbd5e1;
    }

    .academic-create-input:focus,
    .academic-create-select:focus {
        border-color: #0788c9;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(7, 136, 201, .08);
    }

    .academic-create-input-wrapper:focus-within
    .academic-create-input-icon {
        color: #0788c9;
    }

    .academic-create-input::placeholder {
        color: #cbd5e1;
    }

    .academic-create-select {
        cursor: pointer;
    }

    /* =========================================================
       FIELD ERROR
    ========================================================= */

    .academic-create-field-error {
        display: flex;
        align-items: center;
        gap: 5px;
        margin: 5px 0 0;
        color: #dc2626;
        font-size: 8px;
    }

    .academic-create-field-help {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.45;
    }

    /* =========================================================
       ACTIVE BOX
    ========================================================= */

    .academic-create-active {
        grid-column: 1 / -1;
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 14px;
        background: #f8fcff;
        border: 1px solid #dbeffc;
        border-radius: 10px;
        transition: all .18s ease;
    }

    .academic-create-active:hover {
        border-color: #bae6fd;
        background: #f5fbff;
    }

    .academic-create-checkbox {
        width: 19px;
        height: 19px;
        flex: 0 0 19px;
        margin: 0;
        cursor: pointer;
        accent-color: #0788c9;
    }

    .academic-create-active-content {
        flex: 1;
        min-width: 0;
    }

    .academic-create-active-title {
        margin: 0;
        color: #334155;
        font-size: 10px;
        font-weight: 650;
    }

    .academic-create-active-description {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.5;
    }

    .academic-create-active-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 8px;
        border-radius: 20px;
        background: #fff;
        border: 1px solid #dbeffc;
        color: #64748b;
        font-size: 7px;
        font-weight: 600;
        white-space: nowrap;
    }

    .academic-create-active-status-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #94a3b8;
    }

    /* =========================================================
       PREVIEW
    ========================================================= */

    .academic-create-preview {
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

    .academic-create-preview-icon {
        width: 44px;
        height: 44px;
        flex: 0 0 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #e0f2fe;
        color: #0788c9;
        font-size: 15px;
    }

    .academic-create-preview-content {
        min-width: 0;
        flex: 1;
    }

    .academic-create-preview-label {
        margin: 0;
        color: #94a3b8;
        font-size: 8px;
    }

    .academic-create-preview-name {
        margin: 4px 0 0;
        color: #075985;
        font-size: 15px;
        font-weight: 700;
        line-height: 1.2;
        word-break: break-word;
    }

    .academic-create-preview-semester {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 6px;
        padding: 4px 8px;
        border-radius: 6px;
        background: #e0f2fe;
        color: #0369a1;
        font-size: 8px;
        font-weight: 650;
    }

    /* =========================================================
       FOOTER
    ========================================================= */

    .academic-create-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid #f1f5f9;
    }

    .academic-create-required-info {
        color: #94a3b8;
        font-size: 8px;
    }

    .academic-create-required-info span {
        color: #ef4444;
    }

    .academic-create-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* =========================================================
       BUTTONS
    ========================================================= */

    .academic-create-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 38px;
        padding: 0 14px;
        border-radius: 8px;
        font-family: inherit;
        font-size: 9px;
        font-weight: 650;
        text-decoration: none;
        cursor: pointer;
        transition: all .18s ease;
    }

    .academic-create-btn-cancel {
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #64748b;
    }

    .academic-create-btn-cancel:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #334155;
    }

    .academic-create-btn-save {
        border: 1px solid #0788c9;
        background: #0788c9;
        color: #fff;
        box-shadow: 0 5px 14px rgba(7, 136, 201, .15);
    }

    .academic-create-btn-save:hover {
        border-color: #0676ad;
        background: #0676ad;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 7px 18px rgba(7, 136, 201, .2);
    }

    /* =========================================================
       INFO CARD
    ========================================================= */

    .academic-create-info {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 14px;
        padding: 13px 15px;
        background: #f8fcff;
        border: 1px solid #dbeffc;
        border-radius: 10px;
    }

    .academic-create-info-icon {
        margin-top: 1px;
        color: #0788c9;
        font-size: 12px;
    }

    .academic-create-info-content {
        min-width: 0;
    }

    .academic-create-info-title {
        margin: 0;
        color: #075985;
        font-size: 9px;
        font-weight: 700;
    }

    .academic-create-info-text {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .academic-create-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .academic-create-back {
            width: 100%;
        }

        .academic-create-grid {
            grid-template-columns: 1fr;
        }

        .academic-create-section-title {
            grid-column: auto;
        }

        .academic-create-active,
        .academic-create-preview {
            grid-column: auto;
        }

        .academic-create-card-content {
            padding: 20px;
        }

        .academic-create-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .academic-create-actions {
            width: 100%;
        }

        .academic-create-actions .academic-create-btn {
            flex: 1;
        }
    }

    @media (max-width: 480px) {

        .academic-create-title {
            font-size: 18px;
        }

        .academic-create-description {
            font-size: 9px;
        }

        .academic-create-header-icon {
            width: 42px;
            height: 42px;
            flex-basis: 42px;
        }

        .academic-create-card {
            border-radius: 12px;
        }

        .academic-create-card-content {
            padding: 16px;
        }

        .academic-create-form-header {
            margin-bottom: 18px;
        }

        .academic-create-active {
            align-items: flex-start;
        }

        .academic-create-active-status {
            display: none;
        }

        .academic-create-preview {
            padding: 13px;
        }

        .academic-create-preview-icon {
            width: 40px;
            height: 40px;
            flex-basis: 40px;
        }

        .academic-create-preview-name {
            font-size: 13px;
        }
    }
</style>


<div class="academic-create-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="academic-create-header">

        <div class="academic-create-header-left">

            <div class="academic-create-header-icon">
                <i class="fa-solid fa-calendar-plus"></i>
            </div>

            <div>
                <h1 class="academic-create-title">
                    Tambah Tahun Ajaran
                </h1>

                <p class="academic-create-description">
                    Tambahkan periode akademik baru ke dalam sistem.
                </p>
            </div>

        </div>


        <a
            href="{{ route('admin.academic-years.index') }}"
            class="academic-create-back"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>

    </div>


    {{-- =====================================================
         MAIN CARD
    ====================================================== --}}

    <div class="academic-create-card">

        <div class="academic-create-card-top"></div>

        <div class="academic-create-card-content">

            {{-- FORM HEADER --}}

            <div class="academic-create-form-header">

                <div class="academic-create-form-header-icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>

                <div>
                    <h2 class="academic-create-form-title">
                        Informasi Tahun Ajaran
                    </h2>

                    <p class="academic-create-form-subtitle">
                        Isi informasi tahun ajaran dan semester.
                    </p>
                </div>

            </div>


            {{-- =================================================
                 ERROR
            ================================================== --}}

            @if ($errors->any())

                <div class="academic-create-error">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <div class="academic-create-error-content">

                        <p class="academic-create-error-title">
                            Terdapat kesalahan pada data.
                        </p>

                        <ul class="academic-create-error-list">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

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
                action="{{ route('admin.academic-years.store') }}"
            >

                @csrf

                <div class="academic-create-grid">


                    {{-- SECTION TITLE --}}

                    <div class="academic-create-section-title">

                        <i class="fa-solid fa-calendar-days"></i>

                        Data Akademik

                    </div>


                    {{-- NAMA TAHUN AJARAN --}}

                    <div class="academic-create-field">

                        <label
                            for="academicYear"
                            class="academic-create-label"
                        >
                            Nama Tahun Ajaran

                            <span class="academic-create-required">
                                *
                            </span>
                        </label>

                        <div class="academic-create-input-wrapper">

                            <i
                                class="fa-solid fa-calendar academic-create-input-icon"
                            ></i>

                            <input
                                type="text"
                                name="name"
                                id="academicYear"
                                class="academic-create-input"
                                value="{{ old('name') }}"
                                placeholder="Contoh: 2025/2026"
                                autocomplete="off"
                                required
                            >

                        </div>

                        @error('name')
                            <p class="academic-create-field-error">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}
                            </p>
                        @else
                            <p class="academic-create-field-help">
                                Gunakan format tahun, misalnya 2025/2026.
                            </p>
                        @enderror

                    </div>


                    {{-- SEMESTER --}}

                    <div class="academic-create-field">

                        <label
                            for="academicSemester"
                            class="academic-create-label"
                        >
                            Semester

                            <span class="academic-create-required">
                                *
                            </span>
                        </label>

                        <div class="academic-create-input-wrapper">

                            <i
                                class="fa-solid fa-book-open academic-create-input-icon"
                            ></i>

                            <select
                                name="semester"
                                id="academicSemester"
                                class="academic-create-select"
                                required
                            >

                                <option
                                    value="ganjil"
                                    {{ old('semester', 'ganjil') == 'ganjil' ? 'selected' : '' }}
                                >
                                    Ganjil
                                </option>

                                <option
                                    value="genap"
                                    {{ old('semester') == 'genap' ? 'selected' : '' }}
                                >
                                    Genap
                                </option>

                            </select>

                        </div>

                        @error('semester')
                            <p class="academic-create-field-error">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}
                            </p>
                        @else
                            <p class="academic-create-field-help">
                                Pilih semester yang digunakan.
                            </p>
                        @enderror

                    </div>


                    {{-- =================================================
                         ACTIVE
                    ================================================== --}}

                    <div class="academic-create-active">

                        <input
                            type="checkbox"
                            name="is_active"
                            id="isActive"
                            value="1"
                            class="academic-create-checkbox"
                            {{ old('is_active') ? 'checked' : '' }}
                        >

                        <div class="academic-create-active-content">

                            <p class="academic-create-active-title">
                                Jadikan Tahun Ajaran Aktif
                            </p>

                            <p class="academic-create-active-description">
                                Tahun ajaran aktif akan digunakan sebagai
                                periode utama dalam sistem.
                            </p>

                        </div>

                        <span class="academic-create-active-status">

                            <span class="academic-create-active-status-dot"></span>

                            Periode utama

                        </span>

                    </div>


                    {{-- =================================================
                         PREVIEW
                    ================================================== --}}

                    <div class="academic-create-preview">

                        <div class="academic-create-preview-icon">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>

                        <div class="academic-create-preview-content">

                            <p class="academic-create-preview-label">
                                Preview
                            </p>

                            <p
                                class="academic-create-preview-name"
                                id="previewYear"
                            >
                                {{ old('name') ?: '2025/2026' }}
                            </p>

                            <span
                                class="academic-create-preview-semester"
                                id="previewSemester"
                            >

                                <i class="fa-solid fa-book-open"></i>

                                {{ old('semester') == 'genap' ? 'Genap' : 'Ganjil' }}

                            </span>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     FOOTER
                ================================================== --}}

                <div class="academic-create-footer">

                    <div class="academic-create-required-info">

                        <span>*</span>
                        Wajib diisi

                    </div>


                    <div class="academic-create-actions">

                        <a
                            href="{{ route('admin.academic-years.index') }}"
                            class="academic-create-btn academic-create-btn-cancel"
                        >
                            <i class="fa-solid fa-xmark"></i>
                            Batal
                        </a>


                        <button
                            type="submit"
                            class="academic-create-btn academic-create-btn-save"
                        >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Simpan Tahun Ajaran
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =====================================================
         INFO
    ====================================================== --}}

    <div class="academic-create-info">

        <div class="academic-create-info-icon">
            <i class="fa-solid fa-circle-info"></i>
        </div>

        <div class="academic-create-info-content">

            <p class="academic-create-info-title">
                Perhatian
            </p>

            <p class="academic-create-info-text">
                Pastikan data tahun ajaran dan semester sudah benar.
                Gunakan status aktif hanya untuk periode akademik
                yang sedang berjalan.
            </p>

        </div>

    </div>

</div>


{{-- =========================================================
     LIVE PREVIEW
========================================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const yearInput = document.getElementById('academicYear');
        const semesterInput = document.getElementById('academicSemester');

        const previewYear = document.getElementById('previewYear');
        const previewSemester = document.getElementById('previewSemester');


        function updateAcademicPreview() {

            const year = yearInput.value.trim();

            previewYear.textContent =
                year !== ''
                    ? year
                    : '2025/2026';


            const semester = semesterInput.value;

            const semesterName =
                semester === 'genap'
                    ? 'Genap'
                    : 'Ganjil';


            previewSemester.innerHTML =
                '<i class="fa-solid fa-book-open"></i> ' +
                semesterName;
        }


        yearInput.addEventListener(
            'input',
            updateAcademicPreview
        );


        semesterInput.addEventListener(
            'change',
            updateAcademicPreview
        );


        updateAcademicPreview();

    });
</script>

@endsection