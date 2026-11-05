@extends('layouts.app')

@section('title', 'Jadwal Mengajar')

@section('content')

<style>
    /* =========================================================
       SCHEDULE INDEX - SCOPED STYLE
    ========================================================= */

    .schedule-index-page {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        color: #1e293b;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .schedule-index-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .schedule-index-header-left {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 0;
    }

    .schedule-index-header-icon {
        width: 48px;
        height: 48px;
        flex: 0 0 48px;
        border-radius: 13px;
        background: #e8f6fd;
        color: #0788c9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .schedule-index-title {
        margin: 0;
        font-size: 22px;
        line-height: 1.25;
        font-weight: 700;
        color: #1e293b;
        letter-spacing: -.3px;
    }

    .schedule-index-description {
        margin: 5px 0 0;
        font-size: 12px;
        color: #64748b;
    }

    .schedule-index-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 40px;
        padding: 0 16px;
        border-radius: 9px;
        background: #0788c9;
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid #0788c9;
        box-shadow: 0 4px 12px rgba(7, 136, 201, .16);
        transition: all .2s ease;
        white-space: nowrap;
    }

    .schedule-index-add:hover {
        background: #0676ad;
        border-color: #0676ad;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 7px 16px rgba(7, 136, 201, .20);
    }

    /* =========================================================
       STATISTICS
    ========================================================= */

    .schedule-index-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 20px;
    }

    .schedule-index-stat {
        position: relative;
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
        padding: 17px 18px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .025);
        overflow: hidden;
        transition: all .2s ease;
    }

    .schedule-index-stat::after {
        content: "";
        position: absolute;
        right: -20px;
        top: -25px;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        background: #f0f9ff;
        pointer-events: none;
    }

    .schedule-index-stat:hover {
        transform: translateY(-2px);
        border-color: #cfeafa;
        box-shadow: 0 8px 20px rgba(15, 23, 42, .05);
    }

    .schedule-index-stat-icon {
        position: relative;
        z-index: 1;
        width: 40px;
        height: 40px;
        flex: 0 0 40px;
        border-radius: 10px;
        background: #e8f6fd;
        color: #0788c9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .schedule-index-stat-content {
        position: relative;
        z-index: 1;
        min-width: 0;
    }

    .schedule-index-stat-label {
        margin: 0;
        font-size: 10px;
        color: #94a3b8;
        font-weight: 500;
    }

    .schedule-index-stat-value {
        margin: 3px 0 0;
        font-size: 19px;
        line-height: 1.2;
        color: #1e293b;
        font-weight: 700;
    }

    /* =========================================================
       TABLE CARD
    ========================================================= */

    .schedule-index-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(15, 23, 42, .035);
    }

    .schedule-index-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 18px 20px;
        border-bottom: 1px solid #f1f5f9;
    }

    .schedule-index-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .schedule-index-card-title-icon {
        width: 34px;
        height: 34px;
        flex: 0 0 34px;
        border-radius: 8px;
        background: #f0f9ff;
        color: #0788c9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .schedule-index-table-title {
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        color: #1e293b;
    }

    .schedule-index-table-subtitle {
        margin: 3px 0 0;
        font-size: 10px;
        color: #94a3b8;
    }

    /* =========================================================
       TABLE
    ========================================================= */

    .schedule-index-table-wrapper {
        width: 100%;
        overflow-x: auto;
        scrollbar-width: thin;
    }

    .schedule-index-table {
        width: 100%;
        min-width: 980px;
        margin: 0;
        border-collapse: collapse;
    }

    .schedule-index-table thead th {
        padding: 12px 16px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 10px;
        line-height: 1.3;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .35px;
        text-align: left;
        white-space: nowrap;
    }

    .schedule-index-table tbody td {
        padding: 14px 16px;
        border-bottom: 1px solid #f1f5f9;
        color: #475569;
        font-size: 12px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .schedule-index-table tbody tr {
        transition: background .15s ease;
    }

    .schedule-index-table tbody tr:hover {
        background: #f8fcff;
    }

    .schedule-index-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* =========================================================
       DAY
    ========================================================= */

    .schedule-index-day {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 9px;
        border-radius: 7px;
        background: #e0f2fe;
        color: #0369a1;
        font-size: 10px;
        font-weight: 700;
    }

    .schedule-index-day i {
        font-size: 9px;
    }

    /* =========================================================
       TIME
    ========================================================= */

    .schedule-index-time {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #334155;
        font-weight: 600;
    }

    .schedule-index-time-icon {
        color: #0788c9;
        font-size: 11px;
    }

    /* =========================================================
       TEACHER
    ========================================================= */

    .schedule-index-teacher {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .schedule-index-teacher-avatar {
        width: 31px;
        height: 31px;
        flex: 0 0 31px;
        border-radius: 50%;
        background: #e8f6fd;
        color: #0788c9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 700;
    }

    .schedule-index-teacher-name {
        color: #334155;
        font-weight: 600;
    }

    /* =========================================================
       CLASS
    ========================================================= */

    .schedule-index-class {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 9px;
        border-radius: 7px;
        background: #f1f5f9;
        color: #475569;
        font-size: 10px;
        font-weight: 600;
    }

    .schedule-index-class i {
        color: #64748b;
        font-size: 9px;
    }

    /* =========================================================
       SUBJECT
    ========================================================= */

    .schedule-index-subject {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .schedule-index-subject-icon {
        width: 28px;
        height: 28px;
        flex: 0 0 28px;
        border-radius: 7px;
        background: #f8fafc;
        color: #64748b;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
    }

    .schedule-index-subject-name {
        color: #334155;
        font-weight: 600;
    }

    /* =========================================================
       ACADEMIC YEAR
    ========================================================= */

    .schedule-index-academic {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #64748b;
        font-size: 10px;
        font-weight: 500;
    }

    .schedule-index-academic i {
        color: #0788c9;
        font-size: 10px;
    }

    /* =========================================================
       ACTION
    ========================================================= */

    .schedule-index-actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .schedule-index-action {
        width: 31px;
        height: 31px;
        padding: 0;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid transparent;
        text-decoration: none;
        cursor: pointer;
        font-size: 10px;
        transition: all .18s ease;
    }

    .schedule-index-edit {
        background: #eff6ff;
        color: #2563eb;
        border-color: #dbeafe;
    }

    .schedule-index-edit:hover {
        background: #dbeafe;
        color: #1d4ed8;
        transform: translateY(-1px);
    }

    .schedule-index-delete {
        background: #fef2f2;
        color: #dc2626;
        border-color: #fee2e2;
    }

    .schedule-index-delete:hover {
        background: #fee2e2;
        color: #b91c1c;
        transform: translateY(-1px);
    }

    /* =========================================================
       PAGINATION
    ========================================================= */

    .schedule-index-pagination {
        padding: 15px 20px;
        border-top: 1px solid #f1f5f9;
    }

    .schedule-index-pagination .pagination {
        margin: 0;
        justify-content: flex-end;
    }

    .schedule-index-pagination .page-link {
        border-color: #e2e8f0;
        color: #64748b;
        font-size: 11px;
        min-width: 32px;
        min-height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 7px;
        margin: 0 2px;
    }

    .schedule-index-pagination .page-link:hover {
        background: #f0f9ff;
        color: #0788c9;
        border-color: #cfeafa;
    }

    .schedule-index-pagination .page-item.active .page-link {
        background: #0788c9;
        border-color: #0788c9;
        color: #fff;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .schedule-index-empty {
        padding: 65px 20px;
        text-align: center;
    }

    .schedule-index-empty-icon {
        width: 62px;
        height: 62px;
        margin: 0 auto 14px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #94a3b8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .schedule-index-empty-title {
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        color: #475569;
    }

    .schedule-index-empty-text {
        max-width: 380px;
        margin: 6px auto 18px;
        font-size: 11px;
        line-height: 1.6;
        color: #94a3b8;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .schedule-index-stats {
            grid-template-columns: 1fr;
        }

        .schedule-index-header {
            align-items: flex-start;
        }

    }

    @media (max-width: 650px) {

        .schedule-index-header {
            flex-direction: column;
            gap: 14px;
        }

        .schedule-index-header-left {
            width: 100%;
        }

        .schedule-index-add {
            width: 100%;
        }

        .schedule-index-title {
            font-size: 19px;
        }

        .schedule-index-description {
            font-size: 11px;
        }

        .schedule-index-card-header {
            padding: 15px;
        }

        .schedule-index-pagination {
            padding: 14px 15px;
            overflow-x: auto;
        }

        .schedule-index-pagination .pagination {
            justify-content: flex-start;
            flex-wrap: nowrap;
            width: max-content;
        }

    }

    @media (max-width: 430px) {

        .schedule-index-header-icon {
            width: 43px;
            height: 43px;
            flex-basis: 43px;
        }

        .schedule-index-title {
            font-size: 18px;
        }

        .schedule-index-stat {
            padding: 14px;
        }

        .schedule-index-stat-value {
            font-size: 17px;
        }

        .schedule-index-card {
            border-radius: 11px;
        }

        .schedule-index-table {
            min-width: 940px;
        }

    }
</style>


<div class="schedule-index-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="schedule-index-header">

        <div class="schedule-index-header-left">

            <div class="schedule-index-header-icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>

            <div>
                <h1 class="schedule-index-title">
                    Jadwal Mengajar
                </h1>

                <p class="schedule-index-description">
                    Kelola jadwal guru, kelas, dan mata pelajaran.
                </p>
            </div>

        </div>

        <a
            href="{{ route('admin.schedules.create') }}"
            class="schedule-index-add"
        >
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Jadwal</span>
        </a>

    </div>


    {{-- =====================================================
         STATISTIK
    ====================================================== --}}

    <div class="schedule-index-stats">

        {{-- TOTAL --}}
        <div class="schedule-index-stat">

            <div class="schedule-index-stat-icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>

            <div class="schedule-index-stat-content">

                <p class="schedule-index-stat-label">
                    Total Jadwal
                </p>

                <p class="schedule-index-stat-value">
                    {{ $schedules->total() }}
                </p>

            </div>

        </div>


        {{-- HALAMAN --}}
        <div class="schedule-index-stat">

            <div class="schedule-index-stat-icon">
                <i class="fa-solid fa-list-check"></i>
            </div>

            <div class="schedule-index-stat-content">

                <p class="schedule-index-stat-label">
                    Jadwal Halaman Ini
                </p>

                <p class="schedule-index-stat-value">
                    {{ $schedules->count() }}
                </p>

            </div>

        </div>


        {{-- STATUS --}}
        <div class="schedule-index-stat">

            <div class="schedule-index-stat-icon">
                <i class="fa-solid fa-clock"></i>
            </div>

            <div class="schedule-index-stat-content">

                <p class="schedule-index-stat-label">
                    Status Pengelolaan
                </p>

                <p class="schedule-index-stat-value">
                    Aktif
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
         TABLE CARD
    ====================================================== --}}

    <div class="schedule-index-card">

        <div class="schedule-index-card-header">

            <div class="schedule-index-card-title">

                <div class="schedule-index-card-title-icon">
                    <i class="fa-solid fa-table-list"></i>
                </div>

                <div>

                    <h2 class="schedule-index-table-title">
                        Daftar Jadwal
                    </h2>

                    <p class="schedule-index-table-subtitle">
                        Jadwal mengajar yang telah terdaftar.
                    </p>

                </div>

            </div>

        </div>


        {{-- =================================================
             DATA
        ================================================== --}}

        @if ($schedules->count() > 0)

            <div class="schedule-index-table-wrapper">

                <table class="schedule-index-table">

                    <thead>
                        <tr>

                            <th>Hari</th>

                            <th>Jam</th>

                            <th>Guru</th>

                            <th>Kelas</th>

                            <th>Mata Pelajaran</th>

                            <th>Tahun Ajaran</th>

                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($schedules as $schedule)

                            <tr>

                                {{-- HARI --}}
                                <td>

                                    <span class="schedule-index-day">

                                        <i class="fa-solid fa-calendar-day"></i>

                                        {{ ucfirst($schedule->day) }}

                                    </span>

                                </td>


                                {{-- JAM --}}
                                <td>

                                    <div class="schedule-index-time">

                                        <i class="fa-solid fa-clock schedule-index-time-icon"></i>

                                        <span>
                                            {{ $schedule->start_time }}
                                            -
                                            {{ $schedule->end_time }}
                                        </span>

                                    </div>

                                </td>


                                {{-- GURU --}}
                                <td>

                                    <div class="schedule-index-teacher">

                                        <div class="schedule-index-teacher-avatar">

                                            {{ strtoupper(substr($schedule->teacher->name, 0, 1)) }}

                                        </div>

                                        <span class="schedule-index-teacher-name">

                                            {{ $schedule->teacher->name }}

                                        </span>

                                    </div>

                                </td>


                                {{-- KELAS --}}
                                <td>

                                    <span class="schedule-index-class">

                                        <i class="fa-solid fa-users"></i>

                                        {{ $schedule->schoolClass->name }}

                                    </span>

                                </td>


                                {{-- MATA PELAJARAN --}}
                                <td>

                                    <div class="schedule-index-subject">

                                        <div class="schedule-index-subject-icon">

                                            <i class="fa-solid fa-book"></i>

                                        </div>

                                        <span class="schedule-index-subject-name">

                                            {{ $schedule->subject->name }}

                                        </span>

                                    </div>

                                </td>


                                {{-- TAHUN AJARAN --}}
                                <td>

                                    <span class="schedule-index-academic">

                                        <i class="fa-solid fa-calendar-check"></i>

                                        {{ $schedule->academicYear->name }}

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="schedule-index-actions">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.schedules.edit', $schedule) }}"
                                            class="schedule-index-action schedule-index-edit"
                                            title="Edit Jadwal"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </a>


                                        {{-- DELETE --}}
                                        <form
                                            method="POST"
                                            action="{{ route('admin.schedules.destroy', $schedule) }}"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')"
                                            style="display:inline;"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="schedule-index-action schedule-index-delete"
                                                title="Hapus Jadwal"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- =================================================
                 PAGINATION
            ================================================== --}}

            @if ($schedules->hasPages())

                <div class="schedule-index-pagination">

                    {{ $schedules->links() }}

                </div>

            @endif


        @else

            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="schedule-index-empty">

                <div class="schedule-index-empty-icon">
                    <i class="fa-solid fa-calendar-xmark"></i>
                </div>

                <h3 class="schedule-index-empty-title">
                    Belum Ada Jadwal
                </h3>

                <p class="schedule-index-empty-text">
                    Belum ada jadwal mengajar yang terdaftar
                    dalam sistem.
                </p>

                <a
                    href="{{ route('admin.schedules.create') }}"
                    class="schedule-index-add"
                >
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Jadwal</span>
                </a>

            </div>

        @endif

    </div>

</div>

@endsection