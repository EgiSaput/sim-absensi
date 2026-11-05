@extends('layouts.app')

@section('title', 'Laporan Absensi')

@section('content')

<style>
    /* =========================================================
       REPORT PAGE
    ========================================================= */

    .report-page {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
        color: #1e293b;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .report-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .report-header-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .report-header-icon {
        width: 50px;
        height: 50px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #e8f6fd, #dff3fc);
        color: #0788c9;
        border: 1px solid #d4edf9;
        border-radius: 14px;
        font-size: 19px;
        box-shadow: 0 5px 15px rgba(7, 136, 201, .08);
    }

    .report-header-title {
        margin: 0;
        font-size: 22px;
        line-height: 1.2;
        font-weight: 750;
        color: #172033;
        letter-spacing: -.3px;
    }

    .report-header-description {
        margin: 5px 0 0;
        font-size: 11px;
        line-height: 1.5;
        color: #94a3b8;
    }

    .report-header-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 10px;
        background: #f0f9ff;
        color: #0369a1;
        border: 1px solid #dbeffc;
        border-radius: 999px;
        font-size: 9px;
        font-weight: 700;
        white-space: nowrap;
    }

    .report-header-badge i {
        font-size: 8px;
    }

    /* =========================================================
       MAIN LAYOUT
    ========================================================= */

    .report-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.55fr) minmax(270px, .75fr);
        gap: 18px;
        align-items: start;
    }

    /* =========================================================
       MAIN CARD
    ========================================================= */

    .report-main-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(15, 23, 42, .045);
        overflow: hidden;
    }

    .report-card-header {
        padding: 21px 23px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid #f1f5f9;
        background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
    }

    .report-card-header-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #e8f6fd;
        color: #0788c9;
        font-size: 14px;
    }

    .report-card-title {
        margin: 0;
        font-size: 13px;
        font-weight: 700;
        color: #1e293b;
    }

    .report-card-subtitle {
        margin: 3px 0 0;
        font-size: 9px;
        color: #94a3b8;
    }

    .report-card-body {
        padding: 23px;
    }

    /* =========================================================
       ERROR
    ========================================================= */

    .report-error {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 13px 14px;
        margin-bottom: 20px;
        background: #fff7f7;
        border: 1px solid #fecaca;
        border-radius: 10px;
        color: #991b1b;
        font-size: 9px;
        line-height: 1.5;
    }

    .report-error-icon {
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #fee2e2;
        color: #dc2626;
        border-radius: 7px;
    }

    .report-error strong {
        display: block;
        margin-bottom: 4px;
    }

    .report-error ul {
        margin: 5px 0 0;
        padding-left: 17px;
    }

    .report-error li {
        margin-bottom: 2px;
    }

    /* =========================================================
       FORM
    ========================================================= */

    .report-form {
        width: 100%;
    }

    .report-section-label {
        display: flex;
        align-items: center;
        gap: 7px;
        margin: 0 0 13px;
        font-size: 10px;
        font-weight: 700;
        color: #334155;
    }

    .report-section-label i {
        color: #0788c9;
        font-size: 10px;
    }

    /* =========================================================
       DATE
    ========================================================= */

    .report-date-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 13px;
    }

    .report-field {
        min-width: 0;
    }

    .report-label {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-bottom: 7px;
        font-size: 9px;
        font-weight: 650;
        color: #475569;
    }

    .report-required {
        color: #ef4444;
    }

    .report-input-wrap {
        position: relative;
    }

    .report-input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 11px;
        pointer-events: none;
        z-index: 2;
    }

    .report-date-input {
        width: 100%;
        height: 43px;
        padding: 0 12px 0 35px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #ffffff;
        color: #334155;
        font-size: 10px;
        outline: none;
        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .report-date-input:hover {
        border-color: #cbd5e1;
    }

    .report-date-input:focus {
        border-color: #0788c9;
        background: #fbfeff;
        box-shadow: 0 0 0 3px rgba(7, 136, 201, .08);
    }

    .report-field-help {
        margin: 5px 0 0;
        font-size: 8px;
        color: #94a3b8;
    }

    /* =========================================================
       PERIOD PREVIEW
    ========================================================= */

    .report-period-preview {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 14px;
        padding: 11px 13px;
        background: #f8fcff;
        border: 1px solid #dbeffc;
        border-radius: 10px;
    }

    .report-period-left {
        display: flex;
        align-items: center;
        gap: 9px;
        min-width: 0;
    }

    .report-period-icon {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #e0f2fe;
        color: #0788c9;
        border-radius: 8px;
        font-size: 10px;
    }

    .report-period-label {
        margin: 0;
        font-size: 7px;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: .4px;
        font-weight: 700;
    }

    .report-period-value {
        margin: 2px 0 0;
        font-size: 9px;
        font-weight: 650;
        color: #075985;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .report-period-days {
        flex-shrink: 0;
        padding: 5px 8px;
        background: #ffffff;
        border: 1px solid #dbeffc;
        border-radius: 7px;
        color: #0369a1;
        font-size: 8px;
        font-weight: 700;
    }

    /* =========================================================
       CLASS FILTER
    ========================================================= */

    .report-class-section {
        margin-top: 24px;
    }

    .report-class-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 11px;
    }

    .report-class-option {
        position: relative;
    }

    .report-class-option input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }

    .report-class-label {
        position: relative;
        display: flex;
        align-items: center;
        gap: 11px;
        min-height: 70px;
        padding: 11px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 11px;
        background: #ffffff;
        cursor: pointer;
        transition:
            border-color .2s ease,
            background .2s ease,
            box-shadow .2s ease,
            transform .2s ease;
    }

    .report-class-label:hover {
        border-color: #b9e4f7;
        background: #fbfeff;
        transform: translateY(-1px);
    }

    .report-class-option input:checked + .report-class-label {
        border-color: #0788c9;
        background: #f3fbff;
        box-shadow: 0 0 0 2px rgba(7, 136, 201, .06);
    }

    .report-class-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 9px;
        background: #e8f6fd;
        color: #0788c9;
        font-size: 13px;
    }

    .report-class-icon.all {
        background: #e0f2fe;
        color: #0369a1;
    }

    .report-class-content {
        min-width: 0;
        flex: 1;
    }

    .report-class-name {
        margin: 0;
        font-size: 10px;
        font-weight: 700;
        color: #334155;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .report-class-desc {
        margin: 3px 0 0;
        font-size: 8px;
        color: #94a3b8;
        line-height: 1.4;
    }

    .report-class-check {
        width: 17px;
        height: 17px;
        margin-left: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #f1f5f9;
        color: transparent;
        border-radius: 50%;
        font-size: 8px;
        transition:
            background .2s ease,
            color .2s ease;
    }

    .report-class-option input:checked
    + .report-class-label
    .report-class-check {
        background: #0788c9;
        color: #ffffff;
    }

    /* =========================================================
       SELECTED CLASS PREVIEW
    ========================================================= */

    .report-selected-class {
        margin-top: 10px;
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 9px 12px;
        background: #f8fcff;
        border: 1px solid #dbeffc;
        border-radius: 9px;
    }

    .report-selected-class-icon {
        width: 25px;
        height: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #e0f2fe;
        color: #0788c9;
        border-radius: 7px;
        font-size: 9px;
    }

    .report-selected-class-label {
        margin: 0;
        font-size: 7px;
        color: #94a3b8;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: .3px;
    }

    .report-selected-class-value {
        margin: 2px 0 0;
        font-size: 9px;
        color: #075985;
        font-weight: 700;
    }

    /* =========================================================
       FORMAT
    ========================================================= */

    .report-format-section {
        margin-top: 24px;
    }

    .report-format-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 11px;
    }

    .report-format-option {
        position: relative;
    }

    .report-format-option input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }

    .report-format-label {
        position: relative;
        display: flex;
        align-items: center;
        gap: 11px;
        min-height: 66px;
        padding: 11px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 11px;
        background: #ffffff;
        cursor: pointer;
        transition:
            border-color .2s ease,
            background .2s ease,
            box-shadow .2s ease,
            transform .2s ease;
    }

    .report-format-label:hover {
        border-color: #b9e4f7;
        background: #fbfeff;
        transform: translateY(-1px);
    }

    .report-format-option input:checked
    + .report-format-label {
        border-color: #0788c9;
        background: #f3fbff;
        box-shadow: 0 0 0 2px rgba(7, 136, 201, .06);
    }

    .report-format-icon {
        width: 37px;
        height: 37px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 9px;
        font-size: 14px;
    }

    .report-pdf {
        background: #fff1f2;
        color: #dc2626;
    }

    .report-excel {
        background: #ecfdf5;
        color: #16a34a;
    }

    .report-format-name {
        margin: 0;
        font-size: 10px;
        font-weight: 700;
        color: #334155;
    }

    .report-format-desc {
        margin: 3px 0 0;
        font-size: 8px;
        color: #94a3b8;
    }

    .report-format-check {
        width: 17px;
        height: 17px;
        margin-left: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #f1f5f9;
        color: transparent;
        border-radius: 50%;
        font-size: 8px;
        transition:
            background .2s ease,
            color .2s ease;
    }

    .report-format-option input:checked
    + .report-format-label
    .report-format-check {
        background: #0788c9;
        color: #ffffff;
    }

    /* =========================================================
       FORM FOOTER
    ========================================================= */

    .report-form-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-top: 25px;
        padding-top: 18px;
        border-top: 1px solid #f1f5f9;
    }

    .report-required-info {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 8px;
        color: #94a3b8;
    }

    .report-required-dot {
        width: 4px;
        height: 4px;
        background: #ef4444;
        border-radius: 50%;
    }

    .report-generate-btn {
        position: relative;
        min-width: 160px;
        height: 42px;
        padding: 0 17px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: none;
        border-radius: 10px;
        background: linear-gradient(135deg, #0788c9, #0676ad);
        color: #ffffff;
        font-size: 10px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 5px 14px rgba(7, 136, 201, .18);
        transition:
            transform .2s ease,
            box-shadow .2s ease,
            filter .2s ease;
    }

    .report-generate-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(7, 136, 201, .23);
        filter: brightness(1.02);
    }

    .report-generate-btn:active {
        transform: translateY(0);
    }

    .report-generate-btn.loading {
        pointer-events: none;
        opacity: .8;
    }

    .report-generate-btn .report-spinner {
        display: none;
    }

    .report-generate-btn.loading .report-btn-icon {
        display: none;
    }

    .report-generate-btn.loading .report-spinner {
        display: inline-block;
        animation: report-spin .8s linear infinite;
    }

    @keyframes report-spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* =========================================================
       SIDE CARD
    ========================================================= */

    .report-side-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(15, 23, 42, .045);
        overflow: hidden;
    }

    .report-side-header {
        padding: 18px 19px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid #f1f5f9;
    }

    .report-side-icon {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e8f6fd;
        color: #0788c9;
        border-radius: 9px;
        font-size: 12px;
    }

    .report-side-title {
        margin: 0;
        font-size: 11px;
        font-weight: 700;
        color: #1e293b;
    }

    .report-side-subtitle {
        margin: 3px 0 0;
        font-size: 8px;
        color: #94a3b8;
    }

    .report-side-body {
        padding: 18px 19px;
    }

    /* =========================================================
       STEPS
    ========================================================= */

    .report-steps {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .report-step {
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }

    .report-step:not(:last-child)::after {
        content: "";
        position: absolute;
        left: 11px;
        top: 27px;
        width: 1px;
        height: calc(100% + 5px);
        background: #e2e8f0;
    }

    .report-step-number {
        width: 23px;
        height: 23px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #e8f6fd;
        color: #0788c9;
        border: 1px solid #dbeffc;
        border-radius: 50%;
        font-size: 8px;
        font-weight: 800;
        position: relative;
        z-index: 2;
    }

    .report-step-title {
        margin: 1px 0 0;
        font-size: 9px;
        font-weight: 700;
        color: #334155;
    }

    .report-step-text {
        margin: 4px 0 0;
        font-size: 8px;
        line-height: 1.5;
        color: #94a3b8;
    }

    /* =========================================================
       FORMAT MINI CARDS
    ========================================================= */

    .report-format-info {
        margin-top: 21px;
        padding-top: 17px;
        border-top: 1px solid #f1f5f9;
    }

    .report-format-info-title {
        margin: 0 0 10px;
        font-size: 9px;
        font-weight: 700;
        color: #475569;
    }

    .report-mini-format {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 8px 9px;
        margin-bottom: 7px;
        border: 1px solid #f1f5f9;
        border-radius: 8px;
        background: #fcfdff;
    }

    .report-mini-format:last-child {
        margin-bottom: 0;
    }

    .report-mini-icon {
        width: 27px;
        height: 27px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 7px;
        font-size: 10px;
    }

    .report-mini-pdf {
        background: #fff1f2;
        color: #dc2626;
    }

    .report-mini-excel {
        background: #ecfdf5;
        color: #16a34a;
    }

    .report-mini-name {
        margin: 0;
        font-size: 8px;
        font-weight: 700;
        color: #475569;
    }

    .report-mini-desc {
        margin: 2px 0 0;
        font-size: 7px;
        color: #94a3b8;
    }

    /* =========================================================
       BOTTOM TIP
    ========================================================= */

    .report-tip {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 18px;
        padding: 13px 15px;
        background: linear-gradient(135deg, #f8fcff, #f0f9ff);
        border: 1px solid #dbeffc;
        border-radius: 12px;
    }

    .report-tip-icon {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #e0f2fe;
        color: #0788c9;
        border-radius: 8px;
        font-size: 10px;
    }

    .report-tip-title {
        margin: 0;
        font-size: 9px;
        font-weight: 700;
        color: #075985;
    }

    .report-tip-text {
        margin: 3px 0 0;
        font-size: 8px;
        line-height: 1.5;
        color: #64748b;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 950px) {

        .report-layout {
            grid-template-columns: 1fr;
        }

        .report-side-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .report-side-header {
            border-bottom: none;
            border-right: 1px solid #f1f5f9;
        }

        .report-side-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .report-format-info {
            margin-top: 18px;
        }
    }

    @media (max-width: 700px) {

        .report-header {
            align-items: flex-start;
        }

        .report-header-badge {
            display: none;
        }

        .report-header-title {
            font-size: 20px;
        }

        .report-card-body {
            padding: 19px;
        }

        .report-card-header {
            padding: 17px 19px;
        }

        .report-date-grid {
            grid-template-columns: 1fr;
        }

        .report-class-grid {
            grid-template-columns: 1fr;
        }

        .report-format-grid {
            grid-template-columns: 1fr;
        }

        .report-side-card {
            display: block;
        }

        .report-side-header {
            border-right: none;
            border-bottom: 1px solid #f1f5f9;
        }
    }

    @media (max-width: 480px) {

        .report-header {
            margin-bottom: 18px;
        }

        .report-header-left {
            gap: 11px;
        }

        .report-header-icon {
            width: 43px;
            height: 43px;
            border-radius: 11px;
            font-size: 16px;
        }

        .report-header-title {
            font-size: 18px;
        }

        .report-header-description {
            font-size: 9px;
        }

        .report-card-body {
            padding: 16px;
        }

        .report-card-header {
            padding: 15px 16px;
        }

        .report-period-preview {
            align-items: flex-start;
            flex-direction: column;
        }

        .report-period-days {
            align-self: flex-start;
        }

        .report-form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .report-required-info {
            order: 2;
        }

        .report-generate-btn {
            width: 100%;
        }

        .report-side-body {
            padding: 16px;
        }

        .report-tip {
            padding: 12px;
        }
    }
</style>


<div class="report-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="report-header">

        <div class="report-header-left">

            <div class="report-header-icon">
                <i class="fa-solid fa-file-chart-column"></i>
            </div>

            <div>

                <h1 class="report-header-title">
                    Laporan Absensi
                </h1>

                <p class="report-header-description">
                    Buat laporan kehadiran berdasarkan periode dan kelas.
                </p>

            </div>

        </div>

        <div class="report-header-badge">

            <i class="fa-solid fa-circle-check"></i>

            Sistem Laporan Aktif

        </div>

    </div>


    {{-- =====================================================
         MAIN LAYOUT
    ====================================================== --}}

    <div class="report-layout">


        {{-- =================================================
             MAIN FORM CARD
        ================================================== --}}

        <div class="report-main-card">

            <div class="report-card-header">

                <div class="report-card-header-icon">
                    <i class="fa-solid fa-sliders"></i>
                </div>

                <div>

                    <h2 class="report-card-title">
                        Buat Laporan Baru
                    </h2>

                    <p class="report-card-subtitle">
                        Atur periode, kelas, dan format laporan.
                    </p>

                </div>

            </div>


            <div class="report-card-body">


                {{-- ERROR --}}

                @if ($errors->any())

                    <div class="report-error">

                        <div class="report-error-icon">
                            <i class="fa-solid fa-exclamation"></i>
                        </div>

                        <div>

                            <strong>
                                Terdapat kesalahan pada input
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


                <form
                    method="POST"
                    action="{{ route('admin.reports.generate') }}"
                    class="report-form"
                    id="reportForm"
                >

                    @csrf


                    {{-- =========================================
                         PERIODE
                    ========================================== --}}

                    <p class="report-section-label">

                        <i class="fa-solid fa-calendar-days"></i>

                        Periode Laporan

                    </p>


                    <div class="report-date-grid">


                        {{-- DARI TANGGAL --}}

                        <div class="report-field">

                            <label
                                for="reportDateFrom"
                                class="report-label"
                            >

                                Dari Tanggal

                                <span class="report-required">
                                    *
                                </span>

                            </label>


                            <div class="report-input-wrap">

                                <i class="fa-solid fa-calendar-days report-input-icon"></i>

                                <input
                                    type="date"
                                    name="date_from"
                                    id="reportDateFrom"
                                    class="report-date-input"
                                    value="{{ old('date_from') }}"
                                    required
                                >

                            </div>


                            <p class="report-field-help">
                                Tentukan tanggal awal laporan.
                            </p>

                        </div>


                        {{-- SAMPAI TANGGAL --}}

                        <div class="report-field">

                            <label
                                for="reportDateTo"
                                class="report-label"
                            >

                                Sampai Tanggal

                                <span class="report-required">
                                    *
                                </span>

                            </label>


                            <div class="report-input-wrap">

                                <i class="fa-solid fa-calendar-check report-input-icon"></i>

                                <input
                                    type="date"
                                    name="date_to"
                                    id="reportDateTo"
                                    class="report-date-input"
                                    value="{{ old('date_to') }}"
                                    required
                                >

                            </div>


                            <p class="report-field-help">
                                Tentukan tanggal akhir laporan.
                            </p>

                        </div>

                    </div>


                    {{-- PERIOD PREVIEW --}}

                    <div class="report-period-preview">

                        <div class="report-period-left">

                            <div class="report-period-icon">
                                <i class="fa-solid fa-calendar-week"></i>
                            </div>

                            <div>

                                <p class="report-period-label">
                                    Periode Terpilih
                                </p>

                                <p
                                    class="report-period-value"
                                    id="reportPeriodText"
                                >
                                    Belum ada periode
                                </p>

                            </div>

                        </div>


                        <div
                            class="report-period-days"
                            id="reportPeriodDays"
                        >
                            0 hari
                        </div>

                    </div>


                    {{-- =========================================
                         CLASS
                    ========================================== --}}

                    <div class="report-class-section">

                        <p class="report-section-label">

                            <i class="fa-solid fa-school"></i>

                            Pilih Kelas

                        </p>


                        <div class="report-class-grid">


                            {{-- SEMUA KELAS --}}

                            <div class="report-class-option">

                                <input
                                    type="radio"
                                    name="class_id"
                                    id="classAll"
                                    value=""
                                    {{ old('class_id', '') === '' ? 'checked' : '' }}
                                >

                                <label
                                    for="classAll"
                                    class="report-class-label"
                                >

                                    <div class="report-class-icon all">

                                        <i class="fa-solid fa-layer-group"></i>

                                    </div>


                                    <div class="report-class-content">

                                        <p class="report-class-name">
                                            Semua Kelas
                                        </p>

                                        <p class="report-class-desc">
                                            Gabungkan seluruh data siswa
                                        </p>

                                    </div>


                                    <span class="report-class-check">

                                        <i class="fa-solid fa-check"></i>

                                    </span>

                                </label>

                            </div>


                            {{-- DAFTAR KELAS --}}

                            @forelse ($classes as $class)

                                <div class="report-class-option">

                                    <input
                                        type="radio"
                                        name="class_id"
                                        id="class{{ $class->id }}"
                                        value="{{ $class->id }}"
                                        {{ old('class_id') == $class->id ? 'checked' : '' }}
                                    >

                                    <label
                                        for="class{{ $class->id }}"
                                        class="report-class-label"
                                    >

                                        <div class="report-class-icon">

                                            <i class="fa-solid fa-school"></i>

                                        </div>


                                        <div class="report-class-content">

                                            <p class="report-class-name">
                                                {{ $class->name }}
                                            </p>

                                            <p class="report-class-desc">
                                                Laporan absensi kelas
                                            </p>

                                        </div>


                                        <span class="report-class-check">

                                            <i class="fa-solid fa-check"></i>

                                        </span>

                                    </label>

                                </div>

                            @empty

                                <div
                                    style="
                                        grid-column: 1 / -1;
                                        padding: 14px;
                                        border: 1px dashed #cbd5e1;
                                        border-radius: 10px;
                                        color: #94a3b8;
                                        font-size: 9px;
                                        text-align: center;
                                    "
                                >

                                    <i class="fa-solid fa-school"
                                       style="margin-right: 5px;">
                                    </i>

                                    Belum ada data kelas.

                                </div>

                            @endforelse

                        </div>


                        {{-- SELECTED CLASS PREVIEW --}}

                        <div class="report-selected-class">

                            <div class="report-selected-class-icon">

                                <i class="fa-solid fa-school"></i>

                            </div>

                            <div>

                                <p class="report-selected-class-label">
                                    Kelas yang akan dicetak
                                </p>

                                <p
                                    class="report-selected-class-value"
                                    id="reportSelectedClass"
                                >
                                    Semua Kelas
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- =========================================
                         FORMAT
                    ========================================== --}}

                    <div class="report-format-section">

                        <p class="report-section-label">

                            <i class="fa-solid fa-file-export"></i>

                            Format Laporan

                        </p>


                        <div class="report-format-grid">


                            {{-- PDF --}}

                            <div class="report-format-option">

                                <input
                                    type="radio"
                                    name="format"
                                    id="formatPdf"
                                    value="pdf"
                                    {{ old('format', 'pdf') == 'pdf' ? 'checked' : '' }}
                                    required
                                >

                                <label
                                    for="formatPdf"
                                    class="report-format-label"
                                >

                                    <div class="report-format-icon report-pdf">

                                        <i class="fa-solid fa-file-pdf"></i>

                                    </div>

                                    <div>

                                        <p class="report-format-name">
                                            PDF
                                        </p>

                                        <p class="report-format-desc">
                                            Siap dicetak dan dibagikan
                                        </p>

                                    </div>

                                    <span class="report-format-check">

                                        <i class="fa-solid fa-check"></i>

                                    </span>

                                </label>

                            </div>


                            {{-- EXCEL --}}

                            <div class="report-format-option">

                                <input
                                    type="radio"
                                    name="format"
                                    id="formatExcel"
                                    value="excel"
                                    {{ old('format') == 'excel' ? 'checked' : '' }}
                                >

                                <label
                                    for="formatExcel"
                                    class="report-format-label"
                                >

                                    <div class="report-format-icon report-excel">

                                        <i class="fa-solid fa-file-excel"></i>

                                    </div>

                                    <div>

                                        <p class="report-format-name">
                                            Excel
                                        </p>

                                        <p class="report-format-desc">
                                            Mudah diolah dan dianalisis
                                        </p>

                                    </div>

                                    <span class="report-format-check">

                                        <i class="fa-solid fa-check"></i>

                                    </span>

                                </label>

                            </div>


                        </div>

                    </div>


                    {{-- =========================================
                         FOOTER
                    ========================================== --}}

                    <div class="report-form-footer">

                        <div class="report-required-info">

                            <span class="report-required-dot"></span>

                            Field bertanda * wajib diisi

                        </div>


                        <button
                            type="submit"
                            class="report-generate-btn"
                            id="reportGenerateBtn"
                        >

                            <i class="fa-solid fa-file-export report-btn-icon"></i>

                            <i class="fa-solid fa-spinner report-spinner"></i>

                            <span class="report-btn-text">
                                Generate Laporan
                            </span>

                        </button>

                    </div>


                </form>

            </div>

        </div>


        {{-- =================================================
             SIDE INFORMATION
        ================================================== --}}

        <div class="report-side-card">


            <div class="report-side-header">

                <div class="report-side-icon">

                    <i class="fa-solid fa-circle-info"></i>

                </div>

                <div>

                    <h3 class="report-side-title">
                        Cara Membuat Laporan
                    </h3>

                    <p class="report-side-subtitle">
                        Hanya 4 langkah sederhana
                    </p>

                </div>

            </div>


            <div class="report-side-body">


                <div class="report-steps">


                    {{-- STEP 1 --}}

                    <div class="report-step">

                        <div class="report-step-number">
                            1
                        </div>

                        <div>

                            <p class="report-step-title">
                                Pilih Periode
                            </p>

                            <p class="report-step-text">
                                Tentukan tanggal awal dan akhir data absensi.
                            </p>

                        </div>

                    </div>


                    {{-- STEP 2 --}}

                    <div class="report-step">

                        <div class="report-step-number">
                            2
                        </div>

                        <div>

                            <p class="report-step-title">
                                Pilih Kelas
                            </p>

                            <p class="report-step-text">
                                Pilih semua kelas atau satu kelas tertentu.
                            </p>

                        </div>

                    </div>


                    {{-- STEP 3 --}}

                    <div class="report-step">

                        <div class="report-step-number">
                            3
                        </div>

                        <div>

                            <p class="report-step-title">
                                Pilih Format
                            </p>

                            <p class="report-step-text">
                                Pilih PDF untuk cetak atau Excel untuk pengolahan.
                            </p>

                        </div>

                    </div>


                    {{-- STEP 4 --}}

                    <div class="report-step">

                        <div class="report-step-number">
                            4
                        </div>

                        <div>

                            <p class="report-step-title">
                                Generate
                            </p>

                            <p class="report-step-text">
                                Klik generate untuk membuat laporan.
                            </p>

                        </div>

                    </div>


                </div>


                {{-- FORMAT INFO --}}

                <div class="report-format-info">

                    <p class="report-format-info-title">
                        Pilihan Format
                    </p>


                    <div class="report-mini-format">

                        <div class="report-mini-icon report-mini-pdf">

                            <i class="fa-solid fa-file-pdf"></i>

                        </div>

                        <div>

                            <p class="report-mini-name">
                                PDF
                            </p>

                            <p class="report-mini-desc">
                                Untuk cetak & dokumentasi
                            </p>

                        </div>

                    </div>


                    <div class="report-mini-format">

                        <div class="report-mini-icon report-mini-excel">

                            <i class="fa-solid fa-file-excel"></i>

                        </div>

                        <div>

                            <p class="report-mini-name">
                                Excel
                            </p>

                            <p class="report-mini-desc">
                                Untuk pengolahan data
                            </p>

                        </div>

                    </div>


                </div>


            </div>

        </div>


    </div>


    {{-- =====================================================
         BOTTOM TIP
    ====================================================== --}}

    <div class="report-tip">

        <div class="report-tip-icon">

            <i class="fa-solid fa-lightbulb"></i>

        </div>

        <div>

            <p class="report-tip-title">
                Tips membuat laporan
            </p>

            <p class="report-tip-text">
                Pilih satu kelas jika ingin mencetak laporan khusus kelas.
                Pilih Semua Kelas jika ingin melihat seluruh data absensi.
            </p>

        </div>

    </div>


</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENT
    ===================================================== */

    const dateFrom = document.getElementById('reportDateFrom');
    const dateTo = document.getElementById('reportDateTo');

    const periodText =
        document.getElementById('reportPeriodText');

    const periodDays =
        document.getElementById('reportPeriodDays');

    const form =
        document.getElementById('reportForm');

    const generateBtn =
        document.getElementById('reportGenerateBtn');

    const btnText =
        generateBtn?.querySelector('.report-btn-text');

    const classInputs =
        document.querySelectorAll(
            'input[name="class_id"]'
        );

    const selectedClass =
        document.getElementById(
            'reportSelectedClass'
        );


    /* =====================================================
       FORMAT DATE
    ===================================================== */

    function formatDate(dateString) {

        if (!dateString) {
            return '-';
        }

        const date =
            new Date(dateString + 'T00:00:00');

        return date.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        });

    }


    /* =====================================================
       UPDATE PERIOD PREVIEW
    ===================================================== */

    function updatePeriodPreview() {

        if (!dateFrom || !dateTo) {
            return;
        }

        const from = dateFrom.value;
        const to = dateTo.value;


        if (!from && !to) {

            periodText.textContent =
                'Belum ada periode';

            periodDays.textContent =
                '0 hari';

            return;
        }


        if (from && !to) {

            periodText.textContent =
                formatDate(from) +
                ' — pilih tanggal akhir';

            periodDays.textContent =
                '...';

            return;
        }


        if (!from && to) {

            periodText.textContent =
                'Pilih tanggal awal — ' +
                formatDate(to);

            periodDays.textContent =
                '...';

            return;
        }


        const start =
            new Date(from + 'T00:00:00');

        const end =
            new Date(to + 'T00:00:00');


        const difference =
            end.getTime() -
            start.getTime();


        const days =
            Math.floor(
                difference /
                (1000 * 60 * 60 * 24)
            ) + 1;


        if (days <= 0) {

            periodText.textContent =
                'Tanggal tidak valid';

            periodDays.textContent =
                'Periksa tanggal';

            return;
        }


        periodText.textContent =
            formatDate(from) +
            ' — ' +
            formatDate(to);

        periodDays.textContent =
            days + ' hari';

    }


    /* =====================================================
       UPDATE CLASS PREVIEW
    ===================================================== */

    function updateSelectedClass() {

        if (!selectedClass) {
            return;
        }

        const checked =
            document.querySelector(
                'input[name="class_id"]:checked'
            );


        if (!checked || checked.value === '') {

            selectedClass.textContent =
                'Semua Kelas';

            return;
        }


        const label =
            document.querySelector(
                `label[for="${checked.id}"]`
            );


        const name =
            label?.querySelector(
                '.report-class-name'
            );


        selectedClass.textContent =
            name
                ? name.textContent.trim()
                : 'Kelas terpilih';

    }


    /* =====================================================
       DATE EVENTS
    ===================================================== */

    if (dateFrom) {

        dateFrom.addEventListener(
            'change',
            updatePeriodPreview
        );

    }


    if (dateTo) {

        dateTo.addEventListener(
            'change',
            updatePeriodPreview
        );

    }


    /* =====================================================
       PREVENT INVALID RANGE
    ===================================================== */

    if (dateFrom) {

        dateFrom.addEventListener(
            'change',
            function () {

                if (dateFrom.value && dateTo) {

                    dateTo.min =
                        dateFrom.value;

                }

                updatePeriodPreview();

            }
        );

    }


    if (dateTo) {

        dateTo.addEventListener(
            'change',
            function () {

                if (dateTo.value && dateFrom) {

                    dateFrom.max =
                        dateTo.value;

                }

                updatePeriodPreview();

            }
        );

    }


    /* =====================================================
       CLASS EVENTS
    ===================================================== */

    classInputs.forEach(function (input) {

        input.addEventListener(
            'change',
            updateSelectedClass
        );

    });


    /* =====================================================
       INITIAL PREVIEW
    ===================================================== */

    updatePeriodPreview();

    updateSelectedClass();


    /* =====================================================
       GENERATE LOADING
    ===================================================== */

    if (form && generateBtn) {

        form.addEventListener(
            'submit',
            function () {

                generateBtn.classList.add(
                    'loading'
                );


                if (btnText) {

                    btnText.textContent =
                        'Membuat Laporan...';

                }

            }
        );

    }

});
</script>

@endsection