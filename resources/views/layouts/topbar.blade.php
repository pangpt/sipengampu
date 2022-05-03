<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="{{Request::segment(2) == 'dashboard' ? 'active' : ''}}"><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="{{Request::segment(2) == 'pihak_cerai' ? 'active' : ''}}"><a href="{{route('pihak_cerai')}}"><i class="fa fa-file"></i> Tabel Amar Putusan</a>
                    </li>
                    @if(Auth::user()->level == 'Superadmin')
                    <li class={{Request::segment(2) == 'getpengguna' ? 'active' : ''}}><a href="{{route('getpengguna')}}"><i class="fa fa-users"></i> Tabel Pengguna</a>
                    </li>
                    @else
                    <li class={{Request::segment(2) == 'profil' ? 'active' : ''}}><a href="{{route('profilpengguna')}}"><i class="fa fa-users"></i> Data Profil Pengguna</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
