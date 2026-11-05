@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')

<style>
/* =========================================================
   DATA SISWA — MODERN PREMIUM UI
========================================================= */

.student-page {
    --primary: #0788c9;
    --primary-dark: #056d9f;
    --primary-light: #eaf7fd;

    --success: #16a34a;
    --success-light: #ecfdf5;

    --danger: #dc2626;
    --danger-light: #fef2f2;

    --text: #172b4d;
    --text-dark: #334155;
    --text-muted: #94a3b8;

    --border: #e5eaf0;
    --border-light: #eef2f6;

    --surface: #ffffff;
    --surface-soft: #f8fafc;

    width: 100%;
    padding-bottom: 35px;
}

/* =========================================================
   PAGE HEADER
========================================================= */

.student-page .page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    margin-bottom: 24px;
}

.student-page .page-header-left {
    display: flex;
    align-items: center;
    gap: 14px;
    min-width: 0;
}

.student-page .page-header-icon {
    width: 50px;
    height: 50px;
    flex: 0 0 50px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #eaf7fd,
        #f5fbfe
    );

    border: 1px solid #d6eef9;
    border-radius: 14px;

    color: var(--primary);
    font-size: 18px;

    box-shadow:
        0 8px 20px rgba(7, 136, 201, .08);
}

.student-page .page-title {
    margin: 0;

    color: var(--text);
    font-size: 23px;
    font-weight: 750;

    letter-spacing: -.45px;
    line-height: 1.25;
}

.student-page .page-description {
    margin: 5px 0 0;

    color: var(--text-muted);
    font-size: 11px;
    line-height: 1.5;
}

/* =========================================================
   HEADER ACTIONS
========================================================= */

.student-header-actions {
    display: flex;
    align-items: center;
    gap: 9px;
    flex-shrink: 0;
}

.import-button,
.add-button {
    min-height: 40px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    padding: 0 15px;

    border-radius: 10px;

    font-family: inherit;
    font-size: 10px;
    font-weight: 650;

    text-decoration: none;
    white-space: nowrap;

    cursor: pointer;

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        background .2s ease,
        border-color .2s ease;
}

.import-button {
    background: #fff;
    border: 1px solid #c9e9f7;
    color: var(--primary);
}

.import-button:hover {
    background: #f3fbfe;
    border-color: #9ed8ef;
    color: var(--primary);

    transform: translateY(-1px);

    box-shadow:
        0 7px 18px rgba(7, 136, 201, .08);
}

.add-button {
    background: linear-gradient(
        135deg,
        var(--primary),
        var(--primary-dark)
    );

    border: 1px solid var(--primary);
    color: #fff;

    box-shadow:
        0 7px 18px rgba(7, 136, 201, .18);
}

.add-button:hover {
    color: #fff;

    transform: translateY(-1px);

    box-shadow:
        0 10px 24px rgba(7, 136, 201, .24);
}

/* =========================================================
   SUMMARY CARDS
========================================================= */

.summary-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;

    margin-bottom: 18px;
}

.summary-card {
    position: relative;
    overflow: hidden;

    display: flex;
    align-items: center;
    gap: 13px;

    min-height: 82px;
    padding: 17px;

    background: var(--surface);

    border: 1px solid var(--border);
    border-radius: 14px;

    box-shadow:
        0 5px 18px rgba(15, 23, 42, .035);

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}

.summary-card::before {
    content: "";

    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;

    width: 3px;

    background: var(--primary);

    opacity: .8;
}

.summary-card:hover {
    transform: translateY(-2px);

    border-color: #d5dee7;

    box-shadow:
        0 10px 28px rgba(15, 23, 42, .065);
}

.summary-card::after {
    content: "";

    position: absolute;
    right: -25px;
    bottom: -30px;

    width: 85px;
    height: 85px;

    background: rgba(7, 136, 201, .035);

    border-radius: 50%;
}

.summary-icon {
    position: relative;
    z-index: 1;

    width: 43px;
    height: 43px;
    flex: 0 0 43px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;

    font-size: 15px;
}

.summary-icon.blue {
    background: var(--primary-light);
    color: var(--primary);
}

.summary-icon.green {
    background: var(--success-light);
    color: var(--success);
}

.summary-icon.red {
    background: var(--danger-light);
    color: var(--danger);
}

.summary-label {
    margin: 0;

    color: #64748b;
    font-size: 9px;
    font-weight: 550;
}

.summary-number {
    margin: 3px 0 0;

    color: var(--text);
    font-size: 20px;
    font-weight: 750;

    letter-spacing: -.3px;
}

/* =========================================================
   FILTER CARD
========================================================= */

.filter-card {
    margin-bottom: 18px;
    padding: 18px;

    background: var(--surface);

    border: 1px solid var(--border);
    border-radius: 15px;

    box-shadow:
        0 5px 18px rgba(15, 23, 42, .03);
}

.filter-header {
    display: flex;
    align-items: center;
    gap: 9px;

    margin-bottom: 13px;
}

