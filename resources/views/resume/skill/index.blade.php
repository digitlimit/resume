@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">

        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @include('alert::form')

                    @if($skills->count())
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            Title
                                        </label>
                                    </div>
                                </th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($skills as $skill)
                                <tr>
                                    <th>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                {{$skill->title}}
                                            </label>
                                        </div>
                                    </th>
                                    <td>
                                        <a href="{{route('resume.skill.destroy', [
                                        'skill' => $skill->id
                                    ])}}"
                                           class="btn btn-danger btn-sm">
                                            <i class="ion ion-md-trash"></i>
                                        </a>
                                        <a href="{{route('resume.skill.edit', [
                                        'skill' => $skill->id
                                    ])}}"
                                           class="btn btn-success btn-sm">
                                            <i class="ion ion-md-paper"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @else
                        There is nothing here
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{route('resume.skill.create')}}" class="btn btn-success">
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