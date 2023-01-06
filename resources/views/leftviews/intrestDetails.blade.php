@extends('layouts.app')

@section('title')
<title>{{$user->name}} | {{$myIntrest->title}}</title>

@endsection

@section('content')

<div class="pw-body">
    @if (Auth::check())
    <div class="header_login">
        <div class="header_inner">
            <a href="" data-toggle="collapse" data-target="#demo"> Hi! {{ Auth::user()->name }} <i
                    class="fa fa-angle-down"></i></a>
            <div id="demo" class="collapse header-clp">
                <ul>
                    <li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                            Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif

    <div class="pw-left">
        
        <div class="iContainer" id="mainDiv">
            <div class="postsDisplay">
                <a class="back_details" onclick="window.history.back()"><i class="fa fa-angle-left"
                    aria-hidden="true"></i>Back</a>
                    
                <div class="col-12">
                    <h1>{{$myIntrest->title}}</h1>
                    <h4>
                        {{$myIntrest->subtitle}}
                    </h4>
                    <p>{!! $myIntrest->description !!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="pw-right">
        <div class="pwRightInr">
            @if(Request::segment(1) == $segment && $user->my_theme =='1')
            @include('rightviews.fanduCommon')
            @elseif(Request::segment(1) == $segment && $user->my_theme =='2')
            @include('rightviews.vineetCommon')
            @elseif(Request::segment(1) == $segment  && $user->my_theme =='3')
            @include('rightviews.kamalCommon')
            @else
            @include('rightviews.fanduCommon')
            @endif
        </div>
    </div>
</div>


@endsection

@section('js')


@endsection