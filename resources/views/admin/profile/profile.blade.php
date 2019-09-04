@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Horizontal Form</h4>

                    <form>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">
                                Email
                            </label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">
                                Password
                            </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection
