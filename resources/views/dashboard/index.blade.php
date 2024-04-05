@extends('layouts.base')

@section('content')
<div class="container">
<span class="text-dark">{{Session::get('data')}}</span>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center"><i class="bi bi-receipt-cutoff text-dark"></i></h1>
                    <h4 class="text-center text-dark"> Invoice</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center"><i class="bi bi-people-fill text-dark"></i></h1>
                    <h4 class="text-center text-dark"> Customer</h4>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>    

@endsection