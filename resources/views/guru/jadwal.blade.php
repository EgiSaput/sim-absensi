@extends('layouts.app')

@section('title', 'Jadwal Mengajar')

@section('content')

<div class="teacher-schedule-page">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="teacher-schedule-hero">

        <div class="hero-content">

            <div class="hero-breadcrumb">
                <span class="breadcrumb-home">
                    <i class="fa-solid fa-house"></i>
                </span>

                <i class="fa-solid fa-chevron-right"></i>

                <span>Guru</span>

                <i class="fa-solid fa-chevron-right"></i>

                <strong>Jadwal Mengajar</strong>
            </div>

            <div class="hero-title-row">

                <div class="hero-icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>

                <div>
                    <span class="hero-label">
                        AKTIVITAS MENGAJAR
                    </span>

                    <h1>
                        Jadwal Mengajar Saya
                    </h1>

                    <p>
                        Kelola jadwal mengajar dan akses absensi siswa Anda.
                    </p>
                </div>

            </div>

        </div>

        <div class="hero-decoration">
            <div class="hero-orbit orbit-one"></div>
            <div class="hero-orbit orbit-two"></div>
            <i class="fa-solid fa-chalkboard-user"></i>
        </div>

    </div>


    {{-- =========================================================
        SUMMARY
    ========================================================== --}}
    <div class="schedule-summary">

        <div class="summary-main">

            <div class="summary-main-icon">
                <i class="fa-solid fa-calendar-check"></i>
            </div>

            <div>
                <span>
                    TOTAL JADWAL
                </span>

                <strong>
                    {{ $schedules->count() }}
                    <small>Jadwal Mengajar</small>
                </strong>
            </div>

        </div>

        <div class="summary-decoration">
            <i class="fa-solid fa-book-open"></i>
        </div>

    </div>


    {{-- =========================================================
        SCHEDULE CARD
    ========================================================== --}}
    <div class="teacher-schedule-card">

        {{-- HEADER CARD --}}
        <div class="schedule-card-header">

            <div class="schedule-card-title">

                <div class="card-title-icon">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>

                <div>

                    <span>
                        JADWAL ANDA
                    </span>

                    <h2>
                        Daftar Jadwal Mengajar
                    </h2>

                    <p>
                        Jadwal yang ditugaskan kepada Anda
                    </p>

                </div>

            </div>

            <div class="total-badge">
                <strong>
                    {{ $schedules->count() }}
                </strong>
                <span>
                    Jadwal
                </span>
            </div>

        </div>


        @if ($schedules->isEmpty())

            {{-- =================================================
                EMPTY STATE
            ================================================== --}}
            <div class="schedule-empty">

                <div class="empty-visual">

                    <div class="empty-circle">
                        <i class="fa-regular fa-calendar-xmark"></i>
                    </div>

                    <span class="empty-dot dot-a"></span>
                    <span class="empty-dot dot-b"></span>
                    <span class="empty-dot dot-c"></span>

                </div>

                <h3>
                    Belum Ada Jadwal
                </h3>

                <p>
                    Saat ini belum ada jadwal mengajar yang tersedia untuk Anda.
                </p>

            </div>

        @else

            {{-- =================================================
                TABLE
            ================================================== --}}
            <div class="schedule-table-wrapper">

                <table class="teacher-schedule-table">

                    <thead>

                        <tr>

                            <th>
                                <span>Hari</span>
                            </th>

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
                                <span>Tahun Ajaran</span>
                            </th>

                            <th class="action-header">
                                <span>Aksi</span>
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($schedules as $schedule)

                            <tr>

                                {{-- =================================
                                    HARI
                                ================================== --}}
                                <td>

                                    <div class="schedule-day">

                                        <div class="day-icon">
                                            <i class="fa-regular fa-calendar"></i>
                                        </div>

                                        <div class="day-text">

                                            <strong>
                                                {{ ucfirst($schedule->day) }}
                                            </strong>

                                            <span>
                                                Hari mengajar
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                {{-- =================================
                                    WAKTU
                                ================================== --}}
                                <td>

                                    <div class="schedule-time">

                                        <div class="time-icon">
                                            <i class="fa-regular fa-clock"></i>
                                        </div>

                                        <div>

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

                                    <div class="schedule-class">

                                        <div class="class-icon">
                                            <i class="fa-solid fa-users"></i>
                                        </div>

                                        <div>

                                            <strong>
                                                {{ $schedule->schoolClass->name }}
                                            </strong>

                                            <span>
                                                Kelas siswa
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                {{-- =================================
                                    MAPEL
                                ================================== --}}
                                <td>

                                    <div class="schedule-subject">

                                        <div class="subject-icon">
                                            <i class="fa-solid fa-book-open"></i>
                                        </div>

                                        <span>
                                            {{ $schedule->subject->name }}
                                        </span>

                                    </div>

                                </td>


                                {{-- =================================
                                    TAHUN AJARAN
                                ================================== --}}
                                <td>

                                    <div class="schedule-academic">

                                        <div class="academic-icon">
                                            <i class="fa-solid fa-graduation-cap"></i>
                                        </div>

                                        <div>

                                            <strong>
                                                {{ $schedule->academicYear->name }}
                                            </strong>

                                            <span>
                                                {{ ucfirst($schedule->academicYear->semester) }}
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                {{-- =================================
                                    AKSI
                                ================================== --}}
                                <td>

                                    <div class="schedule-action">

                                        <a
                                            href="{{ route('guru.absensi.show', $schedule) }}"
                                            class="attendance-action"
                                        >

                                            <span class="action-icon">
                                                <i class="fa-solid fa-clipboard-check"></i>
                                            </span>

                                            <span class="action-text">
                                                <strong>Absensi</strong>
                                                <small>Kelola siswa</small>
                                            </span>

                                            <i class="fa-solid fa-arrow-right action-arrow"></i>

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
    <div class="teacher-info">

        <div class="teacher-info-icon">
            <i class="fa-solid fa-circle-info"></i>
        </div>

        <div class="teacher-info-content">

            <span>
                INFORMASI
            </span>

            <strong>
                Kelola absensi dari jadwal mengajar
            </strong>

            <p>
                Klik tombol <b>Absensi</b> pada jadwal untuk membuka
                halaman pencatatan kehadiran siswa sesuai kelas dan
                mata pelajaran.
            </p>

        </div>

        <div class="teacher-info-decoration">
            <i class="fa-solid fa-clipboard-check"></i>
        </div>

    </div>

