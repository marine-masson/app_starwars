<nav class="main-nav">
    <ul>
        <li><a href="/">Accueil</a></li>
        @forelse($categories as $category)
            <li><a href="{{ url('category',[$category->id, $category->slug]) }}">{{ $category->title }}</a></li>
        @empty
        @endforelse
        <li><a href="/contact">Contact</a></li>
        <li><a href="/login">Login</a></li>
    </ul>
</nav>