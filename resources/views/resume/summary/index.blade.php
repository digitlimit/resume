@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Horizontal Form</h4>--}}

                    <form action="{{route('resume.summary.store')}}" method="post">

                        @csrf

                        @include('alert::form')

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">
                                Title (Optional)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title"
                                       id="title" placeholder="Enter Title">
                                @include('alert::field', ['field'=>'title', 'tag'=>''])
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

                        <div class="form-group row">
                            <label for="detail" class="col-sm-3 col-form-label">
                                Detail
                            </label>
                            <div class="col-sm-9">
                                <div class="quill-textarea"></div>
                                <textarea style="display: none" id="detail" name="detail"></textarea>
                                @include('alert::field', ['field'=>'detail', 'tag'=>''])
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
