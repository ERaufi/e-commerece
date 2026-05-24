<!DOCTYPE html>
<html class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Authentication</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        .guest-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .guest-container {
            width: 100%;
            max-width: 520px;
        }

        .guest-title {
            color: #ffffff;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .guest-subtitle {
            color: #94a3b8;
            font-size: 0.95rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .guest-card {
            border-radius: 1.5rem;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            padding: 2rem;
        }

        .guest-card .form-actions {
            justify-content: space-between;
        }

        .guest-link {
            color: #818cf8;
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
        }

        .guest-link:hover {
            color: #ffffff;
        }

        .remember-field {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #94a3b8;
            font-size: 0.875rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .remember-field input {
            width: 1rem;
            height: 1rem;
            accent-color: #4f46e5;
        }
    </style>

    @yield('styles')
</head>

<body class="antialiased bg-mesh text-slate-100 min-h-screen">
    <main class="guest-wrapper">
        <div class="guest-container">
            @yield('content')
        </div>
    </main>
</body>

@yield('scripts')

</html>
