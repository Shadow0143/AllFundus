<div class="col-lg-12 mt-5 col-md-12 col-sm-12 order-lg-12 order-md-12 order-sm-1 order-1">
    <div class="persrightsec88">
        <div class="toprightban458 padd01">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 order-lg-1 order-md-1  order-sm-12 order-12">
                    <div class="topritleftin45">
                        <span class="hello45">Hello! I am</span>
                        <h2>Vineet Agarwala</h2>

                        <ul class="qulify01">
                            <li>A Coder</li>
                            <li>An Entrepreneur</li>
                            <li>
                                and my goal is to create 10 successful business products by 2031.
                            </li>
                        </ul>
                        <div class="social45">
                            <a href="https://instagram.com/vineet.agarwala" class="fa fa-instagram" target="_blank"></a>
                            <a href="https://www.facebook.com/vineet.agarwala" class="fa fa-facebook"
                                target="_blank"></a>
                            <a href="https://wa.me/+919647000580" class="fa fa-whatsapp" target="_blank"></a>
                            <a href="https://www.youtube.com/channel/UCGg9VO1XHQz5I-7FL_o98AA"
                                class="fa fa-youtube-play" target="_blank"></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 order-lg-12 order-md-12 order-sm-1 order-1">
                    <div class="profileimg898">
                        <figure>
                            <image src="{{asset('new/images/proimage55.png')}}">
                        </figure>
                    </div>

                </div>
            </div>
        </div>


        <div class="goalsection45 padd01 icon_box">
            <h2>Steps towards to my goal</h2>
            <p>
                These are the Ideas, few lines about the products here will be nice to display.
            </p>

            <div class="goalimgs45 row" style="height:230px">
                <div class="items col-md-4">
                    <!-- <div class="col-4"> -->
                    <a href="https://bluehorse.in/" target="_blank"><img src="{{asset('images/icon/icon1.jpg')}}"></a>
                    <!-- </div> -->
                    <!-- <div class="col-4"> -->
                    <a href="https://www.ipathsala.com/" target="_blank"><img
                            src="{{asset('images/icon/icon2.jpg')}}"></a>
                    <!-- </div> -->
                    <!-- <div class="col-4"> -->
                    <a href="https://www.tezcommerce.com/" target="_blank"><img
                            src="{{asset('images/icon/icon3.jpg')}}"></a>
                    <!-- </div> -->
                </div>
                <div class="items col-md-4">
                    <!-- <div class="col-4"> -->
                    <a href="https://www.spordec.com/" target="_blank"><img
                            src="{{asset('images/icon/icon4.jpg')}}"></a>
                    <!-- </div> -->
                    <!-- <div class="col-4"> -->
                    <a href="https://onetaphelp.com/" target="_blank"><img src="{{asset('images/icon/icon5.jpg')}}"></a>
                    <!-- </div> -->
                    <!-- <div class="col-4"> -->
                    <a href="https://www.iudyog.com/" target="_blank"><img src="{{asset('images/icon/icon6.jpg')}}"></a>
                    <!-- </div> -->
                </div>
                <div class="items col-md-4">
                    <!-- <div class="col-4"> -->
                    <a href="https://www.growtrail.com/" target="_blank"><img
                            src="{{asset('images/icon/icon7.jpg')}}"></a>
                    <!-- </div> -->
                    <!-- <div class="col-4"> -->
                    <a href="https://www.extromax.com/" target="_blank"><img
                            src="{{asset('images/icon/icon8.jpg')}}"></a>
                    <!-- </div> -->
                    <!-- <div class="col-4"> -->
                    <a href="https://fandu.bluehorse.in/" target="_blank"><img
                            src="{{asset('images/icon/icon9.jpg')}}"></a>
                    <!-- </div> -->
                </div>
            </div>

        </div>

        <div class="interest_section568 padd01">
            <h2>My Interests</h2>
            <p>What I Look forward to in my daily life</p>

            <ul class="interest_list55">
                @foreach ($intrests as $val)
                <li><a href="#">{{ucfirst($val->title)}}</a></li>
                {{-- <li><a href="{{route('intrestDetails',['id'=>$val->id])}}">{{$val->title}}</a></li> --}}

                @endforeach

            </ul>
        </div>


        <div class="socalpart45 padd01">
            <h2>Skip to the good part</h2>
            <ul>
                <li>
                    <a href="#"><img src="{{asset('new/images/socialbox/social01.png')}}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('new/images/socialbox/social02.png')}}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('new/images/socialbox/social03.png')}}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('new/images/socialbox/social04.png')}}"></a>
                </li>
            </ul>
        </div>

    </div>
</div>