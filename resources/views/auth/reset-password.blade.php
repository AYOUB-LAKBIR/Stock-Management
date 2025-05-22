@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="reset-container">
            <h2 class="text-center mb-4">Réinitialisation du mot de passe</h2>
            
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                
                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password-confirm">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
                </div>
                
                <div class="links">
                    <a href="{{ route('login') }}">Retour à la connexion</a>
                </div>
            </form>
        </div>
    </div>
@endsection