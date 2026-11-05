@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')

<style>
    /* =========================================================
       EDIT STUDENT PAGE
    ========================================================= */

    .edit-student-page {
        width: 100%;
        max-width: 960px;
        margin: 0 auto;
        padding-bottom: 30px;

        --primary: #0788c9;
        --primary-dark: #0676ad;
        --primary-soft: #eef9fe;

        --text: #1e293b;
        --text-soft: #64748b;
        --text-muted: #94a3b8;

        --border: #e2e8f0;
        --border-soft: #f1f5f9;

        --success: #16a34a;
        --danger: #ef4444;

        --radius: 14px;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .edit-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 0;
    }

    .header-icon {
        width: 48px;
        height: 48px;
        flex: 0 0 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: var(--primary-soft);
        color: var(--primary);

        font-size: 18px;
    }

    .page-title {
        margin: 0;

        color: var(--text);

        font-size: 22px;
        font-weight: 750;

        letter-spacing: -0.3px;
        line-height: 1.2;
    }

    .page-description {
        margin: 5px 0 0;

        color: var(--text-muted);

        font-size: 13px;
        line-height: 1.5;
    }


    /* =========================================================
       BACK BUTTON
    ========================================================= */

    .back-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        min-height: 40px;
        padding: 0 14px;

        border: 1px solid var(--border);
        border-radius: 9px;

        background: #fff;
        color: var(--text-soft);

        text-decoration: none;

        font-size: 12px;
        font-weight: 600;

        white-space: nowrap;

        transition:
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            transform .2s ease;
    }

    .back-button:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: var(--text);

        transform: translateX(-2px);
    }


    /* =========================================================
       MAIN FORM CARD
    ========================================================= */

    .form-card {
        overflow: hidden;

        background: #fff;

        border: 1px solid var(--border);
        border-radius: var(--radius);

        box-shadow:
            0 8px 30px rgba(15, 23, 42, .045);
    }


    /* =========================================================
       FORM HEADER
    ========================================================= */

    .form-header {
        padding: 22px 26px;

        border-bottom: 1px solid var(--border-soft);

        background:
            linear-gradient(
                180deg,
                #ffffff 0%,
                #fcfdff 100%
            );
    }

    .form-title {
        margin: 0;

        color: var(--text);

        font-size: 15px;
        font-weight: 700;

        line-height: 1.3;
    }

    .form-description {
        margin: 5px 0 0;

        color: var(--text-muted);

        font-size: 12px;
        line-height: 1.55;
    }


    /* =========================================================
       ERROR BOX
    ========================================================= */

    .error-box {
        margin: 20px 26px 0;
        padding: 14px 16px;

        border: 1px solid #fecaca;
        border-radius: 10px;

        background: #fff7f7;
        color: #991b1b;

        font-size: 12px;
        line-height: 1.5;
    }

    .error-box strong {
        display: flex;
        align-items: center;
        gap: 7px;

        font-size: 12px;
        font-weight: 700;
    }

    .error-box ul {
        margin: 8px 0 0;
        padding-left: 20px;
    }

    .error-box li {
        margin-bottom: 3px;
    }


    /* =========================================================
       FORM BODY
    ========================================================= */

    .form-body {
        padding: 26px;
    }

    .form-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 20px;
    }


    /* =========================================================
       SECTION TITLE
    ========================================================= */

    .section-title {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        gap: 10px;

        margin-top: 4px;
        padding: 0 0 11px;

        border-bottom: 1px solid var(--border-soft);

        color: var(--text);

        font-size: 13px;
        font-weight: 700;
    }

    .section-title:not(:first-child) {
        margin-top: 8px;
    }

    .section-title i {
        width: 30px;
        height: 30px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        background: var(--primary-soft);
        color: var(--primary);

        font-size: 12px;
    }


    /* =========================================================
       FORM GROUP
    ========================================================= */

    .form-group {
        width: 100%;
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .form-label {
        display: flex;
        align-items: center;
        gap: 6px;

        margin: 0 0 8px;

        color: #334155;

        font-size: 12px;
        font-weight: 650;

        line-height: 1.4;
    }

    .required {
        color: var(--danger);
        font-weight: 700;
    }

    .optional {
        display: inline-flex;
        align-items: center;

        padding: 2px 7px;

        border-radius: 20px;

        background: #f1f5f9;
        color: var(--text-muted);

        font-size: 9px;
        font-weight: 500;
    }


    /* =========================================================
       INPUT WRAPPER
    ========================================================= */

    .input-wrapper {
        position: relative;
        width: 100%;
    }

    .input-icon {
        position: absolute;

        left: 14px;
        top: 50%;

        z-index: 2;

        transform: translateY(-50%);

        color: #94a3b8;

        font-size: 13px;

        pointer-events: none;

        transition: color .2s ease;
    }

    .input-wrapper:focus-within .input-icon {
        color: var(--primary);
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .form-input,
    .form-select {
        width: 100%;
        height: 46px;

        box-sizing: border-box;

        padding: 0 14px 0 40px;

        border: 1px solid var(--border);
        border-radius: 9px;

        outline: none;

        background: #fff;
        color: #334155;

        font-family: inherit;
        font-size: 13px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .form-input:hover,
    .form-select:hover {
        border-color: #cbd5e1;
    }

    .form-input:focus,
    .form-select:focus {
        border-color: var(--primary);

        background: #fff;

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .09);
    }

    .form-input::placeholder {
        color: #cbd5e1;
    }

    .form-select {
        cursor: pointer;

        appearance: none;
        -webkit-appearance: none;

        padding-right: 40px;

        background-image:
            linear-gradient(
                45deg,
                transparent 50%,
                #94a3b8 50%
            ),
            linear-gradient(
                135deg,
                #94a3b8 50%,
                transparent 50%
            );

        background-position:
            calc(100% - 17px) 19px,
            calc(100% - 12px) 19px;

        background-size:
            5px 5px,
            5px 5px;

        background-repeat: no-repeat;
    }


    /* =========================================================
       HELP TEXT
    ========================================================= */

    .input-help {
        margin: 6px 0 0;

        color: var(--text-muted);

        font-size: 10px;
        line-height: 1.45;
    }


    /* =========================================================
       VALIDATION
    ========================================================= */

    .form-input.is-invalid,
    .form-select.is-invalid {
        border-color: #fca5a5;
    }

    .field-error {
        margin: 5px 0 0;

        color: #dc2626;

        font-size: 10px;
        line-height: 1.4;
    }


    /* =========================================================
       STATUS CARD
    ========================================================= */

    .status-card {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        padding: 17px;

        border: 1px solid var(--border);
        border-radius: 11px;

        background: #f8fafc;

        transition:
            border-color .2s ease,
            background .2s ease;
    }

    .status-card:hover {
        border-color: #cbd5e1;
        background: #f9fafb;
    }

    .status-info {
        display: flex;
        align-items: center;
        gap: 12px;

        min-width: 0;
    }

    .status-icon {
        width: 40px;
        height: 40px;

        flex: 0 0 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #ecfdf5;
        color: var(--success);

        font-size: 14px;
    }

    .status-title {
        margin: 0;

        color: #334155;

        font-size: 12px;
        font-weight: 700;

        line-height: 1.4;
    }

    .status-description {
        margin: 4px 0 0;

        color: var(--text-muted);

        font-size: 10px;
        line-height: 1.45;
    }


    /* =========================================================
       TOGGLE
    ========================================================= */

    .switch-wrapper {
        position: relative;

        display: inline-flex;
        align-items: center;

        flex: 0 0 auto;

        cursor: pointer;
    }

    .switch-input {
        position: absolute;

        width: 1px;
        height: 1px;

        opacity: 0;
        pointer-events: none;
    }

    .switch {
        position: relative;

        display: block;

        width: 48px;
        height: 27px;

        border-radius: 30px;

        background: #cbd5e1;

        cursor: pointer;

        transition: background .2s ease;
    }

    .switch::after {
        content: "";

        position: absolute;

        top: 3px;
        left: 3px;

        width: 21px;
        height: 21px;

        border-radius: 50%;

        background: #fff;

        box-shadow:
            0 2px 5px rgba(15, 23, 42, .18);

        transition:
            transform .2s ease;
    }

    .switch-input:checked + .switch {
        background: var(--success);
    }

    .switch-input:checked + .switch::after {
        transform: translateX(21px);
    }

    .switch-input:focus-visible + .switch {
        box-shadow:
            0 0 0 3px rgba(22, 163, 74, .15);
    }


    /* =========================================================
       FORM FOOTER
    ========================================================= */

    .form-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        padding: 18px 26px;

        border-top: 1px solid var(--border-soft);

        background: #fcfdff;
    }

    .required-info {
        color: var(--text-muted);

        font-size: 10px;
        line-height: 1.4;
    }

    .required-info span {
        color: var(--danger);
        font-weight: 700;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 9px;
    }


    /* =========================================================
       BUTTONS
    ========================================================= */

    .btn-cancel,
    .btn-update {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 7px;

        min-height: 40px;

        padding: 0 15px;

        border-radius: 9px;

        font-family: inherit;
        font-size: 12px;
        font-weight: 650;

        text-decoration: none;

        cursor: pointer;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .btn-cancel {
        border: 1px solid var(--border);

        background: #fff;
        color: var(--text-soft);
    }

    .btn-cancel:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: var(--text);

        transform: translateY(-1px);
    }

    .btn-update {
        border: 1px solid var(--primary);

        background: var(--primary);
        color: #fff;
    }

    .btn-update:hover {
        border-color: var(--primary-dark);
        background: var(--primary-dark);

        box-shadow:
            0 5px 14px rgba(7, 136, 201, .18);

        transform: translateY(-1px);
    }

    .btn-update:active,
    .btn-cancel:active {
        transform: translateY(0);
    }


    /* =========================================================
       INFO CARD
    ========================================================= */

    .info-card {
        display: flex;
        align-items: flex-start;
        gap: 11px;

        margin-top: 15px;
        padding: 14px 16px;

        border: 1px solid #dbeffc;
        border-radius: 11px;

        background: #f8fcff;
    }

    .info-icon {
        width: 28px;
        height: 28px;

        flex: 0 0 28px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        background: #e8f6fd;
        color: var(--primary);

        font-size: 12px;
    }

    .info-title {
        margin: 0;

        color: #075985;

        font-size: 11px;
        font-weight: 700;
    }

    .info-text {
        margin: 3px 0 0;

        color: #64748b;

        font-size: 10px;
        line-height: 1.55;
    }

    .info-text strong {
        color: #475569;
        font-weight: 700;
    }


    /* =========================================================
       RESPONSIVE TABLET
    ========================================================= */

    @media (max-width: 768px) {

        .edit-student-page {
            max-width: 100%;
        }

        .edit-header {
            align-items: flex-start;
        }

        .form-body {
            padding: 22px;
        }

        .form-header {
            padding: 20px 22px;
        }

        .form-footer {
            padding: 17px 22px;
        }

    }


    /* =========================================================
       RESPONSIVE MOBILE
    ========================================================= */

    @media (max-width: 650px) {

        .edit-header {
            flex-direction: column;
            align-items: stretch;

            gap: 14px;
        }

        .header-left {
            align-items: flex-start;
        }

        .header-icon {
            width: 44px;
            height: 44px;
            flex-basis: 44px;
        }

        .page-title {
            font-size: 20px;
        }

        .page-description {
            font-size: 12px;
        }

        .back-button {
            width: 100%;
        }

        .form-card {
            border-radius: 12px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .form-group.full,
        .section-title,
        .status-card {
            grid-column: auto;
        }

        .form-header {
            padding: 18px;
        }

        .form-body {
            padding: 18px;
        }

        .error-box {
            margin: 16px 18px 0;
        }

        .status-card {
            align-items: flex-start;
        }

        .form-footer {
            flex-direction: column;
            align-items: stretch;

            padding: 16px 18px;
        }

        .required-info {
            text-align: left;
        }

        .form-actions {
            width: 100%;
        }

        .btn-cancel,
        .btn-update {
            flex: 1;
        }

    }


    /* =========================================================
       SMALL MOBILE
    ========================================================= */

    @media (max-width: 420px) {

        .header-left {
            gap: 11px;
        }

        .header-icon {
            width: 42px;
            height: 42px;
            flex-basis: 42px;

            border-radius: 11px;
        }

        .page-title {
            font-size: 18px;
        }

        .page-description {
            font-size: 11px;
        }

        .form-input,
        .form-select {
            height: 44px;
            font-size: 12px;
        }

        .status-card {
            padding: 14px;
        }

        .status-info {
            gap: 9px;
        }

        .status-icon {
            width: 36px;
            height: 36px;
            flex-basis: 36px;
        }

        .status-title {
            font-size: 11px;
        }

        .form-actions {
            gap: 7px;
        }

        .btn-cancel,
        .btn-update {
            min-height: 39px;
            padding: 0 11px;
            font-size: 11px;
        }

    }
</style>


<div class="edit-student-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="edit-header">

        <div class="header-left">

            <div class="header-icon">
                <i class="fa-solid fa-user-pen"></i>
            </div>

            <div>
                <h1 class="page-title">
                    Edit Siswa
                </h1>

                <p class="page-description">
                    Perbarui informasi data siswa.
                </p>
            </div>

        </div>


        <a
            href="{{ route('admin.students.index') }}"
            class="back-button"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Data Siswa
        </a>

    </div>


    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="form-card">

        <div class="form-header">

            <h2 class="form-title">
                Informasi Siswa
            </h2>

            <p class="form-description">
                Periksa kembali informasi siswa sebelum menyimpan perubahan.
            </p>

        </div>


        {{-- =================================================
             ERROR
        ================================================== --}}

        @if ($errors->any())

            <div class="error-box">

                <strong>
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Terdapat kesalahan pada data:
                </strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        {{-- =================================================
             FORM
        ================================================== --}}

        <form
            method="POST"
            action="{{ route('admin.students.update', $student) }}"
        >

            @csrf
            @method('PUT')


            <div class="form-body">

                <div class="form-grid">


                    {{-- =====================================
                         DATA AKADEMIK
                    ====================================== --}}

                    <div class="section-title">

                        <i class="fa-solid fa-school"></i>

                        <span>Data Akademik</span>

                    </div>


                    {{-- NIS --}}

                    <div class="form-group">

                        <label class="form-label">
                            NIS
                            <span class="required">*</span>
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-id-card input-icon"></i>

                            <input
                                type="text"
                                name="nis"
                                class="form-input {{ $errors->has('nis') ? 'is-invalid' : '' }}"
                                value="{{ old('nis', $student->nis) }}"
                                placeholder="Masukkan NIS siswa"
                                required
                                autocomplete="off"
                            >

                        </div>

                        @error('nis')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @else
                            <p class="input-help">
                                Nomor induk siswa.
                            </p>
                        @enderror

                    </div>


                    {{-- KELAS --}}

                    <div class="form-group">

                        <label class="form-label">
                            Kelas
                            <span class="required">*</span>
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-chalkboard input-icon"></i>

                            <select
                                name="class_id"
                                class="form-select {{ $errors->has('class_id') ? 'is-invalid' : '' }}"
                                required
                            >

                                <option value="">
                                    Pilih kelas
                                </option>

                                @foreach ($classes as $class)

                                    <option
                                        value="{{ $class->id }}"
                                        {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}
                                    >
                                        {{ $class->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        @error('class_id')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @else
                            <p class="input-help">
                                Kelas siswa saat ini.
                            </p>
                        @enderror

                    </div>


                    {{-- NAMA --}}

                    <div class="form-group full">

                        <label class="form-label">
                            Nama Lengkap
                            <span class="required">*</span>
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-user input-icon"></i>

                            <input
                                type="text"
                                name="name"
                                class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name', $student->name) }}"
                                placeholder="Masukkan nama lengkap siswa"
                                required
                                autocomplete="name"
                            >

                        </div>

                        @error('name')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @else
                            <p class="input-help">
                                Gunakan nama lengkap sesuai data administrasi sekolah.
                            </p>
                        @enderror

                    </div>


                    {{-- GENDER --}}

                    <div class="form-group">

                        <label class="form-label">
                            Jenis Kelamin
                            <span class="required">*</span>
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-venus-mars input-icon"></i>

                            <select
                                name="gender"
                                class="form-select {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                                required
                            >

                                <option
                                    value="L"
                                    {{ old('gender', $student->gender) == 'L' ? 'selected' : '' }}
                                >
                                    Laki-laki
                                </option>

                                <option
                                    value="P"
                                    {{ old('gender', $student->gender) == 'P' ? 'selected' : '' }}
                                >
                                    Perempuan
                                </option>

                            </select>

                        </div>

                        @error('gender')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- =====================================
                         DATA ORANG TUA / WALI
                    ====================================== --}}

                    <div class="section-title">

                        <i class="fa-solid fa-people-roof"></i>

                        <span>Data Orang Tua / Wali</span>

                    </div>


                    {{-- NAMA ORANG TUA --}}

                    <div class="form-group">

                        <label class="form-label">

                            Nama Orang Tua / Wali

                            <span class="optional">
                                Opsional
                            </span>

                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-user-tie input-icon"></i>

                            <input
                                type="text"
                                name="parent_name"
                                class="form-input {{ $errors->has('parent_name') ? 'is-invalid' : '' }}"
                                value="{{ old('parent_name', $student->parent_name) }}"
                                placeholder="Nama orang tua / wali"
                                autocomplete="name"
                            >

                        </div>

                        @error('parent_name')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- TELEPON --}}

                    <div class="form-group">

                        <label class="form-label">

                            No. HP Orang Tua / Wali

                            <span class="optional">
                                Opsional
                            </span>

                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-phone input-icon"></i>

                            <input
                                type="text"
                                name="parent_phone"
                                class="form-input {{ $errors->has('parent_phone') ? 'is-invalid' : '' }}"
                                value="{{ old('parent_phone', $student->parent_phone) }}"
                                placeholder="08xxxxxxxxxx"
                                autocomplete="tel"
                            >

                        </div>

                        @error('parent_phone')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @else
                            <p class="input-help">
                                Nomor yang dapat dihubungi sekolah.
                            </p>
                        @enderror

                    </div>


                    {{-- =====================================
                         STATUS SISWA
                    ====================================== --}}

                    <div class="section-title">

                        <i class="fa-solid fa-toggle-on"></i>

                        <span>Status Siswa</span>

                    </div>


                    <div class="status-card">

                        <div class="status-info">

                            <div class="status-icon">
                                <i class="fa-solid fa-user-check"></i>
                            </div>

                            <div>

                                <p class="status-title">
                                    Status Keaktifan Siswa
                                </p>

                                <p class="status-description">
                                    Siswa aktif dapat digunakan dalam proses absensi.
                                </p>

                            </div>

                        </div>


                        <label
                            class="switch-wrapper"
                            title="Ubah status siswa"
                        >

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                class="switch-input"
                                {{ old('is_active', $student->is_active) ? 'checked' : '' }}
                            >

                            <span class="switch"></span>

                        </label>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 FORM FOOTER
            ================================================== --}}

            <div class="form-footer">

                <div class="required-info">
                    <span>*</span>
                    Wajib diisi
                </div>


                <div class="form-actions">

                    <a
                        href="{{ route('admin.students.index') }}"
                        class="btn-cancel"
                    >
                        <i class="fa-solid fa-xmark"></i>
                        Batal
                    </a>


                    <button
                        type="submit"
                        class="btn-update"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>
                        Perbarui Data
                    </button>

                </div>

            </div>

        </form>

    </div>


    {{-- =====================================================
         INFO CARD
    ====================================================== --}}

    <div class="info-card">

        <div class="info-icon">
            <i class="fa-solid fa-circle-info"></i>
        </div>

        <div>

            <p class="info-title">
                Informasi
            </p>

            <p class="info-text">
                Perubahan data akan langsung disimpan setelah tombol
                <strong>Perbarui Data</strong> ditekan.
                Pastikan informasi siswa sudah benar sebelum menyimpan.
            </p>

        </div>

    </div>

</div>

@endsection