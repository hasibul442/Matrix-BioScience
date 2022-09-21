@extends('Layout.master')
@section('title', 'Product')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
                <h4 class="page-title">Products</h4>
            </div>
        </div>
    </div>

    <section>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-left">Product Update</h4>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <a href="{{ route('products') }}" type="button" class="btn btn-outline-primary"><i
                                    class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-sm-6">
                        <form class="forms-sample" action="{{ route('product.edit', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Product Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Product Title"
                                        value="{{ $product->title }}" name="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="description">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Height</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="title" value="{{ $product->height }}"
                                        name="height">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Width</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="title" value="{{ $product->width }}"
                                        name="width">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Image Side</label>
                                <div class="col-sm-9">
                                    <select type="text" class="form-control" name="image_side" id="">
                                        <option selected disabled>Choose One</option>
                                        <option value="Left" {{ $product->image_side == 'Left' ? 'selected' : '' }}>Left
                                        </option>
                                        <option value="Right" {{ $product->image_side == 'Right' ? 'selected' : '' }}>Right
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center pb-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success" name="submit" id="submit"
                                    value="Submit" />
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6">
                    <img src="{{ asset('/assets/image/product/'.$product->image) }}" alt="" class="img-fluid">
                </div>
                </div>
            </div>
        </div>
    </section>

@endsection
