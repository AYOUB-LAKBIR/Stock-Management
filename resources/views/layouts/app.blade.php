<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if (app()->getLocale()=="ar") dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Management System</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI CSS -->
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nav-container {
            padding: 1rem 0;
        }
        .brand-title {
            font-size: 1.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .btn-dashboard {
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }
        .btn-dashboard:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        #selectLocale {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 6px;
            padding: 0.5rem;
        }
        #selectLocale option {
            background-color: #2a5298;
            color: white;
        }
        main {
            padding: 2rem 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        footer {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
            padding: 1.5rem 0;
            margin-top: auto;
        }
        footer p {
            font-size: 0.9rem;
            opacity: 0.9;
        }
    </style>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="min-vh-100 d-flex flex-column">
    <header>
        <nav class="container nav-container d-flex justify-content-between align-items-center p-2">
            <h1 class="brand-title text-white mb-0">@lang("Stock Management System")</h1>
            
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('dashboard') }}" class="btn-dashboard text-white text-decoration-none">@lang("Dashboard")</a>
                <select name="selectLocale" id="selectLocale" class="form-select form-select-sm">
                    <option @if(app()->getLocale() == 'ar') selected @endif value="ar">العربية</option>
                    <option @if(app()->getLocale() == 'fr') selected @endif value="fr">Français</option>
                    <option @if(app()->getLocale() == 'en') selected @endif value="en">English</option>
                    <option @if(app()->getLocale() == 'es') selected @endif value="es">Español</option>
                </select>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container text-center">
            <p class="mb-0 text-white">&copy; {{ date('Y') }} Stock Management System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
    <script>
        $(document).ready(function() {
            $("#selectLocale").on('change', function() {
                var locale = $(this).val();
                window.location.href = "/changeLocale/" + locale;
            });
        });
    </script>
</body>
</html>