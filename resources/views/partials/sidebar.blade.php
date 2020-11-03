
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">Smart NX</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">{{ strtoupper(substr(env('APP_NAME'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ url('dashboard    ') }}"><i
                    class="fas fa-columns"></i> <span>Dashboard</span></a></li>
        <li class="{{ request()->is('cars.index') ? 'active' : '' }}"><a href="{{ route('carros.index') }}"><i
                    class="fas fa-car"></i> <span>Carros</span></a></li>

        <li class="{{ request()->is('table') ? 'active' : '' }}">
            <a href="{{ route('categorias.index') }}">
                <i class="fas fa-marker"></i> <span>Marcas</span>
            </a>
        </li>
    </ul>
</aside>
