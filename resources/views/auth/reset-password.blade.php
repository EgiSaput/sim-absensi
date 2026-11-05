@extends('layouts.guest')

@section('title', 'Buat Password Baru')

@section('content')

<div class="reset-wrapper">

    <div class="reset-card">

        {{-- Logo Sekolah --}}
        <div class="logo-wrapper">
            <img
                src="{{ asset('images/logo-azzahra.png') }}"
                alt="Logo MA Az-Zahra"
                class="school-logo"
            >
        </div>

        {{-- Header --}}
        <div class="reset-header">

            <div class="icon-circle">
                <i class="fa-solid fa-key"></i>
            </div>

            <h1>Buat Password Baru</h1>

            <p>
                Silakan buat password baru untuk mengamankan
                akun Anda. Gunakan password yang kuat dan mudah
                Anda ingat.
            </p>

        </div>


        {{-- Error --}}
        @if ($errors->any())

            <div class="alert-error">

                <i class="fa-solid fa-circle-exclamation"></i>

                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>

            </div>

        @endif


        {{-- Form --}}
        <form
            method="POST"
            action="{{ route('password.reset.update', $token) }}"
        >

            @csrf


            {{-- Password Baru --}}
            <div class="form-group">

                <label for="password">
                    Password Baru
                </label>

                <div class="input-wrapper">

                    <i class="fa-solid fa-lock input-icon"></i>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Masukkan password baru"
                        required
                        autocomplete="new-password"
                        oninput="checkPasswordStrength(this.value)"
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword('password', this)"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </button>

                </div>

                {{-- Password Strength --}}
                <div class="password-strength">

                    <div class="strength-bar">
                        <span id="strength-progress"></span>
                    </div>

                    <span id="strength-text">
                        Masukkan password
                    </span>

                </div>

            </div>


            {{-- Konfirmasi Password --}}
            <div class="form-group">

                <label for="password_confirmation">
                    Konfirmasi Password Baru
                </label>

                <div class="input-wrapper">

                    <i class="fa-solid fa-shield-halved input-icon"></i>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password baru"
                        required
                        autocomplete="new-password"
                        oninput="checkPasswordMatch()"
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword('password_confirmation', this)"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </button>

                </div>

                <div
                    id="password-match"
                    class="password-match"
                ></div>

            </div>


            {{-- Info Password --}}
            <div class="password-info">

                <div class="info-title">
                    <i class="fa-solid fa-circle-info"></i>
                    Tips password aman
                </div>

                <ul>
                    <li>Minimal 8 karakter</li>
                    <li>Gunakan kombinasi huruf dan angka</li>
                    <li>Hindari menggunakan nama atau tanggal lahir</li>
                </ul>

            </div>


            {{-- Submit --}}
            <button
                type="submit"
                class="btn-submit"
            >

                <i class="fa-solid fa-check"></i>

                <span>Simpan Password Baru</span>

            </button>

        </form>


        {{-- Back Login --}}
        <div class="back-login">

            <a href="{{ route('login') }}">

                <i class="fa-solid fa-arrow-left"></i>

                Kembali ke Login

            </a>

        </div>


        {{-- Footer --}}
        <div class="reset-footer">

            <span>© {{ date('Y') }}</span>

            <strong>MA Az-Zahra Parongpong</strong>

        </div>

    </div>

</div>


<style>

/* =====================================
   WRAPPER
===================================== */

.reset-wrapper {

    width: 100%;

    min-height: 100vh;

    display: flex;

    justify-content: center;

    align-items: center;

    padding: 30px 20px;

    box-sizing: border-box;

}


/* =====================================
   CARD
===================================== */

.reset-card {

    width: 100%;

    max-width: 470px;

    background: #ffffff;

    border: 1px solid #e5e7eb;

    border-radius: 24px;

    padding: 38px;

    box-sizing: border-box;

    box-shadow:
        0 20px 50px rgba(15, 23, 42, 0.08),
        0 5px 15px rgba(15, 23, 42, 0.04);

}


