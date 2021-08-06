<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-building"></i><span>Users</span></a>
</li>

<li class="side-menus {{ Request::is('orders*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-building"></i><span>Orders</span></a>
</li>

<li class="side-menus {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-building"></i><span>Companies</span></a>
</li>

