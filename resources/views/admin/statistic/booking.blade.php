@extends('admin.default.master')
@section('content')
<h3>Thống kê đặt phòng</h3>
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

    <div class="filter">
      <form action="" class="form-filter" autocomplete="off">
        {{-- <div class="filter-item">
          <label for="datepickerfrom">Từ ngày</label>
          <input type="text" id="datepickerfrom" class="form-control">
        </div>
        <div class="filter-item">
          <label for="datepickerto">Đến ngày</label>
          <input type="text" id="datepickerto" class="form-control">
        </div> --}}
        <label for="datepickerfrom">Từ ngày</label>
        <input type="text" id="datepickerfrom" name="datepickerfrom">
        <label for="datepickerto">Đến ngày</label>
        <input type="text" id="datepickerto" name="datepickerto">
        <div class="filter-item">
          <input type="button" value="Lọc" class="btn btn-primary btn-filter">
        </div>

      </form>
    </div>

  </div>
  <!-- Card Body -->
  <div class="card-body">
    <div class="chart-area">
      <div id="myBarChart"></div>
      <canvas id="" width="1037" height="320"
        style="display: block; box-sizing: border-box; height: 320px; width: 100%;"></canvas>
    </div>
  </div>
</div>
@endsection

@section('css')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<style>
  .filter {
    position: relative;
  }

  .form-filter {
    display: flex;
  }

  .form-filter>* {
    margin-right: 15px;
  }

  .btn-filter {
    width: 50px;
    height: 50px;
  }

  #ui-datepicker-div {
    display: flex;
    top: 215px !important;
    background: #ddd;
    justify-content: space-between;
  }
</style>
@endsection

@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
{{-- chart --}}
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
  $(document).ready(function() {
    chart30DaysAgo();
        var barChart = new Morris.Area({
            element: 'myBarChart',
            //option
            lineColor: ['#36b9cc'],
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
          parseTime: false,
            // The name of the data record attribute that contains x-values.
            xkey: 'day',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Đơn']                   
        });
        function chart30DaysAgo(){
          $.ajax({
            url: "{{route('thisMonth')}}",
            method: "get",
            dataType: "json",
            success: function(response) {
              barChart.setData(response);
            }
          });
        };

        $('.btn-filter').click( function(){
            var from = $("#datepickerfrom").val();
            var to = $("#datepickerto").val();
            $.ajax({
                url: "{{route('bookingFilter')}}",
                method: "GET",
                dataType: "json",
                data: {from: from, to: to},
                success:function(response){
                   barChart.setData(response);
                }
            })
        });
    });

    $( function() {
        var dateFormat = "mm/dd/yy",
            from = $( "#datepickerfrom" )
                .datepicker({
                  defaultDate: "+1w",
                  changeMonth: true,
                  numberOfMonths: 2,
                  showAnim: "slideDown",
                //   dateFormat:"dd/mm/yy",
                minDate: new Date(2021,1,1),
                maxDate: new Date(),
                })
                .on( "change", function() {
                  to.datepicker( "option", "minDate", getDate( this ) );
                }),
            to = $( "#datepickerto" ).datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 2,
              showAnim: "slideDown",
              // dateFormat:"dd/mm/yy",
              minDate: new Date(2021,1,1),
              maxDate: new Date(),
            })
            .on( "change", function() {
              from.datepicker( "option", "maxDate", getDate( this ) );
            });
 
    function getDate( element ) {
        var date;
        try {
          date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
          date = null;
        }
        return date;
    }
        
    });
</script>
@endsection