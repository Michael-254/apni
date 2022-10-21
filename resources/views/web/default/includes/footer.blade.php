@php
    $socials = getSocials();
    if (!empty($socials) and count($socials)) {
        $socials = collect($socials)->sortBy('order')->toArray();
    }

    $footerColumns = getFooterColumns();
@endphp

<footer class="footer bg-secondary position-relative user-select-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" footer-subscribe d-block d-md-flex align-items-center justify-content-between">
                    <div class="flex-grow-1">
                        <strong>{{ trans('footer.join_us_today') }}</strong>
                        <span class="d-block mt-5 text-white">{{ trans('footer.subscribe_content') }}</span>
                    </div>
                    <div class="subscribe-input bg-white p-10 flex-grow-1 mt-30 mt-md-0">
                        <form action="/newsletters" method="post">
                            {{ csrf_field() }}

                            <div class="form-group d-flex align-items-center m-0">
                                <div class="w-100">
                                    <input type="text" name="newsletter_email" class="form-control border-0 @error('newsletter_email') is-invalid @enderror" placeholder="{{ trans('footer.enter_email_here') }}"/>
                                    @error('newsletter_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill">{{ trans('footer.join') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $columns = ['first_column','second_column','third_column'];
    @endphp

    <div class="container">
        {{-- <div class="row">

            @foreach($columns as $column)
                <div class="col-6 col-md-4">
                    @if(!empty($footerColumns[$column]))
                        @if(!empty($footerColumns[$column]['title']))
                            <span class="header d-block text-white font-weight-bold">{{ $footerColumns[$column]['title'] }}</span>
                        @endif

                        @if(!empty($footerColumns[$column]['value']))
                            <div class="mt-20">
                                {!! $footerColumns[$column]['value'] !!}
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach

        </div> --}}
        <div class="row">
            <div class="col-6 col-md-4">
                <span class="header d-block text-white font-weight-bold">@if(!empty($generalSettings['site_name'])) {{ strtoupper($generalSettings['site_name']) }} @else Platform Title @endif</span>
                <div class="mt-20">
                    <p class="text-white">APNI LMS is a fully-featured learning management system that helps you to run your education business in several hours. This platform helps instructors to create professional education materials and helps students to learn from the best instructors.</p>
                </div>
                <div class="footer-social mt-20">
                    @if(!empty($socials) and count($socials))
                        @foreach($socials as $social)
                            <a href="{{ $social['link'] }}">
                                <img src="{{ $social['image'] }}" alt="{{ $social['title'] }}" class="mr-15">
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-6 col-md-4">
                <span class="header d-block text-white font-weight-bold">Our Pages</span>
                <div class="mt-20">
                    <p><a class="text-white" href="/login">- Login</a></p>
                    <p><a class="text-white" href="/register">- Register</a><br></p>
                    <p><a class="text-white" href="/blog">- Blog</a></p>
                    <p><a class="text-white" href="/contact">- Contact us</a></p>
                    <p><a class="text-white" href="/certificate_validation">- Certificate validation</a><br></p>
                    <p><a class="text-white" href="/become-instructor">- Become instructor</a><br></p>
                    <p><a class="text-white" href="/pages/terms">- Terms &amp; Conditions</a></p>
                    <p><a class="text-white" href="/pages/about">- About us</a><br></p>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <span class="header d-block text-white font-weight-bold">Contact Us</span>
                <div class="mt-20">
                    <p class="text-white mt-10"><i class="fa fa-map-marker"></i> <a href="https://maps.google.com/" class="text-white" target="_blank"> Location</a></p>
                    <p class="text-white mt-10"><i class="fa fa-phone"></i> <a href="tel:+254722000000" class="text-white" target="_blank"> +254 722 000000</a></p>
                    <p class="text-white mt-10"><i class="fa fa-envelope"></i> <a href="mailto:example@domain.com" class="text-white" target="_blank"> example@domain.com</a></p>
                </div>
            </div>
        </div>

        <div class="row mt-40 border-blue py-25 d-flex align-items-center justify-content-between">
            <div class="col-12 col-md-6 text-white text-left">
                <p>&copy; @if(!empty($generalSettings['site_name'])) {{ strtoupper($generalSettings['site_name']) }} @else Platform Title @endif {{ \Carbon\Carbon::now()->format('Y') }}. All rights reserved.</p>
            </div>
            <div class="col-12 col-md-6 text-white text-right">
                <a href="/pages/terms" class="text-white">Privacy Policy</a> - 
                <a href="/pages/terms" class="text-white">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>

