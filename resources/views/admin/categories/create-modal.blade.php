    <!-- Category Create Modal -->
    <div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="createCategoryLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryLabel">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Category Name <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    name="name" id="datepicker" value="{{ old('name') }}"
                                    placeholder="Enter Category Name" required>
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            </div>
                        </div><!-- Col -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
