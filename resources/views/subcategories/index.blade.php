@extends('layouts.app')
   
@section('content')

<a href="{{ route('subcategories.create') }}"><button type="button" class="btn btn-primary">Add New SubCategory</button></a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created</h>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
            <tr>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->created_at}}</td>
                <td>
                    <form action="{{ route('subcategories.destroy',$subcategory->id) }}" method="POST">
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