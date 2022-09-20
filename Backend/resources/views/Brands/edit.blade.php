@extends('Layout.master')
@section('title', 'Brand')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Brand</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </div>
            <h4 class="page-title">Brand</h4>
        </div>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="text-left">Brands</h4>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <a href="{{ route('brands') }}" type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>


            </div>
            <div class="row mt-5">
                <div class="col-sm-6">
                    <form class="forms-sample" action="{{ route('brand.edit',$brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="title" placeholder="Banner Title" value="{{ $brand->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>

                        <div class="text-center pb-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>

                <div class="col-sm-6">
                    <img src="{{ asset('/assets/image/brand/'.$brand->image) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
