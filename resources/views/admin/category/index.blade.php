@extends('admin.layouts.app')
@section('title')
    @lang('app.categories')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4">
            @lang('app.categories')
        </div>

        <div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-danger">
                <i class="bi-plus-lg me-2"></i>@lang('app.add')
            </a>
        </div>

    </div>



    <div class="table-responsive">
        <table class="table table-hover table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Sort order</th>
                <th scope="col">Image</th>
                <th scope="col"><img src="{{ asset('img/flag/tm.svg') }}" alt="Turkmen" width="25"> Name</th>
                <th scope="col"><img src="{{ asset('img/flag/en.svg') }}" alt="English" width="25"> Name</th>
                <th scope="col"><img src="{{ asset('img/flag/tm.svg') }}" alt="Turkmen" width="25"> Product Name</th>
                <th scope="col"><img src="{{ asset('img/flag/en.svg') }}" alt="English" width="25"> Product Name</th>
                <th scope="col">In stocks</th>
                <th scope="col">Out of stocks</th>
                <th scope="col"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>

            <tbody>
            @foreach($objs->sortBy('sort_order')->sortBy('parent.sort_order') as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->sort_order }}</td>
                    <td></td>
                    <td>
                        @if($obj->parent_id)
                            {{ $obj->parent->name_tm }} /
                        @endif
                        <a href="{{route('category', $obj->slug)}}" class="text-decoration-none">
                            {{ $obj->name_tm }} <i class="bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        @if($obj->parent_id)
                            {{ $obj->parent->name_en ?: $obj->parent->name_tm }} /
                        @endif
                        {{ $obj->name_en }}
                    </td>
                    <td>
                        {{ $obj->product_name_tm }}
                    </td>
                    <td>
                        {{ $obj->product_name_en }}
                    </td>
                    <td>
                        <a href="{{ route('admin.products.index', ['category'=>$obj->id, 'stock'=>1]) }}"
                           class="text-decoration-none">
                            {{$obj->products_count}}<i class="bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.products.index', ['category'=>$obj->id, 'stock'=>0]) }}"
                           class="text-decoration-none">
                            {{$obj->out_of_stock_products_count}}<i class="bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $obj->id) }}" class="btn btn-success btn-sm">
                            <i class="bi-pencil"></i>
                        </a>

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
                                            {{ $obj->getName() }}
                                        </div>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.categories.destroy', $obj->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-light btn-sm"
                                                    data-bs-dismiss="modal">@lang('app.close')</button>
                                            <button type="submit" class="btn btn-secondary btn-sm"><i
                                                        class="bi-trash"></i> @lang('app.delete')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
