<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{asset('/public/front')}}/img/favicon.png" type="image/png" />
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/public/front')}}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/vendors/linericon/style.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/css/themify-icons.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/css/flaticon.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('/public/front')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('/public/front')}}/css/responsive.css" />
</head>

<body>
<!--================Header Menu Area =================-->
@include('front-end.includes.header')
<!--================Header Menu Area =================-->

@yield('body')

<!--================ start footer Area  =================-->
@include('front-end.includes.footer')
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/public/front')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('/public/front')}}/js/popper.js"></script>
<script src="{{asset('/public/front')}}/js/bootstrap.min.js"></script>
<script src="{{asset('/public/front')}}/js/stellar.js"></script>
<script src="{{asset('/public/front')}}/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="{{asset('/public/front')}}/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{asset('/public/front')}}/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('/public/front')}}/vendors/isotope/isotope-min.js"></script>
<script src="{{asset('/public/front')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('/public/front')}}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('/public/front')}}/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="{{asset('/public/front')}}/vendors/counter-up/jquery.counterup.js"></script>
<script src="{{asset('/public/front')}}/js/mail-script.js"></script>
<script src="{{asset('/public/front')}}/js/theme.js"></script>
</body>

</html>
