<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                <input type="text" class="form-control" id="Stockname" aria-describedby="emailHelp" placeholder="Enter name..." required>
                                                    <div class="invalid-feedback">
                                                        Stock Name empty
                                                    </div>       
                                        </div>
                                </div>
                        <div class="form-group">
                            <label for="Stockdetails">Stock Description</label>
                                <input type="text" class="form-control" id="Stockdetails" placeholder="Enter details..." required>
                                    <div class="invalid-feedback">
                                        Stock Details empty
                                    </div>

                            <label for="Stockdetails">Date :</label>
                                <input type="number" class="form-control" id="Stockdetails" placeholder="Enter number..." readonly>
                                    <div class="invalid-feedback">
                                        Quantity empty
                                    </div>

                            <label for="Stockdetails">Quantity</label>
                            <input type="button" class="btn btn-primary" value="IN" id="" style="float:center"><input type="button" class="btn btn-primary" id="" value="OUT"><br>
                                <input type="number" class="form-control" id="Stockdetails" placeholder="Enter number..." required>
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
      
                    <div class="modal-footer">
                        <button type="button" class="btn btn-failed" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>