.filter-header-icon {
    width: 29px;
    height: 29px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--primary-light);

    border-radius: 8px;

    color: var(--primary);
    font-size: 10px;
}

.filter-title {
    margin: 0;

    color: var(--text-dark);
    font-size: 11px;
    font-weight: 700;
}

.filter-form {
    display: grid;

    grid-template-columns:
        minmax(200px, 1.5fr)
        minmax(150px, 1fr)
        minmax(150px, 1fr)
        auto
        auto;

    gap: 9px;

    align-items: center;
}

/* =========================================================
   INPUT
========================================================= */

.search-box {
    position: relative;
}

.search-box i {
    position: absolute;

    left: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #a0aec0;
    font-size: 10px;

    pointer-events: none;
}

.filter-input,
.filter-select {
    width: 100%;
    height: 39px;

    box-sizing: border-box;

    padding: 8px 12px;

    background: #fff;

    border: 1px solid var(--border);
    border-radius: 9px;

    outline: none;

    color: #475569;

    font-family: inherit;
    font-size: 9px;

    transition:
        border-color .2s ease,
        box-shadow .2s ease,
        background .2s ease;
}

.search-box .filter-input {
    padding-left: 34px;
}

.filter-input:hover,
.filter-select:hover {
    border-color: #cbd5e1;
}

.filter-input:focus,
.filter-select:focus {
    border-color: var(--primary);

    box-shadow:
        0 0 0 3px rgba(7, 136, 201, .08);
}

.filter-input::placeholder {
    color: #b5c0cc;
}

/* =========================================================
   FILTER BUTTON
========================================================= */

.filter-button,
.reset-button {
    height: 39px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;

    padding: 0 14px;

    border-radius: 9px;

    font-family: inherit;
    font-size: 9px;
    font-weight: 650;

    white-space: nowrap;
    text-decoration: none;

    cursor: pointer;

    transition: .2s ease;
}

.filter-button {
    background: var(--primary);

    border: 1px solid var(--primary);

    color: #fff;
}

.filter-button:hover {
    background: var(--primary-dark);
    border-color: var(--primary-dark);

    color: #fff;

    transform: translateY(-1px);
}

.reset-button {
    background: #fff;

    border: 1px solid var(--border);

    color: #64748b;
}

.reset-button:hover {
    background: #f8fafc;

    border-color: #cbd5e1;

    color: #334155;
}

/* =========================================================
   ACTIVE FILTER
========================================================= */

.active-filter {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px;

    margin-top: 12px;
    padding-top: 11px;

    border-top: 1px solid #f1f5f9;
}

.active-filter-label {
    color: #94a3b8;
    font-size: 8px;
}

.filter-chip {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    padding: 5px 9px;

    background: var(--primary-light);

    border: 1px solid #d6edf8;
    border-radius: 20px;

    color: var(--primary);

    font-size: 7px;
    font-weight: 650;
}

/* =========================================================
   TABLE CARD
========================================================= */

.table-card {
    padding: 19px;

    background: #fff;

    border: 1px solid var(--border);
    border-radius: 15px;

    box-shadow:
        0 5px 18px rgba(15, 23, 42, .03);
}

.table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin-bottom: 15px;
}

.table-title {
    margin: 0;

    color: var(--text);

    font-size: 14px;
    font-weight: 700;
}

.table-subtitle {
    margin: 4px 0 0;

    color: var(--text-muted);

    font-size: 8px;
}

.data-count {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 6px 10px;

    background: var(--primary-light);

    border: 1px solid #d6edf8;
    border-radius: 20px;

    color: var(--primary);

    font-size: 8px;
    font-weight: 650;

    white-space: nowrap;
}

/* =========================================================
   TABLE
========================================================= */

.table-wrapper {
    width: 100%;

    overflow-x: auto;

    border: 1px solid var(--border);
    border-radius: 11px;

    scrollbar-width: thin;
}

.student-table {
    width: 100%;
    min-width: 900px;

    margin: 0;

    border-collapse: separate;
    border-spacing: 0;
}

.student-table th {
    padding: 12px;

    background: #f8fafc;

    border-bottom: 1px solid var(--border);

    color: #64748b;

    font-size: 7px;
    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .4px;

    white-space: nowrap;
}

.student-table td {
    padding: 12px;

    border-bottom: 1px solid #f1f5f9;

    color: #475569;

    font-size: 8px;

    vertical-align: middle;

    background: #fff;
}

.student-table tbody tr {
    transition: background .15s ease;
}

.student-table tbody tr:hover td {
    background: #fafdff;
}

.student-table tbody tr:last-child td {
    border-bottom: none;
}

/* =========================================================
   STUDENT PROFILE
========================================================= */

.student-profile {
    display: flex;
    align-items: center;
    gap: 10px;

    min-width: 190px;
}

