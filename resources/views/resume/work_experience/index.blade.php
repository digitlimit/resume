@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">

        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @include('alert::form')

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
                            <th> </th>
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
                                <td>
                                    <a href="{{route('resume.work_experience.destroy', [
                                        'work_experience' => $work_experience->id
                                    ])}}"
                                            class="btn btn-danger btn-sm">
                                        <i class="ion ion-md-trash"></i>
                                    </a>
                                    <a href="{{route('resume.work_experience.edit', [
                                        'work_experience' => $work_experience->id
                                    ])}}"
                                       class="btn btn-success btn-sm">
                                        <i class="ion ion-md-paper"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{route('resume.work_experience.create')}}" class="btn btn-success">
                        <i class="ion ion-md-add-circle"></i>
                        Add New
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection