<section class="section-wrapper section-interest gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Interest</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
               @foreach($interests as $interest)
                    <div class="content-item">
                        <h3>{{$interest->title}}</h3>
                        <p>{!! $interest->detail !!}</p>
                    </div>
               @endforeach
            </div>
        </div>
    </div>
</section>