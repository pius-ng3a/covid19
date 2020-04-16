<div class=" panel-footer  navbar-fixed-bottom footer-bottom">
    <div class="container">
        <div class="row" style="text-align:center">
            <p class="footer ">Copyright &copy; 2016 PeaceTech Solutions Inc. All rights reserved.</p>
        </div>
    </div>
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- BOOTSTRAP SCRIPTS -->

{!! Html::script('js/jquery-1.11.3.min.js') !!}
{!! Html::script('js/varsity/bootstrap.js') !!}
<!-- METISMENU SCRIPTS -->
<!-- CUSTOM SCRIPTS -->
{!! Html::script('js/scripts.js') !!}

{!! Html::script('js/main.js') !!}


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
      url: $('#baseUrl').val()+"/get/patient/bar/data",///COVID20/public
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {

        myChart.data.labels = data.labels;
        myChart.data.datasets[0].data = data.data;
        myChart.data.datasets[0].backgroundColor= 'rgba(255, 1, 1, 1)';
             
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
  var pctx = document.getElementById("myPie");
  var myDoughnutChart = new Chart(pctx, {
    type: 'doughnut',
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
  var updatePieChart = function() {
    $.ajax({
      url: $('#baseUrl').val()+"/get/patient/bar/data",///COVID20/public
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {

        myDoughnutChart.data.labels = data.labels;
        myDoughnutChart.data.datasets[0].data = data.data;
        myDoughnutChart.data.datasets[0].backgroundColor= [
                'rgba(255, 1, 1, 1)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(1, 255, 1, 1)',
                'rgba(75, 20, 1, 0.2)',
                'rgba(153, 102, 255, 0.2)'
                 
            ];
                  
        
        myDoughnutChart.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }
  updatePieChart();
  setInterval(() => {
    updatePieChart();
  }, 1000);
</script>




{{--<script src="{{URL::asset('js/varsity/jquery.min.js')}}"></script>--}}
{!!Html::script('js/varsity/jquery.min.js')!!}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{--<script src="{{URL::asset('js/varsity/bootstrap.js')}}"></script>--}}
{!!Html::script('js/varsity/bootstrap.js')!!}



{!! Html::script('js/varsity/bootstrap.js') !!}

<!-- METISMENU SCRIPTS -->
<!-- CUSTOM SCRIPTS -->
{!! Html::script('js/custom.js') !!}
{!! Html::script('js/scripts.js') !!}

{!! Html::script('js/main.js') !!}


{!! Html::script('js/jquery.datetimepicker.js') !!}

{!! Html::script('js/HoldOn.min.js') !!}

</body>
</html>
