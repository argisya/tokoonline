<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>{{$judul}}</h3>
    @if(session()->has('error'))
        <div style="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
            <strong>{{ session('eror')}}</strong>
        </div>
        @endif

    <form action="{{ route('backend.login')}}" method="POST">
        @csrf
        <label>User</label><br>
        <input type="text" name="email" id="" value="{{old('email')}}" class="form-control @eror ('email') is-invalid @enderror" placeholder="Masukan Email">
        @erorror('email')
        <span class="invalid-feedback alert-danger" role="alert" >
        {{ $message}}</span>
        @enderror
        <p></p>

        <label>Password</label><br>
        <input type="password" name="password" id="" value="{{old('password')}}" class="form-control @eror ('password') is-invalid @enderror" placeholder="Masukan Password">
        @erorror('password')
        <span class="invalid-feedback alert-danger" role="alert" >
        {{ $message}}</span>
        @enderror
        <p></p>

        <button type="submit">Login</button>
    </form>
</body>
</html>