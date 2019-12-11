<div class="modal fade" id="edit{{$brand->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('edit-brand')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >Brand name</label>
                        <input type="text" class="form-control" value="{{$brand->brand_name}}" name="brand_name">
                        <input type="hidden" class="form-control" value="{{$brand->id}}" name="id">
                    </div>
                    <div class="form-group">
                        <label >Brand Discription</label>
                        <textarea  class="form-control"   name="brand_desc" placeholder="Brand Discription">{{$brand->brand_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label >Brand image</label>
                        <input type="file" class="form-control-file"  name="brand_image" >
                        <img src="{{asset($brand->brand_image)}}" width="80">

                    </div>
                    <div class="form-group ">
                        <label>Publication status</label>
                        <input type="radio" name="status" value="1" {{$brand->status== 1?'checked':''}}>
                        <label >Published</label>
                        <input type="radio" name="status" value="0" {{$brand->status== 0?'checked':''}}>
                        <label >Unpublished</label>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn" class="btn btn-primary">Update Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

