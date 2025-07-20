<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'تسجيل الدخول / التسجيل')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 4 CDN أو من ملفاتك -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
        }
        .auth-container {
            margin-top: 80px;
            max-width: 450px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="auth-container">
            @yield('content')
        </div>
    </div>
</body>
</html>
