@extends('layouts.app')

@section('content')
<main>

    <form action="{{ route('categories.store') }}" method="POST"> 
            {{ csrf_field() }}
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Product">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        
        </form>

</main

@endsection