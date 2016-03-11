<nav class="main-nav">
    <ul>
        <li><a href="/">Accueil</a></li>
        @forelse($categories as $category)
            <li><a href="{{ url('category',[$category->id, $category->slug]) }}">{{ $category->title }}</a></li>
        @empty
        @endforelse
        <li><a href="/contact">Contact</a></li>
        @if(Auth::check())
            <li><a href="{{url('product')}}">Dashboard Product</a></li>
            <li><a href="{{url('logout')}}">Logout</a></li>
        @else
            <li><a href="{{url('login')}}">Login</a></li>
            <li><a href="{{url('cart')}}">Panier</a></li>
        @endif
    </ul>
</nav>