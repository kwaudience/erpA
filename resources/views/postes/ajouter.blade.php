@extends('layouts.app2')

@section('title', 'Ajouter un Poste')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4>Ajouter un Poste</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- <form action="{{ route('postes.store') }}" method="POST"> --}}
            <form action="#" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom du poste</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ex: Comptable Junior" required>
                </div>

                <div class="mb-3">
                    <label for="department_id" class="form-label">Département associé</label>
                    <select class="form-control" id="department_id" name="department_id" required>
                        <option value="">-- Sélectionnez --</option>
                        {{-- @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach --}}
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optionnelle)</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Décrivez les responsabilités..."></textarea>
                </div>

                <button type="submit" class="btn btn-success">Enregistrer</button>
                {{-- <a href="{{ route('postes.index') }}" class="btn btn-secondary">Annuler</a> --}}
                <a href="#" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
