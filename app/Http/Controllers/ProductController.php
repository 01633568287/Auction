<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Auction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Auction $auction)
    {
        $auction=Auction::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.create', compact('auction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'product_name'=>'required'|'minlength:6',
        //     'price'=>'required',
        //     'description'=>'required'
        // ],[
        //     'product_name.minlength'=>'tên sản phẩm ko đc dưới 6',
        //     'product_name.required'=>'Tên danh mục không được để trống',
        //     'price.required'=>'Thứ tự ưu tiên không được để trống',
        //     'description.required'=>'Thứ tự ưu tiên không được để trống',
           
        // ]);
        $request->validate([
            'product_name'=>['required', 'min:6', 'max:255'],
            'price'=>'required',
            'description'=>'required|max:255',
        ],
        [
            'required'=>'Chưa nhập :attribute',
            'min'=>'Nhập sai :attribute',
            'max'=>'Nhập sai :attribute',
        ],
        [
            'product_name'=>'Sản phẩm',
            'price'=>'giá',
            'description'=>'mô tả',
        ]);
        if(Product::create($request->all())){
            return redirect()->route('product.index')->with('success', 'Thêm mới sản phẩm thành công');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->only('product_name','price','image','description','active_name','user_id','auction_id'));
        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
