@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran')

@section('content')

<style>
    /* =====================================================
       CREATE SUBJECT PAGE
    ===================================================== */

    .create-subject-page {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
    }

    /* =====================================================
       HEADER
    ===================================================== */

    .create-subject-page .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 20px;
    }

    .create-subject-page .header-left {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .create-subject-page .header-icon {
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

    .create-subject-page .page-title {
        margin: 0;

        color: #1e293b;
        font-size: 21px;
        font-weight: 700;
        line-height: 1.2;
    }

    .create-subject-page .page-description {
        margin: 4px 0 0;

        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .create-subject-page .back-button {
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

    .create-subject-page .back-button:hover {
        background: #f8fcff;
        border-color: #bae6fd;
        color: #0788c9;
        transform: translateY(-1px);
    }

    /* =====================================================
       FORM CARD
    ===================================================== */

    .create-subject-page .form-card {
        background: #ffffff;

        border: 1px solid #e2e8f0;
        border-radius: 14px;

        padding: 24px;

        box-shadow: 0 4px 15px rgba(15, 23, 42, .03);
    }

    /* =====================================================
       FORM HEADER
    ===================================================== */

    .create-subject-page .form-header {
        margin-bottom: 21px;
        padding-bottom: 16px;

        border-bottom: 1px solid #f1f5f9;
    }

    .create-subject-page .form-title {
        margin: 0;

        color: #1e293b;
        font-size: 14px;
        font-weight: 650;
    }

    .create-subject-page .form-description {
        margin: 4px 0 0;

        color: #94a3b8;
        font-size: 9px;
        line-height: 1.5;
    }

    /* =====================================================
       ERROR
    ===================================================== */

    .create-subject-page .error-box {
        margin-bottom: 18px;
        padding: 12px 14px;

        background: #fef2f2;

        border: 1px solid #fecaca;
        border-radius: 9px;

        color: #991b1b;
        font-size: 9px;
    }

    .create-subject-page .error-box strong {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .create-subject-page .error-box ul {
        margin: 7px 0 0;
        padding-left: 18px;
    }

    .create-subject-page .error-box li {
        margin-bottom: 3px;
    }

    .create-subject-page .error-box li:last-child {
        margin-bottom: 0;
    }

    /* =====================================================
       FORM GRID
    ===================================================== */

    .create-subject-page .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .create-subject-page .form-group {
        width: 100%;
    }

    /* =====================================================
       SECTION TITLE
    ===================================================== */

    .create-subject-page .section-title {
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

    .create-subject-page .section-title i {
        font-size: 9px;
    }

    /* =====================================================
       LABEL
    ===================================================== */

    .create-subject-page .form-label {
        display: flex;
        align-items: center;
        gap: 5px;

        margin-bottom: 7px;

        color: #334155;
        font-size: 10px;
        font-weight: 600;
    }

    .create-subject-page .required {
        color: #ef4444;
    }

    /* =====================================================
       INPUT
    ===================================================== */

    .create-subject-page .input-wrapper {
        position: relative;
    }

    .create-subject-page .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;

        transform: translateY(-50%);

        color: #94a3b8;
        font-size: 11px;

        pointer-events: none;

        transition: color .2s ease;
    }

    .create-subject-page .form-input {
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

    .create-subject-page .form-input:hover {
        border-color: #cbd5e1;
    }

    .create-subject-page .form-input:focus {
        background: #ffffff;
        border-color: #0788c9;

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .07);
    }

    .create-subject-page .input-wrapper:focus-within .input-icon {
        color: #0788c9;
    }

    .create-subject-page .form-input::placeholder {
        color: #cbd5e1;
    }

    /* =====================================================
       HELP TEXT
    ===================================================== */

    .create-subject-page .input-help {
        margin: 5px 0 0;

        color: #94a3b8;
        font-size: 8px;
        line-height: 1.45;
    }

    /* =====================================================
       PREVIEW
    ===================================================== */

    .create-subject-page .subject-preview {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        gap: 13px;

        padding: 15px;

        background: #f8fcff;

        border: 1px solid #dbeffc;
        border-radius: 10px;

        transition:
            border-color .2s ease,
            background .2s ease;
    }

    .create-subject-page .subject-preview:hover {
        background: #f5fbfe;
        border-color: #c7e8f8;
    }

    .create-subject-page .preview-icon {
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

    .create-subject-page .preview-content {
        min-width: 0;
    }

    .create-subject-page .preview-label {
        margin: 0;

        color: #94a3b8;
        font-size: 8px;
    }

    .create-subject-page .preview-name {
        margin: 3px 0 0;

        color: #075985;
        font-size: 13px;
        font-weight: 700;

        line-height: 1.3;
        word-break: break-word;
    }

    .create-subject-page .preview-code {
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
       FORM FOOTER
    ===================================================== */

    .create-subject-page .form-footer {
        margin-top: 24px;
        padding-top: 17px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;

        border-top: 1px solid #f1f5f9;
    }

    .create-subject-page .required-info {
        color: #94a3b8;
        font-size: 8px;
    }

    .create-subject-page .required-info span {
        color: #ef4444;
    }

    .create-subject-page .form-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* =====================================================
       BUTTONS
    ===================================================== */

    .create-subject-page .btn-cancel,
    .create-subject-page .btn-save {
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

    .create-subject-page .btn-cancel {
        padding: 0 14px;

        background: #ffffff;
        color: #64748b;

        border: 1px solid #e2e8f0;

        text-decoration: none;
    }

    .create-subject-page .btn-cancel:hover {
        background: #f8fafc;
        color: #334155;
        border-color: #cbd5e1;
    }

    .create-subject-page .btn-save {
        padding: 0 17px;

        background: #0788c9;
        color: #ffffff;

        border: none;
    }

    .create-subject-page .btn-save:hover {
        background: #0676ad;
        transform: translateY(-1px);

        box-shadow: 0 6px 15px rgba(7, 136, 201, .14);
    }

    .create-subject-page .btn-save:active {
        transform: translateY(0);
    }

    /* =====================================================
       INFO CARD
    ===================================================== */

    .create-subject-page .info-card {
        margin-top: 15px;
        padding: 12px 14px;

        display: flex;
        align-items: flex-start;
        gap: 10px;

        background: #f8fcff;

        border: 1px solid #dbeffc;
        border-radius: 10px;
    }

    .create-subject-page .info-icon {
        margin-top: 2px;

        color: #0788c9;
        font-size: 12px;
    }

    .create-subject-page .info-content {
        min-width: 0;
    }

    .create-subject-page .info-title {
        margin: 0;

        color: #075985;
        font-size: 9px;
        font-weight: 600;
    }

    .create-subject-page .info-text {
        margin: 3px 0 0;

        color: #64748b;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 650px) {

        .create-subject-page .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .create-subject-page .back-button {
            width: 100%;
        }

        .create-subject-page .form-card {
            padding: 18px;
        }

        .create-subject-page .form-grid {
            grid-template-columns: 1fr;
        }

        .create-subject-page .form-group.full,
        .create-subject-page .section-title,
        .create-subject-page .subject-preview {
            grid-column: auto;
        }

        .create-subject-page .form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .create-subject-page .form-actions {
            width: 100%;
        }

        .create-subject-page .form-actions a,
        .create-subject-page .form-actions button {
            flex: 1;
        }
    }

    @media (max-width: 400px) {

        .create-subject-page .header-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
        }

        .create-subject-page .page-title {
            font-size: 18px;
        }

        .create-subject-page .page-description {
            font-size: 9px;
        }

        .create-subject-page .form-card {
            padding: 15px;
            border-radius: 11px;
        }

        .create-subject-page .form-actions {
            flex-direction: column;
        }

        .create-subject-page .form-actions a,
        .create-subject-page .form-actions button {
            width: 100%;
        }

        .create-subject-page .subject-preview {
            padding: 12px;
        }

        .create-subject-page .preview-name {
            font-size: 12px;
        }
    }
</style>


<div class="create-subject-page">

    {{-- =================================================
         HEADER
    ================================================== --}}
    <div class="page-header">

        <div class="header-left">

            <div class="header-icon">
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div>
                <h1 class="page-title">
                    Tambah Mata Pelajaran
                </h1>

                <p class="page-description">
                    Tambahkan mata pelajaran baru.
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
                Isi kode dan nama mata pelajaran.
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
            action="{{ route('admin.subjects.store') }}"
        >

            @csrf

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
                            value="{{ old('code') }}"
                            placeholder="Contoh: MTK"
                            maxlength="20"
                            required
                        >

                    </div>

                    <p class="input-help">
                        Contoh: MTK, IPA, IPS, B.IND.
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
                            value="{{ old('name') }}"
                            placeholder="Contoh: Matematika"
                            required
                        >

                    </div>

                    <p class="input-help">
                        Gunakan nama mata pelajaran yang jelas.
                    </p>

                </div>


                {{-- =================================================
                     LIVE PREVIEW
                ================================================== --}}
                <div class="subject-preview">

                    <div class="preview-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                    <div class="preview-content">

                        <p class="preview-label">
                            Preview
                        </p>

                        <p
                            class="preview-name"
                            id="subjectPreviewName"
                        >
                            Belum diisi
                        </p>

                        <span
                            class="preview-code"
                            id="subjectPreviewCode"
                        >
                            KODE
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
                        class="btn-save"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan
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
                Informasi
            </p>

            <p class="info-text">
                Pastikan kode dan nama mata pelajaran sudah benar
                sebelum menyimpan data.
            </p>

        </div>

    </div>

</div>


{{-- =====================================================
     LIVE PREVIEW
====================================================== --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const codeInput = document.getElementById('subjectCode');
        const nameInput = document.getElementById('subjectName');

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