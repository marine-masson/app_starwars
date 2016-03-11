@extends('layouts.master')
@section('sidebar')
    <h1>Product Page</h1>
@stop
@section('content')
        <h2><a href="{{url('prod',[$product->id,$product->slug])}}"> {{ $product->title }} </a></h2>
        @if(!empty($product->category_id))
            <h3>{{ $product->category->title }}</h3>
        @endif
        @if($picture = $product->picture)
            <img src="{{ url('uploads',$picture->uri) }}" alt="">
        @endif
        <p>{{$product->abstract}}</p>
        <ul>
        @forelse($product->tags as $tag)
                <li>{{  $tag->name  }}</li>
            @empty
                <p>No Tag</p>
            @endforelse
        </ul>
        <span>{{$product->price}} Euros</span>
        </br>
        <span>En stock : {{$product->quantity}}</span>

        <form action="{{url('command')}}" method="post">
            {{csrf_field()}}
            <input class="hidden" type="text" name="id" value="{{$product->id}}">
            <select name="quantity" id="quantity">
                @for($i = 1; $i <= $product->quantity; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <input type="submit" value="Commander">
        </form>
@stop
