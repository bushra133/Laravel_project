@extends('layouts.base')

@section('content')

<div class="container-fluid text-dark">
    <div class="row mt-4 flex justify-content-between">
        <div class="col">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add New Product Details
</button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="exampleModalLabel"> add new product details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="productDetailsForm" action="{{route('create-product-details')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="product">Select product</label>
                        <select class="custom-select" id="product" name="product">
                            @foreach($products as $item)
                            <option value="{{$item->id}}">{{$item->ProductName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="color">color</label>
                        <input type="text" id="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}"  name="color">
                        @error('color')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="price">price</label>
                        <input type="text" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price">
                        @error('price')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col">
                        <label for="qty">Quntity</label>
                        <input type="text" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}" name="qty">
                        @error('qty')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div> 
                    <div class="col">
                        <label for="description">description</label>
                        <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" name="description">
                        @error('description')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                 </div>
                
                <button type="submit" class="btn btn-primary mt-2" >save</button>
                <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">cancel</button>
        
            </form>
        </div>
        
      </div>
    </div>
  </div>
        </div>
        <div class="col d-flex justify-content-end">
            
                    <form action="{{route('products-details')}}" method="get" class="form-inline">
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
                            <th>Color</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Description</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                            @foreach($productsDetails as $items)
                                <tr>
                                    <td>{{$items->id}}</td>
                                    <td>{{$items->ProductName}}</td>
                                    <td>{{$items->Color}}</td>
                                    <td>{{$items->Price}}</td>
                                    <td>{{$items->Qty}}</td>
                                    <td>{{$items->Description}}</td>

                                    
                                    <td> <a href="{{route('delete-product-details',['id'=>$items->id])}}"><i class="fa fa-trash text-danger"></i></a></td>
                                    <td> <a href="{{route('edit-product-details',['id'=>$items->id])}}"><i class="fa fa-edit text-success"></i></a></td>
                                </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                    @if (!empty($searched))
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary d-flex flex-row-reverse"> <a href="{{route('products-details')}}" class="text-white"> show all </a></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>    

@endsection
