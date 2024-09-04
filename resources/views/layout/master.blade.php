<!DOCTYPE html>
<html lang="{{ $language ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    <link rel="canonical" href="{{ $base_url }}">
    <meta name="description" content="{{ $description }}">
    @vite('resources/css/app.css')
    @livewireScripts

    <title>{{ $title }}</title>
</head>

<body>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
        @include('layout.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layout.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    @yield('body')
                </div>
            </main>
        </div>
    </div>

</body>

</html>
