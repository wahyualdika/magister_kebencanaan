<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIMIK</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Optional theme -->
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="{!! URL::asset('/node_modules/font-awesome/css/font-awesome.min.css') !!}" />
    <link rel="stylesheet" href="{!! URL::asset('/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') !!}" />
    <link rel="stylesheet" href="{!! URL::asset('/node_modules/flag-icon-css/css/flag-icon.min.css') !!}" />
    <link rel="stylesheet" href="{!! URL::asset('/css/style.css') !!}" />
    @yield('stylesheet')
    <link rel="shortcut icon" href="{!! URL::asset('images/favicon.png') !!}" sizes="48x48"  />


</head>

<body>
<div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="bg-white text-center navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="index.html"><img src={!! URL::asset("images/logo_star_black.png")!!} /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src={!! URL::asset("images/logo_star_mini.jpg")!!} alt=""></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-target="#sidebar" data-toggle="minimize">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form action="{{route('admin.dosen.cari')}}" method="post" class="form-inline mt-2 mt-md-0 d-none d-lg-block">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2 search" type="text" name="nama" placeholder="Cari Dosen" id="input">
                <button id="submit" class="btn btn-primary mr-2" type="submit">Cari</button>
            </form>
            <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
                <li class="nav-item">
                    <a class="nav-link profile-pic" href="#" data-toggle="collapse" ><img class="rounded-circle" src="{!! URL::asset("images/face.jpg") !!}" alt=""> </a>
                </li>
                <li class="nav-item">
                        <div>
                            @if(Auth::guard('web')->check())
                                    <form class="form-horizontal" method="POST" action="{{ route('logout') }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
                             @endif
                        </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>



    <!-- partial -->
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-right">
            <!-- partial:partials/_sidebar.html -->
            <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
                <div class="user-info">
                    <img src={!! URL::asset("images/face.jpg")!!} alt="">
                   <p class="name">{{Auth::user()->name}}</p>
                    <p class="designation">{{Auth::user()->email}}</p>
                    <span class="online"></span>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">
                            <img src={!! URL::asset("images/icons/1.png")!!} alt="">
                            <span class="menu-title">Dashbord</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-dosen" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Dosen<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-dosen">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.dosen.daftar')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.dosen.inputForm')}}">
                                        Data Dosen
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.dosen.prestasi')}}">
                                        Data Prestasi Dosen
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.dosen.pengalaman')}}">
                                        Data Pengalaman Dosen
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.dosen.seminar')}}">
                                        Data Kegiatan Seminar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.dosen.aktivitas')}}">
                                        Data Aktifitas Dosen
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.dosen.tugasBelajar')}}">
                                        Tugas Belajar Dosen
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-mahasiswa" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Mahasiswa<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-mahasiswa">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.mahasiswa.daftar')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.mahasiswa.form')}}">
                                        Data Mahasiswa
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.alumni.form')}}">
                                        Data Alumni
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('mahasiswa.penelitian.form')}}">
                                        Data Penelitian
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('mahasiswa.lulusan.form')}}">
                                        Data Lulusan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('mahasiswa.dana.form')}}">
                                        Data Dana Operasional
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('evaluasi.lulusan.form')}}">
                                        Data Evaluasi Lulusan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-staff" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Staff<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-staff">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.staff.view')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.staff.form')}}">
                                        Masukkan Data
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-penelitian" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Penelitian<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-penelitian">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.penelitian.daftar')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.penelitian.view')}}">
                                        Lihat Daftar Penelitian
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.penelitian.viewBimbingan')}}">
                                        Lihat Daftar Bimbingan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.penelitian.inputForm')}}">
                                        Data Penelitian
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.penelitian.inputBimbingan')}}">
                                        Data Bimbingan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-publikasi" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Publikasi<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-publikasi">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.publikasi.daftar')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.publikasi.view')}}">
                                        Lihat Daftar Publikasi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.publikasi.inputForm')}}">
                                        Masukkan Publikasi
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-kurikulum" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Kurikulum<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-kurikulum">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('mataKuliah.daftarTampil.view')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('mataKuliah.struktur.form')}}">
                                        Form MK
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('mataKuliah.pilihan.form')}}">
                                        Form MK Pilihan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('mataKuliah.sksMinimal.form')}}">
                                        Form SKS minimal PS
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-tenaga-ahli" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Tenaga Ahli<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-tenaga-ahli">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('tenagaAhli.kegiatan.view')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('tenagaAhli.kegiatan.form')}}">
                                        Form Tenaga Ahli
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-pengabdian" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Pengabdian Masyarakat<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-pengabdian">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.pengabdian.daftarTampil')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.pengabdian.form')}}">
                                        Form Pengabdian
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-ruang-kerja" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Ruang Kerja<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-ruang-kerja">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.ruangKerja.view')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.ruangKerja.form')}}">
                                        Form Ruang Kerja
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-pustaka" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Pustaka<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-pustaka">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.pustaka.view')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.pustaka.form')}}">
                                        Form Pustaka
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-akses" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Aksesibilitas Data<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-akses">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.aksesibilitasData.view')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.aksesibilitasData.form')}}">
                                        Form Aksesibilitas
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-alokasi" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Alokasi Dana<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-alokasi">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.alokasiDana.view')}}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.alokasiDana.form')}}">
                                        Form Alokasi Dana
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>

            <!-- partial -->
            <div class="content-wrapper">
                <h3 class="page-heading mb-4">Dashboard</h3>
                @yield('side-content')
            </div>
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Star Admin</a> &copy; 2017
            </span>
                </div>
            </footer>

            <!-- partial -->
        </div>
    </div>

</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
<script src="{!! URL::asset('node_modules/jquery/dist/jquery.min.js') !!}"></script>
<script src="{!! URL::asset('node_modules/popper.js/dist/umd/popper.min.js') !!}"></script>
<script src="{!! URL::asset('node_modules/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script src="{!! URL::asset('node_modules/chart.js/dist/Chart.min.js') !!}"></script>
<script src="{!! URL::asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') !!}"></script>
<script src="{!! URL::asset('js/off-canvas.js') !!}"></script>
<script src="{!! URL::asset('js/hoverable-collapse.js') !!}"></script>
<script src="{!! URL::asset('js/misc.js') !!}"></script>
<script src="{!! URL::asset('js/chart.js') !!}"></script>
<script src="{!! URL::asset('js/maps.js') !!}"></script>
@yield('script_bottom')
</body>
</html>
