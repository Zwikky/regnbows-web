<!-- Add Category Modal-->
<div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('addCategory')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Category Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bgColor" class="col-sm-2 col-form-label">Color:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bgColor" placeholder="Background Color">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="order" class="col-sm-2 col-form-label">Order:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="order">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imageUrl" class="col-sm-2 col-form-label">Category Image:</label>
                        <div class="col-sm-10">
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