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

                        {{--'title',--}}
                        {{--'detail',--}}
                        {{--'url',--}}
                        {{--'icon'--}}

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">
                                Title (Optional)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detail" class="col-sm-3 col-form-label">
                                Detail
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="detail" id="detail" placeholder="Enter Detail">
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
                        <a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection
