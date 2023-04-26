@extends('layouts.guest', ['class' => 'bg-light'])
@section('content')
<link rel="stylesheet" href="{{ asset('css') }}/convention_center.css">
    <link rel="stylesheet" href="{{ asset('css') }}/commercial_spaces.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div id="carousel" class="carousel slide mt-6" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
                
                <img src="{{ asset('nvdcpics') }}/bcourt3.png" class="img-fluid">
                <div class="container mx-auto" >

                    <div class="btn-container" >
                        <h1 class="image-text font-weight-light uppercase text-light text-uppercase display-1" style = "padding-bottom:200px;">
                            Commercial Space</h1>
                        <a href="#section2" class="btn btn-outline-light txt mt-6" style = "margin-bottom:200px;">About</a>
                    </div>
                </div>
            </div>
            {{-- <div class="carousel-item">
                <img src="{{ asset('nvdcpics') }}/NovadeciHomepage.png" class="img-fluid" alt="">
                <div class="caption d-none d-lg-block">
                    <h1>Something and share your whatever</h1>
                    <h2>Else it easy for you to do whatever this thing does.</h2>
                    <a class="big-button" href="" title="">Create Project</a>
                    <div class="clear"></div>
                    <a class="view-demo" href="" title="">View Demo</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('nvdcpics') }}/NovadeciHomepage.png" class="img-fluid" alt="">
                <div class="caption d-none d-lg-block">
                    <h1>Create and share your whatever</h1>
                    <h2>Make it easy for you to do whatever this thing does.</h2>
                </div>
            </div> --}}
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{-- second --}}
        <div class="row" id = "section2">
            <div class="col-md-5 p-6" style="background-color: rgb(51, 60, 82)">
                <h1 class="text-white mt-6">Commercial Spaces</h1>
                <p class="text-white mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure neque culpa perspiciatis
                    vero adipisci
                    cupiditate tempora illum dolorem eligendi tenetur, ducimus perferendis officia. Quos doloribus quis ipsa
                    accusantium fugiat nisi.</p>
                <div class="btn-container" >
                    <a href="#section1" class="btn btn-outline-light txt mt-6" style = "top:1px;">Inquire Now</a>
                </div>
                {{-- <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure neque culpa perspiciatis
                    vero adipisci
                    cupiditate tempora illum dolorem eligendi tenetur, ducimus perferendis officia. Quos doloribus quis ipsa
                    accusantium fugiat nisi.</p> --}}
            </div>
            <div class="col-md-7" style="margin: 0; padding: 0">
                <img src="{{ asset('nvdcpics') }}/FunctionRoom1.png" class="img-fluid">
            </div>
        </div>
            <h1 class=" d-flex justify-content-center pt-8" id="section1">Commercial Space</h1>
            <form action="{{ url('/commercial_spaces_submit') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container-fluid bg-white" id="section2">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-9">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class=" mt-6"><span><button class="btn btn-success" disabled>1</button></span>
                                        &nbsp
                                        Commercial Space Inquiry and Application Form
                                    </h3>
                                </div>
                            </div>
                            {{-- <h4 class="pt-4">Business Information</h4> --}}
                            <p class="pt-4">Business Name <span class="text-danger">*</span></p>
                            <input type="text" name="business_name" class="form-control mt-2"
                                placeholder="Enter Business Name" maxlength="32" required>
                            <p class="pt-4">Business Style/Trade Name (if different from company name) <span
                                    class="text-danger">*</span> </p>
                            <input type="text" name="business_style" class="form-control"
                                placeholder="Enter Business Style/Trade Name" maxlength="32" required>
                            <p class="pt-4">Business Address <span class="text-danger">*</span> </p>
                            <input type="text" name="business_address" class="form-control"
                                placeholder="Enter Business Address" maxlength="64" required>
                            <p class="pt-4">Email Address/Website/FB Page <span class="text-danger">*</span> </p>
                            <input type="text" name="email_website_fb" class="form-control"
                                placeholder="Enter Email Address/Website/FB Page..." maxlength="64" required>
                            <div class="row">
                                <div class="col-md">
                                    <p class="pt-4">Business Landline No. </p>
                                    <input type="number" onKeyPress="if(this.value.length==8) return false;"
                                        name="business_landline_no" class="form-control" placeholder="09XXXXXXXX">
                                </div>
                                <div class="col-md">
                                    <p class="pt-4">Business Mobile No. <span class="text-danger">*</span> </p>
                                    <input type="number" onKeyPress="if(this.value.length==11) return false;"
                                        name="business_mobile_no" class="form-control" placeholder="09XXXXXXXX" required>
                                </div>
                            </div>
                            <!-- <h4>Owner Details </h4>
                            <h4>For Single Proprietorship </h4> -->
                            <!-- <p class="pt-4">Authorized Representative <span class="text-danger">*</span> </p>
                            <input type="text" name="authorized_representative" class="form-control"
                                placeholder="Enter Name of Authorized Representative" maxlength="64" required> -->

                            <p class="pt-4">Name of owner <span class="text-danger">*</span> </p>
                            <input type="text" name="name_of_owner" class="form-control"
                                placeholder="Enter Name of Owner" maxlength="64" required>
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
                            <p>Spouse
                            <input type="text" name="spouse" class="form-control" placeholder="Enter Spouse"
                                maxlength="64" >
                            <br>
                            <p>Home Address <span class="text-danger">*</span> </p>
                            <input type="text" name="home_address" class="form-control" placeholder="Enter Home Address"
                                maxlength="128" required>
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <p>Landline No </p>
                                    <input type="number" onKeyPress="if(this.value.length==8) return false;"
                                        name="landline" class="form-control"
                                        placeholder="Please use a 8 digit telephone number with no dashes or dots">
                                </div>
                                <div class="col">
                                    <br>
                                    <p>Mobile no. <span class="text-danger">*</span> </p>
                                    <input type="number" onKeyPress="if(this.value.length==11) return false;"
                                        name="mobile_no" class="form-control"
                                        placeholder="Please use a 10 digit mobile number with no dashes or dots" required>
                                </div>
                            </div>
                            <br>
                            <p>Tax Identification No. <span class="text-danger">*</span> </p>
                            <input type="number" name="tax_identification_no" class="form-control"
                                placeholder="Enter Tax Identification No."
                                onKeyPress="if(this.value.length==9) return false;" 
                                required>
                            <br>
                            <p>Upload TIN Image <span class="text-danger">*</span> </p>
                            <input type="file" accept=".png, .jpeg, .jpg, .gif" maxlength="500000" name="tin_images" class="form-control"
                                required>
                            <br>
                            <p>Community Tax Certificate No. (Individual) or Other Valid Govt. ID No. <span
                                    class="text-danger">*</span> </p>
                            <input type="text" name="tax_cert_valid_gov_id" class="form-control"
                                placeholder="Enter Home Address" maxlength="128" required>
                            <br>
                            <p>Upload Image <span class="text-danger">*</span> </p>
                            <input type="file" accept=".png, .jpeg, .jpg, .gif" maxlength="500000" name="other_images" class="form-control"
                                required>
                            <br>
                            <p class="mt-6">I certify that all of the information I have provided above is true and
                                correct
                                to the best of my knowledge. I fully understand that all data gathered here are required for
                                the evaluation of my application for commercial space lease/rent. I am aware that <span
                                    class="text-red">THIS IS
                                    NOT CONSIDERED AS A LEASE AGREEMENT/CONTRACT.</span></p>
                            <input type="submit" class="btn btn-outline-success mx-auto d-flex justify-content-center"
                                style="width:40%;">
                                <br>
                        </div>
                    </div>
                </div>
            </form>
            {{-- Old --}}
            {{-- <div class="position-relative">
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
            </div> --}}
        </div>
    </div>
@endsection