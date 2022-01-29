<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giri</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    {{-- <link href="{{asset('assets/main.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">
        <a href="#" class="logo"> <i src='{{asset('assets/images/logo-inverse.png')}}'></i></a>
        <a class="logo" src="{{asset('assets/images/logo-inverse.png')}}"></a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>

    </div>

    <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>

    <div class="header-2">
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#featured">featured</a>
            <a href="#arrivals">arrivals</a>
            <a href="#reviews">reviews</a>
            <a href="#blogs">blogs</a>
        </nav>
    </div>

</header>

<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fas fa-blog"></a>
</nav>

<!-- login form  -->

<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="">
        <h3>sign in</h3>
        <span>email</span>
        <input type="email" name="" class="box" placeholder="enter your email" id="">
        <span>password</span>
        <input type="password" name="" class="box" placeholder="enter your password" id="">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
    </form>

</div>




<!-- deal section starts  -->


    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- 
<form action="{{ route('pesan.store') }}" method="post">
    @csrf
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Tambah Data Pemesanan</h5>
            <form class="">
                <div class="position-relative form-group"><label class="">ID Pemesanan</label><input type="text" name="ID_PEMESANAN" class="form-control"></div>
                <div class="position-relative form-group"><label class="">No. Pelanggan</label>
                    <select name="NO_PELANGGAN" id="NO_PELANGGAN" class="form-control">
                        <option disabled>Pilih Pelanggan</option>
                        @foreach ($pelanggan as $item)
                            <option value="{{ $item->NO_PELANGGAN }}">{{ $item->NO_PELANGGAN }} - {{ $item->NAMA_PELANGGAN }}</option>
                        @endforeach
                    </select></div>

                <div class="position-relative form-group"><label class=""></label><input type="number" name="ID_PEGAWAI" value="1" class="form-control" style="display:none;"></div>
                <div class="position-relative form-group"><label class="">Alamat Kirim</label><input type="address" name="ALAMAT_KIRIM" class="form-control"></div>
                <div class="position-relative form-group"><label class="">Tanggal Pemesanan</label><input type="date" name="TANGGAL_PEMESANAN" class="form-control"></div>
                <div class="position-relative form-group"><label for="exampleSelect" class="">Metode Pembayaran</label><select name="METODE_PEMBAYARAN" id="exampleSelect" class="form-control">
                    <option value="0">Bayar Tunai</option>
                    <option value="1">Transfer</option>
                </select></div>
                <div class="position-relative form-group"><label class="">Keterangan</label><input name="KETERANGAN_PEMESANAN" type="text" class="form-control"></div>
                <div class="position-relative form-group"><label class=""></label><input type="text" name="STATUS_PEMESANAN" value="1" class="form-control" style="display:none;"></div>
                <button class="mt-1 btn btn-primary">Submit</button>
                <a href="{{ route('custpesan.index') }}" class="btn btn-md btn-secondary">Back</a>
            </form>
        </div>
    </div>
</form> --}}


<!-- deal section ends -->



<!-- arrivals section starts  -->

<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>Ada yang baru!</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-1.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-2.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-3.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-4.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-5.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-6.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-7.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-8.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-9.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src={{asset("image/book-10.png")}} alt="">
                </div>
                <div class="content">
                    <h3>Ada yang baru!</h3>
                    <div class="price">Rp25.000 <span>Rp50.000</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

</section>

<!-- arrivals section ends -->

<!-- newsletter section starts -->

<section class="newsletter">

    <form action="">
        <h3>subscribe for latest updates</h3>
        <input type="email" name="" placeholder="enter your email" id="" class="box">
        <input type="submit" value="subscribe" class="btn">
    </form>

</section>

<!-- newsletter section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> arrivals </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> reviews </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> blogs </a>
        </div>

        {{-- <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> privacy policy </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
        </div> --}}

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> 0896-1826-1752 </a>
            <a href="#"> <i class="fas fa-phone"></i> 0813-2817-1361 </a>
            <a href="#"> <i class="fas fa-envelope"></i> giri@gmail.com </a>
            <img src={{asset("image/worldmap.png")}} class="map" alt="">
        </div>
        
    </div>

    <div class="box">
        <h3>our locations</h3>
        Jombang, Jawa Timur, Indonesia
        {{-- <a href="#"> <i class="fas fa-map-marker-alt"></i> india </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> russia </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> france </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> japan </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> africa </a> --}}
    </div>

    <div class="share">
        Social Media
        {{-- <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a> --}}
    </div>

    <div class="credit">  <span>Giri</span> </div>

</section>

<!-- footer section ends -->

<!-- loader  -->

<div class="loader-container">
    <img src={{asset("image/loader-img.gif")}} alt="">
</div>
















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="{{asset('js/script.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script> --}}
</body>
</html>