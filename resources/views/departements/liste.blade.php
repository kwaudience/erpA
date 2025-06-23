@extends('layouts.app2')

@section('title', 'Liste des Départements')

@section('content')
    <div class="page-content">
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Départements</h3>
                {{-- <a href="{{ route('departments.create') }}" class="btn btn-success">+ Ajouter un Département</a> --}}
                <a href="#}" class="btn btn-success">+ Ajouter un Département</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- @if($departments->count())
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
                                @foreach($departments as $index => $department)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->description ?? '—' }}</td>
                                    <td>{{ $department->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce département ?');">
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
                    Aucun département enregistré pour le moment.
                </div>
            {{-- @endif --}}
        </div>
    </div>
@endsection
