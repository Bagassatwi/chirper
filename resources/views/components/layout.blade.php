<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper' }}</title>
  <link rel="preconnect" href="<https://fonts.bunny.net>">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col justify-center items-center bg-base-200 font-sans">
  <nav class="navbar bg-base-100">
    <div class="navbar-start">
      <a href="/" class="btn btn-ghost text-xl">
        {{ $title ?? '🐦 Chirper' }}
      </a>
    </div>
    @auth

      <div class="navbar-end gap-2">
        <p class="">Welcome back, {{ Auth::user()->name }}</p>
      </div>
    @endauth

    @guest
      <div class="navbar-end gap-2">
        <a href="/login" class="btn btn-ghost btn-sm">Sign In</a>
        <a href="#" class="btn btn-primary btn-sm">Sign Up</a>
      </div>
    @endguest
  </nav>

  <main class="flex-1 flex items-center justify-center container px-4 py-8">
    {{ $slot }}
  </main>

  <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
    <div>
      <p>© {{ date('Y') }} Chirper - Built with Laravel and ❤️</p>
    </div>
  </footer>
</body>

</html>
