
@extends('layouts.app');

@section('title')
    Home
@endsection
<?php

//1) firstway::  $products =DB::table('products')->get();

?>
@section('content');
<div class="container">
  <h1>Products</h1>
  @if (Session::has('success'))
  <p class="alert alert-success">
      {{Session::get('success')}}
      {{Session::put('success',null)}}
  </p>
  @endif

  @foreach ($products as $product)
  <div class='well'>
  <h3><a href="./show/{{$product->id}}">{{$product->product_name}}</a></h3>
  <hr>
  <small>Written in {{$product->created_at}}</small>

  </div>
  @endforeach
  {{$products->links()}}
  {{--<h3>Index</h3>
  <p>This example adds a dropdown menu for the "Page 1" button in the navigation bar.</p>--}}
</div>
@endsection
