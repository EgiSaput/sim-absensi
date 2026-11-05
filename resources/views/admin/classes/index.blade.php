@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')

<style>
    /* =========================================================
       CLASS PAGE
    ========================================================= */

    .class-page {
        width: 100%;
        padding-bottom: 30px;

        --primary: #0788c9;
        --primary-dark: #0676ad;
        --primary-soft: #e8f6fd;

        --text: #1e293b;
        --text-soft: #64748b;
        --text-muted: #94a3b8;

        --border: #e2e8f0;
        --border-soft: #f1f5f9;

        --success: #16a34a;
        --danger: #dc2626;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;
        margin-bottom: 22px;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 14px;

        min-width: 0;
    }

    .header-icon {
        width: 48px;
        height: 48px;

        flex: 0 0 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: var(--primary-soft);
        color: var(--primary);

        font-size: 18px;
    }

    .page-title {
        margin: 0;

        color: var(--text);

        font-size: 22px;
        font-weight: 750;

        letter-spacing: -.3px;
        line-height: 1.2;
    }

    .page-description {
        margin: 5px 0 0;

        color: var(--text-muted);

        font-size: 13px;
        line-height: 1.5;
    }


    /* =========================================================
       ADD BUTTON
    ========================================================= */

    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 8px;

        min-height: 41px;
        padding: 0 16px;

        border: 1px solid var(--primary);
        border-radius: 9px;

        background: var(--primary);
        color: #fff;

        text-decoration: none;

        font-size: 12px;
        font-weight: 650;

        white-space: nowrap;

        transition:
            background .2s ease,
            border-color .2s ease,
            box-shadow .2s ease,
            transform .2s ease;
    }

    .btn-add:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
        color: #fff;

        box-shadow:
            0 5px 14px rgba(7, 136, 201, .18);

        transform: translateY(-1px);
    }


    /* =========================================================
       SUMMARY GRID
    ========================================================= */

    .summary-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 14px;

        margin-bottom: 18px;
    }

    .summary-card {
        position: relative;

        display: flex;
        align-items: center;

        gap: 13px;

        padding: 17px;

        background: #fff;

        border: 1px solid var(--border);
        border-radius: 12px;

        box-shadow:
            0 5px 18px rgba(15, 23, 42, .035);

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            transform .2s ease;
    }

    .summary-card:hover {
        border-color: #cbd5e1;

        box-shadow:
            0 8px 22px rgba(15, 23, 42, .055);

        transform: translateY(-2px);
    }

    .summary-icon {
        width: 40px;
        height: 40px;

        flex: 0 0 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: var(--primary-soft);
        color: var(--primary);

        font-size: 14px;
    }

    .summary-info {
        min-width: 0;
    }

    .summary-info p {
        margin: 0;
    }

    .summary-label {
        margin-bottom: 4px !important;

        color: var(--text-muted);

        font-size: 10px;
        font-weight: 500;
    }

    .summary-value {
        color: var(--text);

        font-size: 19px;
        font-weight: 750;

        line-height: 1.2;
    }


    /* =========================================================
       TABLE CARD
    ========================================================= */

    .table-card {
        overflow: hidden;

        background: #fff;

        border: 1px solid var(--border);
        border-radius: 14px;

        box-shadow:
            0 7px 25px rgba(15, 23, 42, .04);
    }


    /* =========================================================
       TOOLBAR
    ========================================================= */

    .table-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 18px;

        padding: 18px 20px;

        border-bottom: 1px solid var(--border-soft);

        background:
            linear-gradient(
                180deg,
                #ffffff 0%,
                #fcfdff 100%
            );
    }

    .toolbar-title {
        margin: 0;

        color: var(--text);

        font-size: 14px;
        font-weight: 700;

        line-height: 1.3;
    }

    .toolbar-subtitle {
        margin: 4px 0 0;

        color: var(--text-muted);

        font-size: 11px;
        line-height: 1.45;
    }


    /* =========================================================
       SEARCH
    ========================================================= */

    .search-box {
        position: relative;

        width: 245px;

        flex: 0 0 auto;
    }

    .search-box i {
        position: absolute;

        left: 13px;
        top: 50%;

        transform: translateY(-50%);

        color: #94a3b8;

        font-size: 11px;

        pointer-events: none;

        transition: color .2s ease;
    }

    .search-box:focus-within i {
        color: var(--primary);
    }

    .search-input {
        width: 100%;
        height: 38px;

        box-sizing: border-box;

        padding: 0 12px 0 35px;

        border: 1px solid var(--border);
        border-radius: 9px;

        outline: none;

        background: #fff;
        color: #334155;

        font-family: inherit;
        font-size: 11px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .search-input::placeholder {
        color: #cbd5e1;
    }

    .search-input:hover {
        border-color: #cbd5e1;
    }

    .search-input:focus {
        border-color: var(--primary);

        box-shadow:
            0 0 0 3px rgba(7, 136, 201, .08);
    }


    /* =========================================================
       TABLE WRAPPER
    ========================================================= */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .class-table {
        width: 100%;

        min-width: 720px;

        border-collapse: collapse;
    }


    /* =========================================================
       TABLE HEADER
    ========================================================= */

    .class-table th {
        padding: 12px 18px;

        border-bottom: 1px solid var(--border);

        background: #f8fafc;

        color: #64748b;

        font-size: 9px;
        font-weight: 700;

        text-align: left;

        text-transform: uppercase;
        letter-spacing: .04em;

        white-space: nowrap;
    }


    /* =========================================================
       TABLE BODY
    ========================================================= */

    .class-table td {
        padding: 14px 18px;

        border-bottom: 1px solid var(--border-soft);

        color: #475569;

        font-size: 11px;

        vertical-align: middle;
    }

    .class-table tbody tr {
        transition:
            background .2s ease;
    }

    .class-table tbody tr:hover {
        background: #fafdff;
    }

    .class-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================================================
       CLASS NAME
    ========================================================= */

    .class-name {
        display: flex;
        align-items: center;

        gap: 10px;
    }

    .class-avatar {
        width: 35px;
        height: 35px;

        flex: 0 0 35px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: var(--primary-soft);
        color: var(--primary);

        font-size: 11px;
    }

    .class-name-text {
        display: flex;
        flex-direction: column;

        gap: 3px;

        min-width: 0;
    }

    .class-name-main {
        color: #334155;

        font-size: 12px;
        font-weight: 700;

        line-height: 1.3;
    }

    .class-name-sub {
        color: var(--text-muted);

        font-size: 9px;
        line-height: 1.3;
    }


    /* =========================================================
       GRADE BADGE
    ========================================================= */

    .grade-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 6px 10px;

        border-radius: 20px;

        background: #eff6ff;
        color: #2563eb;

        font-size: 10px;
        font-weight: 650;

        white-space: nowrap;
    }

    .grade-badge i {
        font-size: 9px;
    }


    /* =========================================================
       TEACHER
    ========================================================= */

    .teacher-info {
        display: flex;
        align-items: center;

        gap: 8px;
    }

    .teacher-icon {
        width: 29px;
        height: 29px;

        flex: 0 0 29px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #f1f5f9;
        color: #64748b;

        font-size: 9px;
    }

    .teacher-name {
        color: #475569;

        font-size: 10px;
        font-weight: 550;
    }

    .no-data {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        color: #94a3b8;

        font-size: 10px;
        font-style: italic;
    }


    /* =========================================================
       STUDENT COUNT
    ========================================================= */

    .student-count {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 6px 10px;

        border-radius: 20px;

        background: #f0fdf4;
        color: #15803d;

        font-size: 10px;
        font-weight: 650;

        white-space: nowrap;
    }

    .student-count i {
        font-size: 9px;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .action-buttons form {
        margin: 0;
    }

    .action-btn {
        width: 32px;
        height: 32px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border: 1px solid transparent;
        border-radius: 8px;

        text-decoration: none;

        cursor: pointer;

        font-size: 10px;

        transition:
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            transform .2s ease;
    }

    .action-btn:hover {
        transform: translateY(-1px);
    }

    .btn-edit {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-edit:hover {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fee2e2;
        color: #b91c1c;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 65px 20px;

        text-align: center;
    }

    .empty-icon {
        width: 58px;
        height: 58px;

        margin: 0 auto 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #f1f5f9;
        color: #94a3b8;

        font-size: 19px;
    }

    .empty-title {
        margin: 0;

        color: #475569;

        font-size: 13px;
        font-weight: 700;
    }

    .empty-description {
        max-width: 360px;

        margin: 6px auto 0;

        color: #94a3b8;

        font-size: 10px;
        line-height: 1.5;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-wrapper {
        display: flex;
        align-items: center;
        justify-content: flex-end;

        padding: 15px 20px;

        border-top: 1px solid var(--border-soft);
    }

    /*
       Supaya pagination Laravel tetap terlihat rapi
       tanpa mengubah pagination backend.
    */

    .pagination-wrapper nav {
        margin: 0;
    }

    .pagination-wrapper .pagination {
        margin: 0;
    }

    .pagination-wrapper .page-link {
        font-size: 11px;
    }


    /* =========================================================
       SEARCH EMPTY
    ========================================================= */

    .search-empty {
        display: none;

        padding: 45px 20px;

        text-align: center;
    }

    .search-empty-icon {
        width: 50px;
        height: 50px;

        margin: 0 auto 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #f8fafc;
        color: #94a3b8;

        font-size: 16px;
    }

    .search-empty-title {
        margin: 0;

        color: #475569;

        font-size: 12px;
        font-weight: 650;
    }

    .search-empty-text {
        margin: 5px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }


    /* =========================================================
       RESPONSIVE TABLET
    ========================================================= */

    @media (max-width: 850px) {

        .summary-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

        .summary-card:last-child {
            grid-column: 1 / -1;
        }

    }


    /* =========================================================
       RESPONSIVE MOBILE
    ========================================================= */

    @media (max-width: 650px) {

        .page-header {
            flex-direction: column;
            align-items: stretch;

            gap: 14px;
        }

        .header-left {
            align-items: flex-start;
        }

        .header-icon {
            width: 44px;
            height: 44px;

            flex-basis: 44px;
        }

        .page-title {
            font-size: 20px;
        }

        .page-description {
            font-size: 12px;
        }

        .btn-add {
            width: 100%;
        }


        .summary-grid {
            grid-template-columns: 1fr;

            gap: 10px;
        }

        .summary-card:last-child {
            grid-column: auto;
        }


        .table-toolbar {
            flex-direction: column;
            align-items: stretch;

            padding: 16px;
        }

        .search-box {
            width: 100%;
        }


        .table-wrapper {
            overflow-x: auto;
        }


        .pagination-wrapper {
            justify-content: center;

            padding: 14px;
        }

    }


    /* =========================================================
       SMALL MOBILE
    ========================================================= */

    @media (max-width: 420px) {

        .page-title {
            font-size: 18px;
        }

        .page-description {
            font-size: 11px;
        }

        .summary-card {
            padding: 14px;
        }

        .summary-icon {
            width: 37px;
            height: 37px;

            flex-basis: 37px;
        }

        .summary-value {
            font-size: 17px;
        }

        .class-table {
            min-width: 680px;
        }

    }
</style>


<div class="class-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="header-left">

            <div class="header-icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <div>

                <h1 class="page-title">
                    Data Kelas
                </h1>

                <p class="page-description">
                    Kelola data kelas dan wali kelas sekolah.
                </p>

            </div>

        </div>


        <a
            href="{{ route('admin.classes.create') }}"
            class="btn-add"
        >
            <i class="fa-solid fa-plus"></i>
            Tambah Kelas
        </a>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="summary-grid">


        {{-- TOTAL KELAS --}}

        <div class="summary-card">

            <div class="summary-icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <div class="summary-info">

                <p class="summary-label">
                    Total Kelas
                </p>

                <p class="summary-value">
                    {{ $classes->total() }}
                </p>

            </div>

        </div>


        {{-- TOTAL SISWA --}}

        <div class="summary-card">

            <div class="summary-icon">
                <i class="fa-solid fa-user-graduate"></i>
            </div>

            <div class="summary-info">

                <p class="summary-label">
                    Siswa Terdaftar
                </p>

                <p class="summary-value">
                    {{ $classes->sum('students_count') }}
                </p>

            </div>

        </div>


        {{-- KELAS DI HALAMAN --}}

        <div class="summary-card">

            <div class="summary-icon">
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>

            <div class="summary-info">

                <p class="summary-label">
                    Kelas di Halaman Ini
                </p>

                <p class="summary-value">
                    {{ $classes->count() }}
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
         TABLE CARD
    ====================================================== --}}

    <div class="table-card">


        {{-- TOOLBAR --}}

        <div class="table-toolbar">

            <div>

                <h2 class="toolbar-title">
                    Daftar Kelas
                </h2>

                <p class="toolbar-subtitle">
                    Daftar kelas yang tersedia dalam sistem.
                </p>

            </div>


            {{-- SEARCH --}}

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    id="searchClass"
                    class="search-input"
                    placeholder="Cari kelas, tingkat, atau wali kelas..."
                    autocomplete="off"
                >

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="table-wrapper">

            <table class="class-table">

                <thead>

                    <tr>

                        <th>
                            Kelas
                        </th>

                        <th>
                            Tingkat
                        </th>

                        <th>
                            Wali Kelas
                        </th>

                        <th>
                            Jumlah Siswa
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody id="classTableBody">

                    @forelse ($classes as $class)

                        <tr class="class-row">


                            {{-- KELAS --}}

                            <td>

                                <div class="class-name">

                                    <div class="class-avatar">
                                        <i class="fa-solid fa-users"></i>
                                    </div>

                                    <div class="class-name-text">

                                        <span class="class-name-main">
                                            {{ $class->name }}
                                        </span>

                                        <span class="class-name-sub">
                                            Kelas sekolah
                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- TINGKAT --}}

                            <td>

                                <span class="grade-badge">

                                    <i class="fa-solid fa-layer-group"></i>

                                    {{ $class->grade_level }}

                                </span>

                            </td>


                            {{-- WALI KELAS --}}

                            <td>

                                @if ($class->homeroomTeacher)

                                    <div class="teacher-info">

                                        <div class="teacher-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </div>

                                        <span class="teacher-name">
                                            {{ $class->homeroomTeacher->name }}
                                        </span>

                                    </div>

                                @else

                                    <span class="no-data">
                                        <i class="fa-regular fa-circle"></i>
                                        Belum ditentukan
                                    </span>

                                @endif

                            </td>


                            {{-- JUMLAH SISWA --}}

                            <td>

                                <span class="student-count">

                                    <i class="fa-solid fa-user-graduate"></i>

                                    {{ $class->students_count }}

                                    siswa

                                </span>

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="action-buttons">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('admin.classes.edit', $class) }}"
                                        class="action-btn btn-edit"
                                        title="Edit Kelas"
                                        aria-label="Edit Kelas"
                                    >

                                        <i class="fa-solid fa-pen"></i>

                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        method="POST"
                                        action="{{ route('admin.classes.destroy', $class) }}"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn btn-delete"
                                            title="Hapus Kelas"
                                            aria-label="Hapus Kelas"
                                        >

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="fa-solid fa-school"></i>
                                    </div>

                                    <h3 class="empty-title">
                                        Belum ada data kelas
                                    </h3>

                                    <p class="empty-description">
                                        Silakan tambahkan kelas baru
                                        menggunakan tombol Tambah Kelas.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>


            {{-- SEARCH EMPTY STATE --}}

            @if ($classes->count() > 0)

                <div
                    id="searchEmpty"
                    class="search-empty"
                >

                    <div class="search-empty-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <h3 class="search-empty-title">
                        Kelas tidak ditemukan
                    </h3>

                    <p class="search-empty-text">
                        Coba gunakan kata kunci pencarian yang berbeda.
                    </p>

                </div>

            @endif

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if ($classes->hasPages())

            <div class="pagination-wrapper">

                {{ $classes->links() }}

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     SEARCH CLIENT SIDE
========================================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const searchInput =
            document.getElementById('searchClass');

        const rows =
            document.querySelectorAll('.class-row');

        const searchEmpty =
            document.getElementById('searchEmpty');


        if (!searchInput || !rows.length) {
            return;
        }


        searchInput.addEventListener('input', function () {

            const keyword =
                this.value.toLowerCase().trim();

            let visibleRows = 0;


            rows.forEach(function (row) {

                const text =
                    row.textContent.toLowerCase();

                const isMatch =
                    text.includes(keyword);


                if (isMatch) {

                    row.style.display = '';

                    visibleRows++;

                } else {

                    row.style.display = 'none';

                }

            });


            if (searchEmpty) {

                searchEmpty.style.display =
                    keyword !== '' && visibleRows === 0
                        ? 'block'
                        : 'none';

            }

        });

    });
</script>

@endsection