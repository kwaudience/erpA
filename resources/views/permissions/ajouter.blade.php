@extends('layouts.app2')

@section('title', 'Ajouter une Permission')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4>Ajouter une Permission</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- <form action="{{ route('permissions.store') }}" method="POST"> --}}
            <form action="#" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la permission</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ex: voir_factures" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optionnelle)</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Décrire l'utilité de cette permission..."></textarea>
                </div>

                <button type="submit" class="btn btn-success">Enregistrer</button>
                {{-- <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Annuler</a> --}}
                <a href="#" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
