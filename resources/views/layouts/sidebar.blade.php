<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Main</li>
                @role('admin')
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span
                            class="badge badge-primary"></span> <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-bank"></i><span> SPP <span
                                class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </span></a>
                    <ul class="submenu">
                        <li><a href="{{route('spp.index')}}">Setting</a></li>
                        <li><a href="{{route('transaksi-spp.index')}}">Entry Transaksi</a></li>
                        <li><a href="{{route('history-spp.index')}}">History Transaksi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-settings"></i><span>
                            User Access <span class="float-right menu-arrow"><i class="mdi
                            mdi-chevron-right"></i></span>
                        </span></a>
                    <ul class="submenu">
                        <li><a href="{{route('users.index')}}">Users</a></li>
                        <li><a href="{{route('roles.index')}}">Roles</a></li>
                        {{--                        <li><a href="{{route('permissions.index')}}">Permissions</a></li>--}}
                    </ul>
                </li>
                <li>
                    <a href="{{route('siswa.index')}}" class="waves-effect {{set_active('siswa.*')}}"><i
                            class="mdi mdi-account"></i><span> Siswa </span></a>
                </li>
                <li>
                    <a href="{{route('kelas.index')}}" class="waves-effect"><i
                            class="mdi mdi-school"></i><span> Kelas </span></a>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i
                            class="mdi mdi-book"></i><span> Laporan </span></a>
                </li>

            </ul>
            @endrole

            @role('petugas')
            <li>
                <a href="{{route('dashboard')}}" class="waves-effect">
                    <i class="mdi mdi-view-dashboard"></i><span
                        class="badge badge-primary"></span> <span> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-bank"></i><span>SPP <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                    </span></a>
                <ul class="submenu">
                    <li><a href="{{route('transaksi-spp.index')}}">Entry Transaksi</a></li>
                    <li><a href="{{route('history-spp.index')}}">History Transaksi</a></li>
                </ul>
            </li>
            @endrole

            @role('siswa')
            <li>
                <a href="{{route('dashboard')}}" class="waves-effect">
                    <i class="mdi mdi-view-dashboard"></i><span
                        class="badge badge-primary"></span> <span> Dashboard </span>
                </a>
            </li>
            @endrole

        </div>
        <div class="clearfix"></div>
    </div>
</div>
