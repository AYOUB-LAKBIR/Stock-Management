@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="forgot-container">
            <h2 class="text-center mb-4">Mot de passe oublié</h2>
            
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <p class="mb-4">Veuillez saisir votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe.</p>
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Envoyer le lien de réinitialisation</button>
                </div>
                
                <div class="links">
                    <a href="{{ route('login') }}">Retour à la connexion</a>
                </div>
            </form>
        </div>
@endsection