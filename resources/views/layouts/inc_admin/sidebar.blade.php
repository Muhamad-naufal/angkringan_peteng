<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ url('images/favicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <x-nav-item label="Dashboard" icon="fa-solid fa-clipboard" :link="route('dashboard')" />
                @can('role', 'admin')
                    <x-nav-item label="User Admin" icon="fas fa-users" :link="route('admin.index')" />
                    <x-nav-item label="User Makanan" icon="fa-solid fa-utensils" :link="route('makanan.index')" />
                    <x-nav-item label="Orderan" icon="fa-solid fa-mug-saucer" :link="route('order.index')" />
                    <x-nav-item label="Laporan" icon="fa-solid fa-book" :link="route('reports.index')" />
                @endcan
            </ul>
        </nav>
    </div>
</aside>