</div>


<style>

/* =========================================================
   TEACHER SCHEDULE PAGE
========================================================= */

.teacher-schedule-page {

    --teacher-primary: #0788c9;
    --teacher-primary-dark: #0676ad;
    --teacher-primary-light: #e8f6fd;
    --teacher-primary-soft: #f4fbff;

    --teacher-text: #172033;
    --teacher-text-soft: #334155;
    --teacher-muted: #64748b;
    --teacher-light: #94a3b8;

    --teacher-border: #e5edf3;
    --teacher-border-light: #eef3f7;

    width: 100%;
    max-width: 1450px;
    margin: 0 auto;

    padding-bottom: 30px;
}


/* =========================================================
   HERO
========================================================= */

.teacher-schedule-hero {

    position: relative;

    display: flex;
    align-items: center;
    justify-content: space-between;

    min-height: 190px;

    margin-bottom: 20px;
    padding: 28px 32px;

    overflow: hidden;

    border-radius: 22px;

    background:
        linear-gradient(
            120deg,
            #067ab2 0%,
            #0788c9 55%,
            #159bd5 100%
        );

    box-shadow:
        0 14px 35px rgba(7, 136, 201, .18);
}

.hero-content {
    position: relative;
    z-index: 3;
}

.hero-breadcrumb {

    display: flex;
    align-items: center;

    gap: 9px;

    margin-bottom: 17px;

    color: rgba(255,255,255,.68);

    font-size: 11px;
}

