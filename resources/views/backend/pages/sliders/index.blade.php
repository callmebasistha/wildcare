@extends('backend.layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Sliders
                </h3>
            </div>
            <div class="row">
                <form class="forms-sample" method="POST" enctype="multipart/form-data"
                    action="{{ route('dashboard.sliders.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Title</label>
                                <input name="title" type="text" class="form-control" id="exampleInputUsername1"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Sub Title</label>
                                <input name="sub_title" type="text" class="form-control" id="exampleInputUsername1"
                                    placeholder="Sub Title">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Image/Video</label>
                                <input name="file" type="file"
                                    class="@error('file') is-invalid @enderror form-control" id="exampleInputUsername1">
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
            </div>

            <div class="page-header mt-5">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Sliders List
                </h3>
            </div>
            <div class="row mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> S.N </th>
                            <th> Image/Video </th>
                            <th> Title </th>
                            <th> Sub Title </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $key => $slider)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if ($slider->hasMedia('slider'))
                                        @php
                                            $file = $slider->getMedia('slider')[0];
                                        @endphp
                                        @if (str_contains($file->mime_type, 'image'))
                                            <img src="{{ $file->getFullUrl() }}" width="100" class="img-fluid" />
                                        @else
                                            <video width="100" height="100" controls>
                                                <source src="{{ $file->getFullUrl() }}" type="video/mp4">
                                                {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ $slider->title == null ? '-' : $slider->title }}
                                </td>
                                <td>
                                    {{ $slider->sub_title == null ? '-' : $slider->sub_title }}
                                </td>
                                <td>
                                    <span class="badge {{ $slider->status == 1 ? 'badge-info' : 'badge-danger' }}">
                                        {{ $slider->status == 1 ? 'Active' : 'In Active' }}</span>
                                </td>
                                <td>
                                    <button data-confirm-delete="true" type="button" onclick="confirmDelete(`{{route('dashboard.sliders.destroy',$slider->id)}}`,`{{route('dashboard.sliders.index')}}`)" class="btn btn-danger btn-rounded btn-icon">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </button>
{{--                                    <a href="{{ route('dashboard.sliders.delete', $slider->id) }}" class="btn btn-danger btn-rounded btn-icon" data-confirm-delete="true">delete</a>--}}

                                    <button type="button" class="btn btn-info btn-rounded btn-icon">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
            <div class="row mt-4 text-center">
                {{ $sliders->links() }}
            </div>

        </div>

    </div>
@endsection
