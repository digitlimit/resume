@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('resume.work_experience.update',[
                        'work_experience' => $work_experience
                    ])}}" method="post">

                        @csrf

                        @method('PUT')

                        @include('alert::form')

                        @include('resume.work_experience.form')

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection