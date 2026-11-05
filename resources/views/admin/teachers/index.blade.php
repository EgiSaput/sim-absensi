@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')

<style>
    /* =========================================================
       TEACHER PAGE
    ========================================================= */

    .teacher-page {
        --primary: #0788c9;
        --primary-dark: #0676ad;
        --primary-soft: #eaf7fd;
        --text: #172b4d;
        --muted: #7c8da6;
        --border: #e7edf4;
        --surface: #ffffff;
        --soft: #f8fafc;
        --success: #16a34a;
        --danger: #dc2626;

        width: 100%;
        color: var(--text);
        font-family:
            Inter,
            ui-sans-serif,
            system-ui,
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            sans-serif;
    }

    .teacher-page,
    .teacher-page * {
        box-sizing: border-box;
    }

    /* =========================================================
       IMPORT RESULT
    ========================================================= */

    .import-result-card {
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 15px 17px;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #f0fdf4, #f7fff9);
        border: 1px solid #bbf7d0;
        border-radius: 15px;
        overflow: hidden;
    }

    .import-result-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        right: -35px;
        top: -45px;
        border-radius: 50%;
        background: rgba(34, 197, 94, .07);
        pointer-events: none;
    }

    .import-result-icon {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dcfce7;
        color: #16a34a;
        border-radius: 11px;
        font-size: 17px;
    }

    .import-result-content {
        min-width: 0;
    }

    .import-result-content h3 {
        margin: 0;
        color: #166534;
        font-size: 13px;
        font-weight: 750;
    }

    .import-result-stat {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 7px;
        font-size: 11px;
        font-weight: 600;
    }

    .import-result-stat .success {
        color: #15803d;
    }

    .import-result-stat .failed {
        color: #dc2626;
    }

    .import-result-card details {
        margin-top: 10px;
        font-size: 10px;
        color: #64748b;
    }

    .import-result-card summary {
        cursor: pointer;
        color: #475569;
        font-weight: 600;
    }

    .import-result-card ul {
        margin: 8px 0 0;
        padding-left: 18px;
    }

    .import-result-card li {
        margin-bottom: 4px;
    }

    /* =========================================================
       PAGE HEADER
    ========================================================= */

    .page-header {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        padding: 23px 25px;
        margin-bottom: 18px;
        background:
            radial-gradient(circle at 90% 20%, rgba(7, 136, 201, .08), transparent 27%),
            #ffffff;
        border: 1px solid var(--border);
        border-radius: 18px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, .035);
        overflow: hidden;
    }

    .page-header::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(
            180deg,
            var(--primary),
            #38bdf8
        );
    }

    .page-header-left {
        min-width: 0;
        position: relative;
        z-index: 1;
    }

    .page-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 7px;
        color: var(--primary);
        font-size: 9px;
        font-weight: 750;
        letter-spacing: .8px;
        text-transform: uppercase;
    }

    .page-eyebrow i {
        font-size: 8px;
    }

    .page-title {
        margin: 0;
        color: var(--text);
        font-size: 25px;
        font-weight: 780;
        line-height: 1.2;
        letter-spacing: -.5px;
    }

    .page-description {
        max-width: 600px;
        margin: 7px 0 0;
        color: var(--muted);
        font-size: 12px;
        line-height: 1.6;
    }

    /* =========================================================
       HEADER ACTIONS
    ========================================================= */

    .teacher-header-actions {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 9px;
        flex-shrink: 0;
    }

    .import-button,
    .add-teacher-btn {
        min-height: 40px;
        padding: 9px 14px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-family: inherit;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
        cursor: pointer;
        transition:
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .import-button {
        border: 1px solid #c8eafa;
        background: #ffffff;
        color: var(--primary);
    }

    .import-button:hover {
        background: var(--primary-soft);
        border-color: #8dd5f3;
        color: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 7px 18px rgba(7, 136, 201, .08);
    }

    .add-teacher-btn {
        border: 1px solid var(--primary);
        background: var(--primary);
        color: #ffffff;
        text-decoration: none;
        box-shadow: 0 6px 16px rgba(7, 136, 201, .16);
    }

    .add-teacher-btn:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 9px 22px rgba(7, 136, 201, .21);
    }

    .import-button i,
    .add-teacher-btn i {
        font-size: 10px;
    }

    /* =========================================================
       SUMMARY
    ========================================================= */

    .summary-card {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 17px 19px;
        margin-bottom: 18px;
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 15px;
        box-shadow: 0 6px 22px rgba(15, 23, 42, .035);
        overflow: hidden;
    }

    .summary-card::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        right: -80px;
        top: -80px;
        border-radius: 50%;
        background: rgba(7, 136, 201, .045);
        pointer-events: none;
    }

    .summary-left {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .summary-icon {
        width: 47px;
        height: 47px;
        flex: 0 0 47px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(
            135deg,
            #e8f7fd,
            #dff3fb
        );
        color: var(--primary);
        border: 1px solid #d2effb;
        border-radius: 12px;
        font-size: 18px;
    }

    .summary-label {
        margin: 0;
        color: #64748b;
        font-size: 10px;
        font-weight: 600;
    }

    .summary-number {
        margin: 3px 0 0;
        color: var(--text);
        font-size: 23px;
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: -.4px;
    }

    .summary-status {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 10px;
        background: #f0fdf4;
        border: 1px solid #dcfce7;
        border-radius: 20px;
        color: #15803d;
        font-size: 9px;
        font-weight: 700;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        flex: 0 0 6px;
        border-radius: 50%;
        background: currentColor;
    }

    /* =========================================================
       TABLE CARD
    ========================================================= */

    .table-card {
        padding: 19px;
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, .035);
    }

    /* =========================================================
       TOOLBAR
    ========================================================= */

    .table-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 15px;
    }

    .toolbar-title {
        margin: 0;
        color: var(--text);
        font-size: 14px;
        font-weight: 750;
    }

    .toolbar-description {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 9px;
    }

    .toolbar-right {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* =========================================================
       SEARCH
    ========================================================= */

    .search-wrapper {
        position: relative;
        width: 250px;
    }

    .search-wrapper i {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 10px;
        pointer-events: none;
        transition: color .2s ease;
    }

    .search-input {
        width: 100%;
        height: 37px;
        padding: 8px 11px 8px 33px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        outline: none;
        background: #ffffff;
        color: #334155;
        font-family: inherit;
        font-size: 10px;
        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .search-input::placeholder {
        color: #a0aec0;
    }

    .search-input:focus {
        background: #fbfdff;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(7, 136, 201, .08);
    }

    .search-wrapper:focus-within i {
        color: var(--primary);
    }

    /* =========================================================
       FILTER
    ========================================================= */

    .status-filter {
        width: 135px;
        height: 37px;
        padding: 7px 10px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        outline: none;
        background: #ffffff;
        color: #475569;
        font-family: inherit;
        font-size: 10px;
        cursor: pointer;
        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .status-filter:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(7, 136, 201, .08);
    }

    /* =========================================================
       TABLE
    ========================================================= */

    .teacher-table-wrapper {
        width: 100%;
        overflow-x: auto;
        border: 1px solid #e6edf5;
        border-radius: 11px;
        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 transparent;
    }

    .teacher-table-wrapper::-webkit-scrollbar {
        height: 5px;
    }

    .teacher-table-wrapper::-webkit-scrollbar-track {
        background: transparent;
    }

    .teacher-table-wrapper::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .teacher-table {
        width: 100%;
        min-width: 850px;
        margin: 0;
        border: none;
        border-collapse: collapse;
    }

    .teacher-table th {
        padding: 12px 14px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 8px;
        font-weight: 750;
        text-transform: uppercase;
        letter-spacing: .45px;
        white-space: nowrap;
    }

    .teacher-table td {
        padding: 13px 14px;
        border-bottom: 1px solid #f1f5f9;
        color: #475569;
        font-size: 10px;
        vertical-align: middle;
    }

    .teacher-table tbody tr {
        transition:
            background .15s ease,
            box-shadow .15s ease;
    }

    .teacher-table tbody tr:hover {
        background: #fafdff;
    }

    .teacher-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* =========================================================
       TEACHER PROFILE
    ========================================================= */

    .teacher-profile {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 190px;
    }

    .teacher-avatar {
        position: relative;
        width: 37px;
        height: 37px;
        flex: 0 0 37px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: linear-gradient(
            135deg,
            #eaf7fd,
            #dff3fb
        );
        border: 1px solid #d5eef9;
        color: var(--primary);
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .teacher-avatar::after {
        content: "";
        position: absolute;
        right: -1px;
        bottom: -1px;
        width: 8px;
        height: 8px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        background: #22c55e;
    }

    .teacher-name {
        color: #1e293b;
        font-size: 10px;
        font-weight: 700;
        line-height: 1.4;
    }

    .teacher-label {
        margin-top: 2px;
        color: #94a3b8;
        font-size: 8px;
    }

    /* =========================================================
       CONTACT
    ========================================================= */

    .contact-item {
        display: flex;
        align-items: center;
        gap: 7px;
        min-width: 130px;
        max-width: 220px;
    }

    .contact-item i {
        width: 14px;
        color: #94a3b8;
        font-size: 9px;
        text-align: center;
        flex-shrink: 0;
    }

    .contact-item span {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* =========================================================
       STATUS
    ========================================================= */

    .teacher-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 8px;
        font-weight: 700;
        white-space: nowrap;
    }

    .teacher-status.active {
        background: #ecfdf5;
        border: 1px solid #d1fae5;
        color: #15803d;
    }

    .teacher-status.inactive {
        background: #fef2f2;
        border: 1px solid #fee2e2;
        color: #dc2626;
    }

    .teacher-status .status-dot {
        width: 5px;
        height: 5px;
        flex-basis: 5px;
    }

    /* =========================================================
       ACTION BUTTON
    ========================================================= */

    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .action-btn {
        width: 31px;
        height: 31px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background: #ffffff;
        text-decoration: none;
        font-size: 9px;
        cursor: pointer;
        transition:
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .action-btn:hover {
        transform: translateY(-1px);
    }

    .action-edit {
        color: var(--primary);
    }

    .action-edit:hover {
        background: var(--primary-soft);
        border-color: #bae6fd;
        color: var(--primary-dark);
        box-shadow: 0 4px 10px rgba(7, 136, 201, .08);
    }

    .action-delete {
        color: #dc2626;
    }

    .action-delete:hover {
        background: #fef2f2;
        border-color: #fecaca;
        color: #b91c1c;
        box-shadow: 0 4px 10px rgba(220, 38, 38, .07);
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 55px 20px;
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
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        color: #94a3b8;
        font-size: 20px;
    }

    .empty-title {
        margin: 0;
        color: #475569;
        font-size: 12px;
        font-weight: 700;
    }

    .empty-text {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 9px;
    }

    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-wrapper {
        display: flex;
        justify-content: flex-end;
        margin-top: 17px;
        overflow-x: auto;
    }

    .pagination-wrapper nav {
        width: auto;
        min-height: auto;
        padding: 0;
        background: transparent;
    }

    .pagination-wrapper svg {
        width: 14px;
        height: 14px;
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
        backdrop-filter: blur(5px);
    }

    .import-modal-card {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 570px;
        max-height: 90vh;
        overflow-y: auto;
        padding: 23px;
        background: #ffffff;
        border: 1px solid rgba(255,255,255,.7);
        border-radius: 18px;
        box-shadow: 0 30px 80px rgba(15, 23, 42, .22);
        animation: modalIn .22s ease-out;
    }

    @keyframes modalIn {
        from {
            opacity: 0;
            transform: translateY(12px) scale(.975);
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
        margin-bottom: 18px;
    }

    .import-modal-header-left {
        display: flex;
        align-items: flex-start;
        gap: 11px;
    }

    .import-modal-header-icon {
        width: 39px;
        height: 39px;
        flex: 0 0 39px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-soft);
        color: var(--primary);
        border-radius: 10px;
        font-size: 15px;
    }

    .import-modal-header h3 {
        margin: 0;
        color: #1e293b;
        font-size: 16px;
        font-weight: 750;
    }

    .import-modal-header p {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 9px;
        line-height: 1.5;
    }

    .import-close-button {
        width: 31px;
        height: 31px;
        flex: 0 0 31px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background: #f8fafc;
        color: #64748b;
        cursor: pointer;
        transition:
            background .2s ease,
            color .2s ease,
            transform .2s ease;
    }

    .import-close-button:hover {
        background: #f1f5f9;
        color: #334155;
        transform: rotate(3deg);
    }

    /* =========================================================
       IMPORT INFO
    ========================================================= */

    .import-info {
        display: flex;
        gap: 10px;
        padding: 13px;
        margin-bottom: 14px;
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 11px;
    }

    .import-info-icon {
        color: #0284c7;
        font-size: 14px;
        flex-shrink: 0;
    }

    .import-info strong {
        display: block;
        color: #0369a1;
        font-size: 9px;
        font-weight: 750;
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
        padding: 14px;
        margin-bottom: 14px;
        background: #f8fafc;
        border: 1px solid #eef2f7;
        border-radius: 11px;
    }

    .import-format h4 {
        margin: 0 0 9px;
        color: #334155;
        font-size: 9px;
        font-weight: 750;
    }

    .import-columns {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .import-columns span {
        padding: 5px 8px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        color: #475569;
        font-size: 8px;
        font-weight: 700;
    }

    .import-columns span:first-child {
        background: var(--primary-soft);
        border-color: #c9ebfa;
        color: var(--primary-dark);
    }

    .import-format p {
        margin: 9px 0 0;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.55;
    }

    .import-format strong {
        color: #64748b;
    }

    /* =========================================================
       FILE UPLOAD
    ========================================================= */

    .file-upload-box {
        position: relative;
        overflow: hidden;
        border: 1.5px dashed #cbd5e1;
        border-radius: 12px;
        background: #fcfdff;
        transition:
            border-color .2s ease,
            background .2s ease,
            box-shadow .2s ease;
    }

    .file-upload-box:hover {
        border-color: var(--primary);
        background: #f8fcff;
        box-shadow: 0 5px 18px rgba(7, 136, 201, .05);
    }

    .file-upload-box input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
    }

    .file-upload-label {
        min-height: 140px;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 7px;
        cursor: pointer;
        text-align: center;
    }

    .file-upload-label i {
        width: 48px;
        height: 48px;
        margin-bottom: 2px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-soft);
        border-radius: 13px;
        color: var(--primary);
        font-size: 20px;
    }

    .file-upload-label strong {
        color: #334155;
        font-size: 10px;
        font-weight: 700;
    }

    .file-upload-label span {
        color: #94a3b8;
        font-size: 8px;
    }

    .selected-file {
        min-height: 15px;
        margin-top: 7px;
        color: var(--primary);
        font-size: 9px;
        font-weight: 650;
        word-break: break-word;
    }

    /* =========================================================
       MODAL ACTION
    ========================================================= */

    .import-modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 18px;
    }

    .import-modal-actions .btn {
        min-height: 37px;
        padding: 8px 13px;
        border-radius: 9px;
        font-size: 9px;
        font-weight: 700;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1000px) {
        .page-header {
            align-items: flex-start;
        }

        .table-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .toolbar-right {
            width: 100%;
        }

        .search-wrapper {
            flex: 1;
            width: auto;
        }
    }

    @media (max-width: 760px) {
        .page-header {
            padding: 20px;
            flex-direction: column;
        }

        .teacher-header-actions {
            width: 100%;
            justify-content: flex-start;
        }

        .summary-card {
            padding: 15px;
        }

        .table-card {
            padding: 13px;
        }
    }

    @media (max-width: 600px) {
        .page-header {
            margin-bottom: 14px;
            border-radius: 14px;
        }

        .page-title {
            font-size: 21px;
        }

        .page-description {
            font-size: 10px;
        }

        .teacher-header-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 7px;
        }

        .teacher-header-actions > * {
            width: 100%;
        }

        .import-button,
        .add-teacher-btn {
            width: 100%;
            min-height: 39px;
            padding: 8px 10px;
            font-size: 10px;
        }

        .summary-status {
            display: none;
        }

        .summary-label {
            font-size: 9px;
        }

        .summary-number {
            font-size: 21px;
        }

        .toolbar-right {
            flex-direction: column;
            align-items: stretch;
            gap: 7px;
        }

        .search-wrapper,
        .status-filter {
            width: 100%;
        }

        .import-modal {
            padding: 10px;
        }

        .import-modal-card {
            padding: 16px;
            border-radius: 14px;
            max-height: 94vh;
        }

        .import-modal-actions {
            flex-direction: column-reverse;
        }

        .import-modal-actions .btn {
            width: 100%;
        }
    }

    @media (max-width: 380px) {
        .teacher-header-actions {
            grid-template-columns: 1fr;
        }

        .page-title {
            font-size: 19px;
        }

        .summary-icon {
            width: 43px;
            height: 43px;
            flex-basis: 43px;
        }

        .summary-number {
            font-size: 20px;
        }

        .table-card {
            padding: 10px;
        }
    }

    /* =========================================================
       REDUCED MOTION
    ========================================================= */

    @media (prefers-reduced-motion: reduce) {
        .teacher-page *,
        .teacher-page *::before,
        .teacher-page *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important;
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
            <h3>Import Selesai</h3>

            <div class="import-result-stat">
                <span class="success">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('import_result.success') }} berhasil
                </span>

                <span class="failed">
                    <i class="fa-solid fa-circle-xmark"></i>
                    {{ session('import_result.failed') }} gagal
                </span>
            </div>

            @if (count(session('import_result.errors', [])) > 0)
                <details>
                    <summary>Lihat detail data yang gagal</summary>

                    <ul>
                        @foreach (session('import_result.errors') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </details>
            @endif
        </div>
    </div>
@endif


<div class="teacher-page">

    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="page-header-left">

            <div class="page-eyebrow">
                <i class="fa-solid fa-users"></i>
                Manajemen Sekolah
            </div>

            <h1 class="page-title">
                Data Guru
            </h1>

            <p class="page-description">
                Kelola informasi guru yang terdaftar di MA Az-Zahra.
            </p>

        </div>


        <div class="teacher-header-actions">

            <button
                type="button"
                class="import-button"
                onclick="openImportTeacherModal()"
            >
                <i class="fa-solid fa-file-import"></i>
                Import Excel
            </button>

            <a
                href="{{ route('admin.teachers.create') }}"
                class="add-teacher-btn"
            >
                <i class="fa-solid fa-plus"></i>
                Tambah Guru
            </a>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="summary-card">

        <div class="summary-left">

            <div class="summary-icon">
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>

            <div>
                <p class="summary-label">
                    Total Guru Terdaftar
                </p>

                <p class="summary-number">
                    {{ $teachers->total() }}
                </p>
            </div>

        </div>

        <div class="summary-status">
            <span class="status-dot"></span>
            Data guru
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
                    Daftar Guru
                </h2>

                <p class="toolbar-description">
                    Informasi guru dan status keaktifan
                </p>
            </div>


            <div class="toolbar-right">

                <div class="search-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        id="teacherSearch"
                        class="search-input"
                        placeholder="Cari nama, NIP, email..."
                        autocomplete="off"
                    >
                </div>

                <select
                    id="statusFilter"
                    class="status-filter"
                >
                    <option value="all">
                        Semua Status
                    </option>

                    <option value="active">
                        Aktif
                    </option>

                    <option value="inactive">
                        Nonaktif
                    </option>
                </select>

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="teacher-table-wrapper">

            <table
                class="teacher-table"
                id="teacherTable"
            >

                <thead>
                    <tr>
                        <th>Guru</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Status</th>
                        <th style="text-align: center;">
                            Aksi
                        </th>
                    </tr>
                </thead>


                <tbody>

                    @forelse ($teachers as $teacher)

                        <tr
                            data-status="{{ $teacher->is_active ? 'active' : 'inactive' }}"
                        >

                            {{-- GURU --}}

                            <td>
                                <div class="teacher-profile">

                                    <div class="teacher-avatar">
                                        {{ strtoupper(substr($teacher->name, 0, 1)) }}
                                    </div>

                                    <div>

                                        <div class="teacher-name">
                                            {{ $teacher->name }}
                                        </div>

                                        <div class="teacher-label">
                                            Guru MA Az-Zahra
                                        </div>

                                    </div>

                                </div>
                            </td>


                            {{-- NIP --}}

                            <td>
                                {{ $teacher->nip ?: '-' }}
                            </td>


                            {{-- EMAIL --}}

                            <td>
                                <div class="contact-item">

                                    <i class="fa-solid fa-envelope"></i>

                                    <span>
                                        {{ $teacher->email }}
                                    </span>

                                </div>
                            </td>


                            {{-- TELEPON --}}

                            <td>
                                <div class="contact-item">

                                    <i class="fa-solid fa-phone"></i>

                                    <span>
                                        {{ $teacher->phone ?: '-' }}
                                    </span>

                                </div>
                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if ($teacher->is_active)

                                    <span class="teacher-status active">
                                        <span class="status-dot"></span>
                                        Aktif
                                    </span>

                                @else

                                    <span class="teacher-status inactive">
                                        <span class="status-dot"></span>
                                        Nonaktif
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="{{ route('admin.teachers.edit', $teacher) }}"
                                        class="action-btn action-edit"
                                        title="Edit Guru"
                                        aria-label="Edit Guru"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.teachers.destroy', $teacher) }}"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini?')"
                                        style="display: inline;"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus Guru"
                                            aria-label="Hapus Guru"
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
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                    </div>

                                    <p class="empty-title">
                                        Belum Ada Data Guru
                                    </p>

                                    <p class="empty-text">
                                        Silakan tambahkan guru menggunakan tombol "Tambah Guru".
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

        @if ($teachers->hasPages())

            <div class="pagination-wrapper">
                {{ $teachers->links() }}
            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     MODAL IMPORT GURU