.student-avatar {
    width: 36px;
    height: 36px;
    flex: 0 0 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #e8f6fd,
        #f5fbfe
    );

    border: 1px solid #d6edf8;
    border-radius: 10px;

    color: var(--primary);

    font-size: 10px;
    font-weight: 750;
}

.student-name {
    color: var(--text);

    font-size: 9px;
    font-weight: 650;

    line-height: 1.35;
}

.student-nis {
    margin-top: 2px;

    color: var(--text-muted);

    font-size: 7px;
}

/* =========================================================
   CLASS BADGE
========================================================= */

.class-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    padding: 5px 9px;

    background: #f8fafc;

    border: 1px solid #e7edf2;
    border-radius: 8px;

    color: #475569;

    font-size: 7px;
    font-weight: 650;

    white-space: nowrap;
}

.class-badge i {
    color: var(--primary);
    font-size: 7px;
}

/* =========================================================
   GENDER
========================================================= */

.gender-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    font-size: 8px;
    font-weight: 550;

    white-space: nowrap;
}

.gender-badge.male {
    color: #2563eb;
}

.gender-badge.female {
    color: #db2777;
}

/* =========================================================
   PARENT
========================================================= */

.parent-info {
    display: flex;
    flex-direction: column;
    gap: 4px;

    min-width: 145px;
}

.parent-name {
    color: #475569;

    font-size: 8px;
    font-weight: 550;
}

.parent-name i {
    width: 12px;

    color: #94a3b8;

    text-align: center;
}

.parent-phone {
    display: flex;
    align-items: center;
    gap: 5px;

    color: #94a3b8;

    font-size: 7px;
}

.parent-phone i {
    width: 12px;

    text-align: center;
}

/* =========================================================
   STATUS
========================================================= */

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    padding: 5px 9px;

    border-radius: 20px;

    font-size: 7px;
    font-weight: 650;

    white-space: nowrap;
}

.status-badge.active {
    background: #ecfdf5;
    color: #15803d;
}

.status-badge.inactive {
    background: #fef2f2;
    color: #dc2626;
}

.status-dot {
    width: 5px;
    height: 5px;

    border-radius: 50%;

    background: currentColor;
}

/* =========================================================
   ACTION
========================================================= */

.action-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;

    gap: 6px;
}

.action-button {
    width: 30px;
    height: 30px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 0;

    background: #fff;

    border: 1px solid var(--border);
    border-radius: 8px;

    font-size: 8px;

    text-decoration: none;

    cursor: pointer;

    transition:
        transform .18s ease,
        background .18s ease,
        border-color .18s ease;
}

.action-button:hover {
    transform: translateY(-1px);
}

.edit-button {
    color: var(--primary);
}

.edit-button:hover {
    background: var(--primary-light);
    border-color: #b9e2f2;
}

.delete-button {
    color: var(--danger);
}

.delete-button:hover {
    background: var(--danger-light);
    border-color: #fecaca;
}

/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {
    padding: 60px 20px;

    text-align: center;
}

.empty-icon {
    width: 58px;
    height: 58px;

    margin: 0 auto 13px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f1f5f9;

    border-radius: 16px;

    color: #94a3b8;

    font-size: 19px;
}

.empty-title {
    margin: 0;

    color: #475569;

    font-size: 11px;
    font-weight: 650;
}

.empty-text {
    margin: 5px 0 0;

    color: #94a3b8;

    font-size: 8px;
}

/* =========================================================
   PAGINATION
========================================================= */

.pagination-container {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    margin-top: 17px;
    padding-top: 15px;

    border-top: 1px solid #f1f5f9;
}

.pagination-info {
    color: #64748b;

    font-size: 8px;
    line-height: 1.5;
}

.pagination-info strong {
    color: #334155;
    font-weight: 700;
}

.pagination-nav {
    display: flex;
    align-items: center;
    gap: 4px;
}

.pagination-link,
.pagination-current,
.pagination-disabled {
    min-width: 30px;
    height: 30px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 0 8px;

    border-radius: 8px;

    font-size: 8px;
    font-weight: 650;

    text-decoration: none;

    transition: .18s ease;
}

.pagination-link {
    background: #fff;

    border: 1px solid var(--border);

    color: #64748b;
}

.pagination-link:hover {
    background: var(--primary-light);

    border-color: #b9e2f2;

    color: var(--primary);

    transform: translateY(-1px);
}

.pagination-current {
    background: var(--primary);

    border: 1px solid var(--primary);

    color: #fff;

    box-shadow:
        0 4px 11px rgba(7, 136, 201, .18);
}

.pagination-disabled {
    background: #f8fafc;

    border: 1px solid #eef2f6;

    color: #cbd5e1;

    cursor: not-allowed;
}

.pagination-dots {
    min-width: 25px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    color: #94a3b8;

    font-size: 9px;
}

/* =========================================================
   IMPORT RESULT
========================================================= */

