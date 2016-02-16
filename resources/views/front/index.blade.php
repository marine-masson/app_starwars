@extends('layouts.master')

@section('sidebar')
@parent
    <p>Home page</p>
@stop

@section('content')
    @foreach($products as $product)
        <h2><a href="{{url('prod',[$product->id,$product->slug])}}">{{ $product->title }} </a></h2>
        @if(!empty($product->category_id))
            <h3>{{ $product->category->title }}</h3>
        @endif
        @if($picture = $product->picture)
            <img src="{{ url('uploads',$picture->uri) }}" alt="">
        @endif
        <p>{{$product->abstract}}</p>
        <span>{{$product->price}} Euros</span>
        </br>
        <span>En stock : {{$product->quantity}}</span>
        <ul>
            @forelse($product->tags as $tag)
                <li>{{  $tag->name  }}</li>
            @empty
                <p>No Tag</p>
            @endforelse
        </ul>
    @endforeach

    {!! $products->links() !!}
@stop