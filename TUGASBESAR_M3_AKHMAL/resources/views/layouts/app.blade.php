<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Inventaris Aset Kos')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <h1>Inventaris Aset Kos</h1>
  <p>
    <a href="{{ route('aset.index') }}">Kelola Aset</a>
  </p>

  @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
  @endif

  @yield('content')

</body>
</html>