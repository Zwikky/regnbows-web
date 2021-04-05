@extends('layouts.master')

@section('content')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Places</h1>
    <button data-toggle="modal" data-target="#newPlace"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Business</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Businesses</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Static</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Static</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($places as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{ substr($data->address, 0, 12)  }}...</td>
                        <td>{{$data->website}}</td>
                        <td>
                            @if($data->status == 1)
                            <span class="badge badge-success">Active</span>
                            @endif
                            @if($data->status == 0)
                            <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            <a href="/place/view/{{$data->id}}" class="btn btn-primary btn-circle">
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
@include('modals.admin.place')
@endsection