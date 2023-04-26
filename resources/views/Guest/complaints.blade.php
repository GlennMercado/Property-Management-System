@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <div class="card-body">
            <form action="{{ url('/complaints_submit') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container bg-white" id="section2">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-9">
                            <h1 class=" d-flex pt-6" id="section1">Send a Complaint</h1>
                            <select name="concern" class="form-control" required>
                                <option value="">Concern</option>
                                <option value="Hotel">Hotel</option>
                                <option value="Convention Center">Convention Center</option>
                                <option value="Function Rooms">Function Rooms</option>
                                <option value="Commercial Spaces">Commercial Space 1</option>
                                <option value="Commercial Spaces">Commercial Space 2</option>
                                <option value="Commercial Spaces">Commercial Space 3</option>
                                <option value="Commercial Spaces">Commercial Space 4</option>
                                <option value="Commercial Spaces">Commercial Space 5</option>
                                <option value="Others">Others</option>
                            </select>
                            <br>
                            <input name="concern_text" class="form-control" type="text" style="height: 200px">
                            <br>
                            <p>Upload an image</p>
                            <input type="file" name="images" class="form-control"
                                accept="image/png, image/gif, image/jpeg"/>
                            <br>
                            <div class="row">
                                <button type="submit"
                                    class="btn btn-outline-success text-white bg-green justify-content-center col-md-12">
                                    Send
                                    <i class="ni ni-send"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
