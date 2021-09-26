@extends('dashboard.layouts.master')

@section('content')
    <div class="card mt-3">
        <div class="card-content">
            <div class="row row-group m-0">
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">{{ Auth::User()->totals->total }} <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                        <p class="mb-0 text-white small-font">Revenu total </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">{{ Auth::User()->totals->total }} <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
                        <p class="mb-0 text-white small-font">Dépenses total </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
