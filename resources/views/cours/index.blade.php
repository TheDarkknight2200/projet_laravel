@extends('layouts.app')
@section('title', 'Liste des cours')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
<h1>Liste des Cours</h1>
<a href="{{ route('cours.create') }}" class="btn btn-primary">
<i class="fas fa-plus"></i> Ajouter
</a>
</div>
<div class="card">
<div class="card-body">
<table class="table table-striped table-hover">
<thead>
<tr>
<th>ID</th>
<th>Libellé</th>
<th>Professeur</th>
<th>Volume horaire</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@forelse($cours as $c)
<tr>
<td>{{ $c->id }}</td>
<td>{{ $c->libelle }}</td>
<td>{{ $c->professeur }}</td>
<td>{{ $c->volume_horaire }}h</td>
<td>
<a href="{{ route('cours.show', $c->id) }}" class="btn btn-sm btn-info">
<i class="fas fa-eye"></i>
</a>
<a href="{{ route('cours.edit', $c->id) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>
<form action="{{ route('cours.destroy', $c->id) }}" method="POST" class="d-inline" onsubmit="return confirm('\u00cates-vous s\u00fbr ?')">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger">
<i class="fas fa-trash"></i>
</button>
</form>
</td>
</tr> @empty
<tr><td colspan="5" class="text-center text-muted">Aucun cours</td></tr>
@endforelse
</tbody>
</table>
</div>
</div>
@endsection
