@extends('layouts.app2')

@section('title', 'Modifier un Poste')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-warning text-dark">
            <h4>Modifier le Poste</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- <form action="{{ route('postes.update', $poste->id) }}" method="POST"> --}}
            <form action="#" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom du poste</label>
                    <input type="text" class="form-control" id="name" name="name"
                           {{-- value="{{ old('name', $poste->name) }}" required> --}}
                </div>

                <div class="mb-3">
                    <label for="department_id" class="form-label">Département associé</label>
                    <select class="form-control" id="department_id" name="department_id" required>
                        <option value="">-- Sélectionnez --</option>
                        {{-- @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $poste->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach --}}
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optionnelle)</label>
                    {{-- <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $poste->description) }}</textarea> --}}
                    <textarea class="form-control" id="description" name="description" rows="3">romeo </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                {{-- <a href="{{ route('postes.index') }}" class="btn btn-secondary">Annuler</a> --}}
                <a href="#" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
