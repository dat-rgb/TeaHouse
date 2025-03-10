
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tea House</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="bg-white show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->
    <!-- Navbar Start -->
    <div class="bg-white container-fluid sticky-top">
        <div class="container">
            <nav class="py-2 bg-white navbar navbar-expand-lg navbar-light py-lg-0">
                <a href="" class="navbar-brand">
                    <img class="img-fluid" src="{{asset('img/logo.png')}}" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('home.index') }}" class="nav-item nav-link active">Trang Chủ</a>
                        <div class="nav-item dropdown" style="background: white;">
                            <a href="{{ route('sanpham.index') }}" class="nav-link">Sản phẩm <i class="bi bi-chevron-down"></i></a>
                            <div class="mega-dropdown-menu d-flex">
                                @foreach($danhMucSanPhams as $danhMuc)
                                    @if(!empty($danhMuc['children']))
                                        <div class="mega-menu-column">
                                            <div class="mega-menu-title">{{ $danhMuc['ten_danh_muc'] }}</div>
                                            @foreach($danhMuc['children'] as $child)
                                                <div class="mega-menu-item">
                                                    <a href="#">{{ $child['ten_danh_muc'] }}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ route('home.thucDon') }}" class="nav-item nav-link">Thực đơn</a>
                        <a href="" class="nav-item nav-link">Giới thiệu</a>
                        <div class="nav-item dropdown">
                            <a href="" class="nav-link">Chuyện nhà <i class="bi bi-chevron-down"></i></a>
                            <div class="m-0 dropdown-menu bg-light rounded-0">
                                <a href="blog.html" class="dropdown-item">Trà trái cây</a>
                                <a href="testimonial.html" class="dropdown-item">Nước ép</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="{{ route('home.contact') }}" class="nav-item nav-link">Liên hệ</a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-flex align-items-center">
                        <!-- Nút tìm kiếm -->
                        <button type="button" class="p-0 btn btn-sm" title="Tìm kiếm" onclick="toggleSearch()">
                            <i class="fa fa-search fs-4"></i>
                        </button>
                        <!-- Nút giỏ hàng -->
                        <a href="{{ route('home.giohang') }}" class="p-0 btn btn-sm ms-3 position-relative" title="Giỏ hàng">
                            <i class="fa fa-shopping-cart fs-4"></i>
                            <span class="top-0 position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                                3 <!-- Số lượng sản phẩm gán cứng -->
                            </span>
                        </a>
                        <!-- Nút đăng nhập với dropdown -->
                        <div class="dropdown d-inline-block ms-3">
                            <button class="p-0 btn btn-sm position-relative" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user fs-4"></i>
                            </button>
                            <ul class="border-0 shadow dropdown-menu dropdown-menu-end bg-light rounded-0" aria-labelledby="loginDropdown">
                                @auth
                                    <li class="dropdown-item disabled">Xin chào, {{ Auth::user()->ten_tai_khoan }}</li>
                                    <li><a class="dropdown-item" href="{{ route('khachhang.index') }}">Tài khoản của tôi</a></li>
                                    <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <li><a class="cursor-pointer dropdown-item" onclick="openLoginPopup()">Đăng nhập</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                    <!-- Lớp phủ mờ nền khi tìm kiếm mở -->
                    <div id="overlay" class="top-0 position-fixed start-0 w-100 h-100 bg-dark d-none" style="z-index: 1049; opacity: 0.2;"></div>
                    <!-- Ô nhập tìm kiếm ở giữa phía trên -->
                    <div id="searchContainer" class="top-0 p-3 bg-white shadow-lg position-fixed start-50 translate-middle-x w-50 d-none" style="z-index: 1050; margin-top: 20px; border-radius: 10px;">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm...">
                            <button class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <x-login-modal />
    <!-- Navbar End -->
    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->
    <!-- Footer Start -->
    <div class="py-5 mt-5 container-fluid bg-dark footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4 text-primary">Địa chỉ</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Quận 1, TP Hồ Chí Minh</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+84 090 1318 766</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>teahouse@gmail.com</p>
                    <div class="pt-3 d-flex">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4 text-primary">Giới thiệu</h4>
                    <a class="btn btn-link" href="">Về chúng tôi</a>
                    <a class="btn btn-link" href="">Sản phẩm</a>
                    <a class="btn btn-link" href="">Điều khoản sử dụng</a>
                    <a class="btn btn-link" href="">Hổ trợ</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4 text-primary">Giời hoạt động</h4>
                    <p class="mb-1">Thứ 2 - Chủ nhật</p>
                    <h6 class="text-light">07:00 am - 23:00 pm</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4 text-primary">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative w-100">
                        <input class="py-3 bg-transparent form-control w-100 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="top-0 py-2 mt-2 btn btn-primary position-absolute end-0 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Copyright Start -->
    <div class="py-4 container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="mb-3 text-center col-md-6 text-md-start mb-md-0">
                    &copy; <a class="fw-medium" href="#">Tea House</a>, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
