@extends('layout.app');

@section('content')
    <h3>{{$article->title}}</h3>
    <p>{{$article->body}}</p>
@endsection

