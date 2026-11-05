@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')

<style>
    /* =====================================================
       EDIT CLASS PAGE
    ===================================================== */

    .edit-class-page {
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

    .edit-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .edit-header-left {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }

    .edit-header-icon {
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

    .edit-header-title {
        margin: 0;

        font-size: 21px;
        font-weight: 700;
        line-height: 1.2;

        color: var(--text);
    }

    .edit-header-description {
        margin: 5px 0 0;

        font-size: 11px;
        line-height: 1.5;

        color: var(--text-muted);
    }


    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .edit-back-btn {
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

    .edit-back-btn:hover {
        background: var(--primary-light);
        border-color: #b9e3f5;
        color: var(--primary);

        transform: translateX(-2px);
    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .edit-form-card {
        overflow: hidden;

        background: #fff;

        border: 1px solid var(--border);
        border-radius: 14px;

        box-shadow:
            0 5px 18px rgba(15, 23, 42, .035);
    }


    /* =====================================================
       FORM HEADER
    ===================================================== */

    .edit-form-top {
        padding: 21px 24px;

        border-bottom: 1px solid var(--border-soft);
    }

    .edit-form-heading {
        display: flex;
        align-items: flex-start;
        gap: 11px;
    }

    .edit-form-heading-icon {
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

    .edit-form-title {
        margin: 0;

        font-size: 13px;
        font-weight: 700;

        color: var(--text);
    }

    .edit-form-description {
        margin: 4px 0 0;

        font-size: 10px;
        line-height: 1.5;

        color: var(--text-muted);
    }


    /* =====================================================
       ERROR
    ===================================================== */

    .edit-error {
        margin: 18px 24px 0;

        padding: 12px 14px;

        background: var(--danger-soft);
        border: 1px solid #fecaca;

        border-radius: 9px;

        color: #991b1b;

        font-size: 10px;
    }

    .edit-error-title {
        display: flex;
        align-items: center;
        gap: 7px;

        font-weight: 700;
    }

    .edit-error ul {
        margin: 7px 0 0;
        padding-left: 19px;
    }

    .edit-error li {
        margin-bottom: 3px;
        line-height: 1.4;
    }


    /* =====================================================
       FORM BODY
    ===================================================== */

    .edit-form-body {
        padding: 23px 24px;
    }

    .edit-section {
        margin-bottom: 20px;
    }

    .edit-section-title {
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

    .edit-section-title i {
        font-size: 10px;
    }


    /* =====================================================
       FORM GRID
    ===================================================== */

    .edit-form-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 18px;
    }

    .edit-form-group {
        min-width: 0;
    }

    .edit-form-group.full {
        grid-column: 1 / -1;
    }


    /* =====================================================
       LABEL
    ===================================================== */

    .edit-label {
        display: flex;
        align-items: center;
        gap: 5px;

        margin-bottom: 7px;

        font-size: 10px;
        font-weight: 600;

        color: #334155;
    }

    .edit-required {
        color: var(--danger);
        font-weight: 700;
    }

    .edit-optional {
        color: var(--text-muted);

        font-size: 8px;
        font-weight: 400;
    }


    /* =====================================================
       INPUT
    ===================================================== */

    .edit-input-wrapper {
        position: relative;
    }

    .edit-input-icon {
        position: absolute;

        left: 13px;
        top: 50%;

        transform: translateY(-50%);

        color: #a0aec0;

        font-size: 11px;

        pointer-events: none;

        transition: color .18s ease;
    }

    .edit-input,
    .edit-select {
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

    .edit-input:hover,
    .edit-select:hover {
        border-color: #cbd5e1;
    }

    .edit-input::placeholder {
        color: #cbd5e1;
    }

    .edit-input:focus,
    .edit-select:focus {
        border-color: var(--primary);

        background: #fff;

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .08);
    }

    .edit-input-wrapper:focus-within .edit-input-icon {
        color: var(--primary);
    }

    .edit-select {
        cursor: pointer;
    }


    /* =====================================================
       INVALID
    ===================================================== */

    .edit-input.is-invalid,
    .edit-select.is-invalid {
        border-color: #fca5a5;
    }

    .edit-field-error {
        margin: 5px 0 0;

        font-size: 8px;
        line-height: 1.4;

        color: var(--danger);
    }


    /* =====================================================
       HELP
    ===================================================== */

    .edit-help {
        display: flex;
        align-items: flex-start;
        gap: 5px;

        margin: 6px 0 0;

        font-size: 8px;
        line-height: 1.45;

        color: var(--text-muted);
    }

    .edit-help i {
        margin-top: 1px;
        font-size: 8px;
    }


    /* =====================================================
       CURRENT DATA
    ===================================================== */

    .edit-current-data {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 10px;

        margin-top: 21px;
    }

    .edit-current-item {
        position: relative;

        padding: 13px;

        background: #f8fafc;

        border: 1px solid var(--border);

        border-radius: 10px;

        transition:
            border-color .18s ease,
            transform .18s ease,
            box-shadow .18s ease;
    }

    .edit-current-item:hover {
        border-color: #cbd5e1;

        transform: translateY(-1px);

        box-shadow:
            0 4px 12px rgba(15, 23, 42, .04);
    }

    .edit-current-label {
        margin: 0 0 6px;

        font-size: 7px;
        font-weight: 600;

        color: var(--text-muted);

        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .edit-current-value {
        margin: 0;

        font-size: 10px;
        line-height: 1.4;

        color: var(--text);

        font-weight: 600;

        word-break: break-word;
    }


    /* =====================================================
       PREVIEW
    ===================================================== */

    .edit-preview {
        margin-top: 12px;

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

    .edit-preview-icon {
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

    .edit-preview-content {
        min-width: 0;
    }

    .edit-preview-label {
        margin: 0;

        font-size: 8px;
        font-weight: 500;

        color: var(--text-muted);
    }

    .edit-preview-value {
        margin: 3px 0 0;

        font-size: 14px;
        font-weight: 700;

        color: #075985;

        word-break: break-word;
    }

    .edit-preview-teacher {
        margin: 3px 0 0;

        font-size: 8px;

        color: var(--text-muted);
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .edit-form-footer {
        padding: 17px 24px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        border-top: 1px solid var(--border-soft);

        background: #fcfdfe;
    }

    .edit-required-info {
        display: flex;
        align-items: center;
        gap: 4px;

        font-size: 8px;

        color: var(--text-muted);
    }

    .edit-required-info span {
        color: var(--danger);
        font-weight: 700;
    }

    .edit-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }


    /* =====================================================
       BUTTON
    ===================================================== */

    .edit-btn {
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

    .edit-btn-cancel {
        border: 1px solid var(--border);

        background: #fff;
        color: var(--text-soft);
    }

    .edit-btn-cancel:hover {
        background: #f8fafc;
        color: var(--text);

        transform: translateY(-1px);
    }

    .edit-btn-update {
        border: 1px solid var(--primary);

        background: var(--primary);
        color: #fff;

        box-shadow:
            0 4px 10px rgba(7, 136, 201, .14);
    }

    .edit-btn-update:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);

        transform: translateY(-1px);

        box-shadow:
            0 6px 14px rgba(7, 136, 201, .18);
    }

    .edit-btn-update:active,
    .edit-btn-cancel:active {
        transform: translateY(0);
    }


    /* =====================================================
       INFORMATION
    ===================================================== */

    .edit-info {
        margin-top: 14px;

        padding: 13px 15px;

        display: flex;
        align-items: flex-start;
        gap: 10px;

        background: #f8fcff;

        border: 1px solid #dbeffc;

        border-radius: 10px;
    }

    .edit-info-icon {
        width: 25px;
        height: 25px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        color: var(--primary);

        font-size: 11px;
    }

    .edit-info-title {
        margin: 0;

        font-size: 9px;
        font-weight: 700;

        color: #075985;
    }

    .edit-info-text {
        margin: 3px 0 0;

        font-size: 8px;
        line-height: 1.5;

        color: var(--text-soft);
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .edit-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .edit-back-btn {
            width: 100%;
        }

        .edit-form-grid {
            grid-template-columns: 1fr;
        }

        .edit-form-group.full {
            grid-column: auto;
        }

        .edit-current-data {
            grid-template-columns: 1fr;
        }
    }


    @media (max-width: 600px) {

        .edit-form-top,
        .edit-form-body,
        .edit-form-footer {
            padding-left: 18px;
            padding-right: 18px;
        }

        .edit-error {
            margin-left: 18px;
            margin-right: 18px;
        }

        .edit-form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .edit-actions {
            width: 100%;
        }

        .edit-actions .edit-btn {
            flex: 1;
        }
    }


    @media (max-width: 420px) {

        .edit-header-title {
            font-size: 19px;
        }

        .edit-header-description {
            font-size: 10px;
        }

        .edit-form-top,
        .edit-form-body,
        .edit-form-footer {
            padding-left: 15px;
            padding-right: 15px;
        }

        .edit-error {
            margin-left: 15px;
            margin-right: 15px;
        }

        .edit-form-grid {
            gap: 15px;
        }

        .edit-preview {
            padding: 13px;
        }

        .edit-preview-value {
            font-size: 13px;
        }

        .edit-actions {
            flex-direction: column;
        }

        .edit-actions .edit-btn {
            width: 100%;
        }
    }
</style>


<div class="edit-class-page">

    <!-- =================================================
         HEADER
    ================================================== -->

    <div class="edit-header">

        <div class="edit-header-left">

            <div class="edit-header-icon">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>

            <div>

                <h1 class="edit-header-title">
                    Edit Kelas
                </h1>

                <p class="edit-header-description">
                    Perbarui informasi kelas dan wali kelas.
                </p>

            </div>

        </div>


        <a
            href="{{ route('admin.classes.index') }}"
            class="edit-back-btn"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Data Kelas
        </a>

    </div>


    <!-- =================================================
         FORM CARD
    ================================================== -->

    <div class="edit-form-card">

        <!-- FORM HEADER -->

        <div class="edit-form-top">

            <div class="edit-form-heading">

                <div class="edit-form-heading-icon">
                    <i class="fa-solid fa-layer-group"></i>
                </div>

                <div>

                    <h2 class="edit-form-title">
                        Informasi Kelas
                    </h2>

                    <p class="edit-form-description">
                        Perbarui data kelas sesuai dengan
                        informasi terbaru sekolah.
                    </p>

                </div>

            </div>

        </div>


        <!-- =================================================
             ERROR
        ================================================== -->

        @if ($errors->any())

            <div class="edit-error">

                <div class="edit-error-title">

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
            action="{{ route('admin.classes.update', $class) }}"
        >

            @csrf

            @method('PUT')


            <div class="edit-form-body">

                <!-- =================================================
                     DATA KELAS
                ================================================== -->

                <div class="edit-section">

                    <div class="edit-section-title">

                        <i class="fa-solid fa-school"></i>

                        <span>
                            Data Kelas
                        </span>

                    </div>


                    <div class="edit-form-grid">

                        <!-- NAMA KELAS -->

                        <div class="edit-form-group full">

                            <label
                                for="className"
                                class="edit-label"
                            >

                                Nama Kelas

                                <span class="edit-required">
                                    *
                                </span>

                            </label>


                            <div class="edit-input-wrapper">

                                <i
                                    class="fa-solid fa-users edit-input-icon"
                                ></i>

                                <input
                                    type="text"
                                    name="name"
                                    id="className"
                                    class="edit-input @error('name') is-invalid @enderror"
                                    value="{{ old('name', $class->name) }}"
                                    placeholder="Contoh: X IPA 1"
                                    autocomplete="off"
                                    required
                                >

                            </div>


                            @error('name')

                                <p class="edit-field-error">
                                    {{ $message }}
                                </p>

                            @else

                                <p class="edit-help">

                                    <i class="fa-solid fa-circle-info"></i>

                                    <span>
                                        Nama kelas yang digunakan
                                        dalam sistem absensi.
                                    </span>

                                </p>

                            @enderror

                        </div>


                        <!-- TINGKAT -->

                        <div class="edit-form-group">

                            <label
                                for="gradeLevel"
                                class="edit-label"
                            >

                                Tingkat

                                <span class="edit-required">
                                    *
                                </span>

                            </label>


                            <div class="edit-input-wrapper">

                                <i
                                    class="fa-solid fa-layer-group edit-input-icon"
                                ></i>

                                <input
                                    type="text"
                                    name="grade_level"
                                    id="gradeLevel"
                                    class="edit-input @error('grade_level') is-invalid @enderror"
                                    value="{{ old('grade_level', $class->grade_level) }}"
                                    placeholder="X / XI / XII"
                                    autocomplete="off"
                                    required
                                >

                            </div>


                            @error('grade_level')

                                <p class="edit-field-error">
                                    {{ $message }}
                                </p>

                            @else

                                <p class="edit-help">

                                    <i class="fa-solid fa-circle-info"></i>

                                    <span>
                                        Contoh: X, XI, atau XII.
                                    </span>

                                </p>

                            @enderror

                        </div>


                        <!-- WALI KELAS -->

                        <div class="edit-form-group">

                            <label
                                for="homeroomTeacher"
                                class="edit-label"
                            >

                                Wali Kelas

                                <span class="edit-optional">
                                    Opsional
                                </span>

                            </label>


                            <div class="edit-input-wrapper">

                                <i
                                    class="fa-solid fa-chalkboard-user edit-input-icon"
                                ></i>

                                <select
                                    name="homeroom_teacher_id"
                                    id="homeroomTeacher"
                                    class="edit-select @error('homeroom_teacher_id') is-invalid @enderror"
                                >

                                    <option value="">
                                        - Tidak ada -
                                    </option>


                                    @foreach ($teachers as $teacher)

                                        <option
                                            value="{{ $teacher->id }}"
                                            {{ old('homeroom_teacher_id', $class->homeroom_teacher_id) == $teacher->id ? 'selected' : '' }}
                                        >
                                            {{ $teacher->name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            @error('homeroom_teacher_id')

                                <p class="edit-field-error">
                                    {{ $message }}
                                </p>

                            @else

                                <p class="edit-help">

                                    <i class="fa-solid fa-circle-info"></i>

                                    <span>
                                        Guru yang ditugaskan
                                        sebagai wali kelas.
                                    </span>

                                </p>

                            @enderror

                        </div>

                    </div>


                    <!-- =================================================
                         DATA SAAT INI
                    ================================================== -->

                    <div class="edit-current-data">

                        <div class="edit-current-item">

                            <p class="edit-current-label">
                                Kelas Saat Ini
                            </p>

                            <p class="edit-current-value">
                                {{ $class->name }}
                            </p>

                        </div>


                        <div class="edit-current-item">

                            <p class="edit-current-label">
                                Tingkat
                            </p>

                            <p class="edit-current-value">
                                {{ $class->grade_level }}
                            </p>

                        </div>


                        <div class="edit-current-item">

                            <p class="edit-current-label">
                                Wali Kelas
                            </p>

                            <p class="edit-current-value">
                                {{ optional($class->homeroomTeacher)->name ?? 'Belum ditentukan' }}
                            </p>

                        </div>

                    </div>


                    <!-- =================================================
                         LIVE PREVIEW
                    ================================================== -->

                    <div class="edit-preview">

                        <div class="edit-preview-icon">

                            <i class="fa-solid fa-school"></i>

                        </div>

                        <div class="edit-preview-content">

                            <p class="edit-preview-label">
                                Preview perubahan
                            </p>

                            <p
                                class="edit-preview-value"
                                id="classPreview"
                            >
                                {{ old('name', $class->name) }}
                            </p>

                            <p
                                class="edit-preview-teacher"
                                id="teacherPreview"
                            >
                                Wali Kelas:
                                {{ optional($class->homeroomTeacher)->name ?? 'Belum ditentukan' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 FOOTER
            ================================================== -->

            <div class="edit-form-footer">

                <div class="edit-required-info">

                    <span>*</span>

                    Wajib diisi

                </div>


                <div class="edit-actions">

                    <a
                        href="{{ route('admin.classes.index') }}"
                        class="edit-btn edit-btn-cancel"
                    >

                        <i class="fa-solid fa-xmark"></i>

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="edit-btn edit-btn-update"
                    >

                        <i class="fa-solid fa-floppy-disk"></i>

                        Perbarui Kelas

                    </button>

                </div>

            </div>

        </form>

    </div>


    <!-- =================================================
         INFORMATION
    ================================================== -->

    <div class="edit-info">

        <div class="edit-info-icon">

            <i class="fa-solid fa-circle-info"></i>

        </div>

        <div>

            <p class="edit-info-title">
                Informasi
            </p>

            <p class="edit-info-text">
                Perubahan data kelas akan langsung diterapkan
                setelah tombol <strong>Perbarui Kelas</strong>
                ditekan. Pastikan nama kelas, tingkat, dan
                wali kelas sudah sesuai.
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

        const teacherSelect =
            document.getElementById('homeroomTeacher');

        const classPreview =
            document.getElementById('classPreview');

        const teacherPreview =
            document.getElementById('teacherPreview');


        if (
            !className ||
            !teacherSelect ||
            !classPreview ||
            !teacherPreview
        ) {
            return;
        }


        function updatePreview() {

            /* =========================
               NAMA KELAS
            ========================= */

            const classValue =
                className.value.trim();


            classPreview.textContent =
                classValue !== ''
                    ? classValue
                    : 'Belum diisi';


            /* =========================
               WALI KELAS
            ========================= */

            const selectedOption =
                teacherSelect.options[
                    teacherSelect.selectedIndex
                ];


            if (
                !selectedOption ||
                selectedOption.value === ''
            ) {

                teacherPreview.textContent =
                    'Wali Kelas: Belum ditentukan';

            } else {

                teacherPreview.textContent =
                    'Wali Kelas: ' +
                    selectedOption.text.trim();

            }

        }


        className.addEventListener(
            'input',
            updatePreview
        );


        teacherSelect.addEventListener(
            'change',
            updatePreview
        );


        updatePreview();

    });

</script>

@endsection