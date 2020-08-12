@extends('layout.app');

@section('content')
<ol>
    @foreach ($articles as $article)
    
<a href="{{$article->path()}}"><li>{{$article->title}}</li></a>
        
     
    @endforeach
</ol>
    
@endsection
