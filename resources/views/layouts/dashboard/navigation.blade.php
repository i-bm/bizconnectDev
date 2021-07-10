 <!-- header start -->
    <header>
        <div id="header-sticky" class="header-area header-1 transparent-header pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-2 d-flex align-items-center">
                        <div class="logo">
                          <a class="logo-black" href="{{url('/')}}"> <img src="assets/img/logo/logo.png" alt=""> </a>
                            <a class="logo-white" href="{{url('/')}}"> <img src="assets/img/logo/logo.png" alt=""> </a>
                            
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-10 offset-xl-1">
                        <div class="header-btn1 f-right pl-20 d-none d-lg-block1 white">
                            <a href="{{url('/')}}/#service-request" style="font-weight: 400" class="btn">Request Service</a>
                        </div>
                        <div class="main-menu f-right">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="{{url('/')}}/#home">Home</a></li>
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                    <li><a href="https://www.techmarketgh.com/blog">Blog</a></li>
                                    <li><a href="https://api.whatsapp.com/send?phone=2330204620395?msg=Hello" target="_blank">Become a Repair partner</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    {{-- <li><a href="#" class=""><span><i class="fas fa-phone-alt"></i></span>Call Us<br>+233 50 342 4566</a></li> --}}
                                </ul>
                            </nav>
                        </div>
                        <!-- menu -->
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

<style>
    .main-menu ul li a:hover{
        color:#3D3C70 !important;
    }
</style>