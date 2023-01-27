  <!-- Category Edit Modal -->
  <div class="modal fade" id="modal-edit-contact{{ $message->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editontactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryLabel">View Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label mt-1">Name :</label>
                            <div class="col-sm-10">
                            <input type="text"
                                class="form-control"
                                 id="datepicker" value="{{ old('name', $message->name) }}"
                                 readonly></div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label mt-1">Email :</label>
                            <div class="col-sm-10">
                            <input type="text"
                                class="form-control"
                                 id="datepicker" value="{{ old('name', $message->email) }}"
                                 readonly></div>
            
                        </div>
                        <div class="form-group row" >
                            <label class="col-sm-2 control-label mt-1">Subject :</label>
                            <div class="col-sm-10">
                            <input type="text"
                                class=" form-control"
                                id="datepicker" value="{{ old('name', $message->subject) }}"
                                readonly></div>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label ">Message :</label>
                            <textarea class="form-control" cols="50" rows="20" readonly>{{ old('name', $message->message) }}</textarea>
                            
                        </div>
                    </div><!-- Col -->
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> --}}

        </div>
    </div>
</div>
