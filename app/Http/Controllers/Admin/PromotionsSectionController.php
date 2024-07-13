<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromotionCode;


class PromotionsSectionController extends Controller
{
    public function index()
    {
        $PromotionCode = PromotionCode::all();
        return view('admin.promotion')
        ->with('PromotionCode', $PromotionCode);
    }
    public function store(Request $request)
    {
        $PromotionCode = new PromotionCode();
        $PromotionCode->code = $request->input('code');
        $PromotionCode->discount_percentage = $request->input('discount_percentage');
        $PromotionCode->first_time_only = $request->input('first_time_only');
        $PromotionCode->minimum_cart_value = $request->input('minimum_cart_value');

        $PromotionCode->save();
        return redirect('/admin/promotion')->with('status', 'The Promotion Code has been added successfully');
    }
    public function edit($id){
        $PromotionCode = PromotionCode::find($id);
        return view('admin.promotion.edit')
        ->with('PromotionCode', $PromotionCode);
    }

}
