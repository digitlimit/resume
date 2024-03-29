<div class="form-group row">
    <label for="degree" class="col-sm-3 col-form-label">
        Degree
    </label>
    <div class="col-sm-9">
        <input value="{{old('degree', optional($education)->degree)}}"
                type="text" class="form-control" name="degree" id="degree" placeholder="Enter Degree">
        @include('common.partials.alert', ['field'=>'degree', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="gpa" class="col-sm-3 col-form-label">
        GPA
    </label>
    <div class="col-sm-9">
        <input value="{{old('gpa', optional($education)->gpa)}}"
                type="text" class="form-control" name="gpa" id="gpa" placeholder="Enter GPA">
        @include('common.partials.alert', ['field'=>'gpa', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">
        Start Date
    </label>
    <div class="col-sm-5">
        <select name="start_month" id="start_month" class="form-control">
            <option>Month</option>
            @foreach(trans('options.months') as $name => $value)
                <option {{selected_option(old('start_month', optional($education)->start_month), $value)}}
                        value="{{$value}}">{{$name}}</option>
            @endforeach
        </select>
        @include('common.partials.alert', ['field'=>'start_month', 'tag'=>''])
    </div>
    <div class="col-sm-4">
        <input type="number" maxlength="4" pattern="\d*"
               value="{{old('start_year', optional($education)->start_degree)}}"
               class="form-control" name="start_year" id="start_year" placeholder="Year">
        @include('common.partials.alert', ['field'=>'start_year', 'tag'=>''])
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
                <option {{selected_option(old('end_month', optional($education)->end_month), $value)}}
                        value="{{$value}}">{{$name}}</option>
            @endforeach
        </select>
        @include('common.partials.alert', ['field'=>'end_month', 'tag'=>''])
    </div>
    <div class="col-sm-4">
        <input type="number" maxlength="4" pattern="\d*"
               value="{{old('end_year', optional($education)->end_year)}}"
               class="form-control" name="end_year" id="end_year" placeholder="Year">
        @include('common.partials.alert', ['field'=>'end_year', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="school_name" class="col-sm-3 col-form-label">
        School Name
    </label>
    <div class="col-sm-9">
        <input type="text"
               value="{{old('school_name', optional($education)->school_name)}}"
               class="form-control" name="school_name" id="school_name" placeholder="Enter School Name">
        @include('common.partials.alert', ['field'=>'school_name', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="school_info" class="col-sm-3 col-form-label">
        School Info
    </label>
    <div class="col-sm-9">
        <input type="text"
               value="{{old('school_info', optional($education)->school_info)}}"
               class="form-control" name="school_info" id="school_info" placeholder="Enter School Info">
        @include('common.partials.alert', ['field'=>'school_info', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="school_address" class="col-sm-3 col-form-label">
        School Address
    </label>
    <div class="col-sm-9">
        <input type="text"
               value="{{old('school_address', optional($education)->school_address)}}"
               class="form-control" name="school_address" id="school_address" placeholder="Enter School Address">
        @include('common.partials.alert', ['field'=>'school_address', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="icon" class="col-sm-3 col-form-label">
        Icon Class
    </label>
    <div class="col-sm-9">
        <input type="text"
               value="{{old('icon', optional($education)->icon)}}"
               class="form-control" name="icon" id="icon" placeholder="Enter Icon Class e.g fa fa-bandcamp">
        @include('common.partials.alert', ['field'=>'icon', 'tag'=>''])
    </div>
</div>

<button type="submit" class="btn btn-success mr-2">Submit</button>
{{--                        <a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}

