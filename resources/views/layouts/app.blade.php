<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Absensi MA Az-Zahra')
    </title>

    {{-- =====================================================
         FAVICON LOGO SEKOLAH
    ====================================================== --}}
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/logo.jpg') }}"
    >

    <link
        rel="shortcut icon"
        type="image/png"
        href="{{ asset('images/logo.jpg') }}"
    >

    {{-- =====================================================
         FONT
    ====================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- =====================================================
         FONT AWESOME
    ====================================================== --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    {{-- =====================================================
         SWEETALERT2
    ====================================================== --}}
    <script
        src="https://cdn.jsdelivr.net/npm/sweetalert2@11"
    ></script>


    <style>

        /* =====================================================
           ROOT
        ====================================================== */

        :root {

            --primary: #0788c9;
            --primary-dark: #066fa8;
            --primary-deep: #055b89;
            --primary-light: #eaf7fd;

            --sidebar: #0788c9;
            --sidebar-dark: #056fa5;

            --white: #ffffff;

            --bg: #f5f8fc;
            --surface: #ffffff;

            --text: #172033;
            --text-secondary: #475569;
            --text-muted: #64748b;

            --border: #e2e8f0;

            --success: #16a34a;
            --warning: #d97706;
            --danger: #dc2626;

            --sidebar-width: 260px;

            --shadow-sm:
                0 4px 15px rgba(15, 23, 42, .04);

            --shadow-md:
                0 10px 30px rgba(15, 23, 42, .07);

            --shadow-lg:
                0 20px 50px rgba(15, 23, 42, .10);

            --radius-sm: 9px;
            --radius-md: 13px;
            --radius-lg: 18px;
        }


        /* =====================================================
           RESET
        ====================================================== */

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }


        html {
            width: 100%;
            min-height: 100%;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }


        body {

            margin: 0;
            padding: 0;

            width: 100%;
            min-height: 100vh;

            overflow-x: hidden;

            font-family: 'Poppins', sans-serif;

            background:
                radial-gradient(
                    circle at 80% 10%,
                    rgba(7, 136, 201, .035),
                    transparent 25%
                ),
                var(--bg);

            color: var(--text);

            -webkit-font-smoothing: antialiased;
        }


        img {
            max-width: 100%;
            height: auto;
        }


        a {
            text-decoration: none;
        }


        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }


        button {
            outline: none;
        }


        /* =====================================================
           APP LAYOUT
        ====================================================== */

        .app-layout {

            width: 100%;
            min-height: 100vh;

            display: flex;
        }


        /* =====================================================
           SIDEBAR
        ====================================================== */

        .sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: var(--sidebar-width);
            height: 100vh;

            display: flex;
            flex-direction: column;

            z-index: 1000;

            overflow-y: auto;
            overflow-x: hidden;

            color: white;

            background:

                radial-gradient(
                    circle at 15% 5%,
                    rgba(255,255,255,.12),
                    transparent 25%
                ),

                linear-gradient(
                    160deg,
                    #078dcc 0%,
                    #087fbd 55%,
                    #076fa6 100%
                );

            border-right:
                1px solid rgba(255,255,255,.10);

            box-shadow:
                8px 0 35px rgba(15, 70, 100, .07);

            transition:
                transform .35s cubic-bezier(.4,0,.2,1),
                box-shadow .3s ease;
        }


        /* =====================================================
           SIDEBAR SCROLLBAR
        ====================================================== */

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }


        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }


        .sidebar::-webkit-scrollbar-thumb {

            background:
                rgba(255,255,255,.22);

            border-radius: 20px;
        }


        /* =====================================================
           SIDEBAR BRAND
        ====================================================== */

        .sidebar-brand {

            position: relative;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 21px 18px;

            border-bottom:
                1px solid rgba(255,255,255,.11);
        }


        .brand-logo-wrapper {

            position: relative;

            width: 46px;
            height: 46px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .brand-logo-wrapper::after {

            content: "";

            position: absolute;

            inset: -3px;

            border:
                1px solid rgba(255,255,255,.22);

            border-radius: 14px;

            opacity: 0;

            transform: scale(.85);

            transition: .3s ease;
        }


        .sidebar-brand:hover
        .brand-logo-wrapper::after {

            opacity: 1;

            transform: scale(1);
        }


        .brand-logo {

            width: 44px;
            height: 44px;

            object-fit: contain;

            padding: 4px;

            background: white;

            border-radius: 12px;

            box-shadow:
                0 6px 15px rgba(0,0,0,.12);

            transition:
                transform .3s ease;
        }


        .sidebar-brand:hover
        .brand-logo {

            transform:
                translateY(-2px)
                rotate(-2deg);
        }


        .brand-text {
            min-width: 0;
        }


        .brand-title {

            margin: 0;

            color: white;

            font-size: 14px;

            font-weight: 800;

            letter-spacing: -.2px;

            line-height: 1.3;
        }


        .brand-subtitle {

            margin: 3px 0 0;

            color:
                rgba(255,255,255,.68);

            font-size: 9px;

            line-height: 1.4;
        }


        /* =====================================================
           USER PROFILE
        ====================================================== */

        .sidebar-user {

            position: relative;

            display: flex;
            align-items: center;

            gap: 10px;

            margin: 17px 13px 8px;

            padding: 12px;

            border:
                1px solid rgba(255,255,255,.10);

            border-radius: 14px;

            background:
                rgba(255,255,255,.09);

            backdrop-filter: blur(8px);

            transition:
                background .25s ease,
                transform .25s ease;
        }


        .sidebar-user:hover {

            background:
                rgba(255,255,255,.13);

            transform:
                translateY(-1px);
        }


        .user-avatar {

            position: relative;

            width: 39px;
            height: 39px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: white;

            color: var(--primary);

            font-size: 14px;

            font-weight: 800;

            box-shadow:
                0 5px 14px rgba(0,0,0,.10);
        }


        .user-avatar::after {

            content: "";

            position: absolute;

            right: -2px;
            bottom: -2px;

            width: 10px;
            height: 10px;

            border-radius: 50%;

            background: #22c55e;

            border:
                2px solid #087fbd;
        }


        .user-info {

            min-width: 0;

            flex: 1;
        }


        .user-name {

            color: white;

            font-size: 11px;

            font-weight: 700;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .user-role {

            display: inline-flex;

            margin-top: 3px;

            color:
                rgba(255,255,255,.66);

            font-size: 8px;

            text-transform: uppercase;

            letter-spacing: .6px;
        }


        /* =====================================================
           SIDEBAR MENU
        ====================================================== */

        .sidebar-menu {

            flex: 1;

            padding: 11px 11px 18px;
        }


        .menu-title {

            display: flex;

            align-items: center;

            gap: 8px;

            padding:
                15px 11px 7px;

            color:
                rgba(255,255,255,.45);

            font-size: 8px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1.1px;
        }


        .menu-title::after {

            content: "";

            height: 1px;

            flex: 1;

            background:
                rgba(255,255,255,.08);
        }


        /* =====================================================
           MENU LINK
        ====================================================== */

        .menu-link {

            position: relative;

            display: flex;
            align-items: center;

            gap: 11px;

            width: 100%;

            min-height: 43px;

            margin-bottom: 3px;

            padding: 9px 12px;

            color:
                rgba(255,255,255,.78);

            border-radius: 10px;

            font-size: 10.5px;

            font-weight: 500;

            overflow: hidden;

            transition:
                color .25s ease,
                background .25s ease,
                transform .25s ease;
        }


        .menu-link::before {

            content: "";

            position: absolute;

            left: 0;

            top: 8px;
            bottom: 8px;

            width: 3px;

            border-radius:
                0 5px 5px 0;

            background: white;

            transform:
                translateX(-5px)
                scaleY(.4);

            opacity: 0;

            transition:
                .25s cubic-bezier(.4,0,.2,1);
        }


        .menu-link i {

            position: relative;

            z-index: 1;

            width: 20px;

            flex-shrink: 0;

            text-align: center;

            font-size: 13px;

            opacity: .85;

            transition:
                transform .25s ease,
                opacity .25s ease;
        }


        .menu-link span {

            position: relative;

            z-index: 1;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .menu-link:hover {

            color: white;

            background:
                rgba(255,255,255,.09);

            transform:
                translateX(2px);
        }


        .menu-link:hover i {

            opacity: 1;

            transform:
                scale(1.08);
        }


        .menu-link.active {

            color: var(--primary);

            background: white;

            font-weight: 700;

            box-shadow:
                0 7px 18px rgba(0,0,0,.08);

            transform:
                translateX(2px);
        }


        .menu-link.active::before {

            opacity: 1;

            transform:
                translateX(0)
                scaleY(1);
        }


        .menu-link.active i {

            color: var(--primary);

            opacity: 1;
        }


        /* =====================================================
           SIDEBAR FOOTER
        ====================================================== */

        .sidebar-footer {

            padding: 11px;

            border-top:
                1px solid rgba(255,255,255,.11);
        }


        /* =====================================================
           LOGOUT BUTTON
        ====================================================== */

        .logout-button {

            position: relative;

            width: 100%;

            min-height: 42px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 9px 12px;

            border:
                1px solid rgba(255,255,255,.10);

            border-radius: 10px;

            background:
                rgba(255,255,255,.08);

            color: white;

            cursor: pointer;

            font-size: 10.5px;

            font-weight: 600;

            overflow: hidden;

            transition:
                background .25s ease,
                transform .25s ease,
                border-color .25s ease;
        }


        .logout-button::before {

            content: "";

            position: absolute;

            top: 0;
            left: -100%;

            width: 70%;
            height: 100%;

            background:

                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,.13),
                    transparent
                );

            transform:
                skewX(-20deg);

            transition:
                left .55s ease;
        }


        .logout-button:hover {

            background:
                rgba(255,255,255,.14);

            border-color:
                rgba(255,255,255,.16);

            transform:
                translateY(-1px);
        }


        .logout-button:hover::before {
            left: 130%;
        }


        .logout-button i {
            font-size: 12px;
        }


        .logout-button:disabled {

            cursor: wait;

            opacity: .75;

            transform: none;
        }


        /* =====================================================
           MAIN WRAPPER
        ====================================================== */

        .main-wrapper {

            width: 100%;

            min-width: 0;

            min-height: 100vh;

            margin-left:
                var(--sidebar-width);

            display: flex;

            flex-direction: column;
        }


        /* =====================================================
           TOPBAR
        ====================================================== */

        .topbar {

            position: sticky;

            top: 0;

            z-index: 900;

            width: 100%;

            height: 70px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:
                0 30px;

            background:
                rgba(255,255,255,.88);

            backdrop-filter:
                blur(16px);

            border-bottom:
                1px solid rgba(226,232,240,.85);

            box-shadow:
                0 3px 15px rgba(15,23,42,.025);
        }


        .topbar-left {

            min-width: 0;

            display: flex;

            align-items: center;

            gap: 14px;
        }


        .mobile-menu-button {

            display: none;

            width: 38px;
            height: 38px;

            align-items: center;
            justify-content: center;

            border:
                1px solid var(--border);

            border-radius: 10px;

            background: white;

            color: var(--text);

            cursor: pointer;

            transition:
                .25s ease;
        }


        .mobile-menu-button:hover {

            color: var(--primary);

            border-color:
                #b9dcec;

            background:
                var(--primary-light);

            transform:
                translateY(-1px);
        }


        .page-heading {

            margin: 0;

            color: var(--text);

            font-size: 16px;

            font-weight: 700;

            letter-spacing: -.3px;

            line-height: 1.25;
        }


        .page-breadcrumb {

            margin-top: 3px;

            color:
                var(--text-muted);

            font-size: 9px;
        }


        .topbar-right {

            display: flex;

            align-items: center;

            gap: 13px;
        }


        .topbar-date {

            display: flex;

            align-items: center;

            gap: 6px;

            color:
                var(--text-muted);

            font-size: 9px;
        }


        .topbar-date i {
            color:
                var(--primary);
        }


        .topbar-user {

            position: relative;

            width: 37px;
            height: 37px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background:
                var(--primary-light);

            color:
                var(--primary);

            font-size: 12px;

            font-weight: 800;

            border:
                1px solid #d8edf8;

            box-shadow:
                0 4px 10px rgba(7,136,201,.06);
        }


        .topbar-user::after {

            content: "";

            position: absolute;

            width: 7px;
            height: 7px;

            right: -1px;
            top: -1px;

            border-radius: 50%;

            background: #22c55e;

            border:
                2px solid white;
        }


        /* =====================================================
           MAIN CONTENT
        ====================================================== */

        .main-content {

            flex: 1;

            width: 100%;

            min-width: 0;

            padding:
                28px 30px;

            animation:
                pageContentEnter .45s ease both;
        }


        @keyframes pageContentEnter {

            from {

                opacity: 0;

                transform:
                    translateY(7px);
            }

            to {

                opacity: 1;

                transform:
                    translateY(0);
            }
        }


        .content-container {

            width: 100%;

            max-width: 1400px;

            min-width: 0;

            margin: 0 auto;
        }


        /* =====================================================
           ALERT
        ====================================================== */

        .alert {

            position: relative;

            display: flex;

            align-items: flex-start;

            gap: 11px;

            width: 100%;

            padding:
                13px 15px;

            margin-bottom:
                20px;

            border-radius:
                12px;

            font-size: 11px;

            line-height: 1.55;

            animation:
                alertEnter .35s ease both;
        }


        @keyframes alertEnter {

            from {

                opacity: 0;

                transform:
                    translateY(-5px);
            }

            to {

                opacity: 1;

                transform:
                    translateY(0);
            }
        }


        .alert i {

            margin-top: 2px;

            flex-shrink: 0;
        }


        .alert-status {

            color: #166534;

            background:
                #effdf5;

            border:
                1px solid #c5f0d4;
        }


        .alert-errors {

            color: #991b1b;

            background:
                #fff5f5;

            border:
                1px solid #fecaca;
        }


        .alert-errors ul {

            margin: 0;

            padding-left: 17px;
        }


        /* =====================================================
           GENERIC CARD
        ====================================================== */

        .app-card {

            width: 100%;

            padding: 22px;

            background:
                var(--surface);

            border:
                1px solid var(--border);

            border-radius:
                var(--radius-md);

            box-shadow:
                var(--shadow-sm);

            transition:
                box-shadow .25s ease,
                border-color .25s ease;
        }


        .app-card:hover {

            border-color:
                #d7e2eb;

            box-shadow:
                var(--shadow-md);
        }


        /* =====================================================
           TABLE
        ====================================================== */

        .table-responsive,
        .teacher-table-wrapper,
        .student-table-wrapper,
        .table-wrapper {

            width: 100%;

            max-width: 100%;

            overflow-x: auto;

            overflow-y: hidden;

            -webkit-overflow-scrolling: touch;

            scrollbar-width: thin;
        }


        table {

            width: 100%;

            border-collapse:
                separate;

            border-spacing: 0;

            margin-top: 15px;

            background: white;

            border:
                1px solid var(--border);

            border-radius:
                12px;

            overflow: hidden;
        }


        th {

            padding:
                13px 14px;

            background:
                #f8fafc;

            color:
                #475569;

            border-bottom:
                1px solid var(--border);

            font-size: 10px;

            font-weight: 700;

            text-align: left;

            white-space: nowrap;
        }


        td {

            padding:
                12px 14px;

            color:
                #475569;

            border-bottom:
                1px solid #f1f5f9;

            font-size: 10.5px;
        }


        tr:last-child td {
            border-bottom: none;
        }


        tbody tr {

            transition:
                background .2s ease;
        }


        tbody tr:hover {

            background:
                #f8fbfd;
        }


        .table-responsive table,
        .teacher-table-wrapper table,
        .student-table-wrapper table,
        .table-wrapper table {

            min-width: 650px;
        }


        /* =====================================================
           BUTTON
        ====================================================== */

        .btn {

            position: relative;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            min-height: 36px;

            padding:
                8px 14px;

            border:
                1px solid transparent;

            border-radius:
                9px;

            background:
                var(--primary);

            color: white;

            cursor: pointer;

            font-size: 10.5px;

            font-weight: 600;

            text-decoration: none;

            box-shadow:
                0 4px 10px rgba(7,136,201,.10);

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }


        .btn:hover {

            background:
                var(--primary-dark);

            color: white;

            transform:
                translateY(-1px);

            box-shadow:
                0 7px 15px rgba(7,136,201,.15);
        }


        .btn:active {
            transform:
                translateY(0);
        }


        .btn-danger {
            background:
                #ef4444;
        }


        .btn-danger:hover {
            background:
                #dc2626;
        }


        .btn-secondary {
            background:
                #64748b;
        }


        .btn-secondary:hover {
            background:
                #475569;
        }


        .btn-success {
            background:
                #16a34a;
        }


        .btn-success:hover {
            background:
                #15803d;
        }


        .btn-warning {
            background:
                #d97706;
        }


        .btn-warning:hover {
            background:
                #b45309;
        }


        .btn-outline {

            background:
                white;

            color:
                var(--primary);

            border:
                1px solid #bae6fd;

            box-shadow:
                none;
        }


        .btn-outline:hover {

            background:
                var(--primary-light);

            color:
                var(--primary-dark);

            box-shadow:
                none;
        }


        /* =====================================================
           FORM
        ====================================================== */

        label {

            display: block;

            margin-top: 15px;

            margin-bottom: 6px;

            color:
                #334155;

            font-size: 10.5px;

            font-weight: 700;
        }


        input,
        select,
        textarea {

            width: 100%;

            max-width: 100%;

            margin-top: 0;

            padding:
                10px 12px;

            border:
                1px solid #dbe3ec;

            border-radius:
                9px;

            outline: none;

            background:
                white;

            color:
                #334155;

            font-size: 10.5px;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }


        input:hover,
        select:hover,
        textarea:hover {

            border-color:
                #cbd8e4;
        }


        input:focus,
        select:focus,
        textarea:focus {

            border-color:
                var(--primary);

            background:
                #fcfeff;

            box-shadow:
                0 0 0 3px
                rgba(7,136,201,.08);
        }


        textarea {

            min-height: 100px;

            resize: vertical;
        }


        /* =====================================================
           FORM GRID
        ====================================================== */

        .form-grid {

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 16px;
        }


        .form-group {

            width: 100%;

            min-width: 0;
        }


        .form-group.full-width {

            grid-column:
                1 / -1;
        }


        /* =====================================================
           BUTTON GROUP
        ====================================================== */

        .button-group {

            display: flex;

            flex-wrap: wrap;

            gap: 8px;
        }


        /* =====================================================
           BADGE
        ====================================================== */

        .badge {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 5px;

            padding:
                4px 9px;

            border-radius:
                20px;

            font-size: 8.5px;

            font-weight: 700;

            color: white;
        }


        .badge-HADIR {
            background:
                #16a34a;
        }


        .badge-IZIN {
            background:
                #d97706;
        }


        .badge-SAKIT {
            background:
                #2563eb;
        }


        .badge-ALFA {
            background:
                #dc2626;
        }


        /* =====================================================
           SWEETALERT LOGOUT
        ====================================================== */

        .logout-swal-popup {

            width:
                min(420px, calc(100vw - 30px)) !important;

            padding:
                30px 28px 26px !important;

            border-radius:
                22px !important;

            font-family:
                'Poppins', sans-serif !important;

            box-shadow:
                0 25px 70px rgba(15, 23, 42, .18) !important;
        }


        .logout-swal-title {

            margin-top:
                8px !important;

            color:
                #172033 !important;

            font-size:
                20px !important;

            font-weight:
                700 !important;
        }


        .logout-swal-text {

            margin-top:
                6px !important;

            color:
                #64748b !important;

            font-size:
                11px !important;

            line-height:
                1.7 !important;
        }


        .logout-swal-confirm,
        .logout-swal-cancel {

            min-height:
                40px !important;

            padding:
                9px 18px !important;

            border-radius:
                10px !important;

            font-family:
                'Poppins', sans-serif !important;

            font-size:
                11px !important;

            font-weight:
                600 !important;

            cursor:
                pointer !important;

            transition:
                all .2s ease !important;
        }


        .logout-swal-confirm {

            background:
                #0788c9 !important;

            color:
                #ffffff !important;

            border:
                1px solid #0788c9 !important;

            box-shadow:
                0 6px 16px rgba(7, 136, 201, .18) !important;
        }


        .logout-swal-confirm:hover {

            background:
                #066fa8 !important;

            border-color:
                #066fa8 !important;

            transform:
                translateY(-1px);
        }


        .logout-swal-cancel {

            margin-right:
                8px !important;

            background:
                #f1f5f9 !important;

            color:
                #475569 !important;

            border:
                1px solid #e2e8f0 !important;
        }


        .logout-swal-cancel:hover {

            background:
                #e2e8f0 !important;

            color:
                #334155 !important;
        }


        /* =====================================================
           SWEETALERT ICON
        ====================================================== */

        .swal2-icon.swal2-question {

            border-color:
                #0788c9 !important;

            color:
                #0788c9 !important;
        }


        .swal2-icon.swal2-question
        .swal2-icon-content {

            font-size:
                2.2em !important;
        }


        /* =====================================================
           MOBILE OVERLAY
        ====================================================== */

        .sidebar-overlay {

            display: none;

            position: fixed;

            inset: 0;

            z-index: 999;

            background:
                rgba(15,23,42,.42);

            backdrop-filter:
                blur(3px);

            opacity: 0;

            transition:
                opacity .3s ease;
        }


        .sidebar-overlay.mobile-open {

            display: block;

            opacity: 1;
        }


        /* =====================================================
           TABLET
        ====================================================== */

        @media (max-width: 1000px) {

            :root {

                --sidebar-width:
                    235px;
            }


            .topbar {

                padding:
                    0 20px;
            }


            .main-content {

                padding:
                    22px 20px;
            }


            .topbar-date {

                display: none;
            }
        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 700px) {

            :root {

                --sidebar-width:
                    260px;
            }


            .sidebar {

                transform:
                    translateX(-100%);

                box-shadow:
                    15px 0 40px rgba(15,23,42,.16);
            }


            .sidebar.mobile-open {

                transform:
                    translateX(0);
            }


            .main-wrapper {

                margin-left:
                    0;
            }


            .mobile-menu-button {

                display:
                    flex;
            }


            .topbar {

                height:
                    62px;

                padding:
                    0 15px;
            }


            .topbar-left {

                gap:
                    10px;
            }


            .page-heading {

                max-width:
                    210px;

                font-size:
                    14px;

                white-space:
                    nowrap;

                overflow:
                    hidden;

                text-overflow:
                    ellipsis;
            }


            .page-breadcrumb {

                max-width:
                    220px;

                white-space:
                    nowrap;

                overflow:
                    hidden;

                text-overflow:
                    ellipsis;
            }


            .topbar-user {

                width:
                    34px;

                height:
                    34px;

                border-radius:
                    10px;
            }


            .main-content {

                width:
                    100%;

                padding:
                    15px;
            }


            .app-card {

                padding:
                    16px;

                border-radius:
                    12px;
            }


            .form-grid {

                grid-template-columns:
                    1fr;

                gap:
                    10px;
            }


            .form-group.full-width {

                grid-column:
                    auto;
            }


            .button-group {

                width:
                    100%;

                flex-direction:
                    column;
            }


            .button-group .btn {

                width:
                    100%;
            }


            .btn {

                min-height:
                    38px;
            }


            input,
            select,
            textarea {

                max-width:
                    100%;
            }


            /* SweetAlert mobile */

            .logout-swal-popup {

                width:
                    calc(100vw - 24px) !important;

                padding:
                    25px 20px 22px !important;

                border-radius:
                    18px !important;
            }


            .logout-swal-title {

                font-size:
                    17px !important;
            }


            .logout-swal-text {

                font-size:
                    10px !important;
            }


            .logout-swal-confirm,
            .logout-swal-cancel {

                min-height:
                    42px !important;

                font-size:
                    10px !important;
            }
        }


        /* =====================================================
           SMALL MOBILE
        ====================================================== */

        @media (max-width: 480px) {

            .topbar {

                padding:
                    0 12px;
            }


            .page-heading {

                max-width:
                    175px;

                font-size:
                    13px;
            }


            .page-breadcrumb {

                font-size:
                    8px;

                max-width:
                    175px;
            }


            .topbar-right {

                gap:
                    5px;
            }


            .topbar-user {

                flex-shrink:
                    0;
            }


            .main-content {

                padding:
                    11px;
            }


            .app-card {

                padding:
                    13px;

                border-radius:
                    10px;
            }


            .page-header {

                margin-bottom:
                    14px;
            }


            .btn {

                width:
                    100%;
            }


            .alert {

                padding:
                    11px 12px;

                font-size:
                    10px;
            }
        }


        /* =====================================================
           LANDSCAPE MOBILE
        ====================================================== */

        @media (max-width: 700px)
        and (orientation: landscape) {

            .sidebar {

                overflow-y:
                    auto;
            }


            .main-content {

                padding:
                    12px;
            }
        }


        /* =====================================================
           REDUCE MOTION
        ====================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {

                animation-duration:
                    .01ms !important;

                animation-iteration-count:
                    1 !important;

                transition-duration:
                    .01ms !important;

                scroll-behavior:
                    auto !important;
            }
        }

    </style>

</head>


<body>


@auth

<div class="app-layout">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside
        class="sidebar"
        id="sidebar"
    >


        {{-- =================================================
             BRAND
        ================================================== --}}

        <div class="sidebar-brand">

            <div class="brand-logo-wrapper">

                <img
                    src="{{ asset('images/logo.jpg') }}"
                    alt="Logo MA Az-Zahra"
                    class="brand-logo"
                >

            </div>


            <div class="brand-text">

                <h1 class="brand-title">
                    MA Az-Zahra
                </h1>

                <p class="brand-subtitle">
                    Sistem Informasi Sekolah
                </p>

            </div>

        </div>


        {{-- =================================================
             USER
        ================================================== --}}

        <div class="sidebar-user">

            <div class="user-avatar">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>


            <div class="user-info">

                <div class="user-name">

                    {{ auth()->user()->name }}

                </div>


                <span class="user-role">

                    {{ auth()->user()->role }}

                </span>

            </div>

        </div>


        {{-- =================================================
             MENU
        ================================================== --}}

        <div class="sidebar-menu">


            @if (auth()->user()->isAdmin())


                {{-- =================================================
                     MENU UTAMA
                ================================================== --}}

                <div class="menu-title">
                    Menu Utama
                </div>


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-house"></i>

                    <span>
                        Dashboard
                    </span>

                </a>


                {{-- =================================================
                     DATA SEKOLAH
                ================================================== --}}

                <div class="menu-title">
                    Data Sekolah
                </div>


                <a
                    href="{{ route('admin.teachers.index') }}"
                    class="menu-link {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-chalkboard-user"></i>

                    <span>
                        Data Guru
                    </span>

                </a>


                <a
                    href="{{ route('admin.students.index') }}"
                    class="menu-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-user-graduate"></i>

                    <span>
                        Data Siswa
                    </span>

                </a>


                <a
                    href="{{ route('admin.classes.index') }}"
                    class="menu-link {{ request()->routeIs('admin.classes.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-school"></i>

                    <span>
                        Data Kelas
                    </span>

                </a>


                <a
                    href="{{ route('admin.subjects.index') }}"
                    class="menu-link {{ request()->routeIs('admin.subjects.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-book"></i>

                    <span>
                        Mata Pelajaran
                    </span>

                </a>


                {{-- =================================================
                     AKADEMIK
                ================================================== --}}

                <div class="menu-title">
                    Akademik
                </div>


                <a
                    href="{{ route('admin.academic-years.index') }}"
                    class="menu-link {{ request()->routeIs('admin.academic-years.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-calendar-days"></i>

                    <span>
                        Tahun Ajaran
                    </span>

                </a>


                <a
                    href="{{ route('admin.schedules.index') }}"
                    class="menu-link {{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-calendar-check"></i>

                    <span>
                        Jadwal Mengajar
                    </span>

                </a>


                {{-- =================================================
                     ABSENSI
                ================================================== --}}

                <div class="menu-title">
                    Absensi
                </div>


                <a
                    href="{{ route('admin.monitoring.index') }}"
                    class="menu-link {{ request()->routeIs('admin.monitoring.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-chart-line"></i>

                    <span>
                        Monitoring Absensi
                    </span>

                </a>


                <a
                    href="{{ route('admin.reports.index') }}"
                    class="menu-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-file-lines"></i>

                    <span>
                        Laporan
                    </span>

                </a>


                {{-- =================================================
                     PENGATURAN
                ================================================== --}}

                <div class="menu-title">
                    Pengaturan
                </div>


                <a
                    href="{{ route('admin.password-requests.index') }}"
                    class="menu-link {{ request()->routeIs('admin.password-requests.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-key"></i>

                    <span>
                        Permintaan Reset Password
                    </span>

                </a>


            @else


                {{-- =================================================
                     MENU GURU
                ================================================== --}}

                <div class="menu-title">
                    Menu Utama
                </div>


                <a
                    href="{{ route('guru.dashboard') }}"
                    class="menu-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-house"></i>

                    <span>
                        Dashboard
                    </span>

                </a>


                {{-- =================================================
                     AKADEMIK
                ================================================== --}}

                <div class="menu-title">
                    Akademik
                </div>


                <a
                    href="{{ route('guru.jadwal.index') }}"
                    class="menu-link {{ request()->routeIs('guru.jadwal.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-calendar-days"></i>

                    <span>
                        Jadwal Mengajar
                    </span>

                </a>


                {{-- =================================================
                     AKUN
                ================================================== --}}

                <div class="menu-title">
                    Akun
                </div>


                <a
                    href="{{ route('guru.account.edit') }}"
                    class="menu-link {{ request()->routeIs('guru.account.*') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-user-gear"></i>

                    <span>
                        Pengaturan Akun
                    </span>

                </a>


            @endif


        </div>


        {{-- =================================================
             LOGOUT
        ================================================== --}}

        <div class="sidebar-footer">

            <form
                method="POST"
                action="{{ route('logout') }}"
                id="logoutForm"
            >

                @csrf

                <button
                    class="logout-button"
                    type="button"
                    id="logoutButton"
                >

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>
                        Keluar dari Sistem
                    </span>

                </button>

            </form>

        </div>


    </aside>


    {{-- =====================================================
         MOBILE OVERLAY
    ====================================================== --}}

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
    ></div>


    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <div class="main-wrapper">


        {{-- =================================================
             TOPBAR
        ================================================== --}}

        <header class="topbar">


            <div class="topbar-left">


                <button
                    type="button"
                    class="mobile-menu-button"
                    id="mobileMenuButton"
                    aria-label="Buka menu"
                >

                    <i
                        class="fa-solid fa-bars"
                        id="menuIcon"
                    ></i>

                </button>


                <div>

                    <h2 class="page-heading">

                        @yield(
                            'title',
                            'Dashboard'
                        )

                    </h2>


                    <div class="page-breadcrumb">

                        Sistem Informasi MA Az-Zahra Parongpong

                    </div>

                </div>


            </div>


            <div class="topbar-right">


                <div class="topbar-date">

                    <i class="fa-regular fa-calendar"></i>

                    {{ now()->translatedFormat('d F Y') }}

                </div>


                <div class="topbar-user">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


            </div>


        </header>


        {{-- =================================================
             CONTENT
        ================================================== --}}

        <main class="main-content">

            <div class="content-container">


                {{-- =================================================
                     STATUS
                ================================================== --}}

                @if (session('status'))

                    <div class="alert alert-status">

                        <i
                            class="fa-solid fa-circle-check"
                        ></i>

                        <div>

                            {{ session('status') }}

                        </div>

                    </div>

                @endif


                {{-- =================================================
                     ERRORS
                ================================================== --}}

                @if ($errors->any())

                    <div class="alert alert-errors">

                        <i
                            class="fa-solid fa-circle-exclamation"
                        ></i>

                        <div>

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>

                @endif


                {{-- =================================================
                     PAGE CONTENT
                ================================================== --}}

                @yield('content')


            </div>

        </main>


    </div>


</div>


@else


    @yield('content')


@endauth



{{-- =====================================================
     MOBILE SIDEBAR SCRIPT
====================================================== --}}

<script>

    const sidebar =
        document.getElementById('sidebar');

    const overlay =
        document.getElementById('sidebarOverlay');

    const menuButton =
        document.getElementById('mobileMenuButton');

    const menuIcon =
        document.getElementById('menuIcon');


    /* =====================================================
       OPEN SIDEBAR
    ====================================================== */

    function openSidebar() {

        if (!sidebar) {
            return;
        }


        sidebar.classList.add(
            'mobile-open'
        );


        if (overlay) {

            overlay.classList.add(
                'mobile-open'
            );
        }


        if (menuIcon) {

            menuIcon.classList.remove(
                'fa-bars'
            );

            menuIcon.classList.add(
                'fa-xmark'
            );
        }


        if (menuButton) {

            menuButton.setAttribute(
                'aria-label',
                'Tutup menu'
            );
        }

    }


    /* =====================================================
       CLOSE SIDEBAR
    ====================================================== */

    function closeSidebar() {

        if (!sidebar) {
            return;
        }


        sidebar.classList.remove(
            'mobile-open'
        );


        if (overlay) {

            overlay.classList.remove(
                'mobile-open'
            );
        }


        if (menuIcon) {

            menuIcon.classList.remove(
                'fa-xmark'
            );

            menuIcon.classList.add(
                'fa-bars'
            );
        }


        if (menuButton) {

            menuButton.setAttribute(
                'aria-label',
                'Buka menu'
            );
        }

    }


    /* =====================================================
       MENU BUTTON
    ====================================================== */

    if (menuButton) {

        menuButton.addEventListener(
            'click',
            function () {

                if (
                    sidebar &&
                    sidebar.classList.contains(
                        'mobile-open'
                    )
                ) {

                    closeSidebar();

                } else {

                    openSidebar();

                }

            }
        );

    }


    /* =====================================================
       OVERLAY
    ====================================================== */

    if (overlay) {

        overlay.addEventListener(
            'click',
            closeSidebar
        );

    }


    /* =====================================================
       CLOSE AFTER MENU CLICK
    ====================================================== */

    document
        .querySelectorAll('.menu-link')
        .forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    closeSidebar();

                }
            );

        });


    /* =====================================================
       ESC KEY
    ====================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape'
            ) {

                closeSidebar();

            }

        }
    );


    /* =====================================================
       AUTO CLOSE WHEN SCREEN BECOMES DESKTOP
    ====================================================== */

    window.addEventListener(
        'resize',
        function () {

            if (
                window.innerWidth > 700
            ) {

                closeSidebar();

            }

        }
    );

