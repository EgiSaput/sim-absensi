@extends('layouts.guest')

@section('title', 'Lupa Password')

@section('content')

<div class="forgot-wrapper">

    <div class="forgot-card">

        {{-- Logo --}}
        <div class="logo-wrapper">
            <img src="{{ asset('images/logo.jpg') }}" 
                 alt="Logo MA Az-Zahra"
                 class="school-logo">
        </div>

        {{-- Header --}}
        <div class="forgot-header">
            <div class="icon-circle">
                <i class="fa-solid fa-lock"></i>
            </div>

            <h1>Lupa Password?</h1>

            <p>
                Jangan khawatir. Masukkan email yang terdaftar
                dan kami akan mengirimkan permintaan reset password
                kepada Admin.
            </p>
        </div>

        {{-- Status --}}
        @if (session('status'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

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
        <form method="POST" action="{{ route('password.email') }}">

            @csrf

            <div class="form-group">

                <label for="email">
                    Email Terdaftar
                </label>

                <div class="input-wrapper">

                    <i class="fa-solid fa-envelope"></i>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        required
                        autofocus
                    >

                </div>

            </div>

            <button type="submit" class="btn-submit">

                <i class="fa-solid fa-paper-plane"></i>

                <span>Kirim Permintaan</span>

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
        <div class="forgot-footer">

            <span>© {{ date('Y') }}</span>

            <strong>MA Az-Zahra Parongpong</strong>

        </div>

    </div>

</div>


<style>

/* ===============================
   WRAPPER
================================ */

.forgot-wrapper {
    width: 100%;
    min-height: calc(100vh - 0px);

    display: flex;
    justify-content: center;
    align-items: center;

    padding: 30px 20px;

    box-sizing: border-box;
}


/* ===============================
   CARD
================================ */

.forgot-card {

    width: 100%;
    max-width: 460px;

    background: #ffffff;

    border: 1px solid #e5e7eb;

    border-radius: 24px;

    padding: 38px;

    box-sizing: border-box;

    box-shadow:
        0 20px 50px rgba(15, 23, 42, 0.08),
        0 5px 15px rgba(15, 23, 42, 0.04);

}


/* ===============================
   LOGO
================================ */

.logo-wrapper {

    display: flex;

    justify-content: center;

    margin-bottom: 20px;

}

.school-logo {

    width: 82px;
    height: 82px;

    object-fit: contain;

}


/* ===============================
   HEADER
================================ */

.forgot-header {

    text-align: center;

    margin-bottom: 28px;

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


.forgot-header h1 {

    margin: 0 0 10px;

    font-size: 27px;

    font-weight: 750;

    color: #111827;

}


.forgot-header p {

    margin: 0 auto;

    max-width: 370px;

    font-size: 14px;

    line-height: 1.7;

    color: #6b7280;

}


/* ===============================
   ALERT
================================ */

.alert-success {

    display: flex;

    gap: 10px;

    align-items: flex-start;

    padding: 13px 15px;

    margin-bottom: 18px;

    border-radius: 12px;

    background: #ecfdf5;

    border: 1px solid #a7f3d0;

    color: #047857;

    font-size: 13px;

}


.alert-error {

    display: flex;

    gap: 10px;

    align-items: flex-start;

    padding: 13px 15px;

    margin-bottom: 18px;

    border-radius: 12px;

    background: #fef2f2;

    border: 1px solid #fecaca;

    color: #b91c1c;

    font-size: 13px;

    line-height: 1.5;

}


/* ===============================
   FORM
================================ */

.form-group {

    margin-bottom: 20px;

}


.form-group label {

    display: block;

    margin-bottom: 8px;

    font-size: 13px;

    font-weight: 650;

    color: #374151;

}


.input-wrapper {

    position: relative;

}


.input-wrapper > i {

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

    padding: 0 15px 0 44px;

    box-sizing: border-box;

    border: 1px solid #d1d5db;

    border-radius: 12px;

    outline: none;

    background: #f9fafb;

    color: #111827;

    font-size: 14px;

    transition: all .2s ease;

}


.input-wrapper input::placeholder {

    color: #9ca3af;

}


.input-wrapper input:focus {

    background: #ffffff;

    border-color: #2563eb;

    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.10);

}


/* ===============================
   BUTTON
================================ */

.btn-submit {

    width: 100%;

    height: 50px;

    border: none;

    border-radius: 12px;

    background: #2563eb;

    color: #ffffff;

    font-size: 14px;

    font-weight: 650;

    cursor: pointer;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    transition: all .2s ease;

}


.btn-submit:hover {

    background: #1d4ed8;

    transform: translateY(-1px);

    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.20);

}


.btn-submit:active {

    transform: translateY(0);

}


/* ===============================
   BACK LOGIN
================================ */

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

    transition: color .2s ease;

}


.back-login a:hover {

    color: #2563eb;

}


/* ===============================
   FOOTER
================================ */

.forgot-footer {

    margin-top: 30px;

    padding-top: 20px;

    border-top: 1px solid #f0f0f0;

    text-align: center;

    font-size: 11px;

    color: #9ca3af;

}


.forgot-footer strong {

    color: #6b7280;

    margin-left: 3px;

}


/* ===============================
   RESPONSIVE
================================ */

@media (max-width: 520px) {

    .forgot-wrapper {

        padding: 20px 14px;

    }

    .forgot-card {

        padding: 28px 22px;

        border-radius: 20px;

    }

    .forgot-header h1 {

        font-size: 24px;

    }

}

</style>


{{-- Font Awesome --}}
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
>

@endsection