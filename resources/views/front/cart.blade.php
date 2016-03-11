@extends('layouts.master')

@section('content')
    <h1>Panier</h1>
    <form action="{{url('storeCommand')}}" method="post">
        <ul>
            @foreach($products as  $product)
                <li>
                    <p><b>{{ $product['name'] }}</b></p>
                    <span><b>Quantity :</b> {{$product['quantity']}}</span><br>
                    <span><b>Price : </b>{{$product['price']}}€</span>
                    <input type="hidden" name="product_id[]" value="{{$product['id']}}">
                    <input type="hidden" name="quantity{{$product['id']}}" value="{{$product['quantity']}}">
                    <p>Total : {{$total}} €</p>
                    <a href="{{url('restore',[$product['id']])}}">Supprimer le produit</a>
                </li>
            @endforeach

            @if(!empty($products))
                <a href="{{url('reset')}}">Vider le panier</a>
            @else
                <p><b>Votre panier est vide</b></p>
            @endif
        </ul>
        <input type="submit" name="valider" value="Valider votre panier"/>
        {{csrf_field()}}
    </form>


@stop
