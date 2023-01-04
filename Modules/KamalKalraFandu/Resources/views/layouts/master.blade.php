<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- HTML Meta Tags -->
    <title>Personal-website:The best website creator for you</title>
    <meta name="description" content="Personal-website:creator for you">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="http://personal-website.iudyog.com/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Personal-website">
    <meta property="og:description" content="Personal-website:creator for you">
    <meta property="og:image" content="http://personal-website.iudyog.com/package/1657288649.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="personal-website.iudyog.com">
    <meta property="twitter:url" content="http://personal-website.iudyog.com/">
    <meta name="twitter:title" content="Personal-website">
    <meta name="twitter:description" content="Personal-website:creator for you">
    <meta name="twitter:image" content="http://personal-website.iudyog.com/package/1657288649.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('metades')
    <title>Personal-website</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/website.js') }}"></script>
    <script src="{{ asset('js/css3-animate-it.js') }}"></script>
    <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/jquery.bxslider.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">


    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>




    {{-- Shakil Added Start--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
        integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <link rel="stylesheet" href="{{asset('lightGallery/dist/css/lightgallery.min.css')}}" />
    {{-- <script src="{{asset('lightGallery/cdn/jquery.min.js')}}"></script> --}}
    <script src="{{asset('lightGallery/dist/js/lightgallery-all.min.js')}}"></script>

    {{-- Shakil Added End--}}



    <link rel="icon" href="" type="image/gif" sizes="">
    @yield('css')
    <style>
        .navbar1 {
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        body.chat-popup .pw-body {
            -webkit-filter: blur(4px);
            -moz-filter: blur(4px);
            -o-filter: blur(4px);
            -ms-filter: blur(4px);
            filter: blur(4px);
            filter: url("https://gist.githubusercontent.com/amitabhaghosh197/b7865b409e835b5a43b5/raw/1a255b551091924971e7dee8935fd38a7fdf7311/blur".svg#blur);
            filter: progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');
        }
    </style>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    @include('layouts.header')
    @yield('content')
    @yield('js')



    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });

            $(this).ekkoLightbox({
                alwaysShowClose: true,
                onShown: function() {
                    console.log('Checking our the events huh?');
                },
                onNavigate: function(direction, itemIndex)
                    console.log('Navigating '+direction+'. Current item: '+itemIndex);
                }
                ...
            });
    </script>





    <!-- Core -->
    <script src="{{asset('lightGallery/dist/js/lightgallery.min.js')}}"></script>
    <!-- Autoplay -->
    <script src="{{asset('lightGallery/modules/lg-autoplay.js')}}"></script>
    <!-- Fullscreen -->
    <script src="{{asset('lightGallery/modules/lg-fullscreen.js')}}"></script>
    <!-- Hashtag -->
    <script src="{{asset('lightGallery/modules/lg-hash.js')}}"></script>
    <!-- Pager -->
    <script src="{{asset('lightGallery/modules/lg-pager.js')}}"></script>
    <!-- Rotate -->
    <script src="{{asset('lightGallery/modules/lg-rotate.js')}}"></script>
    <!-- Social share -->
    <script src="{{asset('lightGallery/modules/lg-share.js')}}"></script>
    <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> -->
    <script src="{{asset('lightGallery/modules/lg-thumbnail.js')}}"></script>
    <!-- HTML5/YOUTUBE/VIMEO Video -->
    <script src="{{asset('lightGallery/modules/lg-video.js')}}"></script>
    <!-- <a href="https://www.jqueryscript.net/zoom/">Zoom</a> -->
    <script src="{{asset('lightGallery/modules/lg-zoom.js')}}"></script>


    <script>
        $(document).ready(function(e) {
         $(".light_gallery").lightGallery(e);
     });
    </script>



</body>

</html>