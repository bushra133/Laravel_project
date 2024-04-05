@extends('layouts.base')

@section('content')

<div class="container-fluid">
    <span class="text-dark">{{Session::get('data')}}</span>
    <span class="text-dark">{{Cookie::get('Cooki')}}</span>
    <div class="row mt-4 flex justify-content-between">
        <div class="col">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add New Product
</button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="exampleModalLabel"> add new product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('create-product')}}" method="post">
                @csrf
                <input type="text" class="form-control @error('ProductName') is-invalid @enderror" value="{{ old('ProductName') }}" name="ProductName" >
                @error('ProductName')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror

                <button type="submit" class="btn btn-primary mt-2">save</button>
                <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">cancel</button>

            </form>
        </div>
        
      </div>
    </div>
  </div>
        </div>
        <div class="col d-flex justify-content-end">
            
                    <form action="{{route('products')}}" method="get" class="form-inline">
                        @csrf
                        <input type="text" name="ProductName" class=" form-control" value="">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="col text-dark">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                            @foreach($products as $items)
                                <tr>
                                    <td>{{$items->id}}</td>
                                    <td>{{$items->ProductName}}</td>
                                    <td> <a href="{{route('delete-product',['id'=>$items['id']])}}"><i class="fa fa-trash text-danger"></i></a></td>
                                    <td> <a href="{{route('edit-product',['id'=>$items['id']])}}"><i class="fa fa-edit text-success"></i></a></td>
                                </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                    @if (!empty($searched))
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary d-flex flex-row-reverse"> <a href="{{route('products')}}" class="text-white"> show all </a></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
   
</div>    

@endsection