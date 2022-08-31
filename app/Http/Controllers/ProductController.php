<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Product;
use App\Models\User;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $user_auth = User::where('id', Auth::id())->get();
        // dd($user_auth[0]['profile_id']);
        $products = Product::orderBy('id', 'asc')->get();
        $categories = Category::all();
        $branches = Branch::all();
        return view('products.index', compact('products', 'categories', 'branches','user_auth'));
    }

    public function create()
    {   $user_auth = User::where('id', Auth::id())->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        $branches = Branch::orderBy('name', 'ASC')->get();
        return view('products.create', compact('categories', 'branches','user_auth'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:30'],
            'description' => ['required', 'max:100'],
            'price' => ['required', 'numeric', 'max_digits:5'],
            'category' => ['required'],
            'branch' => ['required'],
        ]);

        $time = date('Y-m-d H:i:s');
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'branch_id' => $request->branch,
            'user_id' => Auth::id(),
            'date_purchase' => $time,
            'status' => 1
        ]);
        return back()->with('updated_status', 'ok');
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'comment' => ['required', 'max:100'],
        ]);
        DB::beginTransaction();
        try {
            $product->status = $request->status;
            $product->update();
            $comment = new Comments;
            $comment->comments = $request->comment;
            $comment->user_id = Auth::id();
            $comment->product_id = $product->id;
            $comment->save();
            DB::commit();
            return back()->with('updated_status', 'ok');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'error');
        }
    }

    public function show($product)
    {
        $user_auth = User::where('id', Auth::id())->get();
        $products = Product::find($product);
        // dd($products);
        $category = Category::find($products->category_id);
        $branch = Branch::find($products->branch_id);
        $comment = Comments::where('product_id',$products->id)->where('user_id',Auth::id())->orderBy('id','desc')->limit(1)->get()->toArray();
        if(count($comment)!=0){
            // dd($comment);
            $comment = $comment[0]['comments'];
        }else{
            $comment='';
        }
        return view('products.show', compact('products', 'category', 'branch','comment','user_auth'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('delet_product', 'ok');
    }
}
