<!-- Start footer -->
<footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
        <div class="container">
            <div class="mu-footer-top-area">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="mu-footer-widget">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="{{URL::to('ghsbafut/alumni/association#alu_mission')}}">About Us</a></li>
                                <li><a href="{{URL::to('ghsbafut/alumni/association#mu-latest-courses')}}">Event</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="mu-footer-widget">
                            <h4>Activities</h4>
                            <ul>
                                <li><a href="{{URL::to('ghsbafut/alumni/association#alu_mission')}}">{{trans('english.mission')}}</a></li>
                                <li><a href="{{URL::to('ghsbafut/alumni/association#mu-from-blog')}}">{{trans('english.blog')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="mu-footer-widget">
                            <h4>Contact</h4>
                            <address>
                                <ul>
                                    <li><a target="__blank" href="https://www.facebook.com/groups/1609983392606587/"><span class="fa fa-facebook"> {{trans('english.fb')}}</span></a></li>
                                    <li><a>{{trans('english.president'). " " .trans('english.presi_tel'). " " }} </a></li>
                                </ul>
                            </address>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="mu-footer-widget">
                            <h4></h4>
                            <br/>

                            <p>{{trans('english.phone') . trans('english.schooltel')}} </p>
                            <p>{{ trans('english.email').trans('english.schoolmail')}}</p>

                            {{--<p>Get latest update, news & academic offers</p>
                            <form class="mu-subscribe-form">
                                <input type="email" placeholder="Type your Email">
                                <button class="mu-subscribe-btn" type="submit">Subscribe!</button>
                            </form>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
        <div class="container">
            <div class="mu-footer-bottom-area">
                <p>&copy; All Right Reserved. Designed by <a href="https://www.linkedin.com/in/pius-ngwa-64b35182" rel="nofollow">{{trans('english.peaceTech')}}</a></p>
            </div>
        </div>
    </div>
    <!-- end footer bottom -->
</footer>
<!-- End footer -->

<!-- jQuery library -->
{{--<script src="{{URL::asset('js/varsity/jquery.min.js')}}"></script>--}}
{!!Html::script('js/varsity/jquery.min.js')!!}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{--<script src="{{URL::asset('js/varsity/bootstrap.js')}}"></script>--}}
{!!Html::script('js/varsity/bootstrap.js')!!}

<!-- Slick slider -->
{{--<script type="text/javascript" src="{{URL::asset('js/varsity/slick.js')}}"></script>--}}
{!!Html::script('js/varsity/slick.js')!!}
<!-- Counter -->
{{--<script type="text/javascript" src="{{URL::asset('js/varsity/waypoints.js')}}"></script>--}}
{!!Html::script('js/varsity/waypoints.js')!!}

{{--
<script type="text/javascript" src="{{URL::asset('js/varsity/jquery.counterup.js')}}"></script>
--}}
{!!Html::script('js/varsity/jquery.counterup.js')!!}

<!-- Mixit slider -->
{{--
<script type="text/javascript" src="{{URL::asset('js/varsity/jquery.mixitup.js')}}"></script>
--}}
{!!Html::script('js/varsity/jquery.mixitup.js')!!}

<!-- Add fancyBox -->
{{--
<script type="text/javascript" src="{{URL::asset('js/varsity/jquery.fancybox.pack.js')}}"></script>
--}}
{!!Html::script('js/varsity/jquery.fancybox.pack.js')!!}
{!!Html::script('/js/varsity/custom.js')!!}

        <!-- Custom js -->

{{--<script src="{{URL::asset('/js/varsity/custom.js')}}/"></script>--}}

</body>
</html>
