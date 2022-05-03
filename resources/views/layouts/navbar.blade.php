<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#">
                            <img src="/public/img/logo/siamar.png" alt="" style="max-height: 50px"/>
                            {{-- <h3>Sistem Informasi Amar Putusan</h3>
                            <h4>Pengadilan Agama Watampone</h4> --}}
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <div class="nav navbar-nav notika-top-nav">
                            {{-- <button class="btn btn-sm btn-primary"></button> --}}
                            <div class="alert" style="background-color:rgb(219, 221, 216);margin-top: 10px; color:rgb(0, 0, 0)">Selamat Datang, {{Auth::user()->name}}
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i> Keluar</button>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        {{-- <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item"><a href="#" aria-expanded="false" class="nav-link dropdown-toggle"><p>Selamat Datang {{Auth::user()->name}}</p></a>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menus"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                    <div class="hd-message-info hd-task-info">
                                        <div class="skill">
                                                <a role="menuitem" tabindex="-1" href="#"><i class="notika-icon notika-house"></i> Action</a>
                                                <hr>
                                                <a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();"><i class="notika-icon notika-house"></i> Keluar</a>
                                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
