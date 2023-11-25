@extends('backend.layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Section
                </h3>
            </div>
            <div class="row">
                <form class="forms-sample" method="POST" enctype="multipart/form-data"
                    action="{{ route('dashboard.sections.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Title</label>
                                <input name="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" id="exampleInputUsername1"
                                    placeholder="Title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Sub Title</label>
                                <input name="sub_title" type="text" class="form-control" id="exampleInputUsername1"
                                    placeholder="Sub Title">

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputUsername33">Short Description</label>
                                <textarea name="short_description" class="form-control" id="exampleInputUsername33"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputUsername34">Description</label>
                                <textarea id="detailed_description" name="detailed_description"
                                    class="form-control @error('detailed_description') is-invalid @enderror" id="exampleInputUsername34"></textarea>
                                @error('detailed_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsernamde1">Choose File [Image/video/Gif]</label>
                                <input type="file" onchange="fileValidation(false,4,150)" name="file"
                                    class="form-control @error('file') is-invalid @enderror" />
                                @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Choose Page</label>
                                <select class="form-control @error('pages') is-invalid @enderror" name="pages[]" multiple>
                                    @foreach ($pages as $page)
                                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                </select>
                                @error('pages')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Choose Parent Section</label>
                                <select class="form-control" name="section_id">
                                    <option value={{ null }}>None</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-success me-2">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#detailed_description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
