@extends('admin.layouts.app')
@section('title')
    @lang('app.dashboard')
@endsection
@section('content')

    <div class="h5 mb-3 text-warning">
        @lang('app.dashboard')
    </div>

    <div class="row g-3">
        @foreach($modals as $modal)
            <div class="col-6 col-md-4 col-xl-3">
                <a href="{{ route('admin.'.$modal['name'].'.index') }}" class="text-decoration-none text-dark">
                    <div class="bg-light rounded p-3 shadow">
                        <div class="fs-5">
                            @lang('app.'.$modal['name'])
                        </div>
                        <div class="fs-3 fw-semibold text-end">
                            {{ $modal['total'] }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection
