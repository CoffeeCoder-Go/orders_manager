<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app_name","Home") }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @vite(["resources/css/app.css","resources/js/app.js"])
</head>
<body>
    <header class="navbar navbar-expand-lg bg-black bg-gradient">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand text-white fw-bold text-uppercase">Home</a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link text-white text-uppercase">Orders</a>
                   
                </li>
                <li class="nav-item">
                     <a href="{{ route('products.index') }}" class="nav-link text-white text-uppercase">Products</a>
                </li>
            </ul>
        </div>

    </header>
    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>