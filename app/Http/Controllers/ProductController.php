<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Artist;
use App\Models\Frame;
use App\Models\Hang;
use App\Models\Medium;
use App\Models\Sign;
use App\Models\Sign_Location;
use App\Models\Style;
use App\Models\Subject;
use App\Models\Support;
use App\Models\Tag;
use App\Models\Type;
use App\Models\Country;
use Session;
use Purifier;
use Flash;
use Response;
use Auth;
use App\Models\User;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->all();

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $frames = Frame::pluck('name', 'name');
        $hangs = Hang::pluck('name', 'name');
        $signs = Sign::pluck('name', 'name');
        $sign_locations = Sign_Location::pluck('name', 'name');
        $supports = Support::pluck('name', 'name');
        $countries = Country::pluck('name', 'name');
        $types = Type::pluck('name', 'name');

        $tags = Tag::all();
        $styles = Style::all();
        $subjects = Subject::all();
        $mediums = Medium::all();
        $sku = "PAAG".time();
        $user_id = Auth::user()->id;
        //$artist = Auth::user()->name;


        return view('products.create', compact('frames', 'hangs', 'signs', 'sign_locations', 'supports', 'tags', 'styles', 'subjects', 'types', 'mediums', 'countries', 'user_id', 'sku'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        //dd($request);

        $input = $request->all();

        $sku = "PAAG".time();

        $image=$request->image_fullview;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
            $input['image_fullview'] = preg_replace('/\s+/', '_', $imageName);
        }

        $image=$request->image_back;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
            $input['image_back'] = preg_replace('/\s+/', '_', $imageName);
        }

        $image=$request->image_leftside;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
            $input['image_leftside'] = preg_replace('/\s+/', '_', $imageName);
        }

        $image=$request->image_rightside;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
            $input['image_rightside'] = preg_replace('/\s+/', '_', $imageName);
        }

        $image=$request->image_hanged;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
            $input['image_hanged'] = preg_replace('/\s+/', '_', $imageName);
        }

        $image=$request->image_gallery;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
            $input['image_gallery'] = preg_replace('/\s+/', '_', $imageName);
        }

         //save the product
        $product = $this->productRepository->create($input);

        $product->tags()->sync($request->tags, false);
        $product->styles()->sync($request->styles, false);
        $product->subjects()->sync($request->subjects, false);
        $product->mediums()->sync($request->mediums, false);

        Flash::success('Product saved successfully.');

        Product::where('id', $product->id)
            ->update([
                'sku' => $sku
            ]);


        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $transactions = $product->transactions;

        return view('products.show')
            ->with('product', $product)
            ->with('transactions', $transactions);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        $frames = Frame::pluck('name', 'name');
        $hangs = Hang::pluck('name', 'name');
        $signs = Sign::pluck('name', 'name');
        $sign_locations = Sign_Location::pluck('name', 'name');
        $supports = Support::pluck('name', 'name');
        $countries = Country::pluck('name', 'name');
        $types = Type::pluck('name', 'name');

        $tags = Tag::all();
        $styles = Style::all();
        $subjects = Subject::all();
        $mediums = Medium::all();
        $user_id = Auth::user()->id;
        $artist = Auth::user()->name;
        $sku = $product->sku;

        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }

        return view('products.edit', compact('product', 'frames', 'hangs', 'signs', 'sign_locations', 'supports', 'tags', 'styles', 'subjects', 'types', 'mediums', 'countries', 'user_id', 'artist', 'sku'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {


        $product = $this->productRepository->find($id);
        $sku = $request->sku;

        //dd($product);

        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }


//        $image=$request->image_fullview;
//        if($image){
//            $imageName=$image->getClientOriginalName();
//            $image->move('images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
//            $product['image_fullview'] = preg_replace('/\s+/', '_', $imageName);
//        }

        if ($request->hasFile('image_fullview')) {
            $image=$request->image_fullview;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('/images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
                $product['image_fullview'] = preg_replace('/\s+/', '_', $imageName);
            }
        }

        if ($request->hasFile('image_back')) {
            $image=$request->image_back;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('/images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
                $product['image_back'] = preg_replace('/\s+/', '_', $imageName);
            }
        }

        if ($request->hasFile('image_leftside')) {
            $image=$request->image_leftside;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('/images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
                $product['image_leftside'] = preg_replace('/\s+/', '_', $imageName);
            }
        }


        if ($request->hasFile('image_rightside')) {
            $image=$request->image_rightside;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('/images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
                $product['image_rightside'] = preg_replace('/\s+/', '_', $imageName);
            }
        }


        if ($request->hasFile('image_hanged')) {
            $image=$request->image_hanged;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('/images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
                $product['image_hanged'] = preg_replace('/\s+/', '_', $imageName);
            }
        }

        if ($request->hasFile('image_gallery')) {
            $image=$request->image_gallery;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('/images/artworks/'.$sku, preg_replace('/\s+/', '_', $imageName));
                $product['image_gallery'] = preg_replace('/\s+/', '_', $imageName);
            }
        }


        $product = $this->productRepository->update($request->all(), $id);


        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
