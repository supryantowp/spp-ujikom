<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Main</li>
                @role('admin')
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge badge-primary"></span>
                        <span>Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-ticket"></i>
                        <span>
                            Antrian
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('transaksi-spp.index') }}">Ticket</a>
                        </li>
                        <li>
                            <a href="{{ route('pelunasan-spp.index') }}">Screen</a>
                        </li>
                        <li>
                            <a href="#">Pengaturan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-bank"></i>
                        <span>
                            SPP
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('transaksi-spp.index') }}">Entry Transaksi</a>
                        </li>
                        <li>
                            <a href="{{ route('pelunasan-spp.index') }}">Pelunasan Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ set_active(['users.*', 'roles.*']) }}">
                    <a href="javascript:void(0);" class="waves-effect {{ set_active(['users.*', 'roles.*']) }} ">
                        <i class="mdi mdi-account-settings"></i>
                        <span>
                            User Access
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu">
                        <li class="{{ set_active('users.*') }}">
                            <a href="{{ route('users.index') }}">Users</a>
                        </li>
                        <li class="{{ set_active('roles.*') }}">
                            <a href="{{ route('roles.index') }}">Roles</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ set_active(['kelas.*', 'siswa.*', 'spp.*', 'lokets.*']) }}">
                    <a href="javascript:void(0);"
                        class="waves-effect {{ set_active(['kelas.*', 'siswa.*', 'spp.*', 'lokets.*']) }} ">
                        <i class="mdi mdi-table"></i>
                        <span>
                            Management
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu">
                        <li class="{{ set_active('spp.*') }}">
                            <a href="{{ route('spp.index') }}">Tagihan Spp</a>
                        </li>
                        <li class="{{ set_active('kelas.*') }}">
                            <a href="{{ route('kelas.index') }}">
                                <span>Kelas</span>
                            </a>
                        </li>
                        <li class="{{ set_active('siswa.*') }}">
                            <a href="{{ route('siswa.index') }}">
                                <span>Siswa</span>
                            </a>
                        </li>
                        <li class="{{ set_active('lokets.*') }}">
                            <a href="{{ route('lokets.index') }}">
                                <span>Loket</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="mdi mdi-book"></i><span> Laporan </span></a>
                </li>

                @endrole

                @role('petugas')
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span class="badge badge-primary"></span> <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-bank"></i><span>SPP <span
                                class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </span></a>
                    <ul class="submenu">
                        <li><a href="{{ route('transaksi-spp.index') }}">Entry Transaksi</a></li>
                        <li><a href="{{ route('history-spp.index') }}">History Transaksi</a></li>
                    </ul>
                </li>
                @endrole

                @role('siswa')
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span class="badge badge-primary"></span> <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
