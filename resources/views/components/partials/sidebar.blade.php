<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ request()->routeIs('admin.index' ? 'active' : '') }}">
                    <a href="{{ route('admin.index') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class=" {{ Request::segment(2) == 'banner' ? 'active' : '' }} ">
                    <a href="{{ route('banner.index') }}"><i class="menu-icon ti-image"></i>Banner </a>
                </li>
                <li class=" {{ Request::segment(2) == 'artikel' ? 'active' : ' ' }} ">
                    <a href="{{ route('artikel.index') }}"><i class="menu-icon ti-blackboard"></i>Artikel</a>
                </li>
                <li class="{{ Request::segment(2) == 'ppd-online' ? 'active' : '' }}">
                    <a href="{{ route('data-ppd.index') }}"><i class="menu-icon ti-save"></i>Data PPD </a>
                </li>
                <li class="{{ Request()->routeIs('admin.index') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}"><i class="menu-icon ti-user"></i>Data Users </a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
