<!-- Add User Modal-->
<div class="modal fade" id="newAdvert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Advert</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('createAdvert')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Title:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" placeholder="Advert Title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start_date" class="col-sm-4 col-form-label">Start Date:</label>
                        <div class="col-sm-8">
                            <input type="date" placeholder="DD/MM/YYYY" class="form-control" name="start_date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="end_date" class="col-sm-4 col-form-label">End Date:</label>
                        <div class="col-sm-8">
                            <input type="date" placeholder="DD/MM/YYYY" class="form-control" name="end_date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="imageUrl" class="col-sm-4 col-form-label">Advert(Image) :</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="imageUrl">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="place" class="col-sm-4 col-form-label">Business:</label>
                        <div class="col-sm-8">
                            <select name="place" id="" class="form-control">
                                @foreach($companies as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
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