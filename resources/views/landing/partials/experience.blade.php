<section class="section-wrapper section-experience gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title"><h2>Work Experience</h2></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach($experiences as $experience)
                    <div class="content-item">
                        <small>{{$experience->start_year}} -
                            {{$experience->end_year ?? 'Till Date'}}</small>
                        <h3>{{$experience->job_title}}</h3>
                        <h4>{{$experience->company_name}}</h4>
                        <p>{{$experience->company_address}}</p>
                        <small class="job-description-list rounded-list">
                           {!! $experience->job_description !!}
                        </small>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>