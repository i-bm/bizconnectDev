<a href="{{route('service-request')}}"><div class="sticky-request fixed-bottom d-lg-none">
    <div class="container">
    <div class="text-center white font-weight-700 uppercase">
            <h1>Request Service </h1>
        </div>
    </div>
</div></a>
   
    <!-- footer -->
         <div class=""><img src="assets/img/bg/footer-top.png" class="img-fluid"></div>
    <footer class="footer-area">

        <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="footer-widget footer-top-b mb-30">
                        <h3>Get in touch</h3>
                        <ul class="footer-address">
                            {{-- <li><i class="fas fa-map-marker"></i> <span>Mirpur Rd, Accra D22 CR2</span> </li> --}}
                            <li><i class="fab fa-whatsapp"></i> <span><a href="https://api.whatsapp.com/send?phone=2330559223614">WhatsApp 055 922 3614</a></span> </li>
                            <li><i class="fas fa-envelope"></i> <span><a href="mailto:info@techmarket.com">info@techmarketgh.com</a></span> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-6 col-sm-4">
                    <div class="footer-widget mb-30">
                        <h3>Sitemap</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Works</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-6 col-sm-4">
                    <div class="footer-widget mb-30">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="{{route('login')}}">Sign In</a></li>
                            <li><a href="{{url('/contact')}}">FAQ’S</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Sign up</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-6 col-sm-4">
                    <div class="footer-widget mb-30">
                        <h3>Social</h3>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Works</a></li>
                        </ul>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="copyright text-center mt-60">
                        <p>Copyright ©{{date('Y')}} TechMarket. All right reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS here -->
    <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/one-page-nav-min.js')}}"></script>
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js" integrity="sha512-BmoWLYENsSaAfQfHszJM7cLiy9Ml4I0n1YtBQKfx8PaYpZ3SoTXfj3YiDNn0GAdveOCNbK8WqQQYaSb0CMjTHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


    $(document).ready(function() {
        $(window).load(function() {
$('.flexslider').flexslider({
  animation: "slide",
  animationLoop: false,
  itemWidth: 120,
  itemMargin: 30,
  mousewheel: true,
 
});
});

        $('.deviceModel').select2({
    theme: 'bootstrap4',
});
});
  

</script>
@livewireScripts
</body>

</html>