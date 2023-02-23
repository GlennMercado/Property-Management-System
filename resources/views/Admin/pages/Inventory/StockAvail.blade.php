<!--Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Finance Proof</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/addinfo') }}" class="prevent_submit" method="POST">
                        {{ csrf_field() }}
                    <div class="modal-body">
                        <div class = "row">
                            <div class = "col">
                                <p class="text-left">OR Number : </p>
                                <input type="text" class="form-control" name="or" placeholder="Enter name..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Payee : </label>
                                <input type="email" class="form-control" name="payee" placeholder="Enter details..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Particular: </label>
                                <input type="number" class="form-control" name="particular" placeholder="Enter number..." required>
                                <select class="form-control" value="{{ $lists->status}}" name="status" required>
                                    <option>Court Rental</option>
                                    <option>Court Rental/League</option>
                                    <option>Venue Rental</option>
                                    <option>Kiosk Rental</option>
                                    <option>Food Stall</option>
                                    <option>Hotel</option>
                                    <option>Hotel Other Charges</option>
                                    <option>Function Room</option>
                                    <option>Function Room/Hotel</option>
                                    <option>Funciton Room/Others</option>
                                    <option>Management Fee</option>
                                    <option>Convention Center</option>
                                    <option>Convention Center/Hot</option>
                                    <option>Zumba</option>
                                    <option>Event Registration</option>
                                    <option>Parking Rental</option>
                                    <option>Commercial Space</option>
                                    <option>Electrical Charge</option>
                                    <option>Space Rental</option>
                                    <option>Other Charges</option>
                                 </select>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Debit Type: </label>
                                <input type="number" class="form-control" name="debit" placeholder="Enter number..." required>
                                <select class="form-control" value="{{ $lists->status}}" name="status" required>
                                    <option>Cash/GCash</option>
                                    <option>Unearned Income (DP from Previous Months)</option>
                                    <option>Bank Transfer/Direct to Bank</option>
                                    <option>Cheque</option>
                                 </select>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Amount: </label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter number..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Event Date: </label>
                                <input type="number" class="form-control" name="eventdate" placeholder="Enter number..." required>
                            </div>
                        </div>                           
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />                      
                    </div>
                </form>         
            </div>
        </div>
    </div>