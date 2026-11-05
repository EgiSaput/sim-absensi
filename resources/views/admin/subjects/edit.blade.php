@extends('layouts.app')

@section('title', 'Edit Mata Pelajaran')

@section('content')

<style>
    /* =====================================================
       EDIT SUBJECT PAGE
    ===================================================== */

    .edit-subject-page {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
    }

    /* =====================================================
       HEADER
    ===================================================== */

    .edit-subject-page .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 20px;
    }

    .edit-subject-page .header-left {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .edit-subject-page .header-icon {
        width: 46px;
        height: 46px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #e8f6fd;
        color: #0788c9;

        border-radius: 12px;
        font-size: 17px;
    }

    .edit-subject-page .page-title {
        margin: 0;

        color: #1e293b;
        font-size: 21px;
        font-weight: 700;
        line-height: 1.2;
    }

    .edit-subject-page .page-description {
        margin: 4px 0 0;

        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .edit-subject-page .back-button {
        height: 38px;
        padding: 0 13px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        background: #ffffff;
        color: #64748b;

        border: 1px solid #e2e8f0;
        border-radius: 8px;

        text-decoration: none;

        font-size: 10px;
        font-weight: 500;

        white-space: nowrap;

        transition:
            border-color .2s ease,
            color .2s ease,
            background .2s ease,
            transform .2s ease;
    }

    .edit-subject-page .back-button:hover {
        background: #f8fcff;
        border-color: #bae6fd;
        color: #0788c9;
        transform: translateY(-1px);
    }

    /* =====================================================
       FORM CARD
    ===================================================== */

    .edit-subject-page .form-card {
        background: #ffffff;

        border: 1px solid #e2e8f0;
        border-radius: 14px;

        padding: 24px;

        box-shadow: 0 4px 15px rgba(15, 23, 42, .03);
    }

    /* =====================================================
       FORM HEADER
    ===================================================== */

    .edit-subject-page .form-header {
        margin-bottom: 21px;
        padding-bottom: 16px;

        border-bottom: 1px solid #f1f5f9;
    }

    .edit-subject-page .form-title {
        margin: 0;

        color: #1e293b;
        font-size: 14px;
        font-weight: 650;
    }

    .edit-subject-page .form-description {
        margin: 4px 0 0;

        color: #94a3b8;
        font-size: 9px;
        line-height: 1.5;
    }

    /* =====================================================
       ERROR
    ===================================================== */

    .edit-subject-page .error-box {
        margin-bottom: 18px;
        padding: 12px 14px;

        background: #fef2f2;

        border: 1px solid #fecaca;
        border-radius: 9px;

        color: #991b1b;
        font-size: 9px;
    }

    .edit-subject-page .error-box strong {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .edit-subject-page .error-box ul {
        margin: 7px 0 0;
        padding-left: 18px;
    }

    .edit-subject-page .error-box li {
        margin-bottom: 3px;
    }

    .edit-subject-page .error-box li:last-child {
        margin-bottom: 0;
    }

    /* =====================================================
       FORM GRID
    ===================================================== */

    .edit-subject-page .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .edit-subject-page .form-group {
        width: 100%;
    }

    /* =====================================================
       SECTION TITLE
    ===================================================== */

    .edit-subject-page .section-title {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        gap: 7px;

        margin-top: 2px;
        padding-bottom: 8px;

        border-bottom: 1px solid #f1f5f9;

        color: #0788c9;
        font-size: 10px;
        font-weight: 600;
    }

    .edit-subject-page .section-title i {
        font-size: 9px;
    }

    /* =====================================================
       LABEL
    ===================================================== */

    .edit-subject-page .form-label {
        display: flex;
        align-items: center;
        gap: 5px;

        margin-bottom: 7px;

        color: #334155;
        font-size: 10px;
        font-weight: 600;
    }

    .edit-subject-page .required {
        color: #ef4444;
    }

    /* =====================================================
       INPUT
    ===================================================== */

    .edit-subject-page .input-wrapper {
        position: relative;
    }

    .edit-subject-page .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;

        transform: translateY(-50%);

        color: #94a3b8;
        font-size: 11px;

        pointer-events: none;

        transition: color .2s ease;
    }

    .edit-subject-page .form-input {
        width: 100%;
        height: 43px;
        box-sizing: border-box;

        padding: 10px 12px 10px 35px;

        background: #ffffff;
        color: #334155;

        border: 1px solid #e2e8f0;
        border-radius: 8px;

        outline: none;

        font-size: 10px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .edit-subject-page .form-input:hover {
        border-color: #cbd5e1;
    }

    .edit-subject-page .form-input:focus {
        border-color: #0788c9;

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .07);
    }

    .edit-subject-page .input-wrapper:focus-within .input-icon {
        color: #0788c9;
    }

    .edit-subject-page .form-input::placeholder {
        color: #cbd5e1;
    }

    /* =====================================================
       HELP
    ===================================================== */

    .edit-subject-page .input-help {
        margin: 5px 0 0;

        color: #94a3b8;
        font-size: 8px;
        line-height: 1.45;
    }

    /* =====================================================
       CURRENT DATA
    ===================================================== */

    .edit-subject-page .current-data {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        gap: 13px;

        padding: 14px;

        background: #f8fcff;

        border: 1px solid #dbeffc;
        border-radius: 10px;

        transition:
            background .2s ease,
            border-color .2s ease;
    }

    .edit-subject-page .current-data:hover {
        background: #f5fbfe;
        border-color: #c7e8f8;
    }

    .edit-subject-page .current-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #e8f6fd;
        color: #0788c9;

        border-radius: 10px;

        font-size: 14px;
    }

    .edit-subject-page .current-content {
        min-width: 0;
    }

    .edit-subject-page .current-label {
        margin: 0;

        color: #94a3b8;
        font-size: 8px;
    }

    .edit-subject-page .current-name {
        margin: 3px 0 0;

        color: #075985;
        font-size: 13px;
        font-weight: 700;

        line-height: 1.3;
        word-break: break-word;
    }

    .edit-subject-page .current-code {
        display: inline-flex;

        margin-top: 5px;
        padding: 4px 7px;

        background: #e0f2fe;
        color: #0369a1;

        border-radius: 5px;

        font-size: 7px;
        font-weight: 700;

        letter-spacing: .03em;
    }

    /* =====================================================
       FOOTER
    ===================================================== */

    .edit-subject-page .form-footer {
        margin-top: 24px;
        padding-top: 17px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;

        border-top: 1px solid #f1f5f9;
    }

    .edit-subject-page .required-info {
        color: #94a3b8;
        font-size: 8px;
    }

    .edit-subject-page .required-info span {
        color: #ef4444;
    }

    .edit-subject-page .form-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* =====================================================
       BUTTONS
    ===================================================== */

    .edit-subject-page .btn-cancel,
    .edit-subject-page .btn-update {
        height: 38px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;

        border-radius: 8px;

        font-size: 10px;
        font-weight: 600;

        cursor: pointer;

        transition:
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .edit-subject-page .btn-cancel {
        padding: 0 14px;

        background: #ffffff;
        color: #64748b;

        border: 1px solid #e2e8f0;

        text-decoration: none;
    }

    .edit-subject-page .btn-cancel:hover {
        background: #f8fafc;
        color: #334155;
        border-color: #cbd5e1;
    }

    .edit-subject-page .btn-update {
        padding: 0 17px;

        background: #0788c9;
        color: #ffffff;

        border: none;
    }

    .edit-subject-page .btn-update:hover {
        background: #0676ad;
        transform: translateY(-1px);

        box-shadow: 0 6px 15px rgba(7, 136, 201, .14);
    }

    .edit-subject-page .btn-update:active {
        transform: translateY(0);
    }

    /* =====================================================
       INFO CARD
    ===================================================== */

    .edit-subject-page .info-card {
        margin-top: 15px;
        padding: 12px 14px;

        display: flex;
        align-items: flex-start;
        gap: 10px;

        background: #f8fcff;

        border: 1px solid #dbeffc;
        border-radius: 10px;
    }

    .edit-subject-page .info-icon {
        margin-top: 2px;

        color: #0788c9;
        font-size: 12px;
    }

    .edit-subject-page .info-content {
        min-width: 0;
    }

    .edit-subject-page .info-title {
        margin: 0;

        color: #075985;
        font-size: 9px;
        font-weight: 600;
    }

    .edit-subject-page .info-text {
        margin: 3px 0 0;

        color: #64748b;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 650px) {

        .edit-subject-page .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .edit-subject-page .back-button {
            width: 100%;
        }

        .edit-subject-page .form-card {
            padding: 18px;
        }

        .edit-subject-page .form-grid {
            grid-template-columns: 1fr;
        }

        .edit-subject-page .section-title,
        .edit-subject-page .current-data {
            grid-column: auto;
        }

        .edit-subject-page .form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .edit-subject-page .form-actions {
            width: 100%;
        }

        .edit-subject-page .form-actions a,
        .edit-subject-page .form-actions button {
            flex: 1;
        }
    }

    @media (max-width: 400px) {

        .edit-subject-page .header-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
        }

        .edit-subject-page .page-title {
            font-size: 18px;
        }

        .edit-subject-page .page-description {
            font-size: 9px;
        }

        .edit-subject-page .form-card {
            padding: 15px;
            border-radius: 11px;
        }

        .edit-subject-page .form-actions {
            flex-direction: column;
        }

        .edit-subject-page .form-actions a,
        .edit-subject-page .form-actions button {
            width: 100%;
        }

        .edit-subject-page .current-data {
            padding: 12px;
        }

        .edit-subject-page .current-name {
            font-size: 12px;
        }
    }
</style>


<div class="edit-subject-page">

    {{-- =================================================
         HEADER
    ================================================== --}}
    <div class="page-header">

        <div class="header-left">

            <div class="header-icon">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>

            <div>
                <h1 class="page-title">
                    Edit Mata Pelajaran
                </h1>

                <p class="page-description">
                    Perbarui data mata pelajaran.
                </p>
            </div>

        </div>


        <a
            href="{{ route('admin.subjects.index') }}"
            class="back-button"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>

    </div>


    {{-- =================================================
         FORM CARD
    ================================================== --}}
    <div class="form-card">

        <div class="form-header">

            <h2 class="form-title">
                Informasi Mata Pelajaran
            </h2>

            <p class="form-description">
                Periksa dan perbarui data di bawah ini.
            </p>

        </div>


        {{-- =================================================
             ERROR
        ================================================== --}}
        @if ($errors->any())

            <div class="error-box">

                <strong>
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Terdapat kesalahan
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
            action="{{ route('admin.subjects.update', $subject) }}"
        >

            @csrf
            @method('PUT')


            <div class="form-grid">

                {{-- SECTION --}}
                <div class="section-title">

                    <i class="fa-solid fa-book"></i>

                    Data Mata Pelajaran

                </div>


                {{-- KODE --}}
                <div class="form-group">

                    <label
                        class="form-label"
                        for="subjectCode"
                    >
                        Kode
                        <span class="required">*</span>
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-hashtag input-icon"></i>

                        <input
                            type="text"
                            name="code"
                            id="subjectCode"
                            class="form-input"
                            value="{{ old('code', $subject->code) }}"
                            maxlength="20"
                            required
                        >

                    </div>

                    <p class="input-help">
                        Gunakan kode singkat, misalnya MTK atau IPA.
                    </p>

                </div>


                {{-- NAMA --}}
                <div class="form-group">

                    <label
                        class="form-label"
                        for="subjectName"
                    >
                        Nama Mata Pelajaran
                        <span class="required">*</span>
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-book-open input-icon"></i>

                        <input
                            type="text"
                            name="name"
                            id="subjectName"
                            class="form-input"
                            value="{{ old('name', $subject->name) }}"
                            required
                        >

                    </div>

                    <p class="input-help">
                        Masukkan nama mata pelajaran secara lengkap.
                    </p>

                </div>


                {{-- =================================================
                     CURRENT DATA / PREVIEW
                ================================================== --}}
                <div class="current-data">

                    <div class="current-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                    <div class="current-content">

                        <p class="current-label">
                            Preview
                        </p>

                        <p
                            class="current-name"
                            id="subjectPreviewName"
                        >
                            {{ old('name', $subject->name) }}
                        </p>

                        <span
                            class="current-code"
                            id="subjectPreviewCode"
                        >
                            {{ old('code', $subject->code) }}
                        </span>

                    </div>

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
                        href="{{ route('admin.subjects.index') }}"
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
                        Perbarui
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

        <div class="info-content">

            <p class="info-title">
                Perhatian
            </p>

            <p class="info-text">
                Pastikan perubahan data sudah benar sebelum
                menyimpan pembaruan.
            </p>

        </div>

    </div>

</div>


{{-- =====================================================
     LIVE PREVIEW
====================================================== --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const codeInput =
            document.getElementById('subjectCode');

        const nameInput =
            document.getElementById('subjectName');

        const previewCode =
            document.getElementById('subjectPreviewCode');

        const previewName =
            document.getElementById('subjectPreviewName');


        function updatePreview() {

            const code = codeInput.value.trim();
            const name = nameInput.value.trim();


            /* KODE */
            previewCode.textContent =
                code === ''
                    ? 'KODE'
                    : code.toUpperCase();


            /* NAMA */
            previewName.textContent =
                name === ''
                    ? 'Belum diisi'
                    : name;
        }


        codeInput.addEventListener(
            'input',
            updatePreview
        );

        nameInput.addEventListener(
            'input',
            updatePreview
        );


        updatePreview();

    });
</script>

@endsection