.breadcrumb-home {

    width: 25px;
    height: 25px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    color: #fff;

    background: rgba(255,255,255,.13);
}

.hero-breadcrumb > i {

    font-size: 8px;

    opacity: .7;
}

.hero-breadcrumb strong {

    color: #fff;

    font-weight: 650;
}

.hero-title-row {

    display: flex;
    align-items: center;

    gap: 15px;
}

.hero-icon {

    width: 58px;
    height: 58px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 16px;

    color: #fff;

    background: rgba(255,255,255,.14);

    border: 1px solid rgba(255,255,255,.18);

    font-size: 23px;

    backdrop-filter: blur(8px);
}

.hero-label {

    display: block;

    margin-bottom: 3px;

    color: rgba(255,255,255,.68);

    font-size: 9px;
    font-weight: 800;

    letter-spacing: .09em;
}

.hero-title-row h1 {

    margin: 0;

    color: #fff;

    font-size: 26px;
    font-weight: 800;

    letter-spacing: -.025em;
}

.hero-title-row p {

    margin: 5px 0 0;

    color: rgba(255,255,255,.76);

    font-size: 12px;
}

.hero-decoration {

    position: absolute;

    top: 0;
    right: 25px;

    width: 300px;
    height: 100%;
}

.hero-decoration > i {

    position: absolute;

    right: 65px;
    bottom: 32px;

    color: rgba(255,255,255,.12);

    font-size: 90px;

    transform: rotate(-7deg);
}

.hero-orbit {

    position: absolute;

    border-radius: 50%;

    background: rgba(255,255,255,.06);
}

.orbit-one {

    width: 235px;
    height: 235px;

    right: -70px;
    top: -115px;
}

.orbit-two {

    width: 145px;
    height: 145px;

    right: 115px;
    bottom: -100px;
}


/* =========================================================
   SUMMARY
========================================================= */

.schedule-summary {

    position: relative;

    display: flex;
    align-items: center;
    justify-content: space-between;

    min-height: 105px;

    margin-bottom: 20px;
    padding: 18px 22px;

    overflow: hidden;

    background: #fff;

    border: 1px solid var(--teacher-border);
    border-radius: 17px;

    box-shadow:
        0 5px 20px rgba(15,23,42,.035);
}

.summary-main {

    display: flex;
    align-items: center;

    gap: 14px;
}

.summary-main-icon {

    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    color: var(--teacher-primary);

    background: var(--teacher-primary-light);

    font-size: 18px;
}

.summary-main > div:last-child > span {

    display: block;

    margin-bottom: 3px;

    color: var(--teacher-muted);

    font-size: 9px;
    font-weight: 800;

    letter-spacing: .07em;
}

.summary-main strong {

    display: block;

    color: var(--teacher-text);

    font-size: 22px;
    font-weight: 800;
}

.summary-main small {

    color: var(--teacher-light);

    font-size: 10px;
    font-weight: 500;
}

.summary-decoration {

    width: 65px;
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: rgba(7,136,201,.12);

    background: rgba(7,136,201,.04);

    font-size: 27px;
}


/* =========================================================
   MAIN CARD
========================================================= */

.teacher-schedule-card {

    overflow: hidden;

    background: #fff;

    border: 1px solid var(--teacher-border);

    border-radius: 19px;

    box-shadow:
        0 7px 25px rgba(15,23,42,.045);
}

.schedule-card-header {

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    padding: 21px 23px;

    border-bottom: 1px solid var(--teacher-border-light);
}

.schedule-card-title {

    display: flex;
    align-items: center;

    gap: 13px;
}

.card-title-icon {

    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 12px;

    color: var(--teacher-primary);

    background: var(--teacher-primary-light);

    font-size: 17px;
}

.schedule-card-title > div:last-child > span {

    display: block;

    margin-bottom: 3px;

    color: var(--teacher-primary);

    font-size: 8px;
    font-weight: 800;

    letter-spacing: .09em;
}

.schedule-card-title h2 {

    margin: 0;

    color: var(--teacher-text);

    font-size: 17px;
    font-weight: 750;
}

