<?php

namespace App\Http\Controllers\CpanelControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function dashboard()
    {
        $products = Product::OrderBy('id', 'DESC')->paginate(5);
        return view('website.cpanel.index', compact('products'));
    }

    public function delete(Product $id)
    {
        $id->delete();
        Alert::success('Xóa thành công', 'Bài viết đã bị xóa');
        return redirect()->back();
    }
}
