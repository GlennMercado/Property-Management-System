@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>


    <div class="content-area">
        <div class="container mt-7">
            <br>
            {{-- Commercial spaces application --}}
            <div class="card bg-white shadow mt-2 mb-2">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Commercial Spaces Application') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    @forelse ($comm as $comm)
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead>
                                    <tr>
                                        <th>CONTROL NO.</th>
                                        <th>APPLICATION STATUS</th>
                                        <th>APPLICATION DATE</th>
                                        <th>REMARKS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $comm->id }}
                                        </td>
                                        @if ($comm->Status == 'For Approval' || $comm->Status == 'For Interview' || $comm->Status == 'For Revision')
                                            <td>
                                                <span
                                                    class="badge badge-pill badge-primary badge-lg">{{ $comm->Status }}</span>
                                            </td>
                                        @elseif($comm->Status == 'Approved' || $comm->Status == 'Revised' || $comm->Status == 'Tenant' || $comm->Status == 'Passed')
                                            <td>
                                                <span
                                                    class="badge badge-pill badge-success badge-lg">{{ $comm->Status }}</span>
                                            </td>
                                        @elseif($comm->Status == 'Disapproved' || $comm->Status == 'Failed' || $comm->Status == 'Tenant (Terminated)')
                                            <td>
                                                <span
                                                    class="badge badge-pill badge-danger badge-lg">{{ $comm->Status }}</span>
                                            </td>
                                        @endif
                                        <td>
                                            {{ date('F j, y', strtotime($comm->created_at)) }} <br>
                                            {{ date('h:i A', strtotime($comm->created_at)) }}
                                        </td>

                                        <td class="text-primary">
                                            {{ $comm->Remarks }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#commprev{{ $comm->id }}">View
                                                Appication</button>
                                            @if ($comm->Status == 'For Revision')
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#commedit{{ $comm->id }}">Edit</button>
                                            @endif
                                            @if ($comm->Status == 'Approved')
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#comm_set_interview{{ $comm->id }}">Set
                                                    Interview</button>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- View Application --}}
                        <div class="modal fade bd-example-modal-lg" id="commprev{{ $comm->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Commercial space applications</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-9">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h3 class=" mt-6"><span><button class="btn btn-success"
                                                                    disabled="">1</button></span>
                                                            &nbsp;
                                                            Commercial Space Inquiry and Application Form
                                                        </h3>
                                                    </div>
                                                </div>

                                                <p class="pt-4">Business Name <span class="text-danger">*</span></p>
                                                <input type="text" name="business_name" class="form-control mt-2"
                                                    placeholder="Enter Business Name" maxlength="64" required=""
                                                    value="{{ $comm->business_name }}" readonly>
                                                <p class="pt-4">Business Style/Trade Name (if different from company
                                                    name) <span class="text-danger">*</span> </p>
                                                <input type="text" name="business_style" class="form-control"
                                                    placeholder="Enter Business Style/Trade Name" maxlength="64"
                                                    required="" value="{{ $comm->business_style }}" readonly>
                                                <p class="pt-4">Business Address <span class="text-danger">*</span>
                                                </p>
                                                <input type="text" name="business_address" class="form-control"
                                                    placeholder="Enter Business Address" maxlength="64" required=""
                                                    value="{{ $comm->business_address }}" readonly>
                                                <p class="pt-4">Email Address/Website/FB Page <span
                                                        class="text-danger">*</span>
                                                </p>
                                                <input type="text" name="email_website_fb" class="form-control"
                                                    placeholder="Enter Email Address/Website/FB Page..." maxlength="64"
                                                    required="" value="{{ $comm->email_website_fb }}" readonly>
                                                <div class="row">
                                                    <div class="col-md">

                                                        <p class="pt-4">Landline No. <span class="text-danger">*</span>
                                                        </p>
                                                        <input type="number"
                                                            onkeypress="if(this.value.length==8) return false;"
                                                            name="business_landline_no" class="form-control"
                                                            placeholder="09XXXXXXXX" required=""
                                                            value="{{ $comm->business_landline_no }}" readonly>
                                                    </div>
                                                    <div class="col-md">
                                                        <p class="pt-4">Mobile No. <span class="text-danger">*</span>
                                                        </p>
                                                        <input type="number"
                                                            onkeypress="if(this.value.length==10) return false;"
                                                            name="business_mobile_no" class="form-control"
                                                            placeholder="09XXXXXXXX" required=""
                                                            value="{{ $comm->business_mobile_no }}" readonly>
                                                    </div>
                                                </div>

                                                <!-- <h4>Owner Details </h4>
                                                                                                                                                                                                                    <h4>For Single Proprietorship </h4> -->
                                                <p class="pt-4">Name of owner <span class="text-danger">*</span>
                                                </p>
                                                <input type="text" name="name_of_owner" class="form-control"
                                                    placeholder="Enter Name of Owner" maxlength="64" required=""
                                                    value="{{ $comm->name_of_owner }}" readonly>

                                                <br>
                                                <p>Spouse <span class="text-danger">*</span> </p>
                                                <input type="text" name="spouse" class="form-control"
                                                    placeholder="Enter Spouse" maxlength="64" required=""
                                                    value="{{ $comm->spouse }}" readonly>
                                                <br>
                                                <p>Home Address <span class="text-danger">*</span> </p>
                                                <input type="text" name="home_address" class="form-control"
                                                    placeholder="Enter Home Address" maxlength="128" required=""
                                                    value="{{ $comm->home_address }}" readonly>
                                                <div class="row">
                                                    <div class="col">
                                                        <br>
                                                        <p>Landline No <span class="text-danger">*</span> </p>
                                                        <input type="number"
                                                            onkeypress="if(this.value.length==8) return false;"
                                                            name="landline" class="form-control"
                                                            placeholder="Please use a 8 digit telephone number with no dashes or dots"
                                                            required="" value="{{ $comm->landline }}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <br>
                                                        <p>Mobile no. <span class="text-danger">*</span> </p>
                                                        <input type="number"
                                                            onkeypress="if(this.value.length==10) return false;"
                                                            name="mobile_no" class="form-control"
                                                            placeholder="Please use a 10 digit mobile number with no dashes or dots"
                                                            required="" value="{{ $comm->mobile_no }}" readonly>
                                                    </div>
                                                </div>
                                                <br>
                                                <p>Tax Identification No. <span class="text-danger">*</span> </p>
                                                <input type="number" name="tax_identification_no" class="form-control"
                                                    placeholder="Enter Tax Identification No."
                                                    onkeypress="if(this.value.length==12) return false;" required=""
                                                    value="{{ $comm->tax_identification_no }}" readonly>
                                                <br>
                                                <p>Community Tax Certificate No. (Individual) or Other Valid Govt. ID
                                                    No.
                                                    <span class="text-danger">*</span>
                                                </p>
                                                <input type="text" name="tax_cert_valid_gov_id" class="form-control"
                                                    placeholder="Enter Home Address" maxlength="128" required=""
                                                    value="{{ $comm->tax_cert_valid_gov_id }}" readonly>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Edit Application --}}
                        <div class="modal fade bd-example-modal-lg" id="commedit{{ $comm->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Commercial space applications</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/edit_commercial_spaces_application') }}"
                                        class="prevent_submit" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-9">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class=" mt-6"><span><button class="btn btn-success"
                                                                        disabled="">1</button></span>
                                                                &nbsp;
                                                                Commercial Space Inquiry and Application Form
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $comm->id }}" />

                                                    <p class="pt-4">Business Name <span class="text-danger">*</span></p>
                                                    <input type="text" name="business_name" class="form-control mt-2"
                                                        placeholder="Enter Business Name" maxlength="64"
                                                        value="{{ $comm->business_name }}" required>

                                                    <p class="pt-4">Business Style/Trade Name (if different from company
                                                        name) <span class="text-danger">*</span> </p>
                                                    <input type="text" name="business_style" class="form-control"
                                                        placeholder="Enter Business Style/Trade Name" maxlength="64"
                                                        value="{{ $comm->business_style }}" required>

                                                    <p class="pt-4">Business Address <span class="text-danger">*</span>
                                                    </p>
                                                    <input type="text" name="business_address" class="form-control"
                                                        placeholder="Enter Business Address" maxlength="64"
                                                        value="{{ $comm->business_address }}" required>

                                                    <p class="pt-4">Email Address/Website/FB Page <span
                                                            class="text-danger">*</span>
                                                    </p>
                                                    <input type="text" name="email_website_fb" class="form-control"
                                                        placeholder="Enter Email Address/Website/FB Page..."
                                                        maxlength="64" value="{{ $comm->email_website_fb }}" required>

                                                    <div class="row">
                                                        <div class="col-md">
                                                            <p class="pt-4">Landline No. <span
                                                                    class="text-danger">*</span>
                                                            </p>
                                                            <input type="number"
                                                                onkeypress="if(this.value.length==8) return false;"
                                                                name="business_landline_no" class="form-control"
                                                                placeholder="09XXXXXXXX"
                                                                value="{{ $comm->business_landline_no }}" required>
                                                        </div>

                                                        <div class="col-md">
                                                            <p class="pt-4">Mobile No. <span
                                                                    class="text-danger">*</span>
                                                            </p>
                                                            <input type="number"
                                                                onkeypress="if(this.value.length==10) return false;"
                                                                name="business_mobile_no" class="form-control"
                                                                placeholder="09XXXXXXXX"
                                                                value="{{ $comm->business_mobile_no }}" required>
                                                        </div>
                                                    </div>

                                                    <!-- <h4>Owner Details </h4>
                                                        <h4>For Single Proprietorship </h4> -->
                                                    <p class="pt-4">Authorized Representative <span
                                                            class="text-danger">*</span> </p>
                                                   
                                                    <p class="pt-4">Name of owner <span class="text-danger">*</span>
                                                    </p>
                                                    <input type="text" name="name_of_owner" class="form-control"
                                                        placeholder="Enter Name of Owner" maxlength="64"
                                                        value="{{ $comm->name_of_owner }}" required>

                                                    <br>
                                                    <p>Spouse </p>
                                                    <input type="text" name="spouse" class="form-control"
                                                        placeholder="Enter Spouse" maxlength="64"
                                                        value="{{ $comm->spouse }}">
                                                    <br>

                                                    <p>Home Address <span class="text-danger">*</span> </p>
                                                    <input type="text" name="home_address" class="form-control"
                                                        placeholder="Enter Home Address" maxlength="128"
                                                        value="{{ $comm->home_address }}" required>

                                                    <div class="row">
                                                        <div class="col">
                                                            <br>
                                                            <p>Landline No <span class="text-danger">*</span> </p>
                                                            <input type="number"
                                                                onkeypress="if(this.value.length==8) return false;"
                                                                name="landline" class="form-control"
                                                                placeholder="Please use a 8 digit telephone number with no dashes or dots"
                                                                value="{{ $comm->landline }}" required>
                                                        </div>
                                                        <div class="col">
                                                            <br>
                                                            <p>Mobile no. <span class="text-danger">*</span> </p>
                                                            <input type="number"
                                                                onkeypress="if(this.value.length==10) return false;"
                                                                name="mobile_no" class="form-control"
                                                                placeholder="Please use a 10 digit mobile number with no dashes or dots"
                                                                value="{{ $comm->mobile_no }}" required>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <p>Tax Identification No. <span class="text-danger">*</span> </p>
                                                    <input type="number" name="tax_identification_no"
                                                        class="form-control" placeholder="Enter Tax Identification No."
                                                        onkeypress="if(this.value.length==12) return false;"
                                                        value="{{ $comm->tax_identification_no }}" required>
                                                    <br>

                                                    <p>Community Tax Certificate No. (Individual) or Other Valid Govt. ID
                                                        No.
                                                        <span class="text-danger">*</span>
                                                    </p>
                                                    <input type="text" name="tax_cert_valid_gov_id"
                                                        class="form-control" placeholder="Enter Home Address"
                                                        maxlength="128" value="{{ $comm->tax_cert_valid_gov_id }}"
                                                        required>
                                                    <p class="mt-6">I certify that all of the information I have provided
                                                        above is
                                                        true
                                                        and
                                                        correct
                                                        to the best of my knowledge. I fully understand that all data
                                                        gathered
                                                        here are
                                                        required for
                                                        the evaluation of my application for commercial space lease/rent. I
                                                        am
                                                        aware
                                                        that
                                                        <span class="text-red">THIS IS
                                                            NOT CONSIDERED AS A LEASE AGREEMENT/CONTRACT.</span>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Set Interview --}}
                        <div class="modal fade interview_modal" id="comm_set_interview{{ $comm->id }}"
                            tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Commercial space applications</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @foreach ($data as $start_date)
                                        <input type="hidden" name="start_dates[]" value="{{ $start_date['date'] }}">
                                    @endforeach
                                    <form action="{{ url('/set_commercial_space_schedule') }}" class="prevent_submit"
                                        method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="{{ $comm->id }}">

                                            <h3 class="text-left">Set Interview Schedule</h3>

                                            <input type="text" id="interview" class="datepicker"
                                                name="interview_date" onkeydown="return false" autocomplete="off"
                                                required>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @empty
                        <p class="text-center display-5">No application yet</p>
                        <img src="{{ asset('nvdcpics') }}/eventempty.svg" class="img-fluid"
                            style="width: 100%; height: 200px">
                    @endforelse
                </div>
            </div>

            <br>
        </div>

    @endsection
