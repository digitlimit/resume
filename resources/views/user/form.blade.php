<div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label">
        Email
    </label>
    <div class="col-sm-9">
        <input @if(optional($user)->email)disabled="disabled"@endif
               value="{{old('email', optional($user)->email)}}"
                type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
        @include('common.partials.alert', ['field'=>'email', 'tag'=>''])
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-sm-3 col-form-label">
        Password
    </label>
    <div class="col-sm-9">
        <input value=""
                type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
        @include('common.partials.alert', ['field'=>'password', 'tag'=>''])
    </div>
</div>

<button type="submit" class="btn btn-success mr-2">Submit</button>
{{--                        <a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}

