@extends('employer.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="card-header py-3 d-flex">
    <h6 class="m-0">
        {{ __('Question') }}
    </h6>
</div>
<div class="container-fluid">

    <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover datatable datatable-question" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10"></th>
                                <th>No</th>
                                <th>Category</th>
                                <th>Question Text</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->category->name }}</td>
                                <td>{{ $question->question_text }}</td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar">
                                        <!-- edit button -->
                                        <div class="btn-group mr-1" role="group">
                                            <a href="{{ route('employer.questions.edit', $question->id) }}"
                                                class="text-warning">
                                                <i data-feather="edit"></i>
                                            </a>
                                        </div>

                                        <!-- delete button -->
                                        <div class="btn-group mr-1" role="group">
                                            <button type="button" class="text-danger"
                                                onclick="event.preventDefault(); if(confirm('Are you sure to delete ?')){
                                                document.getElementById('delete-data-{{ $question->id }}').submit();}">
                                                <i data-feather="trash"></i>
                                            </button>
                                            <form id="delete-data-{{ $question->id }}"
                                                action="{{ route('employer.questions.destroy', $question->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="btn-group mr-1" role="group">
                                        <a href="{{ route('employer.questions.edit', $question->id) }}" class="text-warning">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('employer.questions.destroy', $question->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->
    {!! $questions->withQueryString()->links('pagination::bootstrap-5') !!}

</div>
@endsection

@push('script-alt')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = 'delete selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "#",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });
      if (ids.length === 0) {
        alert('zero selected')
        return
      }
      if (confirm('are you sure ?')) {
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  });
  $('.datatable-question:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush