<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">Comfort Data</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ request()->is('home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/home') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Your rooms</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('rooms') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/rooms') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Room list</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
