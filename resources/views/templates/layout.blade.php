<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        @switch(session('user_level'))
            @case("Manager Divisi")
                <ul>
                    <li><a href="">Purchase Request</a></li>
                    <li><a href="">Laporan</a></li>
                </ul>
                @break
            @case("Direktur")
                <ul>
                    <li><a href="">Received Purchase Requests</a></li>
                    <li><a href="">Data Aset</a></li>
                    <li><a href="">Laporan</a></li>
                </ul>
                @break
            @case("Manager Procurement")
                <ul>
                    <li><a href="">Received Purchase Request</a></li>
                    <li><a href="">Data Aset</a></li>
                    <li><a href="">Laporan</a></li>
                </ul>
                @break
            @case("Staff Procurement")
                <ul>
                    <li><a href="">Purchase Order</a></li>
                    <li><a href="">Invoice</a></li>
                    <li><a href="">Pencatatan Data Aset</a></li>
                    <li><a href="">HIstory Kepemilikan</a></li>
                </ul>
                @break
            @default
        @endswitch
        {{-- Logout Form --}}
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <main>
        @yield('main-content')
    </main>
</body>
</html>
