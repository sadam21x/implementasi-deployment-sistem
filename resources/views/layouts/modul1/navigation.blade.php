<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            {{-- <li>
                <a href="{{ url('/sales-a') }}" id="dashboard-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li> --}}
            <li>
                <a href="#" id="customer-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Customer</span>
                </a>

                <ul>
                    <li>
                        <a href="{{ url('/modul-1/customer') }}">Data Customer</a>

                        {{-- <ul>
                            <li>
                                <a href="{{ url('/modul-1/customer/tambah-1') }}">Tambah Customer 1</a>
                            </li>
                            <li>
                                <a href="{{ url('/modul-1/customer/tambah-2') }}">Tambah Customer 2</a>
                            </li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="{{ url('/modul-1/customer/tambah-1') }}">Tambah Customer 1</a>
                    </li>
                    <li>
                        <a href="{{ url('/modul-1/customer/tambah-2') }}">Tambah Customer 2</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>