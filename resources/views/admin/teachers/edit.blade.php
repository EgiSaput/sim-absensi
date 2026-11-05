@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')

<style>
    /* =====================================================
       EDIT TEACHER - MODERN UI
    ===================================================== */

    .edit-teacher-page {
        width: 100%;
        max-width: 960px;
        margin: 0 auto;
        padding-bottom: 30px;

        --primary: #0788c9;
        --primary-dark: #0676ad;
        --primary-soft: #eaf7fd;

        --text: #172b4d;
        --text-secondary: #475569;
        --text-muted: #94a3b8;

        --border: #e2e8f0;
        --border-soft: #edf2f7;

        --surface: #ffffff;
        --surface-soft: #f8fafc;

        --success: #16a34a;
        --success-soft: #ecfdf5;

        --danger: #dc2626;
    }


    /* =====================================================
       HEADER
    ===================================================== */

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
        gap: 13px;
        min-width: 0;
    }

    .header-icon {
        width: 48px;
        height: 48px;
        flex: 0 0 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: linear-gradient(
            135deg,
            var(--primary-soft),
            #f2faff
        );

        color: var(--primary);

        border: 1px solid #d7effb;
        border-radius: 13px;

        font-size: 17px;

        box-shadow: 0 5px 15px rgba(7, 136, 201, .07);
    }

    .page-title {
        margin: 0;

        color: var(--text);

        font-size: 21px;
        font-weight: 750;
        line-height: 1.25;
        letter-spacing: -.35px;
    }

    .page-description {
        margin: 5px 0 0;

        color: var(--text-muted);

        font-size: 11px;
        line-height: 1.5;
    }


    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .back-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        min-height: 38px;
        padding: 0 14px;

        background: var(--surface);

        border: 1px solid var(--border);
        border-radius: 9px;

        color: var(--text-secondary);

        text-decoration: none;

        font-size: 10px;
        font-weight: 600;

        white-space: nowrap;

        transition:
            .2s ease;
    }

    .back-button:hover {
        color: var(--primary);
        background: #f8fcff;
        border-color: #b9e5f8;

        transform: translateY(-1px);
        box-shadow: 0 5px 14px rgba(15, 23, 42, .05);
    }


    /* =====================================================
       MAIN FORM CARD
    ===================================================== */

    .form-card {
        position: relative;
        overflow: hidden;

        background: var(--surface);

        border: 1px solid var(--border);
        border-radius: 16px;

        padding: 26px;

        box-shadow:
            0 8px 28px rgba(15, 23, 42, .045);
    }

    .form-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 3px;

        background: linear-gradient(
            90deg,
            var(--primary),
            #42b8e8,
            #8ddcf7
        );
    }


    /* =====================================================
       FORM HEADER
    ===================================================== */

    .form-header {
        display: flex;
        align-items: center;
        gap: 12px;

        margin-bottom: 22px;
        padding-bottom: 18px;

        border-bottom: 1px solid var(--border-soft);
    }

    .form-header-icon {
        width: 36px;
        height: 36px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--primary-soft);
        color: var(--primary);

        border-radius: 9px;

        font-size: 12px;
    }

    .form-title {
        margin: 0;

        color: var(--text);

        font-size: 14px;
        font-weight: 700;
    }

    .form-description {
        margin: 4px 0 0;

        color: var(--text-muted);

        font-size: 9px;
        line-height: 1.5;
    }


    /* =====================================================
       ERROR
    ===================================================== */

    .error-box {
        display: flex;
        align-items: flex-start;
        gap: 10px;

        margin-bottom: 20px;
        padding: 13px 14px;

        background: #fff7f7;

        border: 1px solid #fecaca;
        border-radius: 10px;

        color: #991b1b;

        font-size: 9px;
        line-height: 1.5;
    }

    .error-box > i {
        margin-top: 1px;
        color: var(--danger);
        font-size: 12px;
    }

    .error-box strong {
        font-weight: 700;
    }

    .error-box ul {
        margin: 5px 0 0;
        padding-left: 16px;
    }

    .error-box li {
        margin-bottom: 2px;
    }


    /* =====================================================
       FORM GRID
    ===================================================== */

    .form-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 19px 18px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }


    /* =====================================================
       SECTION
    ===================================================== */

    .section-title {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        gap: 8px;

        margin-top: 2px;
        padding-bottom: 9px;

        border-bottom: 1px solid var(--border-soft);

        color: var(--primary);

        font-size: 10px;
        font-weight: 700;
        letter-spacing: .15px;
    }

    .section-title i {
        width: 25px;
        height: 25px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--primary-soft);

        border-radius: 7px;

        font-size: 10px;
    }


    /* =====================================================
       LABEL
    ===================================================== */

    .form-label {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-bottom: 7px;

        color: #334155;

        font-size: 10px;
        font-weight: 650;
    }

    .required {
        color: #ef4444;
    }

    .optional {
        padding: 2px 6px;

        background: #f1f5f9;

        border-radius: 5px;

        color: var(--text-muted);

        font-size: 7px;
        font-weight: 500;
    }


    /* =====================================================
       INPUT
    ===================================================== */

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;

        left: 13px;
        top: 50%;

        transform: translateY(-50%);

        color: #a0aec0;

        font-size: 11px;

        pointer-events: none;

        transition: .2s ease;
    }

    .form-input {
        width: 100%;
        height: 43px;

        box-sizing: border-box;

        padding: 10px 13px 10px 36px;

        background: #fff;

        border: 1px solid var(--border);
        border-radius: 9px;

        color: #334155;

        font-family: inherit;
        font-size: 10px;

        outline: none;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .form-input:hover {
        border-color: #cbd5e1;
    }

    .form-input:focus {
        background: #fff;

        border-color: var(--primary);

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .08);
    }

    .input-wrapper:focus-within .input-icon {
        color: var(--primary);
    }

    .form-input::placeholder {
        color: #cbd5e1;
    }


    /* =====================================================
       HELP TEXT
    ===================================================== */

    .input-help {
        display: flex;
        align-items: center;
        gap: 5px;

        margin: 6px 0 0;

        color: var(--text-muted);

        font-size: 8px;
        line-height: 1.4;
    }

    .input-help i {
        font-size: 7px;
    }


    /* =====================================================
       STATUS CARD
    ===================================================== */

    .status-card {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        padding: 15px 16px;

        background:
            linear-gradient(
                135deg,
                #f8fafc,
                #fbfdff
            );

        border: 1px solid var(--border);

        border-radius: 11px;

        transition: .2s ease;
    }

    .status-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 5px 16px rgba(15, 23, 42, .04);
    }

    .status-info {
        display: flex;
        align-items: center;
        gap: 11px;

        min-width: 0;
    }

    .status-icon {
        width: 38px;
        height: 38px;
        flex: 0 0 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--success-soft);

        border: 1px solid #d1fae5;
        border-radius: 10px;

        color: var(--success);

        font-size: 12px;
    }

    .status-title {
        margin: 0;

        color: #334155;

        font-size: 10px;
        font-weight: 700;
    }

    .status-description {
        margin: 3px 0 0;

        color: var(--text-muted);

        font-size: 8px;
        line-height: 1.4;
    }


    /* =====================================================
       SWITCH
    ===================================================== */

    .switch-wrapper {
        position: relative;

        display: inline-flex;
        align-items: center;

        flex-shrink: 0;
    }

    .switch-input {
        position: absolute;

        width: 1px;
        height: 1px;

        opacity: 0;
    }

    .switch {
        position: relative;

        display: block;

        width: 46px;
        height: 25px;

        background: #cbd5e1;

        border-radius: 30px;

        cursor: pointer;

        transition: .2s ease;
    }

    .switch::after {
        content: "";

        position: absolute;

        width: 19px;
        height: 19px;

        top: 3px;
        left: 3px;

        background: #fff;

        border-radius: 50%;

        box-shadow:
            0 1px 4px rgba(15, 23, 42, .22);

        transition: .2s ease;
    }

    .switch-input:checked + .switch {
        background: var(--success);
    }

    .switch-input:checked + .switch::after {
        transform: translateX(21px);
    }

    .switch-input:focus-visible + .switch {
        outline: 3px solid rgba(22, 163, 74, .15);
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .form-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        margin-top: 25px;
        padding-top: 18px;

        border-top: 1px solid var(--border-soft);
    }

    .required-info {
        display: flex;
        align-items: center;
        gap: 4px;

        color: var(--text-muted);

        font-size: 8px;
    }

    .required-info span {
        color: #ef4444;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }


    /* =====================================================
       BUTTON
    ===================================================== */

    .btn-cancel,
    .btn-update {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        min-height: 39px;

        border-radius: 9px;

        font-family: inherit;
        font-size: 10px;
        font-weight: 650;

        text-decoration: none;

        cursor: pointer;

        transition:
            .2s ease;
    }

    .btn-cancel {
        padding: 0 15px;

        background: #fff;

        border: 1px solid var(--border);

        color: var(--text-secondary);
    }

    .btn-cancel:hover {
        background: var(--surface-soft);
        border-color: #cbd5e1;
        color: #334155;

        transform: translateY(-1px);
    }

    .btn-update {
        padding: 0 17px;

        border: none;

        background: linear-gradient(
            135deg,
            var(--primary),
            var(--primary-dark)
        );

        color: #fff;

        box-shadow:
            0 5px 14px rgba(7, 136, 201, .18);
    }

    .btn-update:hover {
        transform: translateY(-1px);

        box-shadow:
            0 8px 18px rgba(7, 136, 201, .23);
    }

    .btn-update:active,
    .btn-cancel:active,
    .back-button:active {
        transform: translateY(0);
    }


    /* =====================================================
       INFO CARD
    ===================================================== */

    .info-card {
        display: flex;
        align-items: flex-start;
        gap: 11px;

        margin-top: 14px;
        padding: 13px 15px;

        background:
            linear-gradient(
                135deg,
                #f7fcff,
                #fbfdff
            );

        border: 1px solid #dbeffc;

        border-radius: 11px;
    }

    .info-icon {
        width: 26px;
        height: 26px;
        flex: 0 0 26px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--primary-soft);

        border-radius: 7px;

        color: var(--primary);

        font-size: 10px;
    }

    .info-title {
        margin: 0;

        color: #075985;

        font-size: 9px;
        font-weight: 700;
    }

    .info-text {
        margin: 3px 0 0;

        color: var(--text-secondary);

        font-size: 8px;
        line-height: 1.55;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .edit-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .back-button {
            width: 100%;
        }

        .form-card {
            padding: 21px;
            border-radius: 14px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full,
        .section-title,
        .status-card {
            grid-column: auto;
        }

        .status-card {
            align-items: flex-start;
            flex-direction: column;
        }

        .status-info {
            width: 100%;
        }

        .switch-wrapper {
            align-self: flex-end;
        }

        .form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .form-actions {
            width: 100%;
        }

        .form-actions a,
        .form-actions button {
            flex: 1;
        }
    }


    @media (max-width: 480px) {

        .edit-teacher-page {
            padding-bottom: 20px;
        }

        .header-left {
            align-items: flex-start;
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
            font-size: 9px;
        }

        .form-card {
            padding: 17px;
        }

        .form-header {
            margin-bottom: 19px;
        }

        .status-card {
            padding: 13px;
        }

        .info-card {
            padding: 12px;
        }
    }


    @media (max-width: 360px) {

        .form-card {
            padding: 14px;
        }

        .form-actions {
            flex-direction: column;
        }

        .form-actions a,
        .form-actions button {
            width: 100%;
        }

        .btn-cancel,
        .btn-update {
            width: 100%;
        }
    }


    /* =====================================================
       REDUCED MOTION
    ===================================================== */

    @media (prefers-reduced-motion: reduce) {

        .back-button,
        .btn-cancel,
        .btn-update,
        .status-card,
        .form-input {
            transition: none;
        }
    }
</style>


<div class="edit-teacher-page">

    {{-- =================================================
         HEADER
    ================================================== --}}

    <div class="edit-header">

        <div class="header-left">

            <div class="header-icon">
                <i class="fa-solid fa-user-pen"></i>
            </div>

            <div>
                <h1 class="page-title">
                    Edit Guru
                </h1>

                <p class="page-description">
                    Perbarui informasi data guru dengan benar.
                </p>
            </div>

        </div>


        <a
            href="{{ route('admin.teachers.index') }}"
            class="back-button"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Data Guru
        </a>

    </div>


    {{-- =================================================
         FORM CARD
    ================================================== --}}

    <div class="form-card">

        <div class="form-header">

            <div class="form-header-icon">
                <i class="fa-solid fa-id-card"></i>
            </div>

            <div>
                <h2 class="form-title">
                    Informasi Guru
                </h2>

                <p class="form-description">
                    Periksa kembali data sebelum menyimpan perubahan.
                </p>
            </div>

        </div>


        {{-- =================================================
             ERROR VALIDATION
        ================================================== --}}

        @if ($errors->any())

            <div class="error-box">

                <i class="fa-solid fa-circle-exclamation"></i>

                <div>

                    <strong>
                        Terdapat kesalahan pada data:
                    </strong>

                    <ul>
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
            action="{{ route('admin.teachers.update', $teacher) }}"
        >

            @csrf

            @method('PUT')


            <div class="form-grid">


                {{-- =================================================
                     DATA GURU
                ================================================== --}}

                <div class="section-title">

                    <i class="fa-solid fa-chalkboard-user"></i>

                    Data Guru

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
                            class="form-input"
                            value="{{ old('name', $teacher->name) }}"
                            placeholder="Masukkan nama lengkap guru"
                            required
                            autocomplete="name"
                        >

                    </div>

                    <p class="input-help">
                        <i class="fa-solid fa-circle-info"></i>
                        Gunakan nama lengkap sesuai data administrasi sekolah.
                    </p>

                </div>


                {{-- NIP --}}

                <div class="form-group">

                    <label class="form-label">

                        NIP

                        <span class="optional">
                            Opsional
                        </span>

                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-id-card input-icon"></i>

                        <input
                            type="text"
                            name="nip"
                            class="form-input"
                            value="{{ old('nip', $teacher->nip) }}"
                            placeholder="Masukkan NIP"
                        >

                    </div>

                    <p class="input-help">
                        <i class="fa-solid fa-circle-info"></i>
                        Nomor induk pegawai guru.
                    </p>

                </div>


                {{-- EMAIL --}}

                <div class="form-group">

                    <label class="form-label">

                        Email

                        <span class="required">*</span>

                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-envelope input-icon"></i>

                        <input
                            type="email"
                            name="email"
                            class="form-input"
                            value="{{ old('email', $teacher->email) }}"
                            placeholder="nama@sekolah.sch.id"
                            required
                            autocomplete="email"
                        >

                    </div>

                    <p class="input-help">
                        <i class="fa-solid fa-circle-info"></i>
                        Email digunakan untuk login ke sistem.
                    </p>

                </div>


                {{-- TELEPON --}}

                <div class="form-group">

                    <label class="form-label">

                        Nomor Telepon

                        <span class="optional">
                            Opsional
                        </span>

                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-phone input-icon"></i>

                        <input
                            type="text"
                            name="phone"
                            class="form-input"
                            value="{{ old('phone', $teacher->phone) }}"
                            placeholder="08xxxxxxxxxx"
                            autocomplete="tel"
                        >

                    </div>

                    <p class="input-help">
                        <i class="fa-solid fa-circle-info"></i>
                        Nomor telepon yang dapat dihubungi.
                    </p>

                </div>


                {{-- =================================================
                     STATUS GURU
                ================================================== --}}

                <div class="section-title">

                    <i class="fa-solid fa-toggle-on"></i>

                    Status Guru

                </div>


                <div class="status-card">

                    <div class="status-info">

                        <div class="status-icon">

                            <i class="fa-solid fa-user-check"></i>

                        </div>

                        <div>

                            <p class="status-title">
                                Status Keaktifan Guru
                            </p>

                            <p class="status-description">
                                Guru aktif dapat mengakses dan menggunakan sistem.
                            </p>

                        </div>

                    </div>


                    {{-- TOGGLE --}}

                    <label class="switch-wrapper">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            class="switch-input"
                            {{ old('is_active', $teacher->is_active) ? 'checked' : '' }}
                            aria-label="Status keaktifan guru"
                        >

                        <span class="switch"></span>

                    </label>

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
                        href="{{ route('admin.teachers.index') }}"
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


    {{-- =================================================
         INFO
    ================================================== --}}

    <div class="info-card">

        <div class="info-icon">

            <i class="fa-solid fa-circle-info"></i>

        </div>

        <div>

            <p class="info-title">
                Informasi
            </p>

            <p class="info-text">
                Perubahan data guru akan langsung disimpan setelah
                tombol <strong>Perbarui Data</strong> ditekan.
                Pastikan email dan informasi lainnya sudah benar.
            </p>

        </div>

    </div>

</div>

@endsection