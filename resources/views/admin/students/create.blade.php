@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')

<style>
    /* =====================================================
       CREATE STUDENT
    ===================================================== */

    .student-create {
        width: 100%;
        max-width: 960px;
        margin: 0 auto;
        padding-bottom: 25px;
    }

    /* =====================================================
       HEADER
    ===================================================== */

    .student-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .student-header-left {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }

    .student-header-icon {
        width: 46px;
        height: 46px;
        flex: 0 0 46px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eff8ff;
        color: #0788c9;

        border: 1px solid #d9effc;
        border-radius: 12px;

        font-size: 17px;
    }

    .student-page-title {
        margin: 0;

        color: #172033;

        font-size: 20px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -.3px;
    }

    .student-page-description {
        margin: 5px 0 0;

        color: #94a3b8;

        font-size: 10px;
        line-height: 1.4;
    }

    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .student-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        min-height: 37px;
        padding: 0 13px;

        border: 1px solid #e2e8f0;
        border-radius: 9px;

        background: #fff;
        color: #64748b;

        text-decoration: none;

        font-size: 10px;
        font-weight: 600;

        transition: all .18s ease;
        white-space: nowrap;
    }

    .student-back:hover {
        background: #f8fcff;
        border-color: #b9e5f9;
        color: #0788c9;
        transform: translateX(-1px);
    }

    /* =====================================================
       MAIN CARD
    ===================================================== */

    .student-form-card {
        background: #fff;

        border: 1px solid #e5eaf0;
        border-radius: 15px;

        box-shadow:
            0 8px 25px rgba(15, 23, 42, .035);

        overflow: hidden;
    }

    /* =====================================================
       CARD HEADER
    ===================================================== */

    .student-form-top {
        padding: 20px 24px;

        border-bottom: 1px solid #f1f5f9;
    }

    .student-form-title {
        margin: 0;

        color: #1e293b;

        font-size: 14px;
        font-weight: 700;
    }

    .student-form-subtitle {
        margin: 4px 0 0;

        color: #94a3b8;

        font-size: 9px;
        line-height: 1.5;
    }

    /* =====================================================
       FORM BODY
    ===================================================== */

    .student-form-body {
        padding: 24px;
    }

    .student-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 19px 18px;
    }

    .student-form-group {
        min-width: 0;
    }

    .student-form-group.full {
        grid-column: 1 / -1;
    }

    /* =====================================================
       SECTION
    ===================================================== */

    .student-section {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        gap: 9px;

        margin-top: 4px;
        padding-bottom: 10px;

        border-bottom: 1px solid #edf2f7;
    }

    .student-section:first-child {
        margin-top: 0;
    }

    .student-section-icon {
        width: 28px;
        height: 28px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eff8ff;
        color: #0788c9;

        border-radius: 8px;

        font-size: 11px;
    }

    .student-section-title {
        margin: 0;

        color: #334155;

        font-size: 10px;
        font-weight: 700;
    }

    .student-section-description {
        margin: 2px 0 0;

        color: #a1aab8;

        font-size: 8px;
    }

    /* =====================================================
       LABEL
    ===================================================== */

    .student-label {
        display: flex;
        align-items: center;
        gap: 5px;

        margin-bottom: 7px;

        color: #334155;

        font-size: 10px;
        font-weight: 600;
    }

    .student-required {
        color: #ef4444;
        font-weight: 700;
    }

    .student-optional {
        color: #a1aab8;

        font-size: 8px;
        font-weight: 400;
    }

    /* =====================================================
       INPUT
    ===================================================== */

    .student-input-wrap {
        position: relative;
    }

    .student-input-icon {
        position: absolute;
        left: 13px;
        top: 50%;

        transform: translateY(-50%);

        color: #a3afbd;

        font-size: 11px;

        pointer-events: none;

        transition: color .18s ease;
    }

    .student-input,
    .student-select {
        width: 100%;
        height: 42px;

        padding: 0 12px 0 36px;

        box-sizing: border-box;

        border: 1px solid #e2e8f0;
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

    .student-input::placeholder {
        color: #c5ced8;
    }

    .student-input:hover,
    .student-select:hover {
        border-color: #cbd5e1;
    }

    .student-input:focus,
    .student-select:focus {
        border-color: #0788c9;
        background: #fff;

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .07);
    }

    .student-input-wrap:focus-within .student-input-icon {
        color: #0788c9;
    }

    .student-select {
        cursor: pointer;
        appearance: auto;
    }

    /* =====================================================
       HELP TEXT
    ===================================================== */

    .student-help {
        margin: 5px 1px 0;

        color: #a1aab8;

        font-size: 8px;
        line-height: 1.4;
    }

    /* =====================================================
       VALIDATION ERROR
    ===================================================== */

    .student-error {
        margin-bottom: 20px;
        padding: 12px 14px;

        border: 1px solid #fecaca;
        border-radius: 10px;

        background: #fff7f7;
        color: #991b1b;

        font-size: 9px;
    }

    .student-error-header {
        display: flex;
        align-items: center;
        gap: 7px;

        font-weight: 700;
    }

    .student-error ul {
        margin: 7px 0 0;
        padding-left: 20px;
    }

    .student-error li {
        margin-bottom: 3px;
    }

    .student-error li:last-child {
        margin-bottom: 0;
    }

    /* =====================================================
       FOOTER
    ===================================================== */

    .student-form-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        padding: 17px 24px;

        border-top: 1px solid #f1f5f9;
        background: #fcfdfe;
    }

    .student-required-info {
        color: #94a3b8;

        font-size: 8px;
    }

    .student-required-info span {
        color: #ef4444;
        font-weight: 700;
    }

    .student-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* =====================================================
       BUTTONS
    ===================================================== */

    .student-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        height: 37px;
        padding: 0 14px;

        border-radius: 8px;

        font-size: 10px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        transition:
            transform .18s ease,
            background .18s ease,
            border-color .18s ease,
            box-shadow .18s ease;
    }

    .student-btn-cancel {
        border: 1px solid #e2e8f0;

        background: #fff;
        color: #64748b;
    }

    .student-btn-cancel:hover {
        background: #f8fafc;
        border-color: #d7dee7;
        color: #334155;
    }

    .student-btn-save {
        border: 1px solid #0788c9;

        background: #0788c9;
        color: #fff;

        box-shadow:
            0 3px 8px rgba(7, 136, 201, .12);
    }

    .student-btn-save:hover {
        background: #0676ad;
        border-color: #0676ad;

        transform: translateY(-1px);

        box-shadow:
            0 5px 12px rgba(7, 136, 201, .17);
    }

    /* =====================================================
       INFO CARD
    ===================================================== */

    .student-info {
        display: flex;
        align-items: flex-start;
        gap: 10px;

        margin-top: 14px;
        padding: 12px 14px;

        border: 1px solid #dceffc;
        border-radius: 10px;

        background: #f7fcff;
    }

    .student-info-icon {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 22px;
        height: 22px;
        flex: 0 0 22px;

        color: #0788c9;

        font-size: 11px;
    }

    .student-info-title {
        margin: 0;

        color: #075985;

        font-size: 9px;
        font-weight: 700;
    }

    .student-info-text {
        margin: 3px 0 0;

        color: #64748b;

        font-size: 8px;
        line-height: 1.5;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .student-create {
            max-width: 100%;
        }

        .student-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .student-back {
            width: 100%;
        }

        .student-form-grid {
            grid-template-columns: 1fr;
        }

        .student-form-group.full,
        .student-section {
            grid-column: auto;
        }

        .student-form-top,
        .student-form-body {
            padding: 19px;
        }

        .student-form-footer {
            align-items: stretch;
            flex-direction: column;
            padding: 16px 19px;
        }

        .student-actions {
            width: 100%;
        }

        .student-btn {
            flex: 1;
        }
    }

    @media (max-width: 430px) {

        .student-header-left {
            align-items: flex-start;
        }

        .student-header-icon {
            width: 41px;
            height: 41px;
            flex-basis: 41px;
        }

        .student-page-title {
            font-size: 18px;
        }

        .student-page-description {
            font-size: 9px;
        }

        .student-form-grid {
            gap: 16px;
        }

        .student-actions {
            flex-direction: column-reverse;
        }

        .student-btn {
            width: 100%;
        }

        .student-info {
            padding: 11px 12px;
        }
    }
