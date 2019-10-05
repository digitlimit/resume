<div class="form-group row">
    <label for="job_title" class="col-sm-3 col-form-label">
        Job Title
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="job_title" id="job_title"
               value="{{old('job_title', optional($work_experience)->job_title)}}"
               placeholder="Enter Job Title">
        @include('alert::field', ['field'=>'job_title', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="job_description" class="col-sm-3 col-form-label">
        Job Description
    </label>
    <div class="col-sm-9">
        <div class="quill-textarea">
            {{old('job_description', optional($work_experience)->job_description)}}
        </div>
          <textarea style="display: none"
                    name="job_description" id="job_description">
              {{old('job_description', optional($work_experience)->job_description)}}
          </textarea>
        @include('alert::field', ['field'=>'job_description', 'tag'=>''])
    </div>
</div>

<div style="clear:left;"></div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">
        Start Date
    </label>
    <div class="col-sm-5">

        <select name="start_month" id="start_month" class="form-control">
            <option>Month</option>
            @foreach(trans('options.months') as $name => $value)
                <option
                        {{selected_option(old('start_month', optional($work_experience)->start_month), $value)}}
                        value="{{$value}}">{{$name}}</option>
            @endforeach
        </select>

        @include('alert::field', ['field'=>'start_month', 'tag'=>''])
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="start_year"
               value="{{old('start_year', optional($work_experience)->start_year)}}"
               id="start_year" placeholder="Year">
        @include('alert::field', ['field'=>'start_year', 'tag'=>''])
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-3 col-form-label">
        End Date
    </label>
    <div class="col-sm-5">
        <select name="end_month" id="end_month" class="form-control">
            <option>Month</option>
            @foreach(trans('options.months') as $name => $value)
                <option
                        {{selected_option(old('end_month', optional($work_experience)->end_month), $value)}}
                        value="{{$value}}">{{$name}}</option>
            @endforeach
        </select>

        @include('alert::field', ['field'=>'end_month', 'tag'=>''])
    </div>

    <div class="col-sm-4">
        <input type="text" class="form-control" name="end_year"
               value="{{old('end_year', optional($work_experience)->end_year)}}"
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
               value="{{old('company_name', optional($work_experience)->company_name)}}"
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
               value="{{old('company_info', optional($work_experience)->company_info)}}"
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
               value="{{old('company_address', optional($work_experience)->company_address)}}"
               id="company_address" placeholder="Enter Company Address">
        @include('alert::field', ['field'=>'company_address', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="icon" class="col-sm-3 col-form-label">
        Icon Class
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="icon"
               value="{{old('icon', optional($work_experience)->icon)}}"
               id="icon" placeholder="Enter Icon Class e.g fa fa-bandcamp">
        @include('alert::field', ['field'=>'icon', 'tag'=>''])
    </div>
</div>

<button type="submit" class="btn btn-success mr-2">Submit</button>
{{--<a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}


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