@extends('layouts.master')

@section('content')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    <button data-toggle="modal" data-target="#newCategory"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Category</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Categories</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Image</th>
                        <th>Color</th>
                        <th># of Places</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Image</th>
                        <th>Color</th>
                        <th># of Places</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($categories as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->order}}</td>
                        <td>
                            <img src="{{$data->imageUrl}}" width="260" height="120" alt="">
                        </td>
                        <td style="background: {{$data->bgColor}}">{{$data->bgColor}}</td>
                        <td>1</td>
                        <td>View</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@section('modals')
@include('modals.admin.category')
@endsection