/* =====================================
   LOGO
===================================== */

.logo-wrapper {

    display: flex;

    justify-content: center;

    margin-bottom: 18px;

}


.school-logo {

    width: 82px;

    height: 82px;

    object-fit: contain;

}


/* =====================================
   HEADER
===================================== */

.reset-header {

    text-align: center;

    margin-bottom: 27px;

}


.icon-circle {

    width: 58px;

    height: 58px;

    margin: 0 auto 16px;

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #eff6ff;

    color: #2563eb;

    font-size: 21px;

}


.reset-header h1 {

    margin: 0 0 10px;

    font-size: 26px;

    font-weight: 750;

    color: #111827;

}


.reset-header p {

    margin: 0 auto;

    max-width: 380px;

    color: #6b7280;

    font-size: 13px;

    line-height: 1.7;

}


/* =====================================
   ERROR
===================================== */

.alert-error {

    display: flex;

    gap: 10px;

    align-items: flex-start;

    padding: 13px 15px;

    margin-bottom: 20px;

    border-radius: 12px;

    background: #fef2f2;

    border: 1px solid #fecaca;

    color: #b91c1c;

    font-size: 13px;

    line-height: 1.5;

}


/* =====================================
   FORM
===================================== */

.form-group {

    margin-bottom: 20px;

}


.form-group label {

    display: block;

    margin-bottom: 8px;

    color: #374151;

    font-size: 13px;

    font-weight: 650;

}


/* =====================================
   INPUT
===================================== */

.input-wrapper {

    position: relative;

}


.input-icon {

    position: absolute;

    left: 15px;

    top: 50%;

    transform: translateY(-50%);

    color: #9ca3af;

    font-size: 15px;

    pointer-events: none;

}


.input-wrapper input {

    width: 100%;

    height: 50px;

    padding: 0 48px 0 44px;

    box-sizing: border-box;

    border: 1px solid #d1d5db;

    border-radius: 12px;

    outline: none;

    background: #f9fafb;

    color: #111827;

    font-size: 14px;

    transition: all .2s ease;

}


.input-wrapper input:focus {

    background: #ffffff;

    border-color: #2563eb;

    box-shadow:
        0 0 0 4px rgba(37, 99, 235, .10);

}


.input-wrapper input::placeholder {

    color: #9ca3af;

}


/* =====================================
   SHOW PASSWORD
===================================== */

.toggle-password {

    position: absolute;

    right: 13px;

    top: 50%;

    transform: translateY(-50%);

    border: none;

    background: transparent;

    color: #9ca3af;

    cursor: pointer;

    font-size: 15px;

    padding: 5px;

}


.toggle-password:hover {

    color: #2563eb;

}


/* =====================================
   PASSWORD STRENGTH
===================================== */

.password-strength {

    margin-top: 9px;

}


.strength-bar {

    width: 100%;

    height: 4px;

    background: #e5e7eb;

    border-radius: 10px;

    overflow: hidden;

}


#strength-progress {

    display: block;

    height: 100%;

    width: 0%;

    transition: all .25s ease;

}


#strength-text {

    display: block;

    margin-top: 5px;

    font-size: 11px;

    color: #9ca3af;

}


/* =====================================
   PASSWORD MATCH
===================================== */

.password-match {

    margin-top: 6px;

    font-size: 11px;

}


/* =====================================
   PASSWORD INFO
===================================== */

.password-info {

    padding: 13px 15px;

    margin-bottom: 20px;

    border-radius: 12px;

    background: #f9fafb;

    border: 1px solid #e5e7eb;

}


.info-title {

    display: flex;

    align-items: center;

    gap: 7px;

    color: #374151;

    font-size: 12px;

    font-weight: 650;

    margin-bottom: 7px;

}


.info-title i {

    color: #6b7280;

}


