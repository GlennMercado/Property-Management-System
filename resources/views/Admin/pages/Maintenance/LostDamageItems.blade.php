@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">                 
        <br>

        <!--Cleaned-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 title">Lost / Damage Items</h3>
                            </div>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <!-- <div class="col-md-4">
                                <select class="form-control" style="border:2px solid" id="optionselect" >
                                    <option value="Cleaned" selected="true">Cleaned</option>
                                    <option value="Out of Service">Out of Service</option>
                                </select>
                            </div> -->
                        </div>
                    </div>

                    <!--Lost or Damage Items-->
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style = "font-size:18px;">Serial No.</th>
                                    <th scope="col" style = "font-size:18px;">Date</th>
                                    <th scope="col" style = "font-size:18px;">Item</th>    
                                    <th scope="col" style = "font-size:18px;">Room No.</th>
                                    <th scope="col" style = "font-size:18px;">Found By</th>
                                    <th scope="col" style = "font-size:18px;">Loss/Damage</th>
                                    <th scope="col" style = "font-size:18px;">Description</th>
                                    <th scope="col" style = "font-size:18px;">Status</th>
                                    <th scope="col" style = "font-size:18px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style = "font-size:16px;">qwe</td>
                                    <td style = "font-size:16px;">qwe</td>
                                    <td style = "font-size:16px;">qwe</td>
                                    <td style = "font-size:16px;">qwe</td>
                                    <td style = "font-size:16px;">qwe</td>
                                    <td style = "font-size:16px;">qwe</td>
                                    <td style = "font-size:16px;">qwe</td>
                                    <td style = "font-size:16px;">qwe</td>
                                    <td style = "font-size:16px;">qwe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
        
        <br>
        



<script>
    $('.prevent_submit').on('submit', function(){
            $('.prevent_submit').attr('disabled','true');
        });
</script>        
<style>
    .title{
        text-transform:uppercase;
        font-size:25px;
        letter-spacing:2px;
    }
    .category{
        font-size:22px;
        color:#5BDF4A;
    }
    .category2{
        font-size:22px;
        color:#E46000;
    }
    .tab{
        font-size:100px;
    }
</style> 

@include('layouts.footers.auth')  
</div>    
     

    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush