@extends('layouts.app')

@section('title', $viewData["title"])

@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="card mb-3">

<div class="row g-0">

<div class="col-md-4">

<img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">

</div>

<div class="col-md-8">

<div class="card-body">

<h5 class="card-title">
{{ $viewData["product"]["name"] }} 
</h5>
<h6 class="card-subtitle mb-2 text-muted">Price: 
    @if ($viewData["product"]["price"]>100)
    <p class="text-danger">{{$viewData["product"]["price"]}}</h6></p>
    @else
    {{$viewData["product"]["price"]}}
    @endif
<p class="card-text">
    @foreach($viewData["product"]->comments as $comment) 
    - {{ $comment->getDescription() }}<br /> 
    @endforeach
</p>

</div>

</div>

</div>

</div>

@endsection