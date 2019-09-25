@extends('admin.common.layouts.default')

@section('content')
    @include('admin.common.partials.page_title')

    <div class="row">

        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        First name
                                    </label>
                                </div>
                            </th>
                            <th> Amount </th>
                            <th> Deadline </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        How to
                                    </label>
                                </div>
                            </th>
                            <td> Herman Beck </td>
                            <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Thanks
                                    </label>
                                </div>
                            </th>
                            <td> Herman Beck </td>
                            <td> May 15, 2015 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>
@endsection




















