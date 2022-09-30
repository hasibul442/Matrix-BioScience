@extends('Layout.master')
@section('title', 'Banner Text')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Banner Text</li>
                    </ol>
                </div>
                <h4 class="page-title">Banner Text</h4>
            </div>
        </div>
    </div>

    <section>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-left">Banner Text</h4>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#BannerTextAddModal"><i class="fas fa-plus"></i> New
                                Banner Text
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <table class="table display">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Headline</th>
                                <th>Sub Headline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($bannertexts as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->subtitle }}</td>
                                    <td><input type="checkbox" name="status" class="status" id="status"
                                            data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success"
                                            data-offstyle="danger" data-id="{{ $item->id }}"
                                            {{ $item->status == 'Active' ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-warning btn-sm editbtn"
                                            data-id={{ $item->id }}><i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0);" data-id="{{ $item->id }}" role="button"
                                            class="btn btn-outline-danger btn-sm deletebtn"><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!--Add Modal -->
    <div class="modal fade" id="BannerTextAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="forms-sample" id="BannerTextAddForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Headline</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subtitle" class="col-sm-3 col-form-label">Sub Headline</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="subtitle" name="subtitle">
                            </div>
                        </div>


                        <div class="text-center pb-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!--Add Modal -->
        <div class="modal fade" id="BannerTextUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="forms-sample" id="BannerTextUpdateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Headline</label>
                                <div class="col-sm-9">
                                    <input type="hidden" id="id">
                                    <input type="text" class="form-control" id="title1" name="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle" class="col-sm-3 col-form-label">Sub Headline</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="subtitle1" name="subtitle">
                                </div>
                            </div>


                            <div class="text-center pb-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script>
        $('#BannerTextAddForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#BannerTextAddForm')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('bannertext.create') }}",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#BannerTextAddForm").find('input').val('');
                    $('#BannerTextAddModel').modal('hide');
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    alert("Data Not Save");
                }
            });
        });


        $('body').on('click', '.deletebtn', function() {
            var id = $(this).data("id");
            Swal.fire({
                title: 'Are you sure?',
                // text: "If You Remove A Referral You Will Not Be Able To Recover It!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        type: "DELETE",
                        url: '{{ URL::route('bannertext.delete', '/') }}' + '/' + id,
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function(result1) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Banner Text Removed ',
                                text: "You Have Removed Banner Text",
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1800
                            });
                            location.reload();
                        },
                        error: function(error) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'We have some error',
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1800
                            });
                        }
                    });
                }
            });

        });

        $('body').on('click', '.editbtn', function() {
            var id = $(this).data('id');
            $.ajax({
                dataType: "json",
                url: '/bannertext/edit/' + id,
                method: 'get',
                success: function(bannertext) {
                    $('#id').val(bannertext.id);
                    $('#title1').val(bannertext.title);
                    $('#subtitle1').val(bannertext.subtitle);
                    $('#BannerTextUpdateModal').modal('show');
                },
                error: function(error) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'We have some error',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1800
                    });
                }
            });
        });

        $('#BannerTextUpdateForm').submit(function(e) {
            e.preventDefault();
            let id = $('#id').val();
            let title1 = $('#title1').val();
            let subtitle1 = $('#subtitle1').val();
            let _token = $('input[name=_token]').val();
            $.ajax({
                type: "PUT",
                url: "{{ route('bannertext.update') }}",
                data: {
                    id: id,
                    title1: title1,
                    subtitle1: subtitle1,
                    _token: _token,
                },
                dataType: "json",
                success: function(response) {
                    // $('#ContactUpdateModal').modal("toggle");
                    $('#BannerTextUpdateModal').modal("hide");
                    Swal.fire({
                        position: 'top-mid',
                        icon: 'success',
                        title: 'Update Successfull',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1800
                    });
                    $('#BannerTextUpdateForm')[0].reset();
                    window.location.reload();
                },
                error: function(data) {
                    Swal.fire({
                        title: 'Alert!',
                        text: 'Something Wrong',
                        icon: 'warning',
                        showConfirmButton: false,
                    });
                    // console.log('Error:', data);
                }
            });
        });
    </script>
    <script>
        $(document).on('change', '#status', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = "Active";
            } else {
                var catstatus = "Inactive";
            }
            $.ajax({
                dataType: "json",
                url: '/bannertext/status/' + id + '/' + catstatus,
                method: 'get',
                success: function(result1) {
                    console.log(result1);
                }
            });
        })
    </script>
@endsection
