<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->

    {{-- Profile badge component begin --}}
    <p>Selamat datang, <b>{{session('username')}}</b> dari departemen <b>{{session('user_dept')}}</b></p>
    <p>Role Anda adalah <b>{{session('user_level')}}</b></p>
    {{-- Profile badge component end --}}

    <h1>Landing Page test</h1>


    {{-- Logout Form --}}
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
