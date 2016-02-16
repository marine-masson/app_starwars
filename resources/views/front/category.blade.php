@extends('layouts.master')
@section('sidebar')
    <h1>Category Page</h1>
@stop
@section('content')

    <h2>{{$category->title}}</h2>
    <h3>{{$category->description}}</h3>

    @if($products = $category->products )
        @forelse($products as $product)
            <h2><a href="{{url('prod',[$product->id,$product->slug])}}">{{ $product->title }} </a></h2>
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
        @empty
        <p>Il n'y a pas de produit dans cette categorie.</p>
        @endforelse
    @endif
@stop