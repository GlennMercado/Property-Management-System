@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <div class="container-fluid bg-white mt-6" id="conventionCenter">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 mt-5">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="mb-0">Commercial Space Inquiry and Application Form (Step 1)</h3>
                    </div>
                </div>
                <h3 class="text-muted">Business Information</h3>
                <h4>Business Name: </h4>
                <input type="text" class="form-control" placeholder="Enter Business Name" required>
                <br>
                <h4>Business Style/Trade Name (if different from company name): </h4>
                <input type="text" class="form-control" placeholder="Enter Business Style/Trade Name" required>
                <br>
                <h4>Business Address: </h4>
                <input type="text" class="form-control" placeholder="Enter Business Address" required>
                <br>
                <h4>Email Address/Website/FB Page: </h4>
                <input type="text" class="form-control" placeholder="Enter Email Address/Website/FB Page..." required>
                <br>
                <div class="row">
                    <h4>Contact Details: </h4>
                    <div class="col">
                        <br>
                        <h4>Landline No.: </h4>
                        <input type="text" class="form-control" placeholder="Enter Landline No." required>
                    </div>
                    <div class="col">
                        <br>
                        <h4>Mobile No.: </h4>
                        <input type="text" class="form-control" placeholder="Enter Mobile No." required>
                    </div>
                </div>
                <br>
                <h4>Owner Details: </h4>
                <h4>For Single Proprietorship: </h4>
                <h4>Name of owner: </h4>
                <input type="text" class="form-control" placeholder="Enter Name of Owner" required>
                <br>
                <div class="row">
                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Single</label>

                    </div>
                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Married</label>

                    </div>
                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Separrated</label>

                    </div>

                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Others</label>

                    </div>
                </div>
                <br>
                <h4>Spouse: </h4>
                <input type="text" class="form-control" placeholder="Enter Spouse" required>
                <br>
                <h4>Home Address: </h4>
                <input type="text" class="form-control" placeholder="Enter Home Address" required>
                <div class="row">
                    <div class="col">
                        <br>
                        <h4>Landline No: </h4>
                        <input type="text" class="form-control" placeholder="Enter Landline No." required>
                    </div>
                    <div class="col">
                        <br>
                        <h4>Mobile no.: </h4>
                        <input type="text" class="form-control" placeholder="Enter Mobile No.:" required>
                    </div>
                </div>
                <br>
                <h4>Tax Identification No.: </h4>
                <input type="text" class="form-control" placeholder="Enter Tax Identification No." required>
                <br>
                <h4>Community Tax Certificate No. (Individual) or Other Valid Govt. ID No.: </h4>
                <input type="text" class="form-control" placeholder="Enter Home Address" required>

                <br>
                <br>
                <br>
                <br>
                <p>I certify that all of the information I have provided above is true and correct to the best of my knowledge. I fully understand that all data gathered here are required for the evaluation of my application for commercial space lease/rent. I am aware that THIS IS NOT CONSIDERED AS A LEASE AGREEMENT/CONTRACT.</p>
            </div>
        </div>
        <br>
        <br>
        <input type="submit" class="btn btn-success btn-lg btn-block"></button>
        <br>
    </div>
    <div class="container mt--5 pb-5">
    </div>
@endsection
