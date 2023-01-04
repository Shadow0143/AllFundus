@section('title')
<title>Kamal Kalra</title>
@endsection


@foreach ($data as $data)
@if ($data['section_name'] == 'Intro')
<div class="helloSec">
    <div class="iContainer">
        {{-- @if(Auth::user())
        @if(Auth::user()->role=='owner')
        <a href="javaScript:void(0);" type="button" id="edit1section" data-id="{{Auth::user()->id}}"
            data-type="{{ $data['id'] }}">Edit {{ $data['id'] }}</a>
        <a href="" type="button" onclick="openForm2()" data-toggle="modal" data-target="#myModal2">Add
            Section</a>
        <a href="" type="button" onclick="openForm3()" data-toggle="modal" data-target="#myModal3">Add
            Item</a>
        @endif
        @endif --}}
        <div class="hsLeft">
            <p>
                @foreach ($data['section_item'] as $item)
                @if(!empty(Auth::user()->id))
                @if(Auth::user()->role=='owner')
                @if ($item['section_item_name'] == 'Greeting')
            <form action="" id="greating_form">
                <input type="hidden" name="greating_id" id="greating_id" value="{{$item['id']}}">
                <input type="text" name="section_name" id="section_name" value="{{ $item['section_item_value'] }}"
                    class="text_style">
            </form>
            @endif
            @else
            @if ($item['section_item_name'] == 'Greeting')
            {{ $item['section_item_value'] }}
            @endif
            @endif
            @else
            @if ($item['section_item_name'] == 'Greeting')
            {{ $item['section_item_value'] }}
            @endif
            @endif
            @endforeach

            @foreach ($data['section_item'] as $item)
            @if ($item['section_item_name'] == 'Signature')
            @if(!empty(Auth::user()->id))
            @if(Auth::user()->role=='owner')
            <form action="">
                <input type="hidden" name="change_signature_id" id="change_signature_id" value="{{$item['id']}}">
                {{-- <input type="file" name="change_signature" id="change_signature" class=""> --}}
                <span class="text-danger text-left">
                    <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" id="imgPreview" />
                </span>
            </form>
            @else
            <span>
                <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
            </span>
            @endif
            @else
            <span>
                <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
            </span>
            @endif
            @endif
            @endforeach
            @foreach ($data['section_item'] as $item)
            @if(!empty(Auth::user()->id))
            @if(Auth::user()->role=='owner')
            @if ($item['section_item_name'] == 'Degree')
            <form action="">
                <input type="hidden" name="section_descr_id" id="section_descr_id" value="{{$item['id']}}">
                <textarea name="section_descr" id="section_descr" cols="10" rows="5"
                    class="text_style">{{ $item['section_item_value'] }}</textarea>
            </form>
            @endif
            @else
            @if ($item['section_item_name'] == 'Degree')
            {{ $item['section_item_value'] }}
            @endif
            @endif
            @else
            @if ($item['section_item_name'] == 'Degree')
            {{ $item['section_item_value'] }}
            @endif
            @endif

            @endforeach
            </p>
            <div class="socialFooter">
                <ul>
                    <li>
                        <a href=""><i class="ti-twitter-alt"></i></a>

                    </li>
                    <li>
                        <a href=""><i class="ti-facebook"></i></a>

                    </li>
                    <li>
                        <a href=""><i class="ti-linkedin"></i></a>

                    </li>
                    <li>
                        <a href=""><i class="ti-youtube"></i></a>

                    </li>
                </ul>
            </div>
        </div>
        @foreach ($data['section_item'] as $item)
        @if ($item['section_item_name'] == 'Profile Image')
        <div class="hsRight">
            @if(Auth::user())
            @if(!empty(Auth::user()->role=='owner'))
            {{-- <a href="javaScript:void(0);" class="btn btn-sm btn-outline-light" data-toggle="modal"
                data-target="#profilemodal">Change Profile</a> --}}
            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" id="profileimgPreview" />
            @else
            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
            @endif
            @else
            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
            @endif
        </div>
        @endif
        @endforeach
    </div>

