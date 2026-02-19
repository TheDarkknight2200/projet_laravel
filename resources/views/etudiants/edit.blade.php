@extends('layouts.app')
@section('title', 'Éditer un étudiant')
@section('content')
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header"><h2 class="mb-0">Modifier l' étudiant</h2></div>
<div class="card-body">
<form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
@csrf
@method('PUT')
<div class="mb-3">
<label class="form-label">Prénom</label>
<input type="text" name="prenom" value="{{ old('prenom', $etudiant->prenom) }}" class="form-control @error('prenom') is-invalid @enderror" required>
@error('prenom') <div class="invalidfeedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
<label class="form-label">Nom</label>
<input type="text" name="nom" value="{{ old('nom', $etudiant->nom) }}" class="form-control @error('nom') is-invalid @enderror" required>
@error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" value="{{ old('email', $etudiant->email) }}"
class="form-control @error('email') is-invalid @enderror" required>
@error('email') <div class="invalidfeedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
<label class="form-label">Date de naissance</label>
<input type="date" name="date_naissance" value="{{ old('date_naissance', $etudiant->date_naissance) }}" class="form-control @error('date_naissance') is-invalid @enderror" required>
@error('date_naissance') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
<label class="form-label">Cours inscrits</label>
@foreach($cours as $c)
<div class="form-check">
<input class="form-check-input" type="checkbox" name="cours[]" value="{{ $c->id }}" id="cours{{ $c->id }}" {{ $etudiant->cours->contains($c->id) ? 'checked' : '' }}>
<label class="form-check-label" for="cours{{ $c->id }}">
{{ $c->libelle }} ({{ $c->professeur }})
</label>
</div>
@endforeach
<div class="form-text">Astuce: la synchronisation se fait via sync().</div>
</div>
<div class="d-flex justify-content-between">
<a href="{{ route('etudiants.index') }}" class="btn btn-secondary">
<i class="fas fa-arrow-left"></i> Retour
</a>
<button class="btn btn-primary">
<i class="fas fa-save"></i> Mettre à jour
</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
