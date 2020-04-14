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
                                <li><a href="{{URL::to('ghs/bafut/welcome#mu-about-us')}}">About Us</a></li>
                                <li><a href="{{URL::to('ghs/bafut/welcome#mu-about-us')}}">Event</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="mu-footer-widget">
                            <h4>Together We will win!</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="mu-footer-widget">
                            <h4>Contact</h4>
                            <address>
                                <p>{{trans('english.school_address')}}</p>

                            </address>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="mu-footer-widget">
                            <h4></h4>
                            <br/>

                            <p>{{trans('english.phone')}} 0781114767 / 0788762961 </p>
                            <p>{{ trans('english.email')}} pius2016@gmail.com</p>

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
{!! Html::script('js/jquery-1.11.3.min.js') !!}}
{!! Html::script('js/varsity/bootstrap.js') !!}}
<!-- METISMENU SCRIPTS -->
<!-- CUSTOM SCRIPTS -->
{!! Html::script('js/scripts.js') !!}}

{!! Html::script('js/main.js') !!}}




{!! Html::script('js/HoldOn.min.js') !!}}
<!-- jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Current COVID19 Patient Statistics(Changes with cases)',
        data: [],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [],
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "/COVID19/public/get/patient/bar/data",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {

        myChart.data.labels = data.labels;
        myChart.data.datasets[0].data = data.data;
        myChart.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }

  updateChart();
  setInterval(() => {
    updateChart();
  }, 1000);
</script>




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