.schedule-card-title p {

    margin: 3px 0 0;

    color: var(--teacher-light);

    font-size: 10px;
}

.total-badge {

    min-width: 68px;

    padding: 7px 10px;

    text-align: center;

    border-radius: 9px;

    background: var(--teacher-primary-soft);

    border: 1px solid #e0f1f9;
}

.total-badge strong {

    display: block;

    color: var(--teacher-primary);

    font-size: 16px;
    font-weight: 800;
}

.total-badge span {

    display: block;

    margin-top: 1px;

    color: var(--teacher-muted);

    font-size: 8px;
}


/* =========================================================
   TABLE
========================================================= */

.schedule-table-wrapper {

    width: 100%;

    overflow-x: auto;
}

.teacher-schedule-table {

    width: 100%;

    min-width: 1050px;

    border-collapse: collapse;
}

.teacher-schedule-table thead {

    background: #f9fbfc;
}

.teacher-schedule-table th {

    padding: 13px 19px;

    text-align: left;

    color: #8291a3;

    border-bottom: 1px solid var(--teacher-border-light);

    font-size: 9px;
    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: .06em;

    white-space: nowrap;
}

.teacher-schedule-table th.action-header {

    text-align: right;
}

.teacher-schedule-table td {

    padding: 15px 19px;

    color: var(--teacher-text-soft);

    border-bottom: 1px solid #f0f4f7;

    font-size: 12px;

    vertical-align: middle;
}

.teacher-schedule-table tbody tr {

    transition:
        background .18s ease;
}

.teacher-schedule-table tbody tr:hover {

    background: #fbfdff;
}

.teacher-schedule-table tbody tr:last-child td {

    border-bottom: none;
}


/* =========================================================
   DAY
========================================================= */

.schedule-day {

    display: flex;
    align-items: center;

    gap: 9px;
}

.day-icon {

    width: 35px;
    height: 35px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 10px;

    color: var(--teacher-primary);

    background: var(--teacher-primary-light);

    font-size: 12px;
}

.day-text strong {

    display: block;

    color: var(--teacher-text);

    font-size: 12px;
    font-weight: 750;
}

.day-text span {

    display: block;

    margin-top: 2px;

    color: #a0adba;

    font-size: 8px;
}


/* =========================================================
   TIME
========================================================= */

.schedule-time {

    display: flex;
    align-items: center;

    gap: 9px;
}

.time-icon {

    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 9px;

    color: #64748b;

    background: #f6f8fa;

    font-size: 11px;
}

.schedule-time strong {

    display: block;

    color: var(--teacher-text);

    font-size: 12px;
    font-weight: 750;
}

.schedule-time span {

    display: block;

    margin-top: 2px;

    color: #9aa8b7;

    font-size: 9px;
}


/* =========================================================
   CLASS
========================================================= */

.schedule-class {

    display: flex;
    align-items: center;

    gap: 9px;
}

.class-icon {

    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 9px;

    color: #7c3aed;

    background: #f5f1ff;

    font-size: 11px;
}

.schedule-class strong {

    display: block;

    color: var(--teacher-text);

    font-size: 12px;
    font-weight: 700;
}

.schedule-class span {

    display: block;

    margin-top: 2px;

    color: #a0adba;

    font-size: 8px;
}


/* =========================================================
   SUBJECT
========================================================= */

.schedule-subject {

    display: flex;
    align-items: center;

    gap: 9px;
}

.subject-icon {

    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 9px;

    color: var(--teacher-primary);

    background: var(--teacher-primary-light);

    font-size: 11px;
}

.schedule-subject span {

    color: var(--teacher-text-soft);

    font-size: 11px;
    font-weight: 600;
}


/* =========================================================
   ACADEMIC
========================================================= */

.schedule-academic {

    display: flex;
    align-items: center;

    gap: 9px;
}

.academic-icon {

    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 9px;

    color: #0f766e;

    background: #ecfdfb;

    font-size: 11px;
}