.import-result-card {
    position: relative;

    display: flex;
    align-items: flex-start;

    gap: 12px;

    margin-bottom: 20px;
    padding: 15px 16px;

    background: linear-gradient(
        135deg,
        #f0fdf4,
        #fbfffc
    );

    border: 1px solid #bbf7d0;
    border-radius: 14px;

    box-shadow:
        0 6px 18px rgba(22, 163, 74, .045);
}

.import-result-icon {
    width: 40px;
    height: 40px;
    flex: 0 0 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #dcfce7;

    border-radius: 10px;

    color: #16a34a;

    font-size: 15px;
}

.import-result-content {
    min-width: 0;
}

.import-result-content h3 {
    margin: 0;

    color: #166534;

    font-size: 12px;
    font-weight: 700;
}

.import-result-stat {
    display: flex;
    flex-wrap: wrap;

    gap: 13px;

    margin-top: 6px;

    font-size: 9px;
}

.import-result-stat .success {
    color: #15803d;
}

.import-result-stat .failed {
    color: #dc2626;
}

.import-result-card details {
    margin-top: 9px;

    color: #64748b;

    font-size: 8px;
}

.import-result-card summary {
    cursor: pointer;

    color: #475569;

    font-weight: 600;
}

.import-result-card ul {
    margin: 8px 0 0;
    padding-left: 17px;
}

.import-result-card li {
    margin-bottom: 3px;
}

/* =========================================================
   IMPORT MODAL
========================================================= */

.import-modal {
    position: fixed;
    inset: 0;

    z-index: 9999;

    display: none;

    align-items: center;
    justify-content: center;

    padding: 20px;
}

.import-modal.active {
    display: flex;
}

.import-modal-overlay {
    position: absolute;
    inset: 0;

    background: rgba(15, 23, 42, .52);

    backdrop-filter: blur(6px);
}

.import-modal-card {
    position: relative;
    z-index: 1;

    width: 100%;
    max-width: 560px;
    max-height: 90vh;

    overflow-y: auto;

    padding: 23px;

    background: #fff;

    border: 1px solid rgba(255,255,255,.8);
    border-radius: 18px;

    box-shadow:
        0 30px 80px rgba(15, 23, 42, .22);

    animation: studentModalIn .22s ease-out;
}

