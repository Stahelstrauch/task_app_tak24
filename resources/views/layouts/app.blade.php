<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{--  Arenduseks kiirem viis- Tootmises Vite+Tailwind build --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <main class="max-w-4xl mx-auto px-4 py-6">
        {{-- Veebilehe sisu --}}
        @yield('content') 
    </main>

    {{-- Veebilehe jalus --}}
    <footer class="border-t bg-white">
        <div class="max-w-4xl mx-auto px-4 py-4 text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
        </div>
    </footer>
    
</body>
</html>