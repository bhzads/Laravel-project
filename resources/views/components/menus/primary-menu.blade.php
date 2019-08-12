<br>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <ul class="navbar-nav">
    @foreach($menu['primary'] as $item)

                <li class="nav-item  {{ $item->active ? 'active' :'' }}">
                    <a class="nav-link" href="{{ $item->url }}">{{ $item->title }}</a>
    @endforeach

    </ul>
</nav>
