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
                                    {{ $section->short_description == null ? '-' : $section->short_description }}
                                </td>
                                <td>{{ $section->section_id == null ? '-' : $section->parentSection->title }}</td>
                                <td>
                                    <span class="badge {{ $section->status == 1 ? 'badge-info' : 'badge-danger' }}">
                                        {{ $section->status == 1 ? 'Active' : 'In Active' }}</span>
                                </td>
                                <td>
                                    <button data-confirm-delete="true" type="button"
                                        onclick="confirmDelete(`{{ route('dashboard.sections.destroy', $section->id) }}`,`{{ route('dashboard.sections.index') }}`)"
                                        class="btn btn-danger btn-rounded btn-icon">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </button>
                                </td>

                            </tr>
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
