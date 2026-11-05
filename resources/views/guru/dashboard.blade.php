@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')

<div class="teacher-dashboard">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="teacher-hero">

        <div class="teacher-hero-content">

            <div class="teacher-breadcrumb">
                <span>
                    <i class="fa-solid fa-house"></i>
                </span>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Guru</span>
                <i class="fa-solid fa-chevron-right"></i>
                <strong>Dashboard</strong>
            </div>

            <div class="teacher-welcome">
                <div class="teacher-welcome-icon">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>

                <div>
                    <span class="teacher-greeting">
                        Selamat datang kembali
                    </span>

                    <h1>
                        {{ auth()->user()->name }}
                    </h1>

                    <p>
                        Kelola jadwal mengajar dan absensi siswa dengan mudah.
                    </p>
                </div>
            </div>

        </div>

        <div class="teacher-hero-decoration">
            <div class="hero-circle circle-one"></div>
            <div class="hero-circle circle-two"></div>
            <i class="fa-solid fa-graduation-cap"></i>
        </div>

    </div>


    {{-- =========================================================
        QUICK SUMMARY
    ========================================================== --}}
    <div class="teacher-summary-grid">

        {{-- Hari --}}
        <div class="teacher-summary-card today-card">

            <div class="summary-top">
                <div class="summary-icon">
                    <i class="fa-regular fa-calendar"></i>
                </div>

                <span class="summary-badge">
                    Hari
                </span>
            </div>

            <div class="summary-content">
                <span>Hari Ini</span>

                <strong>
                    {{ ucfirst($today) }}
                </strong>
            </div>

            <div class="summary-line"></div>

        </div>


        {{-- Jadwal --}}
        <div class="teacher-summary-card schedule-card">

            <div class="summary-top">
                <div class="summary-icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>

                <span class="summary-badge">
                    Hari Ini
                </span>
            </div>

            <div class="summary-content">
                <span>Jadwal Mengajar</span>

                <strong>
                    {{ $todaySchedules->count() }}
                    <small>Jadwal</small>
                </strong>
            </div>

            <div class="summary-line"></div>

        </div>


        {{-- Selesai --}}
        <div class="teacher-summary-card completed-card">

            <div class="summary-top">
                <div class="summary-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <span class="summary-badge">
                    Selesai
                </span>
            </div>

            <div class="summary-content">
                <span>Absensi Selesai</span>

                <strong>
                    {{ $todaySchedules->where('has_attendance_today', true)->count() }}
                    <small>Jadwal</small>
                </strong>
            </div>

            <div class="summary-line"></div>

        </div>


        {{-- Belum --}}
        <div class="teacher-summary-card pending-card">

            <div class="summary-top">
                <div class="summary-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <span class="summary-badge">
                    Menunggu
                </span>
            </div>

            <div class="summary-content">
                <span>Belum Diisi</span>

                <strong>
                    {{ $todaySchedules->where('has_attendance_today', false)->count() }}
                    <small>Jadwal</small>
                </strong>
            </div>

            <div class="summary-line"></div>

        </div>

    </div>


    {{-- =========================================================
        MAIN SCHEDULE
    ========================================================== --}}
    <div class="teacher-schedule-card">

        {{-- HEADER --}}
        <div class="schedule-header">

            <div class="schedule-heading">

                <div class="schedule-heading-icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <div>
                    <span class="section-label">
                        AKTIVITAS HARI INI
                    </span>

                    <h2>
                        Jadwal Mengajar
                    </h2>

                    <p>
                        {{ ucfirst($today) }} · Jadwal yang perlu Anda kelola
                    </p>
                </div>

            </div>

            <div class="schedule-total">
                <strong>
                    {{ $todaySchedules->count() }}
                </strong>

                <span>
                    Jadwal
                </span>
            </div>

        </div>


        {{-- =====================================================
            EMPTY STATE
        ====================================================== --}}
        @if ($todaySchedules->isEmpty())

            <div class="teacher-empty">

                <div class="empty-illustration">
                    <div class="empty-illustration-circle">
                        <i class="fa-regular fa-calendar-xmark"></i>
                    </div>

                    <span class="empty-dot dot-one"></span>
                    <span class="empty-dot dot-two"></span>
                    <span class="empty-dot dot-three"></span>
                </div>

                <h3>
                    Tidak Ada Jadwal Hari Ini
                </h3>

                <p>
                    Anda tidak memiliki jadwal mengajar untuk hari {{ ucfirst($today) }}.
                </p>

            </div>

        @else

            {{-- =================================================
                DESKTOP TABLE
            ================================================== --}}
            <div class="teacher-table-container">

                <table class="teacher-table">

                    <thead>
                        <tr>
                            <th>
                                <span>Waktu</span>
                            </th>

                            <th>
                                <span>Kelas</span>
                            </th>

                            <th>
                                <span>Mata Pelajaran</span>
                            </th>

                            <th>
                                <span>Status</span>
                            </th>

                            <th class="action-column">
                                <span>Aksi</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($todaySchedules as $schedule)

                            <tr>

                                {{-- =================================
                                    WAKTU
                                ================================== --}}
                                <td>

                                    <div class="teacher-time">

                                        <div class="time-box">
                                            <i class="fa-regular fa-clock"></i>
                                        </div>

                                        <div class="time-text">

                                            <strong>
                                                {{ $schedule->start_time }}
                                            </strong>

                                            <span>
                                                sampai {{ $schedule->end_time }}
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                {{-- =================================
                                    KELAS
                                ================================== --}}
                                <td>

                                    <div class="teacher-class">

                                        <div class="class-avatar">
                                            <i class="fa-solid fa-users"></i>
                                        </div>

                                        <div>
                                            <strong>
                                                {{ $schedule->schoolClass->name }}
                                            </strong>

                                            <span>
                                                Kelas
                                            </span>
                                        </div>

                                    </div>

                                </td>


                                {{-- =================================
                                    MAPEL
                                ================================== --}}
                                <td>

                                    <div class="teacher-subject">

                                        <div class="subject-icon">
                                            <i class="fa-solid fa-book-open"></i>
                                        </div>

                                        <span>
                                            {{ $schedule->subject->name }}
                                        </span>

                                    </div>

                                </td>


                                {{-- =================================
                                    STATUS
                                ================================== --}}
                                <td>

                                    @if ($schedule->has_attendance_today)

                                        <div class="teacher-status status-completed">

                                            <span class="status-icon">
                                                <i class="fa-solid fa-check"></i>
                                            </span>

                                            <div>
                                                <strong>
                                                    Sudah Diisi
                                                </strong>

                                                <span>
                                                    Absensi selesai
                                                </span>
                                            </div>

                                        </div>

                                    @else

                                        <div class="teacher-status status-pending">

                                            <span class="status-icon">
                                                <i class="fa-solid fa-clock"></i>
                                            </span>

                                            <div>
                                                <strong>
                                                    Belum Diisi
                                                </strong>

                                                <span>
                                                    Menunggu absensi
                                                </span>
                                            </div>

                                        </div>

                                    @endif

                                </td>


                                {{-- =================================
                                    AKSI
                                ================================== --}}
                                <td>

                                    <div class="teacher-action">

                                        <a
                                            href="{{ route('guru.absensi.show', $schedule) }}"
                                            class="teacher-attendance-btn"
                                        >

                                            @if ($schedule->has_attendance_today)

                                                <i class="fa-solid fa-eye"></i>

                                                <span>
                                                    Lihat Absensi
                                                </span>

                                            @else

                                                <i class="fa-solid fa-clipboard-check"></i>

                                                <span>
                                                    Isi Absensi
                                                </span>

                                            @endif

                                            <i class="fa-solid fa-arrow-right btn-arrow"></i>

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>


    {{-- =========================================================
        INFORMATION
    ========================================================== --}}
    <div class="teacher-info-card">

        <div class="info-left">

            <div class="info-main-icon">
                <i class="fa-solid fa-lightbulb"></i>
            </div>

            <div class="info-text">

                <span>
                    INFORMASI
                </span>

                <strong>
                    Kelola absensi sesuai jadwal
                </strong>

                <p>
                    Pastikan absensi siswa diisi sesuai dengan jadwal mengajar.
                    Absensi yang sudah diisi dapat dibuka kembali untuk melihat datanya.
                </p>

            </div>

        </div>

        <div class="info-decoration">
            <i class="fa-solid fa-clipboard-check"></i>
        </div>

    </div>

