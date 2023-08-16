@extends('layouts.app')

@section('title', $viewData["title"])

@section('subtitle', $viewData["subtitle"])

@section('content')


<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">{{ $viewData["header"]}}</h4>
    <p>{{ $viewData["message"]}}</p>
    <hr>
    <p class="mb-0">{{ $viewData["description"]}}</p>
  </div>
  <a class="btn btn-primary" href="{{route('product.create')}}" role="button">Back</a>

  </button>
@endsection