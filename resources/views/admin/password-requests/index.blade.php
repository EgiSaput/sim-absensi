@extends('layouts.app')

@section('title', 'Permintaan Reset Password')

@section('content')

<style>

    /* =====================================================
       PASSWORD REQUEST PAGE
    ===================================================== */

    .password-request-page {
        --pr-primary: #0788c9;
        --pr-primary-dark: #0676ad;
        --pr-primary-soft: #e8f6fd;

        --pr-text: #0f172a;
        --pr-text-soft: #334155;
        --pr-muted: #64748b;
        --pr-light: #94a3b8;

        --pr-border: #e2e8f0;
        --pr-border-soft: #f1f5f9;

        --pr-bg: #f8fafc;
        --pr-white: #ffffff;

        --pr-success: #15803d;
        --pr-success-bg: #ecfdf5;

        --pr-warning: #c2410c;
        --pr-warning-bg: #fff7ed;

        --pr-danger: #dc2626;
        --pr-danger-bg: #fef2f2;

        width: 100%;
        color: var(--pr-text);
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .password-request-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;

        gap: 20px;

        margin-bottom: 24px;
    }

    .password-request-header-left {
        min-width: 0;
    }

    .password-request-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;

        gap: 8px;

        margin-bottom: 10px;

        color: var(--pr-light);

        font-size: 12px;
        font-weight: 500;
    }

    .password-request-breadcrumb i {
        font-size: 9px;
    }

    .password-request-breadcrumb .active {
        color: var(--pr-primary);
        font-weight: 600;
    }

    .password-request-title-row {
        display: flex;
        align-items: center;

        gap: 13px;
    }

    .password-request-title-icon {
        width: 46px;
        height: 46px;

        flex: 0 0 46px;

        border-radius: 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        background:
            linear-gradient(
                145deg,
                var(--pr-primary-soft),
                #f4fbff
            );

        border: 1px solid #d4edf9;

        color: var(--pr-primary);

        font-size: 18px;

        box-shadow:
            0 5px 14px rgba(7, 136, 201, .08);
    }

    .password-request-title {
        margin: 0;

        font-size: 26px;
        line-height: 1.2;

        font-weight: 800;

        letter-spacing: -.4px;

        color: var(--pr-text);
    }

    .password-request-subtitle {
        margin: 6px 0 0;

        color: var(--pr-muted);

        font-size: 13px;
    }


    /* =====================================================
       STATS
    ===================================================== */

    .password-request-stats {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 15px;

        margin-bottom: 22px;
    }

    .password-request-stat {
        position: relative;

        overflow: hidden;

        display: flex;
        align-items: center;

        gap: 14px;

        padding: 17px 18px;

        background: var(--pr-white);

        border: 1px solid var(--pr-border);

        border-radius: 15px;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, .035);

        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }

    .password-request-stat:hover {
        transform: translateY(-2px);

        box-shadow:
            0 9px 22px rgba(15, 23, 42, .07);
    }

    .password-request-stat::after {
        content: "";

        position: absolute;

        right: -28px;
        bottom: -28px;

        width: 80px;
        height: 80px;

        border-radius: 50%;

        background: rgba(7, 136, 201, .035);
    }

    .password-request-stat-icon {
        width: 45px;
        height: 45px;

        flex: 0 0 45px;

        border-radius: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 17px;
    }

    .password-request-stat-icon.pending {
        background: var(--pr-warning-bg);
        color: var(--pr-warning);
    }

    .password-request-stat-icon.approved {
        background: var(--pr-success-bg);
        color: var(--pr-success);
    }

    .password-request-stat-icon.rejected {
        background: var(--pr-danger-bg);
        color: var(--pr-danger);
    }

    .password-request-stat-content {
        min-width: 0;
    }

    .password-request-stat-label {
        display: block;

        margin-bottom: 2px;

        color: var(--pr-muted);

        font-size: 11px;
        font-weight: 600;
    }

    .password-request-stat-number {
        display: block;

        color: var(--pr-text);

        font-size: 22px;
        line-height: 1.1;

        font-weight: 800;
    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .password-request-card {
        overflow: hidden;

        background: var(--pr-white);

        border: 1px solid var(--pr-border);

        border-radius: 17px;

        box-shadow:
            0 5px 20px rgba(15, 23, 42, .04);
    }

    .password-request-card-header {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 20px;

        padding: 20px 22px;

        border-bottom: 1px solid var(--pr-border);

        background:
            linear-gradient(
                180deg,
                #ffffff,
                #fcfdff
            );
    }

    .password-request-card-heading {
        display: flex;
        align-items: center;

        gap: 11px;
    }

    .password-request-card-icon {
        width: 37px;
        height: 37px;

        flex: 0 0 37px;

        border-radius: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--pr-primary-soft);

        color: var(--pr-primary);

        font-size: 14px;
    }

    .password-request-card-title {
        margin: 0;

        color: var(--pr-text);

        font-size: 16px;

        font-weight: 750;
    }

    .password-request-card-description {
        margin: 3px 0 0;

        color: var(--pr-muted);

        font-size: 11px;
    }

    .password-request-count {
        padding: 6px 10px;

        border-radius: 8px;

        background: #f8fafc;

        border: 1px solid var(--pr-border);

        color: var(--pr-muted);

        font-size: 10px;

        font-weight: 700;

        white-space: nowrap;
    }


    /* =====================================================
       TABLE
    ===================================================== */

    .password-request-table-wrapper {
        width: 100%;

        overflow-x: auto;

        scrollbar-width: thin;
    }

    .password-request-table {
        width: 100%;

        min-width: 850px;

        border-collapse: collapse;
    }

    .password-request-table th {
        padding: 13px 18px;

        background: #f8fafc;

        border-bottom: 1px solid var(--pr-border);

        color: var(--pr-muted);

        text-align: left;

        font-size: 10px;

        font-weight: 750;

        text-transform: uppercase;

        letter-spacing: .045em;

        white-space: nowrap;
    }

    .password-request-table th:last-child {
        text-align: center;
    }

    .password-request-table td {
        padding: 14px 18px;

        border-bottom: 1px solid var(--pr-border-soft);

        color: var(--pr-text-soft);

        font-size: 12px;

        vertical-align: middle;
    }

    .password-request-table tbody tr {
        transition:
            background .18s ease;
    }

    .password-request-table tbody tr:hover {
        background: #fafdff;
    }

    .password-request-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =====================================================
       TEACHER
    ===================================================== */

    .password-request-teacher {
        display: flex;

        align-items: center;

        gap: 11px;
    }

    .password-request-teacher-avatar {
        width: 39px;
        height: 39px;

        flex: 0 0 39px;

        border-radius: 11px;

        display: flex;
        align-items: center;
        justify-content: center;

        background:
            linear-gradient(
                145deg,
                var(--pr-primary-soft),
                #f4fbff
            );

        border: 1px solid #d8eef9;

        color: var(--pr-primary);

        font-size: 14px;
    }

    .password-request-teacher-name {
        display: block;

        margin-bottom: 2px;

        color: var(--pr-text);

        font-size: 12px;

        font-weight: 700;
    }

    .password-request-teacher-email {
        display: block;

        color: var(--pr-light);

        font-size: 10.5px;

        white-space: nowrap;
    }


    /* =====================================================
       STATUS
    ===================================================== */

    .password-request-status {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 6px 9px;

        border-radius: 8px;

        font-size: 9.5px;

        font-weight: 750;

        white-space: nowrap;
    }

    .password-request-status i {
        font-size: 9px;
    }

    .password-request-status.pending {
        background: var(--pr-warning-bg);
        color: var(--pr-warning);
    }

    .password-request-status.approved {
        background: var(--pr-success-bg);
        color: var(--pr-success);
    }

    .password-request-status.rejected {
        background: var(--pr-danger-bg);
        color: var(--pr-danger);
    }

    .password-request-status.default {
        background: #f1f5f9;
        color: #475569;
    }


    /* =====================================================
       DATE
    ===================================================== */

    .password-request-date {
        display: flex;

        align-items: center;

        gap: 8px;
    }

    .password-request-date-icon {
        width: 29px;
        height: 29px;

        flex: 0 0 29px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        background: #f1f7fb;

        color: var(--pr-primary);

        font-size: 11px;
    }

    .password-request-date-main {
        display: block;

        color: var(--pr-text-soft);

        font-size: 11px;

        font-weight: 650;
    }

    .password-request-date-time {
        display: block;

        margin-top: 1px;

        color: var(--pr-light);

        font-size: 9.5px;
    }


    /* =====================================================
       REVIEWER
    ===================================================== */

    .password-request-reviewer {
        display: flex;

        align-items: center;

        gap: 8px;
    }

    .password-request-reviewer-avatar {
        width: 28px;
        height: 28px;

        flex: 0 0 28px;

        border-radius: 8px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;

        color: #64748b;

        font-size: 10px;
    }

    .password-request-reviewer-name {
        color: var(--pr-text-soft);

        font-size: 11px;

        font-weight: 600;
    }

    .password-request-not-reviewed {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        color: var(--pr-light);

        font-size: 10.5px;
    }

    .password-request-not-reviewed i {
        font-size: 9px;
    }


    /* =====================================================
       ACTION
    ===================================================== */

    .password-request-actions {
        display: flex;

        justify-content: center;
        align-items: center;

        gap: 6px;
    }

    .password-request-actions form {
        margin: 0;
    }

    .password-request-action {
        min-height: 33px;

        border: none;

        padding: 7px 10px;

        border-radius: 8px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 5px;

        font-size: 9.5px;

        font-weight: 700;

        cursor: pointer;

        transition:
            transform .18s ease,
            background .18s ease,
            box-shadow .18s ease;
    }

    .password-request-action:hover {
        transform: translateY(-1px);
    }

    .password-request-action.approve {
        background: var(--pr-primary);

        color: #ffffff;

        box-shadow:
            0 4px 10px rgba(7, 136, 201, .16);
    }

    .password-request-action.approve:hover {
        background: var(--pr-primary-dark);

        box-shadow:
            0 6px 14px rgba(7, 136, 201, .22);
    }

    .password-request-action.reject {
        background: var(--pr-danger-bg);

        color: var(--pr-danger);
    }

    .password-request-action.reject:hover {
        background: #fee2e2;
    }

    .password-request-completed {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        padding: 6px 9px;

        border-radius: 8px;

        background: #f8fafc;

        color: var(--pr-light);

        border: 1px solid var(--pr-border-soft);

        font-size: 9.5px;

        font-weight: 600;
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .password-request-empty {
        padding: 60px 20px !important;

        text-align: center;
    }

    .password-request-empty-icon {
        width: 58px;
        height: 58px;

        margin: 0 auto 14px;

        border-radius: 16px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--pr-primary-soft);

        border: 1px solid #d8eef9;

        color: var(--pr-primary);

        font-size: 21px;
    }

    .password-request-empty-title {
        margin: 0 0 5px;

        color: var(--pr-text-soft);

        font-size: 14px;

        font-weight: 750;
    }

    .password-request-empty-text {
        margin: 0;

        color: var(--pr-light);

        font-size: 11px;
    }


    /* =====================================================
       PAGINATION
    ===================================================== */

    .password-request-pagination {
        padding: 17px 22px;

        border-top: 1px solid var(--pr-border);

        background: #fcfdff;
    }

    .password-request-pagination nav {
        display: flex;
        justify-content: flex-end;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 900px) {

        .password-request-stats {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 650px) {

        .password-request-title {
            font-size: 22px;
        }

        .password-request-title-icon {
            width: 42px;
            height: 42px;

            flex-basis: 42px;
        }

        .password-request-header {
            margin-bottom: 20px;
        }

        .password-request-card-header {
            padding: 17px;
        }

        .password-request-card-description {
            display: none;
        }

        .password-request-table th,
        .password-request-table td {
            padding: 12px 14px;
        }

        .password-request-action {
            width: 33px;
            height: 33px;

            padding: 0;
        }

        .password-request-action span {
            display: none;
        }

        .password-request-pagination {
            padding: 15px;
        }

    }


    @media (max-width: 430px) {

        .password-request-breadcrumb {
            font-size: 10px;
        }

        .password-request-title-row {
            gap: 10px;
        }

        .password-request-title-icon {
            width: 39px;
            height: 39px;

            flex-basis: 39px;

            border-radius: 11px;

            font-size: 15px;
        }

        .password-request-title {
            font-size: 19px;
        }

        .password-request-subtitle {
            font-size: 11px;
        }

        .password-request-stat {
            padding: 14px;
        }

        .password-request-stat-icon {
            width: 41px;
            height: 41px;

            flex-basis: 41px;
        }

        .password-request-stat-number {
            font-size: 20px;
        }

    }

</style>


<div class="password-request-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="password-request-header">

        <div class="password-request-header-left">


            <div class="password-request-breadcrumb">

                <i class="fa-solid fa-house"></i>

                <span>Admin</span>

                <i class="fa-solid fa-chevron-right"></i>

                <span class="active">
                    Reset Password
                </span>

            </div>


            <div class="password-request-title-row">

                <div class="password-request-title-icon">

                    <i class="fa-solid fa-key"></i>

                </div>


                <div>

                    <h1 class="password-request-title">
                        Permintaan Reset Password
                    </h1>

                    <p class="password-request-subtitle">
                        Kelola permintaan reset password dari guru.
                    </p>

                </div>

            </div>


        </div>

    </div>



    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="password-request-stats">


        {{-- MENUNGGU --}}

        <div class="password-request-stat">

            <div class="password-request-stat-icon pending">

                <i class="fa-solid fa-clock"></i>

            </div>

            <div class="password-request-stat-content">

                <span class="password-request-stat-label">
                    Menunggu
                </span>

                <strong class="password-request-stat-number">

                    {{ $requests->where('status', 'pending')->count() }}

                </strong>

            </div>

        </div>


        {{-- DISETUJUI --}}

        <div class="password-request-stat">

            <div class="password-request-stat-icon approved">

                <i class="fa-solid fa-circle-check"></i>

            </div>

            <div class="password-request-stat-content">

                <span class="password-request-stat-label">
                    Disetujui
                </span>

                <strong class="password-request-stat-number">

                    {{ $requests->where('status', 'approved')->count() }}

                </strong>

            </div>

        </div>


        {{-- DITOLAK --}}

        <div class="password-request-stat">

            <div class="password-request-stat-icon rejected">

                <i class="fa-solid fa-circle-xmark"></i>

            </div>

            <div class="password-request-stat-content">

                <span class="password-request-stat-label">
                    Ditolak
                </span>

                <strong class="password-request-stat-number">

                    {{ $requests->where('status', 'rejected')->count() }}

                </strong>

            </div>

        </div>


    </div>



    {{-- =====================================================
         MAIN CARD
    ====================================================== --}}

    <div class="password-request-card">


        {{-- CARD HEADER --}}

        <div class="password-request-card-header">


            <div class="password-request-card-heading">

                <div class="password-request-card-icon">

                    <i class="fa-solid fa-key"></i>

                </div>


                <div>

                    <h2 class="password-request-card-title">
                        Daftar Permintaan
                    </h2>

                    <p class="password-request-card-description">
                        Permintaan reset password guru yang masuk.
                    </p>

                </div>

            </div>


            <div class="password-request-count">

                {{ $requests->count() }}
                Data

            </div>


        </div>



        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="password-request-table-wrapper">


            <table class="password-request-table">


                <thead>

                    <tr>

                        <th>
                            Guru
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Diajukan
                        </th>

                        <th>
                            Ditinjau Oleh
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>


                @forelse ($requests as $req)


                    <tr>


                        {{-- =================================
                             GURU
                        ================================== --}}

                        <td>

                            <div class="password-request-teacher">


                                <div class="password-request-teacher-avatar">

                                    <i class="fa-solid fa-user"></i>

                                </div>


                                <div>

                                    <span class="password-request-teacher-name">

                                        {{ $req->user->name }}

                                    </span>

                                    <span class="password-request-teacher-email">

                                        {{ $req->user->email }}

                                    </span>

                                </div>


                            </div>

                        </td>



                        {{-- =================================
                             STATUS
                        ================================== --}}

                        <td>


                            @if ($req->status === 'pending')


                                <span class="password-request-status pending">

                                    <i class="fa-solid fa-clock"></i>

                                    Menunggu

                                </span>


                            @elseif ($req->status === 'approved')


                                <span class="password-request-status approved">

                                    <i class="fa-solid fa-check"></i>

                                    Disetujui

                                </span>


                            @elseif ($req->status === 'rejected')


                                <span class="password-request-status rejected">

                                    <i class="fa-solid fa-xmark"></i>

                                    Ditolak

                                </span>


                            @else


                                <span class="password-request-status default">

                                    {{ ucfirst($req->status) }}

                                </span>


                            @endif


                        </td>



                        {{-- =================================
                             TANGGAL
                        ================================== --}}

                        <td>


                            <div class="password-request-date">


                                <div class="password-request-date-icon">

                                    <i class="fa-regular fa-calendar"></i>

                                </div>


                                <div>

                                    <span class="password-request-date-main">

                                        {{ $req->created_at->format('d/m/Y') }}

                                    </span>

                                    <span class="password-request-date-time">

                                        {{ $req->created_at->format('H:i') }}
                                        WIB

                                    </span>

                                </div>


                            </div>


                        </td>



                        {{-- =================================
                             REVIEWER
                        ================================== --}}

                        <td>


                            @if ($req->reviewer)


                                <div class="password-request-reviewer">


                                    <div class="password-request-reviewer-avatar">

                                        <i class="fa-solid fa-user-shield"></i>

                                    </div>


                                    <span class="password-request-reviewer-name">

                                        {{ $req->reviewer->name }}

                                    </span>


                                </div>


                            @else


                                <span class="password-request-not-reviewed">

                                    <i class="fa-regular fa-clock"></i>

                                    Belum ditinjau

                                </span>


                            @endif


                        </td>



                        {{-- =================================
                             AKSI
                        ================================== --}}

                        <td>


                            @if ($req->status === 'pending')


                                <div class="password-request-actions">


                                    {{-- SETUJUI --}}

                                    <form
                                        method="POST"
                                        action="{{ route('admin.password-requests.approve', $req) }}"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="password-request-action approve"
                                            title="Setujui permintaan"
                                            onclick="return confirm('Apakah Anda yakin ingin menyetujui permintaan reset password ini?')"
                                        >

                                            <i class="fa-solid fa-check"></i>

                                            <span>
                                                Setujui
                                            </span>

                                        </button>

                                    </form>



                                    {{-- TOLAK --}}

                                    <form
                                        method="POST"
                                        action="{{ route('admin.password-requests.reject', $req) }}"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="password-request-action reject"
                                            title="Tolak permintaan"
                                            onclick="return confirm('Apakah Anda yakin ingin menolak permintaan reset password ini?')"
                                        >

                                            <i class="fa-solid fa-xmark"></i>

                                            <span>
                                                Tolak
                                            </span>

                                        </button>

                                    </form>


                                </div>


                            @else


                                <span class="password-request-completed">

                                    <i class="fa-solid fa-circle-check"></i>

                                    Selesai

                                </span>


                            @endif


                        </td>


                    </tr>


                @empty


                    {{-- =====================================
                         EMPTY STATE
                    ====================================== --}}

                    <tr>

                        <td
                            colspan="5"
                            class="password-request-empty"
                        >


                            <div class="password-request-empty-icon">

                                <i class="fa-solid fa-key"></i>

                            </div>


                            <h3 class="password-request-empty-title">

                                Belum Ada Permintaan

                            </h3>


                            <p class="password-request-empty-text">

                                Belum ada permintaan reset password dari guru.

                            </p>


                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>



        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if ($requests->hasPages())


            <div class="password-request-pagination">

                {{ $requests->links() }}

            </div>


        @endif


    </div>


</div>

@endsection