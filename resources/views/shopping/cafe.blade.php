@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            @foreach($data as $item)
            <div class="card mt-4">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{$item->image}}"  class="img-fluid img-thumbnail" alt=""> 
                           </div>
                            <div class="col-6">
                                <p class="badge badge-secondary"> {{$item->title}}</p>
                                <h3 class="font-weight-bold ">{{$item->description}}</h3>                               
                                <hr>
                                <br>                             
                                
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection