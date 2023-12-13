@extends('backend.layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Pages
                </h3>
            </div>
            <div class="row">
                <form class="forms-sample" method="POST" enctype="multipart/form-data"
                    action="{{ route('dashboard.pages.store') }}">
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
                                <label for="exampleInputUsername1">Slug</label>
                                <input name="slug" type="text" class="form-control" id="exampleInputUsername1"
                                    placeholder="Slug">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputUsername1">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="row" for="exampleInputUsername1">Nav link?</label>
                                    <input class="row" name="is_nav_page" type="checkbox" id="exampleInputUsername1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="row" for="exampleInputUsername44">Add Page Link to Footer?</label>
                                    <input class="row" name="is_footer_link" type="checkbox" id="exampleInputUsername44">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Sub Page of</label>
                                <select class="form-control" name="page_id">
                                    <option value={{ null }}>None</option>
                                    @foreach ($pages as $page)
                                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Sections</label>
                                <select class="form-control" name="sections[]" multiple>
                                    <option value="null">None</option>
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
