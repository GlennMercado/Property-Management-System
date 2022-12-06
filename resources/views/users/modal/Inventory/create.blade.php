<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">{{ __('View') }}</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                            <form class="needs-validation" novalidate>
                                <div class = "row">
                                    <div class = "col">
                                        <p class="text-left">Stock ID: </p>
                                            <input class="form-control" type="text" value="1" id="example-datetime-local-input" readonly>
                                    </div>
                                        <div class = "col">
                                            <p class="text-left">Stock Name: </p>
                                                <input type="text" class="form-control" id="Stockname" aria-describedby="emailHelp" value = "Sample Data" required>
                                                    <div class="invalid-feedback">
                                                        Stock Name empty
                                                    </div>       
                                        </div>
                                </div>
                        <div class="form-group">
                            <label for="Stockdetails">Stock Description</label>
                                <input type="text" class="form-control" id="Stockdetails" value = "Sample Data" required>
                                    <div class="invalid-feedback">
                                        Stock Details empty
                                    </div>

                            <label for="Stockdetails">Date :</label>
                                <input type="date" class="form-control" id="Stockdetails" value = "6-12-2022" required>
                                    <div class="invalid-feedback">
                                        Quantity empty
                                    </div>

                            <label for="Stockdetails">Quantity</label>
                                <input type="number" class="form-control" id="Stockdetails" value = "0" required>
                                    <div class="invalid-feedback">
                                        Quantity empty
                                    </div>
                </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Stock Type</label>
                            <select class="form-control" required>
                                <option value="Stock1">Sample 1</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock3">Sample 3</option>
                            </select>
                                <div class="invalid-feedback">
                                Stock Details empty
                                </div>
                    </div>      
      
                                    <!--<th scope="col">Product Code:</th>
                                    <th scope="col">Item Name:</th>
                                    <th scope="col">Details:</th>
                                    <th scope="col">Type:</th>
                                    <th scope="col">Quantity:</th>
                                    <th scope="col">Available Stock:</th>
                               
                        <div class = "row">
                            <div class = "col-3">
                                <th>Product Code:</th>
                            </div>
                                <div class = "col">          
                                    <td>Sample Data</td>                  
                                </div>
                                    <div class = "col-3">
                                        <th>Item Name:</th>
                                    </div>
                                        <div class = "col">          
                                                <td> </td>                  
                                        </div>
                        </div>
                        <div class = "row">
                            <div class = "col-3">
                                <th>Description:</th>
                            </div>
                                <div class = "col">          
                                    <td>Sample Data</td>                  
                                </div>
                                    <div class = "col-3">
                                        <th>Type:</th>
                                    </div>
                                        <div class = "col">          
                                                <td>Sample Data</td>                  
                                        </div>
                        </div>
                        <div class = "row">
                            <div class = "col-3">
                                <th>Quantity:</th>
                            </div>
                                <div class = "col">          
                                    <td>Sample Data</td>                  
                                </div>
                                    <div class = "col-3">
                                        <th>Available Stock:</th>
                                    </div>
                                        <div class = "col">          
                                                <td>Sample Data</td>                  
                                        </div>
                        </div>-->
                </div>
            </div>
        </div>
    </div>
</form>