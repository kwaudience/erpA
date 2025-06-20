@extends('layouts.app2')

@section('title', 'Liste des Postes')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Postes</h3>
        {{-- <a href="{{ route('postes.create') }}" class="btn btn-success">+ Ajouter un Poste</a> --}}
        <a href="#" class="btn btn-success">+ Ajouter un Poste</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- @if($postes->count())
        <div class="card shadow rounded">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Département</th>
                            <th>Description</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postes as $index => $poste)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $poste->name }}</td>
                            <td>{{ $poste->department->name ?? '—' }}</td>
                            <td>{{ $poste->description ?? '—' }}</td>
                            <td>{{ $poste->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('postes.edit', $poste->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                                <form action="{{ route('postes.destroy', $poste->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce poste ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else --}}
        <div class="alert alert-info">
            Aucun poste enregistré pour l’instant.
        </div>
    {{-- @endif --}}
</div>
@endsection
