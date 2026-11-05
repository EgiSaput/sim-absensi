@extends('layouts.app')

@section('title', $schedule ? 'Edit Jadwal' : 'Tambah Jadwal')

@section('content')

<style>
    /* =====================================================
       PAGE
    ===================================================== */

    .schedule-page {
        width: 100%;
        max-width: 960px;
        margin: 0 auto;
        padding-bottom: 25px;
    }

    /* =====================================================
       HEADER
    ===================================================== */

    .schedule-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 22px;
    }

    .schedule-header-left {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }

    .schedule-header-icon {
        width: 46px;
        height: 46px;
        flex: 0 0 46px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #e8f6fd;
        color: #0788c9;

        border-radius: 12px;
        font-size: 17px;
    }

    .schedule-title {
        margin: 0;

        color: #1e293b;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -.3px;
    }

    .schedule-description {
        margin: 4px 0 0;

        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .schedule-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        min-height: 38px;
        padding: 0 13px;

        background: #fff;
        color: #64748b;

        border: 1px solid #e2e8f0;
        border-radius: 9px;

        text-decoration: none;
        font-size: 10px;
        font-weight: 500;

        white-space: nowrap;
        transition: all .18s ease;
    }

    .schedule-back:hover {
        background: #f8fcff;
        color: #0788c9;
        border-color: #bae6fd;
        transform: translateY(-1px);
    }

    /* =====================================================
       FORM CARD
    ===================================================== */

    .schedule-card {
        overflow: hidden;

        background: #fff;

        border: 1px solid #e2e8f0;
        border-radius: 15px;

        box-shadow:
            0 6px 22px rgba(15, 23, 42, .035);
    }

    .schedule-card-header {
        display: flex;
        align-items: center;
        gap: 11px;

        padding: 20px 23px;

        border-bottom: 1px solid #f1f5f9;
    }

    .schedule-card-header-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f0f9ff;
        color: #0788c9;

        border-radius: 9px;

        font-size: 13px;
    }

    .schedule-card-title {
        margin: 0;

        color: #1e293b;
        font-size: 13px;
        font-weight: 700;
    }

    .schedule-card-subtitle {
        margin: 3px 0 0;

        color: #94a3b8;
        font-size: 9px;
    }

    .schedule-card-body {
        padding: 23px;
    }

    /* =====================================================
       ERROR
    ===================================================== */

    .schedule-error {
        display: flex;
        gap: 10px;

        margin-bottom: 20px;
        padding: 13px 14px;

        background: #fef2f2;

        border: 1px solid #fecaca;
        border-radius: 10px;

        color: #991b1b;

        font-size: 9px;
        line-height: 1.5;
    }

    .schedule-error-icon {
        flex: 0 0 auto;

        margin-top: 1px;

        color: #dc2626;
        font-size: 12px;
    }

    .schedule-error strong {
        display: block;
        margin-bottom: 4px;
        font-weight: 700;
    }

    .schedule-error ul {
        margin: 5px 0 0;
        padding-left: 17px;
    }

    .schedule-error li {
        margin-bottom: 2px;
    }

    /* =====================================================
       FORM GRID
    ===================================================== */

    .schedule-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 19px;
    }

    /* =====================================================
       SECTION
    ===================================================== */

    .schedule-section {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        gap: 7px;

        padding-bottom: 9px;

        border-bottom: 1px solid #f1f5f9;

        color: #0788c9;

        font-size: 10px;
        font-weight: 700;
    }

    .schedule-section i {
        font-size: 10px;
    }

    /* =====================================================
       FORM GROUP
    ===================================================== */

    .schedule-group {
        width: 100%;
        min-width: 0;
    }

    .schedule-label {
        display: flex;
        align-items: center;
        gap: 5px;

        margin-bottom: 7px;

        color: #334155;

        font-size: 10px;
        font-weight: 600;
    }

    .schedule-required {
        color: #ef4444;
    }

    /* =====================================================
       INPUT
    ===================================================== */

    .schedule-input-wrap {
        position: relative;
    }

    .schedule-input-icon {
        position: absolute;

        top: 50%;
        left: 13px;

        z-index: 2;

        transform: translateY(-50%);

        color: #94a3b8;

        font-size: 11px;

        pointer-events: none;

        transition: color .18s ease;
    }

    .schedule-input,
    .schedule-select {
        width: 100%;
        height: 43px;

        box-sizing: border-box;

        padding: 10px 12px 10px 36px;

        background: #fff;
        color: #334155;

        border: 1px solid #e2e8f0;
        border-radius: 9px;

        outline: none;

        font-size: 10px;

        transition:
            border-color .18s ease,
            box-shadow .18s ease;
    }

    .schedule-select {
        cursor: pointer;
    }

    .schedule-input::placeholder {
        color: #cbd5e1;
    }

    .schedule-input:hover,
    .schedule-select:hover {
        border-color: #cbd5e1;
    }

    .schedule-input:focus,
    .schedule-select:focus {
        border-color: #0788c9;

        box-shadow:
            0 0 0 3px
            rgba(7, 136, 201, .08);
    }

    .schedule-input-wrap:focus-within
    .schedule-input-icon {
        color: #0788c9;
    }

    .schedule-help {
        margin: 5px 0 0;

        color: #94a3b8;

        font-size: 8px;
        line-height: 1.5;
    }

    /* =====================================================
       TIME SECTION
    ===================================================== */

    .schedule-time {
        grid-column: 1 / -1;

        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 18px;

        padding: 17px;

        background: #f8fcff;

        border: 1px solid #dbeffc;
        border-radius: 11px;
    }

    .schedule-time-title {
        grid-column: 1 / -1;

        display: flex;
        align-items: center;
        gap: 7px;

        margin-bottom: -4px;

        color: #075985;

        font-size: 10px;
        font-weight: 700;
    }

    .schedule-time-title i {
        color: #0788c9;
    }

    .schedule-time-input {
        background: #fff;
    }

    /* =====================================================
       PREVIEW
    ===================================================== */

    .schedule-preview {
        grid-column: 1 / -1;

        padding: 16px;

        background: linear-gradient(
            135deg,
            #f8fcff 0%,
            #f0f9ff 100%
        );

        border: 1px solid #dbeffc;
        border-radius: 11px;
    }

    .schedule-preview-title {
        display: flex;
        align-items: center;
        gap: 7px;

        margin: 0 0 12px;

        color: #475569;

        font-size: 10px;
        font-weight: 700;
    }

    .schedule-preview-title i {
        color: #0788c9;
    }

    .schedule-preview-grid {
        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 10px;
    }

    .schedule-preview-item {
        min-width: 0;

        padding: 11px;

        background: #fff;

        border: 1px solid #e2e8f0;
        border-radius: 9px;
    }

    .schedule-preview-label {
        margin: 0;

        color: #94a3b8;

        font-size: 7px;
        font-weight: 500;
    }

    .schedule-preview-value {
        display: block;

        margin: 5px 0 0;

        color: #334155;

        font-size: 9px;
        font-weight: 600;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .schedule-preview-value i {
        margin-right: 4px;
        color: #0788c9;
    }

    /* =====================================================
       FOOTER
    ===================================================== */

    .schedule-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;

        margin-top: 23px;
        padding-top: 18px;

        border-top: 1px solid #f1f5f9;
    }

    .schedule-required-info {
        color: #94a3b8;
        font-size: 8px;
    }

    .schedule-required-info span {
        color: #ef4444;
    }

    .schedule-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* =====================================================
       BUTTON
    ===================================================== */

    .schedule-btn-cancel,
    .schedule-btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        height: 39px;
        padding: 0 15px;

        border-radius: 9px;

        font-size: 10px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        transition: all .18s ease;
    }

    .schedule-btn-cancel {
        background: #fff;
        color: #64748b;

        border: 1px solid #e2e8f0;
    }

    .schedule-btn-cancel:hover {
        background: #f8fafc;
        color: #334155;
        border-color: #cbd5e1;
    }

    .schedule-btn-save {
        border: 0;

        background: #0788c9;
        color: #fff;

        box-shadow:
            0 4px 10px
            rgba(7, 136, 201, .16);
    }

    .schedule-btn-save:hover {
        background: #0676ad;
        color: #fff;

        transform: translateY(-1px);

        box-shadow:
            0 6px 14px
            rgba(7, 136, 201, .20);
    }

    .schedule-btn-save:active,
    .schedule-btn-cancel:active {
        transform: translateY(0);
    }

    /* =====================================================
       INFO CARD
    ===================================================== */

    .schedule-info {
        display: flex;
        align-items: flex-start;
        gap: 10px;

        margin-top: 15px;
        padding: 13px 15px;

        background: #f8fcff;

        border: 1px solid #dbeffc;
        border-radius: 11px;
    }

    .schedule-info-icon {
        margin-top: 1px;

        color: #0788c9;

        font-size: 12px;
    }

    .schedule-info-title {
        margin: 0;

        color: #075985;

        font-size: 9px;
        font-weight: 700;
    }

    .schedule-info-text {
        margin: 3px 0 0;

        color: #64748b;

        font-size: 8px;
        line-height: 1.55;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 800px) {

        .schedule-preview-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

    }

    @media (max-width: 650px) {

        .schedule-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .schedule-back {
            width: 100%;
        }

        .schedule-card-body {
            padding: 19px;
        }

        .schedule-card-header {
            padding: 18px 19px;
        }

        .schedule-grid,
        .schedule-time {
            grid-template-columns: 1fr;
        }

        .schedule-section,
        .schedule-time,
        .schedule-time-title,
        .schedule-preview {
            grid-column: auto;
        }

        .schedule-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .schedule-actions {
            width: 100%;
        }

        .schedule-btn-cancel,
        .schedule-btn-save {
            flex: 1;
        }

    }

    @media (max-width: 430px) {

        .schedule-title {
            font-size: 18px;
        }

        .schedule-header-icon {
            width: 42px;
            height: 42px;
            flex-basis: 42px;
        }

        .schedule-card-body {
            padding: 16px;
        }

        .schedule-card-header {
            padding: 16px;
        }

        .schedule-preview-grid {
            grid-template-columns: 1fr;
        }

        .schedule-actions {
            flex-direction: column;
        }

        .schedule-btn-cancel,
        .schedule-btn-save {
            width: 100%;
            flex: none;
        }

    }
