@extends('frontend.layouts.app')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner " role="listbox">
                @forelse($sliders as $key => $slider)
                    <div style="max-height: 100vh;" class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        @if (str_contains($slider->getMedia('slider')[0]->mime_type, 'image'))
                            <img class="d-block w-100" src="{{ $slider->getMedia('slider')[0]->getFullUrl() }}"
                                alt="Image">
                        @else
                            <video class="d-block w-100">
                                <source src="{{ $slider->getMedia('slider')[0]->getFullUrl() }}" type="video/mp4">
                                {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                Your browser does not support the video tag.
                            </video>
                        @endif
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 90%;" id="slider-content">
                                <h3 class="text-white mb-3 d-none d-sm-block">{{ $slider->title }}</h3>
                                <h1 class="display-3 text-white mb-3">{{ $slider->sub_title }}</h1>
                                <!-- <h5 class="text-white mb-3 d-none d-sm-block">Duo nonumy et dolor tempor no et. Diam sit
                                                                                                                                                                                                                                    diam sit diam erat</h5> -->
                                <!-- <a href="" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Book Now</a>
                                                                                                                                                                                                                                <a href="" class="btn btn-lg btn-secondary mt-3 mt-md-4 px-4">Learn More</a> -->
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('frontend/img/carousel-1.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 90%;">
                                <h3 class="text-white mb-3 d-none d-sm-block">Best Pet Services</h3>
                                <h1 class="display-3 text-white mb-3">Keep Your Pet Happy</h1>
                                <h5 class="text-white mb-3 d-none d-sm-block">Duo nonumy et dolor tempor no et. Diam sit
                                    diam sit diam erat</h5>
                                <a href="" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Book Now</a>
                                <a href="" class="btn btn-lg btn-secondary mt-3 mt-md-4 px-4">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Booking Start -->
    {{-- <div class="container-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Your Name"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 p-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" class="form-control border-0 p-4 datetimepicker-input"
                                        placeholder="Reservation Date" data-target="#date" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" class="form-control border-0 p-4 datetimepicker-input"
                                        placeholder="Reservation Time" data-target="#time" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" style="height: 47px;">
                                    <option selected>Select A Service</option>
                                    <option value="1">Service 1</option>
                                    <option value="2">Service 1</option>
                                    <option value="3">Service 1</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">Going for a vacation?</h4>
                    <h1 class="display-4 mb-4">Book For <span class="text-primary">Your Pet</span></h1>
                    <p>Labore vero lorem eos sed aliquy ipsum aliquy sed. Vero dolore dolore takima ipsum lorem rebum
                    </p>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Boarding</h5>
                                </div>
                                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Feeding</h5>
                                </div>
                                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-grooming font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Grooming</h5>
                                </div>
                                <p class="m-0">Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-toy font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Tranning</h5>
                                </div>
                                <p class="m-0">Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Booking Start -->


    <!-- About Start -->
    @if ($landingPageData != null)
        <div class="container py-5">
            @foreach ($landingPageData['sections'] as $section)
                @if ($loop->odd)
                    <div class="row py-5">
                        <div class="{{ $section->hasMedia('file') ? 'col-lg-7' : 'col-lg-12' }} pb-5 pb-lg-0 px-3 px-lg-5">
                            <h1 class="display-4 mb-4"><span class="text-primary">{{ $section['title'] }}</span></h1>
                            <h4 class="text-secondary mb-3">{{ $section['sub_title'] }}</h4>
                            <h5 class="text-muted mb-3">{{ Str::limit($section['short_description'], 70, '...') }}</h5>
                            <p class="mb-4 text-justify">{!! Str::limit($section['detailed_description'], 800, '...') !!}</p>
                            <a href="{{ route('sectionDetail', $section['slug']) }}"
                                class="btn btn-lg btn-primary mt-3 px-4">View
                                More</a>
                        </div>
                        @if ($section->hasMedia('file'))
                            <div class="col-lg-5">
                                <div class="row px-3">
                                    <div class="col-12 p-0">
                                        @if (str_contains($section->getMedia('file')[0]->mime_type, 'image'))
                                            <img class="img-fluid " src="{{ $section->getMedia('file')[0]->getFullUrl() }}"
                                                alt="">
                                        @else
                                            <video style="width: 100%" controls autoplay muted>
                                                <source src="{{ $section->getMedia('file')[0]->getFullUrl() }}"
                                                    type="video/mp4">
                                                {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @elseif ($loop->even)
                    <div class="row py-5">
                        @if ($section->hasMedia('file'))
                            <div class="col-lg-5">
                                <div class="row px-3">
                                    <div class="col-12 p-0">
                                        @if (str_contains($section->getMedia('file')[0]->mime_type, 'image'))
                                            <img class="img-fluid " src="{{ $section->getMedia('file')[0]->getFullUrl() }}"
                                                alt="">
                                        @else
                                            <video style="width: 100%" controls autoplay muted>
                                                <source src="{{ $section->getMedia('file')[0]->getFullUrl() }}"
                                                    type="video/mp4">
                                                {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="{{ $section->hasMedia('file') ? 'col-lg-7' : 'col-lg-12' }} pb-5 pb-lg-0 px-3 px-lg-5">
                            <h1 class="display-4 mb-4"><span class="text-primary">{{ $section['title'] }}</span></h1>
                            <h4 class="text-secondary mb-3">{{ $section['sub_title'] }}</h4>
                            <h5 class="text-muted mb-3">{{ Str::limit($section['short_description'], 70, '...') }}</h5>
                            <p class="mb-4">{!! Str::limit($section['detailed_description'], 800, '...') !!}</p>
                            <a href="{{ route('sectionDetail', $section['slug']) }}"
                                class="btn btn-lg btn-primary mt-3 px-4">View
                                More</a>
                        </div>

                    </div>
                @endif
            @endforeach

        </div>
    @endif
    <!-- About End -->
@endsection
