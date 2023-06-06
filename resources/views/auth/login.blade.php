@extends('layouts.auth')

@section('content')
    <div class="app-auth-container">
        <div class="logo">
            <a href="#">Neptune</a>
        </div>
        <br><br>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Email</label>
                <input type="email" class="form-control m-b-md" name="email" value="{{ old('email') }}" required>

                <label for="signInPassword" class="form-label">Parola</label>
                <input type="password" class="form-control" name="password" required>

                <br>
        
                <input type="checkbox" class="form-check-input" name="remember" value="1" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="form-check-label">Beni Hatırla</label>
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Giriş Yap</a>
            </div>
        </form>



    </div>
@endsection

