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
            {{-- <div class="row">
            <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{ route('dashboard.sliders.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Title</label>
                            <input name="title" type="text" class="form-control" id="exampleInputUsername1" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Sub Title</label>
                            <input name="sub_title" type="text" class="form-control" id="exampleInputUsername1" placeholder="Sub Title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Image/Video/Gif</label>
                            <input name="file" type="file" onchange="fileValidation(true,4,150)" class="@error('file') is-invalid @enderror form-control" id="exampleInputUsername1">
                            @error('file')
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
                </div>
                <button type="submit" class="btn btn-gradient-success me-2">Submit</button>
            </form>
        </div> --}}

            <div class="page-header mt-5">
                <h3 class="page-title">
                    <a class="btn btn-success" href="{{ route('dashboard.pages.createForm') }}">Add New</a>
                </h3>
            </div>
            <div class="row mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> S.N </th>
                            <th> Title </th>
                            <th> Slug </th>
                            <th> Parent Page </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $key => $page)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $page->title == null ? '-' : $page->title }}
                                </td>
                                <td>
                                    {{ $page->slug == null ? '-' : $page->slug }}
                                </td>
                                <td>
                                    {{ $page->page_id == null ? '-' : $page->parentPage->title }}
                                </td>
                                <td>
                                    <span class="badge {{ $page->status == 1 ? 'badge-info' : 'badge-danger' }}">
                                        {{ $page->status == 1 ? 'Active' : 'In Active' }}</span>
                                </td>
                                <td>
                                    @if ($page->slug != 'home')
                                        <button type="button" class="btn btn-info btn-rounded btn-icon"
                                            data-bs-toggle="modal" data-bs-target="#delete{{ $page->id }}">
                                            <i class="mdi mdi-delete-forever"></i> </button>
                                    @endif


                                </td>

                            </tr>

                            {{-- delete modal start --}}
                            <div class="modal fade" id="delete{{ $page->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Page</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-footer">
                                                <a href="{{ route('dashboard.pages.destroy', $page->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- delete modal end --}}
                        @endforeach

                    </tbody>

                </table>

            </div>
            <div class="row mt-4 text-center">
                {{ $pages->links() }}
            </div>

        </div>

    </div>
@endsection

@push('scripts')
@endpush
