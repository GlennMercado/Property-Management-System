<!-- Modal -->
<div class="modal fade" id="Room_ID{{$lists->Room_No}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Maintenance</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card-body bg-white" style="border-radius: 18px">
                                                            
                                                            <p class="text-left">Status </p>
                                                            <select class="form-control" name="status">
                                                                <option selected="true" disabled="disabled">---Choose Status---</option>
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>

                                                            <p class="text-left">Description: </p>
                                                            <input class="form-control" type="text" name="desc" required>
                                                            
                                                            <p class="text-left">Asset: </p>
                                                            <input class="form-control" type="text" name="asset" required>
                                                            
                                                            <p class="text-left">Location: </p>
                                                            <input class="form-control" type="text" name="location" required>

                                                            <p class="text-left">Due Date: </p>
                                                            <input class="form-control" type="date" name="due" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>