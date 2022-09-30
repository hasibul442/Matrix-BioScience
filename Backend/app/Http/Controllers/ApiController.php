<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\BannerTests;
use App\Models\Brands;
use App\Models\Contact;
use App\Models\Ourstroies;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function banner(){
        $bannertexts = Banners::where('status' ,'Active')->get();
        return response()->json([
            'success' => 'true',
            'banner_details' => $bannertexts]);
    }
    public function brand(){
        $brand = Brands::where('status' ,'Active')->get();
        return response()->json([
            'success' => 'true',
            'brands' => $brand]);
    }

    public function contact(){
        $contact = Contact::where('status' ,'Active')->latest()->limit(1)->get();
        return response()->json([
            'success' => 'true',
            'contact' => $contact]);
    }

    public function bannertext(){
        $bannertexts = BannerTests::where('status' ,'Active')->latest()->limit(1)->get();
        return response()->json([
            'success' => 'true',
            'banner_details' => $bannertexts]);
    }

    public function ourstory(){
        $ourstory = Ourstroies::where('status' ,'Active')->latest()->limit(1)->get();
        return response()->json([
            'success' => 'true',
            'ourstory' => $ourstory]);
    }

    public function products(){
        $products = Product::where('status' ,'Active')->get();
        return response()->json([
            'success' => 'true',
            'products' => $products]);
    }
}
