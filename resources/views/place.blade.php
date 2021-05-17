@extends('layouts.master')

@section('content')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Place</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$place->name}}</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{$place->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="staticEmail" value="{{$place->category}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" value="{{$place->address}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Longitude</label>

                <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$place->longitude}}">
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Latitude</label>

                <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$place->latitude}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label"></label>

                <div class="column">
                    <img src="{{asset($place->logoUrl)}}" width="150" height="150">
                    <img src="{{asset($place->image1Url)}}" width="150" height="150">
                    <img src="{{asset($place->image2Url)}}" width="150" height="150">
                    <img src="{{asset($place->image3Url)}}" width="150" height="150">
                </div>

            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" value="{{$place->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" value="{{$place->website}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="tin_nubmer" class="col-sm-2 col-form-label">TIN Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$place->tin_number}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Details</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" value="{{$place->details}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button class="btn btn-lg btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection