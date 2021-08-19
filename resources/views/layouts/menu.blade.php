<li class="side-menus {{ Request::is('/') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-home"></i><span>Escritorio</span>
    </a>
</li>

@if (Auth::user()->role_id == 3)
<li class="side-menus {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-building"></i><span>Empresas</span></a>
</li>
<li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-car"></i><span>Móviles</span></a>
</li>

@endif


<li class="side-menus {{ Request::is('orders*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-hand-holding-usd"></i><span>Remitos</span></a>
</li>


