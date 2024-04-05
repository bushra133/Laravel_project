@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col text-dark">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>ID</th>
                            <th>Product Id</th>
                            <th> Image </th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Tax</th>
                            <th>Total</th>
                            <th>Desc</th>
                            <th>Net</th>
                            <th>Delete </th>
                        </thead>
                        <tbody>
                            @foreach($products as $items)
                                <tr>
                                    <td>{{$items->id}}</td>
                                    <td>{{$items->ProductId}}</td>
                                    <td><img src="\assets\img\{{$items->image}}"  class="img-fluid img-thumbnail" width="80px"  alt=""> </td>
                                    <td>{{$items->Price}} SAR</td>
                                    <td>{{$items->Qty}}</td>
                                    <td>{{$items->Tax}}</td>
                                    <td>{{$items->Total}}</td>
                                    <td>{{$items->Desc}}</td>
                                    <td>{{$items->Net}} SAR</td>
                                    <td><a href="{{route('delete-from-cart',['id'=>$items->id])}}"><i class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
   
</div>    

@endsection