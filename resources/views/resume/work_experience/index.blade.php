@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Horizontal Form</h4>--}}

                    <form action="{{route('resume.work_experience.store')}}" method="post">

                        @csrf

                        @include('alert::form')

                        <div class="form-group row">
                            <label for="job_title" class="col-sm-3 col-form-label">
                                Job Title
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="job_title" id="job_title"
                                       placeholder="Enter Job Title">
                                @include('alert::field', ['field'=>'job_title', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job_description" class="col-sm-3 col-form-label">
                                Job Description
                            </label>
                            <div class="col-sm-9">
                                <div class="quill-textarea"></div>
                                <textarea style="display: none"  name="job_description"
                                          id="job_description"></textarea>
                                @include('alert::field', ['field'=>'job_description', 'tag'=>''])
                            </div>
                            <div style="clear: both;"></div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">
                                Start Date
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="start_month"
                                       id="start_month" placeholder="Month">
                                @include('alert::field', ['field'=>'start_month', 'tag'=>''])
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="start_year"
                                       id="start_year" placeholder="Year">
                                @include('alert::field', ['field'=>'start_year', 'tag'=>''])
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">
                                End Date
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="end_month"
                                       id="end_month" placeholder="Month">
                                @include('alert::field', ['field'=>'end_month', 'tag'=>''])
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="end_year"
                                       id="end_year" placeholder="Year">
                                @include('alert::field', ['field'=>'end_year', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_name" class="col-sm-3 col-form-label">
                                Company Name
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="company_name"
                                       id="company_name" placeholder="Enter Company Name">
                                @include('alert::field', ['field'=>'company_name', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_info" class="col-sm-3 col-form-label">
                                Company Info
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="company_info"
                                       id="company_info" placeholder="Enter Company Info">
                                @include('alert::field', ['field'=>'company_info', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_address" class="col-sm-3 col-form-label">
                                Company Address
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="company_address"
                                       id="company_address" placeholder="Enter Company Address">
                                @include('alert::field', ['field'=>'company_address', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="icon" class="col-sm-3 col-form-label">
                                Icon Class (Optional)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="icon"
                                       id="icon" placeholder="Enter Icon Class e.g fa fa-bandcamp">
                                @include('alert::field', ['field'=>'icon', 'tag'=>''])
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        {{--<a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection

@push('footer')
<script>
    window.onload = function(){

        var quill = new Quill('.quill-textarea', {
            placeholder: 'Enter Job Description',
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }]
                ]
            }
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#job_description').val(quill.container.firstChild.innerHTML);
        });
    }
</script>
@endpush

