@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Dépenses
                </h5>
                <table class="table table-responsive">
                    <tbody>
                    @if($depenses)
                        @foreach($depenses as $one)
                            <tr>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="card-footer">
                    <button type="submit" class="btn btn-light px-5" @if(Auth::User()->totals->montant == 0) disabled @endif><i class="icon-plus"></i> Enregistrer une dépense</button>
                </div>
            </div>
        </div>
    </div>
@endsection
