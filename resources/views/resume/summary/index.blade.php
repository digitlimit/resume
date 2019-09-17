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
                            <label for="title" class="col-sm-3 col-form-label">
                                Title (Optional)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                @include('common.partials.alert', ['field'=>'title', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="icon" class="col-sm-3 col-form-label">
                                Icon Class (Optional)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="icon" id="icon" placeholder="Enter Icon Class e.g fa fa-bandcamp">
                                @include('common.partials.alert', ['field'=>'icon', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detail" class="col-sm-3 col-form-label">
                                Detail
                            </label>
                            <div class="col-sm-9">
                                <input class="sm" name="detail" id="detail" placeholder="Enter Detail">
                                @include('common.partials.alert', ['field'=>'detail', 'tag'=>''])
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
