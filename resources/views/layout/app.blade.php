<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'سلة المشتريات')</title>
    <!-- أضف هنا روابط CSS الخاصة بالـ Cart فقط -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* أنماط خاصة بالصفحة */
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            direction: rtl; /* لأن اللغة عربية */
        }
        .cart-container {
            margin: 40px auto;
            max-width: 900px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 12px #ccc;
        }
    </style>
</head>
<body>

<div class="cart-container">
    @yield('content')
</div>

<!-- أضف هنا روابط الجافاسكريبت إذا احتجت -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
