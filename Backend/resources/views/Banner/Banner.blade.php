@extends('Layout.master')
@section('title', 'Banners')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Banners</li>
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
                        <div class="text-right"><button type="button" class="btn btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#BannerAdd">Banner Add</button></div>
                    </div>
                </div>

                <div class="pt-5">
                    <table class="table display" width="100%" id="banner-table">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($banners as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ asset('/assets/image/banner/' . $item->image) }}" alt="banner"
                                            style="width: 200px; height: 200px;"></td>
                                    <td><input type="checkbox" name="status" class="status" id="status"
                                            data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success"
                                            data-offstyle="danger" data-id="{{ $item->id }}"
                                            {{ $item->status == 'Active' ? 'checked' : '' }}></td>
                                    <td>
                                        <a href="{{ route('banner.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        {{-- <button class="btn btn-outline-warning btn-sm edit-btn" value="{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button> --}}
                                        <a href="javascript:void(0);" data-id="{{ $item->id }}" role="button"
                                            class="btn btn-sm btn-outline-danger deletebtn"><i
                                                class="mdi mdi-trash-can"></i></a>
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
    <div class="modal fade" id="BannerAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="forms-sample" id="bannerForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Banner Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" placeholder="Banner Title"
                                    name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image" required>
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
        $(document).ready(function() {
            var table = $('#banner-table').DataTable({
                responsive: true,
            });
        });
    </script>

    <script>
        $('#bannerForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#bannerForm')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('banners.create') }}",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#bannerForm").find('input').val('');
                    $('#BannerAdd').modal('hide');
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
            var token = $("meta[name='csrf-token']").attr("content");
            if (confirm("Are You sure want to delete !")) {
                $.ajax({
                    type: "DELETE",
                    url: "/banner/" + id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data) {

                        location.reload();
                        console.log(data);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });


        // $('body').on('click', '.editbtn', function() {
        //     var id = $(this).data('id');
        //     $.ajax({
        //         dataType: "json",
        //         url: '/banner/edit/' + id,
        //         method: 'get',
        //         success: function(banners) {
        //             $('#id').val(banners.id);
        //             $('#title1').val(banners.title);
        //             $('#BannerEditModal').modal('show');
        //         },
        //         error: function(error) {
        //             alert(error);
        //         }
        //     });
        // });

        // $('#bannereditform').submit(function(e) {
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     let id = $('#id').val();
        //     let title1 = $('#title1').val();
        //     let image = $('#title1').val();
        //     // let formData = new FormData($('#bannereditform')[0]);

        //     $.ajax({
        //         type: "POST",
        //         url: "/banner/update/" + id,
        //         data: formData,
        //         dataType: "json" ,
        //         success: function(response) {

        //             $('#BannerEditModal').modal("toggle");
        //             location.reload();

        //         }
        //     });

        // });
    </script>
    <script>
        $(document).on('change', '#status', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = "Active";
            } else {
                var catstatus = "Deactive";
            }
            $.ajax({
                dataType: "json",
                url: '/banner/status/' + id + '/' + catstatus,
                method: 'get',
                success: function(result1) {
                    console.log(result1);
                }
            });
        })
    </script>
@endsection
