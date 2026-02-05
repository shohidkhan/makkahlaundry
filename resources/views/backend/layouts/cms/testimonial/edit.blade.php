@extends('backend.app')
@section('title', 'Home how works edit')
@section('page-content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bold my-1 fs-2">
                    Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-semibold fs-base my-1">
                    <li class="breadcrumb-item text-muted"> CMS </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary"> Home </a>
                    </li>

                    <li class="breadcrumb-item text-muted"> How lesson work edit </li>

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Toolbar-->

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">
                        <h1 class="mb-4">Home how works edit</h1>
                        <form action="{{ route('admin.testimonial.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mt-4 col-lg-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input name="name" id="name" id="description"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter name"
                                        value="{{ old('name', $data->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-4 col-lg-4">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input name="designation" id="designation" id="description"
                                        class="form-control @error('designation') is-invalid @enderror"
                                        placeholder="Enter designation"
                                        value="{{ old('designation', $data->designation) }}">
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-4 col-lg-4">
                                    <label for="rating" class="form-label">Rating</label>
                                    <select name="rating" id="rating" id="description"
                                        class="form-control @error('rating') is-invalid @enderror">
                                        <option value="">--Select a rating--</option>
                                        <option value="1" {{ old('rating', $data->rating) == 1 ? 'selected' : '' }}>1
                                        </option>
                                        <option value="2" {{ old('rating', $data->rating) == 2 ? 'selected' : '' }}>2
                                        </option>
                                        <option value="3" {{ old('rating', $data->rating) == 3 ? 'selected' : '' }}>3
                                        </option>
                                        <option value="4" {{ old('rating', $data->rating) == 4 ? 'selected' : '' }}>4
                                        </option>
                                        <option value="5" {{ old('rating', $data->rating) == 5 ? 'selected' : '' }}>5
                                        </option>
                                    </select>
                                    @error('rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="image">Thumbnail:</label>
                                        <input type="file" class="dropify @error('image') is-invalid @enderror"
                                            name="image" id="image"
                                            data-default-file="@isset($data){{ asset($data->image) }}@endisset" />
                                    </div>
                                    @error('image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="video">Video:</label>
                                        <input type="file" class="dropify @error('video') is-invalid @enderror"
                                            name="video" id="video"
                                            data-default-file="@isset($data){{ asset($data->video) }}@endisset" />
                                    </div>
                                    @error('video')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary btn-lg" value="Submit">
                                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-danger btn-lg">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush --}}
