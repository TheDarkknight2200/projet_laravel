@extends('layouts.app')
@section('title', 'Liste des Étudiants')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
 <h1>Liste des Étudiants</h1>
 <a href="{{ route('etudiants.create') }}" class="btn btn-primary">
 <i class="fas fa-plus"></i> Ajouter
 </a>
</div>
<div class="card">
 <div class="card-body">
 <div class="table-responsive">
 <table class="table table-striped table-hover">
 <thead>
 <tr>
 <th>ID</th>
 <th>Prénom</th>
 <th>Nom</th>
 <th>Email</th>
 <th>Date de naissance</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 @forelse($etudiants as $etudiant)
    <tr>
        <td>{{ $etudiant->id }}</td>
        <td>{{ $etudiant->prenom }}</td>
        <td>{{ $etudiant->nom }}</td>
        <td>{{ $etudiant->email }}</td>
        <td>{{ \Carbon\Carbon::parse($etudiant->date_naissance)->format('d/m/Y') }}</td>
        <td>
<a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-sm btn-info">
<i class="fas fa-eye"></i>
</a>
<a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>
<form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('\u00cates-vous s\u00fbr ?')">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger">
<i class="fas fa-trash"></i>
</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="6" class="text-center text-muted">Aucun étudiant trouvé</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
@endsection
