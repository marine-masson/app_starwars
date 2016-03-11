@extends('layouts.admin')
@section('content')
    <div class="grid-2">
        <form action="{{url('product')}}" method="post" enctype="multipart/form-data">
            <label>Nom produit</label>
            <input type="text" name="title"/>
            @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span> @endif 
            <br/>

            <label>Slug</label>
            <input type="text" name="slug"/>
            @if($errors->has('slug')) <span class="error">{{$errors->first('slug')}}</span> @endif
            <br/>

            <label>Prix</label>
            <input type="text" name="price"/>
            @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span> @endif 
            <br/>

            <label>Quantité</label>
            <input type="text" name="quantity"/>
            @if($errors->has('quantity')) <span class="error">{{$errors->first('quantity')}}</span> @endif 
            <br/>

            <label>Extrait</label>
            <textarea name="abstract" id="" cols="30" rows="10"></textarea>
            @if($errors->has('abstract')) <span class="error">{{$errors->first('abstract')}}</span> @endif 
            <br/>

            <label>Description du produit</label>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
            @if($errors->has('content')) <span class="error">{{$errors->first('content')}}</span> @endif 
            <br/>

            <label>Categorie</label>
            <select name="category_id">
                @foreach($categories as $title=>$id)
                    <option value="{{$id}}">{{$title}}</option> @endforeach
            </select>

            <label>Tags</label>
            <select name="tag_id[]" multiple>
                @foreach($tags as $name=>$id)
                    <option value="{{$id}}">{{$name}}</option> @endforeach
            </select>
            <br/>

            <label for="">Image</label>
            <input type="file" name="picture">
            @if($errors->has('picture')) <span class="error">{{$errors->first('picture')}}</span> @endif

            <label>Mettre en ligne le produit :</label>
            <input type= "radio" name="status" value="published"/> published
            <input type= "radio" name="status" value="unpublished"/> unpublished

            {{csrf_field()}}
            <input type="submit" value="envoyé"/>
        </form>
    </div>
@stop