</script>



{{-- =====================================================
     SWEETALERT LOGOUT
     LOGIC LOGOUT TETAP POST
====================================================== --}}

@auth

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const logoutButton =
            document.getElementById(
                'logoutButton'
            );


        const logoutForm =
            document.getElementById(
                'logoutForm'
            );


        if (
            !logoutButton ||
            !logoutForm
        ) {

            return;

        }


        logoutButton.addEventListener(
            'click',
            function () {


                Swal.fire({

                    title:
                        'Keluar dari sistem?',

                    text:
                        'Anda akan keluar dari akun saat ini.',

                    icon:
                        'question',


                    showCancelButton:
                        true,


                    confirmButtonText:
                        '<i class="fa-solid fa-right-from-bracket"></i> Ya, Keluar',


                    cancelButtonText:
                        'Batal',


                    reverseButtons:
                        true,


                    focusCancel:
                        true,


                    buttonsStyling:
                        false,


                    customClass: {

                        popup:
                            'logout-swal-popup',

                        title:
                            'logout-swal-title',

                        htmlContainer:
                            'logout-swal-text',

                        confirmButton:
                            'logout-swal-confirm',

                        cancelButton:
                            'logout-swal-cancel'

                    }

                }).then(
                    function (result) {


                        if (
                            result.isConfirmed
                        ) {


                            /* =================================
                               DISABLE BUTTON
                            ================================= */

                            logoutButton.disabled =
                                true;


                            /* =================================
                               LOADING STATE
                            ================================= */

                            logoutButton.innerHTML = `

                                <i class="fa-solid fa-spinner fa-spin"></i>

                                <span>
                                    Keluar...
                                </span>

                            `;


                            /* =================================
                               SUBMIT LOGOUT FORM
                            ================================= */

                            logoutForm.submit();

                        }

                    }
                );

            }
        );

    }
);

