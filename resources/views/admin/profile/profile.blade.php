@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Horizontal Form</h4>--}}

                    <form action="{{route('admin.profiles.profile_update')}}" method="post">

                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">
                                Profile Title
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Profile Title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job_title" class="col-sm-3 col-form-label">
                                Job Title
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Enter Job Title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-sm-3 col-form-label">
                                First Name
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-sm-3 col-form-label">
                                Last Name
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="other_name" class="col-sm-3 col-form-label">
                                Other Names
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="other_names" id="other_names" placeholder="Enter Other Names">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection
