@extends('Layout.master')
@section('title', 'Contact')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
                <h4 class="page-title">Contact</h4>
            </div>
        </div>
    </div>

    <section>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-left">Contact List</h4>
                    </div>
                    <div class="col-6">
                        <div class="text-right"><button type="button" class="btn btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#ContactAdd"><i class="fas fa-plus"></i> New
                                Contact</button></div>
                    </div>
                </div>

                <div class="pt-5">
                    <table class="table display table-responsive" id="contact-table">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Whats App</th>
                                <th>Location</th>
                                <th>Facebook</th>
                                <th>Youtube</th>
                                <th>Linkedin</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($contact as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->email ?? '-'}}</td>
                                    <td>{{ $item->phone_number ?? '-'}}</td>
                                    <td>{{ $item->location ?? '-' }}</td>
                                    <td>{{ $item->whatsapp ?? '-'}}</td>
                                    <td>{{ $item->facebook ?? '-' }}</td>
                                    <td>{{ $item->youtube ?? '-' }}</td>
                                    <td>{{ $item->linkedin ?? '-' }}</td>
                                    <td><input type="checkbox" name="status" class="status" id="status"
                                            data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success"
                                            data-offstyle="danger" data-id="{{ $item->id }}"
                                            {{ $item->status == 'Active' ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> --}}
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



    <!--Update Modal -->
    <div class="modal fade" id="ContactUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="forms-sample" id="ContactUpdateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="hidden" id="id" class="id" name="id">
                                <input type="email" class="form-control" id="email" placeholder="email"
                                    name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone_number" placeholder="Phone Number"
                                    name="phone_number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="location" placeholder="Address"
                                    name="location">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">WhatsApp</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="whatsapp" placeholder="WhatsApp"
                                    name="whatsapp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="facebook"
                                    placeholder="www.facebook.com/pagename" name="facebook">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Youtube</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="youtube"
                                    placeholder="www.youtube.com/chennel name" name="youtube">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Linkedin</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="linkedin"
                                    placeholder="www.linkedin.com/chennel name" name="linkedin">
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
            var table = $('#contact-table').DataTable({
                responsive: false,
            });
        });
    </script>

    <script>
        $('#ContactForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#ContactForm')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('contact.create') }}",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#ContactForm").find('input').val('');
                    $('#ContactAdd').modal('hide');
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
                        url: '{{ URL::route('contact.delete', '/') }}' + '/' + id,
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function(result1) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Contact Information Removed ',
                                text: "You Have Removed Contact Information",
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
                url: '/contact/edit/' + id,
                method: 'get',
                success: function(contact) {
                    $('#id').val(contact.id);
                    $('#email').val(contact.email);
                    $('#phone_number').val(contact.phone_number);
                    $('#location').val(contact.location);
                    $('#whatsapp').val(contact.whatsapp);
                    $('#facebook').val(contact.facebook);
                    $('#youtube').val(contact.youtube);
                    $('#linkedin').val(contact.linkedin);
                    $('#ContactUpdateModal').modal('show');
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

        $('#ContactUpdateForm').submit(function(e) {
            e.preventDefault();
            let id = $('#id').val();
            let email = $('#email').val();
            let phone_number = $('#phone_number').val();
            let location = $('#location').val();
            let whatsapp = $('#whatsapp').val();
            let facebook = $('#facebook').val();
            let youtube = $('#youtube').val();
            let linkedin = $('#linkedin').val();
            let _token = $('input[name=_token]').val();
            $.ajax({
                type: "PUT",
                url: "{{ route('contact.update') }}",
                data: {
                    id: id,
                    email: email,
                    phone_number: phone_number,
                    location: location,
                    whatsapp: whatsapp,
                    facebook: facebook,
                    youtube: youtube,
                    linkedin: linkedin,
                    _token: _token,
                },
                dataType: "json",
                success: function(response) {
                    // $('#ContactUpdateModal').modal("toggle");
                    $('#ContactUpdateModal').modal("hide");
                    Swal.fire({
                        position: 'top-mid',
                        icon: 'success',
                        title: 'Update Successfull',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1800
                    });
                    $('#ContactUpdateForm')[0].reset();
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
                url: '/contact/status/' + id + '/' + catstatus,
                method: 'get',
                success: function(result1) {
                    console.log(result1);
                }
            });
        })
    </script>
@endsection
