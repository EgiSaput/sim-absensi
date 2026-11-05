@extends('layouts.app')

@section('title', 'Tahun Ajaran')

@section('content')

<style>
    /* =========================================================
       ACADEMIC YEAR PAGE
    ========================================================= */

    .academic-year-page {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .academic-year-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 20px;
    }

    .academic-year-header-left {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .academic-year-header-icon {
        width: 46px;
        height: 46px;
        flex: 0 0 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #e8f6fd;
        color: #0788c9;
        font-size: 17px;
    }

    .academic-year-title {
        margin: 0;
        color: #1e293b;
        font-size: 21px;
        font-weight: 700;
        line-height: 1.2;
    }

    .academic-year-description {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    /* =========================================================
       ADD BUTTON
    ========================================================= */

    .academic-year-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 38px;
        padding: 0 15px;
        border-radius: 9px;
        background: #0788c9;
        color: #fff;
        text-decoration: none;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
        transition: all .18s ease;
        box-shadow: 0 5px 14px rgba(7, 136, 201, .16);
    }

    .academic-year-add:hover {
        background: #0676ad;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 7px 18px rgba(7, 136, 201, .22);
    }

    /* =========================================================
       SUMMARY
    ========================================================= */

    .academic-year-summary {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 15px;
    }

    .academic-year-summary-card {
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 72px;
        padding: 14px 16px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .03);
        transition: all .18s ease;
    }

    .academic-year-summary-card:hover {
        border-color: #cfeaf7;
        transform: translateY(-1px);
        box-shadow: 0 7px 20px rgba(15, 23, 42, .05);
    }

    .academic-year-summary-icon {
        width: 39px;
        height: 39px;
        flex: 0 0 39px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #f0f9ff;
        color: #0788c9;
        font-size: 13px;
    }

    .academic-year-summary-icon.active {
        background: #ecfdf5;
        color: #16a34a;
    }

    .academic-year-summary-icon.inactive {
        background: #f8fafc;
        color: #94a3b8;
    }

    .academic-year-summary-label {
        margin: 0;
        color: #94a3b8;
        font-size: 8px;
        font-weight: 500;
    }

    .academic-year-summary-value {
        margin: 3px 0 0;
        color: #1e293b;
        font-size: 17px;
        font-weight: 700;
        line-height: 1;
    }

    /* =========================================================
       TABLE CARD
    ========================================================= */

    .academic-year-table-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .03);
    }

    .academic-year-table-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 17px 20px;
        border-bottom: 1px solid #f1f5f9;
    }

    .academic-year-table-title {
        margin: 0;
        color: #1e293b;
        font-size: 12px;
        font-weight: 650;
    }

    .academic-year-table-description {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.5;
    }

    /* =========================================================
       TABLE
    ========================================================= */

    .academic-year-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .academic-year-table {
        width: 100%;
        min-width: 650px;
        margin: 0;
        border-collapse: collapse;
    }

    .academic-year-table th {
        padding: 12px 18px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 8px;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
        letter-spacing: .02em;
    }

    .academic-year-table td {
        padding: 13px 18px;
        border-bottom: 1px solid #f1f5f9;
        color: #475569;
        font-size: 9px;
        vertical-align: middle;
    }

    .academic-year-table tbody tr {
        transition: background .18s ease;
    }

    .academic-year-table tbody tr:hover {
        background: #f8fcff;
    }

    .academic-year-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* =========================================================
       YEAR NAME
    ========================================================= */

    .academic-year-name {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 180px;
    }

    .academic-year-name-icon {
        width: 32px;
        height: 32px;
        flex: 0 0 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #e8f6fd;
        color: #0788c9;
        font-size: 11px;
    }

    .academic-year-name-text {
        color: #334155;
        font-size: 10px;
        font-weight: 650;
    }

    /* =========================================================
       SEMESTER
    ========================================================= */

    .academic-year-semester {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 7px;
        background: #f8fafc;
        border: 1px solid #eef2f7;
        color: #475569;
        font-size: 8px;
        font-weight: 600;
    }

    .academic-year-semester i {
        color: #0788c9;
        font-size: 8px;
    }

    /* =========================================================
       STATUS
    ========================================================= */

    .academic-year-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 8px;
        font-weight: 650;
        white-space: nowrap;
    }

    .academic-year-status.active {
        background: #ecfdf5;
        color: #15803d;
    }

    .academic-year-status.inactive {
        background: #f1f5f9;
        color: #64748b;
    }

    .academic-year-status-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
    }

    /* =========================================================
       ACTIONS
    ========================================================= */

    .academic-year-actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .academic-year-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        height: 30px;
        padding: 0 9px;
        border: 1px solid transparent;
        border-radius: 7px;
        font-size: 8px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all .16s ease;
    }

    .academic-year-action.edit {
        background: #eff6ff;
        border-color: #dbeafe;
        color: #2563eb;
    }

    .academic-year-action.edit:hover {
        background: #dbeafe;
        border-color: #bfdbfe;
        color: #1d4ed8;
    }

    .academic-year-action.delete {
        background: #fef2f2;
        border-color: #fee2e2;
        color: #dc2626;
    }

    .academic-year-action.delete:hover {
        background: #fee2e2;
        border-color: #fecaca;
        color: #b91c1c;
    }

    .academic-year-delete-form {
        display: inline;
        margin: 0;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .academic-year-empty {
        padding: 60px 20px;
        text-align: center;
    }

    .academic-year-empty-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: #f8fafc;
        color: #94a3b8;
        font-size: 21px;
    }

    .academic-year-empty-title {
        margin: 0;
        color: #475569;
        font-size: 12px;
        font-weight: 650;
    }

    .academic-year-empty-description {
        max-width: 330px;
        margin: 5px auto 0;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.6;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 850px) {
        .academic-year-summary {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 650px) {
        .academic-year-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .academic-year-add {
            width: 100%;
        }

        .academic-year-summary {
            grid-template-columns: 1fr;
        }

        .academic-year-table-header {
            padding: 15px;
        }

        .academic-year-table th,
        .academic-year-table td {
            padding: 11px 13px;
        }
    }

    @media (max-width: 450px) {
        .academic-year-header-icon {
            width: 42px;
            height: 42px;
            flex-basis: 42px;
        }

        .academic-year-title {
            font-size: 18px;
        }

        .academic-year-description {
            font-size: 9px;
        }

        .academic-year-table-card {
            border-radius: 11px;
        }

        .academic-year-action {
            width: 30px;
            padding: 0;
        }

        .academic-year-action span {
            display: none;
        }
    }
</style>


<div class="academic-year-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="academic-year-header">

        <div class="academic-year-header-left">

            <div class="academic-year-header-icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>

            <div>
                <h1 class="academic-year-title">
                    Tahun Ajaran
                </h1>

                <p class="academic-year-description">
                    Kelola tahun ajaran dan semester.
                </p>
            </div>

        </div>

        <a
            href="{{ route('admin.academic-years.create') }}"
            class="academic-year-add"
        >
            <i class="fa-solid fa-plus"></i>
            Tambah Tahun Ajaran
        </a>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    @php
        $totalYears = $years->count();

        $activeYears = $years
            ->where('is_active', true)
            ->count();

        $inactiveYears = $years
            ->where('is_active', false)
            ->count();
    @endphp


    <div class="academic-year-summary">

        {{-- TOTAL --}}
        <div class="academic-year-summary-card">

            <div class="academic-year-summary-icon">
                <i class="fa-solid fa-calendar"></i>
            </div>

            <div>
                <p class="academic-year-summary-label">
                    Total Tahun Ajaran
                </p>

                <p class="academic-year-summary-value">
                    {{ $totalYears }}
                </p>
            </div>

        </div>


        {{-- AKTIF --}}
        <div class="academic-year-summary-card">

            <div class="academic-year-summary-icon active">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <div>
                <p class="academic-year-summary-label">
                    Tahun Ajaran Aktif
                </p>

                <p class="academic-year-summary-value">
                    {{ $activeYears }}
                </p>
            </div>

        </div>


        {{-- TIDAK AKTIF --}}
        <div class="academic-year-summary-card">

            <div class="academic-year-summary-icon inactive">
                <i class="fa-solid fa-circle-minus"></i>
            </div>

            <div>
                <p class="academic-year-summary-label">
                    Tidak Aktif
                </p>

                <p class="academic-year-summary-value">
                    {{ $inactiveYears }}
                </p>
            </div>

        </div>

    </div>


    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <div class="academic-year-table-card">

        <div class="academic-year-table-header">

            <div>
                <h2 class="academic-year-table-title">
                    Daftar Tahun Ajaran
                </h2>

                <p class="academic-year-table-description">
                    Data tahun ajaran yang tersimpan dalam sistem.
                </p>
            </div>

        </div>


        <div class="academic-year-table-wrapper">

            @if ($years->count() > 0)

                <table class="academic-year-table">

                    <thead>
                        <tr>

                            <th>
                                TAHUN AJARAN
                            </th>

                            <th>
                                SEMESTER
                            </th>

                            <th>
                                STATUS
                            </th>

                            <th width="180">
                                AKSI
                            </th>

                        </tr>
                    </thead>


                    <tbody>

                        @foreach ($years as $year)

                            <tr>

                                {{-- TAHUN AJARAN --}}
                                <td>

                                    <div class="academic-year-name">

                                        <div class="academic-year-name-icon">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>

                                        <span class="academic-year-name-text">
                                            {{ $year->name }}
                                        </span>

                                    </div>

                                </td>


                                {{-- SEMESTER --}}
                                <td>

                                    <span class="academic-year-semester">

                                        <i class="fa-solid fa-book-open"></i>

                                        {{ ucfirst($year->semester) }}

                                    </span>

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    @if ($year->is_active)

                                        <span class="academic-year-status active">

                                            <span class="academic-year-status-dot"></span>

                                            Aktif

                                        </span>

                                    @else

                                        <span class="academic-year-status inactive">

                                            <span class="academic-year-status-dot"></span>

                                            Tidak Aktif

                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="academic-year-actions">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.academic-years.edit', $year) }}"
                                            class="academic-year-action edit"
                                            title="Edit tahun ajaran"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                            <span>Edit</span>
                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            method="POST"
                                            action="{{ route('admin.academic-years.destroy', $year) }}"
                                            class="academic-year-delete-form"
                                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus tahun ajaran {{ $year->name }}?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="academic-year-action delete"
                                                title="Hapus tahun ajaran"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                                <span>Hapus</span>
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

                <div class="academic-year-empty">

                    <div class="academic-year-empty-icon">
                        <i class="fa-solid fa-calendar-xmark"></i>
                    </div>

                    <h3 class="academic-year-empty-title">
                        Belum Ada Tahun Ajaran
                    </h3>

                    <p class="academic-year-empty-description">
                        Belum ada data tahun ajaran.
                        Silakan tambahkan data menggunakan tombol di atas.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection