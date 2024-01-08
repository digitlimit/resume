@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form enctype="multipart/form-data" action="{{route('common.profile.store')}}" method="post">

                        @csrf



                        @include('common.profile.form')
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection
