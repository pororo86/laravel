<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
</head>
<style>
    body {
        background-color: #f8f9fa;
        background-image: url('{{ asset('assets/image/bg-unpamm.jpg') }}');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .login-card {
        width: 100%;
        max-width: 400px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
    }
</style>
<body>
    <div class="login-card">
        <div class="card">
            <div class="card-header text-center bg-primary text-white">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" 
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('register') }}">Belum punya akun? Daftar di sini</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