@keyframes studentModalIn {
    from {
        opacity: 0;
        transform: translateY(12px) scale(.97);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.import-modal-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;

    gap: 15px;

    margin-bottom: 17px;
}

.import-modal-header h3 {
    margin: 0;

    color: var(--text);

    font-size: 17px;
    font-weight: 750;
}

.import-modal-header p {
    margin: 5px 0 0;

    color: var(--text-muted);

    font-size: 9px;
    line-height: 1.5;
}

.import-close-button {
    width: 32px;
    height: 32px;
    flex: 0 0 32px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f1f5f9;

    border: none;
    border-radius: 9px;

    color: #64748b;

    cursor: pointer;

    transition: .2s ease;
}

.import-close-button:hover {
    background: #e2e8f0;
    color: #334155;
}

/* =========================================================
   IMPORT INFO
========================================================= */

.import-info {
    display: flex;
    gap: 10px;

    margin-bottom: 14px;
    padding: 13px;

    background: #f0f9ff;

    border: 1px solid #bae6fd;
    border-radius: 11px;
}

.import-info-icon {
    color: #0284c7;
    font-size: 14px;
}

.import-info strong {
    display: block;

    color: #0369a1;

    font-size: 9px;
}

.import-info p {
    margin: 3px 0 0;

    color: #64748b;

    font-size: 8px;
    line-height: 1.5;
}

/* =========================================================
   IMPORT FORMAT
========================================================= */

.import-format {
    margin-bottom: 14px;
    padding: 13px;

    background: #f8fafc;

    border: 1px solid #eef2f6;
    border-radius: 11px;
}

.import-format h4 {
    margin: 0 0 8px;

    color: #334155;

    font-size: 9px;
    font-weight: 700;
}

.import-columns {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}

.import-columns span {
    padding: 5px 8px;

    background: #fff;

    border: 1px solid var(--border);
    border-radius: 7px;

    color: #475569;

    font-size: 7px;
    font-weight: 650;
}

.import-format p {
    margin: 8px 0 0;

    color: var(--text-muted);

    font-size: 7px;
    line-height: 1.5;
}

/* =========================================================
   FILE UPLOAD
========================================================= */

.file-upload-box {
    position: relative;
    overflow: hidden;

    border: 2px dashed #cbd5e1;
    border-radius: 12px;

    transition: .2s ease;
}

.file-upload-box:hover {
    background: #f8fcff;

    border-color: var(--primary);
}

.file-upload-box input {
    position: absolute;

    width: 1px;
    height: 1px;

    opacity: 0;
}

.file-upload-label {
    min-height: 145px;

    margin: 0;

    display: flex;
    flex-direction: column;

    align-items: center;
    justify-content: center;

    gap: 6px;

    cursor: pointer;

    text-align: center;
}

.file-upload-label i {
    margin-bottom: 4px;

    color: var(--primary);

    font-size: 27px;
}

.file-upload-label strong {
    color: #334155;

    font-size: 10px;
}

.file-upload-label span {
    color: var(--text-muted);

    font-size: 8px;
}

.selected-file {
    margin-top: 7px;

    color: var(--primary);

    font-size: 8px;
    font-weight: 650;

    word-break: break-word;
}

/* =========================================================
   MODAL ACTIONS
========================================================= */

.import-modal-actions {
    display: flex;
    justify-content: flex-end;

    gap: 8px;

    margin-top: 17px;
}

.import-modal-actions .btn {
    min-height: 38px;

    padding: 7px 14px;

    border-radius: 9px;

    font-size: 9px;
    font-weight: 650;
}

/* =========================================================
   RESPONSIVE — TABLET
========================================================= */

@media (max-width: 1100px) {

    .filter-form {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .filter-button,
    .reset-button {
        width: 100%;
    }
}

/* =========================================================
   RESPONSIVE — SMALL TABLET
========================================================= */

@media (max-width: 800px) {

    .student-page .page-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .student-header-actions {
        width: 100%;
        justify-content: flex-start;
    }

    .summary-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .pagination-container {
        align-items: flex-start;
        flex-direction: column;
    }
}

/* =========================================================
   RESPONSIVE — MOBILE
========================================================= */

@media (max-width: 600px) {

    .student-page .page-header-left {
        align-items: flex-start;
    }

    .student-page .page-title {
        font-size: 20px;
    }

    .student-page .page-description {
        font-size: 9px;
    }

    .student-header-actions {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        width: 100%;
    }

    .student-header-actions .import-button,
    .student-header-actions .add-button {
        width: 100%;
    }

    .summary-grid {
        grid-template-columns: 1fr;
    }

    .filter-form {
        grid-template-columns: 1fr;
    }

    .filter-card,
    .table-card {
        padding: 14px;
    }

    .table-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .data-count {
        align-self: flex-start;
    }

    .pagination-container {
        gap: 12px;
    }

    .pagination-nav {
        width: 100%;

        overflow-x: auto;

        justify-content: flex-start;

        padding-bottom: 2px;
    }

    .pagination-link,
    .pagination-current,
    .pagination-disabled {
        flex: 0 0 auto;
    }

    .import-modal {
        padding: 10px;
    }

    .import-modal-card {
        max-height: 94vh;

        padding: 17px;

        border-radius: 15px;
    }

    .import-modal-actions {
        flex-direction: column-reverse;
    }

    .import-modal-actions .btn {
        width: 100%;
    }
}

/* =========================================================
   RESPONSIVE — SMALL MOBILE
========================================================= */

@media (max-width: 380px) {

    .student-header-actions {
        grid-template-columns: 1fr;
    }

    .student-page .page-header-left {
        gap: 10px;
    }

    .student-page .page-header-icon {
        width: 42px;
        height: 42px;

        flex-basis: 42px;
    }

    .student-page .page-title {
        font-size: 18px;
    }

    .filter-card,
    .table-card {
        padding: 11px;
    }

    .summary-card {
        padding: 14px;
    }
}

/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .summary-card,
    .import-button,
    .add-button,
    .action-button,
    .import-modal-card,
    .pagination-link {
        animation: none;
        transition: none;
    }
}
</style>


{{-- =========================================================
     IMPORT RESULT
========================================================= --}}

@if (session('import_result'))

    <div class="import-result-card">

        <div class="import-result-icon">
            <i class="fa-solid fa-file-circle-check"></i>
        </div>

        <div class="import-result-content">

            <h3>
                Import Selesai
            </h3>

            <div class="import-result-stat">

                <span class="success">
                    <i class="fa-solid fa-circle-check"></i>

                    {{ session('import_result.success') }}
                    berhasil
                </span>

                <span class="failed">
                    <i class="fa-solid fa-circle-xmark"></i>

                    {{ session('import_result.failed') }}
                    gagal
                </span>

            </div>

            @if (count(session('import_result.errors', [])) > 0)

                <details>

                    <summary>
                        Lihat detail data yang gagal
                    </summary>

                    <ul>

                        @foreach (session('import_result.errors') as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </details>

            @endif

        </div>

    </div>

@endif


{{-- =========================================================
     MAIN PAGE
========================================================= --}}

<div class="student-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="page-header-left">

            <div class="page-header-icon">
                <i class="fa-solid fa-user-graduate"></i>
            </div>

            <div>

                <h1 class="page-title">
                    Data Siswa
                </h1>

                <p class="page-description">
                    Kelola data siswa yang terdaftar di MA Az-Zahra.
                </p>

            </div>

        </div>


        {{-- ACTION BUTTONS --}}

        <div class="student-header-actions">

            <button
                type="button"
                class="import-button"
                onclick="openImportStudentModal()"
            >
                <i class="fa-solid fa-file-import"></i>
                Import Excel
            </button>

            <a
                href="{{ route('admin.students.create') }}"
                class="add-button"
            >
                <i class="fa-solid fa-plus"></i>
                Tambah Siswa
            </a>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="summary-grid">


        {{-- TOTAL --}}

        <div class="summary-card">

            <div class="summary-icon blue">
                <i class="fa-solid fa-users"></i>
            </div>

            <div>

                <p class="summary-label">
                    Total Siswa
                </p>

                <p class="summary-number">
                    {{ $totalStudents ?? $students->total() }}
                </p>

            </div>

        </div>


        {{-- AKTIF --}}

        <div class="summary-card">

            <div class="summary-icon green">
                <i class="fa-solid fa-user-check"></i>
            </div>

            <div>

                <p class="summary-label">
                    Siswa Aktif
                </p>

                <p class="summary-number">
                    {{ $activeStudents ?? 0 }}
                </p>

            </div>

        </div>


        {{-- NONAKTIF --}}

        <div class="summary-card">

            <div class="summary-icon red">
                <i class="fa-solid fa-user-xmark"></i>
            </div>

            <div>

                <p class="summary-label">
                    Siswa Nonaktif
                </p>

                <p class="summary-number">
                    {{ $inactiveStudents ?? 0 }}
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
         FILTER
    ====================================================== --}}

    <div class="filter-card">

        <div class="filter-header">

            <div class="filter-header-icon">
                <i class="fa-solid fa-filter"></i>
            </div>

            <h2 class="filter-title">
                Filter Data Siswa
            </h2>

        </div>


        <form
            method="GET"
            action="{{ route('admin.students.index') }}"
            class="filter-form"
        >

            {{-- SEARCH --}}

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    name="search"
                    class="filter-input"
                    placeholder="Cari nama atau NIS..."
                    value="{{ request('search') }}"
                >

            </div>


            {{-- KELAS --}}

            <select
                name="class_id"
                class="filter-select"
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


            {{-- STATUS --}}

            <select
                name="status"
                class="filter-select"
            >

                <option value="">
                    Semua Status
                </option>

                <option
                    value="active"
                    {{ request('status') === 'active' ? 'selected' : '' }}
                >
                    Aktif
                </option>

                <option
                    value="inactive"
                    {{ request('status') === 'inactive' ? 'selected' : '' }}
                >
                    Nonaktif
                </option>

            </select>


            {{-- FILTER BUTTON --}}

            <button
                type="submit"
                class="filter-button"
            >
                <i class="fa-solid fa-filter"></i>
                Filter
            </button>


            {{-- RESET --}}

            <a
                href="{{ route('admin.students.index') }}"
                class="reset-button"
            >
                <i class="fa-solid fa-rotate-left"></i>
                Reset
            </a>

        </form>


        {{-- ACTIVE FILTER INFO --}}

        @if (
            request()->filled('search') ||
            request()->filled('class_id') ||
            request()->filled('status')
        )

            <div class="active-filter">

                <span class="active-filter-label">
                    Filter aktif:
                </span>


                @if (request()->filled('search'))

                    <span class="filter-chip">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        {{ request('search') }}

                    </span>

                @endif


                @if (request()->filled('class_id'))

                    @php
                        $selectedClass = $classes->firstWhere(
                            'id',
                            request('class_id')
                        );
                    @endphp

                    @if ($selectedClass)

                        <span class="filter-chip">

                            <i class="fa-solid fa-school"></i>

                            {{ $selectedClass->name }}

                        </span>

                    @endif

                @endif


                @if (request('status') === 'active')

                    <span class="filter-chip">

                        <i class="fa-solid fa-circle-check"></i>

                        Siswa Aktif

                    </span>

                @elseif (request('status') === 'inactive')

                    <span class="filter-chip">

                        <i class="fa-solid fa-circle-xmark"></i>

                        Siswa Nonaktif

                    </span>

                @endif

            </div>

        @endif

    </div>


    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <div class="table-card">


        {{-- TABLE HEADER --}}

        <div class="table-header">

            <div>

                <h2 class="table-title">
                    Daftar Siswa
                </h2>

                <p class="table-subtitle">
                    Informasi siswa, kelas, orang tua, dan status siswa.
                </p>

            </div>


            <div class="data-count">

                <i class="fa-solid fa-users"></i>

                {{ $students->total() }}

                Siswa

            </div>

        </div>


        {{-- TABLE WRAPPER --}}

        <div class="table-wrapper">

            <table class="student-table">

                <thead>

                    <tr>

                        <th>
                            Siswa
                        </th>

                        <th>
                            Kelas
                        </th>

                        <th>
                            Gender
                        </th>

                        <th>
                            Orang Tua
                        </th>

                        <th>
                            Status
                        </th>

                        <th style="text-align: center;">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($students as $student)

                        <tr>


                            {{-- SISWA --}}

                            <td>

                                <div class="student-profile">

                                    <div class="student-avatar">

                                        {{ strtoupper(
                                            substr(
                                                $student->name,
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>


                                    <div>

                                        <div class="student-name">
                                            {{ $student->name }}
                                        </div>

                                        <div class="student-nis">

                                            NIS:

                                            {{ $student->nis ?: '-' }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- KELAS --}}

                            <td>

                                <span class="class-badge">

                                    <i class="fa-solid fa-school"></i>

                                    {{ $student->schoolClass->name ?? '-' }}

                                </span>

                            </td>


                            {{-- GENDER --}}

                            <td>

                                @php

                                    $gender = strtolower(
                                        trim($student->gender ?? '')
                                    );

                                @endphp


                                @if (
                                    $gender === 'l' ||
                                    $gender === 'laki-laki' ||
                                    $gender === 'male'
                                )

                                    <span class="gender-badge male">

                                        <i class="fa-solid fa-mars"></i>

                                        Laki-laki

                                    </span>

                                @elseif (
                                    $gender === 'p' ||
                                    $gender === 'perempuan' ||
                                    $gender === 'female'
                                )

                                    <span class="gender-badge female">

                                        <i class="fa-solid fa-venus"></i>

                                        Perempuan

                                    </span>

                                @else

                                    <span class="gender-badge">

                                        {{ $student->gender ?: '-' }}

                                    </span>

                                @endif

                            </td>


                            {{-- ORANG TUA --}}

                            <td>

                                <div class="parent-info">

                                    <div class="parent-name">

                                        <i class="fa-solid fa-user"></i>

                                        {{ $student->parent_name ?: '-' }}

                                    </div>


                                    <div class="parent-phone">

                                        <i class="fa-solid fa-phone"></i>

                                        {{ $student->parent_phone ?: '-' }}

                                    </div>

                                </div>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if ($student->is_active)

                                    <span class="status-badge active">

                                        <span class="status-dot"></span>

                                        Aktif

                                    </span>

                                @else

                                    <span class="status-badge inactive">

                                        <span class="status-dot"></span>

                                        Nonaktif

                                    </span>

                                @endif

                            </td>


                            {{-- ACTION --}}

                            <td>

                                <div class="action-wrapper">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route(
                                            'admin.students.edit',
                                            $student
                                        ) }}"
                                        class="action-button edit-button"
                                        title="Edit Siswa"
                                        aria-label="Edit Siswa"
                                    >

                                        <i class="fa-solid fa-pen"></i>

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        method="POST"
                                        action="{{ route(
                                            'admin.students.destroy',
                                            $student
                                        ) }}"
                                        onsubmit="return confirm(
                                            'Apakah Anda yakin ingin menghapus siswa ini?'
                                        )"
                                        style="display: inline;"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="action-button delete-button"
                                            title="Hapus Siswa"
                                            aria-label="Hapus Siswa"
                                        >

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="6"
                                style="border: none;"
                            >

                                <div class="empty-state">

                                    <div class="empty-icon">

                                        <i class="fa-solid fa-user-graduate"></i>

                                    </div>


                                    <p class="empty-title">
                                        Data Siswa Tidak Ditemukan
                                    </p>


                                    <p class="empty-text">
                                        Belum ada data siswa yang tersedia
                                        atau sesuai dengan filter yang dipilih.
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

        @if ($students->total() > 0)

            <div class="pagination-container">


                {{-- INFO --}}

                <div class="pagination-info">

                    Menampilkan

                    <strong>
                        {{ $students->firstItem() ?? 0 }}
                    </strong>

                    sampai

                    <strong>
                        {{ $students->lastItem() ?? 0 }}
                    </strong>

                    dari

                    <strong>
                        {{ $students->total() }}
                    </strong>

                    siswa

                </div>


                {{-- NAVIGATION --}}

                @if ($students->hasPages())

                    <div class="pagination-nav">


                        {{-- PREVIOUS --}}

                        @if ($students->onFirstPage())

                            <span class="pagination-disabled">

                                <i class="fa-solid fa-chevron-left"></i>

                            </span>

                        @else

                            <a
                                href="{{ $students->previousPageUrl() }}"
                                class="pagination-link"
                                aria-label="Halaman sebelumnya"
                            >

                                <i class="fa-solid fa-chevron-left"></i>

                            </a>

                        @endif


                        {{-- PAGE NUMBERS --}}

                        @php

                            $currentPage = $students->currentPage();

                            $lastPage = $students->lastPage();

                            $pages = [];

                            if ($lastPage <= 5) {

                                $pages = range(1, $lastPage);

                            } else {

                                $pages[] = 1;

                                if ($currentPage > 3) {
                                    $pages[] = '...';
                                }

                                $start = max(
                                    2,
                                    $currentPage - 1
                                );

                                $end = min(
                                    $lastPage - 1,
                                    $currentPage + 1
                                );

                                for (
                                    $i = $start;
                                    $i <= $end;
                                    $i++
                                ) {
                                    $pages[] = $i;
                                }

                                if (
                                    $currentPage <
                                    $lastPage - 2
                                ) {
                                    $pages[] = '...';
                                }

                                $pages[] = $lastPage;
                            }

                        @endphp


                        @foreach ($pages as $page)

                            @if ($page === '...')

                                <span class="pagination-dots">
                                    ...
                                </span>

                            @elseif ($page == $currentPage)

                                <span class="pagination-current">
                                    {{ $page }}
                                </span>

                            @else

                                <a
                                    href="{{ $students->url($page) }}"
                                    class="pagination-link"
                                >
                                    {{ $page }}
                                </a>

                            @endif

                        @endforeach


                        {{-- NEXT --}}

                        @if ($students->hasMorePages())

                            <a
                                href="{{ $students->nextPageUrl() }}"
                                class="pagination-link"
                                aria-label="Halaman berikutnya"
                            >

                                <i class="fa-solid fa-chevron-right"></i>

                            </a>

                        @else

                            <span class="pagination-disabled">

                                <i class="fa-solid fa-chevron-right"></i>

                            </span>

                        @endif

                    </div>

                @endif

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     MODAL IMPORT SISWA
========================================================= --}}