</div>


<style>

/* =========================================================
   TEACHER DASHBOARD
========================================================= */

.teacher-dashboard {
    --teacher-blue: #0788c9;
    --teacher-blue-dark: #0676ad;
    --teacher-blue-light: #e8f6fd;
    --teacher-blue-soft: #f4fbff;

    --teacher-text: #172033;
    --teacher-muted: #64748b;
    --teacher-light: #94a3b8;

    --teacher-border: #e5edf3;
    --teacher-bg: #f7fafc;

    --teacher-green: #16a34a;
    --teacher-green-bg: #ecfdf3;

    --teacher-orange: #ea580c;
    --teacher-orange-bg: #fff7ed;

    width: 100%;
    max-width: 1450px;
    margin: 0 auto;
    padding-bottom: 30px;
}


/* =========================================================
   HERO
========================================================= */

.teacher-hero {
    position: relative;
    min-height: 190px;
    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 30px 34px;
    margin-bottom: 22px;

    border-radius: 22px;

    background:
        linear-gradient(
            120deg,
            #067db5 0%,
            #0788c9 55%,
            #16a3df 100%
        );

    box-shadow:
        0 15px 35px rgba(7, 136, 201, .18);
}

.teacher-hero-content {
    position: relative;
    z-index: 2;
}

