<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="#">World</a>
        <a class="p-2 text-muted" href="#">U.S.</a>
        <a class="p-2 text-muted" href="#">Technology</a>
        <a class="p-2 text-muted" href="#">Design</a>

        @if (Auth::check())

             <a class="p-2 text-muted ml-auto" href="#">{{ Auth::user()->name }}</a>

        @endif
    </nav>
</div>