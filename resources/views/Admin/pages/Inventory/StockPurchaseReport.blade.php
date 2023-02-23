@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="col">
                                    <button class="btn btn-outline-primary" class="btn btn-primary" data-toggle="modal"
                                        data-target="#PurchaseReportModal" style="float:right;">
                                        Make Report
                                    </button>
                                </div>
                                <h3 class="mb-0 title">Stock Purchase Reports</h3>
                                <h5 class="mb-0" style="color:#6C6C6C; font-size:16px;">Instructions: Before starting, see
                                    to It that all inventory are in the Storage Area</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size:18px;">Item Name</th>
                                    <th scope="col" style="font-size:18px;">Supplier Name</th>
                                    <th scope="col" style="font-size:18px;">Description</th>
                                    <th scope="col" style="font-size:18px;">Available Stock</th>
                                    <th scope="col" style="font-size:18px;">Stock Level</th>
                                    <th scope="col" style="font-size:18px;">Stock Alert</th>
                                    <th scope="col" style="font-size:18px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $lists)
                                    <tr>
                                        <td style="font-size:16px;">{{ $lists->name }}</td>
                                        <td style="font-size:16px;">{{ $lists->suppliername }}</td>
                                        <td style="font-size:16px;">{{ $lists->description }}</td>
                                        <td style="font-size:16px;">{{ $lists->quantity }}</td>
                                        <td style="font-size:16px;">{{ $lists->Stock_Level }}</td>
                                        @if ($lists->quantity <= $lists->Stock_Level)
                                            <td style="font-size:25px;"><i class="bi bi-exclamation-triangle-fill"
                                                    style="color:red;"></i></td>
                                        @else
                                            <td style="font-size:25px;"><i class="bi bi-check-square-fill"
                                                    style="color:green;"></i></td>
                                        @endif
                                        <td>
                                            <button type="button" data-toggle="modal"
                                                data-target="#ModalView{{ $lists->productid }}" class="btn btn-primary"><i
                                                    class="bi bi-eye" style="padding:2px;">View</i></button>
                                            <button type="button" data-toggle="modal"
                                                data-target="#ModalUpdate{{ $lists->productid }}" class="btn btn-primary"><i
                                                    class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                        </td>
                                    </tr>

                                    <!--MODAL FOR VIEW-->
                                    <div class="modal fade" id="ModalView{{ $lists->productid }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">View
                                                        All Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card-body bg-white" style="border-radius: 18px">
                                                            <p class="text-left">Category :
                                                                <input class="form-control" type="text" name="name"
                                                                    value="{{ $lists->name }}" readonly>
                                                            </p>

                                                            <p class="text-left">Purchased Date :
                                                                <input class="form-control" type="text" name="date"
                                                                    value="{{ date('m-d-Y', strtotime($lists->date)) }}"
                                                                    readonly>
                                                            </p>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">Item :
                                                                        <input class="form-control" type="number"
                                                                            placeholder="Enter Here.." name="unit"
                                                                            value="{{ $lists->unit }}" readonly>
                                                                    </p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">Quantity :
                                                                        <input class="form-control" type="text"
                                                                            name="quantity" value="{{ $lists->quantity }}"
                                                                            readonly>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="text-left">Reciever :
                                                                <input class="form-control" type="text"
                                                                    name="suppliername" value="{{ $lists->suppliername }}"
                                                                    readonly>
                                                            </p>

                                                            <p class="text-left">Supervisor/Dept :
                                                                <input class="form-control" type="text"
                                                                    name="suppliername" value="{{ $lists->suppliername }}"
                                                                    readonly>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button> <button type="button"
                                                        class="btn btn-primary" data-dismiss="modal">Ok</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--MODAL FOR Update-->
                                    <div class="modal fade" id="ModalUpdate{{ $lists->productid }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                        Purchase Report</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation" action="{{ url('/edit_report') }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="card-body bg-white" style="border-radius: 18px">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input class="form-control" type="text"
                                                                            name="productid"
                                                                            value="{{ $lists->productid }}" hidden>
                                                                        <p class="text-left">Item Name :
                                                                            <input class="form-control" type="text"
                                                                                name="name"
                                                                                value="{{ $lists->name }}" required>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <p class="text-left">Item Description :
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Enter Here.." name="description"
                                                                        value="{{ $lists->description }}" required>
                                                                </p>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-left">Unit :
                                                                            <input class="form-control" type="number"
                                                                                placeholder="Enter Here.." name="unit"
                                                                                value="{{ $lists->unit }}" required>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="text-left">Quantity :
                                                                            <input class="form-control" type="number"
                                                                                placeholder="Enter Here.." name="quantity"
                                                                                value="{{ $lists->quantity }}" required>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <p class="text-left">Supplier Name: </p>
                                                                <select class="form-control" name="suppliername"
                                                                    value="{{ $lists->productid }}" required>
                                                                    <option>Sample Supplier 1</option>
                                                                    <option>Sample Supplier 2</option>
                                                                    <option>Sample Supplier 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!--MODAL FOR REPORT-->
                    <div class="modal fade" id="PurchaseReportModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Purchase Report
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/add') }}" class="prevent_submit" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="card-body bg-white" style="border-radius: 18px">
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="text-left text-color">Category : </label>
                                                        <input class="form-control mt-1" type="text" name="category[]"
                                                            placeholder="Enter Here.." required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="form-label">Number of pax</p>
                                                        <select name="pax" id="childs" class="form-control"
                                                            onchange="pax_on_change()" required>
                                                            <option selected value="">Select</option>
                                                            @for ($count = 0; $count <= 10; $count++)
                                                                <option value="{{ $count }}" id="room_pax">
                                                                    {{ $count }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="text-left pt-4 text-color">Unit :</label>
                                                        <div class="col" id="ballses" name="unit[]">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label class="text-left pt-4 text-color">Quantity </label>
                                                        <div class="col" id="balls" name="quantity[]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="text-left pt-4 text-color">Receiver : </label>
                                                <input class="form-control mt-2" type="text"
                                                    placeholder="Enter Here.." name="receiver[]" required>
                                                <label class="text-left pt-4 text-color">Supervisor Dept. : </label>
                                                <input class="form-control mt-2" type="text"
                                                    placeholder="Enter Here.." name="supervisor[]" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>






                </div>



            </div>
            <script>
                function changeValue() {
                    var textboxNumbers = document.getElementById("childs").value;
                    balls.innerHTML = '';
                    var i;

                    for (i = 0; i < textboxNumbers; i++) {
                        var yourTextboxes = document.createElement("INPUT");
                        yourTextboxes.setAttribute("type", "text");
                        yourTextboxes.setAttribute("name", "quantity[]");
                        yourTextboxes.classList.add("form-control");
                        yourTextboxes.setAttribute("placeholder", "Enter Here");
                        document.getElementById("balls").appendChild(yourTextboxes);
                    }

                    var dropdowns = document.getElementById("childs").value;
                    document.getElementById("ballses").innerHTML = '';

                    for (i = 0; i < dropdowns; i++) {
                        var yourDropdown = document.createElement("SELECT");
                        yourDropdown.setAttribute("name", "unit[]");
                        yourDropdown.classList.add("form-control");

                        var option1 = document.createElement("OPTION");
                        option1.setAttribute("value", "Option 1");
                        option1.innerHTML = "Sugar";
                        yourDropdown.appendChild(option1);

                        var option2 = document.createElement("OPTION");
                        option2.setAttribute("value", "Option 2");
                        option2.innerHTML = "Toothbrush";
                        yourDropdown.appendChild(option2);

                        var option3 = document.createElement("OPTION");
                        option3.setAttribute("value", "Option 3");
                        option3.innerHTML = "Shampoo";
                        yourDropdown.appendChild(option3);

                        var option4 = document.createElement("OPTION");
                        option4.setAttribute("value", "Option 4");
                        option4.innerHTML = "Bedsheet";
                        yourDropdown.appendChild(option4);

                        var option5 = document.createElement("OPTION");
                        option5.setAttribute("value", "Option 5");
                        option5.innerHTML = "Dental Kit";
                        yourDropdown.appendChild(option5);

                        var option6 = document.createElement("OPTION");
                        option6.setAttribute("value", "Option 6");
                        option6.innerHTML = "Hand Towel";
                        yourDropdown.appendChild(option6);

                        var option7 = document.createElement("OPTION");
                        option7.setAttribute("value", "Option 7");
                        option7.innerHTML = "Bath Towel";
                        yourDropdown.appendChild(option7);

                        var option8 = document.createElement("OPTION");
                        option8.setAttribute("value", "Option 8");
                        option8.innerHTML = "Coffee";
                        yourDropdown.appendChild(option8);

                        var option9 = document.createElement("OPTION");
                        option9.setAttribute("value", "Option 9");
                        option9.innerHTML = "Creamer";
                        yourDropdown.appendChild(option9);

                        var option10 = document.createElement("OPTION");
                        option10.setAttribute("value", "Option 10");
                        option10.innerHTML = "Hanger";
                        yourDropdown.appendChild(option10);

                        var option11 = document.createElement("OPTION");
                        option11.setAttribute("value", "Option 11");
                        option11.innerHTML = "Queen Sheet";
                        yourDropdown.appendChild(option11);

                        var option12 = document.createElement("OPTION");
                        option12.setAttribute("value", "Option 12");
                        option12.innerHTML = "Pillows";
                        yourDropdown.appendChild(option12);

                        var option13 = document.createElement("OPTION");
                        option13.setAttribute("value", "Option 13");
                        option13.innerHTML = "Pillow Case";
                        yourDropdown.appendChild(option13);

                        document.getElementById("ballses").appendChild(yourDropdown);
                    }
                }




                function pax_on_change() {
                    changeValue();
                }
            </script>
            <style>
                .title {
                    text-transform: uppercase;
                    font-size: 25px;
                    letter-spacing: 2px;
                }

                .text-color {
                    font-size: 18px;
                    color: #6C6C6C;
                }
            </style>
        @endsection

        @push('js')
            <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
            <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
        @endpush
