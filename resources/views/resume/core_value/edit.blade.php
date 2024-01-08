@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('resume.core_value.update',[
                        'core_value' => $core_value
                    ])}}" method="post">

                        @csrf

                        @method('PUT')

{{--                        @include('alert::form')--}}

                        @include('resume.core_value.form')

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection
