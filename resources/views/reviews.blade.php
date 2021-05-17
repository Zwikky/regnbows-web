@extends('layouts.master')

@section('content')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Reviews</h1>

</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Reviews</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Reviewer</th>
                        <th>Message</th>
                        <th>Ratings</th>
                        <th>Business</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Reviewer</th>
                        <th>Message</th>
                        <th>Ratings</th>
                        <th>Business</th>
                    </tr>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection