
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
<a href="./{{$product->id}}/edit" class="btn btn-default">Edit</a>
{{-- <a href="./{{$product->id}}/delete" class="btn btn-danger">Delete</a> --}}
{!!Form::open(['action'=>['ProductController@destroy',$product->id],'method'=>'POST','class'=>'pull-right']) !!}
{{Form::hidden('_method','DELETE') }}
{{Form::submit('Delete',['class'=>'btn btn-danger']) }}
{!!Form::close() !!}
</div>
@endsection

