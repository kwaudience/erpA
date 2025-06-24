@extends('layouts.app2')

@section('title', 'Liste des Rôles')

@section('content')
    <div class="page-content">
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Rôles</h3>
                {{-- <a href="{{ route('roles.create') }}" class="btn btn-success">+ Ajouter un Rôle</a> --}}
                <a href="#" class="btn btn-success">+ Ajouter un Rôle</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- @if($roles->count())
                <div class="card shadow rounded">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Date de création</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $index => $role)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description ?? '—' }}</td>
                                    <td>{{ $role->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce rôle ?');">
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
                    Aucun rôle enregistré pour l’instant.
                </div>
            {{-- @endif --}}
        </div>
    </div>
@endsection
