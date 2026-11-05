@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')

<style>
    /* =====================================================
       CREATE CLASS PAGE
    ===================================================== */

    .create-class-page {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
        padding-bottom: 30px;

        --primary: #0788c9;
        --primary-dark: #0676ad;
        --primary-soft: #e8f6fd;
        --primary-light: #f5fbfe;

        --text: #1e293b;
        --text-soft: #64748b;
        --text-muted: #94a3b8;

        --border: #e2e8f0;
        --border-soft: #f1f5f9;

        --danger: #dc2626;
        --danger-soft: #fef2f2;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .create-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .create-header-left {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }

    .create-header-icon {
        width: 46px;
        height: 46px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--primary-soft);
        color: var(--primary);

        border-radius: 12px;

        font-size: 17px;
    }

    .create-header-title {
        margin: 0;

        font-size: 21px;
        font-weight: 700;
        line-height: 1.2;

        color: var(--text);
    }

    .create-header-description {
        margin: 5px 0 0;

        font-size: 11px;
        line-height: 1.5;

        color: var(--text-muted);
    }


    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .create-back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        min-height: 39px;
        padding: 0 13px;

        border: 1px solid var(--border);
        border-radius: 9px;

        background: #fff;
        color: var(--text-soft);

        text-decoration: none;

        font-size: 10px;
        font-weight: 600;

        white-space: nowrap;

        transition:
            background .18s ease,
            border-color .18s ease,
            color .18s ease,
            transform .18s ease;
    }

    .create-back-btn:hover {
        background: var(--primary-light);
        border-color: #b9e3f5;
        color: var(--primary);

        transform: translateX(-2px);
    }


    /* =====================================================
       FORM CARD
    ===================================================== */

    .create-form-card {
        overflow: hidden;

        background: #fff;

        border: 1px solid var(--border);
        border-radius: 14px;

        box-shadow:
            0 5px 18px rgba(15, 23, 42, .035);
    }


    /* =====================================================
       FORM TOP
    ===================================================== */

    .create-form-top {
        padding: 21px 24px;

        border-bottom: 1px solid var(--border-soft);
    }

    .create-form-heading {
        display: flex;
        align-items: flex-start;
        gap: 11px;
    }

    .create-form-heading-icon {
        width: 34px;
        height: 34px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--primary-soft);
        color: var(--primary);

        border-radius: 9px;

        font-size: 12px;
    }

    .create-form-title {
        margin: 0;

        font-size: 13px;
        font-weight: 700;

        color: var(--text);
    }

    .create-form-description {
        margin: 4px 0 0;

        font-size: 10px;
        line-height: 1.5;

        color: var(--text-muted);
    }


    /* =====================================================
       ERROR
    ===================================================== */

    .create-error {
        margin: 18px 24px 0;

        padding: 12px 14px;

        background: var(--danger-soft);
        border: 1px solid #fecaca;

        border-radius: 9px;

        color: #991b1b;

        font-size: 10px;
    }

    .create-error-title {
        display: flex;
        align-items: center;
        gap: 7px;

        font-weight: 700;
    }

    .create-error ul {
        margin: 7px 0 0;
        padding-left: 19px;
    }

    .create-error li {
        margin-bottom: 3px;
        line-height: 1.4;
    }


    /* =====================================================
       FORM BODY
    ===================================================== */

    .create-form-body {
        padding: 23px 24px;
    }

    .create-section {
        margin-bottom: 20px;
    }

    .create-section:last-child {
        margin-bottom: 0;
    }

    .create-section-title {
        display: flex;
        align-items: center;
        gap: 8px;

        margin-bottom: 15px;
        padding-bottom: 9px;

        border-bottom: 1px solid var(--border-soft);

        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;

        color: var(--primary);
    }

    .create-section-title i {
        font-size: 10px;
    }


    /* =====================================================
       FORM GRID
    ===================================================== */

    .create-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .create-form-group {
        min-width: 0;
    }

    .create-form-group.full {
        grid-column: 1 / -1;
    }


    /* =====================================================
       LABEL
    ===================================================== */

    .create-label {
        display: flex;
        align-items: center;
        gap: 5px;

        margin-bottom: 7px;

        font-size: 10px;
        font-weight: 600;

        color: #334155;
    }

    .create-required {
        color: var(--danger);
        font-weight: 700;
    }

    .create-optional {
        color: var(--text-muted);

        font-size: 8px;
        font-weight: 400;
    }


    /* =====================================================
       INPUT
    ===================================================== */

    .create-input-wrapper {
        position: relative;
    }

    .create-input-icon {
        position: absolute;
        left: 13px;
        top: 50%;

        transform: translateY(-50%);

        color: #a0aec0;

        font-size: 11px;

        pointer-events: none;

        transition: color .18s ease;
    }

    .create-input,
    .create-select {
        width: 100%;
        height: 44px;

        box-sizing: border-box;

        padding: 0 13px 0 36px;

        border: 1px solid var(--border);
        border-radius: 9px;

        background: #fff;

        color: #334155;

        font-family: inherit;
        font-size: 10px;

        outline: none;

        transition:
            border-color .18s ease,
            box-shadow .18s ease,
            background .18s ease;
    }

    .create-input:hover,
    .create-select:hover {
        border-color: #cbd5e1;
    }

    .create-input::placeholder {
        color: #cbd5e1;
    }

    .create-input:focus,
    .create-select:focus {
        border-color: var(--primary);

        background: #fff;

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .08);
    }

    .create-input-wrapper:focus-within .create-input-icon {
        color: var(--primary);
    }

    .create-select {
        cursor: pointer;
    }


    /* =====================================================
       INPUT ERROR
    ===================================================== */

    .create-input.is-invalid,
    .create-select.is-invalid {
        border-color: #fca5a5;
    }

    .create-field-error {
        margin: 5px 0 0;

        font-size: 8px;
        line-height: 1.4;

        color: var(--danger);
    }


    /* =====================================================
       HELP TEXT
    ===================================================== */

    .create-help {
        display: flex;
        align-items: flex-start;
        gap: 5px;

        margin: 6px 0 0;

        font-size: 8px;
        line-height: 1.45;

        color: var(--text-muted);
    }

    .create-help i {
        margin-top: 1px;

        font-size: 8px;
    }


    /* =====================================================
       CLASS PREVIEW
    ===================================================== */

    .create-preview {
        margin-top: 21px;

        padding: 15px;

        display: flex;
        align-items: center;
        gap: 12px;

        background:
            linear-gradient(
                135deg,
                #f5fbfe 0%,
                #ffffff 100%
            );

        border: 1px solid #d7edf8;
        border-radius: 11px;
    }

    .create-preview-icon {
        width: 40px;
        height: 40px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--primary-soft);
        color: var(--primary);

        border-radius: 10px;

        font-size: 13px;
    }

    .create-preview-content {
        min-width: 0;
    }

    .create-preview-label {
        margin: 0;

        font-size: 8px;
        font-weight: 500;

        color: var(--text-muted);
    }

    .create-preview-value {
        margin: 3px 0 0;

        font-size: 14px;
        font-weight: 700;

        color: #075985;

        word-break: break-word;
    }


    /* =====================================================
       FORM FOOTER
    ===================================================== */

    .create-form-footer {
        padding: 17px 24px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        border-top: 1px solid var(--border-soft);

        background: #fcfdfe;
    }

    .create-required-info {
        display: flex;
        align-items: center;
        gap: 4px;

        font-size: 8px;

        color: var(--text-muted);
    }

    .create-required-info span {
        color: var(--danger);
        font-weight: 700;
    }

    .create-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }


    /* =====================================================
       BUTTONS
    ===================================================== */

    .create-btn {
        height: 38px;

        padding: 0 14px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        border-radius: 8px;

        font-family: inherit;
        font-size: 10px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        transition:
            background .18s ease,
            border-color .18s ease,
            color .18s ease,
            transform .18s ease,
            box-shadow .18s ease;
    }

    .create-btn-cancel {
        border: 1px solid var(--border);

        background: #fff;
        color: var(--text-soft);
    }

    .create-btn-cancel:hover {
        background: #f8fafc;
        color: var(--text);

        transform: translateY(-1px);
    }

    .create-btn-save {
        border: 1px solid var(--primary);

        background: var(--primary);
        color: #fff;

        box-shadow:
            0 4px 10px rgba(7, 136, 201, .14);
    }

    .create-btn-save:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);

        transform: translateY(-1px);

        box-shadow:
            0 6px 14px rgba(7, 136, 201, .18);
    }

    .create-btn-save:active,
    .create-btn-cancel:active {
        transform: translateY(0);
    }


    /* =====================================================
       INFORMATION CARD
    ===================================================== */

    .create-info {
        margin-top: 14px;

        padding: 13px 15px;

        display: flex;
        align-items: flex-start;
        gap: 10px;

        background: #f8fcff;

        border: 1px solid #dbeffc;
        border-radius: 10px;
    }

    .create-info-icon {
        width: 25px;
        height: 25px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        color: var(--primary);

        font-size: 11px;
    }

    .create-info-title {
        margin: 0;

        font-size: 9px;
        font-weight: 700;

        color: #075985;
    }

    .create-info-text {
        margin: 3px 0 0;

        font-size: 8px;
        line-height: 1.5;

        color: var(--text-soft);
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .create-class-page {
            max-width: 100%;
        }

        .create-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .create-back-btn {
            width: 100%;
        }

        .create-form-grid {
            grid-template-columns: 1fr;
        }

        .create-form-group.full {
            grid-column: auto;
        }
    }


    @media (max-width: 600px) {

        .create-form-top,
        .create-form-body,
        .create-form-footer {
            padding-left: 18px;
            padding-right: 18px;
        }

        .create-error {
            margin-left: 18px;
            margin-right: 18px;
        }

        .create-form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .create-required-info {
            justify-content: flex-start;
        }

        .create-actions {
            width: 100%;
        }

        .create-actions .create-btn {
            flex: 1;
        }
    }


    @media (max-width: 420px) {

        .create-header-title {
            font-size: 19px;
        }

        .create-header-description {
            font-size: 10px;
        }

        .create-form-top,
        .create-form-body,
        .create-form-footer {
            padding-left: 15px;
            padding-right: 15px;
        }

        .create-error {
            margin-left: 15px;
            margin-right: 15px;
        }

        .create-form-grid {
            gap: 15px;
        }

        .create-preview {
            padding: 13px;
        }

        .create-preview-value {
            font-size: 13px;
        }

        .create-actions {
            flex-direction: column;
        }

        .create-actions .create-btn {
            width: 100%;
        }
    }
