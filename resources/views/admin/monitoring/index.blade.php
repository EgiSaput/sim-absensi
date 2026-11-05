@extends('layouts.app')

@section('title', 'Monitoring Absensi')

@section('content')

<style>
    /* =========================================================
       MONITORING ABSENSI
       Scoped CSS - tidak mengganggu layouts.app
    ========================================================= */

    .attendance-monitoring-page {
        width: 100%;
        max-width: 1500px;
        margin: 0 auto;
        color: #1e293b;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .attendance-monitoring-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .attendance-monitoring-heading {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 0;
    }

    .attendance-monitoring-heading-icon {
        width: 50px;
        height: 50px;
        flex: 0 0 50px;
        border-radius: 14px;
        background: #e8f6fd;
        color: #0788c9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .attendance-monitoring-title {
        margin: 0;
        color: #1e293b;
        font-size: 22px;
        line-height: 1.25;
        font-weight: 750;
        letter-spacing: -.3px;
    }

    .attendance-monitoring-subtitle {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 11px;
        line-height: 1.5;
    }

    .attendance-monitoring-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 11px;
        border: 1px solid #dbeffc;
        border-radius: 9px;
        background: #f8fcff;
        color: #0788c9;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* =========================================================
       FILTER CARD
    ========================================================= */

    .attendance-filter-card {
        position: relative;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        margin-bottom: 22px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(15, 23, 42, .035);
    }

    .attendance-filter-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 16px 19px;
        border-bottom: 1px solid #f1f5f9;
    }

    .attendance-filter-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .attendance-filter-title-icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        background: #e8f6fd;
        color: #0788c9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .attendance-filter-title h3 {
        margin: 0;
        color: #1e293b;
        font-size: 13px;
        font-weight: 700;
    }

    .attendance-filter-title p {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 9px;
    }

    .attendance-filter-indicator {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #64748b;
        font-size: 9px;
        font-weight: 500;
    }

    .attendance-filter-indicator-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #22c55e;
    }

    .attendance-filter-body {
        padding: 18px 19px;
    }

    .attendance-filter-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(120px, 1fr));
        gap: 13px;
        align-items: end;
    }

    .attendance-filter-group {
        min-width: 0;
    }

    .attendance-filter-label {
        display: flex;
        align-items: center;
        gap: 5px;
        margin: 0 0 6px;
        color: #475569;
        font-size: 10px;
        font-weight: 650;
    }

    .attendance-filter-label i {
        color: #94a3b8;
        font-size: 9px;
    }

    .attendance-filter-control {
        width: 100%;
        height: 40px;
        padding: 0 11px;
        border: 1px solid #dbe2e8;
        border-radius: 9px;
        background: #fff;
        color: #334155;
        font-family: inherit;
        font-size: 11px;
        outline: none;
        transition: all .2s ease;
    }

    .attendance-filter-control:hover {
        border-color: #cbd5e1;
    }

    .attendance-filter-control:focus {
        border-color: #0788c9;
        box-shadow: 0 0 0 3px rgba(7, 136, 201, .08);
    }

    .attendance-filter-button {
        width: 100%;
        height: 40px;
        border: 1px solid #0788c9;
        border-radius: 9px;
        background: #0788c9;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        font-family: inherit;
        font-size: 11px;
        font-weight: 650;
        cursor: pointer;
        box-shadow: 0 4px 11px rgba(7, 136, 201, .15);
        transition: all .2s ease;
    }

    .attendance-filter-button:hover {
        background: #0676ad;
        border-color: #0676ad;
        transform: translateY(-1px);
        box-shadow: 0 7px 15px rgba(7, 136, 201, .18);
    }

    .attendance-filter-button:active {
        transform: translateY(0);
    }

    /* =========================================================
       RECAP SECTION
    ========================================================= */

    .attendance-recap-section {
        margin-bottom: 22px;
    }

    .attendance-section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 11px;
    }

    .attendance-section-heading-left {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .attendance-section-heading-icon {
        color: #0788c9;
        font-size: 12px;
    }

    .attendance-section-heading h3 {
        margin: 0;
        color: #334155;
        font-size: 13px;
        font-weight: 700;
    }

    .attendance-section-heading span {
        color: #94a3b8;
        font-size: 9px;
    }

    .attendance-recap-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 13px;
    }

    .attendance-recap-card {
        position: relative;
        min-width: 0;
        padding: 16px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #ffffff;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(15, 23, 42, .025);
        transition: all .2s ease;
    }

    .attendance-recap-card::after {
        content: "";
        position: absolute;
        right: -25px;
        top: -28px;
        width: 85px;
        height: 85px;
        border-radius: 50%;
        opacity: .6;
        pointer-events: none;
    }

    .attendance-recap-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(15, 23, 42, .055);
    }

    .attendance-recap-card-inner {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .attendance-recap-left {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 0;
    }

    .attendance-recap-icon {
        width: 40px;
        height: 40px;
        flex: 0 0 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .attendance-recap-label {
        margin: 0;
        color: #64748b;
        font-size: 10px;
        font-weight: 500;
    }

    .attendance-recap-number {
        margin: 3px 0 0;
        color: #1e293b;
        font-size: 20px;
        line-height: 1;
        font-weight: 750;
    }

    .attendance-recap-mini-icon {
        color: #cbd5e1;
        font-size: 17px;
    }

    .attendance-recap-hadir {
        background: #f0fdf4;
        color: #15803d;
    }

    .attendance-recap-hadir::after {
        background: #dcfce7;
    }

    .attendance-recap-izin {
        background: #fffbeb;
        color: #a16207;
    }

    .attendance-recap-izin::after {
        background: #fef3c7;
    }

    .attendance-recap-sakit {
        background: #eff6ff;
        color: #2563eb;
    }

    .attendance-recap-sakit::after {
        background: #dbeafe;
    }

    .attendance-recap-alfa {
        background: #fef2f2;
        color: #dc2626;
    }

    .attendance-recap-alfa::after {
        background: #fee2e2;
    }

    /* =========================================================
       TABLE CARD
    ========================================================= */

    .attendance-data-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(15, 23, 42, .035);
    }

    .attendance-data-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 17px 20px;
        border-bottom: 1px solid #f1f5f9;
    }

    .attendance-data-header-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .attendance-data-header-icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        background: #f0f9ff;
        color: #0788c9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .attendance-data-title {
        margin: 0;
        color: #1e293b;
        font-size: 14px;
        font-weight: 700;
    }

    .attendance-data-subtitle {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 9px;
    }

    .attendance-data-count {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 9px;
        border-radius: 7px;
        background: #f8fafc;
        color: #64748b;
        font-size: 9px;
        font-weight: 600;
        white-space: nowrap;
    }

    .attendance-data-count i {
        color: #0788c9;
    }

    /* =========================================================
       TABLE
    ========================================================= */

    .attendance-table-wrapper {
        width: 100%;
        overflow-x: auto;
        scrollbar-width: thin;
    }

    .attendance-monitoring-table {
        width: 100%;
        min-width: 1050px;
        margin: 0;
        border-collapse: collapse;
    }

    .attendance-monitoring-table thead th {
        padding: 12px 14px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
        text-align: left;
        white-space: nowrap;
    }

    .attendance-monitoring-table tbody td {
        padding: 13px 14px;
        border-bottom: 1px solid #f1f5f9;
        color: #475569;
        font-size: 11px;
        line-height: 1.4;
        vertical-align: middle;
        white-space: nowrap;
    }

    .attendance-monitoring-table tbody tr {
        transition: background .15s ease;
    }

    .attendance-monitoring-table tbody tr:hover {
        background: #f8fcff;
    }

    .attendance-monitoring-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* =========================================================
       TABLE CONTENT
    ========================================================= */

    .attendance-row-number {
        width: 32px;
        height: 26px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 7px;
        background: #f8fafc;
        color: #94a3b8;
        font-size: 9px;
        font-weight: 650;
    }

    .attendance-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #334155;
        font-weight: 600;
    }

    .attendance-date-icon {
        color: #0788c9;
        font-size: 10px;
    }

    .attendance-class {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 8px;
        border-radius: 7px;
        background: #f1f5f9;
        color: #475569;
        font-size: 9px;
        font-weight: 650;
    }

    .attendance-class i {
        color: #64748b;
        font-size: 9px;
    }

    .attendance-subject {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #334155;
        font-weight: 600;
    }

    .attendance-subject-icon {
        width: 27px;
        height: 27px;
        border-radius: 7px;
        background: #f8fafc;
        color: #0788c9;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 9px;
    }

    .attendance-teacher {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #64748b;
        font-weight: 500;
    }

    .attendance-teacher-icon {
        color: #94a3b8;
        font-size: 9px;
    }

    .attendance-student {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #1e293b;
        font-weight: 650;
    }

    .attendance-student-avatar {
        width: 29px;
        height: 29px;
        flex: 0 0 29px;
        border-radius: 50%;
        background: #e8f6fd;
        color: #0788c9;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 9px;
        font-weight: 750;
    }

    .attendance-description {
        display: inline-block;
        max-width: 210px;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #64748b;
        vertical-align: middle;
    }

    /* =========================================================
       STATUS
    ========================================================= */

    .attendance-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 9px;
        border-radius: 20px;
        font-size: 9px;
        font-weight: 750;
        letter-spacing: .1px;
    }

    .attendance-status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .attendance-status-hadir {
        background: #dcfce7;
        color: #166534;
    }

    .attendance-status-izin {
        background: #fef3c7;
        color: #92400e;
    }

    .attendance-status-sakit {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .attendance-status-alfa {
        background: #fee2e2;
        color: #b91c1c;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .attendance-empty {
        padding: 65px 20px;
        text-align: center;
    }

    .attendance-empty-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 14px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #94a3b8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .attendance-empty-title {
        margin: 0;
        color: #475569;
        font-size: 14px;
        font-weight: 700;
    }

    .attendance-empty-text {
        margin: 6px auto 0;
        max-width: 400px;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.6;
    }

    /* =========================================================
       PAGINATION
    ========================================================= */

    .attendance-pagination {
        padding: 15px 20px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        justify-content: flex-end;
        overflow-x: auto;
    }

    .attendance-pagination .pagination {
        margin: 0;
    }

    .attendance-pagination .page-link {
        min-width: 32px;
        min-height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 2px;
        border: 1px solid #e2e8f0;
        border-radius: 7px;
        color: #64748b;
        background: #ffffff;
        font-size: 10px;
        box-shadow: none;
    }

    .attendance-pagination .page-link:hover {
        background: #f0f9ff;
        border-color: #cfeafa;
        color: #0788c9;
    }

    .attendance-pagination .page-item.active .page-link {
        background: #0788c9;
        border-color: #0788c9;
        color: #ffffff;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1250px) {

        .attendance-filter-grid {
            grid-template-columns: repeat(3, minmax(150px, 1fr));
        }

    }

    @media (max-width: 900px) {

        .attendance-monitoring-header {
            align-items: flex-start;
        }

        .attendance-monitoring-date {
            display: none;
        }

        .attendance-recap-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

    }

    @media (max-width: 700px) {

        .attendance-filter-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .attendance-data-header {
            padding: 15px;
        }

        .attendance-data-count {
            display: none;
        }

    }

    @media (max-width: 520px) {

        .attendance-monitoring-header {
            margin-bottom: 18px;
        }

        .attendance-monitoring-heading {
            gap: 11px;
        }

        .attendance-monitoring-heading-icon {
            width: 43px;
            height: 43px;
            flex-basis: 43px;
            border-radius: 11px;
            font-size: 17px;
        }

        .attendance-monitoring-title {
            font-size: 18px;
        }

        .attendance-monitoring-subtitle {
            font-size: 10px;
        }

        .attendance-filter-top {
            padding: 14px;
        }

        .attendance-filter-body {
            padding: 14px;
        }

        .attendance-filter-grid {
            grid-template-columns: 1fr;
            gap: 11px;
        }

        .attendance-recap-grid {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .attendance-recap-card {
            padding: 14px;
        }

        .attendance-data-card {
            border-radius: 12px;
        }

        .attendance-empty {
            padding: 50px 15px;
        }

        .attendance-pagination {
            justify-content: flex-start;
            padding: 13px 15px;
        }

    }
</style>


<div class="attendance-monitoring-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="attendance-monitoring-header">

        <div class="attendance-monitoring-heading">

            <div class="attendance-monitoring-heading-icon">
                <i class="fa-solid fa-chart-line"></i>
            </div>

            <div>

                <h1 class="attendance-monitoring-title">
                    Monitoring Absensi
                </h1>

                <p class="attendance-monitoring-subtitle">
                    Pantau data kehadiran siswa dengan mudah.
                </p>

            </div>

        </div>

        <div class="attendance-monitoring-date">
            <i class="fa-solid fa-chart-simple"></i>
            Monitoring Aktif
        </div>

    </div>


    {{-- =====================================================
         FILTER
    ====================================================== --}}

    <div class="attendance-filter-card">

        <div class="attendance-filter-top">

            <div class="attendance-filter-title">

                <div class="attendance-filter-title-icon">
                    <i class="fa-solid fa-sliders"></i>
                </div>

                <div>

                    <h3>
                        Filter Absensi
                    </h3>

                    <p>
                        Gunakan filter untuk menemukan data tertentu.
                    </p>

                </div>

            </div>

            <div class="attendance-filter-indicator">

                <span class="attendance-filter-indicator-dot"></span>

                Data siap difilter

            </div>

        </div>


        <div class="attendance-filter-body">

            <form method="GET">

                <div class="attendance-filter-grid">

                    {{-- TANGGAL MULAI --}}
                    <div class="attendance-filter-group">

                        <label class="attendance-filter-label">
                            <i class="fa-regular fa-calendar"></i>
                            Dari Tanggal
                        </label>

                        <input
                            type="date"
                            name="date_from"
                            value="{{ request('date_from') }}"
                            class="attendance-filter-control"
                        >

                    </div>


                    {{-- TANGGAL SELESAI --}}
                    <div class="attendance-filter-group">

                        <label class="attendance-filter-label">
                            <i class="fa-regular fa-calendar"></i>
                            Sampai Tanggal
                        </label>

                        <input
                            type="date"
                            name="date_to"
                            value="{{ request('date_to') }}"
                            class="attendance-filter-control"
                        >

                    </div>


                    {{-- KELAS --}}
                    <div class="attendance-filter-group">

                        <label class="attendance-filter-label">
                            <i class="fa-solid fa-users"></i>
                            Kelas
                        </label>

                        <select
                            name="class_id"
                            class="attendance-filter-control"
                        >

                            <option value="">
                                Semua Kelas
                            </option>

                            @foreach ($classes as $class)

                                <option
                                    value="{{ $class->id }}"
                                    {{ request('class_id') == $class->id ? 'selected' : '' }}
                                >
                                    {{ $class->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- SISWA --}}
                    <div class="attendance-filter-group">

                        <label class="attendance-filter-label">
                            <i class="fa-solid fa-user"></i>
                            Siswa
                        </label>

                        <select
                            name="student_id"
                            class="attendance-filter-control"
                        >

                            <option value="">
                                Semua Siswa
                            </option>

                            @foreach ($students as $student)

                                <option
                                    value="{{ $student->id }}"
                                    {{ request('student_id') == $student->id ? 'selected' : '' }}
                                >
                                    {{ $student->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- MAPEL --}}
                    <div class="attendance-filter-group">

                        <label class="attendance-filter-label">
                            <i class="fa-solid fa-book"></i>
                            Mata Pelajaran
                        </label>

                        <select
                            name="subject_id"
                            class="attendance-filter-control"
                        >

                            <option value="">
                                Semua Mata Pelajaran
                            </option>

                            @foreach ($subjects as $subject)

                                <option
                                    value="{{ $subject->id }}"
                                    {{ request('subject_id') == $subject->id ? 'selected' : '' }}
                                >
                                    {{ $subject->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- STATUS --}}
                    <div class="attendance-filter-group">

                        <label class="attendance-filter-label">
                            <i class="fa-solid fa-circle-check"></i>
                            Status
                        </label>

                        <select
                            name="status"
                            class="attendance-filter-control"
                        >

                            <option value="">
                                Semua Status
                            </option>

                            @foreach (['HADIR','IZIN','SAKIT','ALFA'] as $status)

                                <option
                                    value="{{ $status }}"
                                    {{ request('status') == $status ? 'selected' : '' }}
                                >
                                    {{ $status }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- BUTTON --}}
                    <div class="attendance-filter-group">

                        <button
                            type="submit"
                            class="attendance-filter-button"
                        >

                            <i class="fa-solid fa-magnifying-glass"></i>

                            Filter Data

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =====================================================
         REKAP
    ====================================================== --}}

    <div class="attendance-recap-section">

        <div class="attendance-section-heading">

            <div class="attendance-section-heading-left">

                <i class="fa-solid fa-chart-pie attendance-section-heading-icon"></i>

                <h3>
                    Ringkasan Kehadiran
                </h3>

            </div>

            <span>
                Berdasarkan filter
            </span>

        </div>


        <div class="attendance-recap-grid">

            {{-- HADIR --}}
            <div class="attendance-recap-card">

                <div class="attendance-recap-card-inner">

                    <div class="attendance-recap-left">

                        <div class="attendance-recap-icon attendance-recap-hadir">
                            <i class="fa-solid fa-check"></i>
                        </div>

                        <div>

                            <p class="attendance-recap-label">
                                Hadir
                            </p>

                            <p class="attendance-recap-number">
                                {{ $recap['HADIR'] ?? 0 }}
                            </p>

                        </div>

                    </div>

                    <i class="fa-solid fa-user-check attendance-recap-mini-icon"></i>

                </div>

            </div>


            {{-- IZIN --}}
            <div class="attendance-recap-card">

                <div class="attendance-recap-card-inner">

                    <div class="attendance-recap-left">

                        <div class="attendance-recap-icon attendance-recap-izin">
                            <i class="fa-solid fa-file-circle-check"></i>
                        </div>

                        <div>

                            <p class="attendance-recap-label">
                                Izin
                            </p>

                            <p class="attendance-recap-number">
                                {{ $recap['IZIN'] ?? 0 }}
                            </p>

                        </div>

                    </div>

                    <i class="fa-solid fa-file-signature attendance-recap-mini-icon"></i>

                </div>

            </div>


            {{-- SAKIT --}}
            <div class="attendance-recap-card">

                <div class="attendance-recap-card-inner">

                    <div class="attendance-recap-left">

                        <div class="attendance-recap-icon attendance-recap-sakit">
                            <i class="fa-solid fa-notes-medical"></i>
                        </div>

                        <div>

                            <p class="attendance-recap-label">
                                Sakit
                            </p>

                            <p class="attendance-recap-number">
                                {{ $recap['SAKIT'] ?? 0 }}
                            </p>

                        </div>

                    </div>

                    <i class="fa-solid fa-heart-pulse attendance-recap-mini-icon"></i>

                </div>

            </div>


            {{-- ALFA --}}
            <div class="attendance-recap-card">

                <div class="attendance-recap-card-inner">

                    <div class="attendance-recap-left">

                        <div class="attendance-recap-icon attendance-recap-alfa">
                            <i class="fa-solid fa-xmark"></i>
                        </div>

                        <div>

                            <p class="attendance-recap-label">
                                Alfa
                            </p>

                            <p class="attendance-recap-number">
                                {{ $recap['ALFA'] ?? 0 }}
                            </p>

                        </div>

                    </div>

                    <i class="fa-solid fa-user-xmark attendance-recap-mini-icon"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         DATA DETAIL
    ====================================================== --}}

    <div class="attendance-data-card">

        <div class="attendance-data-header">

            <div class="attendance-data-header-left">

                <div class="attendance-data-header-icon">
                    <i class="fa-solid fa-table-list"></i>
                </div>

                <div>

                    <h3 class="attendance-data-title">
                        Data Detail Absensi
                    </h3>

                    <p class="attendance-data-subtitle">
                        Daftar kehadiran berdasarkan filter yang dipilih.
                    </p>

                </div>

            </div>


            <div class="attendance-data-count">

                <i class="fa-solid fa-database"></i>

                {{ $details->total() }} Data

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="attendance-table-wrapper">

            <table class="attendance-monitoring-table">

                <thead>

                    <tr>

                        <th style="width: 45px;">
                            No
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Kelas
                        </th>

                        <th>
                            Mata Pelajaran
                        </th>

                        <th>
                            Guru
                        </th>

                        <th>
                            Siswa
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Keterangan
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($details as $index => $detail)

                        @php
                            $status = strtoupper($detail->status);
                        @endphp

                        <tr>

                            {{-- NOMOR --}}
                            <td>

                                <span class="attendance-row-number">

                                    {{ $details->firstItem() + $index }}

                                </span>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                <span class="attendance-date">

                                    <i class="fa-regular fa-calendar attendance-date-icon"></i>

                                    {{
                                        optional(
                                            $detail->session
                                        )->date?->format('d/m/Y') ?? '-'
                                    }}

                                </span>

                            </td>


                            {{-- KELAS --}}
                            <td>

                                <span class="attendance-class">

                                    <i class="fa-solid fa-users"></i>

                                    {{
                                        optional(
                                            $detail->student->schoolClass
                                        )->name ?? '-'
                                    }}

                                </span>

                            </td>


                            {{-- MAPEL --}}
                            <td>

                                <span class="attendance-subject">

                                    <span class="attendance-subject-icon">

                                        <i class="fa-solid fa-book"></i>

                                    </span>

                                    {{
                                        optional(
                                            $detail->session
                                                ?->teachingSchedule
                                                ?->subject
                                        )->name ?? '-'
                                    }}

                                </span>

                            </td>


                            {{-- GURU --}}
                            <td>

                                <span class="attendance-teacher">

                                    <i class="fa-solid fa-chalkboard-user attendance-teacher-icon"></i>

                                    {{
                                        optional(
                                            $detail->session
                                                ?->teachingSchedule
                                                ?->teacher
                                        )->name ?? '-'
                                    }}

                                </span>

                            </td>


                            {{-- SISWA --}}
                            <td>

                                <span class="attendance-student">

                                    <span class="attendance-student-avatar">

                                        {{ strtoupper(substr($detail->student->name, 0, 1)) }}

                                    </span>

                                    {{ $detail->student->name }}

                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                <span
                                    class="
                                        attendance-status
                                        attendance-status-{{ strtolower($status) }}
                                    "
                                >

                                    <span class="attendance-status-dot"></span>

                                    {{ $status }}

                                </span>

                            </td>


                            {{-- KETERANGAN --}}
                            <td>

                                <span
                                    class="attendance-description"
                                    title="{{ $detail->keterangan ?: '-' }}"
                                >
                                    {{ $detail->keterangan ?: '-' }}
                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                style="padding:0;"
                            >

                                <div class="attendance-empty">

                                    <div class="attendance-empty-icon">

                                        <i class="fa-solid fa-clipboard-list"></i>

                                    </div>

                                    <h3 class="attendance-empty-title">
                                        Tidak Ada Data Absensi
                                    </h3>

                                    <p class="attendance-empty-text">
                                        Belum ditemukan data absensi berdasarkan
                                        filter yang dipilih. Coba ubah tanggal,
                                        kelas, siswa, mata pelajaran, atau status.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if($details->hasPages())

            <div class="attendance-pagination">

                {{ $details->links() }}

            </div>

        @endif

    </div>

</div>

@endsection