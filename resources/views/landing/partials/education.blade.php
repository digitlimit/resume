<section class="section-wrapper section-education">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title"><h2>Education</h2></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach($educations as $education)
                    <div class="content-item">
                        <small>{{$education->start_year}} - {{$education->end_year}}</small>
                        <h3>{{$education->degree}}</h3>
                        <h4>{{$education->school_name}}</h4>
                        <p>{{$education->school_address}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</section>