</div>
@endif
@if ($data['section_name'] == 'Biography')
<div class="bioSec">
    <div class="iContainer">
        <h3>
            @foreach ($data['section_item'] as $item)
            @if ($item['section_item_name'] == 'Title')
            {{ $item['section_item_value'] }}
            @endif
            @endforeach
        </h3>
        <p>
            @foreach ($data['section_item'] as $item)
            @if ($item['section_item_name'] == 'Description')
            {{ $item['section_item_value'] }}
            @endif
            @endforeach
        </p>
        @foreach ($data['section_item'] as $item)
        @if ($item['section_item_name'] == 'Read More Link')
        {{-- <a href="{{ $item['section_item_value'] }}" class="rmore">Know More</a> --}}
        {{-- <a href="javaScript:void(0);" class="rmore" onclick="hideMainDiv(); return false" id="knowmorebtn">Know
            More</a>
        <a href="javaScript:void(0);" class="rmore" onclick="showMainDiv(); return false" id="knowlessbtn"
            style="display:none">Know Less</a> --}}
        {{-- <a href="{{ route('biographyDetails') }}" class="rmore">Know More</a> --}}
        <a href="#" class="rmore">Know More</a>

        @endif
        @endforeach
    </div>
</div>
@endif
@if ($data['section_name'] == 'My Book')
<div class="myProSec">
    <div class="iContainer">
        <div class="blockHead">
            <div class="bhLeft">
                <div class="titleTag">
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Section Title')
                    {{ $item['section_item_value'] }}
                    @endif
                    @endforeach
                </div>
                <h4>
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Section Sub Title')
                    {{ $item['section_item_value'] }}
                    @endif
                    @endforeach
                </h4>
                <p class="titleDesco">
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Section Description')
                    {{ $item['section_item_value'] }}
                    @endif
                    @endforeach
                </p>
            </div>
            @foreach ($data['section_item'] as $item)
            @if ($item['section_item_name'] == 'Image')
            <div class="bhRight">
                <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
            </div>
            @endif
            @endforeach
        </div>
        <h5>
            @foreach ($data['section_item'] as $item)
            @if ($item['section_item_name'] == 'Title')
            {{ $item['section_item_value'] }}
            @endif
            @endforeach
        </h5>
        <p>
            @foreach ($data['section_item'] as $item)
            @if ($item['section_item_name'] == 'Description')
            {{ $item['section_item_value'] }}
            @endif
            @endforeach
        </p>
        @foreach ($data['section_item'] as $item)
        @if ($item['section_item_name'] == 'Buy Now Link')
        <a href="{{ $item['section_item_value'] }}" class="rmore">Buy Now</a>
        @endif
        @endforeach
    </div>
</div>
@endif
@endforeach
<div class="ctaSec">
    <div class="iContainer">
        <h4>Skip to the good part...</h4>
        <ul class="ctaList">
            <li><a href="">
                    <div class="ctaImage"><img src="{{asset('new/images/socialbox/social01.png')}}" alt="cta1.jpg"></div>
                    <div class="ctaMatr"><i class="ti-twitter"></i>
                        <h5> My Tweets</h5>
                    </div>
                </a>
            </li>
            <li><a href="">
                    <div class="ctaImage"><img src="{{asset('new/images/socialbox/social02.png')}}" alt="cta2.jpg"></div>
                    <div class="ctaMatr"><i class="ti-write"></i>
                        <h5> Recent Posts</h5>
                    </div>
                </a>
            </li>
            <li><a href="">
                    <div class="ctaImage"><img src="{{asset('new/images/socialbox/social04.png')}}" alt="cta3.jpg"></div>
                    <div class="ctaMatr"><i class="ti-face-smile"></i>
                        <h5> Social Events</h5>
                    </div>
                </a>
            </li>
            <li><a href="">
                    <div class="ctaImage"><img src="{{asset('new/images/socialbox/social03.png')}}" alt="cta4.jpg"></div>
                    <div class="ctaMatr"><i class="ti-marker-alt"></i>
                        <h5>My Book</h5>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>