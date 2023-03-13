@extends('layouts.printpage')

@section('content')
    @foreach ($list as $list)
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 mt-5">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="mx-auto pt-6">Commercial Space Inquiry and Application Form (Step 1)</h3>
                    </div>
                </div>
                <h3 class="text-muted">Business Information</h3>
                <h4 class="pt-4">Business Name </h4>
                <input type="text" name="business_name" value="{{ $list->business_name }}" class="form-control mt-2"
                    disabled>
                <h4 class="pt-4">Business Style/Trade Name (if different from company name): </h4>
                <input type="text" name="business_style" class="form-control" value="{{ $list->business_style }}"
                    disabled>
                <h4 class="pt-4">Business Address </h4>
                <input type="text" name="business_address" class="form-control" value="{{ $list->business_address }}"
                    disabled>
                <h4 class="pt-4">Email Address/Website/FB Page </h4>
                <input type="text" name="email_website_fb" class="form-control" value="{{ $list->email_website_fb }}"
                    disabled>
                <div class="row">
                    <div class="col-6">

                        <h4 class="pt-4">Landline No. </h4>
                        <input type="text" name="business_landline_no" class="form-control"
                            value="{{ $list->business_landline_no }}" disabled>
                    </div>
                    <div class="col-6">
                        <h4 class="pt-4">Mobile No. </h4>
                        <input type="text" name="business_mobile_no" class="form-control"
                            value="{{ $list->business_mobile_no }}" disabled>
                    </div>
                </div>

                <!-- <h4>Owner Details </h4>
                                                                                                    <h4>For Single Proprietorship </h4> -->
                <h4 class="pt-4">Name of owner </h4>
                <input type="text" name="name_of_owner" class="form-control" value="{{ $list->name_of_owner }}" disabled>
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
                <h4>Spouse </h4>
                <input type="text" name="spouse" class="form-control" value="{{ $list->spouse }}" disabled>
                <br>
                <h4>Home Address </h4>
                <input type="text" name="home_address" class="form-control" value="{{ $list->home_address }}" disabled>
                <div class="row">
                    <div class="col">
                        <br>
                        <h4>Landline No </h4>
                        <input type="text" name="landline" class="form-control" value="{{ $list->landline }}" disabled>
                    </div>
                    <div class="col">
                        <br>
                        <h4>Mobile no. </h4>
                        <input type="text" name="mobile_no" class="form-control" value="{{ $list->mobile_no }}"
                            disabled>
                    </div>
                </div>
                <br>
                <h4>Tax Identification No. </h4>
                <input type="text" name="tax_identification_no" class="form-control"
                    value="{{ $list->tax_identification_no }}" disabled>
                <br>
                <h4>Community Tax Certificate No. (Individual) or Other Valid Govt. ID No. </h4>
                <input type="text" name="tax_cert_valid_gov_id" class="form-control"
                    value="{{ $list->tax_cert_valid_gov_id }}" disabled>
    @endforeach
    <p class="mt-6">I certify that all of the information I have provided above is true and
        correct
        to the best of my knowledge. I fully understand that all data gathered here are disabled for
        the evaluation of my application for commercial space lease/rent. I am aware that THIS IS
        NOT CONSIDERED AS A LEASE AGREEMENT/CONTRACT.</p>
    </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
