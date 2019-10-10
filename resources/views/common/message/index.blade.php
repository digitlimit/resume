@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">

        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @include('alert::form')

                    @if($messages->count())
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            Subject
                                        </label>
                                    </div>
                                </th>
                                <th> Email </th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($messages as $message)
                                <tr>
                                    <th>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                <a href="{{route('common.message.getMessage', ['message' => $message->id])}}">
                                                    {{Str::limit($message->subject, 35)}}
                                                </a>
                                            </label>
                                        </div>
                                    </th>
                                    <td>{{Str::limit($message->email, 15)}}</td>
                                    <td>
                                        <a href="{{route('common.message.destroy', [
                                        'message' => $message->id
                                    ])}}"
                                           class="btn btn-danger btn-sm">
                                            <i class="ion ion-md-trash"></i>
                                        </a>
                                        <a href="{{route('common.message.getReply', [
                                        'message' => $message->id
                                    ])}}"
                                           class="btn btn-success btn-sm">
                                            <i class="ion ion-md-repeat"></i>
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
                    <a href="{{route('common.message.getCompose')}}" class="btn btn-success">
                        <i class="ion ion-md-add-circle"></i>
                        Compose
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection