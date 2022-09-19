@extends('Layout.master')
@section('title', 'Banners')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Banner</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </div>
            <h4 class="page-title">Banners</h4>
        </div>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="text-left">Banners</h4>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <a href="{{ route('banners') }}" type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>


            </div>
            <div class="row mt-5">
                <div class="col-sm-6">
                    <form class="forms-sample" action="{{ route('banner.edit',$banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Banner Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Banner Title" value="{{ $banner->title }}">
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
                    <img src="{{ asset('/assets/image/banner/'.$banner->image) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
