@extends('layouts/app')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('update-product')}}" method="post">
            @csrf
            <div class="row mt-3 text-center">
                <input type="hidden" name="id" value="{{$product['id']}}">
                <div class="col">
                    <label for="prname">اسم المنتج</label>
                    <input type="text" name="ProductName" id="prname" class="form-control p-1" value="{{$product['ProductName']}}">
                
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