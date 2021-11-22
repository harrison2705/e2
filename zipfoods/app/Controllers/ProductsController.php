<?php
namespace App\Controllers;
use App\Products;
class ProductsController extends Controller 
{
    public function index()
    {
        $productsObj = new Products($this->app->path('/database/products.json'));
        $products = $productsObj -> getAll();
        dump($productsObj);

        return $this->app->view('products/index', ['products' => $products]);
    }
    public function show()
    {
        $sku = $this -> app-> param('sku');
        $productsObj= new Products($this->app->path('/database/products.json'));

        if(is_null($sku)) {
            $this->app->redirect('/products');
        }
        $product = $productsObj->getBySku($sku);
        if(is_null($product)) {
            return $this->app->view('products/missing');
        }
        $reviewSaved = $this->app->old('reviewSaved');
        return $this->app->view('products/show', [
            'product' => $product,
            'reviewSaved' => $reviewSaved
        ]);
    }
    public function saveReview() 
    {   
        $thi->app->validate([
            'sku' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200'
        ]);
        # If the above validation checks fail, the user is redirected back to where they came from
        # None of the code that follows will be executed 
        $sku = dump($this->app->input('sku'));
        $name = dump($this->app->input('name'));
        $review = dump($this->app->input('review'));
        #todo: Persist review to the database...
        return $this->app->redirect('/product?sku='. $sku, ['reviewSaved' => true]);
    }
}