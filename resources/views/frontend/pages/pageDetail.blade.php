@extends('frontend.layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="d-flex flex-column text-center pt-5">
            <h1 class="display-4 m-0"><span class="text-primary">{{ $page['title'] }}</span></h1>
        </div>
    </div>
    @foreach ($page['sections'] as $section)
        <div class="container ">
            <div class="d-flex flex-column text-left mb-5 pt-5">
                <h2 class="display-4 m-0">{{ $section['title'] }}</h2>
                <h4 class="text-secondary mb-3">{{ $section['sub_title'] }}</h4>
            </div>
            @if ($section->hasMedia('file'))
                <div class="row pb-3">
                    @if (str_contains($section->getMedia('file')[0]->mime_type, 'image'))
                        <img class="card-img-top"
                            src="{{ $section->hasMedia('file') ? $section->getMedia('file')[0]->getFullUrl() : '' }}"
                            alt="">
                    @else
                        <video width="100" height="100" controls>
                            <source src="{{ $section->getMedia('file')[0]->getFullUrl() }}" type="video/mp4">
                            {{-- <source src="movie.ogg" type="video/ogg"> --}}
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </div>
            @endif

            <div class="row pb-3">
                <p>{!! $section['detailed_description'] !!}</p>
            </div>
        </div>
        @if (count($section['childSections']) > 0)
            <div class="container pt-5">
                <div class="row pb-3">
                    @foreach ($section['childSections'] as $childSection)
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 mb-2">
                                @if ($childSection->hasMedia('file'))
                                    @if (str_contains($childSection->getMedia('file')[0]->mime_type, 'image'))
                                        <img class="card-img-top"
                                            src="{{ $childSection->hasMedia('file') ? $childSection->getMedia('file')[0]->getFullUrl() : '' }}"
                                            alt="">
                                    @else
                                        <video width="100" height="100" controls>
                                            <source src="{{ $childSection->getMedia('file')[0]->getFullUrl() }}"
                                                type="video/mp4">
                                            {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                @else
                                    {{-- random image --}}
                                @endif

                                <div class="card-body bg-light p-4">
                                    <h4 class="card-title text-truncate">{{ $childSection['title'] }}</h4>
                                    {{-- <div class="d-flex mb-3">
                                    <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                                    <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                                    <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
                                </div> --}}
                                    <p>{{ Str::limit($childSection['short_description'], 40, '...') }}</p>
                                    <a class="font-weight-bold"
                                        href="{{ route('sectionDetail', $childSection['slug']) }}">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif
    @endforeach
@endsection
