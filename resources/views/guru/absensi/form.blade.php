@extends('layouts.app')

@section('title', 'Absensi - ' . $schedule->schoolClass->name)

@section('content')

<div class="teacher-attendance-page">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="teacher-attendance-header">

        <div class="teacher-attendance-heading">

            <div class="teacher-attendance-breadcrumb">
                <span>
                    <i class="fa-solid fa-chalkboard-user"></i>
                    Guru
                </span>

                <i class="fa-solid fa-chevron-right"></i>

                <span>Absensi</span>
            </div>

            <h1>Absensi Siswa</h1>

            <p>
                Kelola kehadiran siswa pada jadwal mengajar ini.
            </p>

        </div>

        <a href="{{ route('guru.jadwal.index') }}"
           class="teacher-attendance-back">

            <i class="fa-solid fa-arrow-left"></i>

            <span>Kembali ke Jadwal</span>

        </a>

    </div>


    {{-- =========================================================
        SCHEDULE SUMMARY
    ========================================================== --}}
    <div class="teacher-attendance-schedule">

        <div class="teacher-attendance-schedule-icon">
            <i class="fa-solid fa-chalkboard"></i>
        </div>

        <div class="teacher-attendance-schedule-main">

            <span class="teacher-attendance-label">
                KELAS
            </span>

            <strong>
                {{ $schedule->schoolClass->name }}
            </strong>

            <small>
                {{ $schedule->subject->name }}
            </small>

        </div>

        <div class="teacher-attendance-schedule-divider"></div>

        <div class="teacher-attendance-schedule-item">

            <div class="teacher-attendance-meta-icon">
                <i class="fa-regular fa-calendar"></i>
            </div>

            <div>
                <span>Tanggal</span>

                <strong id="tanggalDisplay">
                    {{ $date }}
                </strong>
            </div>

        </div>

        <div class="teacher-attendance-schedule-item">

            <div class="teacher-attendance-meta-icon">
                <i class="fa-regular fa-clock"></i>
            </div>

            <div>
                <span>Jam</span>

                <strong>
                    {{ $schedule->start_time }} - {{ $schedule->end_time }}
                </strong>
            </div>

        </div>

    </div>


    {{-- =========================================================
        DATE SELECTOR
    ========================================================== --}}
    <div class="teacher-attendance-date">

        <div class="teacher-attendance-date-left">

            <div class="teacher-attendance-date-icon">
                <i class="fa-regular fa-calendar-days"></i>
            </div>

            <div>
                <strong>Tanggal Absensi</strong>

                <span>
                    Pilih tanggal untuk mengisi atau mengubah absensi.
                </span>
            </div>

        </div>

        <form
            method="GET"
            action="{{ route('guru.absensi.show', $schedule) }}"
            class="teacher-attendance-date-form"
        >

            <label for="attendanceDate">
                Tanggal
            </label>

            <div class="teacher-attendance-date-input">

                <i class="fa-regular fa-calendar"></i>

                <input
                    id="attendanceDate"
                    type="date"
                    name="tanggal"
                    value="{{ $date }}"
                    onchange="this.form.submit()"
                >

            </div>

        </form>

    </div>


    {{-- =========================================================
        SESSION SUDAH ADA
    ========================================================== --}}
    @if ($session)

        @php
            $recap = $session->recap();
        @endphp


        {{-- STATUS --}}
        <div class="teacher-attendance-status saved">

            <div class="teacher-attendance-status-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <div class="teacher-attendance-status-content">

                <strong>Absensi sudah tersimpan</strong>

                <span>
                    Data kehadiran sudah tersimpan dan masih dapat diubah.
                </span>

            </div>

            <div class="teacher-attendance-status-badge">
                <i class="fa-solid fa-check"></i>
                Tersimpan
            </div>

        </div>


        {{-- =====================================================
            RECAP
        ====================================================== --}}
        <div class="teacher-attendance-recap">

            <div class="teacher-attendance-recap-card hadir">

                <div class="teacher-attendance-recap-icon">
                    <i class="fa-solid fa-user-check"></i>
                </div>

                <div class="teacher-attendance-recap-content">

                    <span>Hadir</span>

                    <strong>
                        {{ $recap['HADIR'] ?? 0 }}
                    </strong>

                    <small>siswa</small>

                </div>

                <div class="teacher-attendance-recap-indicator"></div>

            </div>


            <div class="teacher-attendance-recap-card izin">

                <div class="teacher-attendance-recap-icon">
                    <i class="fa-solid fa-file-circle-exclamation"></i>
                </div>

                <div class="teacher-attendance-recap-content">

                    <span>Izin</span>

                    <strong>
                        {{ $recap['IZIN'] ?? 0 }}
                    </strong>

                    <small>siswa</small>

                </div>

                <div class="teacher-attendance-recap-indicator"></div>

            </div>


            <div class="teacher-attendance-recap-card sakit">

                <div class="teacher-attendance-recap-icon">
                    <i class="fa-solid fa-bed"></i>
                </div>

                <div class="teacher-attendance-recap-content">

                    <span>Sakit</span>

                    <strong>
                        {{ $recap['SAKIT'] ?? 0 }}
                    </strong>

                    <small>siswa</small>

                </div>

                <div class="teacher-attendance-recap-indicator"></div>

            </div>


            <div class="teacher-attendance-recap-card alfa">

                <div class="teacher-attendance-recap-icon">
                    <i class="fa-solid fa-user-xmark"></i>
                </div>

                <div class="teacher-attendance-recap-content">

                    <span>Alfa</span>

                    <strong>
                        {{ $recap['ALFA'] ?? 0 }}
                    </strong>

                    <small>siswa</small>

                </div>

                <div class="teacher-attendance-recap-indicator"></div>

            </div>

        </div>


        {{-- =====================================================
            UPDATE FORM
        ====================================================== --}}
        <form
            method="POST"
            action="{{ route('guru.absensi.update', $session) }}"
            class="teacher-attendance-form"
        >

            @csrf
            @method('PUT')


            <div class="teacher-attendance-card">

                {{-- CARD HEADER --}}
                <div class="teacher-attendance-card-header">

                    <div class="teacher-attendance-card-title">

                        <div class="teacher-attendance-card-title-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div>

                            <h2>Daftar Siswa</h2>

                            <p>
                                Pilih status kehadiran setiap siswa.
                            </p>

                        </div>

                    </div>


                    <div class="teacher-attendance-card-actions">

                        <div class="teacher-attendance-student-count">

                            <i class="fa-solid fa-users"></i>

                            <span>
                                {{ $session->details->count() }}
                            </span>

                            Siswa

                        </div>


                        <button
                            type="button"
                            id="hadirkanSemuaBtn"
                            class="teacher-attendance-all-btn"
                            onclick="hadirkanSemua()"
                        >

                            <i class="fa-solid fa-user-check"></i>

                            <span>Hadirkan Semua</span>

                        </button>

                    </div>

                </div>


                {{-- TOOLBAR --}}
                <div class="teacher-attendance-toolbar">

                    <div class="teacher-attendance-search">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input
                            type="text"
                            id="searchStudent"
                            placeholder="Cari nama atau NIS siswa..."
                            autocomplete="off"
                        >

                        <button
                            type="button"
                            id="clearSearch"
                            class="teacher-attendance-clear-search"
                            aria-label="Hapus pencarian"
                        >
                            <i class="fa-solid fa-xmark"></i>
                        </button>

                    </div>

                </div>


                {{-- TABLE --}}
                <div class="teacher-attendance-table-wrapper">

                    <table class="teacher-attendance-table">

                        <thead>

                            <tr>

                                <th class="col-number">
                                    No
                                </th>

                                <th class="col-nis">
                                    NIS
                                </th>

                                <th class="col-student">
                                    Siswa
                                </th>

                                <th class="col-status">
                                    Status Kehadiran
                                </th>

                                <th class="col-note">
                                    Keterangan
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($session->details as $index => $detail)

                                <tr class="student-row">

                                    <td
                                        class="number-cell"
                                        data-label="No"
                                    >
                                        {{ $index + 1 }}
                                    </td>


                                    <td data-label="NIS">

                                        <span class="teacher-attendance-nis">
                                            {{ $detail->student->nis }}
                                        </span>

                                    </td>


                                    <td data-label="Siswa">

                                        <div class="teacher-attendance-student">

                                            <div class="teacher-attendance-avatar">
                                                {{ strtoupper(substr($detail->student->name, 0, 1)) }}
                                            </div>

                                            <div class="teacher-attendance-student-info">

                                                <strong>
                                                    {{ $detail->student->name }}
                                                </strong>

                                                <small>
                                                    {{ $detail->student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    <td data-label="Status">

                                        <div class="teacher-attendance-status-options">

                                            {{-- HADIR --}}
                                            <label class="teacher-attendance-status-option hadir">

                                                <input
                                                    type="radio"
                                                    name="statuses[{{ $detail->student_id }}]"
                                                    value="HADIR"
                                                    {{ $detail->status == 'HADIR' ? 'checked' : '' }}
                                                    onchange="updateRecap()"
                                                >

                                                <span class="teacher-attendance-status-box">

                                                    <span class="status-icon">
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>

                                                    <span class="status-text">
                                                        <strong>Hadir</strong>
                                                        <small>H</small>
                                                    </span>

                                                </span>

                                            </label>


                                            {{-- IZIN --}}
                                            <label class="teacher-attendance-status-option izin">

                                                <input
                                                    type="radio"
                                                    name="statuses[{{ $detail->student_id }}]"
                                                    value="IZIN"
                                                    {{ $detail->status == 'IZIN' ? 'checked' : '' }}
                                                    onchange="updateRecap()"
                                                >

                                                <span class="teacher-attendance-status-box">

                                                    <span class="status-icon">
                                                        <i class="fa-solid fa-file"></i>
                                                    </span>

                                                    <span class="status-text">
                                                        <strong>Izin</strong>
                                                        <small>I</small>
                                                    </span>

                                                </span>

                                            </label>


                                            {{-- SAKIT --}}
                                            <label class="teacher-attendance-status-option sakit">

                                                <input
                                                    type="radio"
                                                    name="statuses[{{ $detail->student_id }}]"
                                                    value="SAKIT"
                                                    {{ $detail->status == 'SAKIT' ? 'checked' : '' }}
                                                    onchange="updateRecap()"
                                                >

                                                <span class="teacher-attendance-status-box">

                                                    <span class="status-icon">
                                                        <i class="fa-solid fa-bed"></i>
                                                    </span>

                                                    <span class="status-text">
                                                        <strong>Sakit</strong>
                                                        <small>S</small>
                                                    </span>

                                                </span>

                                            </label>


                                            {{-- ALFA --}}
                                            <label class="teacher-attendance-status-option alfa">

                                                <input
                                                    type="radio"
                                                    name="statuses[{{ $detail->student_id }}]"
                                                    value="ALFA"
                                                    {{ $detail->status == 'ALFA' ? 'checked' : '' }}
                                                    onchange="updateRecap()"
                                                >

                                                <span class="teacher-attendance-status-box">

                                                    <span class="status-icon">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </span>

                                                    <span class="status-text">
                                                        <strong>Alfa</strong>
                                                        <small>A</small>
                                                    </span>

                                                </span>

                                            </label>

                                        </div>

                                    </td>


                                    <td data-label="Keterangan">

                                        <input
                                            class="teacher-attendance-note"
                                            type="text"
                                            name="keterangan[{{ $detail->student_id }}]"
                                            value="{{ $detail->keterangan }}"
                                            placeholder="Tambahkan keterangan..."
                                        >

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- FOOTER --}}
                <div class="teacher-attendance-footer">

                    <div
                        class="teacher-attendance-completion"
                        id="completionText"
                    >

                        <i class="fa-solid fa-circle-info"></i>

                        <span>
                            Pastikan semua siswa sudah memiliki status.
                        </span>

                    </div>


                    <button
                        class="teacher-attendance-save"
                        type="submit"
                    >

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </form>


    {{-- =========================================================
        SESSION BELUM ADA
    ========================================================== --}}
    @else


        {{-- STATUS --}}
        <div class="teacher-attendance-status new">

            <div class="teacher-attendance-status-icon">
                <i class="fa-solid fa-clipboard-check"></i>
            </div>

            <div class="teacher-attendance-status-content">

                <strong>Belum ada absensi</strong>

                <span>
                    Silakan tentukan status kehadiran setiap siswa.
                </span>

            </div>

            <div class="teacher-attendance-status-badge">
                <i class="fa-regular fa-clock"></i>
                Belum Diisi
            </div>

        </div>


        {{-- =====================================================
            LIVE RECAP
        ====================================================== --}}
        <div class="teacher-attendance-recap">

            <div class="teacher-attendance-recap-card hadir">

                <div class="teacher-attendance-recap-icon">
                    <i class="fa-solid fa-user-check"></i>
                </div>

                <div class="teacher-attendance-recap-content">

                    <span>Hadir</span>

                    <strong id="countHadir">
                        0
                    </strong>

                    <small>siswa</small>

                </div>

                <div class="teacher-attendance-recap-indicator"></div>

            </div>


            <div class="teacher-attendance-recap-card izin">

                <div class="teacher-attendance-recap-icon">
                    <i class="fa-solid fa-file-circle-exclamation"></i>
                </div>

                <div class="teacher-attendance-recap-content">

                    <span>Izin</span>

                    <strong id="countIzin">
                        0
                    </strong>

                    <small>siswa</small>

                </div>

                <div class="teacher-attendance-recap-indicator"></div>

            </div>


            <div class="teacher-attendance-recap-card sakit">

                <div class="teacher-attendance-recap-icon">
                    <i class="fa-solid fa-bed"></i>
                </div>

                <div class="teacher-attendance-recap-content">

                    <span>Sakit</span>

                    <strong id="countSakit">
                        0
                    </strong>

                    <small>siswa</small>

                </div>

                <div class="teacher-attendance-recap-indicator"></div>

            </div>


            <div class="teacher-attendance-recap-card alfa">

                <div class="teacher-attendance-recap-icon">
                    <i class="fa-solid fa-user-xmark"></i>
                </div>

                <div class="teacher-attendance-recap-content">

                    <span>Alfa</span>

                    <strong id="countAlfa">
                        0
                    </strong>

                    <small>siswa</small>

                </div>

                <div class="teacher-attendance-recap-indicator"></div>

            </div>

        </div>


        {{-- =====================================================
            NEW ATTENDANCE FORM
        ====================================================== --}}
        <form
            method="POST"
            action="{{ route('guru.absensi.store', $schedule) }}"
            id="attendanceForm"
            class="teacher-attendance-form"
        >

            @csrf

            <input
                type="hidden"
                name="tanggal"
                value="{{ $date }}"
            >


            <div class="teacher-attendance-card">

                {{-- HEADER --}}
                <div class="teacher-attendance-card-header">

                    <div class="teacher-attendance-card-title">

                        <div class="teacher-attendance-card-title-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div>

                            <h2>Daftar Siswa</h2>

                            <p>
                                Pilih status kehadiran setiap siswa.
                            </p>

                        </div>

                    </div>


                    <div class="teacher-attendance-card-actions">

                        <div class="teacher-attendance-student-count">

                            <i class="fa-solid fa-users"></i>

                            <span>
                                {{ $students->count() }}
                            </span>

                            Siswa

                        </div>


                        <button
                            type="button"
                            id="hadirkanSemuaBtn"
                            class="teacher-attendance-all-btn"
                            onclick="hadirkanSemua()"
                        >

                            <i class="fa-solid fa-user-check"></i>

                            <span>Hadirkan Semua</span>

                        </button>

                    </div>

                </div>


                {{-- TOOLBAR --}}
                <div class="teacher-attendance-toolbar">

                    <div class="teacher-attendance-search">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input
                            type="text"
                            id="searchStudent"
                            placeholder="Cari nama atau NIS siswa..."
                            autocomplete="off"
                        >

                        <button
                            type="button"
                            id="clearSearch"
                            class="teacher-attendance-clear-search"
                            aria-label="Hapus pencarian"
                        >

                            <i class="fa-solid fa-xmark"></i>

                        </button>

                    </div>

                </div>


                {{-- TABLE --}}
                <div class="teacher-attendance-table-wrapper">

                    <table class="teacher-attendance-table">

                        <thead>

                            <tr>

                                <th class="col-number">
                                    No
                                </th>

                                <th class="col-nis">
                                    NIS
                                </th>

                                <th class="col-student">
                                    Siswa
                                </th>

                                <th class="col-status">
                                    Status Kehadiran
                                </th>

                                <th class="col-note">
                                    Keterangan
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($students as $index => $student)

                                <tr class="student-row">

                                    <td
                                        class="number-cell"
                                        data-label="No"
                                    >
                                        {{ $index + 1 }}
                                    </td>


                                    <td data-label="NIS">

                                        <span class="teacher-attendance-nis">
                                            {{ $student->nis }}
                                        </span>

                                    </td>


                                    <td data-label="Siswa">

                                        <div class="teacher-attendance-student">

                                            <div class="teacher-attendance-avatar">
                                                {{ strtoupper(substr($student->name, 0, 1)) }}
                                            </div>

                                            <div class="teacher-attendance-student-info">

                                                <strong>
                                                    {{ $student->name }}
                                                </strong>

                                                <small>
                                                    {{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    <td data-label="Status">

                                        <div class="teacher-attendance-status-options">

                                            {{-- HADIR --}}
                                            <label class="teacher-attendance-status-option hadir">

                                                <input
                                                    type="radio"
                                                    name="statuses[{{ $student->id }}]"
                                                    value="HADIR"
                                                    onchange="updateRecap()"
                                                    required
                                                >

                                                <span class="teacher-attendance-status-box">

                                                    <span class="status-icon">
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>

                                                    <span class="status-text">
                                                        <strong>Hadir</strong>
                                                        <small>H</small>
                                                    </span>

                                                </span>

                                            </label>


                                            {{-- IZIN --}}
                                            <label class="teacher-attendance-status-option izin">

                                                <input
                                                    type="radio"
                                                    name="statuses[{{ $student->id }}]"
                                                    value="IZIN"
                                                    onchange="updateRecap()"
                                                >

                                                <span class="teacher-attendance-status-box">

                                                    <span class="status-icon">
                                                        <i class="fa-solid fa-file"></i>
                                                    </span>

                                                    <span class="status-text">
                                                        <strong>Izin</strong>
                                                        <small>I</small>
                                                    </span>

                                                </span>

                                            </label>


                                            {{-- SAKIT --}}
                                            <label class="teacher-attendance-status-option sakit">

                                                <input
                                                    type="radio"
                                                    name="statuses[{{ $student->id }}]"
                                                    value="SAKIT"
                                                    onchange="updateRecap()"
                                                >

                                                <span class="teacher-attendance-status-box">

                                                    <span class="status-icon">
                                                        <i class="fa-solid fa-bed"></i>
                                                    </span>

                                                    <span class="status-text">
                                                        <strong>Sakit</strong>
                                                        <small>S</small>
                                                    </span>

                                                </span>

                                            </label>


                                            {{-- ALFA --}}
                                            <label class="teacher-attendance-status-option alfa">

                                                <input
                                                    type="radio"
                                                    name="statuses[{{ $student->id }}]"
                                                    value="ALFA"
                                                    onchange="updateRecap()"
                                                >

                                                <span class="teacher-attendance-status-box">

                                                    <span class="status-icon">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </span>

                                                    <span class="status-text">
                                                        <strong>Alfa</strong>
                                                        <small>A</small>
                                                    </span>

                                                </span>

                                            </label>

                                        </div>

                                    </td>


                                    <td data-label="Keterangan">

                                        <input
                                            class="teacher-attendance-note"
                                            type="text"
                                            name="keterangan[{{ $student->id }}]"
                                            placeholder="Tambahkan keterangan..."
                                        >

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- FOOTER --}}
                <div class="teacher-attendance-footer">

                    <div
                        class="teacher-attendance-completion"
                        id="completionText"
                    >

                        <i class="fa-solid fa-circle-info"></i>

                        <span>
                            Belum semua siswa memiliki status.
                        </span>

                    </div>


                    <button
                        class="teacher-attendance-save"
                        type="submit"
                        id="saveAttendance"
                    >

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Absensi

                    </button>

                </div>

            </div>

        </form>

    @endif

</div>


{{-- =========================================================
    SWEETALERT2
========================================================= --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<style>

/* =========================================================
   BASE
========================================================= */

.teacher-attendance-page {
    width: 100%;
    max-width: 1440px;
    margin: 0 auto;
    padding-bottom: 35px;
    color: #334155;
}


/* =========================================================
   HEADER
========================================================= */

.teacher-attendance-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 20px;
}

.teacher-attendance-breadcrumb {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 8px;
    color: #94a3b8;
    font-size: 11px;
    font-weight: 600;
}

.teacher-attendance-breadcrumb span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.teacher-attendance-breadcrumb span:first-child {
    color: #0788c9;
}

.teacher-attendance-breadcrumb > i {
    color: #cbd5e1;
    font-size: 8px;
}

.teacher-attendance-heading h1 {
    margin: 0;
    color: #0f172a;
    font-size: 28px;
    font-weight: 800;
    letter-spacing: -.6px;
}

.teacher-attendance-heading p {
    margin: 5px 0 0;
    color: #64748b;
    font-size: 12px;
}

.teacher-attendance-back {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 40px;
    padding: 0 14px;
    border: 1px solid #dbeffc;
    border-radius: 10px;
    background: #fff;
    color: #475569;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none;
    transition: .2s ease;
}

.teacher-attendance-back:hover {
    color: #0788c9;
    border-color: #9ed8f2;
    background: #f8fcff;
    transform: translateY(-1px);
}


/* =========================================================
   SCHEDULE
========================================================= */

.teacher-attendance-schedule {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px 20px;
    margin-bottom: 14px;
    border: 1px solid #dbeffc;
    border-radius: 16px;
    background:
        radial-gradient(
            circle at 100% 0%,
            rgba(7,136,201,.08),
            transparent 30%
        ),
        linear-gradient(135deg,#fff,#f8fcff);
    box-shadow: 0 8px 25px rgba(7,136,201,.045);
}

.teacher-attendance-schedule-icon {
    width: 50px;
    height: 50px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: #e8f6fd;
    color: #0788c9;
    font-size: 19px;
}

.teacher-attendance-schedule-main {
    min-width: 190px;
}

.teacher-attendance-label {
    display: block;
    margin-bottom: 3px;
    color: #94a3b8;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: .9px;
}

.teacher-attendance-schedule-main strong {
    display: block;
    color: #0f172a;
    font-size: 16px;
    font-weight: 800;
}

.teacher-attendance-schedule-main small {
    display: block;
    margin-top: 3px;
    color: #64748b;
    font-size: 11px;
}

.teacher-attendance-schedule-divider {
    width: 1px;
    height: 40px;
    margin: 0 10px;
    background: #e2e8f0;
}

.teacher-attendance-schedule-item {
    display: flex;
    align-items: center;
    gap: 9px;
    min-width: 155px;
}

.teacher-attendance-meta-icon {
    width: 35px;
    height: 35px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e2f2fa;
    border-radius: 10px;
    background: #fff;
    color: #0788c9;
}

.teacher-attendance-schedule-item span {
    display: block;
    margin-bottom: 2px;
    color: #94a3b8;
    font-size: 9px;
}

.teacher-attendance-schedule-item strong {
    display: block;
    color: #334155;
    font-size: 11px;
    font-weight: 700;
}


/* =========================================================
   DATE
========================================================= */

.teacher-attendance-date {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 14px 17px;
    margin-bottom: 15px;
    border: 1px solid #e2e8f0;
    border-radius: 13px;
    background: #fff;
}

.teacher-attendance-date-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.teacher-attendance-date-icon {
    width: 39px;
    height: 39px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #e8f6fd;
    color: #0788c9;
}

.teacher-attendance-date-left strong {
    display: block;
    color: #334155;
    font-size: 11px;
    font-weight: 800;
}

.teacher-attendance-date-left span {
    display: block;
    margin-top: 3px;
    color: #94a3b8;
    font-size: 10px;
}

.teacher-attendance-date-form {
    display: flex;
    align-items: center;
    gap: 9px;
}

.teacher-attendance-date-form label {
    color: #64748b;
    font-size: 10px;
    font-weight: 700;
}

.teacher-attendance-date-input {
    position: relative;
}

.teacher-attendance-date-input > i {
    position: absolute;
    top: 50%;
    left: 11px;
    z-index: 1;
    color: #0788c9;
    font-size: 11px;
    transform: translateY(-50%);
    pointer-events: none;
}

.teacher-attendance-date-input input {
    width: 150px;
    height: 37px;
    padding: 0 10px 0 31px;
    border: 1px solid #dbe3ec;
    border-radius: 9px;
    outline: none;
    background: #fff;
    color: #334155;
    font-size: 11px;
    font-weight: 600;
    transition: .2s ease;
}

.teacher-attendance-date-input input:focus {
    border-color: #0788c9;
    box-shadow: 0 0 0 3px rgba(7,136,201,.08);
}


/* =========================================================
   STATUS ALERT
========================================================= */

.teacher-attendance-status {
    position: relative;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    margin-bottom: 15px;
    overflow: hidden;
    border-radius: 14px;
}

.teacher-attendance-status::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
}

.teacher-attendance-status.saved {
    border: 1px solid #cceedd;
    background: linear-gradient(135deg,#f7fef9,#f1fbf5);
}

.teacher-attendance-status.saved::before {
    background: #16a34a;
}

.teacher-attendance-status.new {
    border: 1px solid #dbeffc;
    background: linear-gradient(135deg,#f9fdff,#f2faff);
}

.teacher-attendance-status.new::before {
    background: #0788c9;
}

.teacher-attendance-status-icon {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    font-size: 14px;
}

.saved .teacher-attendance-status-icon {
    background: #dcfce7;
    color: #16a34a;
}

.new .teacher-attendance-status-icon {
    background: #e8f6fd;
    color: #0788c9;
}

.teacher-attendance-status-content {
    flex: 1;
    min-width: 0;
}

.teacher-attendance-status-content strong {
    display: block;
    color: #334155;
    font-size: 11px;
    font-weight: 800;
}

.teacher-attendance-status-content span {
    display: block;
    margin-top: 3px;
    color: #94a3b8;
    font-size: 10px;
}

.teacher-attendance-status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 7px 10px;
    border-radius: 8px;
    font-size: 9px;
    font-weight: 800;
    white-space: nowrap;
}

.saved .teacher-attendance-status-badge {
    background: #dcfce7;
    color: #15803d;
}

.new .teacher-attendance-status-badge {
    background: #e8f6fd;
    color: #0676ad;
}


/* =========================================================
   RECAP
========================================================= */

.teacher-attendance-recap {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 11px;
    margin-bottom: 15px;
}

.teacher-attendance-recap-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 11px;
    min-height: 78px;
    padding: 13px 15px;
    overflow: hidden;
    border: 1px solid #e5eaf0;
    border-radius: 14px;
    background: #fff;
    transition: .2s ease;
}

.teacher-attendance-recap-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 7px 20px rgba(15,23,42,.05);
}

.teacher-attendance-recap-icon {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    font-size: 14px;
}

.teacher-attendance-recap-content {
    min-width: 0;
}

.teacher-attendance-recap-content span {
    display: block;
    color: #94a3b8;
    font-size: 9px;
    font-weight: 700;
}

.teacher-attendance-recap-content strong {
    display: inline-block;
    margin-top: 2px;
    color: #1e293b;
    font-size: 21px;
    line-height: 1;
    font-weight: 800;
}

.teacher-attendance-recap-content small {
    margin-left: 3px;
    color: #94a3b8;
    font-size: 8px;
}

.teacher-attendance-recap-indicator {
    position: absolute;
    right: -15px;
    bottom: -15px;
    width: 55px;
    height: 55px;
    border-radius: 50%;
    opacity: .08;
}

.teacher-attendance-recap-card.hadir
.teacher-attendance-recap-icon {
    background: #ecfdf5;
    color: #059669;
}

.teacher-attendance-recap-card.hadir
.teacher-attendance-recap-indicator {
    background: #10b981;
}

.teacher-attendance-recap-card.izin
.teacher-attendance-recap-icon {
    background: #fffbeb;
    color: #d97706;
}

.teacher-attendance-recap-card.izin
.teacher-attendance-recap-indicator {
    background: #f59e0b;
}

