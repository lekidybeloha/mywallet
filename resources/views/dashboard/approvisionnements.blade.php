@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Mes approvisionnements
                </h5>
                <table class="table table-responsive">
                    <tbody>
                    @if($approvisionnements)
                        @foreach($approvisionnements as $one)
                            <tr>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="card-footer">
                    <button type="submit" class="btn btn-light px-5"><i class="icon-plus"></i> Enregistrer un approvisionnement</button>
                </div>
            </div>
        </div>
    </div>
@endsection
