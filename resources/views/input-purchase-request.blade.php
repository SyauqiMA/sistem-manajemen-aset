<div>
    
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <h1>Halaman Input Purchase Request</h1>

    @session('status')
        <p>{{$value}}</p>
    @endsession

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

    <form method="post">
        @csrf
        <label for="pr-number">Purchase Request Number</label>
        <input type="text" name="pr-number" id="pr-number" maxlength="15" value="{{old('pr-number')}}" required> <br>
        <label for="pr-desc">Deskripsi Purchase Request</label>
        <input type="text" name="pr-desc" id="pr-desc" maxlength="50" value="{{old('pr-desc')}}" required> <br>
        <label for="pr-date">Tanggal Harapan Fulfilled</label>
        <input type="date" name="pr-date" id="pr-date" value="{{old('pr-date')}}" required> <br>
        <button type="submit">Submit</button>
    </form>
</div>
