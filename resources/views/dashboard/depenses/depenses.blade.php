@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Dépenses
                </h5>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Description</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($depenses)
                        @foreach($depenses as $one)
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
                                    {{ $one->created_at }}
                                </td>
                                <td>
                                    <a href="#" onclick="showModal({{ $one->id }})" type="button" class="btn btn-outline-danger px-5">
                                        <i class="icon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div>
                    {!! $depenses->links() !!}
                </div>
                <div class="card-footer">
                    <button type="button" data-toggle="modal" data-target="#depenses" class="btn btn-light px-5" @if(Auth::User()->totals->montant == 0) disabled @endif><i class="icon-plus"></i> Enregistrer une dépense</button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="depenses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog bg-primary" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout de dépense</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('depenses.post') }}">
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
                                <label for="montant">Montant</label>
                                <input type="number" step="any" max="{{ Auth::User()->totals->montant }}" class="form-control" id="montant" name="montant" placeholder="Ex: 200000" required>
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
                        <h5 class="modal-title" id="exampleModalLabel">Suppression d'une dépense</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('depenses.delete') }}">
                        <div class="modal-body">
                            @csrf
                            <span>
                                Voulez vous vraiment supprimer cette dépense ?
                                <br>
                                En supprimant cette dépense, vous allez perdre toutes les historiques concernant celui-ci
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
