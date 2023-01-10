<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')

    @laravelPWA

   
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <link href="{{asset('new/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('new/css/bootstrap-grid.css')}}" rel="stylesheet">



   
</head>

<body>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])



    <div class="pw-body">
        <form action="{{route('submitYourOwnSite')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="row  mt-5 ml-5">
                    {{-- <div class="col-3 card ml-3">
                        <img src="{{asset('themes/theme1.png')}}" alt="Theme-1">
                        <label for="theme1"> Theme 1</label>
                        <input type="radio" name="selected_theme" id="theme1" value="1" checked class="m-2"> 
                    </div> --}}
                    <div class="col-3 card ml-3">
                        <img src="{{asset('themes/theme2.png')}}" alt="Theme-2">
                        <label for="theme2"> Theme 2</label>
                        <input type="radio" name="selected_theme" id="theme2" value="2" class="m-2"> 
                    </div>
                    <div class="col-3 card ml-3">
                        <img src="{{asset('themes/theme3.png')}}" alt="Theme-3">
                        <label for="theme3"> Theme 3</label>
                        <input type="radio" name="selected_theme" id="theme3" value="3" class="m-2">
                    </div>

                    <div class="col-12  text-center mt-5">
                        <button type="submit" class="btn btn-success">Save </button>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>