.teacher-breadcrumb {
    display: flex;
    align-items: center;
    gap: 9px;

    margin-bottom: 18px;

    color: rgba(255,255,255,.70);
    font-size: 12px;
}

.teacher-breadcrumb span:first-child {
    width: 25px;
    height: 25px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: rgba(255,255,255,.13);
}

.teacher-breadcrumb i {
    font-size: 8px;
}

.teacher-breadcrumb strong {
    color: #fff;
    font-weight: 600;
}

.teacher-welcome {
    display: flex;
    align-items: center;
    gap: 15px;
}

.teacher-welcome-icon {
    width: 58px;
    height: 58px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 16px;

    color: #fff;
    font-size: 23px;

    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.18);

    backdrop-filter: blur(8px);
}

.teacher-greeting {
    display: block;

    margin-bottom: 3px;

    color: rgba(255,255,255,.75);
    font-size: 12px;
}

.teacher-welcome h1 {
    margin: 0;

    color: #fff;

    font-size: 26px;
    font-weight: 800;
    letter-spacing: -.02em;
}

.teacher-welcome p {
    margin: 5px 0 0;

    color: rgba(255,255,255,.78);

    font-size: 13px;
}

.teacher-hero-decoration {
    position: absolute;
    right: 40px;
    top: 0;

    width: 280px;
    height: 100%;
}

.teacher-hero-decoration > i {
    position: absolute;

    right: 58px;
    bottom: 35px;

    color: rgba(255,255,255,.13);

    font-size: 95px;

    transform: rotate(-8deg);
}

.hero-circle {
    position: absolute;

    border-radius: 50%;

    background: rgba(255,255,255,.07);
}

.circle-one {
    width: 230px;
    height: 230px;

    right: -60px;
    top: -100px;
}

.circle-two {
    width: 150px;
    height: 150px;

    right: 110px;
    bottom: -100px;
}


/* =========================================================
   SUMMARY
========================================================= */

.teacher-summary-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));

    gap: 15px;

    margin-bottom: 22px;
}

.teacher-summary-card {
    position: relative;

    min-height: 145px;

    padding: 18px 19px;

    overflow: hidden;

    background: #fff;

    border: 1px solid var(--teacher-border);
    border-radius: 17px;

    box-shadow: 0 5px 18px rgba(15, 23, 42, .035);

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}

.teacher-summary-card:hover {
    transform: translateY(-3px);

    border-color: #cfe8f5;

    box-shadow:
        0 12px 28px rgba(15, 23, 42, .07);
}

.summary-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.summary-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    font-size: 16px;
}

.summary-badge {
    padding: 5px 8px;

    border-radius: 7px;

    color: #94a3b8;

    background: #f8fafc;

    font-size: 9px;
    font-weight: 700;
}

.summary-content {
    margin-top: 17px;
}

.summary-content > span {
    display: block;

    margin-bottom: 4px;

    color: var(--teacher-muted);

    font-size: 11px;
    font-weight: 500;
}

.summary-content strong {
    display: block;

    color: var(--teacher-text);

    font-size: 21px;
    line-height: 1.2;
    font-weight: 800;
}

.summary-content small {
    color: var(--teacher-light);

    font-size: 10px;
    font-weight: 500;
}

.summary-line {
    position: absolute;

    left: 19px;
    right: 19px;
    bottom: 0;

    height: 3px;

    border-radius: 5px 5px 0 0;
}


/* Card Colors */

.today-card .summary-icon {
    color: var(--teacher-blue);
    background: var(--teacher-blue-light);
}

