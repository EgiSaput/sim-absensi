@extends('layouts.guest')

@section('title', 'Login')

@section('content')

<style>
    /* =========================================================
       MODERN LOGIN — MA AZ-ZAHRA PARONGPONG
       UI ONLY — LOGIC TIDAK DIUBAH
    ========================================================= */

    :root {
        --primary: #0788c9;
        --primary-dark: #056fa5;
        --primary-light: #eaf7fd;
        --text: #172033;
        --muted: #718096;
        --border: #dce6ef;
        --bg: #f4f8fc;
    }

    * {
        box-sizing: border-box;
    }

    /* =========================================================
       PAGE
    ========================================================= */

    .login-page {
        position: relative;
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 35px;
        overflow: hidden;
        background:
            radial-gradient(circle at 10% 20%, rgba(7,136,201,.10), transparent 28%),
            radial-gradient(circle at 90% 80%, rgba(7,136,201,.08), transparent 30%),
            #f5f9fd;
    }


    /* =========================================================
       BACKGROUND DECORATION
    ========================================================= */

    .bg-shape {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        filter: blur(1px);
        opacity: .65;
    }

    .bg-shape-one {
        width: 280px;
        height: 280px;
        background: rgba(7,136,201,.08);
        top: -100px;
        left: -90px;
        animation: floatingOne 8s ease-in-out infinite;
    }

    .bg-shape-two {
        width: 220px;
        height: 220px;
        background: rgba(7,136,201,.06);
        right: -70px;
        bottom: -70px;
        animation: floatingTwo 10s ease-in-out infinite;
    }

    .bg-shape-three {
        width: 90px;
        height: 90px;
        border: 18px solid rgba(7,136,201,.045);
        background: transparent;
        top: 15%;
        right: 12%;
        animation: rotateShape 18s linear infinite;
    }

    @keyframes floatingOne {
        0%, 100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(25px, 20px);
        }
    }

    @keyframes floatingTwo {
        0%, 100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(-20px, -25px);
        }
    }

    @keyframes rotateShape {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }


    /* =========================================================
       LOGIN CONTAINER
    ========================================================= */

    .login-container {
        position: relative;
        z-index: 2;

        width: 100%;
        max-width: 1050px;
        min-height: 610px;

        display: grid;
        grid-template-columns: 43% 57%;

        background: rgba(255,255,255,.92);
        backdrop-filter: blur(15px);

        border: 1px solid rgba(255,255,255,.9);
        border-radius: 28px;

        overflow: hidden;

        box-shadow:
            0 30px 80px rgba(28, 72, 105, .13),
            0 8px 25px rgba(28, 72, 105, .05);

        animation: cardEnter .8s cubic-bezier(.2,.8,.2,1);
    }

    @keyframes cardEnter {
        from {
            opacity: 0;
            transform: translateY(25px) scale(.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }


    /* =========================================================
       LEFT BRAND AREA
    ========================================================= */

    .login-brand {
        position: relative;
        overflow: hidden;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        padding: 55px 40px;

        color: white;

        background:
            radial-gradient(circle at 20% 20%, rgba(255,255,255,.15), transparent 28%),
            radial-gradient(circle at 90% 90%, rgba(255,255,255,.10), transparent 30%),
            linear-gradient(
                145deg,
                #0788c9 0%,
                #087fba 50%,
                #056fa5 100%
            );
    }

    /* Decorative circles */

    .brand-circle {
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,.12);
        pointer-events: none;
    }

    .brand-circle.one {
        width: 340px;
        height: 340px;
        top: -180px;
        left: -160px;
    }

    .brand-circle.two {
        width: 260px;
        height: 260px;
        bottom: -150px;
        right: -120px;
    }

    .brand-circle.three {
        width: 100px;
        height: 100px;
        top: 80px;
        right: 40px;
        background: rgba(255,255,255,.035);
        border: none;
        animation: floatingTwo 7s ease-in-out infinite;
    }


    /* =========================================================
       LOGO
    ========================================================= */

    .logo-wrapper {
        position: relative;
        width: 145px;
        height: 145px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 28px;

        animation: logoFloat 4s ease-in-out infinite;
    }

    .logo-wrapper::before {
        content: "";
        position: absolute;
        inset: -8px;

        border-radius: 30px;

        border: 1px solid rgba(255,255,255,.30);

        animation: logoPulse 3s ease-in-out infinite;
    }

    .logo-wrapper::after {
        content: "";
        position: absolute;
        inset: -18px;

        border-radius: 36px;

        border: 1px dashed rgba(255,255,255,.18);

        animation: logoRotate 15s linear infinite;
    }

    .school-logo {
        position: relative;
        z-index: 2;

        width: 130px;
        height: 130px;

        object-fit: contain;

        background: white;
        padding: 8px;

        border-radius: 26px;

        box-shadow:
            0 15px 35px rgba(0,0,0,.16);
    }

    @keyframes logoFloat {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    @keyframes logoPulse {
        0%, 100% {
            transform: scale(1);
            opacity: .45;
        }

        50% {
            transform: scale(1.05);
            opacity: .8;
        }
    }

    @keyframes logoRotate {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }


    /* =========================================================
       BRAND TEXT
    ========================================================= */

    .brand-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .school-name {
        margin: 0;

        font-size: 25px;
        font-weight: 800;

        letter-spacing: -.5px;
        line-height: 1.3;

        text-shadow: 0 3px 15px rgba(0,0,0,.12);
    }

    .school-subtitle {
        margin: 11px 0 0;

        font-size: 13px;

        color: rgba(255,255,255,.88);
        letter-spacing: .3px;
    }


    /* =========================================================
       BRAND BADGE
    ========================================================= */

    .brand-badge {
        position: relative;
        z-index: 2;

        display: inline-flex;
        align-items: center;
        gap: 7px;

        margin-top: 25px;
        padding: 8px 14px;

        border-radius: 50px;

        background: rgba(255,255,255,.11);
        border: 1px solid rgba(255,255,255,.16);

        color: rgba(255,255,255,.92);

        font-size: 10px;
        font-weight: 600;

        backdrop-filter: blur(8px);
    }

    .brand-badge i {
        font-size: 10px;
    }


    /* =========================================================
       RIGHT FORM AREA
    ========================================================= */

    .login-form-area {
        display: flex;
        align-items: center;
        justify-content: center;

        padding: 65px 70px;

        background: rgba(255,255,255,.95);
    }

    .login-form {
        width: 100%;
        max-width: 420px;

        animation: formEnter .9s .15s both cubic-bezier(.2,.8,.2,1);
    }

    @keyframes formEnter {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }


    /* =========================================================
       FORM HEADER
    ========================================================= */

    .login-header {
        margin-bottom: 30px;
    }

    .welcome-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        margin-bottom: 10px;

        color: var(--primary);

        font-size: 11px;
        font-weight: 700;

        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .welcome-label::before {
        content: "";
        width: 22px;
        height: 2px;

        background: var(--primary);
        border-radius: 5px;
    }

    .login-title {
        margin: 0;

        color: var(--text);

        font-size: 34px;
        font-weight: 800;

        letter-spacing: -.8px;
        line-height: 1.15;
    }

    .login-description {
        margin: 10px 0 0;

        color: var(--muted);

        font-size: 13px;
        line-height: 1.6;
    }


    /* =========================================================
       TIMEOUT ALERT
    ========================================================= */

    .timeout-alert {
        display: flex;
        align-items: flex-start;
        gap: 11px;

        width: 100%;

        margin: -5px 0 22px;
        padding: 13px 14px;

        background: #fff9e9;

        border: 1px solid #f3d78b;
        border-radius: 13px;

        color: #856404;

        font-size: 11px;
        line-height: 1.55;

        animation: alertEnter .4s ease;
    }

    @keyframes alertEnter {
        from {
            opacity: 0;
            transform: translateY(-6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .timeout-alert > i {
        flex-shrink: 0;

        width: 28px;
        height: 28px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-top: 1px;

        border-radius: 9px;

        background: #fff0bd;
        color: #d49700;
    }

    .timeout-alert-content {
        flex: 1;
        min-width: 0;
    }

    .timeout-alert-title {
        display: block;

        margin-bottom: 2px;

        color: #795600;

        font-weight: 700;
    }


    /* =========================================================
       FORM GROUP
    ========================================================= */

    .form-group {
        margin-bottom: 19px;
    }

    .form-label {
        display: block;

        margin-bottom: 8px;

        color: #334155;

        font-size: 12px;
        font-weight: 700;
    }


    /* =========================================================
       INPUT WRAPPER
    ========================================================= */

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        z-index: 2;

        left: 15px;
        top: 50%;

        transform: translateY(-50%);

        color: #9aaabd;

        font-size: 14px;

        pointer-events: none;

        transition: .25s ease;
    }

    .form-input {
        width: 100%;
        height: 52px;

        padding: 0 16px 0 43px;

        border: 1px solid var(--border);
        border-radius: 13px;

        background: #fbfdff;

        color: #1e293b;

        font-family: inherit;
        font-size: 13px;

        outline: none;

        transition:
            border-color .25s ease,
            box-shadow .25s ease,
            background .25s ease,
            transform .25s ease;
    }

    .form-input:hover {
        border-color: #c6d5e2;
        background: white;
    }

    .form-input:focus {
        border-color: var(--primary);

        background: white;

        box-shadow:
            0 0 0 4px rgba(7,136,201,.09),
            0 8px 20px rgba(7,136,201,.06);

        transform: translateY(-1px);
    }

    .input-wrapper:focus-within .input-icon {
        color: var(--primary);
    }

    .form-input::placeholder {
        color: #a5b1bf;
    }


    /* =========================================================
       PASSWORD TOGGLE
    ========================================================= */

    .password-toggle {
        position: absolute;

        right: 12px;
        top: 50%;

        transform: translateY(-50%);

        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: none;
        border-radius: 9px;

        background: transparent;

        color: #94a3b8;

        cursor: pointer;

        transition: .2s ease;
    }

    .password-toggle:hover {
        background: var(--primary-light);
        color: var(--primary);
    }

    .password-input {
        padding-right: 52px;
    }


    /* =========================================================
       OPTIONS
    ========================================================= */

    .form-options {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        margin: 4px 0 23px;

        font-size: 11px;
    }

    .remember {
        display: flex;
        align-items: center;
        gap: 8px;

        color: #64748b;

        cursor: pointer;
        user-select: none;
    }

    .remember input {
        appearance: none;

        width: 16px;
        height: 16px;

        margin: 0;

        border: 1px solid #cbd7e2;
        border-radius: 5px;

        background: white;

        cursor: pointer;

        transition: .2s ease;
    }

    .remember input:checked {
        background-color: var(--primary);
        border-color: var(--primary);

        box-shadow: inset 0 0 0 3px white;
    }

    .forgot-password {
        color: var(--primary);

        text-decoration: none;

        font-weight: 700;

        transition: .2s ease;
    }

    .forgot-password:hover {
        color: var(--primary-dark);
        text-decoration: none;

        transform: translateX(2px);
    }


    /* =========================================================
       LOGIN BUTTON
    ========================================================= */

    .login-button {
        position: relative;
        overflow: hidden;

        width: 100%;
        height: 53px;

        border: none;
        border-radius: 13px;

        background:
            linear-gradient(
                135deg,
                #0794d9,
                #0788c9 55%,
                #067bb5
            );

        color: white;

        font-family: inherit;
        font-size: 13px;
        font-weight: 700;

        cursor: pointer;

        box-shadow:
            0 10px 22px rgba(7,136,201,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            filter .25s ease;
    }

    .login-button::before {
        content: "";

        position: absolute;

        top: 0;
        left: -100%;

        width: 70%;
        height: 100%;

        background: linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.20),
            transparent
        );

        transform: skewX(-20deg);

        transition: left .6s ease;
    }

    .login-button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 14px 28px rgba(7,136,201,.27);

        filter: brightness(1.03);
    }

    .login-button:hover::before {
        left: 130%;
    }

    .login-button:active {
        transform: translateY(0);
    }

    .button-content {
        position: relative;
        z-index: 2;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
    }

    .login-button.loading {
        pointer-events: none;
        opacity: .85;
    }

    .button-spinner {
        display: none;

        width: 15px;
        height: 15px;

        border: 2px solid rgba(255,255,255,.35);
        border-top-color: white;

        border-radius: 50%;

        animation: spin .7s linear infinite;
    }

    .login-button.loading .button-spinner {
        display: block;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .login-footer {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        margin-top: 26px;

        color: #a0aec0;

        font-size: 10px;
    }

    .footer-dot {
        width: 4px;
        height: 4px;

        border-radius: 50%;

        background: #cbd5e1;
    }


    /* =========================================================
       RESPONSIVE TABLET
    ========================================================= */

    @media (max-width: 900px) {

        .login-page {
            padding: 25px;
        }

        .login-container {
            max-width: 760px;

            grid-template-columns: 1fr;
        }

        .login-brand {
            min-height: 310px;
            padding: 40px 30px;
        }

        .logo-wrapper {
            width: 105px;
            height: 105px;

            margin-bottom: 20px;
        }

        .school-logo {
            width: 92px;
            height: 92px;

            border-radius: 20px;
        }

        .school-name {
            font-size: 22px;
        }

        .brand-badge {
            margin-top: 18px;
        }

        .login-form-area {
            padding: 50px 45px;
        }
    }


    /* =========================================================
       RESPONSIVE MOBILE
    ========================================================= */

    @media (max-width: 600px) {

        .login-page {
            min-height: 100dvh;

            padding: 15px;

            align-items: flex-start;
        }

        .login-container {
            margin-top: 10px;

            border-radius: 22px;

            min-height: auto;

            grid-template-columns: 1fr;
        }

        .login-brand {
            min-height: 245px;

            padding: 32px 20px;
        }

        .logo-wrapper {
            width: 82px;
            height: 82px;

            margin-bottom: 17px;
        }

        .logo-wrapper::before {
            border-radius: 20px;
        }

        .logo-wrapper::after {
            inset: -10px;
            border-radius: 24px;
        }

        .school-logo {
            width: 72px;
            height: 72px;

            padding: 5px;

            border-radius: 16px;
        }

        .school-name {
            font-size: 19px;
        }

        .school-subtitle {
            font-size: 11px;
        }

        .brand-badge {
            display: none;
        }

        .login-form-area {
            padding: 38px 23px 32px;
        }

        .login-title {
            font-size: 28px;
        }

        .login-description {
            font-size: 12px;
        }

        .login-header {
            margin-bottom: 26px;
        }

        .form-input {
            height: 50px;
        }

        .form-options {
            font-size: 10px;
        }

        .login-button {
            height: 51px;
        }

        .login-footer {
            margin-top: 22px;
        }

        .bg-shape-one {
            width: 180px;
            height: 180px;
        }

        .bg-shape-two {
            width: 150px;
            height: 150px;
        }
    }


    /* =========================================================
       VERY SMALL MOBILE
    ========================================================= */

    @media (max-width: 380px) {

        .login-page {
            padding: 10px;
        }

        .login-container {
            margin-top: 5px;
            border-radius: 18px;
        }

        .login-brand {
            min-height: 220px;
        }

        .login-form-area {
            padding: 30px 18px 25px;
        }

        .login-title {
            font-size: 25px;
        }

        .form-options {
            gap: 8px;
        }
    }


    /* =========================================================
       REDUCE MOTION
    ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important;
        }
    }

</style>


<div class="login-page">

    <!-- Background Decoration -->

    <div class="bg-shape bg-shape-one"></div>
    <div class="bg-shape bg-shape-two"></div>
    <div class="bg-shape bg-shape-three"></div>


    <div class="login-container">


        <!-- =====================================================
             BRANDING
        ====================================================== -->

        <div class="login-brand">

            <div class="brand-circle one"></div>
            <div class="brand-circle two"></div>
            <div class="brand-circle three"></div>


            <div class="logo-wrapper">

                <img
                    src="{{ asset('images/logo.jpg') }}"
                    alt="Logo MA Az-Zahra"
                    class="school-logo"
                >

            </div>


            <div class="brand-content">

                <h1 class="school-name">
                    MA Az-Zahra Parongpong
                </h1>

                <p class="school-subtitle">
                    Sistem Absensi Sekolah
                </p>

            </div>


            <div class="brand-badge">

                <i class="fa-solid fa-shield-halved"></i>

                Sistem Informasi Sekolah

            </div>

        </div>


        <!-- =====================================================
             LOGIN FORM
        ====================================================== -->

        <div class="login-form-area">

            <div class="login-form">


                <!-- HEADER -->

                <div class="login-header">

                    <div class="welcome-label">
                        MA AZ-ZAHRA PARONGPONG
                    </div>

                    <h2 class="login-title">
                        Portal Absensi
                    </h2>

                    <p class="login-description">
                        Silakan masuk menggunakan akun Anda untuk mengakses sistem absensi sekolah.
                    </p>

                </div>


                {{-- =================================================
                     SESSION TIMEOUT
                ================================================== --}}

                @if (request('timeout'))

                    <div class="timeout-alert">

                        <i class="fa-solid fa-clock"></i>

                        <div class="timeout-alert-content">

                            <span class="timeout-alert-title">
                                Sesi Berakhir
                            </span>

                            Sesi Anda telah berakhir karena tidak ada
                            aktivitas selama 5 menit. Silakan login kembali.

                        </div>

                    </div>

                @endif


                <!-- =================================================
                     LOGIN FORM
                ================================================== -->

                <form
                    method="POST"
                    action="{{ route('login.store') }}"
                    id="loginForm"
                >

                    @csrf


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email
                        </label>


                        <div class="input-wrapper">

                            <i class="fa-regular fa-envelope input-icon"></i>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-input"
                                placeholder="Masukkan email"
                                required
                                autofocus
                            >

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label"
                        >
                            Password
                        </label>


                        <div class="input-wrapper">

                            <i class="fa-solid fa-lock input-icon"></i>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="form-input password-input"
                                placeholder="Masukkan password"
                                required
                            >


                            <button
                                type="button"
                                class="password-toggle"
                                id="passwordToggle"
                                aria-label="Tampilkan password"
                            >

                                <i class="fa-regular fa-eye"></i>

                            </button>

                        </div>

                    </div>


                    <!-- OPTIONS -->

                    <div class="form-options">

                        <label class="remember">

                            <input
                                type="checkbox"
                                name="remember"
                            >

                            <span>
                                Ingat saya
                            </span>

                        </label>


                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-password"
                        >
                            Lupa Password?
                        </a>

                    </div>


                    <!-- LOGIN BUTTON -->

                    <button
                        type="submit"
                        class="login-button"
                        id="loginButton"
                    >

                        <span class="button-content">

                            <span class="button-spinner"></span>

                            <i class="fa-solid fa-arrow-right-to-bracket"></i>

                            <span class="button-text">
                                Masuk
                            </span>

                        </span>

                    </button>

                </form>


                <!-- FOOTER -->

                <div class="login-footer">

                    <span>
                        © {{ date('Y') }} MA Az-Zahra Parongpong
                    </span>

                    <span class="footer-dot"></span>

                    <span>
                        Sistem Absensi
                    </span>

                </div>


            </div>

        </div>

    </div>

</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        /* =====================================================
           PASSWORD TOGGLE
        ===================================================== */

        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');

        if (passwordInput && passwordToggle) {

            passwordToggle.addEventListener('click', function () {

                const icon = this.querySelector('i');

                if (passwordInput.type === 'password') {

                    passwordInput.type = 'text';

                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');

                    this.setAttribute(
                        'aria-label',
                        'Sembunyikan password'
                    );

                } else {

                    passwordInput.type = 'password';

                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');

                    this.setAttribute(
                        'aria-label',
                        'Tampilkan password'
                    );

                }

            });

        }


        /* =====================================================
           LOGIN BUTTON LOADING
           Tidak mengubah proses submit Laravel
        ===================================================== */

        const loginForm = document.getElementById('loginForm');
        const loginButton = document.getElementById('loginButton');

        if (loginForm && loginButton) {

            loginForm.addEventListener('submit', function () {

                loginButton.classList.add('loading');

                const buttonText =
                    loginButton.querySelector('.button-text');

                const buttonIcon =
                    loginButton.querySelector(
                        '.button-content > i'
                    );

                if (buttonText) {
                    buttonText.textContent = 'Memproses...';
                }

                if (buttonIcon) {
                    buttonIcon.style.display = 'none';
                }

            });

        }


        /* =====================================================
           INPUT MICRO INTERACTION
        ===================================================== */

        const inputs =
            document.querySelectorAll('.form-input');

        inputs.forEach(function (input) {

            input.addEventListener('focus', function () {

                this.closest('.input-wrapper')
                    ?.classList.add('active');

            });

            input.addEventListener('blur', function () {

                this.closest('.input-wrapper')
                    ?.classList.remove('active');

            });

        });

    });

</script>

@endsection