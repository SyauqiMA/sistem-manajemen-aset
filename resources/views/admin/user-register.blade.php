<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    <script>
        // Function to validate password fields
        function validatePassword() {
            let password = document.getElementById('password').value;
            let repeatPassword = document.getElementById('repeat-password').value;

            if(password !== repeatPassword) {
                document.getElementById('password-error').innerHTML = "Passwords do not match";
                return false;
            } else {
                document.getElementById('password-error').innerHTML = "";
                return true;
            }
        }
    </script>

    <h1>Tambah User</h1>

    @if ($errors->any())
        <div class="errors">
            <h3>Error:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="post" onsubmit="return validatePassword()">
        @csrf
        <label for="user-level">Level User</label>
        <select name="userLevel" id="user-level">
            <option value="1" @selected(old('userlevel') == '1')>Admin</option>
            <option value="2" @selected(old('userlevel') == '2')>Direktur</option>
            <option value="3" @selected(old('userlevel') == '3')>Manager Divisi</option>
            <option value="4" @selected(old('userlevel') == '4')>Manager Procurement</option>
        </select> <br>

        <label for="nama-lengkap">Nama Lengkap</label>
        <input type="text" name="namaLengkap" id="nama-lengkap" value="{{old('namaLengkap')}}" placeholder="Nama Lengkap" maxlength="50" required> <br>

        <label for="departemen">Departemen</label>
        <select name="departemen" id="departemen">
            <option value="1" @selected(old('departemen') == '1')>Gudang</option>
        </select> <br>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{old('username')}}" placeholder="Username" maxlength="20" required> <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required> <br>

        <label for="repeat-password">Ulangi Password</label>
        <input type="password" name="repeatPassword" id="repeat-password" placeholder="Ulangi Password" required> <br>
        <span style="color: red" id="password-error"></span> <br>

        <button type="submit">Submit</button>
    </form>
</div>