</style>

<div class="student-create">

```
{{-- =====================================================
     HEADER
====================================================== --}}

<div class="student-header">

    <div class="student-header-left">

        <div class="student-header-icon">
            <i class="fa-solid fa-user-graduate"></i>
        </div>

        <div>
            <h1 class="student-page-title">
                Tambah Siswa
            </h1>

            <p class="student-page-description">
                Tambahkan data siswa baru ke dalam sistem.
            </p>
        </div>

    </div>

    <a
        href="{{ route('admin.students.index') }}"
        class="student-back"
    >
        <i class="fa-solid fa-arrow-left"></i>
        Kembali
    </a>

</div>


{{-- =====================================================
     FORM CARD
====================================================== --}}

<div class="student-form-card">

    <div class="student-form-top">

        <h2 class="student-form-title">
            Informasi Siswa
        </h2>

        <p class="student-form-subtitle">
            Lengkapi informasi siswa dengan benar.
        </p>

    </div>


    <div class="student-form-body">

        {{-- VALIDATION ERROR --}}

        @if ($errors->any())

            <div class="student-error">

                <div class="student-error-header">

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


        {{-- FORM --}}

        <form
            method="POST"
            action="{{ route('admin.students.store') }}"
        >

            @csrf

            <div class="student-form-grid">


                {{-- =================================================
                     DATA AKADEMIK
                ================================================== --}}

                <div class="student-section">

                    <div class="student-section-icon">
                        <i class="fa-solid fa-school"></i>
                    </div>

                    <div>

                        <p class="student-section-title">
                            Data Akademik
                        </p>

                        <p class="student-section-description">
                            Informasi utama siswa
                        </p>

                    </div>

                </div>


                {{-- NIS --}}

                <div class="student-form-group">

                    <label class="student-label">

                        NIS

                        <span class="student-required">*</span>

                    </label>

                    <div class="student-input-wrap">

                        <i class="fa-solid fa-id-card student-input-icon"></i>

                        <input
                            type="text"
                            name="nis"
                            value="{{ old('nis') }}"
                            class="student-input"
                            placeholder="Masukkan NIS"
                            required
                        >

                    </div>

                    <p class="student-help">
                        Nomor induk siswa.
                    </p>

                </div>


                {{-- KELAS --}}

                <div class="student-form-group">

                    <label class="student-label">

                        Kelas

                        <span class="student-required">*</span>

                    </label>

                    <div class="student-input-wrap">

                        <i class="fa-solid fa-chalkboard student-input-icon"></i>

                        <select
                            name="class_id"
                            class="student-select"
                            required
                        >

                            <option value="">
                                Pilih kelas
                            </option>

                            @foreach ($classes as $class)

                                <option
                                    value="{{ $class->id }}"
                                    {{ old('class_id') == $class->id ? 'selected' : '' }}
                                >
                                    {{ $class->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <p class="student-help">
                        Pilih kelas siswa saat ini.
                    </p>

                </div>


                {{-- NAMA --}}

                <div class="student-form-group full">

                    <label class="student-label">

                        Nama Lengkap

                        <span class="student-required">*</span>

                    </label>

                    <div class="student-input-wrap">

                        <i class="fa-solid fa-user student-input-icon"></i>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="student-input"
                            placeholder="Masukkan nama lengkap siswa"
                            required
                            autocomplete="name"
                        >

                    </div>

                    <p class="student-help">
                        Gunakan nama sesuai data administrasi sekolah.
                    </p>

                </div>


                {{-- JENIS KELAMIN --}}

                <div class="student-form-group">

                    <label class="student-label">

                        Jenis Kelamin

                        <span class="student-required">*</span>

                    </label>

                    <div class="student-input-wrap">

                        <i class="fa-solid fa-venus-mars student-input-icon"></i>

                        <select
                            name="gender"
                            class="student-select"
                            required
                        >

                            <option value="">
                                Pilih jenis kelamin
                            </option>

                            <option
                                value="L"
                                {{ old('gender') == 'L' ? 'selected' : '' }}
                            >
                                Laki-laki
                            </option>

                            <option
                                value="P"
                                {{ old('gender') == 'P' ? 'selected' : '' }}
                            >
                                Perempuan
                            </option>

                        </select>

                    </div>

                </div>


                {{-- =================================================
                     DATA ORANG TUA
                ================================================== --}}

                <div class="student-section">

                    <div class="student-section-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>

                    <div>

                        <p class="student-section-title">
                            Data Orang Tua / Wali
                        </p>

                        <p class="student-section-description">
                            Informasi kontak orang tua atau wali
                        </p>

                    </div>

                </div>


                {{-- NAMA ORANG TUA --}}

                <div class="student-form-group">

                    <label class="student-label">

                        Nama Orang Tua / Wali

                        <span class="student-optional">
                            Opsional
                        </span>

                    </label>

                    <div class="student-input-wrap">

                        <i class="fa-solid fa-user-tie student-input-icon"></i>

                        <input
                            type="text"
                            name="parent_name"
                            value="{{ old('parent_name') }}"
                            class="student-input"
                            placeholder="Nama orang tua / wali"
                        >

                    </div>

                </div>


                {{-- TELEPON --}}

                <div class="student-form-group">

                    <label class="student-label">

                        No. HP Orang Tua / Wali

                        <span class="student-optional">
                            Opsional
                        </span>

                    </label>

                    <div class="student-input-wrap">

                        <i class="fa-solid fa-phone student-input-icon"></i>

                        <input
                            type="text"
                            name="parent_phone"
                            value="{{ old('parent_phone') }}"
                            class="student-input"
                            placeholder="08xxxxxxxxxx"
                            autocomplete="tel"
                        >

                    </div>

                    <p class="student-help">
                        Nomor yang dapat dihubungi sekolah.
                    </p>

                </div>

            </div>


            {{-- =================================================
                 FOOTER
            ================================================== --}}

            <div class="student-form-footer">

                <div class="student-required-info">

                    <span>*</span>
                    Wajib diisi

                </div>

                <div class="student-actions">

                    <a
                        href="{{ route('admin.students.index') }}"
                        class="student-btn student-btn-cancel"
                    >
                        <i class="fa-solid fa-xmark"></i>
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="student-btn student-btn-save"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Siswa
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


{{-- =====================================================
     INFO
====================================================== --}}

<div class="student-info">

    <div class="student-info-icon">
        <i class="fa-solid fa-circle-info"></i>
    </div>

    <div>

        <p class="student-info-title">
            Periksa kembali data siswa
        </p>

        <p class="student-info-text">
            Pastikan NIS, nama, kelas, dan jenis kelamin
            sudah benar sebelum menyimpan data.
        </p>

    </div>

</div>
```

</div>

@endsection
