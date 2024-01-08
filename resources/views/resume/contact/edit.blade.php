@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('resume.contact.update')}}" method="post">

                        @csrf

                        @method('PUT')

{{--                        @include('alert::form')--}}

                        @include('resume.contact.form')

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
