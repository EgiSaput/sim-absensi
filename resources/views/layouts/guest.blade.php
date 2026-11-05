<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Absensi MA Az-Zahra')
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f8fc;
        }

        /* Jangan gunakan card lama */

        .card {
            width: 100% !important;
            max-width: none !important;
            min-height: 100vh !important;

            margin: 0 !important;
            padding: 0 !important;

            background: transparent !important;
            border: none !important;
            border-radius: 0 !important;
            box-shadow: none !important;
        }


        /* Alert */

        .guest-alert-container {
            position: fixed;

            top: 20px;
            left: 50%;

            transform: translateX(-50%);

            width: calc(100% - 40px);
            max-width: 500px;

            z-index: 9999;
        }

        .guest-alert {
            padding: 12px 16px;

            border-radius: 10px;

            font-size: 13px;

            margin-bottom: 10px;
        }

        .guest-alert.status {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .guest-alert.errors {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .guest-alert ul {
            margin: 0;
            padding-left: 18px;
        }

    </style>

    @stack('styles')

</head>

<body>

    @if (session('status') || $errors->any())

        <div class="guest-alert-container">

            @if (session('status'))

                <div class="guest-alert status">
                    {{ session('status') }}
                </div>

            @endif


            @if ($errors->any())

                <div class="guest-alert errors">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif

        </div>

    @endif


    @yield('content')


    @stack('scripts')

</body>

</html>