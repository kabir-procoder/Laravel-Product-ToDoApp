@extends('layouts.app')
@section('content')
    <div class="todo py-5">
        <div class="container-fluid">
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-12">
                                <h1 class="todo-headline">PRODUCT PAGE</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <div class="todo-title">
                                            <h2 class="card-title text-white">List</h2>
                                        </div>
                                        <div class="todo-button">
                                            <a href="{{ route('add.product') }}"
                                                class="btn btn-success todobtn text-white">Add New</a>
                                            <a href="{{ route('trash.product') }}"
                                                class="btn btn-danger todobtn text-white">Trash</a>
                                        </div>
                                    </div>
                                    <div class="container-fluid bg-dark">
                                        <div class="container">
                                            {{-- <form class="form-inline my-2 my-lg-0" method="get" action="">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="title"
                                                        value="{{ Request()->title }}" placeholder="Recipient's username"
                                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button style="border-radius: 0;" class="btn btn-primary"
                                                            type="button">Search</button>
                                                    </div>
                                                </div>
                                            </form> --}}
                                            <form method="get" action="">
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="form-group col-md-12">
                                                            <input type="text" name="title"
                                                                value="{{ Request()->title }}" class="form-control"
                                                                placeholder="search product">
                                                        </div>

                                                        <div style="clear: both;"></div>
                                                        <br>
                                                        <div class="col-md-12 text-center">
                                                            <button class="btn btn-primary" type="submit">Search</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-wrap: nowrap;">ID</th>
                                                    <th style="text-wrap: nowrap;">Image</th>
                                                    <th style="text-wrap: nowrap;">Product Title</th>
                                                    <th style="text-wrap: nowrap;">Old Price</th>
                                                    <th style="text-wrap: nowrap;">New Price</th>
                                                    <th style="text-wrap: nowrap;">Color</th>
                                                    <th style="text-wrap: nowrap;">Short Description</th>
                                                    <th style="text-wrap: nowrap;">Description</th>
                                                    <th style="text-wrap: nowrap;">Status</th>
                                                    <th style="text-wrap: nowrap;">Create Date</th>
                                                    <th style="text-wrap: nowrap;">Update Date</th>
                                                    <th style="text-wrap: nowrap;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($getRecord as $value)
                                                    <tr>
                                                        <td style="text-wrap: nowrap;">{{ $value->id }}</td>
                                                        <td style="min-width: 200px;">
                                                            @if (!empty($value->image))
                                                                <img src="{{ url('public/images/product/' . $value->image) }}"
                                                                    style="height: 100%; width: 100%; object-fit: cover;">
                                                            @endif
                                                        </td>
                                                        <td style="text-wrap: nowrap;">{{ $value->title }}</td>
                                                        <td style="text-wrap: nowrap;">{{ $value->old_price . " $" }}</td>
                                                        <td style="text-wrap: nowrap;">{{ $value->new_price . " $" }}</td>
                                                        <td style="text-wrap: nowrap;">{{ $value->color }}</td>
                                                        <td style="min-width: 300px;">{{ $value->short_description }}</td>
                                                        <td style="min-width: 500px;">{{ $value->description }}</td>
                                                        <td style="text-wrap: nowrap;">
                                                            {{ $value->status == 0 ? 'Publish' : 'Unpublish' }}</td>
                                                        <td style="text-wrap: nowrap;">
                                                            {{ date('d-m-y', strtotime($value->created_at)) }}</td>
                                                        <td style="text-wrap: nowrap;">
                                                            {{ date('d-m-y', strtotime($value->updated_at)) }}</td>
                                                        <td style="text-wrap: nowrap;">
                                                            <a href="{{ url('edit/product/' . $value->id) }}"
                                                                class="btn btn-primary"><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                            <a href="{{ url('softdelete/product/' . $value->id) }}"
                                                                onclick="return confirm('Are you sure you want to trash this item?');"
                                                                class="btn btn-danger text-white"><i
                                                                    class="bi bi-trash2"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="100%" style="color: red;">Record Not Found!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @include('alert')
@endsection
