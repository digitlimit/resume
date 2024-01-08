@inject('imageHelper', 'App\Helpers\Image')

<div class="form-group row">
    <label for="title" class="col-sm-3 col-form-label">
        Title
    </label>
    <div class="col-sm-9">
        <input type="text"
               value="{{old('title', $me?->profile->title)}}"
               class="form-control" name="title"
               id="title" placeholder="Enter Title">
{{--        @include('alert::field', ['field'=>'title', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="job_title" class="col-sm-3 col-form-label">
        Job Title
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="job_title"
               value="{{old('job_title', $me?->profile->job_title)}}"
               id="job_title" placeholder="Enter Job Title">
{{--        @include('alert::field', ['field'=>'job_title', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="first_name" class="col-sm-3 col-form-label">
        First Name
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="first_name"
               value="{{old('first_name', $me?->profile->first_name)}}"
               id="first_name" placeholder="Enter First Name">
{{--        @include('alert::field', ['field'=>'first_name', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="last_name" class="col-sm-3 col-form-label">
        Last Name
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="last_name"
               value="{{old('last_name', $me?->profile->last_name)}}"
               id="last_name" placeholder="Enter Last Name">
{{--        @include('alert::field', ['field'=>'last_name', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="other_names" class="col-sm-3 col-form-label">
        Other names
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="other_names"
               value="{{old('other_names', $me?->profile->other_names)}}"
               id="other_names" placeholder="Enter Other names">
{{--        @include('alert::field', ['field'=>'other_names', 'tag'=>''])--}}
    </div>
</div>

<div class="form-group row">
    <label for="other_names" class="col-sm-3 col-form-label">
        Profile Photo
    </label>
    <div class="col-sm-9">

        <?php
            $photo = $me?->profile->image ? $me?->profile->image->name : '';
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
{{--                        <a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}
{{--@endAlertHasNoSuccess--}}

@push('footer')
<script>
   onload = function() {
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
