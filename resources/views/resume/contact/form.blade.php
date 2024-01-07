<div class="form-group row">
    <label for="address_1" class="col-sm-3 col-form-label">
        Address 1
    </label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="address_1"
               value="{{old('address_1', optional($contact)->address_1)}}"
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
               value="{{old('address_2', optional($contact)->address_2)}}"
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
               value="{{old('phone_number', optional($contact)->phone_number)}}"
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
               value="{{old('mobile_number', optional($contact)->mobile_number)}}"
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
               value="{{old('email', optional($contact)->email)}}"
               id="email" placeholder="Enter Email">
        @include('alert::field', ['field'=>'email', 'tag'=>''])
    </div>
</div>

<button type="submit" class="btn btn-success mr-2">Submit</button>
{{--<a href="{{route('admin.index')}}" class="btn btn-light">Cancel</a>--}}