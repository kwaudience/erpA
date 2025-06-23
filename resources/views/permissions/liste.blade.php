@extends('layouts.app2')

@section('title', 'Liste des Permissions')

@section('content')
    <div class="page-content">
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Permissions</h3>
                {{-- <a href="{{ route('permissions.create') }}" class="btn btn-success">+ Ajouter une Permission</a> --}}
                <a href="#" class="btn btn-success">+ Ajouter une Permission</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- @if($permissions->count())
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
                                @foreach($permissions as $index => $permission)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description ?? '—' }}</td>
                                    <td>{{ $permission->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette permission ?');">
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
                    Aucune permission enregistrée pour le moment.
                </div>
            {{-- @endif --}}
        </div>
    </div>
@endsection
