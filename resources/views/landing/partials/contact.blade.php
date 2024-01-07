<section class="section-contact section-wrapper gray-bg">
    <div class="container-fluid">

        @includeWhen(optional($profile)->contact, 'landing.partials.contact-details', [
             'contact' => optional($profile)->contact
        ])

        <div class="row">
            <div class="col-md-12">
                <div class="feedback-form">
                    <h2>Get in touch</h2>

                    <form id="contactForm" action="{{route('guest.postMessage')}}" method="POST">

                        @csrf

                        @include('alert::form')

                        @include('landing.partials.contact-form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>