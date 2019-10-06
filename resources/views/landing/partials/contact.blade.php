<section class="section-contact section-wrapper gray-bg">
    <div class="container-fluid">

        @if($profile->contact)
            @include('landing.partials.contact-details', [
                'contact' => $profile->contact
            ])
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="feedback-form">
                    <h2>Get in touch</h2>

                    <form id="contactForm" action="{{route('common.message.getCompose')}}" method="POST">

                        @csrf

                        @include('alert::form')

                        @include('landing.partials.contact-form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>