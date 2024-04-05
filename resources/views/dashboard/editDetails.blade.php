@extends('layouts/app')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('update-product-details')}}" method="post">
            @csrf
            <div class="row mt-3 text-center">
                <input type="hidden" name="id" value="{{$productsDetails['id']}}">
                <div class="col">
                        <label for="product">Select product</label>
                        <select class="custom-select" id="product" name="product">
                            @foreach($products as $item)
                            <option value="{{$item->id}}">{{$item->ProductName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label for="color">color</label>
                        <input type="text" id="color" class="form-control " value="{{$productsDetails['Color']}}"  name="color">
                    </div>
                    <div class="col">
                        <label for="price">price</label>
                        <input type="text" id="price" class="form-control" value="{{$productsDetails['Price']}}" name="price">
                       
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col">
                        <label for="qty">Quntity</label>
                        <input type="text" id="qty" class="form-control" value="{{$productsDetails['Qty']}}" name="qty">
                        
                    </div> 
                    <div class="col">
                        <label for="description">description</label>
                        <input type="text" id="description" class="form-control" value="{{$productsDetails['Description']}}" name="description">
                    </div>
                 </div>   
            </div>

            <div class="row mt-3">
                <div class="col text-center">
                <button class="btn btn-success" type="submit">save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection