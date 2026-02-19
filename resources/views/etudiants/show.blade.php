@extends('layouts.app')
@section('title', 'Détails étudiant')
@section('content')
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
<h2 class="mb-0">Détails de l' étudiant</h2>
<a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">
<i class="fas fa-edit"></i> Modifier
</a>
</div>
<div class="card-body">
<table class="table table-bordered">
<tr><th width="200">ID</th><td>{{ $etudiant->id }}</td></tr>
<tr><th>Prénom</th><td>{{ $etudiant->prenom }}</td></tr>
<tr><th>Nom</th><td>{{ $etudiant->nom }}</td></tr>
<tr><th>Email</th><td>{{ $etudiant->email }}</td></tr>
<tr><th>Date de naissance</th><td>{{ \Carbon\Carbon::parse($etudiant->date_naissance)->format('d/m/Y') }}</td></tr>
</table>
<h4 class="mt-4">Cours inscrits</h4>
@if($etudiant->cours->count() > 0)
<table class="table table-striped">
<thead>
<tr>
<th>Libellé</th>
<th>Professeur</th>
<th>Volume horaire</th>
</tr>
</thead>
<tbody>
@foreach($etudiant->cours as $cours)
<tr>
<td>{{ $cours->libelle }}</td>
<td>{{ $cours->professeur }}</td>
<td>{{ $cours->volume_horaire }}h</td>
</tr>
@endforeach
</tbody>
</table>
@else
<p class="text-muted">Aucun cours inscrit.</p>
@endif
<a href="{{ route('etudiants.index') }}" class="btn btn-secondary mt-3">
<i class="fas fa-arrow-left"></i> Retour </a>
</div>
</div>
</div>
</div>
@endsection
