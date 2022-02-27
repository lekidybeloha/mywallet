@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Revenus
                </h5>
                @if($revenus)
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Montant</th>
                            <th>Fréquence d'approvisionnement</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
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
                                    <td>
                                        <a href="{{ route('revenus.edit', ['revenu'=>$one->id]) }}" type="button" class="btn btn-light px-5" @if(!Auth::User()->sources) disabled @endif>
                                            <i class="icon-pencil"></i>
                                        </a>
                                        <a href="#" onclick="showModal({{ $one->id }})" type="button" class="btn btn-outline-danger px-5" @if(!Auth::User()->sources) disabled @endif>
                                            <i class="icon-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <div>
                    {!! $revenus->links() !!}
                </div>
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
                                <input min="1" type="number" step="1" class="form-control" id="date_appro" name="date_appro" placeholder="Ex: 1" required>
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

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog bg-primary" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression de revenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('revenus.delete') }}">
                        <div class="modal-body">
                            @csrf
                            <span>
                                Voulez vous vraiment supprimer ce revenu ?
                                <br>
                                En supprimant ce revenu, vous allez perdre toutes les historiques concernant celui-ci
                            </span>
                            <input type="hidden" name="id" value="" id="delete_id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showModal(id)
        {
            $('#delete_id').val(id);
            $('#delete').modal('show')
        }
    </script>
@endsection
