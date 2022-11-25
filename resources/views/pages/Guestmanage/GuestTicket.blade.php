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
                                    <h2 class="mb-0">Ticket Generator for Guest(s)</h2><br />
                                </div>
                            
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Name :</label>
                                <input class="form-control" type="text" placeholder="Enter Here.." id="example-text-input" required>
                            </div>
                            <div class="form-group">
                                <label for="example-email-input" class="form-control-label">Email</label>
                                <input class="form-control" type="email" placeholder="Enter Here.." id="example-email-input" required>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Category :</label>
                                <select class="form-control" id="example-category-input" required>
                                    <option>Pick Category</option>
                                    <option>Hotel</option>
                                    <option>Convention Center</option>
                                    <option>Function Room</option>
                                    <option>Sports Center</option>
                                    <option>Stalls</option>
                                  </select>
                                  
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Subject :</label>
                                <input class="form-control" type="text" placeholder="Enter Subject Here.." id="example-text-input" required>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Description :</label>
                                <input class="form-control" type="text" placeholder="Enter Description Here.." id="example-text-input" required>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Attachment(s) :</label>
                                <input type="file" class="custom-file-input" id="customFileLang" lang="en" required>
                            </div>
                        </form>
                
            </div>
        </div>
                    
                    
                



            
        
            @include('layouts.footers.auth')
    </div>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
<style>
    .cont{

    }
</style>