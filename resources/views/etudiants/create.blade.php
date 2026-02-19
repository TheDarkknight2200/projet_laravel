@extends('layouts.app')
@section('title', 'Créer un étudiant')
@section('content')
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header"><h2 class="mb-0">Créer un étudiant</h2></div>
<div class="card-body">
<form action="{{ route('etudiants.store') }}" method="POST">
@csrf
<div class="mb-3">
<label class="form-label">Prénom</label>
<input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror" required>
@error('prenom') <div class="invalidfeedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
<label class="form-label">Nom</label>
<input type="text" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" required>
@error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
@error('email') <div class="invalidfeedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
<label class="form-label">Date de naissance</label>
<input type="date" name="date_naissance" value="{{ old('date_naissance') }}" class="form-control @error('date_naissance') is-invalid @enderror" required>
@error('date_naissance') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="d-flex justify-content-between">
<a href="{{ route('etudiants.index') }}" class="btn btn-secondary">
<i class="fas fa-arrow-left"></i>
Retour
</a>
<button class="btn btn-primary">
<i class="fas fa-save"></i> Enregistrer
</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
