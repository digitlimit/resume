<section class="section-wrapper portfolio-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Portfolio</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($portfolios as $portfolio)
                <div class="col-md-6">
                    <a class="portfolio-item" target="_blank" href="{{$portfolio->url}}">
                        <div class="portfolio-thumb">
                            <img src="img/portfolio-1.jpg" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h3>{{$portfolio->title}}</h3>
                            <small>{{$portfolio->url}}</small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>