
@extends('layouts.app');

@section('title')
    Show
@endsection

@section('content');
<div class="container">
  <h1>Product Details</h1>
<h3>{{$product->product_name}}</h3>
<h4>{!!$product->product_description!!}</h4>
<h4>{{$product->product_price}}</h4>
<hr>
<small>Written in {{$product->created_at}}</small>
<hr>
<a href="./edit/{{$product->id}}" class="btn btn-default">Edit</a>
<a href="./delete/{{$product->id}}" class="btn btn-danger">Delete</a>
</div>
@endsection

