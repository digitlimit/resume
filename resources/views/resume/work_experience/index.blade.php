@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">

        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Job Title
                                    </label>
                                </div>
                            </th>
                            <th> Company </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($work_experiences as $work_experience)
                            <tr>
                                <th>
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            {{$work_experience->job_title}}
                                        </label>
                                    </div>
                                </th>
                                <td>{{$work_experience->company_name}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection