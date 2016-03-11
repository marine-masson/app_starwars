@extends('layouts.admin')
@section('content')
<div class="">
    <button><a href="{{url('product', 'create')}}">Create a product</a></button>
        <table>
            <tr>
                <th>Status</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <!-- Status -->
                <td>{{$product->status}}</td>

                <!-- Name -->
                <td><a href="{{url('product', [$product->id, 'edit'])}}">{{ $product->title }}</a></td>

                <!-- Price -->
                <td>{{$product->price}}</td>

                <!-- Quantity -->
                <td>{{$product->quantity}}</td>

                <!-- Date -->
                <td>{{$product->published_at}}</td>

                <!-- Category -->
                <td>{{($cat=$product->category)? $cat->title : 'no category'}}</td>

                <!-- Tags -->
                <td>
                    @if(count($product->tags)>0)
                    @foreach($product->tags as $tag) {{$tag->name}} @endforeach
                    @else 'no tag'
                    @endif
                </td>

                <!-- Action -->
                <td>
                    <form action="{{url('product', $product->id)}}" method="post">
                        {{method_field('DELETE')}}
                        <input type="hidden" name="_method" value="DELETE"/>
                        {{csrf_field()}}
                        <input type="submit" value="delete"/>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $products->links() !!}
</div>
@stop