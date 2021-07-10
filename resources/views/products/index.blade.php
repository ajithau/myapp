@extends('layouts.app')
   
@section('content')

<a href="{{ route('products.create') }}"><button type="button" class="btn btn-primary">Add New Product</button></a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Created</h>
                <th>Image</h>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->created_at}}</td>
                <td><img src="{{url('/').'/images/'.$product->image}}" class="object-contain h-28 w-28"></td>
                <td>
                    <a href="{{ route('products.show',$product->id) }}">
                        <i class="far fa-edit">show</i>
                    </a>                          
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        {{-- @csrf
                        @method('DELETE') --}} 
                        
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection