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
                                <option disabled>---Hotel rooms---</option>
                                <option value="Hotel room 1">Hotel room 1</option>
                                <option value="Hotel room 2">Hotel room 2</option>
                                <option value="Hotel room 3">Hotel room 3</option>
                                <option value="Hotel room 4">Hotel room 4</option>
                                <option value="Hotel room 5">Hotel room 5</option>
                                <option value="Convention Center">Convention center</option>
                                <option disabled>---Function rooms---</option>
                                <option value="Function Room A">Function Room A</option>
                                <option value="Function Room B">Function Room B</option>
                                <option value="Function Room C">Function Room C</option>
                                <option value="Function Room D">Function Room D</option>
                                <option value="Function Room E">Function Room E</option>
                                <option value="Function Room F">Function Room F</option>
                                <option disabled>---Commercial spaces---</option>
                                <option value="Commercial Spaces 1">Stall 1</option>
                                <option value="Commercial Spaces 2">Stall 1</option>
                                <option value="Commercial Spaces 2">Stall 2</option>
                                <option value="Commercial Spaces 3">Stall 3</option>
                                <option value="Commercial Spaces 4">Stall 4</option>
                                <option value="Commercial Spaces 5">Stall 5</option>
                                <option value="Commercial Spaces 6">Stall 6</option>
                                <option value="Commercial Spaces 7">Stall 7</option>
                                <option value="Commercial Spaces 8">Stall 8</option>
                                <option value="Commercial Spaces 9">Stall 9</option>
                                <option value="Commercial Spaces 10">Stall 10</option>
                                <option value="Commercial Spaces 11">Stall 11</option>
                                <option value="Commercial Spaces 12">Stall 12</option>
                                <option value="Commercial Spaces 13">Stall 13</option>
                                <option value="Commercial Spaces 14">Stall 14</option>
                                <option value="Commercial Spaces 15">Stall 15</option>
                                <option value="Commercial Spaces 16">Stall 16</option>
                                <option value="Commercial Spaces 17">Stall 17</option>
                                <option value="Commercial Spaces 18">Stall 18</option>
                                <option value="Commercial Spaces 19">Stall 19</option>
                                <option value="Others">Others</option>
                            </select>
                            <br>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Enter concern</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="concern_text" max-length="220"></textarea>
                            </div>
                            <img class="img-fluid" id="output" style="max-height: 600px; max width: 600px;">
                            <p>Upload an image</p>
                            <input type="file" name="images" class="form-control"
                                accept="image/png, image/gif, image/jpeg" onchange="loadfile(event)" />
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
    <script>
        function loadfile(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
