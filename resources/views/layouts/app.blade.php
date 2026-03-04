<!DOCTYPE html>
<html>
<head>
    <title>Sistema Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e27fa640f1.js" crossorigin="anonymous"></script>
</head>
<body class="container mt-4">
    <div class="d-flex align-items-center mb-1" style="padding-bottom:2px;">
        <img src="{{ asset('images/vip2cars_logo.jpg') }}" alt="Logo Empresa" style="height:50px; margin-right:15px;">
        <h1 class="h4 m-0 fw-bold">VIP2CARS</h1>
    </div>
    @yield('content')

    <!-- Bootstrap JS (requerido para alertas, modals, dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>