<div class="title-bar" data-responsive-toggle="my-nav" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle="my-nav"></button>
    <div class="title-bar-title">{{ config('app.name', 'Laravel') }}</div>
</div>
{{-- top bar  --}}
<nav class="top-bar" id="my-nav" data-animate="hinge-in-from-top hinge-out-from-left">
    <div class="top-bar-left">
        <ul class="vertical medium-horizontal dropdown menu" data-dropdown-menu>
            <li class="menu-text">{{ config('app.name', 'Laravel') }}</li>
            <li><a href="{{ route('posts.index') }}">Blog Posts</a></li>
            @if (!Auth::guest())
            <li><a href="{{ route('posts.create') }}">Create Posts</a></li>
            @endif
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="vertical medium-horizontal menu">
            @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @else
            <ul class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown">
                <li>
                    <a href="#">{{ Auth::user()->name }}</a>
                    <ul class="menu vertical">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif
        </ul>
    </div>
</nav>
