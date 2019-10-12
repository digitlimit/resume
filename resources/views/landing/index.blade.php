@extends('landing.layouts.default')

@section('content')
    @include('landing.partials.preloader')

    <div class="columns-block">

        <div class="left-col-block blocks">
            @include('landing.partials.header')
        </div>

        <div class="right-col-block blocks">

            @include('alert::form')

            @includeWhen(optional($profile)->summary, 'landing.partials.summary', [
                'summary' => optional($profile)->summary
            ])

            @php $skills = optional($profile)->skills @endphp
            @includeWhen($skills && $skills->count(), 'landing.partials.skill', [
                'skills' => $skills
            ])

            @php $work_experiences = optional($profile)->work_experiences @endphp
            @includeWhen($work_experiences && $work_experiences->count(), 'landing.partials.skill', [
                'work_experiences' => $work_experiences
            ])

            @php $educations = optional($profile)->educations @endphp
            @includeWhen($educations && $educations->count(), 'landing.partials.skill', [
                'educations' => $educations
            ])

            @php $interests = optional($profile)->interests @endphp
            @includeWhen($interests && $interests->count(), 'landing.partials.skill', [
                'interests' => $interests
            ])

            @php $portfolios = optional($profile)->portfolios @endphp
            @includeWhen($portfolios && $portfolios->count(), 'landing.partials.skill', [
                'portfolios' => $portfolios
            ])

            @include('landing.partials.contact')

            @include('landing.partials.footer')

        </div>
    </div>
@endsection