.today-card .summary-line {
    background: var(--teacher-blue);
}

.schedule-card .summary-icon {
    color: #7c3aed;
    background: #f3efff;
}

.schedule-card .summary-line {
    background: #7c3aed;
}

.completed-card .summary-icon {
    color: var(--teacher-green);
    background: var(--teacher-green-bg);
}

.completed-card .summary-line {
    background: var(--teacher-green);
}

.pending-card .summary-icon {
    color: var(--teacher-orange);
    background: var(--teacher-orange-bg);
}

.pending-card .summary-line {
    background: var(--teacher-orange);
}


/* =========================================================
   SCHEDULE CARD
========================================================= */

.teacher-schedule-card {
    overflow: hidden;

    background: #fff;

    border: 1px solid var(--teacher-border);
    border-radius: 19px;

    box-shadow:
        0 7px 25px rgba(15, 23, 42, .045);
}

.schedule-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    padding: 22px 24px;

    border-bottom: 1px solid #edf2f6;
}

.schedule-heading {
    display: flex;
    align-items: center;
    gap: 13px;
}

.schedule-heading-icon {
    width: 46px;
    height: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 13px;

    color: var(--teacher-blue);
    background: var(--teacher-blue-light);

    font-size: 18px;
}

.section-label {
    display: block;

    margin-bottom: 3px;

    color: var(--teacher-blue);

    font-size: 9px;
    font-weight: 800;
    letter-spacing: .09em;
}

.schedule-heading h2 {
    margin: 0;

    color: var(--teacher-text);

    font-size: 18px;
    font-weight: 750;
    letter-spacing: -.01em;
}

.schedule-heading p {
    margin: 4px 0 0;

    color: var(--teacher-light);

    font-size: 11px;
}

.schedule-total {
    min-width: 72px;

    padding: 8px 12px;

    text-align: center;

    border-radius: 10px;

    background: var(--teacher-blue-soft);
    border: 1px solid #e1f2fa;
}

.schedule-total strong {
    display: block;

    color: var(--teacher-blue);

    font-size: 17px;
    font-weight: 800;
}

.schedule-total span {
    color: var(--teacher-muted);

    font-size: 9px;
}


/* =========================================================
   TABLE
========================================================= */

.teacher-table-container {
    width: 100%;

    overflow-x: auto;
}

.teacher-table {
    width: 100%;

    min-width: 950px;

    border-collapse: collapse;
}

.teacher-table thead {
    background: #f9fbfc;
}

.teacher-table th {
    padding: 13px 20px;

    text-align: left;

    color: #8291a3;

    border-bottom: 1px solid #edf2f6;

    font-size: 9px;
    font-weight: 800;

    text-transform: uppercase;
    letter-spacing: .06em;
}

.teacher-table td {
    padding: 16px 20px;

    color: #334155;

    border-bottom: 1px solid #f0f4f7;

    font-size: 12px;

    vertical-align: middle;
}

.teacher-table tbody tr {
    transition: background .18s ease;
}

.teacher-table tbody tr:hover {
    background: #fafdff;
}

.teacher-table tbody tr:last-child td {
    border-bottom: none;
}

.action-column {
    text-align: right !important;
}


/* =========================================================
   TIME
========================================================= */

.teacher-time {
    display: flex;
    align-items: center;
    gap: 10px;
}

.time-box {
    width: 36px;
    height: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 10px;

    color: var(--teacher-blue);
    background: #f1f9fd;
}

.time-text strong {
    display: block;

    color: var(--teacher-text);

    font-size: 13px;
    font-weight: 800;
}

.time-text span {
    display: block;

    margin-top: 2px;

    color: #9aa8b7;

    font-size: 10px;
}


/* =========================================================
   CLASS
========================================================= */

.teacher-class {
    display: flex;
    align-items: center;
    gap: 9px;
}

.class-avatar {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 10px;

    color: #6d28d9;
    background: #f5f1ff;

    font-size: 12px;
}

.teacher-class strong {
    display: block;

    color: var(--teacher-text);

    font-size: 12px;
    font-weight: 700;
}

.teacher-class span {
    display: block;

    margin-top: 2px;

    color: #a0adba;

    font-size: 9px;
}


/* =========================================================
   SUBJECT
========================================================= */

.teacher-subject {
    display: flex;
    align-items: center;
    gap: 9px;
}

.subject-icon {
    width: 31px;
    height: 31px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    color: var(--teacher-blue);

    background: var(--teacher-blue-light);

    font-size: 11px;
}

.teacher-subject span {
    color: #334155;

    font-size: 12px;
    font-weight: 600;
}


/* =========================================================
   STATUS
========================================================= */

.teacher-status {
    display: inline-flex;
    align-items: center;

    gap: 8px;
}

.status-icon {
    width: 30px;
    height: 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    font-size: 10px;
}

.teacher-status strong {
    display: block;

    font-size: 10px;
    font-weight: 750;
}

.teacher-status span:not(.status-icon) {
    display: block;

    margin-top: 2px;

    font-size: 8px;
}

.status-completed .status-icon {
    color: var(--teacher-green);
    background: var(--teacher-green-bg);
}

.status-completed strong {
    color: #15803d;
}

.status-completed span:not(.status-icon) {
    color: #86a98e;
}

.status-pending .status-icon {
    color: var(--teacher-orange);
    background: var(--teacher-orange-bg);
}

.status-pending strong {
    color: #c2410c;
}

.status-pending span:not(.status-icon) {
    color: #b89a88;
}


/* =========================================================
   ACTION BUTTON
========================================================= */

.teacher-action {
    display: flex;
    justify-content: flex-end;
}

.teacher-attendance-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    min-height: 35px;

    padding: 8px 11px;

    border-radius: 9px;

    color: #fff !important;
    background: var(--teacher-blue);

    text-decoration: none;

    font-size: 10px;
    font-weight: 700;

    box-shadow:
        0 4px 10px rgba(7, 136, 201, .15);

    transition:
        transform .18s ease,
        background .18s ease,
        box-shadow .18s ease;
}

.teacher-attendance-btn:hover {
    color: #fff !important;

    background: var(--teacher-blue-dark);

    transform: translateY(-1px);

    box-shadow:
        0 6px 15px rgba(7, 136, 201, .22);
}

.btn-arrow {
    margin-left: 2px;

    font-size: 8px;

    opacity: .75;

    transition: transform .18s ease;
}

.teacher-attendance-btn:hover .btn-arrow {
    transform: translateX(2px);
}


/* =========================================================
   EMPTY STATE
========================================================= */

.teacher-empty {
    padding: 65px 20px 70px;

    text-align: center;
}

.empty-illustration {
    position: relative;

    width: 85px;
    height: 75px;

    margin: 0 auto 18px;
}

.empty-illustration-circle {
    width: 68px;
    height: 68px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin: auto;

    border-radius: 20px;

    color: #94a3b8;

    background: #f5f8fa;

    font-size: 24px;
}

.empty-dot {
    position: absolute;

    display: block;

    border-radius: 50%;

    background: #dbeffc;
}

.dot-one {
    width: 7px;
    height: 7px;

    top: 3px;
    right: 10px;
}

.dot-two {
    width: 5px;
    height: 5px;

    bottom: 6px;
    left: 9px;

    background: #e7edf2;
}

.dot-three {
    width: 4px;
    height: 4px;

    top: 20px;
    left: 4px;

    background: #d8edf8;
}

.teacher-empty h3 {
    margin: 0 0 7px;

    color: var(--teacher-text);

    font-size: 16px;
    font-weight: 750;
}

.teacher-empty p {
    max-width: 430px;

    margin: 0 auto;

    color: #94a3b8;

    font-size: 12px;
    line-height: 1.6;
}


/* =========================================================
   INFORMATION CARD
========================================================= */

.teacher-info-card {
    position: relative;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    margin-top: 17px;
    padding: 17px 20px;

    overflow: hidden;

    border: 1px solid #dceef7;
    border-radius: 15px;

    background:
        linear-gradient(
            110deg,
            #f5fbfe,
            #ffffff
        );
}

