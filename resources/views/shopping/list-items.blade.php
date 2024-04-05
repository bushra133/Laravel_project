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
                                <img src="\assets\img\{{$item->image}}"  class="img-fluid img-thumbnail" alt=""> 
                           </div>
                            <div class="col-6">
                                <p class="badge badge-secondary"> {{$item->ProductName}}</p>
                                <h3 class="font-weight-bold ">{{$item->Description}}</h3>                               
                                <hr>
                                <span class="font-weight-bold">About this item </span><br>
                                <span>Color : {{$item->Color}}</span><br>
                                <br>                             
                                
                            </div>
                            <div class="col-3">            
                                <h4> 
                                    Price: {{$item->Price}} SAR </h4>
                                    <span class="text-muted">Tax : {{$item->tax}}</span><br>   
                                <span>Total: {{$item->total}} SAR</span><br>  
                                <span>Saving: <span class="badge badge-success">{{$item->descount}} SAR</span></span><br>
                                 
                                <span class="font-weight-bold"> Net: {{$item->net}} SAR</span>            
                                <p class="text-danger">Only {{$item->Qty}} in stock</p>
                                <div class="d-flex justify-content-center pt-4">             
                                        <button class="btn btn-primary d-flex flex-row-reverse"> <a href="{{route('item-details',['id'=>$item->id])}}" class="text-white"> Show Details </a></button>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection