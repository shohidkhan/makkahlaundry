@extends('backend.app')
@section('title', 'Home banner')
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
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary"> Home </a>
                    </li>

                    <li class="breadcrumb-item text-muted"> CMS </li>
                    <li class="breadcrumb-item text-muted">Edit Banner</li>

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
                        <h1 class="mb-4">Edit how work</h1>
                        <form action="{{ route('admin.cms.banner.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data" class="row">
                            @csrf
                            <div class="mt-4 col-lg-5">
                                <label for="title" class="form-label">Title</label>
                                <input name="title" id="title" id="description"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="Enter title"
                                    value="{{ old('title', $data->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-4 col-lg-7">
                                <label for="sub_title" class="form-label">Sub Title</label>
                                <input name="sub_title" id="sub_title"
                                    class="form-control @error('sub_title') is-invalid @enderror"
                                    placeholder="Enter sub title" value="{{ old('sub_title', $data->sub_title) }}">
                                @error('sub_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-4 col-lg-6">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter description" rows="9">{{ old('description', $data->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mt-4">
                                <div class="input-style-1">
                                    <label for="background_image">background image:</label>
                                    <input type="file" class="dropify @error('background_image') is-invalid @enderror"
                                        name="background_image" id="background_image"
                                        data-default-file="@isset($data){{ asset($data->background_image) }}@endisset" />
                                </div>
                                @error('background_image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary btn-lg" value="Update">
                                <a href="{{ route('admin.cms.banner.index') }}" class="btn btn-danger btn-lg">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
