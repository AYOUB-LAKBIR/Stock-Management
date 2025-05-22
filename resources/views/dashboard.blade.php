@extends('layouts.app')
@section('content')
    <div class="container">
     {{-- button logout --}}
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger float-end">Se déconnecter</button>
                    </form>
     {{-- Button Profil --}}
        <div>
            <a href="{{ route('profile') }}" class="btn btn-primary me-2 float-end">Mon profil</a>
        </div>
        <div class="dashboard-container">
            <div class="header-actions">
                <h2>Tableau de bord</h2>
                
            </div>

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <div class="welcome-card">
                <h4>Bienvenue, {{ $user->name }} !</h4>
                <p>Vous êtes maintenant connecté à votre compte.</p>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Tableau de bord</div>
                        <div class="card-body">
                            <p>Contenu du tableau de bord à venir...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
