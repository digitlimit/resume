@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">

        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @include('alert::form')

                    <h4 class="card-title">{{$message->subject}}</h4>
                    <p class="card-description">
                        {{$message->message}}
                    </p>

                    @if($message->other_info)
                        <p class="card-description">
                            {{$message->other_info}}
                        </p>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <p class="font-weight-bold">{{$message->name}}</p>
                                @if($message->country)<p>Country: {{$message->country}}, </p>@endif
                                <p>Received: {{$message->created_at->diffForHumans()}} </p>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address class="text-primary">
                                <p class="font-weight-bold"> E-mail </p>
                                <p class="mb-2"> {{$message->email}} </p>
                                <p class="font-weight-bold"> IP Address </p>
                                <p> {{$message->ip_address}} </p>
                            </address>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                   <div class="row">
                       <div class="col-9">
                           <a href="{{route('common.message.getReply', ['message' => $message->id])}}" class="btn btn-success">
                               <i class="ion ion-md-repeat"></i> Reply
                           </a>
                           <a href="{{route('common.message.destroy', ['message' => $message->id])}}" class="btn btn-danger">
                               <i class="ion ion-md-trash"></i> Delete
                           </a>
                       </div>
                       <div class="col-3">
                           <a href="{{route('common.message.index', ['message' => $message->id])}}" class="btn btn-info">
                               <i class="ion ion-md-list-box"></i> Messages
                           </a>
                       </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection