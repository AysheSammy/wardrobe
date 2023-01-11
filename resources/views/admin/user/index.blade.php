@extends('admin.layouts.app')
@section('title')
    @lang('app.users')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4">
            @lang('app.users')
        </div>

        <div>
            <a href="{{ route('admin.users.create') }}" class="btn btn-danger">
                <i class="bi-plus-lg me-2"></i>@lang('app.add')
            </a>
        </div>

    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>

            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->name }}</td>
                    <td>{{ $obj->username }}</td>

                    <td>
                        <a href="{{ route('admin.users.edit', $obj->id) }}" class="btn btn-success btn-sm">
                            <i class="bi-pencil"></i>
                        </a>

                        @if($obj->id != auth()->id())
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $obj->id }}">
                                <i class="bi-trash"></i>
                            </button>
                            <div class="modal fade" id="delete{{$obj->id}}" tabindex="-1"
                                 aria-labelledby="delete{{ $obj->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title fs-5 fw-semibold" id="delete{{$obj->id}}Label">
                                                {{ $obj->name }}
                                            </div>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.users.destroy', $obj->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-light btn-sm"
                                                        data-bs-dismiss="modal">@lang('app.close')</button>
                                                <button class="btn btn-secondary btn-sm"><i
                                                            class="bi-trash"></i>@lang('app.delete')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
