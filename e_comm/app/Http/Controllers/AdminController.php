<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    function store(Request $request){

        Category::create([
                "name" => $request->input('Categoryname'),
        ]);

        return redirect()->route('returnmainpage');
    }

    function storeprod(REQUEST $request){

        if ($request->hasFile('Image')) {
            $image = $request->file('Image');

            $newImageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $newImageName);

        }
        $validator=$request->validate([
            'price'=>'required',
            'categoryid'=>'required|exists:categories,id'
        ]);

    // Flash a success message to the session
    session()->flash('success', 'Product inserted successfully.');



    Product::create([
        "name" => $request->input('ProductName'),
        "description" => $request->input('ProductDesc'),
        "image" => $newImageName,
        "price" => $request->input('price'),
        "quantity" => $request->input('Quantityinstock'),
        "category_id" => $request->input('categoryid'),

    ]);

        return redirect()->route('returnmainpage');
    }

    function index(){
        $categories=Category::get();
        return view('admin.categories',compact('categories'));
    }

    function destroycat($id){
        Category::find($id)->delete();
        return redirect()->route('categories.showall');
    }

    function prodindex(){
        $products=Product::get();
        return view('admin.products',compact('products'));
    }
    function orderindex(){
        $orders=Order::get();
        return view('admin.orders',compact('orders'));
    }

    function destroyprod($id){
        Product::find($id)->delete();
        return redirect()->route('products.showall');
    }

    function destroyorder($id){
        Order::find($id)->delete();
        return redirect()->route('orders.showall');
    }

    function update($id){
         $product=Product::find($id);

         return view('admin.update',compact('product'));

    }

    function edit($id, Request $request)
    {
        $product = Product::find($id);

        if ($request->hasFile('Image')) {
            $image = $request->file('Image');

            // Store the uploaded image in the 'public/images' disk using the Storage facade
            $newImageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $newImageName);

            $product->update([
                "name" => $request->input('name'),
                "description" => $request->input('description'),
                "price" => $request->input('price'),
                "quantity" => $request->input('quantity'),
                "category_id" => $request->input('category_id'),
                "image" => $newImageName, // Save the image path in the database
            ]);
        } else {
            // If no new image was uploaded, update other user information
            $product->update([
                "name" => $request->input('name'),
                "description" => $request->input('description'),
                "price" => $request->input('price'),
                "quantity" => $request->input('quantity'),
                "category_id" => $request->input('category_id'),
                "Password" => $request->input('Password'),
            ]);
        }

        return redirect()->route('products.showall');
    }
}
