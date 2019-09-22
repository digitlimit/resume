@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Horizontal Form</h4>--}}

                    <form action="{{route('resume.social.store')}}" method="post">

                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">
                                Name (Optional)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name"
                                       id="name" placeholder="Enter Name">
                                @include('alert::field', ['field'=>'name', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-sm-3 col-form-label">
                                URL
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="url"
                                       id="url" placeholder="Enter URL">
                                @include('alert::field', ['field'=>'url', 'tag'=>''])
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