.schedule-academic strong {

    display: block;

    color: var(--teacher-text-soft);

    font-size: 11px;
    font-weight: 650;
}

.schedule-academic span {

    display: block;

    margin-top: 2px;

    color: var(--teacher-light);

    font-size: 9px;
}


/* =========================================================
   ACTION
========================================================= */

.schedule-action {

    display: flex;
    justify-content: flex-end;
}

.attendance-action {

    display: inline-flex;
    align-items: center;

    gap: 8px;

    min-width: 112px;

    padding: 7px 9px;

    color: #fff !important;

    background: var(--teacher-primary);

    border-radius: 10px;

    text-decoration: none;

    box-shadow:
        0 4px 10px rgba(7,136,201,.14);

    transition:
        background .18s ease,
        transform .18s ease,
        box-shadow .18s ease;
}

.attendance-action:hover {

    color: #fff !important;

    background: var(--teacher-primary-dark);

    transform: translateY(-1px);

    box-shadow:
        0 7px 15px rgba(7,136,201,.22);
}

.action-icon {

    width: 27px;
    height: 27px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    color: #fff;

    background: rgba(255,255,255,.13);

    font-size: 10px;
}

.action-text {

    flex: 1;
}

.action-text strong {

    display: block;

    font-size: 10px;
    font-weight: 750;
}

.action-text small {

    display: block;

    margin-top: 1px;

    color: rgba(255,255,255,.68);

    font-size: 7px;
}

.action-arrow {

    font-size: 8px;

    opacity: .7;

    transition: transform .18s ease;
}

.attendance-action:hover .action-arrow {

    transform: translateX(2px);
}


/* =========================================================
   EMPTY
========================================================= */

.schedule-empty {

    padding: 65px 20px 70px;

    text-align: center;
}

.empty-visual {

    position: relative;

    width: 85px;
    height: 76px;

    margin: 0 auto 17px;
}

.empty-circle {

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
}

.dot-a {

    width: 7px;
    height: 7px;

    top: 3px;
    right: 10px;

    background: #d9eef8;
}

.dot-b {

    width: 5px;
    height: 5px;

    left: 9px;
    bottom: 6px;

    background: #e7edf2;
}

.dot-c {

    width: 4px;
    height: 4px;

    top: 19px;
    left: 3px;

    background: #cfeaf6;
}

.schedule-empty h3 {

    margin: 0 0 6px;

    color: var(--teacher-text);

    font-size: 16px;
    font-weight: 750;
}

.schedule-empty p {

    max-width: 420px;

    margin: 0 auto;

    color: #94a3b8;

    font-size: 11px;

    line-height: 1.6;
}


/* =========================================================
   INFORMATION
========================================================= */

.teacher-info {

    position: relative;

    display: flex;
    align-items: center;

    gap: 12px;

    margin-top: 16px;
    padding: 16px 19px;

    overflow: hidden;

    background:
        linear-gradient(
            110deg,
            #f4fbfe,
            #fff
        );

    border: 1px solid #dceef7;

    border-radius: 15px;
}

.teacher-info-icon {

    width: 37px;
    height: 37px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 10px;

    color: var(--teacher-primary);

    background: var(--teacher-primary-light);

    font-size: 14px;
}

.teacher-info-content > span {

    display: block;

    margin-bottom: 2px;

    color: var(--teacher-primary);

    font-size: 8px;
    font-weight: 800;

    letter-spacing: .08em;
}

.teacher-info-content strong {

    display: block;

    margin-bottom: 3px;

    color: var(--teacher-text);

    font-size: 11px;
}

.teacher-info-content p {

    margin: 0;

    color: #718096;

    font-size: 9px;

    line-height: 1.6;
}

