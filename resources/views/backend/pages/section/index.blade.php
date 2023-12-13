@extends('backend.layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Sections
                </h3>
            </div>


            <div class="page-header mt-5">
                <h3 class="page-title">
                    <a class="btn btn-success" href="{{ route('dashboard.sections.createForm') }}">Add New</a>
                </h3>
            </div>
            <div class="row mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> S.N </th>
                            <th> Title </th>
                            <th> Sub Title </th>
                            <th> Description </th>
                            <th> Parent Section </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $key => $section)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $section->title == null ? '-' : $section->title }}
                                </td>
                                <td>
                                    {{ $section->sub_title == null ? '-' : $section->sub_title }}
                                </td>
                                <td>
                                    {{ $section->short_description == null ? '-' : Str::limit($section->short_description, 70, '...') }}
                                </td>
                                <td>{{ $section->section_id == null ? '-' : $section->parentSection->title }}</td>
                                <td>
                                    <span class="badge {{ $section->status == 1 ? 'badge-info' : 'badge-danger' }}">
                                        {{ $section->status == 1 ? 'Active' : 'In Active' }}</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-rounded btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $section->id }}">
                                        <i class="mdi mdi-delete-forever"></i> </button>
                                </td>

                            </tr>


                            {{-- delete modal start --}}
                            <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Section</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-footer">
                                                <a href="{{ route('dashboard.sections.destroy', $section->id) }}"
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
                {{ $sections->links() }}
            </div>

        </div>

    </div>
@endsection
@push('scripts')
@endpush
