<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            <li>
                <a href="#" id="customer-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Customer</span>
                </a>

                <ul>
                    <li>
                        <a href="{{ url('/customer') }}">Data Customer</a>
                    </li>
                    <li>
                        <a href="{{ url('/customer/tambah-1') }}">Tambah Customer 1</a>
                    </li>
                    <li>
                        <a href="{{ url('/customer/tambah-2') }}">Tambah Customer 2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('/cetak-label-tnj-108') }}" id="cetak-label-tnj-108-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-paw"></i>
                    </span>
                    <span>Cetak label TnJ 108</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/barcode-scanner') }}" id="barcode-scanner-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-barcode"></i>
                    </span>
                    <span>Barcode Scanner</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/kunjungan-toko') }}" id="kunjungan-toko-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-store"></i>
                    </span>
                    <span>Kunjungan Toko</span>
                </a>
            </li>
        </ul>
    </div>
</div>