@extends('layouts.app')

@section('content')
<main>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Subcategory:</strong>
                        <input type="text" name="subcategory_id" class="form-control" placeholder="Subcategory">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $products[0]->name }}
                </div>
                </div>
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $products[0]->description }}
                </div>
                <div class="form-group">
                    <strong>Name:</strong>
                    <img src="{{url('/').'/images/'.$products[0]->image}}" class="object-contain h-28 w-28">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gallery images:</strong>
                    @foreach ($products[0]->gallery as $gallery)
                        <img src="{{url('/').$gallery->images}}" class="object-contain h-28 w-28">
                    @endforeach
                    </div>
                </div>

            </div>
        
</main

@endsection