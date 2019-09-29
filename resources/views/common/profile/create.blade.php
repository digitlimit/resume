@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('common.profile.store')}}" method="post">

                        @csrf

                        @include('alert::form')

                        @alertHasNoSuccess
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">
                                    Title
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title"
                                           id="title" placeholder="Enter Title">
                                    @include('alert::field', ['field'=>'title', 'tag'=>''])
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="job_title" class="col-sm-3 col-form-label">
                                    Job Title
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="job_title"
                                           id="job_title" placeholder="Enter Job Title">
                                    @include('alert::field', ['field'=>'job_title', 'tag'=>''])
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 col-form-label">
                                    First Name
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="first_name"
                                           id="first_name" placeholder="Enter First Name">
                                    @include('alert::field', ['field'=>'first_name', 'tag'=>''])
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-sm-3 col-form-label">
                                    Last Name
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="last_name"
                                           id="last_name" placeholder="Enter Last Name">
                                    @include('alert::field', ['field'=>'last_name', 'tag'=>''])
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="other_names" class="col-sm-3 col-form-label">
                                    Other names
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="other_names"
                                           id="other_names" placeholder="Enter Other names">
                                    @include('alert::field', ['field'=>'other_names', 'tag'=>''])
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mr-2">Submit</button>
    {{--                        <a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}
                        @endAlertHasNoSuccess
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection