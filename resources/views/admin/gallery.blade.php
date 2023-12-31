<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{url('assets')}}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Gallery Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">


    @include('layouts/adminheader')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts/adminsidemenu')

            <!-- Layout container -->
            <div class="layout-page">
                @include('layouts/adminnavbar')

                <!-- Content wrapper -->
                <div class="container content-wrapper">
                    <!-- Content -->





                    <h4 id="page_title" class="p-2 pt-3  text-dark">Gallery Management System</h4>
                    <div class="container border rounded mt-3">

                        <form action="{{url('/home/gallery/insert')}}" method="post" enctype="multipart/form-data"
                            class="p-3">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label id="label" for="title" class="form-label">Title:</label>
                                    <input type="text" class="form-control" id="image_title"
                                        placeholder="Enter image title" name="image_title">
                                    @error('image_title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label id="label" for="gallery_image" class="form-label">Image:</label>
                                    <input type="file" class="form-control" placeholder="Upload image"
                                        name="gallery_image">
                                    @error('gallery_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mt-3">Save </button><br><br>
                            @if(Session()->has('success'))
                            <div class="alert alert-success">
                                <strong>Success!</strong> {{Session()->get('success')}}
                            </div>
                            @endif
                            @if(Session()->has('fail'))
                            <div class="alert alert-danger">
                                <strong>Fail!</strong> {{Session()->get('fail')}}
                            </div>
                            @endif
                        </form>
                    </div>


                    <div class="table-responsive  container mt-3 rounded border p-3">
                        <table id="dataTable" class="table rounded table-bordered">
                            <thead class="bg-dark color-light">
                                <tr id="table-heading">
                                    <th>ID</th>
                                    <th>Image Title</th>
                                    <th>Image</th>
                                    <th>Uploaded At</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach($gallery as $data)
                                <tr>
                                    <td>{{$data->gallery_id}}</td>
                                    <td>{{$data->title}}</td>
                                    <td class="text-center"><img src="{{asset('assets/'.$data->image_path)}}"
                                            class="rounded" style="width:60px;" /></td>
                                    <td>{{$data->updated_at}}</td>
                                    <td class="text-center"><a
                                            href="{{url('/home/gallery/delete')}}/{{$data->gallery_id}}"
                                            class="btn btn-primary">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>





















                    <script>
                    $(document).ready(function() {
                        // Initialize DataTables with styling
                        $('#dataTable').DataTable({
                            "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "info": true,
                            "autoWidth": false,
                            "language": {
                                "paginate": {
                                    "next": "Next",
                                    "previous": "Prev"
                                }
                            }
                        });
                    });
                    </script>

                    <style>
                    #label {
                        font-size: 14px;
                        font-family: 'Roboto', sans-serif;
                        font-weight: 500;
                        color: black;
                    }

                    #page_title {
                        font-family: 'Roboto', sans-serif;
                        font-weight: 600;
                        font-size: 18px;
                    }



                    .bg-dark.color-light th {
                        color: white;
                    }



                    /* Styling for pagination controls */
                    .dataTables_paginate {
                        margin-top: 10px;
                    }

                    /* Styling for search box */
                    .dataTables_filter {
                        margin-bottom: 10px;
                    }
                    </style>







                    <style>
                    /* Simple input border highlight */
                    .form-control {
                        border: 1px solid #ccc;
                        padding: 8px;
                        transition: border-color 0.3s, box-shadow 0.3s;
                    }

                    .form-control:focus {
                        border-color: #007bff;
                        outline: none;
                        box-shadow: 0 0 5px #007bff;
                    }
                    </style>




                </div>
                <!-- / Content -->



                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    @include('layouts/adminfooter')
</body>

</html>