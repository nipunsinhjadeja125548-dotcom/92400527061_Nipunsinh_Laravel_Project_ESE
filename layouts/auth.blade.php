<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | CouponDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth-body">
    <main class="auth-ticket">
        <section class="auth-brand">
            <div class="logo"><i class="bi bi-ticket-perforated-fill"></i> CouponDesk</div>
            <h1>@yield('headline')</h1>
            <p>@yield('subline')</p>
            <div class="stamp"><small>USE CODE</small>SAVE20</div>
        </section>
        <section class="auth-form">
            @yield('content')
        </section>
    </main>
</body>
</html>
