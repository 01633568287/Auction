<?php

namespace App\Http\Controllers;
use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auction::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.auction.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Auction::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.auction.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auction::create($request->all())){
            return redirect()->route('auction.index')->with('success', 'Thêm mới phiên đấu giá thành công');
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
    public function edit(Auction $auction)
    {
        return view('admin.auction.edit',compact('auction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        $auction->update($request->only('name','start_time','close_time','status','start_price','step_price','highest_price','winner_id'));
        return redirect()->route('auction.index')->with('success', 'Cập nhật phiên đấu giá thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        if ($auction->products->count() > 0) {
            return redirect()->route('auction.index')->with('error', ' không thể xóa danh mục đang có sản phẩm');
        } else {
            $auction->delete();
            return redirect()->route('auction.index')->with('success', 'Xóa danh mục thành công');
        }
    }
}
