@extends('layouts.app')

@section('title')
<title>{{$user->name}} | Biography Details</title>

@endsection

@section('content')

<div class="pw-body">
    <div class="pw-left">
        
        <div class="iContainer" id="mainDiv">
            <div class="postsDisplay">
                <a class="back_details" onclick="window.history.back()"><i class="fa fa-angle-left"
                    aria-hidden="true"></i>Back</a>
                    
                <div class="col-12">
                   
                    <p>{!! $biographydetail->biography_description !!}</p>
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