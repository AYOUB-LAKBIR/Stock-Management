@extends('layouts.app')
@section('content')
    
    <div class="container w-50 m-auto ">
        <div class="login-container">
            <h2 class="text-center mb-4">Connexion</h2>
            
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="form-group m-2">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group m-2">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group form-check m-2">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Garder la session ouverte</label>
                </div>
                
                <div class="form-group float-end">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
                
                <div class="links m-2">
                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    <br>
                    <a href="{{ route('register') }}">Créer un compte</a>
                </div>
            </form>
        </div>
    </div>
@endsection
