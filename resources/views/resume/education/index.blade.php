@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Horizontal Form</h4>--}}

                    <form action="{{route('resume.summary.store')}}" method="post">

                        @csrf

                        <div class="form-group row">
                            <label for="degree" class="col-sm-3 col-form-label">
                                Degree
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="degree" id="degree" placeholder="Enter Degree">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gpa" class="col-sm-3 col-form-label">
                                GPA
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="gpa" id="gpa" placeholder="Enter GPA">
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
                                        <option value="{{$value}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" maxlength="4" pattern="\d*"
                                       class="form-control" name="start_year" id="start_year" placeholder="Year">
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
                                        <option value="{{$value}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" maxlength="4" pattern="\d*"
                                       class="form-control" name="end_year" id="end_year" placeholder="Year">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school_name" class="col-sm-3 col-form-label">
                                School Name
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="school_name" id="school_name" placeholder="Enter School Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school_info" class="col-sm-3 col-form-label">
                                School Info
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="school_info" id="school_info" placeholder="Enter School Info">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school_address" class="col-sm-3 col-form-label">
                                School Address
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="school_address" id="school_address" placeholder="Enter School Address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="icon" class="col-sm-3 col-form-label">
                                Icon Class (Optional)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="icon" id="icon" placeholder="Enter Icon Class e.g fa fa-bandcamp">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
{{--                        <a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection
