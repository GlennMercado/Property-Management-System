@extends('layouts.guest', ['class' => 'bg-light'])
@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <div class="card-body">
            <h1 class=" d-flex justify-content-center pt-6" id="section1">Commercial Space</h1>
            <form action="{{ url('/commercial_spaces_submit') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container-fluid bg-white" id="section2">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-9">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class=" mt-6"><span><button class="btn btn-success" disabled>1</button></span> &nbsp
                                        Commercial Space Inquiry and Application Form
                                    </h3>
                                </div>
                            </div>
                            {{-- <h4 class="pt-4">Business Information</h4> --}}
                            <p class="pt-4">Business Name <span class="text-danger">*</span></p>
                            <input type="text" name="business_name" class="form-control mt-2"
                                placeholder="Enter Business Name" required>
                            <p class="pt-4">Business Style/Trade Name (if different from company name) <span
                                    class="text-danger">*</span> </p>
                            <input type="text" name="business_style" class="form-control"
                                placeholder="Enter Business Style/Trade Name" required>
                            <p class="pt-4">Business Address <span class="text-danger">*</span> </p>
                            <input type="text" name="business_address" class="form-control"
                                placeholder="Enter Business Address" required>
                            <p class="pt-4">Email Address/Website/FB Page <span class="text-danger">*</span> </p>
                            <input type="text" name="email_website_fb" class="form-control"
                                placeholder="Enter Email Address/Website/FB Page..." required>
                            <div class="row">
                                <div class="col-md">

                                    <p class="pt-4">Landline No. <span class="text-danger">*</span> </p>
                                    <input type="number" onKeyPress="if(this.value.length==8) return false;"
                                        name="business_landline_no" class="form-control" placeholder="Please use a 10 digit telephone number with no dashes or dots"
                                        required>
                                </div>
                                <div class="col-md">
                                    <p class="pt-4">Mobile No. <span class="text-danger">*</span> </p>
                                    <input type="number" onKeyPress="if(this.value.length==10) return false;" name="business_mobile_no" class="form-control"
                                        placeholder="Please use a 10 digit mobile number with no dashes or dots" required>
                                </div>
                            </div>

                            <!-- <h4>Owner Details </h4>
                                                                                                                    <h4>For Single Proprietorship </h4> -->
                            <p class="pt-4">Name of owner <span class="text-danger">*</span> </p>
                            <input type="text" name="name_of_owner" class="form-control"
                                placeholder="Enter Name of Owner" required>
                            {{-- <div class="row ml-3 mt-4">
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
                            </div> --}}
                            <br>
                            <p>Spouse <span class="text-danger">*</span> </p>
                            <input type="text" name="spouse" class="form-control" placeholder="Enter Spouse" required>
                            <br>
                            <p>Home Address <span class="text-danger">*</span> </p>
                            <input type="text" name="home_address" class="form-control" placeholder="Enter Home Address"
                                required>
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <p>Landline No <span class="text-danger">*</span> </p>
                                    <input type="number" onKeyPress="if(this.value.length==8) return false;" name="landline" class="form-control"
                                        placeholder="Please use a 8 digit telephone number with no dashes or dots" required>
                                </div>
                                <div class="col">
                                    <br>
                                    <p>Mobile no. <span class="text-danger">*</span> </p>
                                    <input type="number" onKeyPress="if(this.value.length==10) return false;" name="mobile_no" class="form-control"
                                        placeholder="Please use a 10 digit mobile number with no dashes or dots" required>
                                </div>
                            </div>
                            <br>
                            <p>Tax Identification No. <span class="text-danger">*</span> </p>
                            <input type="text" name="tax_identification_no" class="form-control"
                                placeholder="Enter Tax Identification No." required>
                            <br>
                            <p>Community Tax Certificate No. (Individual) or Other Valid Govt. ID No. <span
                                    class="text-danger">*</span> </p>
                            <input type="text" name="tax_cert_valid_gov_id" class="form-control"
                                placeholder="Enter Home Address" required>
                            <p class="mt-6">I certify that all of the information I have provided above is true and
                                correct
                                to the best of my knowledge. I fully understand that all data gathered here are required for
                                the evaluation of my application for commercial space lease/rent. I am aware that <span class="text-red">THIS IS
                                NOT CONSIDERED AS A LEASE AGREEMENT/CONTRACT.</span></p>
                            <input type="submit" class="btn btn-outline-success mx-auto d-flex justify-content-center"
                                style="width:40%;"></button>
                        </div>

                    </div>

                </div>
            </form>
            {{-- <div class="image-grid">
                <div class="image-container">
                    <img class="hw-20 img" src="{{ asset('nvdcpics') }}/cspaces2.jpg" style="width:100%;">
                    <h1 class="image-text">Commercial Space</h1>
                    <div class="btn-container">
                        <!-- <a href = "#section2" class="btn btn-outline-light">Events</a> -->
                        <a href="#section2" class="btn btn-outline-light">Inquire Now</a>
                    </div>
                </div>
            </div> --}}
            <!-- section 2 -->
            <div class="position-relative">
                <div class="image-grid pt-6">
                    <div class="image-container">
                        <img class="hw-20 img" src="{{ asset('nvdcpics') }}/cspaces2.jpg" style="width:100%;">
                        <div class="container mx-auto">

                            <div class="btn-container">
                                <h1 class="image-text font-weight-light uppercase text-light text-uppercase display-1">
                                    Commercial Space</h1>
                                <a href="#section1" class="btn btn-outline-light txt mt-6">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* Information */
            .img {
                height: 700px;
                object-fit: cover;
                filter: brightness(50%)
            }

            .image-text {
                position: absolute;
                top: 11%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-size: 36px;
                font-weight: bold;
                text-align: center;
            }

            .btn-container {
                position: absolute;
                top: 350px;
                left: 50%;
                transform: translateX(-50%);
                width: 100%;
                text-align: center;
            }

            p {
                font-family: montserrat;
                text-align: justify;
                font-size: 18px;
            }

            h1,
            h3,
            .text {
                font-family: montserrat;
            }

            .scrl {
                scroll-behavior: smooth;
            }

            .title {
                letter-spacing: 1px;
            }

            html {
                scroll-behavior: smooth;
            }

            .scrl {
                scroll-behavior: smooth;
            }

            .animate__animated {
                animation-duration: 1s;
                animation-fill-mode: both;
            }

            .parent {
                display: flex;
                justify-content: center;
            }

            @media (max-width: 800px) {
                .btn-container {
                    top: 400px;
                }
            }

            /* .centered {
                                        font-size:30px;
                                      position: absolute;
                                      bottom: 410px;
                                      right: 200px;
                                      color:white;
                                      -webkit-text-stroke-width: 1px;
                                      -webkit-text-stroke-color: black;
                                    } */
        </style>
        @include('layouts.footers.guest')
    @endsection
