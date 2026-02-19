@extends('layouts.app')
@section('title', 'Créer un cours')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h2 class="mb-0">Créer un cours</h2></div>
            <div class="card-body">
                <form action="{{ route('cours.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Libellé</label>
                        <input type="text" name="libelle" value="{{ old('libelle') }}" class="form-control @error('libelle') is-invalid @enderror" required>
                        @error('libelle') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Professeur</label>
                        <input type="text" name="professeur" value="{{ old('professeur') }}" class="form-control @error('professeur') is-invalid @enderror" required>
                        @error('professeur') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Volume horaire</label>
                        <input type="number" min="1" name="volume_horaire" value="{{ old('volume_horaire') }}" class="form-control @error('volume_horaire') is-invalid @enderror" required>
                        @error('volume_horaire') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cours.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
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
