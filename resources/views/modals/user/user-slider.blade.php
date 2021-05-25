<!-- Add User Modal-->
<div class="modal fade" id="newSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Slider</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('user-add-slider')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Caption:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" placeholder="Slider Caption">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="order" class="col-sm-4 col-form-label">Business:</label>
                        <div class="col-sm-8">
                            <select name="company" id="" class="form-control">
                                @foreach($companies as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="duration" class="col-sm-4 col-form-label">Duration(days):</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="duration" placeholder="Advert Duration">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="imageUrl" class="col-sm-4 col-form-label">Slider Image [550 x 220]:</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="imageUrl">
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