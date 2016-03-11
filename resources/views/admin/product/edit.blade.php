@extends('layouts.admin')
@section('content')
    <div class="grid-2">
        <form action="{{url('product', $product->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <label>Nom produit</label>
            <input type="text" name="title" value="{{$product->title}}"/>
            @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span> @endif
            <br/>

            <label>Slug</label>
            <input type="text" name="slug" value="{{$product->slug}}"/>
            @if($errors->has('slug')) <span class="error">{{$errors->first('slug')}}</span> @endif
            <br/>

            <label>Prix</label>
            <input type="text" name="price" value="{{$product->price}}"/>
            @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span> @endif
            <br/>

            <label>Quantité</label>
            <input type="text" name="quantity" value="{{$product->quantity}}"/>
            @if($errors->has('quantity')) <span class="error">{{$errors->first('quantity')}}</span> @endif
            <br/>

            <label>Extrait</label>
            <textarea name="abstract" id="" cols="30" rows="10">{{$product->abstract}}</textarea>
            @if($errors->has('abstract'))<span class="error">{{$errors->first('abstract')}}</span> @endif
            <br/>

            <label>Description du produit</label>
            <textarea name="content" id="" cols="30" rows="10">{{$product->content}}</textarea>
            @if($errors->has('content')) <span class="error">{{$errors->first('content')}}</span> @endif
            <br/>

            <label>Categorie</label>
            <select name="category_id">
                @foreach($categories as $title=>$id)
                    <option value="{{$id}}" {{$product->category_id==$id? 'selected' : ''}}>{{$title}}</option>
                @endforeach
                    <option value="0" {{is_null($product->category_id)? 'selected' : ''}}>non catégorisé</option>

            </select>

            <label>Tags</label>
            <select name="tag_id[]" multiple>
                @foreach($tags as $name=>$id)
                    <option value="{{$id}}" {{$product->hasTag($id)? 'selected' : ''}} >{{$name}}</option> @endforeach
            </select>
            <br/>

            <label for="">Image</label>

            @if(!is_null($product->picture))
            @if(count($product->picture)>0)
                <img src="{{url('uploads',$product->picture->uri)}}" width="100" >

            @endif
            @endif
            <input type="file" name="picture"><br/>
            <input type="checkbox" name="deletePicture" value="true"/>Delete picture.
            @if($errors->has('picture')) <span class="error">{{$errors->first('picture')}}</span> @endif
            <br/>
            <label>Mettre en ligne le produit :</label>
            <input type= "radio" name="status" value="published"/> published
            <input type= "radio" name="status" value="unpublished"/> unpublished

            <input type="submit" value="envoyé"/>
        </form>
    </div>
@stop