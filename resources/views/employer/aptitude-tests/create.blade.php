@extends('employer.layouts.app')
@section('content')
    @component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Aptitude Test Create</h6>
                    <form method="POST" action="{{ route('employer.aptitude-tests.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Job <span class="text-danger">*</span></label>
                                    <select name="job_id"
                                        class="text-dark form-control @if ($errors->has('job_id')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Select option...</option>
                                        @foreach ($jobs as $job)
                                            <option value="{{ $job->id }}"
                                                {{ old('job_id') == $job->id ? 'selected' : '' }}>
                                                {{ $job->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Category <span class="text-danger">*</span></label>
                                    <select name="category_id"
                                        class="text-dark form-control @if ($errors->has('category_id')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Select option...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Question <span class="text-danger">*</span></label>
                                    <textarea name="question" class="form-control @if ($errors->has('question')) is-invalid @endif" cols="30"
                                        rows="5">{{ old('question') }}</textarea>
                                    <div class="invalid-feedback">{{ $errors->first('question') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        {{-- <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Option One <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('option_one')) is-invalid @endif"
                                        name="option_one" value="{{ old('option_one') }}" placeholder="Enter option one"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('option_one') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Option Two <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('option_one')) is-invalid @endif"
                                        name="option_two" value="{{ old('option_one') }}" placeholder="Enter option two"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('option_one') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Option Three <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('option_three')) is-invalid @endif"
                                        name="option_three" value="{{ old('option_three') }}"
                                        placeholder="Enter option three" required>
                                    <div class="invalid-feedback">{{ $errors->first('option_three') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Option Four <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('option_four')) is-invalid @endif"
                                        name="option_four" value="{{ old('option_four') }}" placeholder="Enter option four"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('option_four') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Answer <span class="text-danger">*</span></label>
                                    <select name="answer" class="text-dark form-control @if ($errors->has('answer')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Select option...</option>
                                        <option value="option_one">Option One</option>
                                        <option value="option_two">Option Two</option>
                                        <option value="option_three">Option Three</option>
                                        <option value="option_four">Option Four</option>
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('answer') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row --> --}}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Question Type <span class="text-danger">*</span></label>
                                    <select id="answerType" name="questionType"
                                        class="text-dark form-control @if ($errors->has('questionType')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Select option...</option>
                                        <option value="radio">Options</option>
                                        <option value="checkbox">Multiple Options</option>
                                        <option value="text">Text Box</option>
                                        {{-- <option value="">Option Four</option> --}}
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('questionType') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="showContainer" style="display: none;">
                            <div class="radioSection">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control ansRadio" id="ansRadio"
                                                name="radioOption[0][answer]" placeholder="Option">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="checkbox" class="form-control ansRadio" id="ansRadio"
                                                name="radioOption[0][correctOption]" value="1">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary" id="addRadioBtn" type="button">Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="checkboxSection">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control ansCheckbox" id="ansCheckbox"
                                                name="checkboxOption[0][answer]" placeholder="Option">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="checkbox" class="form-control ansCheckbox" id="ansCheckbox"
                                                name="checkboxOption[0][correctOption]" value="1">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary" id="addCheckBoxBtn" type="button">Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="textboxSection">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="textOption" class="form-control" placeholder="Enter your answer">
                                        </div>
                                    </div><!-- Col -->
                                </div>
                            </div>
                        </div>

                        <div class="show_item">
                            <div class="row ansRadio" id="ansRadio" style="display: none">
                                {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="option[]" value="Radio Button">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <button class="btn btn-primary" id="addRadioBtn" type="button">Add new Row </button>
                            </div> --}}




                            </div><!-- Row -->
                        </div>
                        <div class="row" id="ansCheckbox" style="display: none">
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control " value="Check Box">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <button class="btn btn-primary" id="addCheckBoxBtn" type="button">Add new Row </button>
                            </div> --}}
                        </div><!-- Row -->
                        <div class="row" id="ansText" style="display: none">
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  value="Text Field">
                                </div>
                            </div><!-- Col --> --}}
                        </div><!-- Row -->


                        <button type="submit" class="btn btn-primary submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom_css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="{{ asset('admin_assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">
    <style>
        .ui-datepicker-title {
            display: flex;
        }

        .tagsinput {
            border: 1px solid;
        }

        div.tagsinput span.tag {
            margin: 5px;
        }

        .showContainer {
            border: solid 1px #bbbbbb;
            padding: 15px 15px 15px;
            margin-bottom: 5px;
        }
    </style>
@endpush
@push('custom_js')
    <script src="{{ asset('admin_assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/tinymce.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="{{ asset('admin_assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script>
        $(function() {

            var radioRow = 1;
            var checkboxRow = 1;
            $("#deadline").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-3:+2",
                dateFormat: "dd-mm-yy"
            });
            $("#scheduleDate").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-3:+2",
                dateFormat: "dd-mm-yy"
            });

            $('#skills').tagsInput({
                'width': '100%',
                'height': '75%',
                'interactive': true,
                'defaultText': 'Add More',
                'removeWithBackspace': true,
                'minChars': 0,
                'maxChars': 20,
                'placeholderColor': '#666666'
            });

            $('#answerType').change(function() {
                let value = $(this).val();
                // alert(value); 
                $(".textboxSection, .checkboxSection, .radioSection").hide();
                // $(".textboxSection, .checkboxSection, .radioSection").html('');
                radioRow = 1;
                checkboxRow = 1;
                $('.singleRadioRow, .singleCheckboxRow').remove();
                // $('.class-name').remove();

                $(".showContainer").show();
                if (value == "radio") {
                    $(".radioSection").show();
                }
                if (value == "checkbox") {
                    $(".checkboxSection").show();
                }
                if (value == "text") {
                    $(".textboxSection").show();
                }
                // $(".show_item").show();
                // if ($('#answerType').val() == 'radio') {
                //     $('#ansRadio').removeAttr('style');
                //     $('#ansCheckbox').css({'display': 'none'});
                //     $('#ansText').css({'display': 'none'});
                // }else if ($('#answerType').val() == 'checkbox') {
                //     $('#ansCheckbox').removeAttr('style');
                //     $('.ansRadio').css({'display': 'none'});
                //     $('#ansText').css({'display': 'none'});
                // }else if ($('#answerType').val() == 'text'){
                //     $('#ansText').removeAttr('style');
                //     $('#ansCheckbox').css({'display': 'none'});
                //     $('.ansRadio').css({'display': 'none'});
                // }
            });

            var i = 1;
            var max_fields = 4; //maximum input boxes allowed
            $('#addRadioBtn').click(function(e) {
                e.preventDefault();
                console.log({dd:radioRow});
                
                if (radioRow < max_fields) {
                    $('.radioSection').prepend(`<div class="row singleRadioRow">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control " id="ansRadio" name="radioOption[${i}][answer]" placeholder="Option">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control ansRadio" id="ansRadio" name="radioOption[${i}][correctOption]" value="1">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-danger" id="removeRadioBtn" type="button">Remove</button>
                            </div>
                    </div>`);
                    radioRow++;
                    i++;
                }

            });
            $(document).on('click', '#removeRadioBtn', function(e) {
                e.preventDefault();
                let row_items = $(this).parent().parent();
                $(row_items).remove();
                radioRow--;
                console.log({after:radioRow});
            });

            var j = 1;
            var max_fields = 4; //maximum input boxes allowed
            $('#addCheckBoxBtn').click(function(e) {
                e.preventDefault();
                if (checkboxRow < max_fields) {
                    $('.checkboxSection').prepend(`<div class="row singleCheckboxRow">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control ansCheckbox" id="ansCheckbox" name="checkboxOption[${j}][answer]" placeholder="Option">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control ansCheckbox" id="ansCheckbox" name="checkboxOption[${j}][correctOption]" value="1">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-danger" id="removeCheckboxBtn" type="button">Remove</button>
                            </div>
                    </div>`);
                    checkboxRow++;
                    j++;
                }

            });
            $(document).on('click', '#removeCheckboxBtn', function(e) {
                e.preventDefault();
                let row_items = $(this).parent().parent();
                $(row_items).remove();
                checkboxRow--;
            });
        });

        // $("#checkbox1, #checkbox2").change(function(){
        //     if ($("#checkbox1").is(":checked")) {
        //         $("#checkbox2").prop("checked", false);
        //     } else {
        //         $("#checkbox2").prop("checked", true);
        //     }
        // });

    </script>
@endpush
