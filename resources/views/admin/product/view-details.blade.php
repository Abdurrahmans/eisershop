

<div class="modal fade" id="view{{$product->id}}">
    <div class="modal-dialog modal-xl"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-4">
                              <h4>Product Name</h4>
                          </div>
                          <div class="col-md-8">
                              <p>{{$product->product_name}}</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <h4>Product Short Description</h4>
                          </div>
                          <div class="col-md-8">
                              <p>{{$product->short_desc}}</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <h4>Product Long Description</h4>
                          </div>
                          <div class="col-md-8">
                              <p>{{$product->long_desc}}</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <h4>Product Size</h4>
                          </div>
                          <div class="col-md-8">
                              <p>{{$product->product_size}}</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <h4>Product Quantity</h4>
                          </div>
                          <div class="col-md-8">
                              <p>{{$product->product_qty}}</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <h4>Product Short Description</h4>
                          </div>
                          <div class="col-md-8">
                              <p>{{$product->short_desc}}</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <h4>Product Main Image</h4>
                          </div>
                          <div class="col-md-8">
                              <p><img src="{{asset($product->main_image)}}" width="300px"></p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <h4>Product Gallery</h4>
                          </div>
                          <div class="col-md-8">
                              @foreach(json_decode($product->image_file) as $img)
                                  <img src="{{asset($img)}}" width="100">
                               @endforeach
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--                <button type="submit" name="btn" class="btn btn-primary">Update Brand</button>--}}
            </div>
        </div>
    </div>
</div>