</style>


<div class="create-class-page">

    <!-- =================================================
         HEADER
    ================================================== -->

    <div class="create-header">

        <div class="create-header-left">

            <div class="create-header-icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <div>
                <h1 class="create-header-title">
                    Tambah Kelas
                </h1>

                <p class="create-header-description">
                    Tambahkan data kelas baru ke dalam sistem.
                </p>
            </div>

        </div>


        <a
            href="{{ route('admin.classes.index') }}"
            class="create-back-btn"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Data Kelas
        </a>

    </div>


    <!-- =================================================
         FORM CARD
    ================================================== -->

    <div class="create-form-card">

        <!-- FORM HEADER -->

        <div class="create-form-top">

            <div class="create-form-heading">

                <div class="create-form-heading-icon">
                    <i class="fa-solid fa-layer-group"></i>
                </div>

                <div>

                    <h2 class="create-form-title">
                        Informasi Kelas
                    </h2>

                    <p class="create-form-description">
                        Lengkapi informasi kelas dan wali kelas
                        yang akan digunakan dalam sistem absensi.
                    </p>

                </div>

            </div>

        </div>


        <!-- =================================================
             ERROR
        ================================================== -->

        @if ($errors->any())

            <div class="create-error">

                <div class="create-error-title">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <span>
                        Terdapat kesalahan pada data
                    </span>

                </div>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =================================================
             FORM
        ================================================== -->

        <form
            method="POST"
            action="{{ route('admin.classes.store') }}"
        >

            @csrf


            <div class="create-form-body">

                <!-- =================================================
                     DATA KELAS
                ================================================== -->

                <div class="create-section">

                    <div class="create-section-title">

                        <i class="fa-solid fa-school"></i>

                        <span>
                            Data Kelas
                        </span>

                    </div>


                    <div class="create-form-grid">

                        <!-- NAMA KELAS -->

                        <div class="create-form-group full">

                            <label
                                for="className"
                                class="create-label"
                            >

                                Nama Kelas

                                <span class="create-required">
                                    *
                                </span>

                            </label>


                            <div class="create-input-wrapper">

                                <i
                                    class="fa-solid fa-users create-input-icon"
                                ></i>

                                <input
                                    type="text"
                                    name="name"
                                    id="className"
                                    class="create-input @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Contoh: X IPA 1"
                                    autocomplete="off"
                                    required
                                >

                            </div>


                            @error('name')

                                <p class="create-field-error">
                                    {{ $message }}
                                </p>

                            @else

                                <p class="create-help">

                                    <i class="fa-solid fa-circle-info"></i>

                                    <span>
                                        Gunakan nama kelas sesuai pembagian
                                        kelas di sekolah.
                                    </span>

                                </p>

                            @enderror

                        </div>


                        <!-- TINGKAT -->

                        <div class="create-form-group">

                            <label
                                for="gradeLevel"
                                class="create-label"
                            >

                                Tingkat

                                <span class="create-required">
                                    *
                                </span>

                            </label>


                            <div class="create-input-wrapper">

                                <i
                                    class="fa-solid fa-layer-group create-input-icon"
                                ></i>

                                <input
                                    type="text"
                                    name="grade_level"
                                    id="gradeLevel"
                                    class="create-input @error('grade_level') is-invalid @enderror"
                                    value="{{ old('grade_level') }}"
                                    placeholder="X / XI / XII"
                                    autocomplete="off"
                                    required
                                >

                            </div>


                            @error('grade_level')

                                <p class="create-field-error">
                                    {{ $message }}
                                </p>

                            @else

                                <p class="create-help">

                                    <i class="fa-solid fa-circle-info"></i>

                                    <span>
                                        Contoh: X, XI, atau XII.
                                    </span>

                                </p>

                            @enderror

                        </div>


                        <!-- WALI KELAS -->

                        <div class="create-form-group">

                            <label
                                for="homeroomTeacher"
                                class="create-label"
                            >

                                Wali Kelas

                                <span class="create-optional">
                                    Opsional
                                </span>

                            </label>


                            <div class="create-input-wrapper">

                                <i
                                    class="fa-solid fa-chalkboard-user create-input-icon"
                                ></i>

                                <select
                                    name="homeroom_teacher_id"
                                    id="homeroomTeacher"
                                    class="create-select @error('homeroom_teacher_id') is-invalid @enderror"
                                >

                                    <option value="">
                                        - Tidak ada -
                                    </option>


                                    @foreach ($teachers as $teacher)

                                        <option
                                            value="{{ $teacher->id }}"
                                            {{ old('homeroom_teacher_id') == $teacher->id ? 'selected' : '' }}
                                        >
                                            {{ $teacher->name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            @error('homeroom_teacher_id')

                                <p class="create-field-error">
                                    {{ $message }}
                                </p>

                            @else

                                <p class="create-help">

                                    <i class="fa-solid fa-circle-info"></i>

                                    <span>
                                        Guru yang ditugaskan sebagai wali kelas.
                                    </span>

                                </p>

                            @enderror

                        </div>

                    </div>


                    <!-- =================================================
                         LIVE PREVIEW
                    ================================================== -->

                    <div class="create-preview">

                        <div class="create-preview-icon">

                            <i class="fa-solid fa-school"></i>

                        </div>

                        <div class="create-preview-content">

                            <p class="create-preview-label">
                                Nama kelas yang akan dibuat
                            </p>

                            <p
                                class="create-preview-value"
                                id="classPreview"
                            >
                                Belum diisi
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 FOOTER
            ================================================== -->

            <div class="create-form-footer">

                <div class="create-required-info">

                    <span>*</span>

                    Wajib diisi

                </div>


                <div class="create-actions">

                    <a
                        href="{{ route('admin.classes.index') }}"
                        class="create-btn create-btn-cancel"
                    >

                        <i class="fa-solid fa-xmark"></i>

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="create-btn create-btn-save"
                    >

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Kelas

                    </button>

                </div>

            </div>

        </form>

    </div>


    <!-- =================================================
         INFORMATION
    ================================================== -->

    <div class="create-info">

        <div class="create-info-icon">

            <i class="fa-solid fa-circle-info"></i>

        </div>

        <div>

            <p class="create-info-title">
                Informasi
            </p>

            <p class="create-info-text">
                Pastikan nama kelas, tingkat, dan wali kelas
                sudah sesuai sebelum menyimpan data.
                Wali kelas masih dapat diubah kembali
                melalui menu Edit Kelas.
            </p>

        </div>

    </div>

</div>


<!-- =====================================================
     LIVE PREVIEW
====================================================== -->

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const className =
            document.getElementById('className');

        const classPreview =
            document.getElementById('classPreview');


        if (!className || !classPreview) {
            return;
        }


        function updatePreview() {

            const value =
                className.value.trim();


            if (value === '') {

                classPreview.textContent =
                    'Belum diisi';

                return;
            }


            classPreview.textContent =
                value;

        }


        className.addEventListener(
            'input',
            updatePreview
        );


        updatePreview();

    });

</script>

@endsection