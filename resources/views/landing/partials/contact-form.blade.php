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

<button type="submit" class="btn btn-primary">Submit</button>