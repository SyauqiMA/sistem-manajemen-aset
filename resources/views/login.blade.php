<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <h1>Login Page</h1>

    @error('credential')
        <p><b>{{$message}}</b></p>
    @enderror

    <form method="post">
        @csrf
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{old('username')}}" required> <br>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password"> <br>

        <button type="submit">Login</button>
    </form>
</div>
