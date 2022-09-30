@extends('Layout.master')
@section('title', 'Our Stories')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Our Stories</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </div>
            <h4 class="page-title">Our Stories</h4>
        </div>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="text-left">Our Stories Update</h4>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <a href="{{ route('ourstories') }}" type="button" class="btn btn-outline-primary"><i
                                class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-8">
                    <form class="forms-sample" action="{{ route('ourstories.edit', $ourstroies->id) }}" id="OurstoriesAddForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}


                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="editor" name="description">{{ $ourstroies->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>


                        <div class="text-center pb-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="submit" id="submit"
                                value="Submit" />
                        </div>
                    </form>
                </div>

                <div class="col-sm-4">
                    <img src="{{ asset('/assets/image/ourstories/'.$ourstroies->image) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#editor').summernote({
            height: 300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['height', ['height']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });
    });
</script>
@endsection
