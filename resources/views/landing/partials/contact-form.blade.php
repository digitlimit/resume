<div class="form-group">
    <label for="name">Name</label>
    <input value="{{old('name')}}"
           type="text" name="name" required="true" class="form-control" id="name"
           placeholder="Full Name">
    @include('alert::field', ['field'=>'name', 'tag'=>''])
</div>

<div class="form-group">
    <label for="email">Email address</label>
    <input  value="{{old('email')}}"
            type="email" name="email" required="" class="form-control" id="email"
            placeholder="Email">
    @include('alert::field', ['field'=>'email', 'tag'=>''])
</div>

<div class="form-group">
    <label for="subject">Subject</label>
    <input value="{{old('subject')}}"
           type="text" name="subject" class="form-control" id="subject"
           placeholder="Subject">
    @include('alert::field', ['field'=>'subject', 'tag'=>''])
</div>

<div class="form-group">
    <label for="message-text" class="control-label">Message</label>
                            <textarea
                                    class="form-control" rows="4"
                                    required="" name="message" id="message-text"
                                    placeholder="Write message"> {{old('message')}}</textarea>
    @include('alert::field', ['field'=>'message', 'tag'=>''])
</div>

<div class="form-group">
    <div class="g-recaptcha"
         data-sitekey="{{config('captcha.v2.key')}}"></div>
    @include('alert::field', ['field'=>config('captcha.v2.field'), 'tag'=>''])
</div>

<button type="submit" class="btn btn-primary">Submit</button>

{{--<input type="hidden" id="{{config('services.recaptcha.field')}}"--}}
       {{--name="{{config('capt.recaptcha.field')}}">--}}

@push('header')
{{--<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.key') }}"></script>--}}
{{--<script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}

{{--<script>--}}
   {{--grecaptcha.ready(function() {--}}
        {{--grecaptcha.execute('{{ config('services.recaptcha.key') }}', {action: 'homepage'})--}}
                {{--.then(function(token) {--}}
                    {{--$('#{{config('services.recaptcha.field')}}')--}}
                            {{--.val(token);--}}
                {{--});--}}
    {{--});--}}
{{--</script>--}}
@endpush