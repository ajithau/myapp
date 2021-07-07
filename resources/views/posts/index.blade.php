@extends('layouts.app')
@section('content')
<article class="space-y-4">
  @foreach ($posts as $post)
    <div class="block border-2 border-blue-300 px-5">
        <h1>
            <a href="/myapp/public/posts/{{ $post->id }}">{{$post->title}}</a>
        </h1>
        <p class="text-gray-600">
            {{$post->excerpt}}
        </p>
    </div>
  @endforeach
</article>
@endsection
