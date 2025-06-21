@extends('layouts.app2')

@section('title', 'Ajouter un Rôle')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4>Ajouter un Rôle</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- <form action="{{ route('roles.store') }}" method="POST"> --}}
            {{-- <form action="#" method="POST"> --}}
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du rôle</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ex: Responsable RH" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optionnelle)</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Décrivez le rôle..."></textarea>
                </div>

                <button type="submit" class="btn btn-success">Enregistrer</button>
                {{-- <a href="{{ route('roles.index') }}" class="btn btn-secondary">Annuler</a> --}}
                <a href="#" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
