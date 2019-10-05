<div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">
        Name
    </label>
    <div class="col-sm-9">
        <input type="text"
               value="{{old('name', optional($social)->name)}}"
               class="form-control" name="name"
               id="name" placeholder="Enter Name">
        @include('alert::field', ['field'=>'name', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-sm-3 col-form-label">
        URL
    </label>
    <div class="col-sm-9">
        <input  value="{{old('url', optional($social)->url)}}"
                type="text" class="form-control" name="url"
               id="url" placeholder="Enter URL">
        @include('alert::field', ['field'=>'url', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="icon" class="col-sm-3 col-form-label">
        Icon Class
    </label>
    <div class="col-sm-9">
        <input  value="{{old('icon', optional($social)->icon)}}"
                type="text" class="form-control" name="icon"
               id="icon" placeholder="Enter Icon Class e.g fa fa-bandcamp">
        @include('alert::field', ['field'=>'icon', 'tag'=>''])
    </div>
</div>

<button type="submit" class="btn btn-success mr-2">Submit</button>
{{--<a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}