</script>

@endauth



{{-- =====================================================
     AUTO LOGOUT AFTER 5 MINUTES IDLE
     LOGIC TETAP SAMA
====================================================== --}}

@auth

<script>

(function () {


    const IDLE_LIMIT =
        5 * 60 * 1000;


    let idleTimer;


    /* =====================================================
       LOGOUT KARENA IDLE
    ====================================================== */

    function logoutBecauseIdle() {


        fetch(

            "{{ route('logout') }}",

            {

                method:
                    "POST",


                headers: {

                    "X-CSRF-TOKEN":
                        "{{ csrf_token() }}",

                    "Accept":
                        "application/json"

                },


                credentials:
                    "same-origin"

            }

        )


        .finally(
            function () {


                window.location.href =
                    "{{ route('login') }}?timeout=1";


            }
        );

    }


    /* =====================================================
       RESET IDLE TIMER
    ====================================================== */

    function resetIdleTimer() {


        clearTimeout(
            idleTimer
        );


        idleTimer = setTimeout(

            logoutBecauseIdle,

            IDLE_LIMIT

        );

    }


    /* =====================================================
       ACTIVITY EVENTS
    ====================================================== */

    const activityEvents = [

        'mousemove',

        'mousedown',

        'keydown',

        'scroll',

        'touchstart',

        'click'

    ];


    activityEvents.forEach(

        function (event) {

            document.addEventListener(

                event,

                resetIdleTimer,

                true

            );

        }

    );


    /* =====================================================
       START TIMER
    ====================================================== */

    resetIdleTimer();


})();

</script>

@endauth



</body>

</html>