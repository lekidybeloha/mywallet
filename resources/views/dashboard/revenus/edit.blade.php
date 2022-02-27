@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Modifier le revenu
                </h5>
                <form method="post" action="{{ route('revenus.edit.post', ['revenu' => $revenu->id]) }}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $revenu->nom }}" placeholder="Ex: Salaire mensuel Upwork" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $revenu->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="date_appro">Date d'approvisionnement mensuel</label>
                            <input type="number" step="1" class="form-control" id="date_appro" value="{{ $revenu->date_appro }}" name="date_appro" placeholder="Ex: 1" required>
                        </div>
                        <div class="form-group">
                            <label for="montant">Montant</label>
                            <input type="text" class="form-control" id="montant" value="{{ $revenu->montant }}" name="montant" placeholder="Ex: 200000" required>
                        </div>
                        <div class="form-group">
                            <label for="id_source">Source</label>
                            <select name="id_source" class="form-control">
                                @if($sources)
                                    @foreach($sources as $one)
                                        <option value="{{ $one->id }}" @if($one->id == $revenu->id_source) selected @endif>{{ $one->nom }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('revenus') }}" type="button" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
