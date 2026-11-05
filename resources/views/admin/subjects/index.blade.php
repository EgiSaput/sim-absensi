@extends('layouts.app')

@section('title', 'Mata Pelajaran')

@section('content')

<style>
    /* =====================================================
       SUBJECT PAGE
    ===================================================== */

    .subject-page {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* =====================================================
       HEADER
    ===================================================== */

    .subject-page .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 20px;
    }

    .subject-page .header-left {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .subject-page .header-icon {
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

    .subject-page .page-title {
        margin: 0;
        color: #1e293b;
        font-size: 21px;
        font-weight: 700;
        line-height: 1.2;
    }

    .subject-page .page-description {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    /* =====================================================
       ADD BUTTON
    ===================================================== */

    .subject-page .btn-add {
        height: 39px;
        padding: 0 15px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        background: #0788c9;
        color: #ffffff;

        border-radius: 9px;
        text-decoration: none;

        font-size: 10px;
        font-weight: 600;

        white-space: nowrap;

        transition:
            background .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .subject-page .btn-add:hover {
        background: #0676ad;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(7, 136, 201, .15);
    }

    /* =====================================================
       SUMMARY CARD
    ===================================================== */

    .subject-page .summary-card {
        display: flex;
        align-items: center;
        gap: 13px;

        padding: 15px 17px;
        margin-bottom: 15px;

        background: #ffffff;

        border: 1px solid #e2e8f0;
        border-radius: 13px;

        box-shadow: 0 4px 15px rgba(15, 23, 42, .03);
    }

    .subject-page .summary-icon {
        width: 39px;
        height: 39px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f0f9ff;
        color: #0788c9;

        border-radius: 10px;
        font-size: 14px;
    }

    .subject-page .summary-label {
        margin: 0;

        color: #94a3b8;
        font-size: 8px;
        font-weight: 500;
    }

    .subject-page .summary-value {
        margin: 3px 0 0;

        color: #1e293b;
        font-size: 17px;
        font-weight: 700;
        line-height: 1;
    }

    /* =====================================================
       TABLE CARD
    ===================================================== */

    .subject-page .table-card {
        overflow: hidden;

        background: #ffffff;

        border: 1px solid #e2e8f0;
        border-radius: 14px;

        box-shadow: 0 4px 15px rgba(15, 23, 42, .03);
    }

    /* =====================================================
       TABLE HEADER
    ===================================================== */

    .subject-page .table-header {
        min-height: 66px;
        padding: 15px 20px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        border-bottom: 1px solid #f1f5f9;
    }

    .subject-page .table-title {
        margin: 0;

        color: #1e293b;
        font-size: 12px;
        font-weight: 650;
    }

    .subject-page .table-description {
        margin: 3px 0 0;

        color: #94a3b8;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =====================================================
       TABLE
    ===================================================== */

    .subject-page .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .subject-page .subject-table {
        width: 100%;
        min-width: 600px;

        margin: 0;

        border-collapse: collapse;
        border-spacing: 0;
    }

    .subject-page .subject-table th {
        padding: 11px 18px;

        background: #f8fafc;

        border-bottom: 1px solid #e2e8f0;

        color: #64748b;
        font-size: 8px;
        font-weight: 700;

        text-align: left;
        white-space: nowrap;
        letter-spacing: .02em;
    }

    .subject-page .subject-table td {
        padding: 13px 18px;

        border-bottom: 1px solid #f1f5f9;

        color: #475569;
        font-size: 9px;

        vertical-align: middle;
    }

    .subject-page .subject-table tbody tr {
        transition: background .15s ease;
    }

    .subject-page .subject-table tbody tr:hover {
        background: #f8fcff;
    }

    .subject-page .subject-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* =====================================================
       SUBJECT CODE
    ===================================================== */

    .subject-page .subject-code {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        padding: 5px 8px;

        background: #e8f6fd;
        color: #0676ad;

        border: 1px solid #d8eef9;
        border-radius: 7px;

        font-size: 8px;
        font-weight: 700;

        letter-spacing: .03em;
        white-space: nowrap;
    }

    .subject-page .subject-code i {
        font-size: 7px;
        opacity: .8;
    }

    /* =====================================================
       SUBJECT NAME
    ===================================================== */

    .subject-page .subject-name {
        display: flex;
        align-items: center;
        gap: 9px;

        color: #334155;
        font-size: 9px;
        font-weight: 600;
    }

    .subject-page .subject-avatar {
        width: 30px;
        height: 30px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;
        color: #64748b;

        border-radius: 8px;

        font-size: 10px;

        transition:
            background .2s ease,
            color .2s ease;
    }

    .subject-page .subject-table tbody tr:hover .subject-avatar {
        background: #e8f6fd;
        color: #0788c9;
    }

    /* =====================================================
       ACTION
    ===================================================== */

    .subject-page .action-group {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .subject-page .action-btn {
        height: 30px;
        padding: 0 9px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;

        border-radius: 7px;

        font-size: 8px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        border: 1px solid transparent;

        transition:
            background .15s ease,
            color .15s ease,
            transform .15s ease;
    }

    .subject-page .action-btn:hover {
        transform: translateY(-1px);
    }

    /* EDIT */

    .subject-page .btn-edit {
        background: #eff6ff;
        border-color: #dbeafe;
        color: #2563eb;
    }

    .subject-page .btn-edit:hover {
        background: #dbeafe;
        color: #1d4ed8;
    }

    /* DELETE */

    .subject-page .btn-delete {
        background: #fef2f2;
        border-color: #fee2e2;
        color: #dc2626;
    }

    .subject-page .btn-delete:hover {
        background: #fee2e2;
        color: #b91c1c;
    }

    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .subject-page .empty-state {
        padding: 55px 20px;
        text-align: center;
    }

    .subject-page .empty-icon {
        width: 55px;
        height: 55px;
        margin: 0 auto 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;
        color: #94a3b8;

        border-radius: 14px;

        font-size: 20px;
    }

    .subject-page .empty-title {
        margin: 0;

        color: #475569;
        font-size: 12px;
        font-weight: 600;
    }

    .subject-page .empty-description {
        max-width: 300px;
        margin: 5px auto 0;

        color: #94a3b8;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =====================================================
       PAGINATION
    ===================================================== */

    .subject-page .pagination-wrapper {
        padding: 13px 18px;

        display: flex;
        justify-content: flex-end;

        border-top: 1px solid #f1f5f9;
    }

    .subject-page .pagination-wrapper nav {
        width: auto;
        min-height: auto;

        padding: 0;

        background: transparent;
        color: inherit;
    }

    .subject-page .pagination-wrapper nav > div:first-child {
        display: none;
    }

    .subject-page .pagination-wrapper svg {
        width: 14px;
        height: 14px;
    }

    .subject-page .pagination-wrapper a,
    .subject-page .pagination-wrapper span {
        font-size: 9px !important;
    }

    /* =====================================================
       DELETE FORM
    ===================================================== */

    .subject-page .delete-form {
        display: inline;
        margin: 0;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .subject-page .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .subject-page .btn-add {
            width: 100%;
        }

        .subject-page .summary-card {
            margin-bottom: 12px;
        }

        .subject-page .table-header {
            padding: 15px;
        }

        .subject-page .subject-table th,
        .subject-page .subject-table td {
            padding: 11px 13px;
        }

        .subject-page .pagination-wrapper {
            justify-content: center;
            padding: 12px;
        }
    }

    @media (max-width: 450px) {

        .subject-page .header-left {
            gap: 10px;
        }

        .subject-page .header-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            font-size: 15px;
        }

        .subject-page .page-title {
            font-size: 18px;
        }

        .subject-page .page-description {
            font-size: 9px;
        }

        .subject-page .table-card {
            border-radius: 11px;
        }

        .subject-page .table-title {
            font-size: 11px;
        }

        .subject-page .table-description {
            font-size: 8px;
        }

        .subject-page .action-btn {
            width: 30px;
            padding: 0;
        }

        .subject-page .action-btn span {
            display: none;
        }

        .subject-page .subject-name {
            gap: 7px;
        }

        .subject-page .subject-avatar {
            width: 28px;
            height: 28px;
        }
    }
</style>


<div class="subject-page">

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
                    Mata Pelajaran
                </h1>

                <p class="page-description">
                    Kelola daftar mata pelajaran.
                </p>
            </div>

        </div>


        <a
            href="{{ route('admin.subjects.create') }}"
            class="btn-add"
        >
            <i class="fa-solid fa-plus"></i>
            Tambah Mata Pelajaran
        </a>

    </div>


    {{-- =================================================
         SUMMARY
    ================================================== --}}
    <div class="summary-card">

        <div class="summary-icon">
            <i class="fa-solid fa-book"></i>
        </div>

        <div>

            <p class="summary-label">
                Total Mata Pelajaran
            </p>

            <p class="summary-value">
                {{ $subjects->total() }}
            </p>

        </div>

    </div>


    {{-- =================================================
         TABLE
    ================================================== --}}
    <div class="table-card">

        <div class="table-header">

            <div>

                <h2 class="table-title">
                    Daftar Mata Pelajaran
                </h2>

                <p class="table-description">
                    Mata pelajaran yang terdaftar dalam sistem.
                </p>

            </div>

        </div>


        <div class="table-wrapper">

            @if ($subjects->count() > 0)

                <table class="subject-table">

                    <thead>

                        <tr>

                            <th width="25%">
                                KODE
                            </th>

                            <th>
                                NAMA MATA PELAJARAN
                            </th>

                            <th width="220">
                                AKSI
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($subjects as $subject)

                            <tr>

                                {{-- KODE --}}
                                <td>

                                    <span class="subject-code">

                                        <i class="fa-solid fa-hashtag"></i>

                                        {{ $subject->code }}

                                    </span>

                                </td>


                                {{-- NAMA --}}
                                <td>

                                    <div class="subject-name">

                                        <div class="subject-avatar">

                                            <i class="fa-solid fa-book"></i>

                                        </div>

                                        <span>
                                            {{ $subject->name }}
                                        </span>

                                    </div>

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="action-group">

                                        {{-- EDIT --}}
                                        <a
                                            class="action-btn btn-edit"
                                            href="{{ route('admin.subjects.edit', $subject) }}"
                                            title="Edit mata pelajaran"
                                        >

                                            <i class="fa-solid fa-pen"></i>

                                            <span>
                                                Edit
                                            </span>

                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            method="POST"
                                            action="{{ route('admin.subjects.destroy', $subject) }}"
                                            class="delete-form"
                                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus mata pelajaran {{ $subject->name }}?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                class="action-btn btn-delete"
                                                type="submit"
                                                title="Hapus mata pelajaran"
                                            >

                                                <i class="fa-solid fa-trash"></i>

                                                <span>
                                                    Hapus
                                                </span>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                {{-- EMPTY STATE --}}
                <div class="empty-state">

                    <div class="empty-icon">

                        <i class="fa-solid fa-book-open"></i>

                    </div>

                    <h3 class="empty-title">
                        Belum Ada Mata Pelajaran
                    </h3>

                    <p class="empty-description">
                        Silakan tambahkan mata pelajaran menggunakan tombol di atas.
                    </p>

                </div>

            @endif

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}
        @if ($subjects->hasPages())

            <div class="pagination-wrapper">

                {{ $subjects->links() }}

            </div>

        @endif

    </div>

</div>

@endsection