========================================================= --}}

<div
    id="importTeacherModal"
    class="import-modal"
>

    <div
        class="import-modal-overlay"
        onclick="closeImportTeacherModal()"
    ></div>


    <div class="import-modal-card">

        {{-- HEADER --}}

        <div class="import-modal-header">

            <div class="import-modal-header-left">

                <div class="import-modal-header-icon">
                    <i class="fa-solid fa-file-excel"></i>
                </div>

                <div>

                    <h3>
                        Import Data Guru
                    </h3>

                    <p>
                        Tambahkan banyak data guru melalui file Excel atau CSV.
                    </p>

                </div>

            </div>


            <button
                type="button"
                class="import-close-button"
                onclick="closeImportTeacherModal()"
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
                    Gunakan file XLSX, XLS, atau CSV dengan ukuran maksimal 5 MB.
                </p>

            </div>

        </div>


        {{-- FORMAT --}}

        <div class="import-format">

            <h4>
                Kolom yang digunakan
            </h4>

            <div class="import-columns">
                <span>NAME</span>
                <span>NIP</span>
                <span>EMAIL</span>
                <span>PHONE</span>
                <span>PASSWORD</span>
            </div>

            <p>
                Password minimal 8 karakter.
                Jika dikosongkan, sistem menggunakan password default
                <strong>12345678</strong>.
            </p>

        </div>


        {{-- FORM --}}

        <form
            action="{{ route('admin.teachers.import') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="file-upload-box">

                <input
                    type="file"
                    name="file"
                    id="teacherImportFile"
                    accept=".xlsx,.xls,.csv"
                    required
                >

                <label
                    for="teacherImportFile"
                    class="file-upload-label"
                >

                    <i class="fa-solid fa-cloud-arrow-up"></i>

                    <strong>
                        Pilih File Excel
                    </strong>

                    <span>
                        Klik untuk memilih file XLSX, XLS, atau CSV
                    </span>

                </label>

            </div>


            <div
                id="teacherFileName"
                class="selected-file"
            ></div>


            {{-- ACTION --}}

            <div class="import-modal-actions">

                <button
                    type="button"
                    class="btn btn-secondary"
                    onclick="closeImportTeacherModal()"
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
       SEARCH & FILTER
    ========================================================= */

    document.addEventListener('DOMContentLoaded', function () {

        const searchInput =
            document.getElementById('teacherSearch');

        const statusFilter =
            document.getElementById('statusFilter');

        const tableRows =
            document.querySelectorAll(
                '#teacherTable tbody tr[data-status]'
            );


        function filterTeachers() {

            const keyword =
                searchInput
                    ? searchInput.value.toLowerCase().trim()
                    : '';

            const status =
                statusFilter
                    ? statusFilter.value
                    : 'all';


            tableRows.forEach(function (row) {

                const text =
                    row.textContent.toLowerCase();

                const rowStatus =
                    row.dataset.status;

                const matchesSearch =
                    text.includes(keyword);

                const matchesStatus =
                    status === 'all' ||
                    rowStatus === status;


                row.style.display =
                    matchesSearch && matchesStatus
                        ? ''
                        : 'none';

            });

        }


        if (searchInput) {

            searchInput.addEventListener(
                'input',
                filterTeachers
            );

        }


        if (statusFilter) {

            statusFilter.addEventListener(
                'change',
                filterTeachers
            );

        }


        /* =====================================================
           FILE IMPORT
        ====================================================== */

        const teacherImportFile =
            document.getElementById('teacherImportFile');

        const teacherFileName =
            document.getElementById('teacherFileName');


        if (teacherImportFile) {

            teacherImportFile.addEventListener(
                'change',
                function () {

                    if (
                        this.files &&
                        this.files.length > 0
                    ) {

                        teacherFileName.textContent =
                            'File dipilih: ' +
                            this.files[0].name;

                    } else {

                        teacherFileName.textContent = '';

                    }

                }
            );

        }

    });


    /* =========================================================
       IMPORT MODAL
    ========================================================= */

    function openImportTeacherModal() {

        const modal =
            document.getElementById('importTeacherModal');

        if (!modal) {
            return;
        }

        modal.classList.add('active');

        document.body.style.overflow = 'hidden';

    }


    function closeImportTeacherModal() {

        const modal =
            document.getElementById('importTeacherModal');

        if (!modal) {
            return;
        }

        modal.classList.remove('active');

        document.body.style.overflow = '';

    }


    /* =========================================================
       ESC KEY
    ========================================================= */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            closeImportTeacherModal();
        }

    });
</script>

@endsection