<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Laporan Absensi | MA Az-Zahra Parongpong</title>

    <style>
        /* =====================================================
           BASE
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        :root {
            --ar-primary: #0788c9;
            --ar-primary-dark: #066fa8;
            --ar-primary-soft: #e8f6fd;

            --ar-text: #172033;
            --ar-text-soft: #475569;
            --ar-muted: #64748b;
            --ar-light: #94a3b8;

            --ar-border: #e2e8f0;
            --ar-border-soft: #edf2f7;

            --ar-bg: #f4f8fb;
            --ar-white: #ffffff;

            --ar-success: #15803d;
            --ar-success-bg: #ecfdf5;

            --ar-warning: #b45309;
            --ar-warning-bg: #fffbeb;

            --ar-info: #0369a1;
            --ar-info-bg: #eff6ff;

            --ar-danger: #dc2626;
            --ar-danger-bg: #fef2f2;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(7, 136, 201, .08),
                    transparent 28%
                ),
                var(--ar-bg);

            color: var(--ar-text);

            font-family:
                Inter,
                "Segoe UI",
                Arial,
                Helvetica,
                sans-serif;

            font-size: 13px;
            line-height: 1.5;
        }


        /* =====================================================
           PAGE
        ===================================================== */

        .attendance-report-page {
            width: 100%;
            max-width: 1180px;

            margin: 32px auto;
            padding: 0 20px;
        }


        /* =====================================================
           ACTION BAR
        ===================================================== */

        .attendance-report-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 12px;
            margin-bottom: 18px;
        }

        .attendance-report-action-left,
        .attendance-report-action-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .attendance-report-btn {
            min-height: 42px;

            padding: 10px 16px;

            border: 0;
            border-radius: 10px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;
            text-decoration: none;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease,
                border-color .2s ease;
        }

        .attendance-report-btn:hover {
            transform: translateY(-1px);
        }

        .attendance-report-btn-back {
            background: var(--ar-white);
            color: var(--ar-text-soft);

            border: 1px solid var(--ar-border);

            box-shadow:
                0 2px 7px rgba(15, 23, 42, .04);
        }

        .attendance-report-btn-back:hover {
            color: var(--ar-primary);
            border-color: #b9e2f5;

            box-shadow:
                0 5px 15px rgba(15, 23, 42, .06);
        }

        .attendance-report-btn-print {
            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    var(--ar-primary),
                    var(--ar-primary-dark)
                );

            box-shadow:
                0 7px 18px rgba(7, 136, 201, .20);
        }

        .attendance-report-btn-print:hover {
            box-shadow:
                0 10px 24px rgba(7, 136, 201, .28);
        }

        .attendance-report-btn-icon {
            width: 28px;
            height: 28px;

            border-radius: 8px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            background: rgba(255, 255, 255, .16);

            font-size: 13px;
        }

        .attendance-report-btn-back
        .attendance-report-btn-icon {
            background: var(--ar-primary-soft);
        }


        /* =====================================================
           MAIN CARD
        ===================================================== */

        .attendance-report-card {
            background: var(--ar-white);

            border: 1px solid var(--ar-border);
            border-radius: 18px;

            padding: 42px;

            box-shadow:
                0 18px 45px rgba(15, 23, 42, .07);
        }


        /* =====================================================
           SCHOOL HEADER
        ===================================================== */

        .attendance-report-school-header {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 24px;

            padding-bottom: 24px;

            border-bottom: 2px solid var(--ar-primary);

            position: relative;
        }

        .attendance-report-school-header::after {
            content: "";

            position: absolute;

            bottom: -4px;
            left: 50%;

            transform: translateX(-50%);

            width: 90px;
            height: 5px;

            border-radius: 999px;

            background: var(--ar-primary);
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .attendance-report-logo-wrapper {
            width: 88px;
            height: 88px;

            flex: 0 0 88px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 18px;

            background:
                linear-gradient(
                    145deg,
                    #ffffff,
                    var(--ar-primary-soft)
                );

            border: 1px solid #d7edf8;

            box-shadow:
                0 7px 20px rgba(7, 136, 201, .10);
        }

        .attendance-report-logo {
            width: 72px;
            height: 72px;

            object-fit: contain;
        }


        /* =====================================================
           SCHOOL INFORMATION
        ===================================================== */

        .attendance-report-school-info {
            text-align: left;
        }

        .attendance-report-school-name {
            margin: 0;

            font-size: 23px;
            line-height: 1.2;

            font-weight: 800;
            letter-spacing: -.4px;

            color: #0f172a;
        }

        .attendance-report-school-system {
            margin: 7px 0 0;

            font-size: 13px;
            font-weight: 700;

            letter-spacing: .7px;

            color: var(--ar-primary);
        }

        .attendance-report-school-address {
            margin: 5px 0 0;

            font-size: 11px;

            color: var(--ar-muted);
        }


        /* =====================================================
           REPORT HEADING
        ===================================================== */

        .attendance-report-heading {
            text-align: center;

            padding: 27px 0 22px;
        }

        .attendance-report-heading-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            margin-bottom: 10px;

            padding: 6px 11px;

            border-radius: 999px;

            background: var(--ar-primary-soft);
            color: var(--ar-primary-dark);

            font-size: 10px;
            font-weight: 700;

            letter-spacing: .6px;

            text-transform: uppercase;
        }

        .attendance-report-heading h2 {
            margin: 0;

            font-size: 22px;
            line-height: 1.25;

            font-weight: 800;

            letter-spacing: -.3px;

            color: #0f172a;
        }

        .attendance-report-heading p {
            margin: 7px 0 0;

            font-size: 11px;

            color: var(--ar-muted);
        }


        /* =====================================================
           REPORT INFORMATION
        ===================================================== */

        .attendance-report-info-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                minmax(190px, .45fr);

            gap: 12px;

            margin-bottom: 22px;
        }

        .attendance-report-info-card {
            display: flex;
            align-items: center;

            gap: 11px;

            min-height: 64px;

            padding: 12px 14px;

            border: 1px solid #d9edf8;
            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #f8fcff,
                    #eef9fe
                );
        }

        .attendance-report-info-icon {
            width: 35px;
            height: 35px;

            flex: 0 0 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: var(--ar-primary-soft);
            color: var(--ar-primary);

            font-size: 15px;
        }

        .attendance-report-info-content {
            min-width: 0;
        }

        .attendance-report-info-label {
            display: block;

            margin-bottom: 2px;

            font-size: 9px;

            color: var(--ar-muted);
        }

        .attendance-report-info-value {
            display: block;

            font-size: 12px;

            font-weight: 700;

            color: var(--ar-text);
        }

        .attendance-report-info-badge {
            margin-left: auto;

            padding: 6px 10px;

            border-radius: 8px;

            background: #ffffff;

            border: 1px solid var(--ar-border);

            color: var(--ar-text-soft);

            font-size: 9px;

            font-weight: 600;

            white-space: nowrap;
        }


        /* =====================================================
           CLASS BADGE
        ===================================================== */

        .attendance-report-selected-class {
            display: inline-flex;
            align-items: center;

            gap: 6px;

            padding: 5px 9px;

            border-radius: 7px;

            background: #ffffff;

            border: 1px solid #d9edf8;

            color: var(--ar-primary-dark);

            font-size: 10px;

            font-weight: 700;

            white-space: nowrap;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .attendance-report-summary {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 12px;

            margin-bottom: 24px;
        }

        .attendance-report-summary-item {
            position: relative;
            overflow: hidden;

            padding: 15px 16px;

            border-radius: 13px;

            background: #ffffff;

            border: 1px solid var(--ar-border);

            box-shadow:
                0 3px 12px rgba(15, 23, 42, .035);
        }

        .attendance-report-summary-item::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;
            bottom: 0;

            width: 4px;

            background: var(--ar-primary);
        }

        .attendance-report-summary-item.status-hadir::before {
            background: var(--ar-success);
        }

        .attendance-report-summary-item.status-izin::before {
            background: var(--ar-warning);
        }

        .attendance-report-summary-item.status-sakit::before {
            background: #2563eb;
        }

        .attendance-report-summary-item.status-alfa::before {
            background: var(--ar-danger);
        }

        .attendance-report-summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 10px;

            margin-bottom: 9px;
        }

        .attendance-report-summary-label {
            font-size: 10px;

            font-weight: 700;

            letter-spacing: .5px;

            color: var(--ar-muted);
        }

        .attendance-report-summary-icon {
            width: 28px;
            height: 28px;

            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--ar-primary-soft);
            color: var(--ar-primary);

            font-size: 12px;
        }

        .status-hadir
        .attendance-report-summary-icon {
            background: var(--ar-success-bg);
            color: var(--ar-success);
        }

        .status-izin
        .attendance-report-summary-icon {
            background: var(--ar-warning-bg);
            color: var(--ar-warning);
        }

        .status-sakit
        .attendance-report-summary-icon {
            background: var(--ar-info-bg);
            color: var(--ar-info);
        }

        .status-alfa
        .attendance-report-summary-icon {
            background: var(--ar-danger-bg);
            color: var(--ar-danger);
        }

        .attendance-report-summary-number {
            display: block;

            font-size: 22px;
            line-height: 1;

            font-weight: 800;

            color: var(--ar-text);
        }


        /* =====================================================
           TABLE HEADING
        ===================================================== */

        .attendance-report-table-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin-bottom: 11px;
        }

        .attendance-report-table-title {
            margin: 0;

            font-size: 13px;

            font-weight: 750;

            color: var(--ar-text);
        }

        .attendance-report-table-caption {
            margin: 2px 0 0;

            font-size: 10px;

            color: var(--ar-muted);
        }

        .attendance-report-total {
            white-space: nowrap;

            padding: 6px 10px;

            border-radius: 8px;

            background: #f8fafc;

            border: 1px solid var(--ar-border);

            color: var(--ar-muted);

            font-size: 10px;

            font-weight: 600;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .attendance-report-table-wrapper {
            width: 100%;

            overflow-x: auto;

            border: 1px solid var(--ar-border);

            border-radius: 12px;

            scrollbar-width: thin;
        }

        .attendance-report-table {
            width: 100%;

            min-width: 800px;

            border-collapse: separate;
            border-spacing: 0;

            background: #ffffff;
        }

        .attendance-report-table thead th {
            padding: 12px 10px;

            background: #f7fafc;

            color: #334155;

            border-bottom: 1px solid #dce5ec;

            text-align: left;

            font-size: 9.5px;

            font-weight: 750;

            letter-spacing: .25px;

            white-space: nowrap;
        }

        .attendance-report-table thead th:first-child {
            border-top-left-radius: 11px;
        }

        .attendance-report-table thead th:last-child {
            border-top-right-radius: 11px;
        }

        .attendance-report-table tbody td {
            padding: 11px 10px;

            border-bottom: 1px solid var(--ar-border-soft);

            color: var(--ar-text-soft);

            font-size: 10px;

            vertical-align: middle;
        }

        .attendance-report-table tbody tr:last-child td {
            border-bottom: none;
        }

        .attendance-report-table tbody tr:hover {
            background: #fafdff;
        }

        .attendance-report-table-number {
            width: 45px;

            text-align: center;

            color: var(--ar-light);

            font-weight: 600;
        }

        .attendance-report-date {
            white-space: nowrap;

            font-weight: 600;

            color: var(--ar-text-soft);
        }


        /* =====================================================
           CLASS
        ===================================================== */

        .attendance-report-class {
            display: inline-flex;
            align-items: center;

            padding: 4px 8px;

            border-radius: 7px;

            background: #f1f5f9;

            border: 1px solid #e2e8f0;

            color: #475569;

            font-size: 9px;

            font-weight: 700;

            white-space: nowrap;
        }


        /* =====================================================
           SUBJECT / STUDENT / NOTE
        ===================================================== */

        .attendance-report-subject {
            color: var(--ar-text-soft);

            font-weight: 500;
        }

        .attendance-report-student {
            color: var(--ar-text);

            font-weight: 700;
        }

        .attendance-report-note {
            color: var(--ar-muted);

            line-height: 1.4;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .attendance-report-status {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 5px;

            min-width: 65px;

            padding: 5px 9px;

            border-radius: 999px;

            font-size: 8.5px;

            font-weight: 800;

            letter-spacing: .3px;

            white-space: nowrap;
        }

        .attendance-report-status::before {
            content: "";

            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: currentColor;
        }

        .attendance-report-status-hadir {
            background: var(--ar-success-bg);

            color: var(--ar-success);
        }

        .attendance-report-status-izin {
            background: var(--ar-warning-bg);

            color: var(--ar-warning);
        }

        .attendance-report-status-sakit {
            background: var(--ar-info-bg);

            color: var(--ar-info);
        }

        .attendance-report-status-alfa {
            background: var(--ar-danger-bg);

            color: var(--ar-danger);
        }

        .attendance-report-status-default {
            background: #f1f5f9;

            color: #475569;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .attendance-report-empty {
            text-align: center !important;

            padding: 45px 20px !important;

            color: var(--ar-muted) !important;
        }

        .attendance-report-empty-icon {
            width: 46px;
            height: 46px;

            margin: 0 auto 11px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f1f5f9;

            color: #94a3b8;

            font-size: 18px;
        }

        .attendance-report-empty-title {
            display: block;

            margin-bottom: 3px;

            font-size: 11px;

            font-weight: 700;

            color: var(--ar-text-soft);
        }

        .attendance-report-empty-text {
            display: block;

            font-size: 10px;

            color: var(--ar-muted);
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .attendance-report-footer {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-top: 24px;

            padding-top: 15px;

            border-top: 1px solid var(--ar-border);

            color: var(--ar-light);

            font-size: 9px;
        }

        .attendance-report-footer-brand {
            font-weight: 600;
        }

        .attendance-report-footer-date {
            text-align: right;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .attendance-report-page {
                margin: 20px auto;

                padding: 0 12px;
            }

            .attendance-report-card {
                padding: 28px 22px;
            }

            .attendance-report-summary {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

            .attendance-report-school-header {
                gap: 17px;
            }

            .attendance-report-school-name {
                font-size: 20px;
            }

            .attendance-report-info-grid {
                grid-template-columns: 1fr;
            }
        }


        @media (max-width: 650px) {

            body {
                font-size: 12px;
            }

            .attendance-report-page {
                margin: 12px auto;

                padding: 0 8px;
            }

            .attendance-report-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .attendance-report-action-left,
            .attendance-report-action-right {
                width: 100%;
            }

            .attendance-report-btn {
                width: 100%;
            }

            .attendance-report-card {
                padding: 22px 15px;

                border-radius: 14px;
            }

            .attendance-report-school-header {
                flex-direction: column;

                text-align: center;

                gap: 13px;
            }

            .attendance-report-school-info {
                text-align: center;
            }

            .attendance-report-logo-wrapper {
                width: 76px;
                height: 76px;

                flex-basis: 76px;
            }

            .attendance-report-logo {
                width: 62px;
                height: 62px;
            }

            .attendance-report-school-name {
                font-size: 18px;
            }

            .attendance-report-school-system {
                font-size: 11px;
            }

            .attendance-report-heading {
                padding: 22px 0 19px;
            }

            .attendance-report-heading h2 {
                font-size: 18px;
            }

            .attendance-report-info-grid {
                grid-template-columns: 1fr;

                gap: 8px;
            }

            .attendance-report-info-card {
                min-height: 58px;
            }

            .attendance-report-info-badge {
                font-size: 8px;
            }

            .attendance-report-summary {
                gap: 8px;
            }

            .attendance-report-summary-item {
                padding: 13px;
            }

            .attendance-report-summary-number {
                font-size: 19px;
            }

            .attendance-report-table-heading {
                align-items: flex-start;

                flex-direction: column;
            }

            .attendance-report-total {
                width: 100%;

                text-align: center;
            }

            .attendance-report-footer {
                flex-direction: column;

                align-items: flex-start;

                gap: 6px;
            }

            .attendance-report-footer-date {
                text-align: left;
            }
        }


        @media (max-width: 400px) {

            .attendance-report-summary {
                grid-template-columns: 1fr;
            }

            .attendance-report-summary-item {
                display: flex;

                align-items: center;
                justify-content: space-between;

                gap: 15px;
            }

            .attendance-report-summary-top {
                margin: 0;
            }

            .attendance-report-summary-number {
                font-size: 20px;
            }

            .attendance-report-heading h2 {
                font-size: 16px;
            }
        }


        /* =====================================================
           PRINT
        ===================================================== */

        @media print {

            @page {
                size: A4 landscape;
                margin: 10mm;
            }

            html,
            body {
                background: #ffffff !important;
            }

            body {
                color: #000000;

                font-size: 10px;
            }

            .attendance-report-page {
                max-width: none;

                margin: 0;

                padding: 0;
            }

            .attendance-report-card {
                border: none;

                box-shadow: none;

                border-radius: 0;

                padding: 0;
            }

            .no-print {
                display: none !important;
            }


            /* SCHOOL HEADER */

            .attendance-report-school-header {
                padding-bottom: 13px;

                border-bottom: 2px solid #000000;
            }

            .attendance-report-school-header::after {
                display: none;
            }

            .attendance-report-logo-wrapper {
                width: 70px;
                height: 70px;

                flex-basis: 70px;

                border: none;

                box-shadow: none;

                background: transparent;
            }

            .attendance-report-logo {
                width: 63px;
                height: 63px;
            }

            .attendance-report-school-name {
                font-size: 18px;

                color: #000000;
            }

            .attendance-report-school-system {
                color: #000000;

                font-size: 10px;
            }

            .attendance-report-school-address {
                color: #444444;

                font-size: 9px;
            }


            /* HEADING */

            .attendance-report-heading {
                padding: 14px 0;
            }

            .attendance-report-heading-label {
                display: none;
            }

            .attendance-report-heading h2 {
                font-size: 17px;

                color: #000000;
            }

            .attendance-report-heading p {
                color: #555555;

                font-size: 9px;
            }


            /* INFORMATION */

            .attendance-report-info-grid {
                grid-template-columns:
                    minmax(0, 1fr)
                    minmax(190px, .45fr);

                gap: 8px;

                margin-bottom: 12px;
            }

            .attendance-report-info-card {
                min-height: 0;

                padding: 7px 9px;

                background: #f7f7f7 !important;

                border: 1px solid #d5d5d5;

                border-radius: 4px;

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }

            .attendance-report-info-icon {
                display: none;
            }

            .attendance-report-info-label {
                color: #555555;

                font-size: 8px;
            }

            .attendance-report-info-value {
                color: #111111;

                font-size: 9px;
            }

            .attendance-report-info-badge {
                padding: 3px 6px;

                color: #333333;

                background: #ffffff;

                border: 1px solid #cccccc;

                font-size: 8px;
            }

            .attendance-report-selected-class {
                padding: 3px 6px;

                color: #111111;

                background: #ffffff;

                border: 1px solid #cccccc;

                font-size: 8px;
            }


            /* SUMMARY */

            .attendance-report-summary {
                gap: 0;

                border: 1px solid #cfcfcf;

                margin-bottom: 12px;
            }

            .attendance-report-summary-item {
                border-radius: 0;

                border: none;

                border-right: 1px solid #cfcfcf;

                box-shadow: none;

                padding: 7px;
            }

            .attendance-report-summary-item:last-child {
                border-right: none;
            }

            .attendance-report-summary-item::before {
                display: none;
            }

            .attendance-report-summary-icon {
                display: none;
            }

            .attendance-report-summary-top {
                margin-bottom: 2px;
            }

            .attendance-report-summary-label {
                color: #555555;
            }

            .attendance-report-summary-number {
                color: #111111;

                font-size: 15px;
            }


            /* TABLE HEADING */

            .attendance-report-table-heading {
                margin-bottom: 6px;
            }

            .attendance-report-table-title {
                font-size: 10px;

                color: #000000;
            }

            .attendance-report-table-caption {
                color: #555555;

                font-size: 8px;
            }

            .attendance-report-total {
                border: 1px solid #cccccc;

                background: #ffffff;

                color: #333333;

                font-size: 8px;
            }


            /* TABLE */

            .attendance-report-table-wrapper {
                overflow: visible;

                border: 1px solid #bfc4c9;

                border-radius: 0;
            }

            .attendance-report-table {
                min-width: 0;

                border-collapse: collapse;
            }

            .attendance-report-table thead {
                display: table-header-group;
            }

            .attendance-report-table thead th {
                padding: 6px;

                background: #eeeeee !important;

                color: #000000 !important;

                border: 1px solid #bfc4c9;

                font-size: 8px;

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }

            .attendance-report-table tbody td {
                padding: 5px 6px;

                border: 1px solid #d4d8dc;

                color: #222222;

                font-size: 8px;
            }

            .attendance-report-table tbody tr {
                page-break-inside: avoid;
            }

            .attendance-report-table tbody tr:hover {
                background: transparent;
            }

            .attendance-report-class,
            .attendance-report-status {
                border: none;

                background: transparent !important;

                padding: 0;

                color: #111111 !important;

                min-width: auto;

                font-size: 8px;

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }

            .attendance-report-status::before {
                display: none;
            }


            /* FOOTER */

            .attendance-report-footer {
                margin-top: 12px;

                padding-top: 7px;

                color: #666666;

                font-size: 7px;
            }
        }
    </style>
</head>


<body>

<div class="attendance-report-page">

    {{-- =====================================================
         ACTION BAR
    ====================================================== --}}

    <div class="attendance-report-actions no-print">

        <div class="attendance-report-action-left">

            <button
                type="button"
                class="attendance-report-btn attendance-report-btn-back"
                onclick="history.back()"
            >
                <span class="attendance-report-btn-icon">
                    ←
                </span>

                Kembali
            </button>

        </div>


        <div class="attendance-report-action-right">

            <button
                type="button"
                class="attendance-report-btn attendance-report-btn-print"
                onclick="window.print()"
            >
                <span class="attendance-report-btn-icon">
                    🖨
                </span>

                Cetak / Simpan PDF
            </button>

        </div>

    </div>


    {{-- =====================================================
         REPORT CARD
    ====================================================== --}}

    <div class="attendance-report-card">


        {{-- =================================================
             SCHOOL HEADER
        ================================================== --}}

        <div class="attendance-report-school-header">

            <div class="attendance-report-logo-wrapper">

                <img
                    src="{{ asset('images/logo.jpg') }}"
                    alt="Logo MA Az-Zahra Parongpong"
                    class="attendance-report-logo"
                >

            </div>


            <div class="attendance-report-school-info">

                <h1 class="attendance-report-school-name">
                    MA Az-Zahra Parongpong
                </h1>

                <p class="attendance-report-school-system">
                    SISTEM INFORMASI ABSENSI SISWA
                </p>

                <p class="attendance-report-school-address">
                    Kabupaten Bandung Barat
                </p>

            </div>

        </div>


        {{-- =================================================
             REPORT HEADING
        ================================================== --}}

        <div class="attendance-report-heading">

            <div class="attendance-report-heading-label">
                Laporan Akademik
            </div>

            <h2>
                LAPORAN ABSENSI SISWA
            </h2>

            <p>
                Rekapitulasi kehadiran siswa berdasarkan periode absensi
            </p>

        </div>


        {{-- =================================================
             DETERMINE CLASS
        ================================================== --}}

        @php

            /*
             * Jika controller mengirim $selectedClass,
             * maka gunakan data tersebut.
             *
             * Jika belum ada, sistem mencoba mengambil
             * kelas dari data absensi pertama.
             */

            $reportClassName = 'Semua Kelas';

            if (isset($selectedClass) && $selectedClass) {

                if (is_object($selectedClass)) {
                    $reportClassName = $selectedClass->name ?? 'Kelas Terpilih';
                } else {
                    $reportClassName = $selectedClass;
                }

            } elseif ($details->count() > 0) {

                $firstDetail = $details->first();

                $reportClassName =
                    optional(
                        $firstDetail->student->schoolClass
                    )->name ?? 'Semua Kelas';
            }

        @endphp


        {{-- =================================================
             REPORT INFORMATION
        ================================================== --}}

        <div class="attendance-report-info-grid">


            {{-- PERIODE --}}

            <div class="attendance-report-info-card">

                <div class="attendance-report-info-icon">
                    📅
                </div>

                <div class="attendance-report-info-content">

                    <span class="attendance-report-info-label">
                        Periode Absensi
                    </span>

                    <span class="attendance-report-info-value">

                        {{
                            \Carbon\Carbon::parse(
                                $range['date_from']
                            )->translatedFormat('d F Y')
                        }}

                        &nbsp; — &nbsp;

                        {{
                            \Carbon\Carbon::parse(
                                $range['date_to']
                            )->translatedFormat('d F Y')
                        }}

                    </span>

                </div>

            </div>


            {{-- KELAS --}}

            <div class="attendance-report-info-card">

                <div class="attendance-report-info-icon">
                    🏫
                </div>

                <div class="attendance-report-info-content">

                    <span class="attendance-report-info-label">
                        Kelas
                    </span>

                    <span class="attendance-report-info-value">
                        {{ $reportClassName }}
                    </span>

                </div>

                <span class="attendance-report-info-badge">
                    Data Kehadiran
                </span>

            </div>

        </div>


        {{-- =================================================
             CALCULATE STATISTICS
        ================================================== --}}

        @php

            $totalHadir = 0;
            $totalIzin = 0;
            $totalSakit = 0;
            $totalAlfa = 0;

            foreach ($details as $detail) {

                $status = strtoupper(
                    $detail->status
                );

                if ($status === 'HADIR') {

                    $totalHadir++;

                } elseif ($status === 'IZIN') {

                    $totalIzin++;

                } elseif ($status === 'SAKIT') {

                    $totalSakit++;

                } elseif ($status === 'ALFA') {

                    $totalAlfa++;
                }
            }

            $totalAttendance =
                $totalHadir +
                $totalIzin +
                $totalSakit +
                $totalAlfa;

        @endphp


        {{-- =================================================
             SUMMARY
        ================================================== --}}

        <div class="attendance-report-summary">


            {{-- HADIR --}}

            <div class="attendance-report-summary-item status-hadir">

                <div class="attendance-report-summary-top">

                    <span class="attendance-report-summary-label">
                        HADIR
                    </span>

                    <span class="attendance-report-summary-icon">
                        ✓
                    </span>

                </div>

                <span class="attendance-report-summary-number">
                    {{ $totalHadir }}
                </span>

            </div>


            {{-- IZIN --}}

            <div class="attendance-report-summary-item status-izin">

                <div class="attendance-report-summary-top">

                    <span class="attendance-report-summary-label">
                        IZIN
                    </span>

                    <span class="attendance-report-summary-icon">
                        !
                    </span>

                </div>

                <span class="attendance-report-summary-number">
                    {{ $totalIzin }}
                </span>

            </div>


            {{-- SAKIT --}}

            <div class="attendance-report-summary-item status-sakit">

                <div class="attendance-report-summary-top">

                    <span class="attendance-report-summary-label">
                        SAKIT
                    </span>

                    <span class="attendance-report-summary-icon">
                        +
                    </span>

                </div>

                <span class="attendance-report-summary-number">
                    {{ $totalSakit }}
                </span>

            </div>


            {{-- ALFA --}}

            <div class="attendance-report-summary-item status-alfa">

                <div class="attendance-report-summary-top">

                    <span class="attendance-report-summary-label">
                        ALFA
                    </span>

                    <span class="attendance-report-summary-icon">
                        ×
                    </span>

                </div>

                <span class="attendance-report-summary-number">
                    {{ $totalAlfa }}
                </span>

            </div>

        </div>


        {{-- =================================================
             TABLE HEADING
        ================================================== --}}

        <div class="attendance-report-table-heading">

            <div>

                <h3 class="attendance-report-table-title">
                    Detail Kehadiran
                </h3>

                <p class="attendance-report-table-caption">

                    @if ($reportClassName !== 'Semua Kelas')

                        Daftar absensi siswa kelas
                        <strong>{{ $reportClassName }}</strong>
                        pada periode yang dipilih.

                    @else

                        Daftar seluruh absensi siswa pada periode
                        yang dipilih.

                    @endif

                </p>

            </div>


            <div class="attendance-report-total">

                Total Data:
                {{ $totalAttendance }}

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="attendance-report-table-wrapper">

            <table class="attendance-report-table">

                <thead>

                    <tr>

                        <th style="width: 45px; text-align: center;">
                            No
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Kelas
                        </th>

                        <th>
                            Mata Pelajaran
                        </th>

                        <th>
                            Nama Siswa
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Keterangan
                        </th>

                    </tr>

                </thead>


                <tbody>

                @forelse ($details as $index => $detail)

                    @php

                        $status = strtoupper(
                            $detail->status
                        );

                        $statusClass = match ($status) {

                            'HADIR'
                                => 'attendance-report-status-hadir',

                            'IZIN'
                                => 'attendance-report-status-izin',

                            'SAKIT'
                                => 'attendance-report-status-sakit',

                            'ALFA'
                                => 'attendance-report-status-alfa',

                            default
                                => 'attendance-report-status-default',
                        };

                    @endphp


                    <tr>


                        {{-- NO --}}

                        <td class="attendance-report-table-number">

                            {{ $loop->iteration }}

                        </td>


                        {{-- TANGGAL --}}

                        <td class="attendance-report-date">

                            {{
                                optional(
                                    $detail->session
                                )->date?->format('d/m/Y')
                                ?? '-'
                            }}

                        </td>


                        {{-- KELAS --}}

                        <td>

                            <span class="attendance-report-class">

                                {{
                                    optional(
                                        $detail->student->schoolClass
                                    )->name ?? '-'
                                }}

                            </span>

                        </td>


                        {{-- MAPEL --}}

                        <td class="attendance-report-subject">

                            {{
                                optional(
                                    $detail->session
                                        ?->teachingSchedule
                                        ?->subject
                                )->name ?? '-'
                            }}

                        </td>


                        {{-- SISWA --}}

                        <td class="attendance-report-student">

                            {{ $detail->student->name }}

                        </td>


                        {{-- STATUS --}}

                        <td>

                            <span
                                class="attendance-report-status {{ $statusClass }}"
                            >

                                {{ $status }}

                            </span>

                        </td>


                        {{-- KETERANGAN --}}

                        <td class="attendance-report-note">

                            {{ $detail->keterangan ?: '-' }}

                        </td>


                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="7"
                            class="attendance-report-empty"
                        >

                            <div class="attendance-report-empty-icon">
                                —
                            </div>

                            <span class="attendance-report-empty-title">
                                Tidak ada data absensi
                            </span>

                            <span class="attendance-report-empty-text">
                                Tidak ditemukan data absensi pada
                                periode dan kelas tersebut.
                            </span>

                        </td>

                    </tr>


                @endforelse

                </tbody>

            </table>

        </div>


        {{-- =================================================
             FOOTER
        ================================================== --}}

        <div class="attendance-report-footer">

            <div class="attendance-report-footer-brand">

                Sistem Informasi Absensi
                ·
                MA Az-Zahra Parongpong

            </div>


            <div class="attendance-report-footer-date">

                Dicetak pada:

                {{ now()->format('d/m/Y H:i') }}

            </div>

        </div>

    </div>

</div>


</body>

</html>