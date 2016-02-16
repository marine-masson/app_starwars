@extends('layouts.master')
@section('sidebar')
    <h1>Contact</h1>


@stop
@section('content')
    @if(Session::has('msg'))
        <span class="warning {{Session::get('alert')}}">{{Session::get('msg')}}</span>
    @else
        <form action="{{url('send')}}" method="post">
            {{csrf_field()}}
            <fieldset>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="mail" value="{{old('email')}}">
            @if($errors->has('email'))
                    <span class="error">{{$errors->first('email')}}</span>
                @endif
            </fieldset>
            <fieldset>
                <label for="message">Votre message</label>
                <textarea name="message" id="message" cols="30" rows="10">{{old('message')}}</textarea>
                @if($errors->has('message'))
                    <span class="error">{{$errors->first('message')}}</span>
                @endif
            </fieldset>
            <input type="submit" value="Envoyer">
        </form>
    @endif
@stop