.teacher-info-decoration {

    width: 55px;
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-left: auto;

    flex-shrink: 0;

    border-radius: 50%;

    color: rgba(7,136,201,.13);

    background: rgba(7,136,201,.04);

    font-size: 24px;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1100px) {

    .teacher-schedule-hero {
        min-height: 175px;
    }

    .hero-decoration {
        opacity: .7;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 700px) {

    .teacher-schedule-page {
        padding-bottom: 20px;
    }

    .teacher-schedule-hero {

        min-height: auto;

        padding: 21px 18px;

        border-radius: 17px;
    }

    .hero-breadcrumb {

        margin-bottom: 13px;

        font-size: 9px;
    }

    .breadcrumb-home {

        width: 22px;
        height: 22px;
    }

    .hero-title-row {

        align-items: flex-start;

        gap: 11px;
    }

    .hero-icon {

        width: 44px;
        height: 44px;

        border-radius: 12px;

        font-size: 17px;
    }

    .hero-label {

        font-size: 7px;
    }

    .hero-title-row h1 {

        font-size: 20px;
    }

    .hero-title-row p {

        max-width: 280px;

        font-size: 10px;

        line-height: 1.5;
    }

    .hero-decoration {

        right: -90px;

        opacity: .35;
    }

    .hero-decoration > i {

        right: 85px;
        bottom: 22px;

        font-size: 60px;
    }


    /* SUMMARY */

    .schedule-summary {

        min-height: 88px;

        padding: 14px 16px;

        border-radius: 15px;
    }

    .summary-main {

        gap: 10px;
    }

    .summary-main-icon {

        width: 39px;
        height: 39px;

        border-radius: 10px;

        font-size: 15px;
    }

    .summary-main > div:last-child > span {

        font-size: 8px;
    }

    .summary-main strong {

        font-size: 19px;
    }

    .summary-main small {

        font-size: 9px;
    }

    .summary-decoration {

        width: 48px;
        height: 48px;

        font-size: 20px;
    }


    /* CARD */

    .teacher-schedule-card {

        border-radius: 15px;
    }

    .schedule-card-header {

        padding: 16px;

        gap: 10px;
    }

    .schedule-card-title {

        align-items: flex-start;

        gap: 10px;
    }

    .card-title-icon {

        width: 38px;
        height: 38px;

        border-radius: 10px;

        font-size: 14px;
    }

    .schedule-card-title > div:last-child > span {

        font-size: 7px;
    }

    .schedule-card-title h2 {

        font-size: 14px;
    }

    .schedule-card-title p {

        font-size: 8px;
    }

    .total-badge {

        min-width: 55px;

        padding: 6px 7px;
    }

    .total-badge strong {

        font-size: 13px;
    }

    .total-badge span {

        font-size: 7px;
    }


    /* TABLE */

    .teacher-schedule-table {

        min-width: 980px;
    }

    .teacher-schedule-table th {

        padding: 11px 14px;

        font-size: 8px;
    }

    .teacher-schedule-table td {

        padding: 12px 14px;
    }


    /* INFO */

    .teacher-info {

        padding: 13px 14px;

        align-items: flex-start;
    }

    .teacher-info-icon {

        width: 33px;
        height: 33px;

        font-size: 12px;
    }

    .teacher-info-content strong {

        font-size: 10px;
    }

    .teacher-info-content p {

        font-size: 8px;
    }

    .teacher-info-decoration {

        display: none;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 430px) {

    .teacher-schedule-hero {

        padding: 18px 15px;
    }

    .hero-title-row h1 {

        font-size: 18px;
    }

    .hero-title-row p {

        max-width: 230px;

        font-size: 9px;
    }

    .schedule-summary {

        padding: 12px 14px;
    }

    .summary-main-icon {

        width: 36px;
        height: 36px;
    }

    .summary-main strong {

        font-size: 17px;
    }

    .summary-decoration {

        display: none;
    }

    .schedule-card-header {

        padding: 14px;
    }

    .schedule-card-title h2 {

        font-size: 13px;
    }

}


/* =========================================================
   TOUCH DEVICE
========================================================= */

@media (hover: none) {

    .teacher-schedule-table tbody tr:hover {

        background: transparent;
    }

    .attendance-action:hover {

        transform: none;

        box-shadow:
            0 4px 10px rgba(7,136,201,.14);
    }

}

</style>

@endsection