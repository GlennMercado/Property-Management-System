@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header transparent">
                            <div class = "row">    
                                <div class = "col">
                                    <h3 class="mb-0">Guest Ticket Manager</h3>
                                </div>
                            </div>
                        </div> 

                    <!--Filters-->

                    <div class="row">
                        <div class="col">
                        <select class="form-control" id="example-category-input" required>
                            <option>Hotel</option>
                            <option>Convention Center</option>
                            <option>Function Room</option>
                            <option>Sports Center</option>
                            <option>Stalls</option>
                        </select>
                        </div>
                        <div class="col-mb-3">
                            <input type=submit value="Filter" class="btn btn-info">
                        </div>
                
                    <!--Table-->

                    <div class="card-body">
                    <table class="table align-items-center table-flush" style="justify-content:center;text-align:center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->name}}</td>
                                        <td>{{ $lists->email}}</td>
                                        <td>{{ $lists->category}}</td>
                                        <td>{{ $lists->subject}}</td>
                                        <td>
                                        <button type="button" data-toggle="modal" data-target="#ModalViews"class="btn btn-primary"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<script>
    $(document).ready(function(){
        $("#optionselect").change(function(){
        var selected = $("option:selected", this).val();
        if(selected == 'Cleaned')
        {    
            $('#cleaned, #cleaned2').show();
            $('#dirty, #dirty2').hide();
            $('#outoforder, #outoforder2').hide();
            $('#outofservice, #outofservice2').hide();
        }
        else if(selected == 'Dirty')
        {
            $('#dirty, #dirty2').show();
            $('#cleaned, #cleaned2').hide();
            $('#outoforder, #outoforder2').hide();
            $('#outofservice, #outofservice2').hide();
        }
        else if(selected == 'Out of Order')
        {
            $('#dirty, #dirty2').hide();
            $('#cleaned, #cleaned2').hide();
            $('#outoforder, #outoforder2').show();
            $('#outofservice, #outofservice2').hide();
        }
        else if(selected == 'Out of Service')
        {
            $('#dirty, #dirty2').hide();
            $('#cleaned, #cleaned2').hide();
            $('#outoforder, #outoforder2').hide();
            $('#outofservice, #outofservice2').show();
        }

    });
    });
</script>-->
            @include('layouts.footers.auth')

    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
