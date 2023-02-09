
@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header">
                                <h3>Bar Series</h3>
                            </div>
                            <div class="card-block">
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header">
                                <h3>Multiple Bar Series</h3>
                            </div>
                            <div id="chart2" class="card-block">
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            
            <!-- you need to include the shieldui css and js assets in order for the charts to work -->
            <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
            <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
            
            <script type="text/javascript">
                jQuery(function ($) {
                    var data1 = [12, 3, 4, 2, 12, 3, 4, 17, 22, 34, 54, 67];
                    var data2 = [3, 9, 12, 14, 22, 32, 45, 12, 67, 45, 55, 7];
                    var data3 = [23, 19, 11, 134, 242, 352, 435, 22, 637, 445, 555, 57];
                        
                    $("#chart1").shieldChart({
                        exportOptions: {
                            image: false,
                            print: false
                        },
                        axisY: {
                            title: {
                                text: "Break-Down for selected quarter"
                            }
                        },
                        dataSeries: [{
                            seriesType: "bar",
                            data: data1
                        }]
                    });
            
                    $("#chart2").shieldChart({
                        exportOptions: {
                            image: false,
                            print: false
                        },
                        axisY: {
                            title: {
                                text: "Break-Down for selected quarter"
                            }
                        },
                        dataSeries: [{
                            seriesType: "bar",
                            data: data2
                        }, {
                            seriesType: "bar",
                            data: data3
                        }]
                    });
                });
            </script>


      
    </div>
  </div>

    
  <script src="../../assets/js/plugins/chartjs.min.js"></script>                   
        
       <script>/*
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
      columnDefs: [{
          orderable: true,
          className: '',
          targets: 0
      }]
  });
  $('.datatable-Stock:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
*/
</script>
    
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
