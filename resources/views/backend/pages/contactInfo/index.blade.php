@extends('backend.layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <form class="forms-sample" method="POST" enctype="multipart/form-data"
                    action="{{ route('dashboard.contact-info.saveContactInfo') }}">
                    @csrf
                    <div class="row">
                        <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-primary text-white me-2">
                                    <i class="mdi mdi-home"></i>
                                </span> Address
                            </h3>
                            <a class="btn btn-success" onclick="addExtra('address','address_box')">Add +</a>
                        </div>
                        <div class="row" id="address_box">
                            @if (count(getContactInfo('address')) <= 0)
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="address[]" type="text" class="form-control " placeholder="Address">
                                    </div>
                                </div>
                            @else
                                @foreach (getContactInfo('address') as $address)
                                    @if ($loop->first)
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="address[]" type="text" value="{{ $address }}"
                                                    class="form-control " placeholder="Address">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-6">
                                            <div class="form-group d-flex">
                                                <input name="address[]" value="{{ $address }}" type="text"
                                                    class="form-control " placeholder="Address">
                                                <a class="btn btn-danger" onclick="removeExtra()">X</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="row">
                        <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-primary text-white me-2">
                                    <i class="mdi mdi-home"></i>
                                </span> Phone Number
                            </h3>
                            <a class="btn btn-success" onclick="addExtra('phone','phone_box')">Add +</a>
                        </div>
                        <div class="row" id="phone_box">
                            @if (count(getContactInfo('phone')) <= 0)
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="phone[]" type="text" class="form-control " placeholder="Phone">
                                    </div>
                                </div>
                            @else
                                @foreach (getContactInfo('phone') as $phone)
                                    @if ($loop->first)
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="phone[]" type="text" value="{{ $phone }}"
                                                    class="form-control " placeholder="Phone">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-6">
                                            <div class="form-group d-flex">
                                                <input name="phone[]" value="{{ $phone }}" type="text"
                                                    class="form-control " placeholder="Phone">
                                                <a class="btn btn-danger" onclick="removeExtra()">X</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-primary text-white me-2">
                                    <i class="mdi mdi-home"></i>
                                </span> Email
                            </h3>
                            <a class="btn btn-success" onclick="addExtra('email','email_box')">Add +</a>
                        </div>
                        <div class="row" id="email_box">
                            @if (count(getContactInfo('email')) <= 0)
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="email[]" type="text" class="form-control " placeholder="Email">
                                    </div>
                                </div>
                            @else
                                @foreach (getContactInfo('email') as $email)
                                    @if ($loop->first)
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="email[]" type="text" value="{{ $email }}"
                                                    class="form-control " placeholder="Email">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-6">
                                            <div class="form-group d-flex">
                                                <input name="email[]" value="{{ $email }}" type="text"
                                                    class="form-control " placeholder="Email">
                                                <a class="btn btn-danger" onclick="removeExtra()">X</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
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
        function addExtra(name, id) {
            $('#' + id).append(`<div class="col-lg-6">
                                <div class="form-group d-flex">
                                    <input name="${name}[]" type="text" class="form-control " placeholder="${name}">
                                    <a class="btn btn-danger" onclick="removeExtra()">X</a>
                                </div>
                            </div>
                            `);
        }

        function removeExtra() {
            event.target.parentElement.parentElement.remove()
        }
    </script>
@endpush
