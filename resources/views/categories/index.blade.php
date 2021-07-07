@extends('layouts.app')
   
@section('content')

<a href="{{ route('categories.create') }}"><button type="button" class="btn btn-primary">Add New Category</button></a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created</h>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at}}</td>
                <td>
                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
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