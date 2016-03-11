@if(Session::has('message'))
    <div class="alert">{{Session::get('alert')}}</div>
    <p>{{Session::get('message')}}</p>
@endif