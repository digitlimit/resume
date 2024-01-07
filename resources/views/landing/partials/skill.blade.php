<section class="section-wrapper skills-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Skills</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="progress-wrapper">
                    @foreach($skills as $skill)
                        <div class="progress-item">
                            <span class="progress-title">{{$skill->title}}</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->percentage}}" aria-valuemin="0"
                                     aria-valuemax="100" style="width: {{$skill->percentage}}%"><span class="progress-percent"> {{$skill->percentage}}%</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>