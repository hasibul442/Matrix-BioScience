@extends('Layout.master')
@section('title', 'Products')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
                <h4 class="page-title">Product</h4>
            </div>
        </div>
    </div>

    <section>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-left">Product</h4>
                    </div>
                    <div class="col-6">
                        <div class="text-right"><button type="button" class="btn btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#ProductAddModal"><i class="fas fa-plus"></i> New
                                Product</button></div>
                    </div>
                </div>

                <div class="pt-5">
                    <table class="table display table-responsive" id="product-table">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Desctiption</th>
                                <th>Height / Width</th>
                                <th>Side</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ asset('/assets/image/product/' . $item->image) }}" alt="product"
                                            style="width: 200px; height: 200px;">
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->height }} / {{ $item->width }}</td>
                                    <td>{{ $item->image_side }}</td>
                                    <td><input type="checkbox" name="status" class="status" id="status"
                                            data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success"
                                            data-offstyle="danger" data-id="{{ $item->id }}"
                                            {{ $item->status == 'Active' ? 'checked' : '' }}>
                                    </td>
                                    <td>
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
    <div class="modal fade" id="ProductAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="forms-sample" id="ProductAddForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Product Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Product Title" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="description"></textarea>
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
                                <input type="number" class="form-control" id="title" name="height">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Width</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="title" name="width">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Image Side</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control" name="image_side" id="">
                                    <option selected disabled>Choose One</option>
                                    <option value="Left">Left</option>
                                    <option value="Right">Right</option>
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
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#product-table').DataTable({
                responsive: false,
            });
        });
    </script>
    <script>
        $('#ProductAddForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#ProductAddForm')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('product.create') }}",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#ProductAddForm").find('input').val('');
                    $('#ProductAddModal').modal('hide');
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
                        url: '{{ URL::route('product.delete', '/') }}' + '/' + id,
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function(result1) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Product Removed ',
                                text: "You Removed A Product",
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
                url: '/products/status/' + id + '/' + catstatus,
                method: 'get',
                success: function(result1) {
                    console.log(result1);
                }
            });
        })
    </script>
@endsection
