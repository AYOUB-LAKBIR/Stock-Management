@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="verify-container">
            <h2 class="text-center mb-4">Vérification de l'adresse e-mail</h2>
            
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="alert alert-info">
                Un lien de vérification a été envoyé à votre adresse e-mail. Veuillez vérifier votre boîte de réception et cliquer sur le lien pour activer votre compte.
            </div>
            
            <p>Si vous n'avez pas reçu l'e-mail, vous pouvez demander un nouveau lien de vérification.</p>
            
            <div class="links">
                <a href="{{ route('login') }}">Retour à la connexion</a>
            </div>
        </div>
    </div>
@endsection