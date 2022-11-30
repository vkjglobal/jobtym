  <!-- Category Edit Modal -->
  <div class="modal fade" id="modal-edit-categories{{ $category->id }}" tabindex="-1" role="dialog"
      aria-labelledby="editCategoryLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label class="control-label">Category Name <span class="text-danger">*</span></label>
                              <input type="text"
                                  class="form-control @if ($errors->has('name')) is-invalid @endif"
                                  name="name" id="datepicker" value="{{ old('name', $category->name) }}"
                                  placeholder="Enter Category Name" required>
                              <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                          </div>
                      </div><!-- Col -->
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
