@extends('admin.layouts.app')
@section('title')
    @lang('app.locations')
@endsection
@section('content')
    <div class="h4 mb-3">
        <a href="{{ route('admin.locations.index') }}" class="text-decoration-none">
            @lang('app.locations')
        </a>
        <i class="bi-chevron-right small"></i>
        <span class="text-secondary fs-4">@lang('app.add')</span>
    </div>

    <div class="row mb-3">
        <div class="col-10 col-sm-8 col-md-6 col-lg-4">
            <form action="{{ route('admin.locations.update', $obj->id)}}" method="post">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="name_tm" class="form-label fw-semibold">
                        <img src="{{ asset('img/flag/tm.svg') }}" alt="Turkmen" width="25">
                        @lang('app.name')
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('name_tm') is-invalid @enderror" name="name_tm" id="name_tm" value="{{ $obj->name_tm }}" required autofocus>
                    @error('name_tm')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name_en" class="form-label fw-semibold">
                        <img src="{{ asset('img/flag/en.svg') }}" alt="English" width="25">
                        @lang('app.name')
                    </label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" id="name_en" value="{{ $obj->name_en }}" required>
                    @error('name_en')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="delivery_fee" class="form-label fw-semibold">
                        @lang('app.delivery_fee')
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control @error('delivery_fee') is-invalid @enderror" name="delivery_fee" id="delivery_fee" value="{{ $obj->delivery_fee }}">
                    @error('delivery_fee')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    @lang('app.update')
                </button>
            </form>
        </div>
    </div>

@endsection
