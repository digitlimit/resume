@inject('imageHelper', 'App\Helpers\Image')

<div class="form-group row">
    <label for="title" class="col-sm-3 col-form-label">
        Title
    </label>
    <div class="col-sm-9">
        <input  value="{{old('title', optional($portfolio)->title)}}"
                type="text" class="form-control" name="title"
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
            {{old('detail', optional($portfolio)->detail)}}
        </div>
        <textarea style="display: none" id="detail" name="detail">
            {{old('detail', optional($portfolio)->detail)}}
        </textarea>
{{--        @include('alert::field', ['field'=>'detail', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-3 col-form-label">
        URL
    </label>
    <div class="col-sm-9">
        <input value="{{old('url', optional($portfolio)->url)}}"
                type="text" class="form-control" name="url"
               id="url" placeholder="Enter URL">
{{--        @include('alert::field', ['field'=>'url', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="icon" class="col-sm-3 col-form-label">
        Icon Class
    </label>
    <div class="col-sm-9">
        <input value="{{old('icon', optional($portfolio)->icon)}}"
                type="text" class="form-control" name="icon"
               id="icon" placeholder="Enter Icon Class e.g fa fa-bandcamp">
{{--        @include('alert::field', ['field'=>'icon', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="other_names" class="col-sm-3 col-form-label">
        Profile Photo
    </label>
    <div class="col-sm-9">

        <?php
        $photo = optional($me->profile)->image ? optional($me->profile)->image->name : '';
        ?>

        <img id="photo-preview" style="display: {{$photo ? 'block' : 'none'}}"
             class="img-fluid" src="{{$imageHelper->profile($photo)}}" />

        <div class="input-group">
            <div class="custom-file">
                <label class="custom-file-label" for="photo">
                    <input type="file" class="custom-file-input" name="photo" id="photo">
                </label>
            </div>
        </div>

{{--        @include('alert::field', ['field'=>'photo', 'tag'=>''])--}}
    </div>
</div>


<button type="submit" class="btn btn-success mr-2">Submit</button>
{{--<a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}

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

        $('#photo').change(function()
        {
            if($(this)[0] && $(this)[0].files && $(this)[0].files[0])
            {
                var photo =  $(this)[0].files[0];

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photo-preview').show();
                    $('#photo-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(photo);
            }
        });
    }
</script>
@endpush
