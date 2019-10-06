<ul class="social-icon">
    @foreach($socials as $social)
        <li>
            <a href="{{$social->url}}">
                <i class="{{$social->icon}}" aria-hidden="true"></i>
            </a>
        </li>
    @endforeach
</ul>
{{--<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#"><i class="fa fa-slack" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>--}}