
@extends('layouts.app');

@section('title')
    Edit
@endsection

@section('content');
<div class="container">
    @if (Session::has('error'))
    <p class="alert alert-danger">
        {{Session::get('error')}}
        {{Session::put('error',null)}}
    </p>
    @endif
{{--<form action="{{url('/saveproduct')}}" method="POST" class="form-horizontal">--}}
    {!!Form::open(['action'=>'PagesController@updateproduct','method'=>'post','class'=>'form-horizontal']) !!}
    {{ csrf_field() }}
    {{Form::hidden('id',$product->id)}}
      <div class="form-group">
          {{-- <label for="">Product name</label>
          <input type="text" placeholder="Product Name" class="form-control" name="product_name"> --}}
          {{Form::label('','Product Name')}}
          {{Form::text('product_name',$product->product_name,['placeholder'=>'Product Name','class'=>'form-control'])}}
      </div>
      <div class="form-group">
          {{-- <label for="">Product price</label>
          <input type="number" placeholder="Price" class="form-control" name="product_price"> --}}
          {{Form::label('','Product Price')}}
          {{Form::number('product_price',$product->product_price,['placeholder'=>'Product Price','class'=>'form-control'])}}
      </div>
      <div class="form-group">
          {{-- <label for="">Product description</label>
          <input type="text" placeholder="Product Description" class="form-control" name="product_description"> --}}
          {{Form::label('','Product Description')}}
          {{Form::textarea('product_description',$product->product_description,['id'=>'editor','placeholder'=>'Product Description','class'=>'form-control'])}}
      </div>
      {{-- <input type="submit" class="btn btn-primary" value="Create"> --}}
      {{Form::submit('Update Product',['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
  {{--</form>--}}
</div>
@endsection

