@extends('layouts.app')
@section('content')
    <div class="todo">
        <div class="container">
            <div class="content-wrapper">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-dark mt-5">
                                    <div class="card-header bg-dark">
                                        <h3 class="card-title text-white">Add New Product</h3>
                                    </div>

                                    <form action="{{ route('insert.product') }}" method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body">

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label">Product Image <span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="file" name="image" multiple
                                                        accept="image/*">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label">Product Title <span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Enter Product Title" required>
                                                    <span style="color: red;">{{ $errors->first('title') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label">Product Old Price <span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="old_price" class="form-control"
                                                        placeholder="Enter Product Old Price" required>
                                                    <span style="color: red;">{{ $errors->first('title') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label">Product New Price <span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="new_price" class="form-control"
                                                        placeholder="Enter Product New Price" required>
                                                    <span style="color: red;">{{ $errors->first('title') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label">Product Color <span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="color" class="form-control"
                                                        placeholder="Enter Product Color" required>
                                                    <span style="color: red;">{{ $errors->first('title') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label">Short Description <span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <textarea type="text" name="short_description" class="form-control" rows="3"
                                                        placeholder="Enter Short Description" required></textarea>
                                                    <span style="color: red;">{{ $errors->first('description') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label">Description <span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <textarea type="text" name="description" class="form-control" rows="5" placeholder="Enter Description"
                                                        required></textarea>
                                                    <span style="color: red;">{{ $errors->first('description') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label">Status <span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="status">
                                                        <option value="0">Active</option>
                                                        <option value="1">Deactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" value=""> Add </button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
