@extends('layouts.master')
@section('sidebar')
    <h1>Login</h1>


@stop
@section('content')
    @if(Session::has('msg'))
        <span class="warning">{{Session::get('msg')}}</span>
    @endif
    <form action="{{url('login')}}" method="post">
        {{csrf_field()}}
        <fieldset>
            <label for="login">Login</label>
            <input type="email" name="email" id="email" value="{{old('email')}}">
            @if($errors->has('login'))
                <span class="error">{{$errors->first('login')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" value="">
            @if($errors->has('password'))
                <span class="error">{{$errors->first('password')}}</span>
            @endif
        </fieldset>
        <input type="checkbox" name="choix1" value="remember"> Remember me
        <input type="submit" value="Connecter">
    </form>

@stop