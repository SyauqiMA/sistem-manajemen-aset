<div>
    <style>
        table, th, td {
            border: 1px solid black
        };
    </style>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <h1>Halaman Manajemen User</h1>
    <p>Hanya bisa diakses oleh admin</p>

    @session('status')
        <p><b>{{$value}}</b></p>
    @endsession

    {{-- {{var_dump($users)}} --}}

    <a href="/admin/user-register">Tambah User Baru</a>

    <table>
        <tr>
            <th>#</th>
            <th>Level</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Username</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->nama_level}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->departemen_name}}</td>
                <td>{{$user->username}}</td>
            </tr>
        @endforeach
    </table>
</div>
