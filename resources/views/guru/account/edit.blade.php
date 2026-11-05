```blade
@extends('layouts.app')

@section('title', 'Pengaturan Akun')

@section('content')

<style>
/* =========================================================
   GURU ACCOUNT SETTINGS
========================================================= */

.account-settings-page {
    --blue: #0788c9;
    --blue-dark: #0676ad;
    --blue-light: #e8f6fd;
    --blue-soft: #f0f9ff;

    --text: #1e293b;
    --text-secondary: #475569;
    --muted: #94a3b8;

    --border: #e2e8f0;
    --border-soft: #eef2f6;

    --success: #15803d;
    --success-bg: #ecfdf5;

    width: 100%;
    max-width: 1180px;
    margin: 0 auto;
    padding-bottom: 30px;
}

/* =========================================================
   PAGE HEADER
========================================================= */

.account-page-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 24px;
}

.account-breadcrumb {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 10px;
    color: var(--muted);
    font-size: 12px;
}

.account-breadcrumb i {
    font-size: 9px;
}

.account-breadcrumb .active {
    color: var(--blue);
    font-weight: 700;
}

.account-page-title {
    margin: 0;
    color: var(--text);
    font-size: 28px;
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: -.4px;
}

.account-page-subtitle {
    margin: 7px 0 0;
    color: var(--text-secondary);
    font-size: 13px;
    line-height: 1.6;
}

/* =========================================================
   ACCOUNT PROFILE CARD
========================================================= */

.account-profile-card {
    position: relative;
    overflow: hidden;
    margin-bottom: 20px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(15, 23, 42, .045);
}

.account-profile-top {
    position: relative;
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 22px 24px;
    background:
        linear-gradient(
            135deg,
            #ffffff 0%,
            #f8fcff 100%
        );
    border-bottom: 1px solid var(--border-soft);
}

.account-profile-avatar {
    position: relative;
    flex: 0 0 52px;
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: linear-gradient(
        135deg,
        var(--blue),
        var(--blue-dark)
    );
    color: #fff;
    font-size: 20px;
    box-shadow: 0 7px 18px rgba(7, 136, 201, .22);
}

.account-profile-online {
    position: absolute;
    right: -2px;
    bottom: -2px;
    width: 13px;
    height: 13px;
    border: 3px solid #fff;
    border-radius: 50%;
    background: #22c55e;
}

.account-profile-content {
    min-width: 0;
}

.account-profile-name {
    margin: 0;
    color: var(--text);
    font-size: 17px;
    font-weight: 800;
}

.account-profile-description {
    margin: 4px 0 0;
    color: var(--muted);
    font-size: 12px;
}

.account-profile-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-left: auto;
    padding: 7px 11px;
    border-radius: 999px;
    background: var(--blue-light);
    color: var(--blue-dark);
    font-size: 11px;
    font-weight: 800;
    white-space: nowrap;
}

.account-profile-badge i {
    font-size: 10px;
}

.account-profile-info {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}

.account-info-item {
    min-width: 0;
    padding: 19px 24px;
    border-right: 1px solid var(--border-soft);
}

.account-info-item:last-child {
    border-right: none;
}

.account-info-label {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 8px;
    color: var(--muted);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .4px;
    text-transform: uppercase;
}

.account-info-label i {
    color: var(--blue);
    font-size: 11px;
}

.account-info-value {
    display: block;
    color: var(--text);
    font-size: 13px;
    font-weight: 700;
    word-break: break-word;
}

.account-role {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 10px;
    border-radius: 8px;
    background: var(--blue-soft);
    color: var(--blue-dark);
    font-size: 11px;
    font-weight: 800;
}

/* =========================================================
   SETTINGS CARD
========================================================= */

.account-settings-card {
    overflow: hidden;
    margin-bottom: 20px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(15, 23, 42, .045);
}

.account-settings-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 21px 24px;
    border-bottom: 1px solid var(--border-soft);
}

.account-settings-icon {
    flex: 0 0 44px;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: var(--blue-light);
    color: var(--blue);
    font-size: 16px;
}

.account-settings-header-content {
    min-width: 0;
}

.account-settings-title {
    margin: 0;
    color: var(--text);
    font-size: 16px;
    font-weight: 800;
}

.account-settings-description {
    margin: 4px 0 0;
    color: var(--muted);
    font-size: 11px;
    line-height: 1.5;
}

/* =========================================================
   EMAIL STEPS
========================================================= */

.account-form-section {
    padding: 24px;
    border-bottom: 1px solid var(--border-soft);
}

.account-form-section:last-child {
    border-bottom: none;
}

.account-step-heading {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 20px;
}

.account-step-number {
    flex: 0 0 31px;
    width: 31px;
    height: 31px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: var(--blue-light);
    color: var(--blue-dark);
    font-size: 12px;
    font-weight: 900;
}

.account-step-content {
    min-width: 0;
}

.account-step-title {
    display: block;
    margin-top: 1px;
    color: var(--text);
    font-size: 13px;
    font-weight: 800;
}

.account-step-description {
    display: block;
    margin-top: 3px;
    color: var(--muted);
    font-size: 11px;
    line-height: 1.5;
}

/* =========================================================
   FORM
========================================================= */

.account-form {
    width: 100%;
}

.account-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 18px;
}

.account-password-grid {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}

.account-form-group {
    min-width: 0;
}

.account-form-label {
    display: block;
    margin-bottom: 7px;
    color: var(--text-secondary);
    font-size: 11px;
    font-weight: 800;
}

.account-input-wrapper {
    position: relative;
    width: 100%;
}

.account-input-icon {
    position: absolute;
    top: 50%;
    left: 14px;
    z-index: 2;
    transform: translateY(-50%);
    color: #a0aec0;
    font-size: 13px;
    pointer-events: none;
    transition: color .2s ease;
}

.account-input {
    width: 100%;
    height: 45px;
    box-sizing: border-box;
    padding: 0 44px 0 40px;
    border: 1px solid #dce4ec;
    border-radius: 11px;
    outline: none;
    background: #fff;
    color: var(--text);
    font-size: 12px;
    transition:
        border-color .2s ease,
        box-shadow .2s ease,
        background .2s ease;
}

.account-input:hover {
    border-color: #cbd5e1;
}

.account-input:focus {
    border-color: var(--blue);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(7, 136, 201, .09);
}

.account-input-wrapper:focus-within .account-input-icon {
    color: var(--blue);
}

.account-input::placeholder {
    color: #b7c0cc;
}

/* =========================================================
   PASSWORD TOGGLE
========================================================= */

.account-password-toggle {
    position: absolute;
    top: 50%;
    right: 7px;
    z-index: 3;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(-50%);
    border: none;
    border-radius: 8px;
    background: transparent;
    color: #94a3b8;
    cursor: pointer;
    transition:
        background .2s ease,
        color .2s ease;
}

.account-password-toggle:hover {
    background: var(--blue-light);
    color: var(--blue);
}

.account-password-toggle:focus {
    outline: none;
    background: var(--blue-light);
    color: var(--blue);
}

/* =========================================================
   VERIFICATION CODE
========================================================= */

.account-code-input {
    letter-spacing: 4px;
    font-weight: 800;
    text-align: center;
}

.account-code-wrapper {
    max-width: 500px;
}

/* =========================================================
   BUTTON
========================================================= */

.account-primary-button {
    min-height: 43px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0 17px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(
        135deg,
        var(--blue),
        var(--blue-dark)
    );
    color: #fff;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 6px 15px rgba(7, 136, 201, .16);
    transition:
        transform .2s ease,
        box-shadow .2s ease,
        filter .2s ease;
}

.account-primary-button:hover {
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 9px 20px rgba(7, 136, 201, .22);
    filter: brightness(.98);
}

.account-primary-button:active {
    transform: translateY(0);
}

.account-primary-button i {
    font-size: 11px;
}

/* =========================================================
   SECURITY INFO
========================================================= */

.account-security-info {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 18px;
    padding: 13px 15px;
    border: 1px solid #dbeffc;
    border-radius: 11px;
    background: var(--blue-soft);
    color: var(--text-secondary);
    font-size: 11px;
    line-height: 1.55;
}

.account-security-info > i {
    flex: 0 0 auto;
    margin-top: 2px;
    color: var(--blue);
}

/* =========================================================
   PASSWORD STRENGTH
========================================================= */

.account-password-strength {
    margin-top: 8px;
}

.account-strength-bar {
    width: 100%;
    height: 4px;
    overflow: hidden;
    border-radius: 99px;
    background: #edf2f7;
}

.account-strength-progress {
    width: 0;
    height: 100%;
    border-radius: inherit;
    background: #cbd5e1;
    transition:
        width .25s ease,
        background .25s ease;
}

.account-strength-text {
    display: flex;
    justify-content: space-between;
    margin-top: 5px;
    color: #94a3b8;
    font-size: 9px;
}

.account-strength-label {
    font-weight: 700;
}

/* =========================================================
   FORM DIVIDER
========================================================= */

.account-form-divider {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 4px 0 20px;
    color: #cbd5e1;
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.account-form-divider::before,
.account-form-divider::after {
    content: "";
    flex: 1;
    height: 1px;
    background: var(--border-soft);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 950px) {

    .account-profile-info {
        grid-template-columns: repeat(2, 1fr);
    }

    .account-info-item:nth-child(2) {
        border-right: none;
    }

    .account-info-item:last-child {
        grid-column: 1 / -1;
        border-top: 1px solid var(--border-soft);
        border-right: none;
    }

    .account-password-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .account-password-grid .account-form-group:last-child {
        grid-column: 1 / -1;
    }
}

@media (max-width: 700px) {

    .account-settings-page {
        padding-bottom: 20px;
    }

    .account-page-header {
        margin-bottom: 18px;
    }

    .account-page-title {
        font-size: 23px;
    }

    .account-page-subtitle {
        max-width: 550px;
        font-size: 12px;
    }

    .account-profile-top {
        padding: 18px;
    }

    .account-profile-badge {
        display: none;
    }

    .account-profile-info {
        grid-template-columns: 1fr;
    }

    .account-info-item {
        padding: 16px 18px;
        border-right: none;
        border-bottom: 1px solid var(--border-soft);
    }

    .account-info-item:nth-child(2) {
        border-right: none;
    }

    .account-info-item:last-child {
        grid-column: auto;
        border-top: none;
        border-bottom: none;
    }

    .account-settings-header {
        padding: 18px;
    }

    .account-form-section {
        padding: 18px;
    }

    .account-form-grid,
    .account-password-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .account-password-grid .account-form-group:last-child {
        grid-column: auto;
    }

    .account-primary-button {
        width: 100%;
    }

    .account-code-wrapper {
        max-width: none;
    }
}

@media (max-width: 430px) {

    .account-page-title {
        font-size: 21px;
    }

    .account-page-subtitle {
        font-size: 11px;
    }

    .account-breadcrumb {
        font-size: 11px;
    }

    .account-profile-top {
        gap: 12px;
        padding: 16px;
    }

    .account-profile-avatar {
        flex-basis: 46px;
        width: 46px;
        height: 46px;
        border-radius: 13px;
        font-size: 17px;
    }

    .account-profile-name {
        font-size: 15px;
    }

    .account-profile-description {
        font-size: 10px;
    }

    .account-settings-icon {
        flex-basis: 40px;
        width: 40px;
        height: 40px;
    }

    .account-settings-title {
        font-size: 14px;
    }

    .account-settings-description {
        font-size: 10px;
    }

    .account-step-heading {
        gap: 9px;
    }

    .account-step-number {
        flex-basis: 29px;
        width: 29px;
        height: 29px;
    }

    .account-step-title {
        font-size: 12px;
    }

    .account-step-description {
        font-size: 10px;
    }

    .account-form-label {
        font-size: 10px;
    }

    .account-input {
        height: 44px;
        font-size: 12px;
    }

    .account-security-info {
        font-size: 10px;
        padding: 12px;
    }
}
</style>


<div class="account-settings-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="account-page-header">

        <div>

            <div class="account-breadcrumb">
                <i class="fa-solid fa-house"></i>

                <span>Guru</span>

                <i class="fa-solid fa-chevron-right"></i>

                <span class="active">
                    Pengaturan Akun
                </span>
            </div>

            <h1 class="account-page-title">
                Pengaturan Akun
            </h1>

            <p class="account-page-subtitle">
                Kelola informasi dan keamanan akun Anda.
            </p>

        </div>

    </div>


    {{-- =====================================================
         INFORMASI AKUN
    ====================================================== --}}

    <div class="account-profile-card">

        <div class="account-profile-top">

            <div class="account-profile-avatar">

                <i class="fa-solid fa-user"></i>

                <span class="account-profile-online"></span>

            </div>

            <div class="account-profile-content">

                <h2 class="account-profile-name">
                    {{ auth()->user()->name }}
                </h2>

                <p class="account-profile-description">
                    Akun Guru
                </p>

            </div>

            <div class="account-profile-badge">

                <i class="fa-solid fa-shield-halved"></i>

                Akun Aktif

            </div>

        </div>


        <div class="account-profile-info">

            {{-- NAMA --}}

            <div class="account-info-item">

                <span class="account-info-label">
                    <i class="fa-solid fa-user"></i>
                    Nama
                </span>

                <strong class="account-info-value">
                    {{ auth()->user()->name }}
                </strong>

            </div>


            {{-- EMAIL --}}

            <div class="account-info-item">

                <span class="account-info-label">
                    <i class="fa-solid fa-envelope"></i>
                    Email Saat Ini
                </span>

                <strong class="account-info-value">
                    {{ auth()->user()->email }}
                </strong>

            </div>


            {{-- ROLE --}}

            <div class="account-info-item">

                <span class="account-info-label">
                    <i class="fa-solid fa-user-shield"></i>
                    Role
                </span>

                <span class="account-role">

                    <i class="fa-solid fa-graduation-cap"></i>

                    {{ ucfirst(auth()->user()->role) }}

                </span>

            </div>

        </div>

    </div>


    {{-- =====================================================
         GANTI EMAIL
    ====================================================== --}}

    <div class="account-settings-card">

        <div class="account-settings-header">

            <div class="account-settings-icon">
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="account-settings-header-content">

                <h2 class="account-settings-title">
                    Ganti Email
                </h2>

                <p class="account-settings-description">
                    Perbarui alamat email akun Anda melalui verifikasi.
                </p>

            </div>

        </div>


        {{-- =================================================
             STEP 1
        ================================================== --}}

        <div class="account-form-section">

            <div class="account-step-heading">

                <span class="account-step-number">
                    1
                </span>

                <div class="account-step-content">

                    <strong class="account-step-title">
                        Kirim Kode Verifikasi
                    </strong>

                    <small class="account-step-description">
                        Masukkan email baru dan password saat ini.
                    </small>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('guru.account.email.request') }}"
                class="account-form"
            >

                @csrf

                <div class="account-form-grid">

                    {{-- EMAIL BARU --}}

                    <div class="account-form-group">

                        <label
                            for="new_email"
                            class="account-form-label"
                        >
                            Email Baru
                        </label>

                        <div class="account-input-wrapper">

                            <i class="fa-solid fa-envelope account-input-icon"></i>

                            <input
                                id="new_email"
                                type="email"
                                name="new_email"
                                value="{{ old('new_email') }}"
                                placeholder="Masukkan email baru"
                                class="account-input"
                                autocomplete="email"
                                required
                            >

                        </div>

                    </div>


                    {{-- PASSWORD SAAT INI --}}

                    <div class="account-form-group">

                        <label
                            for="current_password_email"
                            class="account-form-label"
                        >
                            Password Saat Ini
                        </label>

                        <div class="account-input-wrapper">

                            <i class="fa-solid fa-lock account-input-icon"></i>

                            <input
                                id="current_password_email"
                                type="password"
                                name="current_password"
                                placeholder="Masukkan password saat ini"
                                class="account-input"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="account-password-toggle"
                                onclick="toggleAccountPassword('current_password_email', this)"
                                aria-label="Tampilkan password"
                            >
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>

                </div>


                <button
                    class="account-primary-button"
                    type="submit"
                >

                    <i class="fa-solid fa-paper-plane"></i>

                    Kirim Kode Verifikasi

                </button>

            </form>

        </div>


        {{-- =================================================
             STEP 2
        ================================================== --}}

        <div class="account-form-section">

            <div class="account-step-heading">

                <span class="account-step-number">
                    2
                </span>

                <div class="account-step-content">

                    <strong class="account-step-title">
                        Verifikasi Email
                    </strong>

                    <small class="account-step-description">
                        Masukkan kode verifikasi yang telah dikirim.
                    </small>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('guru.account.email.verify') }}"
                class="account-form"
            >

                @csrf

                <div class="account-form-grid">

                    <div class="account-form-group account-code-wrapper">

                        <label
                            for="verification_code"
                            class="account-form-label"
                        >
                            Kode Verifikasi
                        </label>

                        <div class="account-input-wrapper">

                            <i class="fa-solid fa-shield-halved account-input-icon"></i>

                            <input
                                id="verification_code"
                                type="text"
                                name="verification_code"
                                placeholder="Masukkan kode verifikasi"
                                class="account-input account-code-input"
                                inputmode="numeric"
                                autocomplete="one-time-code"
                                required
                            >

                        </div>

                    </div>

                </div>


                <button
                    class="account-primary-button"
                    type="submit"
                >

                    <i class="fa-solid fa-circle-check"></i>

                    Verifikasi & Ganti Email

                </button>

            </form>

        </div>

    </div>


    {{-- =====================================================
         GANTI PASSWORD
    ====================================================== --}}

    <div class="account-settings-card">

        <div class="account-settings-header">

            <div class="account-settings-icon">

                <i class="fa-solid fa-lock"></i>

            </div>

            <div class="account-settings-header-content">

                <h2 class="account-settings-title">
                    Ganti Password
                </h2>

                <p class="account-settings-description">
                    Perbarui password untuk menjaga keamanan akun.
                </p>

            </div>

        </div>


        <div class="account-form-section">

            <form
                method="POST"
                action="{{ route('guru.account.password.update') }}"
                class="account-form password-form"
            >

                @csrf


                <div class="account-form-grid account-password-grid">

                    {{-- PASSWORD LAMA --}}

                    <div class="account-form-group">

                        <label
                            for="current_password"
                            class="account-form-label"
                        >
                            Password Saat Ini
                        </label>

                        <div class="account-input-wrapper">

                            <i class="fa-solid fa-lock account-input-icon"></i>

                            <input
                                id="current_password"
                                type="password"
                                name="current_password"
                                placeholder="Password saat ini"
                                class="account-input"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="account-password-toggle"
                                onclick="toggleAccountPassword('current_password', this)"
                                aria-label="Tampilkan password"
                            >
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    {{-- PASSWORD BARU --}}

                    <div class="account-form-group">

                        <label
                            for="password"
                            class="account-form-label"
                        >
                            Password Baru
                        </label>

                        <div class="account-input-wrapper">

                            <i class="fa-solid fa-key account-input-icon"></i>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Masukkan password baru"
                                class="account-input"
                                autocomplete="new-password"
                                required
                            >

                            <button
                                type="button"
                                class="account-password-toggle"
                                onclick="toggleAccountPassword('password', this)"
                                aria-label="Tampilkan password"
                            >
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                        {{-- PASSWORD STRENGTH --}}

                        <div class="account-password-strength">

                            <div class="account-strength-bar">

                                <div
                                    class="account-strength-progress"
                                    id="passwordStrengthProgress"
                                ></div>

                            </div>

                            <div class="account-strength-text">

                                <span>
                                    Kekuatan password
                                </span>

                                <span
                                    class="account-strength-label"
                                    id="passwordStrengthLabel"
                                >
                                    -
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- KONFIRMASI --}}

                    <div class="account-form-group">

                        <label
                            for="password_confirmation"
                            class="account-form-label"
                        >
                            Konfirmasi Password Baru
                        </label>

                        <div class="account-input-wrapper">

                            <i class="fa-solid fa-key account-input-icon"></i>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="Ulangi password baru"
                                class="account-input"
                                autocomplete="new-password"
                                required
                            >

                            <button
                                type="button"
                                class="account-password-toggle"
                                onclick="toggleAccountPassword('password_confirmation', this)"
                                aria-label="Tampilkan password"
                            >
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>

                </div>


                {{-- SECURITY INFO --}}

                <div class="account-security-info">

                    <i class="fa-solid fa-circle-info"></i>

                    <span>
                        Gunakan password yang berbeda dari sebelumnya
                        dan mudah Anda ingat. Hindari menggunakan password
                        yang sama dengan akun lain.
                    </span>

                </div>


                <button
                    class="account-primary-button"
                    type="submit"
                >

                    <i class="fa-solid fa-shield-halved"></i>

                    Ganti Password

                </button>

            </form>

        </div>

    </div>

</div>


<script>

/* =========================================================
   TOGGLE PASSWORD
========================================================= */

function toggleAccountPassword(inputId, button) {

    const input = document.getElementById(inputId);

    if (!input) {
        return;
    }

    const icon = button.querySelector('i');

    if (!icon) {
        return;
    }

    if (input.type === 'password') {

        input.type = 'text';

        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');

        button.setAttribute(
            'aria-label',
            'Sembunyikan password'
        );

    } else {

        input.type = 'password';

        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');

        button.setAttribute(
            'aria-label',
            'Tampilkan password'
        );

    }

}


/* =========================================================
   PASSWORD STRENGTH
========================================================= */

document.addEventListener('DOMContentLoaded', function () {

    const passwordInput =
        document.getElementById('password');

    const strengthProgress =
        document.getElementById('passwordStrengthProgress');

    const strengthLabel =
        document.getElementById('passwordStrengthLabel');


    if (!passwordInput || !strengthProgress || !strengthLabel) {
        return;
    }


    passwordInput.addEventListener('input', function () {

        const password = this.value;

        let score = 0;


        if (password.length >= 6) {
            score++;
        }

        if (password.length >= 8) {
            score++;
        }

        if (/[A-Z]/.test(password)) {
            score++;
        }

        if (/[0-9]/.test(password)) {
            score++;
        }

        if (/[^A-Za-z0-9]/.test(password)) {
            score++;
        }


        if (password.length === 0) {

            strengthProgress.style.width = '0%';
            strengthProgress.style.background = '#cbd5e1';

            strengthLabel.textContent = '-';

        }

        else if (score <= 2) {

            strengthProgress.style.width = '35%';
            strengthProgress.style.background = '#f59e0b';

            strengthLabel.textContent = 'Lemah';

        }

        else if (score <= 3) {

            strengthProgress.style.width = '65%';
            strengthProgress.style.background = '#eab308';

            strengthLabel.textContent = 'Sedang';

        }

        else {

            strengthProgress.style.width = '100%';
            strengthProgress.style.background = '#16a34a';

            strengthLabel.textContent = 'Kuat';

        }

    });

});

</script>

@endsection
```
