<?php namespace App\Http\Controllers\Frontend;

use App\Models\Branch;
use App\Models\CatReview;
use App\Models\Picture;
use App\Models\Project;
use App\Models\Shop;
use App\Models\Tag;
use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;
use Input;
use Redirect;

class ShopCategoryController extends Controller {

    public function admin_index()
    {
        return view('web.frontend.shop.admin_index');
    }
}