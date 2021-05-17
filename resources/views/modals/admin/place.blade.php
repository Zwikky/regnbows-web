<!-- Add Place Modal-->
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
                        <label for="tin_number" class="col-sm-4 col-form-label">TIN Number:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tin_number" placeholder="TIN Number">
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
                        <label for="order" class="col-sm-4 col-form-label">Category:</label>
                        <div class="col-sm-8">
                            <select name="category" id="" class="form-control">
                                @foreach($categories as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
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