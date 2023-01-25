@extends('employer.layouts.app')

@section('content')

<!-- Page Heading -->

<div class="card-header py-3 d-flex">
    <h6 class="m-0">
        {{ __('Result') }}
    </h6>
</div>

<div class="container-fluid">

   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                {{-- <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('result') }}
                </h6> --}}
                <div class="ml-auto">
                    <a href="{{ route('employer.results.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New result') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable datatable-result" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                {{-- <th width="10">

                                </th> --}}
                                <th>No</th>
                                <th>User</th>
                                <th>Points</th>
                                <th>Questions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($results as $result)
                            <tr data-entry-id="{{ $result->id }}">
                                {{-- <td>

                                </td> --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->user->first_name }}</td>
                                <td>{{ $result->total_points }}</td>
                                <td>
                                    @foreach($result->questions as $key => $question)
                                        <span class="badge badge-info">{{ $question->question_text }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('employer.results.show', $result->id) }}" class="text-success ml-2">
                                            <i data-feather="eye"></i>
                                        </a>
                                        <a href="{{ route('employer.results.edit', $result->id) }}" class="text-warning ml-2">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('employer.results.destroy', $result->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="text-danger ml-2" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i data-feather="trash"></i>
                                            </button>
                                        </form>
                                    </div>
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
  $('.datatable-result:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush