@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Mes sources de revenus
                </h5>
                <table class="table table-responsive">
                    <tbody>
                    @if($sources)
                        @foreach($sources as $one)
                            <tr>
                                <td>
                                    {{ $one->nom }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="card-footer">
                    <button type="button" class="btn btn-light px-5" data-toggle="modal" data-target="#source">
                        <i class="icon-plus"></i> Ajouter une nouvelle source de revenu
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade " id="source" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog bg-primary" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout source de revenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('mes-sources.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nom">Nom de la source</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex: Upwork">
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
