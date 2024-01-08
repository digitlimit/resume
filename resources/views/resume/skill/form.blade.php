<div class="form-group row">
    <label for="title" class="col-sm-3 col-form-label">
        Title
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="title"
               value="{{old('title', optional($skill)->title)}}"
               id="title" placeholder="Enter Title">
{{--        @include('alert::field', ['field'=>'title', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="detail" class="col-sm-3 col-form-label">
        Detail
    </label>
    <div class="col-sm-9">
        <div class="quill-textarea">
            {{old('detail', optional($skill)->detail)}}
        </div>
        <textarea style="display: none" id="detail" name="detail">
            {{old('detail', optional($skill)->detail)}}
        </textarea>
{{--        @include('alert::field', ['field'=>'detail', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="percentage" class="col-sm-3 col-form-label">
        Percentage
    </label>
    <div class="col-sm-9">
        <input type="number"
               value="{{old('percentage', optional($skill)->percentage)}}"
               class="form-control" name="percentage"
               id="percentage" placeholder="Enter Percentage">
{{--        @include('alert::field', ['field'=>'percentage', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="years" class="col-sm-3 col-form-label">
        Years
    </label>
    <div class="col-sm-9">
        <input type="number"
               value="{{old('years', optional($skill)->years)}}"
               class="form-control" name="years"
               id="years" placeholder="Enter Years">
{{--        @include('alert::field', ['field'=>'years', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="icon" class="col-sm-3 col-form-label">
        Icon Class
    </label>
    <div class="col-sm-9">
        <input type="text"
               value="{{old('icon', optional($skill)->icon)}}"
               class="form-control" name="icon"
               id="icon" placeholder="Enter Icon Class e.g fa fa-bandcamp">
{{--        @include('alert::field', ['field'=>'icon', 'tag'=>''])--}}
    </div>
</div>

<button type="submit" class="btn btn-success mr-2">Submit</button>
{{--                        <a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}


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