</style>


<div class="schedule-page">

    {{-- =================================================
         HEADER
    ================================================== --}}

    <div class="schedule-header">

        <div class="schedule-header-left">

            <div class="schedule-header-icon">

                <i class="fa-solid {{ $schedule ? 'fa-pen-to-square' : 'fa-calendar-plus' }}"></i>

            </div>

            <div>

                <h1 class="schedule-title">
                    {{ $schedule ? 'Edit Jadwal' : 'Tambah Jadwal' }}
                </h1>

                <p class="schedule-description">
                    {{ $schedule
                        ? 'Perbarui informasi jadwal mengajar.'
                        : 'Tambahkan jadwal mengajar baru ke sistem.'
                    }}
                </p>

            </div>

        </div>


        <a
            href="{{ route('admin.schedules.index') }}"
            class="schedule-back"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Jadwal
        </a>

    </div>


    {{-- =================================================
         FORM CARD
    ================================================== --}}

    <div class="schedule-card">

        <div class="schedule-card-header">

            <div class="schedule-card-header-icon">

                <i class="fa-solid fa-chalkboard-user"></i>

            </div>

            <div>

                <h2 class="schedule-card-title">
                    Informasi Jadwal Mengajar
                </h2>

                <p class="schedule-card-subtitle">
                    Lengkapi data pengajaran dan waktu jadwal.
                </p>

            </div>

        </div>


        <div class="schedule-card-body">

            {{-- =================================================
                 ERROR
            ================================================== --}}

            @if ($errors->any())

                <div class="schedule-error">

                    <div class="schedule-error-icon">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>

                    <div>

                        <strong>
                            Terdapat kesalahan:
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
                action="{{ $schedule
                    ? route('admin.schedules.update', $schedule)
                    : route('admin.schedules.store')
                }}"
            >

                @csrf

                @if ($schedule)
                    @method('PUT')
                @endif


                <div class="schedule-grid">

                    {{-- SECTION --}}

                    <div class="schedule-section">

                        <i class="fa-solid fa-chalkboard-user"></i>

                        Data Pengajaran

                    </div>


                    {{-- =================================================
                         GURU
                    ================================================== --}}

                    <div class="schedule-group">

                        <label
                            for="teacher_id"
                            class="schedule-label"
                        >
                            Guru
                            <span class="schedule-required">*</span>
                        </label>

                        <div class="schedule-input-wrap">

                            <i class="fa-solid fa-user-tie schedule-input-icon"></i>

                            <select
                                name="teacher_id"
                                id="teacher_id"
                                class="schedule-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Guru --
                                </option>

                                @foreach ($teachers as $teacher)

                                    <option
                                        value="{{ $teacher->id }}"
                                        {{ old('teacher_id', $schedule->teacher_id ?? '') == $teacher->id ? 'selected' : '' }}
                                    >
                                        {{ $teacher->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <p class="schedule-help">
                            Pilih guru yang akan mengajar.
                        </p>

                    </div>


                    {{-- =================================================
                         KELAS
                    ================================================== --}}

                    <div class="schedule-group">

                        <label
                            for="class_id"
                            class="schedule-label"
                        >
                            Kelas
                            <span class="schedule-required">*</span>
                        </label>

                        <div class="schedule-input-wrap">

                            <i class="fa-solid fa-users schedule-input-icon"></i>

                            <select
                                name="class_id"
                                id="class_id"
                                class="schedule-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Kelas --
                                </option>

                                @foreach ($classes as $class)

                                    <option
                                        value="{{ $class->id }}"
                                        {{ old('class_id', $schedule->class_id ?? '') == $class->id ? 'selected' : '' }}
                                    >
                                        {{ $class->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <p class="schedule-help">
                            Pilih kelas yang mengikuti pembelajaran.
                        </p>

                    </div>


                    {{-- =================================================
                         MAPEL
                    ================================================== --}}

                    <div class="schedule-group">

                        <label
                            for="subject_id"
                            class="schedule-label"
                        >
                            Mata Pelajaran
                            <span class="schedule-required">*</span>
                        </label>

                        <div class="schedule-input-wrap">

                            <i class="fa-solid fa-book schedule-input-icon"></i>

                            <select
                                name="subject_id"
                                id="subject_id"
                                class="schedule-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Mata Pelajaran --
                                </option>

                                @foreach ($subjects as $subject)

                                    <option
                                        value="{{ $subject->id }}"
                                        {{ old('subject_id', $schedule->subject_id ?? '') == $subject->id ? 'selected' : '' }}
                                    >
                                        {{ $subject->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <p class="schedule-help">
                            Pilih mata pelajaran yang diajarkan.
                        </p>

                    </div>


                    {{-- =================================================
                         TAHUN AJARAN
                    ================================================== --}}

                    <div class="schedule-group">

                        <label
                            for="academic_year_id"
                            class="schedule-label"
                        >
                            Tahun Ajaran
                            <span class="schedule-required">*</span>
                        </label>

                        <div class="schedule-input-wrap">

                            <i class="fa-solid fa-calendar-check schedule-input-icon"></i>

                            <select
                                name="academic_year_id"
                                id="academic_year_id"
                                class="schedule-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Tahun Ajaran --
                                </option>

                                @foreach ($academicYears as $year)

                                    <option
                                        value="{{ $year->id }}"
                                        {{ old('academic_year_id', $schedule->academic_year_id ?? '') == $year->id ? 'selected' : '' }}
                                    >
                                        {{ $year->name }}
                                        ({{ ucfirst($year->semester) }})
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <p class="schedule-help">
                            Pilih periode akademik jadwal.
                        </p>

                    </div>


                    {{-- =================================================
                         HARI
                    ================================================== --}}

                    <div class="schedule-group">

                        <label
                            for="day"
                            class="schedule-label"
                        >
                            Hari
                            <span class="schedule-required">*</span>
                        </label>

                        <div class="schedule-input-wrap">

                            <i class="fa-solid fa-calendar-day schedule-input-icon"></i>

                            <select
                                name="day"
                                id="day"
                                class="schedule-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Hari --
                                </option>

                                @foreach ([
                                    'senin',
                                    'selasa',
                                    'rabu',
                                    'kamis',
                                    'jumat',
                                    'sabtu'
                                ] as $day)

                                    <option
                                        value="{{ $day }}"
                                        {{ old('day', $schedule->day ?? '') == $day ? 'selected' : '' }}
                                    >
                                        {{ ucfirst($day) }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <p class="schedule-help">
                            Tentukan hari jadwal mengajar.
                        </p>

                    </div>


                    {{-- =================================================
                         WAKTU
                    ================================================== --}}

                    <div class="schedule-time">

                        <div class="schedule-time-title">

                            <i class="fa-solid fa-clock"></i>

                            Waktu Mengajar

                        </div>


                        {{-- JAM MULAI --}}

                        <div class="schedule-group">

                            <label
                                for="start_time"
                                class="schedule-label"
                            >
                                Jam Mulai
                                <span class="schedule-required">*</span>
                            </label>

                            <div class="schedule-input-wrap">

                                <i class="fa-solid fa-clock schedule-input-icon"></i>

                                <input
                                    type="time"
                                    name="start_time"
                                    id="start_time"
                                    class="schedule-input schedule-time-input"
                                    value="{{ old('start_time', $schedule->start_time ?? '') }}"
                                    required
                                >

                            </div>

                        </div>


                        {{-- JAM SELESAI --}}

                        <div class="schedule-group">

                            <label
                                for="end_time"
                                class="schedule-label"
                            >
                                Jam Selesai
                                <span class="schedule-required">*</span>
                            </label>

                            <div class="schedule-input-wrap">

                                <i class="fa-solid fa-clock schedule-input-icon"></i>

                                <input
                                    type="time"
                                    name="end_time"
                                    id="end_time"
                                    class="schedule-input schedule-time-input"
                                    value="{{ old('end_time', $schedule->end_time ?? '') }}"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         PREVIEW
                    ================================================== --}}

                    <div class="schedule-preview">

                        <p class="schedule-preview-title">

                            <i class="fa-solid fa-eye"></i>

                            Ringkasan Jadwal

                        </p>


                        <div class="schedule-preview-grid">

                            {{-- GURU --}}

                            <div class="schedule-preview-item">

                                <p class="schedule-preview-label">
                                    Guru
                                </p>

                                <p
                                    class="schedule-preview-value"
                                    id="previewTeacher"
                                >
                                    -
                                </p>

                            </div>


                            {{-- KELAS --}}

                            <div class="schedule-preview-item">

                                <p class="schedule-preview-label">
                                    Kelas
                                </p>

                                <p
                                    class="schedule-preview-value"
                                    id="previewClass"
                                >
                                    -
                                </p>

                            </div>


                            {{-- MAPEL --}}

                            <div class="schedule-preview-item">

                                <p class="schedule-preview-label">
                                    Mata Pelajaran
                                </p>

                                <p
                                    class="schedule-preview-value"
                                    id="previewSubject"
                                >
                                    -
                                </p>

                            </div>


                            {{-- JADWAL --}}

                            <div class="schedule-preview-item">

                                <p class="schedule-preview-label">
                                    Jadwal
                                </p>

                                <p
                                    class="schedule-preview-value"
                                    id="previewSchedule"
                                >
                                    -
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     FOOTER
                ================================================== --}}

                <div class="schedule-footer">

                    <div class="schedule-required-info">
                        <span>*</span>
                        Wajib diisi
                    </div>


                    <div class="schedule-actions">

                        <a
                            href="{{ route('admin.schedules.index') }}"
                            class="schedule-btn-cancel"
                        >
                            <i class="fa-solid fa-xmark"></i>
                            Batal
                        </a>


                        <button
                            type="submit"
                            class="schedule-btn-save"
                        >
                            <i class="fa-solid fa-floppy-disk"></i>

                            {{ $schedule
                                ? 'Perbarui Jadwal'
                                : 'Simpan Jadwal'
                            }}

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =================================================
         INFO
    ================================================== --}}

    <div class="schedule-info">

        <div class="schedule-info-icon">

            <i class="fa-solid fa-circle-info"></i>

        </div>

        <div>

            <p class="schedule-info-title">
                Tips Pengisian Jadwal
            </p>

            <p class="schedule-info-text">
                Pastikan guru, kelas, mata pelajaran,
                tahun ajaran, hari, dan waktu sudah sesuai.
                Hindari membuat jadwal yang bentrok pada
                waktu yang sama.
            </p>

        </div>

    </div>

</div>


{{-- =====================================================
     LIVE PREVIEW
====================================================== --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const teacher =
            document.getElementById('teacher_id');

        const schoolClass =
            document.getElementById('class_id');

        const subject =
            document.getElementById('subject_id');

        const day =
            document.getElementById('day');

        const start =
            document.getElementById('start_time');

        const end =
            document.getElementById('end_time');


        const previewTeacher =
            document.getElementById('previewTeacher');

        const previewClass =
            document.getElementById('previewClass');

        const previewSubject =
            document.getElementById('previewSubject');

        const previewSchedule =
            document.getElementById('previewSchedule');


        function getSelectedText(select) {

            if (
                !select ||
                select.selectedIndex === -1 ||
                select.value === ''
            ) {
                return '-';
            }

            return select.options[
                select.selectedIndex
            ].text.trim();

        }


        function updatePreview() {

            previewTeacher.innerHTML =
                '<i class="fa-solid fa-user-tie"></i> '
                + getSelectedText(teacher);


            previewClass.innerHTML =
                '<i class="fa-solid fa-users"></i> '
                + getSelectedText(schoolClass);


            previewSubject.innerHTML =
                '<i class="fa-solid fa-book"></i> '
                + getSelectedText(subject);


            const selectedDay =
                getSelectedText(day);

            const startTime =
                start.value || '--:--';

            const endTime =
                end.value || '--:--';


            previewSchedule.innerHTML =
                '<i class="fa-solid fa-clock"></i> '
                + selectedDay
                + ' • '
                + startTime
                + ' - '
                + endTime;

        }


        teacher.addEventListener(
            'change',
            updatePreview
        );

        schoolClass.addEventListener(
            'change',
            updatePreview
        );

        subject.addEventListener(
            'change',
            updatePreview
        );

        day.addEventListener(
            'change',
            updatePreview
        );

        start.addEventListener(
            'change',
            updatePreview
        );

        end.addEventListener(
            'change',
            updatePreview
        );


        updatePreview();

    });
</script>

@endsection