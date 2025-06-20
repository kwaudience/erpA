@extends('layouts.app2')

@section('title', 'Modifier un Département')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-warning text-dark">
            <h4>Modifier le Département</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- <form action="{{ route('departments.update', $department->id) }}" method="POST"> --}}
            <form action="#" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom du département</label>
                    <input type="text" class="form-control" id="name" name="name"
                           {{-- value="{{ old('name', $department->name) }}" required> --}}
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optionnelle)</label>
                    {{-- <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $department->description) }}</textarea> --}}
                    <textarea class="form-control" id="description" name="description" rows="3">Romeo kouamé </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                {{-- <a href="{{ route('departments.index') }}" class="btn btn-secondary">Annuler</a> --}}
                <a href="#" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
