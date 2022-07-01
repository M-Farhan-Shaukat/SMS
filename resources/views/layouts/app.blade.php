<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials._header')
<body>

    <main class="">
        {{-- @include('partials._message') --}}
        @include('partials._nav')
            @yield('content')
        </main>
        @include('partials._footer')
        @include('partials._script')
</body>
</html>
