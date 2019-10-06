<div class="row">
    <div class="col-md-12">
        <div class="section-title">
            <h2>Contact</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        @if(optional($contact)->address_1)
            <address>
                <strong>Address</strong><br>
                {{optional($contact)->address_1}}<br>
                {{optional($contact)->address_2}}
            </address>
        @endif

        @if(optional($contact)->phone_number)
            <address>
                <strong>Phone Number</strong><br>
                {{optional($contact)->phone_number}}
            </address>
        @endif

        @if(optional($contact)->mobile_number)
            <address>
                <strong>Mobile Number</strong><br>
                {{optional($contact)->mobile_number}}
            </address>
        @endif

        @if(optional($contact)->email)
            <address>
                <strong>Email</strong><br>
                <a href="mailto:#">{{optional($contact)->email}}</a>
            </address>
        @endif

    </div>
</div>