<div
    id="importStudentModal"
    class="import-modal"
>

    <div
        class="import-modal-overlay"
        onclick="closeImportStudentModal()"
    ></div>


    <div class="import-modal-card">


        {{-- MODAL HEADER --}}

        <div class="import-modal-header">

            <div>

                <h3>
                    Import Data Siswa
                </h3>

                <p>
                    Tambahkan banyak data siswa melalui file Excel atau CSV.
                </p>

            </div>


            <button
                type="button"
                class="import-close-button"
                onclick="closeImportStudentModal()"
                aria-label="Tutup"
            >

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>


        {{-- INFO --}}

        <div class="import-info">

            <div class="import-info-icon">

                <i class="fa-solid fa-circle-info"></i>

            </div>


            <div>

                <strong>
                    Format file
                </strong>

                <p>
                    Gunakan file XLSX, XLS, atau CSV
                    dengan ukuran maksimal 5 MB.
                </p>

            </div>

        </div>


        {{-- FORMAT --}}

        <div class="import-format">

            <h4>
                Kolom yang diperlukan
            </h4>


            <div class="import-columns">

                <span>NIS</span>
                <span>NAME</span>
                <span>CLASS</span>
                <span>GENDER</span>
                <span>PARENT_NAME</span>
                <span>PARENT_PHONE</span>

            </div>


            <p>

                Gender menggunakan
                <strong>L</strong>
                untuk laki-laki dan
                <strong>P</strong>
                untuk perempuan.

            </p>

        </div>


        {{-- IMPORT FORM --}}

        <form
            action="{{ route('admin.students.import') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="file-upload-box">

                <input
                    type="file"
                    name="file"
                    id="studentImportFile"
                    accept=".xlsx,.xls,.csv"
                    required
                >


                <label
                    for="studentImportFile"
                    class="file-upload-label"
                >

                    <i class="fa-solid fa-cloud-arrow-up"></i>

                    <strong>
                        Pilih File Excel
                    </strong>

                    <span>
                        Klik untuk memilih file
                    </span>

                </label>

            </div>


            <div
                id="studentFileName"
                class="selected-file"
            ></div>


            <div class="import-modal-actions">

                <button
                    type="button"
                    class="btn btn-secondary"
                    onclick="closeImportStudentModal()"
                >

                    Batal

                </button>


                <button
                    type="submit"
                    class="btn btn-success"
                >

                    <i class="fa-solid fa-upload"></i>

                    Mulai Import

                </button>

            </div>

        </form>

    </div>