.info-left {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.info-main-icon {
    width: 37px;
    height: 37px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 10px;

    color: var(--teacher-blue);

    background: var(--teacher-blue-light);

    font-size: 14px;
}

.info-text > span {
    display: block;

    margin-bottom: 2px;

    color: var(--teacher-blue);

    font-size: 8px;
    font-weight: 800;

    letter-spacing: .08em;
}

.info-text strong {
    display: block;

    margin-bottom: 3px;

    color: var(--teacher-text);

    font-size: 12px;
}

.info-text p {
    max-width: 720px;

    margin: 0;

    color: #718096;

    font-size: 10px;
    line-height: 1.6;
}

.info-decoration {
    width: 55px;
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 50%;

    color: rgba(7,136,201,.14);

    background: rgba(7,136,201,.05);

    font-size: 25px;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1100px) {

    .teacher-summary-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .teacher-hero {
        min-height: 175px;
    }

    .teacher-hero-decoration {
        opacity: .7;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 700px) {

    .teacher-dashboard {
        padding-bottom: 20px;
    }

    .teacher-hero {
        min-height: auto;

        padding: 22px 20px;

        border-radius: 17px;
    }

    .teacher-welcome {
        align-items: flex-start;
    }

    .teacher-welcome-icon {
        width: 46px;
        height: 46px;

        border-radius: 12px;

        font-size: 18px;
    }

    .teacher-greeting {
        font-size: 10px;
    }

    .teacher-welcome h1 {
        font-size: 21px;
    }

    .teacher-welcome p {
        max-width: 280px;

        font-size: 11px;
        line-height: 1.5;
    }

    .teacher-breadcrumb {
        margin-bottom: 14px;

        font-size: 10px;
    }

    .teacher-hero-decoration {
        right: -70px;

        opacity: .45;
    }

    .teacher-hero-decoration > i {
        font-size: 65px;

        right: 75px;
        bottom: 22px;
    }


    /* SUMMARY */

    .teacher-summary-grid {
        grid-template-columns: 1fr 1fr;

        gap: 10px;

        margin-bottom: 15px;
    }

    .teacher-summary-card {
        min-height: 125px;

        padding: 14px;
    }

    .summary-icon {
        width: 36px;
        height: 36px;

        border-radius: 10px;

        font-size: 14px;
    }

    .summary-badge {
        padding: 4px 6px;

        font-size: 8px;
    }

    .summary-content {
        margin-top: 12px;
    }

    .summary-content > span {
        font-size: 9px;
    }

    .summary-content strong {
        font-size: 17px;
    }

    .summary-content small {
        font-size: 9px;
    }

    .summary-line {
        left: 14px;
        right: 14px;
    }


    /* SCHEDULE */

    .teacher-schedule-card {
        border-radius: 15px;
    }

    .schedule-header {
        align-items: flex-start;

        padding: 17px;

        gap: 12px;
    }

    .schedule-heading {
        align-items: flex-start;
    }

    .schedule-heading-icon {
        width: 40px;
        height: 40px;

        border-radius: 11px;

        font-size: 15px;
    }

    .section-label {
        font-size: 8px;
    }

    .schedule-heading h2 {
        font-size: 15px;
    }

    .schedule-heading p {
        font-size: 9px;
    }

    .schedule-total {
        min-width: 58px;

        padding: 7px 8px;
    }

    .schedule-total strong {
        font-size: 14px;
    }

    .schedule-total span {
        font-size: 8px;
    }


    /* TABLE */

    .teacher-table {
        min-width: 850px;
    }

    .teacher-table th {
        padding: 11px 15px;

        font-size: 8px;
    }

    .teacher-table td {
        padding: 13px 15px;
    }


    /* INFO */

    .teacher-info-card {
        padding: 14px;

        align-items: flex-start;
    }

    .info-left {
        gap: 9px;
    }

    .info-main-icon {
        width: 33px;
        height: 33px;

        font-size: 12px;
    }

    .info-text strong {
        font-size: 11px;
    }

    .info-text p {
        font-size: 9px;
    }

    .info-decoration {
        display: none;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 430px) {

    .teacher-hero {
        padding: 18px 16px;
    }

    .teacher-welcome h1 {
        font-size: 19px;
    }

    .teacher-welcome p {
        max-width: 240px;
    }

    .teacher-summary-grid {
        gap: 8px;
    }

    .teacher-summary-card {
        min-height: 115px;

        padding: 12px;
    }

    .summary-icon {
        width: 33px;
        height: 33px;

        font-size: 13px;
    }

    .summary-content strong {
        font-size: 16px;
    }

    .schedule-header {
        padding: 14px;
    }

    .schedule-heading-icon {
        width: 36px;
        height: 36px;
    }

    .schedule-heading h2 {
        font-size: 14px;
    }

}


/* =========================================================
   TOUCH DEVICE
========================================================= */

@media (hover: none) {

    .teacher-summary-card:hover {
        transform: none;

        box-shadow:
            0 5px 18px rgba(15, 23, 42, .035);
    }

    .teacher-table tbody tr:hover {
        background: transparent;
    }

}

</style>

@endsection