@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('resume.contact.store')}}" method="post">

                        @csrf

                        @include('alert::form')

                        <div class="form-group row">
                            <label for="address_1" class="col-sm-3 col-form-label">
                                Address 1
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address_1"
                                       id="address_1" placeholder="Enter Address 1">
                                @include('alert::field', ['field'=>'address_1', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_2" class="col-sm-3 col-form-label">
                                Address 2
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address_2"
                                       id="address_2" placeholder="Enter Address 2">
                                @include('alert::field', ['field'=>'address_2', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-3 col-form-label">
                                Phone number
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone_number"
                                       id="phone_number" placeholder="Enter Phone number">
                                @include('alert::field', ['field'=>'phone_number', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_number" class="col-sm-3 col-form-label">
                                Mobile number
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="mobile_number"
                                       id="mobile_number" placeholder="Enter Mobile number">
                                @include('alert::field', ['field'=>'mobile_number', 'tag'=>''])
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">
                                Email
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email"
                                       id="email" placeholder="Enter Email">
                                @include('alert::field', ['field'=>'email', 'tag'=>''])
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

@push('footer')
<script>
    window.onload = function(){

        var quill = new Quill('.quill-textarea', {
            placeholder: 'Enter Detail',
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }]
                ]
            }
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#detail').val(quill.container.firstChild.innerHTML);
        });
    }
</script>
@endpush