</div>


<script>

/* =========================================================
   OPEN MODAL
========================================================= */

function openImportStudentModal() {

    const modal =
        document.getElementById('importStudentModal');

    if (!modal) {
        return;
    }

    modal.classList.add('active');

    document.body.style.overflow = 'hidden';
}


/* =========================================================
   CLOSE MODAL
========================================================= */

function closeImportStudentModal() {

    const modal =
        document.getElementById('importStudentModal');

    if (!modal) {
        return;
    }

    modal.classList.remove('active');

    document.body.style.overflow = '';
}


/* =========================================================
   FILE NAME
========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const fileInput =
            document.getElementById(
                'studentImportFile'
            );

        const fileName =
            document.getElementById(
                'studentFileName'
            );


        if (fileInput && fileName) {

            fileInput.addEventListener(
                'change',
                function () {

                    if (
                        this.files &&
                        this.files.length > 0
                    ) {

                        fileName.textContent =
                            'File dipilih: ' +
                            this.files[0].name;

                    } else {

                        fileName.textContent = '';

                    }

                }
            );

        }

    }
);


/* =========================================================
   ESC KEY
========================================================= */

document.addEventListener(
    'keydown',
    function (event) {

        if (event.key === 'Escape') {

            closeImportStudentModal();

        }

    }
);

</script>

@endsection