.password-info ul {

    margin: 0;

    padding-left: 19px;

    color: #6b7280;

    font-size: 11px;

    line-height: 1.7;

}


/* =====================================
   BUTTON
===================================== */

.btn-submit {

    width: 100%;

    height: 50px;

    border: none;

    border-radius: 12px;

    background: #2563eb;

    color: white;

    font-size: 14px;

    font-weight: 650;

    cursor: pointer;

    display: flex;

    justify-content: center;

    align-items: center;

    gap: 9px;

    transition: all .2s ease;

}


.btn-submit:hover {

    background: #1d4ed8;

    transform: translateY(-1px);

    box-shadow:
        0 8px 20px rgba(37, 99, 235, .20);

}


.btn-submit:active {

    transform: translateY(0);

}


/* =====================================
   BACK LOGIN
===================================== */

.back-login {

    text-align: center;

    margin-top: 22px;

}


.back-login a {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    color: #4b5563;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

}


.back-login a:hover {

    color: #2563eb;

}


/* =====================================
   FOOTER
===================================== */

.reset-footer {

    margin-top: 28px;

    padding-top: 18px;

    border-top: 1px solid #f0f0f0;

    text-align: center;

    font-size: 11px;

    color: #9ca3af;

}


.reset-footer strong {

    color: #6b7280;

    margin-left: 3px;

}


/* =====================================
   RESPONSIVE
===================================== */

@media (max-width: 520px) {

    .reset-wrapper {

        padding: 20px 14px;

    }

    .reset-card {

        padding: 28px 22px;

        border-radius: 20px;

    }

    .reset-header h1 {

        font-size: 23px;

    }

}

</style>


{{-- Font Awesome --}}
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
>


<script>

/* =====================================
   SHOW / HIDE PASSWORD
===================================== */

function togglePassword(inputId, button) {

    const input = document.getElementById(inputId);

    const icon = button.querySelector('i');

    if (input.type === 'password') {

        input.type = 'text';

        icon.classList.remove('fa-eye');

        icon.classList.add('fa-eye-slash');

    } else {

        input.type = 'password';

        icon.classList.remove('fa-eye-slash');

        icon.classList.add('fa-eye');

    }

}


/* =====================================
   PASSWORD STRENGTH
===================================== */

function checkPasswordStrength(password) {

    const progress =
        document.getElementById('strength-progress');

    const text =
        document.getElementById('strength-text');

    let strength = 0;

    if (password.length >= 8) {

        strength++;

    }

    if (/[a-z]/.test(password)) {

        strength++;

    }

    if (/[A-Z]/.test(password)) {

        strength++;

    }

    if (/[0-9]/.test(password)) {

        strength++;

    }

    if (/[^A-Za-z0-9]/.test(password)) {

        strength++;

    }


    if (password.length === 0) {

        progress.style.width = '0%';

        text.textContent = 'Masukkan password';

    }

    else if (strength <= 2) {

        progress.style.width = '35%';

        text.textContent = 'Password lemah';

    }

    else if (strength <= 3) {

        progress.style.width = '65%';

        text.textContent = 'Password cukup kuat';

    }

    else {

        progress.style.width = '100%';

        text.textContent = 'Password kuat';

    }


    checkPasswordMatch();

}


/* =====================================
   CHECK PASSWORD MATCH
===================================== */

function checkPasswordMatch() {

    const password =
        document.getElementById('password').value;

    const confirmation =
        document.getElementById('password_confirmation').value;

    const result =
        document.getElementById('password-match');


    if (confirmation.length === 0) {

        result.textContent = '';

        return;

    }


    if (password === confirmation) {

        result.innerHTML =
            '<i class="fa-solid fa-circle-check"></i> Password cocok';

        result.style.color = '#059669';

    } else {

        result.innerHTML =
            '<i class="fa-solid fa-circle-xmark"></i> Password belum cocok';

        result.style.color = '#dc2626';

    }

}

</script>

@endsection