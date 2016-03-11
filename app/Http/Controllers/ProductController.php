<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use Storage;
use App\Product;
use App\Picture;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller{

    public function index()
    {
        $products = Product::with('tags','picture','category')->paginate(20);
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::lists('id', 'title');
        $tags = Tag::lists('id', 'name');

        return view('admin.product.create', compact('categories', 'tags'));

    }

    public function store(ProductRequest $request)
    {
        $product= Product::create($request->all());

        if(!empty($request->input('tag_id'))){
            $product->tags()->attach($request->input('tag_id'));
        }

        $im = $request->file('picture');

        if(!empty($im)){
            $ext = $im->getClientOriginalExtension();
            $uri = str_random(12).'.'.$ext;

            $picture = Picture::create([
                'uri' => $uri,
                'product_id' => $product->id,
            ]);

            $im->move('./uploads', $uri);
        }

        return redirect('product')->with(['message'=>'success']);

    }

    public function show($id)
    {

    }

    public function edit($id){

        $product = Product::find($id);

        $tags = Tag::lists('id', 'name');
        $categories = Category::lists('id', 'title');

        return view('admin.product.edit', compact( 'product', 'tags', 'categories'));
    }

    public function update(ProductRequest $request, $id){

        $product = Product::find($id);
        $product->update($request->all());

        if(!empty($request->input('tag_id')))
        {
            $product->tags()->sync($request->input('tag_id'));
        }else{
            $product->tags()->detach();
        }

        $im = $request->file('picture');

        if($request->input('deletePicture') == 'true'){
            $deletePicture = $this->deletePicture($product);
        }

        if(!empty($im)){

            if(empty($deletePicture))
                $this->deletePicture($product);

            $this->upload($im, $product->id);
            $this->deletePicture($product);
        }

        return redirect('product');
    }

    private function deletePicture(Product $product){

        if(!is_null($product->picture)) {
            $fileName = $product->picture->uri;

            if(Storage::exists($fileName))
                Storage::delete($fileName);
            $product->picture->delete();

            return true;
        }
        return false;
    }

    private function upload($im, $productId){
        $ext = $im->getClientOriginalExtension();
        $uri = str_random(12).'.'.$ext;

        $picture = Picture::create([
            'uri' => $uri,
            'product_id' => $productId,
        ]);

        $im->move('./uploads', $uri);
    }

    public function destroy($id){
        $product = Product::find($id);
        $this->deletePicture($product);

        $product->delete();
        return back()->with(['message'=>trans('app.success')]);

    }
}
