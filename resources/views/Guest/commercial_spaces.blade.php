@extends('layouts.guest', ['class' => 'bg-light'])
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <div class="card-body">
            <div class="image-grid">
                <div class="image-container">
                    <img class="hw-20 img" src="{{ asset('nvdcpics') }}/cspaces2.jpg" style = "width:100%;">
                        <h1 class="image-text">Commercial Space</h1>
                        <div class="btn-container">
                        <!-- <a href = "#section2" class="btn btn-outline-light">Events</a> -->
                        <a href = "#section2" class="btn btn-outline-light">Inquire Now</a>
                        </div>
                </div>
            </div>
            <!-- section 2 -->
                <form action="" >
                    <div class="container-fluid bg-white mt-6"  id="section2">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-9 mt-5">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="mx-auto pt-6" >Commercial Space Inquiry and Application Form (Step 1)</h3>
                                    </div>
                                </div>
                                    <h3 class="text-muted">Business Information</h3>
                                        <h4 class = "pt-4">Business Name </h4>
                                            <input type="text" class="form-control mt-2" placeholder="Enter Business Name" required>
                                                    <h4 class = "pt-4">Business Style/Trade Name (if different from company name): </h4>
                                                        <input type="text" class="form-control" placeholder="Enter Business Style/Trade Name" required>
                                                            <h4 class = "pt-4">Business Address </h4>
                                                                <input type="text" class="form-control" placeholder="Enter Business Address" required>
                                                                    <h4 class = "pt-4">Email Address/Website/FB Page </h4>
                                                                        <input type="text" class="form-control" placeholder="Enter Email Address/Website/FB Page..." required>
                                                                            <div class="row">
                                                                                <div class="col-6"> 
                                                                                                                                     
                                                                                        <h4 class = "pt-4">Landline No. </h4>
                                                                                            <input type="text" class="form-control" placeholder="Enter Landline No." required>
                                                                                </div>
                                                                                    <div class="col-6">
                                                                                        <h4 class = "pt-4">Mobile No. </h4>
                                                                                            <input type="text" class="form-control" placeholder="Enter Mobile No." required>
                                                                                    </div>
                                                                            </div>
                                                            
                                                                            <!-- <h4>Owner Details </h4>
                                                                                <h4>For Single Proprietorship </h4> -->
                                                                                    <h4 class = "pt-4">Name of owner </h4>
                                                                                        <input type="text" class="form-control" placeholder="Enter Name of Owner" required>                                                
    <div class="row ml-3 mt-4">
        <div class="col-md-3">
            <input type="radio" id="customRadioInline3" name="customRadioInline2" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline3">Single</label>
        </div>
            <div class="col-md-3">
                <input type="radio" id="customRadioInline3" name="customRadioInline2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline3">Married</label>
            </div>
                <div class="col-md-3">
                    <input type="radio" id="customRadioInline3" name="customRadioInline2" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Separrated</label>
                </div>
                    <div class="col-md-3">
                        <input type="radio" id="customRadioInline3" name="customRadioInline2" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline3">Others</label>
                    </div>
    </div>
        <br>
            <h4>Spouse </h4>
                <input type="text" class="form-control" placeholder="Enter Spouse" required>
                    <br>
                        <h4>Home Address </h4>
                            <input type="text" class="form-control" placeholder="Enter Home Address" required>
                                <div class="row">
                                    <div class="col">
                                        <br>
                                            <h4>Landline No </h4>
                                                <input type="text" class="form-control" placeholder="Enter Landline No." required>
                                    </div>
                                        <div class="col">
                                            <br>
                                                <h4>Mobile no. </h4>
                                                    <input type="text" class="form-control" placeholder="Enter Mobile No.:" required>
                                        </div>
                                </div>
                                    <br>
                                        <h4>Tax Identification No. </h4>
                                            <input type="text" class="form-control" placeholder="Enter Tax Identification No." required>
                                                <br>
                                                    <h4>Community Tax Certificate No. (Individual) or Other Valid Govt. ID No. </h4>
                                                        <input type="text" class="form-control" placeholder="Enter Home Address" required>
                                                            <p class = "mt-6">I certify that all of the information I have provided above is true and correct to the best of my knowledge. I fully understand that all data gathered here are required for the evaluation of my application for commercial space lease/rent. I am aware that THIS IS NOT CONSIDERED AS A LEASE AGREEMENT/CONTRACT.</p>
                                    </div>
                                </div>
                    <input type="submit" class="btn btn-success btn-lg btn-block mt-4 mb-4"></button>
            </div>
        </form> 
    </div>                 
<style>

/* Information */
.img{
    height:700px;
    object-fit:cover;
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
p{
    font-family:sans-serif;
    text-align:justify;
}
.txt{
    font-family:sans-serif;
}
.title {
    letter-spacing:1px;
}
.scrl {
    scroll-behavior: smooth;
}.animate__animated {
  animation-duration: 1s;
  animation-fill-mode: both;
}
.parent {
  display: flex;
  justify-content: center;
}
@media (max-width: 800px){
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
@endsection