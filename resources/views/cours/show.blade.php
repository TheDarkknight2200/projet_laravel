@extends('layouts.app')
@section('title', 'Détails cours')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Détails du cours</h2>
                <a href="{{ route('cours.edit', $cours->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Modifier
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th width="200">ID</th><td>{{ $cours->id }}</td></tr>
                    <tr><th>Libellé</th><td>{{ $cours->libelle }}</td></tr>
                    <tr><th>Professeur</th><td>{{ $cours->professeur }}</td></tr>
                    <tr><th>Volume horaire</th><td>{{ $cours->volume_horaire }}h</td></tr>
                </table>
                <h4 class="mt-4">Étudiants inscrits</h4>
                @if($cours->etudiants->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cours->etudiants as $etudiant)
                                <tr>
                                    <td>{{ $etudiant->prenom }}</td>
                                    <td>{{ $etudiant->nom }}</td>
                                    <td>{{ $etudiant->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">Aucun étudiant inscrit.</p>
                @endif
                <a href="{{ route('cours.index') }}" class="btn btn-secondary mt-3">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
