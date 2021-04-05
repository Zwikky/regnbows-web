@extends('layouts.master')

@section('content')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sliders</h1>
    <button data-toggle="modal" data-target="#newPlace"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Slider</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Sliders</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Business</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Business</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($sliders as $data)
                    <tr>
                        <td>
                            <img class="img-profile rounded-circle" width="25" height="25"
                                src="{{asset($data->imageUrl)}}">
                        </td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->company}}</td>
                        <td>
                            @if($data->status == 1)
                            <span class="badge badge-success">Active</span>
                            @endif
                            @if($data->status == 0)
                            <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            <a href="/slider/view/{{$data->id}}" class="btn btn-primary btn-circle">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-success btn-circle">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@section('modals')
<!-- Add Category Modal-->
<div class="modal fade" id="newPlace" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Business</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('addPlace')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" placeholder="Place Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label">Address:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address" placeholder="Business Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="website" class="col-sm-4 col-form-label">Website:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="website" placeholder="Website Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contact" class="col-sm-4 col-form-label">Contact #:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="contact" placeholder="Contact Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="details" class="col-sm-4 col-form-label">More Details:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="details">
                            ...
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="longitude" placeholder="Longitude">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="latitude" placeholder="Latitude">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="imageUrl" class="col-sm-4 col-form-label">Logo Image:</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imageUrl" class="col-sm-4 col-form-label">Image 1:</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="image1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imageUrl" class="col-sm-4 col-form-label">Image 2:</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="image2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imageUrl" class="col-sm-4 col-form-label">Image 3:</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="image3">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection