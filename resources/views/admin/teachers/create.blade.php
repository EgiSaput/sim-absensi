@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')

<style>
    /* =========================================================
       CREATE TEACHER - MODERN UI
    ========================================================= */

    .create-teacher-page {
        --primary: #0788c9;
        --primary-dark: #0676ad;
        --primary-soft: #eaf7fd;
        --text: #172b4d;
        --text-soft: #64748b;
        --muted: #94a3b8;
        --border: #e5edf4;
        --surface: #ffffff;
        --surface-soft: #f8fafc;

        width: 100%;
        max-width: 920px;
        margin: 0 auto;
        padding-bottom: 30px;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system,
            BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .create-teacher-page,
    .create-teacher-page * {
        box-sizing: border-box;
    }


    /* =========================================================
       TOP HEADER
    ========================================================= */

    .create-header {
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

        background: linear-gradient(
            145deg,
            #e8f7fd,
            #dff3fc
        );

        color: var(--primary);
        border: 1px solid #d6effa;
        border-radius: 14px;

        font-size: 18px;

        box-shadow:
            0 7px 18px rgba(7, 136, 201, .08);
    }

    .page-title {
        margin: 0;

        color: var(--text);
        font-size: 23px;
        font-weight: 750;
        line-height: 1.25;
        letter-spacing: -.3px;
    }

    .page-description {
        margin: 5px 0 0;

        color: var(--text-soft);
        font-size: 11px;
        line-height: 1.5;
    }


    /* =========================================================
       BACK BUTTON
    ========================================================= */

    .back-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        min-height: 40px;
        padding: 0 13px;

        background: #ffffff;
        color: #64748b;

        border: 1px solid var(--border);
        border-radius: 10px;

        text-decoration: none;

        font-size: 10px;
        font-weight: 650;

        white-space: nowrap;

        transition:
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .back-button i {
        font-size: 9px;
    }

    .back-button:hover {
        background: #f8fcff;
        border-color: #b9e4f7;
        color: var(--primary);
        transform: translateY(-1px);

        box-shadow:
            0 5px 14px rgba(7, 136, 201, .07);
    }


    /* =========================================================
       MAIN FORM CARD
    ========================================================= */

    .form-card {
        position: relative;
        overflow: hidden;

        background: var(--surface);

        border: 1px solid var(--border);
        border-radius: 18px;

        padding: 27px;

        box-shadow:
            0 10px 35px rgba(15, 23, 42, .045);
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
            #0788c9,
            #39b5e8,
            #0788c9
        );
    }


    /* =========================================================
       FORM HEADER
    ========================================================= */

    .form-header {
        display: flex;
        align-items: flex-start;
        gap: 12px;

        margin-bottom: 24px;
        padding-bottom: 18px;

        border-bottom: 1px solid #eef2f6;
    }

    .form-header-icon {
        width: 36px;
        height: 36px;
        flex: 0 0 36px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #f0f9fd;
        color: var(--primary);

        font-size: 13px;
    }

    .form-title {
        margin: 0;

        color: #1e293b;

        font-size: 14px;
        font-weight: 700;
        line-height: 1.3;
    }

    .form-description {
        margin: 4px 0 0;

        color: var(--muted);

        font-size: 9px;
        line-height: 1.55;
    }


    /* =========================================================
       ERROR BOX
    ========================================================= */

    .error-box {
        display: flex;
        align-items: flex-start;
        gap: 10px;

        margin-bottom: 20px;
        padding: 13px 14px;

        background: #fff7f7;

        border: 1px solid #fecaca;
        border-radius: 11px;

        color: #991b1b;

        font-size: 9px;
        line-height: 1.5;
    }

    .error-box > i {
        margin-top: 1px;
        color: #dc2626;
    }

    .error-box-content {
        min-width: 0;
    }

    .error-box strong {
        display: block;
        margin-bottom: 4px;
        font-size: 10px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 17px;
    }

    .error-box li {
        margin-bottom: 3px;
    }

    .error-box li:last-child {
        margin-bottom: 0;
    }


    /* =========================================================
       FORM GRID
    ========================================================= */

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px 17px;
    }

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
        gap: 5px;

        margin-bottom: 7px;

        color: #334155;

        font-size: 10px;
        font-weight: 650;
        line-height: 1.4;
    }

    .label-icon {
        color: var(--primary);
        font-size: 9px;
    }

    .required {
        color: #ef4444;
        font-weight: 700;
    }

    .optional {
        color: #94a3b8;
        font-size: 8px;
        font-weight: 500;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;

        left: 13px;
        top: 50%;

        transform: translateY(-50%);

        color: #9aabba;

        font-size: 10px;

        pointer-events: none;

        transition: color .2s ease;
        z-index: 2;
    }

    .input-wrapper:focus-within .input-icon {
        color: var(--primary);
    }

    .form-input {
        width: 100%;
        height: 43px;

        padding: 10px 13px 10px 36px;

        border: 1px solid #dfe7ee;
        border-radius: 10px;

        background: #ffffff;

        color: #334155;

        outline: none;

        font-family: inherit;
        font-size: 10px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .form-input:hover {
        border-color: #cbd8e3;
    }

    .form-input:focus {
        background: #ffffff;
        border-color: var(--primary);

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .08);
    }

    .form-input::placeholder {
        color: #b6c2ce;
    }


    /* =========================================================
       PASSWORD
    ========================================================= */

    .password-input {
        padding-right: 42px;
    }

    .password-toggle {
        position: absolute;

        right: 9px;
        top: 50%;

        width: 30px;
        height: 30px;

        transform: translateY(-50%);

        display: flex;
        align-items: center;
        justify-content: center;

        border: none;
        border-radius: 7px;

        background: transparent;
        color: #94a3b8;

        cursor: pointer;

        font-size: 10px;

        transition:
            background .2s ease,
            color .2s ease;
    }

    .password-toggle:hover {
        background: #eef8fc;
        color: var(--primary);
    }


    /* =========================================================
       HELP TEXT
    ========================================================= */

    .input-help {
        display: flex;
        align-items: center;
        gap: 5px;

        margin: 5px 0 0;

        color: #9aa8b7;

        font-size: 8px;
        line-height: 1.45;
    }

    .input-help i {
        color: #b0bdc9;
        font-size: 7px;
    }


    /* =========================================================
       FORM FOOTER
    ========================================================= */

    .form-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        margin-top: 27px;
        padding-top: 19px;

        border-top: 1px solid #eef2f6;
    }

    .required-info {
        color: #94a3b8;

        font-size: 8px;
    }

    .required-info span {
        color: #ef4444;
        font-weight: 700;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }


    /* =========================================================
       BUTTONS
    ========================================================= */

    .btn-cancel,
    .btn-save {
        min-height: 39px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        padding: 0 15px;

        border-radius: 9px;

        font-family: inherit;
        font-size: 10px;
        font-weight: 650;

        cursor: pointer;
        text-decoration: none;

        transition:
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .btn-cancel {
        background: #ffffff;
        color: #64748b;

        border: 1px solid #dfe7ee;
    }

    .btn-cancel:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #334155;
        transform: translateY(-1px);
    }

    .btn-save {
        border: 1px solid var(--primary);

        background: linear-gradient(
            135deg,
            #0788c9,
            #087fba
        );

        color: #ffffff;

        box-shadow:
            0 5px 14px rgba(7, 136, 201, .15);
    }

    .btn-save:hover {
        background: linear-gradient(
            135deg,
            #0676ad,
            #056c9f
        );

        border-color: #0676ad;

        color: #ffffff;

        transform: translateY(-1px);

        box-shadow:
            0 8px 18px rgba(7, 136, 201, .20);
    }

    .btn-save:active,
    .btn-cancel:active,
    .back-button:active {
        transform: translateY(0);
    }


    /* =========================================================
       INFORMATION CARD
    ========================================================= */

    .info-card {
        position: relative;

        display: flex;
        align-items: flex-start;
        gap: 12px;

        margin-top: 15px;
        padding: 14px 16px;

        background:
            linear-gradient(
                135deg,
                #f7fcff,
                #f1faff
            );

        border: 1px solid #d9edf7;
        border-radius: 12px;
    }

    .info-icon {
        width: 29px;
        height: 29px;
        flex: 0 0 29px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        background: #e4f5fc;
        color: var(--primary);

        font-size: 10px;
    }

    .info-content {
        min-width: 0;
    }

    .info-title {
        margin: 0;

        color: #075985;

        font-size: 9px;
        font-weight: 700;
    }

    .info-text {
        margin: 3px 0 0;

        color: #64748b;

        font-size: 8px;
        line-height: 1.55;
    }


    /* =========================================================
       SUBTLE ANIMATION
    ========================================================= */

    .form-card,
    .info-card {
        animation: fadeUp .35s ease both;
    }

    .info-card {
        animation-delay: .05s;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .create-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .back-button {
            width: 100%;
        }

        .form-card {
            padding: 22px;
            border-radius: 15px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .required-info {
            order: 2;
        }

        .form-actions {
            width: 100%;
        }

        .form-actions > * {
            flex: 1;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }
    }


    @media (max-width: 480px) {

        .create-teacher-page {
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
            font-size: 16px;
        }

        .page-title {
            font-size: 19px;
        }

        .page-description {
            font-size: 10px;
        }

        .form-card {
            padding: 18px;
        }

        .form-header {
            margin-bottom: 20px;
        }

        .form-title {
            font-size: 13px;
        }

        .form-description {
            font-size: 8px;
        }

        .info-card {
            padding: 12px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions > * {
            width: 100%;
        }
    }


    @media (max-width: 360px) {

        .page-title {
            font-size: 18px;
        }

        .form-card {
            padding: 15px;
        }

        .form-input {
            height: 42px;
        }
    }


    /* =========================================================
       REDUCED MOTION
    ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        .form-card,
        .info-card {
            animation: none;
        }

        .back-button,
        .btn-cancel,
        .btn-save {
            transition: none;
        }
    }
</style>


<div class="create-teacher-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="create-header">

        <div class="header-left">

            <div class="header-icon">
                <i class="fa-solid fa-user-plus"></i>
            </div>

            <div>
                <h1 class="page-title">
                    Tambah Guru
                </h1>

                <p class="page-description">
                    Tambahkan data guru baru ke dalam sistem.
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


    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

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
                    Lengkapi informasi berikut untuk membuat akun guru baru.
                </p>
            </div>

        </div>


        {{-- =================================================
             ERROR VALIDATION
        ================================================== --}}

        @if ($errors->any())

            <div class="error-box">

                <i class="fa-solid fa-circle-exclamation"></i>

                <div class="error-box-content">

                    <strong>
                        Terdapat kesalahan pada data
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
            action="{{ route('admin.teachers.store') }}"
        >

            @csrf

            <div class="form-grid">


                {{-- NAMA --}}

                <div class="form-group full">

                    <label class="form-label">

                        <i class="fa-solid fa-user label-icon"></i>

                        Nama Lengkap

                        <span class="required">*</span>

                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-user input-icon"></i>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-input"
                            placeholder="Masukkan nama lengkap guru"
                            required
                            autocomplete="name"
                        >

                    </div>

                    <p class="input-help">
                        <i class="fa-solid fa-circle-info"></i>
                        Masukkan nama lengkap sesuai identitas guru.
                    </p>

                </div>


                {{-- NIP --}}

                <div class="form-group">

                    <label class="form-label">

                        <i class="fa-solid fa-id-card label-icon"></i>

                        NIP

                        <span class="optional">
                            (Opsional)
                        </span>

                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-id-card input-icon"></i>

                        <input
                            type="text"
                            name="nip"
                            value="{{ old('nip') }}"
                            class="form-input"
                            placeholder="Masukkan NIP"
                        >

                    </div>

                </div>


                {{-- TELEPON --}}

                <div class="form-group">

                    <label class="form-label">

                        <i class="fa-solid fa-phone label-icon"></i>

                        Nomor Telepon

                        <span class="optional">
                            (Opsional)
                        </span>

                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-phone input-icon"></i>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="form-input"
                            placeholder="08xxxxxxxxxx"
                            autocomplete="tel"
                        >

                    </div>

                </div>


                {{-- EMAIL --}}

                <div class="form-group full">

                    <label class="form-label">

                        <i class="fa-solid fa-envelope label-icon"></i>

                        Email

                        <span class="required">*</span>

                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-envelope input-icon"></i>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-input"
                            placeholder="contoh@email.com"
                            required
                            autocomplete="email"
                        >

                    </div>

                    <p class="input-help">
                        <i class="fa-solid fa-circle-info"></i>
                        Email digunakan guru untuk masuk ke sistem.
                    </p>

                </div>


                {{-- PASSWORD --}}

                <div class="form-group full">

                    <label class="form-label">

                        <i class="fa-solid fa-lock label-icon"></i>

                        Password

                        <span class="required">*</span>

                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock input-icon"></i>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-input password-input"
                            placeholder="Masukkan password"
                            required
                            autocomplete="new-password"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            title="Tampilkan password"
                            aria-label="Tampilkan password"
                        >
                            <i
                                class="fa-solid fa-eye"
                                id="passwordIcon"
                            ></i>
                        </button>

                    </div>

                    <p class="input-help">
                        <i class="fa-solid fa-circle-info"></i>
                        Gunakan password yang kuat dan mudah diingat oleh guru.
                    </p>

                </div>

            </div>


            {{-- =================================================
                 FOOTER
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
                        class="btn-save"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Guru
                    </button>

                </div>

            </div>

        </form>

    </div>


    {{-- =====================================================
         INFORMATION
    ====================================================== --}}

    <div class="info-card">

        <div class="info-icon">
            <i class="fa-solid fa-circle-info"></i>
        </div>

        <div class="info-content">

            <p class="info-title">
                Informasi
            </p>

            <p class="info-text">
                Setelah data disimpan, guru dapat menggunakan
                email dan password yang telah dibuat untuk
                masuk ke sistem absensi MA Az-Zahra.
            </p>

        </div>

    </div>

</div>


{{-- =========================================================
     PASSWORD TOGGLE
========================================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const togglePassword =
            document.getElementById('togglePassword');

        const password =
            document.getElementById('password');

        const passwordIcon =
            document.getElementById('passwordIcon');


        if (
            !togglePassword ||
            !password ||
            !passwordIcon
        ) {
            return;
        }


        togglePassword.addEventListener('click', function () {

            const isPassword =
                password.type === 'password';


            password.type =
                isPassword
                    ? 'text'
                    : 'password';


            passwordIcon.classList.toggle(
                'fa-eye',
                !isPassword
            );

            passwordIcon.classList.toggle(
                'fa-eye-slash',
                isPassword
            );


            togglePassword.title =
                isPassword
                    ? 'Sembunyikan password'
                    : 'Tampilkan password';

            togglePassword.setAttribute(
                'aria-label',
                isPassword
                    ? 'Sembunyikan password'
                    : 'Tampilkan password'
            );

        });

    });
</script>

@endsection