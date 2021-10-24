@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Revenus
                </h5>
                    <table class="table table-responsive">
                        <tbody>
                        @if($revenus)
                            @foreach($revenus as $one)
                                <tr>
                                    <td>
                                        {{ $one->nom }}
                                    </td>
                                    <td>
                                        {{ $one->description }}
                                    </td>
                                    <td>
                                        {{ $one->montant }}
                                    </td>
                                    <td>
                                        Tous les {{ $one->date_appro }} du mois
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                <div class="card-footer">
                    <button type="button" class="btn btn-light px-5" data-toggle="modal" data-target="#revenu" @if(!Auth::User()->sources) disabled @endif>
                        <i class="icon-plus"></i> Ajouter un revenu
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="revenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog bg-primary" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout revenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('revenus.post') }}">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex: Salaire mensuel Upwork" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date_appro">Date d'approvisionnement mensuel</label>
                                <input type="number" class="form-control" id="date_appro" name="date_appro" placeholder="Ex: 1" required>
                            </div>
                            <div class="form-group">
                                <label for="montant">Montant</label>
                                <input type="text" class="form-control" id="montant" name="montant" placeholder="Ex: 200000" required>
                            </div>
                            <div class="form-group">
                                <label for="id_source">Source</label>
                                <select name="id_source" class="form-control">
                                    @if($sources)
                                        @foreach($sources as $one)
                                            <option value="{{ $one->id }}">{{ $one->nom }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
