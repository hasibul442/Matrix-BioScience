@extends('Layout.master')
@section('title', 'Brands')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Brands</li>
                </ol>
            </div>
            <h4 class="page-title">Brands</h4>
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
                    <div class="text-right"><button type="button" class="btn btn-outline-primary"
                        data-bs-toggle="modal" data-bs-target="#BrandAdd"><i class="fas fa-plus"></i> New Brand</button></div>
                </div>
            </div>

            <div class="pt-5">
                <table class="table display" id="brands-table">
                    <thead>
                        <tr>
                            <th>Sl. No</th>
                            <th>Brand Name</th>
                            <th>Brand Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($brands as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ asset('/assets/image/brand/' . $item->image) }}" alt="brand"
                                        style="width: 200px; height: 200px;">
                                </td>
                                <td><input type="checkbox" name="status" class="status" id="status"
                                        data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success"
                                        data-offstyle="danger" data-id="{{ $item->id }}"
                                        {{ $item->status == 'Active' ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    {{-- <button class="btn btn-outline-warning btn-sm edit-btn" value="{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button> --}}
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
 <div class="modal fade" id="BrandAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="forms-sample" id="brandForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Brand Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" placeholder="Brand Title"
                                name="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label">Logo</label>
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
        var table = $('#brands-table').DataTable({
            responsive: false,
        });
    });
</script>

<script>
    $('#brandForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#brandForm')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('brand.create') }}",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#brandForm").find('input').val('');
                    $('#BrandAdd').modal('hide');
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
                            url: '{{ URL::route('brand.delete', '/') }}' + '/' + id,
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(result1) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Brand Removed ',
                                    text: "You Have Removed A Brands",
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
            url: '/brands/status/' + id + '/' + catstatus,
            method: 'get',
            success: function(result1) {
                console.log(result1);
            }
        });
    })
</script>
@endsection
