<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use DB;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public  function __construct(){

        $this->middleware('auth');
    }


    public function addProduct(){
        $categories = Category::where('status',1)->get();
        $brands     = Brand   ::where('status',1)->get();

        return view('admin.product.add-product',[
            'categories' => $categories,
            'brands'     => $brands
        ]);
    }
    protected function productValidate($request){
        $this->validate($request,[
            'product_name' => 'required'
        ]);
    }
    protected function mainImageUpload($request)
    {
        $mainImage = $request->file('main_image');
        $ext       = '.'.$request->main_image->getClientOriginalExtension();
        $imageName = str_replace($ext, date("h:i:s").$ext,$request->main_image->getClientOriginalName());
        $directory = 'public/admin/product-images/main/';
        $imageUrl  = $directory.$imageName;
//        $mainImage ->move($directory, $imageName);
        Image::make($mainImage)->resize(400,400)->save($imageUrl);
        return $imageUrl;
    }
     protected function productInfoSave($request,$imageUrl){
         foreach($request->file('image_file') as $image){
             $imageName2 = $image->getClientOriginalName();
             $directory  = 'public/admin/product-images/gallery/';
             $imageUrl2  = $directory.$imageName2;
             $image ->move($directory, $imageName2);
             $data[]= $imageUrl2;
         }
         $product                = new Product();
         $product->product_name  = $request->product_name;
         $product->cat_id        = $request->cat_id;
         $product->brand_id      = $request->brand_id;
         $product->product_price = $request->product_price;
         $product->short_desc    = $request->short_desc;
         $product->long_desc     = $request->long_desc;
         $product->product_size  = $request->product_size;
         $product->product_qty   = $request->product_qty;
         $product->main_image    = $imageUrl;
         $product->image_file    = json_encode($data);
         $product->save();
     }
    public function newProduct(Request $request){

        $this->productValidate($request);
        $imageUrl= $this->mainImageUpload($request);
        $this->productInfoSave($request,$imageUrl);

       return back()->with('message','Product Added Successfully');
    }

    public function viewProduct(){
//        $products = Product::all();
        $products=DB::table('products')
            ->select('products.id','product_name','cat_id','brand_id','image_file','product_price','main_image','cat_name','brand_name','short_desc','long_desc','product_qty','product_size')
            ->join('brands', 'brands.id','=','products.brand_id')
            ->join('categories', 'categories.id','=','products.cat_id')
                     ->get();

        $categories = Category::where('status',1)->get();
        $brands     = Brand   ::where('status',1)->get();

        return view('admin.product.view-product',[
            'products'    => $products,
            'categories'  => $categories,
            'brands'      => $brands

       ]);
    }

    public function updateProduct(Request $request,$id){

        $productImage = $request->file('main_image');
        $product   = Product::find($id);

        if($productImage){

        }
        else{
//            $product = Product::find($request->product_id);
            $product->product_name  = $request->product_name;
            $product->cat_id        = $request->cat_id;
            $product->brand_id      = $request->brand_id;
            $product->product_price = $request->product_price;
            $product->short_desc    = $request->short_desc;
            $product->long_desc     = $request->long_desc;
            $product->product_size  = $request->product_size;
            $product->product_qty   = $request->product_qty;
            $product->save();
        }
        return redirect()->route('view-product')->with('message','Product Updated Successfully');
    }

    public function deleteProduct($id){

        $product = Product::find($id);
        $product->delete();

        return redirect('/product/view')->with('message','Product Deleted  Successfully');
    }
}