.teacher-attendance-recap-card.sakit
.teacher-attendance-recap-icon {
    background: #e8f6fd;
    color: #0788c9;
}

.teacher-attendance-recap-card.sakit
.teacher-attendance-recap-indicator {
    background: #0788c9;
}

.teacher-attendance-recap-card.alfa
.teacher-attendance-recap-icon {
    background: #fef2f2;
    color: #dc2626;
}

.teacher-attendance-recap-card.alfa
.teacher-attendance-recap-indicator {
    background: #ef4444;
}


/* =========================================================
   MAIN CARD
========================================================= */

.teacher-attendance-card {
    overflow: hidden;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    background: #fff;
    box-shadow: 0 7px 25px rgba(15,23,42,.035);
}


/* =========================================================
   CARD HEADER
========================================================= */

.teacher-attendance-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 17px 19px;
    border-bottom: 1px solid #edf2f7;
}

.teacher-attendance-card-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.teacher-attendance-card-title-icon {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #e8f6fd;
    color: #0788c9;
    font-size: 13px;
}

.teacher-attendance-card-title h2 {
    margin: 0;
    color: #1e293b;
    font-size: 14px;
    font-weight: 800;
}

.teacher-attendance-card-title p {
    margin: 3px 0 0;
    color: #94a3b8;
    font-size: 9px;
}

.teacher-attendance-card-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}

.teacher-attendance-student-count {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    height: 37px;
    padding: 0 11px;
    border-radius: 9px;
    background: #f8fafc;
    color: #64748b;
    font-size: 10px;
    font-weight: 700;
}

.teacher-attendance-student-count i {
    color: #0788c9;
}

.teacher-attendance-student-count span {
    color: #334155;
    font-weight: 800;
}

.teacher-attendance-all-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    height: 37px;
    padding: 0 13px;
    border: 0;
    border-radius: 9px;
    background: #16a34a;
    color: #fff;
    font-size: 10px;
    font-weight: 800;
    cursor: pointer;
    transition: .2s ease;
}

.teacher-attendance-all-btn:hover {
    background: #15803d;
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(22,163,74,.18);
}

.teacher-attendance-all-btn:active {
    transform: scale(.98);
}


/* =========================================================
   SEARCH
========================================================= */

.teacher-attendance-toolbar {
    display: flex;
    align-items: center;
    padding: 13px 19px;
    background: #fff;
}

.teacher-attendance-search {
    position: relative;
    width: 100%;
}

.teacher-attendance-search > i {
    position: absolute;
    top: 50%;
    left: 13px;
    color: #94a3b8;
    font-size: 11px;
    transform: translateY(-50%);
    pointer-events: none;
}

.teacher-attendance-search input {
    width: 100%;
    height: 39px;
    padding: 0 40px 0 35px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    outline: none;
    background: #f8fafc;
    color: #334155;
    font-size: 10px;
    transition: .2s ease;
}

.teacher-attendance-search input:focus {
    border-color: #0788c9;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(7,136,201,.07);
}

.teacher-attendance-search input::placeholder {
    color: #a8b3c2;
}

.teacher-attendance-clear-search {
    position: absolute;
    top: 50%;
    right: 9px;
    width: 25px;
    height: 25px;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 0;
    border: 0;
    border-radius: 7px;
    background: #e2e8f0;
    color: #64748b;
    cursor: pointer;
    transform: translateY(-50%);
}


/* =========================================================
   TABLE
========================================================= */

.teacher-attendance-table-wrapper {
    width: 100%;
}

.teacher-attendance-table {
    width: 100%;
    border-collapse: collapse;
}

.teacher-attendance-table thead th {
    height: 42px;
    padding: 0 13px;
    border-top: 1px solid #edf2f7;
    border-bottom: 1px solid #e2e8f0;
    background: #f8fafc;
    color: #64748b;
    font-size: 8px;
    font-weight: 800;
    text-align: left;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.teacher-attendance-table tbody td {
    padding: 12px 13px;
    border-bottom: 1px solid #f1f5f9;
    color: #475569;
    font-size: 10px;
    vertical-align: middle;
}

.teacher-attendance-table tbody tr {
    transition: background .15s ease;
}

.teacher-attendance-table tbody tr:hover {
    background: #fbfdff;
}

.teacher-attendance-table tbody tr:last-child td {
    border-bottom: 0;
}

.col-number {
    width: 50px;
    text-align: center !important;
}

.col-nis {
    width: 115px;
}

.col-student {
    min-width: 220px;
}

.col-status {
    width: 350px;
}

.col-note {
    width: 250px;
}

.number-cell {
    color: #a0aec0 !important;
    text-align: center;
    font-size: 9px !important;
    font-weight: 700;
}


/* =========================================================
   NIS
========================================================= */

.teacher-attendance-nis {
    display: inline-flex;
    padding: 6px 8px;
    border: 1px solid #edf2f7;
    border-radius: 7px;
    background: #f8fafc;
    color: #64748b;
    font-family: monospace;
    font-size: 9px;
    font-weight: 700;
}


/* =========================================================
   STUDENT
========================================================= */

.teacher-attendance-student {
    display: flex;
    align-items: center;
    gap: 9px;
}

.teacher-attendance-avatar {
    width: 34px;
    height: 34px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #d7effa;
    border-radius: 10px;
    background: linear-gradient(135deg,#e8f6fd,#d7effa);
    color: #0676ad;
    font-size: 10px;
    font-weight: 800;
}

.teacher-attendance-student-info {
    min-width: 0;
}

.teacher-attendance-student-info strong {
    display: block;
    max-width: 220px;
    overflow: hidden;
    color: #334155;
    font-size: 10px;
    font-weight: 800;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.teacher-attendance-student-info small {
    display: block;
    margin-top: 2px;
    color: #94a3b8;
    font-size: 8px;
}


/* =========================================================
   STATUS OPTIONS — MODERN
========================================================= */

.teacher-attendance-status-options {
    display: flex;
    align-items: center;
    gap: 6px;
}

.teacher-attendance-status-option {
    display: block;
    cursor: pointer;
}

.teacher-attendance-status-option input {
    position: absolute;
    width: 1px;
    height: 1px;
    opacity: 0;
    pointer-events: none;
}

.teacher-attendance-status-box {
    width: 72px;
    height: 47px;
    display: flex;
    align-items: center;
    gap: 7px;
    box-sizing: border-box;
    padding: 5px 8px;
    border: 1px solid #e2e8f0;
    border-radius: 11px;
    background: #fff;
    transition: .2s ease;
}

.teacher-attendance-status-option:hover
.teacher-attendance-status-box {
    border-color: #cbd5e1;
    transform: translateY(-1px);
}

.status-icon {
    width: 26px;
    height: 26px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: #f8fafc;
    color: #94a3b8;
    font-size: 10px;
    transition: .2s ease;
}

.status-text {
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.status-text strong {
    color: #64748b;
    font-size: 9px;
    font-weight: 800;
    line-height: 1;
}

.status-text small {
    margin-top: 3px;
    color: #b0bac7;
    font-size: 7px;
    font-weight: 700;
}


/* =========================================================
   HADIR
========================================================= */

.teacher-attendance-status-option.hadir input:checked
+ .teacher-attendance-status-box {
    border-color: #6ee7b7;
    background: #ecfdf5;
    box-shadow: 0 3px 10px rgba(16,185,129,.10);
}

.teacher-attendance-status-option.hadir input:checked
+ .teacher-attendance-status-box .status-icon {
    background: #10b981;
    color: #fff;
}

.teacher-attendance-status-option.hadir input:checked
+ .teacher-attendance-status-box .status-text strong,
.teacher-attendance-status-option.hadir input:checked
+ .teacher-attendance-status-box .status-text small {
    color: #059669;
}


/* =========================================================
   IZIN
========================================================= */

.teacher-attendance-status-option.izin input:checked
+ .teacher-attendance-status-box {
    border-color: #fcd34d;
    background: #fffbeb;
    box-shadow: 0 3px 10px rgba(245,158,11,.10);
}

.teacher-attendance-status-option.izin input:checked
+ .teacher-attendance-status-box .status-icon {
    background: #f59e0b;
    color: #fff;
}

.teacher-attendance-status-option.izin input:checked
+ .teacher-attendance-status-box .status-text strong,
.teacher-attendance-status-option.izin input:checked
+ .teacher-attendance-status-box .status-text small {
    color: #d97706;
}


/* =========================================================
   SAKIT
========================================================= */

.teacher-attendance-status-option.sakit input:checked
+ .teacher-attendance-status-box {
    border-color: #7dd3fc;
    background: #e8f6fd;
    box-shadow: 0 3px 10px rgba(7,136,201,.10);
}

.teacher-attendance-status-option.sakit input:checked
+ .teacher-attendance-status-box .status-icon {
    background: #0788c9;
    color: #fff;
}

.teacher-attendance-status-option.sakit input:checked
+ .teacher-attendance-status-box .status-text strong,
.teacher-attendance-status-option.sakit input:checked
+ .teacher-attendance-status-box .status-text small {
    color: #0676ad;
}


/* =========================================================
   ALFA
========================================================= */

.teacher-attendance-status-option.alfa input:checked
+ .teacher-attendance-status-box {
    border-color: #fca5a5;
    background: #fef2f2;
    box-shadow: 0 3px 10px rgba(239,68,68,.10);
}

.teacher-attendance-status-option.alfa input:checked
+ .teacher-attendance-status-box .status-icon {
    background: #ef4444;
    color: #fff;
}

.teacher-attendance-status-option.alfa input:checked
+ .teacher-attendance-status-box .status-text strong,
.teacher-attendance-status-option.alfa input:checked
+ .teacher-attendance-status-box .status-text small {
    color: #dc2626;
}


/* =========================================================
   NOTE
========================================================= */

.teacher-attendance-note {
    width: 100%;
    height: 36px;
    box-sizing: border-box;
    padding: 0 10px;
    border: 1px solid #e2e8f0;
    border-radius: 9px;
    outline: none;
    background: #fff;
    color: #334155;
    font-size: 9px;
    transition: .2s ease;
}

.teacher-attendance-note::placeholder {
    color: #a8b3c2;
}

.teacher-attendance-note:focus {
    border-color: #0788c9;
    box-shadow: 0 0 0 3px rgba(7,136,201,.06);
}


/* =========================================================
   FOOTER
========================================================= */

.teacher-attendance-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 15px 19px;
    border-top: 1px solid #e2e8f0;
    background: #fff;
}

.teacher-attendance-completion {
    display: flex;
    align-items: center;
    gap: 7px;
    min-width: 0;
    color: #94a3b8;
    font-size: 9px;
}

.teacher-attendance-completion i {
    flex-shrink: 0;
    color: #0788c9;
}

.teacher-attendance-completion.complete {
    color: #15803d;
}

.teacher-attendance-completion.complete i {
    color: #16a34a;
}

.teacher-attendance-save {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    min-width: 160px;
    height: 40px;
    padding: 0 16px;
    border: 0;
    border-radius: 10px;
    background: linear-gradient(135deg,#0788c9,#0676ad);
    color: #fff;
    font-size: 10px;
    font-weight: 800;
    cursor: pointer;
    transition: .2s ease;
}

.teacher-attendance-save:hover {
    transform: translateY(-1px);
    box-shadow: 0 7px 18px rgba(7,136,201,.20);
}


/* =========================================================
   SWEETALERT CUSTOM
========================================================= */

.teacher-attendance-swal {
    border-radius: 20px !important;
    padding: 25px !important;
}

.teacher-attendance-swal-title {
    color: #1e293b !important;
    font-size: 18px !important;
    font-weight: 800 !important;
}

.teacher-attendance-swal-text {
    color: #64748b !important;
    font-size: 12px !important;
}


/* =========================================================
   RESPONSIVE TABLE → MOBILE CARD
========================================================= */

@media (max-width: 1000px) {

    .teacher-attendance-schedule {
        flex-wrap: wrap;
    }

    .teacher-attendance-schedule-divider {
        display: none;
    }

    .teacher-attendance-schedule-item {
        min-width: auto;
    }

    .teacher-attendance-recap {
        grid-template-columns: repeat(2,1fr);
    }

    .teacher-attendance-status-box {
        width: 65px;
    }

}


@media (max-width: 750px) {

    .teacher-attendance-page {
        padding-bottom: 20px;
    }

    .teacher-attendance-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .teacher-attendance-back {
        width: 100%;
    }

    .teacher-attendance-schedule {
        padding: 15px;
    }

    .teacher-attendance-schedule-main {
        flex: 1;
        min-width: 0;
    }

    .teacher-attendance-schedule-item {
        flex: 1;
    }

    .teacher-attendance-date {
        align-items: flex-start;
        flex-direction: column;
    }

    .teacher-attendance-date-form {
        width: 100%;
        align-items: flex-start;
        flex-direction: column;
    }

    .teacher-attendance-date-input,
    .teacher-attendance-date-input input {
        width: 100%;
        box-sizing: border-box;
    }

    .teacher-attendance-card-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .teacher-attendance-card-actions {
        width: 100%;
    }

    .teacher-attendance-student-count,
    .teacher-attendance-all-btn {
        flex: 1;
    }

    .teacher-attendance-footer {
        align-items: stretch;
        flex-direction: column;
    }

    .teacher-attendance-completion {
        justify-content: center;
    }

    .teacher-attendance-save {
        width: 100%;
    }


    /* ---------------------------------------------------------
       MOBILE TABLE
    --------------------------------------------------------- */

    .teacher-attendance-table-wrapper {
        padding: 0 12px 12px;
        overflow: visible;
        background: #f8fafc;
    }

    .teacher-attendance-table,
    .teacher-attendance-table tbody {
        display: block;
        width: 100%;
    }

    .teacher-attendance-table thead {
        display: none;
    }

    .teacher-attendance-table tbody {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .teacher-attendance-table tbody tr.student-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        padding: 14px;
        border: 1px solid #e5eaf0;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(15,23,42,.035);
    }

    .teacher-attendance-table tbody tr.student-row:hover {
        background: #fff;
    }

    .teacher-attendance-table tbody td {
        display: flex;
        align-items: center;
        width: auto;
        min-width: 0;
        padding: 8px 0;
        border: 0;
        font-size: 10px;
    }

    .teacher-attendance-table tbody td::before {
        content: attr(data-label);
        display: block;
        width: 55px;
        flex-shrink: 0;
        color: #94a3b8;
        font-size: 8px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .teacher-attendance-table tbody td:nth-child(1) {
        grid-column: 1;
        grid-row: 1;
    }

    .teacher-attendance-table tbody td:nth-child(2) {
        grid-column: 2;
        grid-row: 1;
        justify-content: flex-end;
    }

    .teacher-attendance-table tbody td:nth-child(3) {
        grid-column: 1 / -1;
        grid-row: 2;
        padding-top: 12px;
        padding-bottom: 12px;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
    }

    .teacher-attendance-table tbody td:nth-child(4) {
        grid-column: 1 / -1;
        grid-row: 3;
        display: block;
        padding: 12px 0;
    }

    .teacher-attendance-table tbody td:nth-child(4)::before {
        margin-bottom: 8px;
    }

    .teacher-attendance-table tbody td:nth-child(5) {
        grid-column: 1 / -1;
        grid-row: 4;
        display: block;
        padding-bottom: 0;
    }

    .teacher-attendance-table tbody td:nth-child(5)::before {
        margin-bottom: 7px;
    }

    .number-cell {
        justify-content: flex-start;
        text-align: left !important;
    }

    .teacher-attendance-nis {
        font-size: 8px;
    }

    .teacher-attendance-student-info strong {
        max-width: calc(100vw - 120px);
        font-size: 10px;
    }

    .teacher-attendance-status-options {
        display: grid;
        grid-template-columns: repeat(4,1fr);
        width: 100%;
        gap: 7px;
    }

    .teacher-attendance-status-option {
        width: 100%;
    }

    .teacher-attendance-status-box {
        width: 100%;
        height: 52px;
        justify-content: center;
        padding: 5px;
        gap: 5px;
        border-radius: 10px;
    }

    .status-icon {
        width: 25px;
        height: 25px;
    }

    .status-text {
        align-items: center;
    }

    .status-text strong {
        font-size: 8px;
    }

    .status-text small {
        display: none;
    }

    .teacher-attendance-note {
        height: 39px;
        font-size: 9px;
    }

}


/* =========================================================
   MOBILE SMALL
========================================================= */

@media (max-width: 500px) {

    .teacher-attendance-heading h1 {
        font-size: 23px;
    }

    .teacher-attendance-heading p {
        font-size: 11px;
    }

    .teacher-attendance-schedule {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 10px;
    }

    .teacher-attendance-schedule-icon {
        grid-row: span 2;
    }

    .teacher-attendance-schedule-main {
        min-width: 0;
    }

    .teacher-attendance-schedule-item {
        min-width: 0;
    }

    .teacher-attendance-schedule-item:last-child {
        grid-column: 2;
    }

    .teacher-attendance-status-badge {
        display: none;
    }

    .teacher-attendance-status {
        align-items: flex-start;
    }

    .teacher-attendance-toolbar {
        padding: 11px 13px;
    }

    .teacher-attendance-card-header {
        padding: 14px;
    }

    .teacher-attendance-card-actions {
        flex-direction: column;
    }

    .teacher-attendance-student-count,
    .teacher-attendance-all-btn {
        width: 100%;
        flex: none;
    }

    .teacher-attendance-recap {
        gap: 7px;
    }

    .teacher-attendance-recap-card {
        min-height: 68px;
        padding: 10px;
    }

    .teacher-attendance-recap-icon {
        width: 33px;
        height: 33px;
        font-size: 11px;
    }

    .teacher-attendance-recap-content strong {
        font-size: 18px;
    }

    .teacher-attendance-table-wrapper {
        padding: 0 8px 8px;
    }

    .teacher-attendance-table tbody tr.student-row {
        padding: 12px;
        border-radius: 13px;
    }

    .teacher-attendance-status-options {
        gap: 5px;
    }

    .teacher-attendance-status-box {
        height: 48px;
        flex-direction: column;
        gap: 3px;
    }

    .status-icon {
        width: 23px;
        height: 23px;
    }

    .status-text strong {
        font-size: 7px;
    }

}


/* =========================================================
   VERY SMALL PHONE
========================================================= */

@media (max-width: 360px) {

    .teacher-attendance-status-options {
        gap: 4px;
    }

    .teacher-attendance-status-box {
        height: 45px;
    }

    .status-icon {
        width: 21px;
        height: 21px;
        font-size: 8px;
    }

    .status-text strong {
        font-size: 6.5px;
    }

}

</style>


<script>

/* =========================================================
   SEARCH SISWA
========================================================= */

const searchInput = document.getElementById('searchStudent');
const clearSearch = document.getElementById('clearSearch');

if (searchInput) {

    searchInput.addEventListener('input', function () {

        const keyword = this.value.toLowerCase().trim();

        const rows = document.querySelectorAll(
            '.teacher-attendance-table .student-row'
        );

        rows.forEach(function (row) {

            const text = row.innerText.toLowerCase();

            row.style.display =
                text.includes(keyword)
                    ? ''
                    : 'none';

        });

        if (clearSearch) {

            clearSearch.style.display =
                keyword.length > 0
                    ? 'flex'
                    : 'none';

        }

    });

}


if (clearSearch) {

    clearSearch.addEventListener('click', function () {

        if (searchInput) {

            searchInput.value = '';

            document
                .querySelectorAll(
                    '.teacher-attendance-table .student-row'
                )
                .forEach(function (row) {

                    row.style.display = '';

                });

            clearSearch.style.display = 'none';

            searchInput.focus();

        }

    });

}


/* =========================================================
   REKAP STATUS
========================================================= */

function updateRecap() {

    const statuses = document.querySelectorAll(
        '.teacher-attendance-table input[type="radio"]:checked'
    );

    let hadir = 0;
    let izin = 0;
    let sakit = 0;
    let alfa = 0;

    statuses.forEach(function(input) {

        if (input.value === 'HADIR') {
            hadir++;
        }

        if (input.value === 'IZIN') {
            izin++;
        }

        if (input.value === 'SAKIT') {
            sakit++;
        }

        if (input.value === 'ALFA') {
            alfa++;
        }

    });


    const hadirElement =
        document.getElementById('countHadir');

    const izinElement =
        document.getElementById('countIzin');

    const sakitElement =
        document.getElementById('countSakit');

    const alfaElement =
        document.getElementById('countAlfa');


    if (hadirElement) {
        hadirElement.textContent = hadir;
    }

    if (izinElement) {
        izinElement.textContent = izin;
    }

    if (sakitElement) {
        sakitElement.textContent = sakit;
    }

    if (alfaElement) {
        alfaElement.textContent = alfa;
    }


    const rows = document.querySelectorAll(
        '.teacher-attendance-table .student-row'
    );

    const totalStudents = rows.length;


    const completionText =
        document.getElementById('completionText');


    if (completionText) {

        const icon =
            completionText.querySelector('i');

        const span =
            completionText.querySelector('span');


        if (statuses.length === totalStudents && totalStudents > 0) {

            completionText.classList.add('complete');

            if (icon) {

                icon.className =
                    'fa-solid fa-circle-check';

            }

            if (span) {

                span.textContent =
                    'Semua siswa sudah memiliki status.';

            }

        } else {

            completionText.classList.remove('complete');

            if (icon) {

                icon.className =
                    'fa-solid fa-circle-info';

            }

            if (span) {

                const remaining =
                    totalStudents - statuses.length;

                span.textContent =
                    remaining +
                    ' siswa belum memiliki status.';

            }

        }

    }

}


/* =========================================================
   HADIRKAN SEMUA — SWEETALERT
========================================================= */

function hadirkanSemua() {

    const rows = document.querySelectorAll(
        '.teacher-attendance-table .student-row'
    );

    if (rows.length === 0) {
        return;
    }


    const currentHadir =
        document.querySelectorAll(
            '.teacher-attendance-table input[value="HADIR"]:checked'
        ).length;


    if (currentHadir === rows.length) {

        Swal.fire({

            icon: 'info',

            title: 'Sudah Semua Hadir',

            text: 'Semua siswa saat ini sudah berstatus Hadir.',

            confirmButtonText: 'Mengerti',

            confirmButtonColor: '#0788c9',

            customClass: {
                popup: 'teacher-attendance-swal',
                title: 'teacher-attendance-swal-title'
            }

        });

        return;
    }


    Swal.fire({

        icon: 'question',

        title: 'Hadirkan Semua Siswa?',

        html:
            '<div style="font-size:13px;color:#64748b;line-height:1.7">' +
            'Semua <strong style="color:#1e293b">' +
            rows.length +
            ' siswa</strong> akan ditandai sebagai ' +
            '<strong style="color:#059669">Hadir</strong>.' +
            '<br>' +
            '<span style="font-size:11px;color:#94a3b8">' +
            'Status yang sudah dipilih sebelumnya akan diganti.' +
            '</span>' +
            '</div>',

        showCancelButton: true,

        confirmButtonText:
            '<i class="fa-solid fa-user-check"></i> Ya, Hadirkan Semua',

        cancelButtonText:
            'Batal',

        reverseButtons: true,

        confirmButtonColor: '#16a34a',

        cancelButtonColor: '#e2e8f0',

        customClass: {

            popup:
                'teacher-attendance-swal',

            title:
                'teacher-attendance-swal-title',

            confirmButton:
                'teacher-attendance-swal-confirm',

            cancelButton:
                'teacher-attendance-swal-cancel'

        }

    }).then(function(result) {

        if (!result.isConfirmed) {
            return;
        }


        rows.forEach(function(row) {

            const hadirRadio =
                row.querySelector(
                    'input[type="radio"][value="HADIR"]'
                );

            if (hadirRadio) {

                hadirRadio.checked = true;

            }

        });


        updateRecap();


        Swal.fire({

            icon: 'success',

            title: 'Berhasil!',

            text:
                rows.length +
                ' siswa telah ditandai sebagai Hadir.',

            showConfirmButton: false,

            timer: 1500,

            timerProgressBar: true,

            customClass: {

                popup:
                    'teacher-attendance-swal'

            }

        });

    });

}


/* =========================================================
   VALIDASI FORM ABSENSI BARU
========================================================= */

const attendanceForm =
    document.getElementById('attendanceForm');


if (attendanceForm) {

    attendanceForm.addEventListener(
        'submit',
        function(event) {

            const rows =
                document.querySelectorAll(
                    '.teacher-attendance-table .student-row'
                );

            let belumDiisi = 0;


            rows.forEach(function(row) {

                const checked =
                    row.querySelector(
                        'input[type="radio"]:checked'
                    );

                if (!checked) {

                    belumDiisi++;

                }

            });


            if (belumDiisi > 0) {

                event.preventDefault();


                Swal.fire({

                    icon: 'warning',

                    title: 'Absensi Belum Lengkap',

                    html:
                        'Masih ada <strong>' +
                        belumDiisi +
                        ' siswa</strong> yang belum memiliki status absensi.',

                    confirmButtonText:
                        'Periksa Kembali',

                    confirmButtonColor:
                        '#0788c9',

                    customClass: {

                        popup:
                            'teacher-attendance-swal',

                        title:
                            'teacher-attendance-swal-title'

                    }

                });


                return false;

            }


            const saveButton =
                document.getElementById('saveAttendance');


            if (saveButton) {

                saveButton.disabled = true;

                saveButton.innerHTML =
                    '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';

            }

        }
    );

}


/* =========================================================
   INIT
========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    function() {

        updateRecap();

    }
);

</script>

@endsection