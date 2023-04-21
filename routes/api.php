<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeedingController;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clean_products', function(){
   $products = \App\Models\ProductListing::all();
    foreach($products as $product){
         $product->delete();
    }
    return 1;
});


Route::get('clean_product', function(){
    $products = \App\Models\Product::all();
     foreach($products as $product){
          $product->delete();
     }
     return 1;
 });

 Route::get('add_tiers', function(){

    $tiers = \App\Models\Tier::all();
    foreach($tiers as $tier){
        $tier->delete();
    }
    $tier_id = 0;

    for($i = 1; $i < 11; $i++){
        $tier_id++;
        $tier = new \App\Models\Tier();
        $tier->name = 'Tier '.$tier_id;
        $tier->save();
    }

    //and other
    $tier = new \App\Models\Tier();
    $tier->name = 'Other';
    $tier->save();

    $tier = new \App\Models\Tier();
    $tier->name = 'Agent';
    $tier->save();

    //change admin 1
    // $admin = \App\Models\User::find(1);
    // $admin->password = Hash::make('sN1IK^yOA1SS');

 });


Route::get('import_blacklist', [SeedingController::class, 'import_blacklist'])->name('import_blacklist');
Route::get('upadte_combine_tables', function(){
    $combine_tables = array(
        array('id' => '1','category' => 'AI','deal_type' => 'Buy','tags' => 'AI','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => 'Lightning','deal_image' => 'https://dealcode.org/icons/icons8-lightning-24.png','created_at' => '2022-09-15 15:50:20','report_type' => 'Scam','updated_at' => '2022-09-15 15:50:20'),
        array('id' => '2','category' => 'CLIENT MGMT','deal_type' => 'Sell','tags' => 'CLIENT MGMT','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => 'Very Hot','deal_image' => 'https://dealcode.org/icons/icons8-hot-price-48.png','created_at' => '2022-09-15 15:50:20','report_type' => 'Fraud','updated_at' => '2022-09-15 15:50:20'),
        array('id' => '3','category' => 'CRM','deal_type' => 'Trade','tags' => 'CRM','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => 'Hot','deal_image' => 'https://dealcode.org/icons/icons8-fire-48.png','created_at' => NULL,'report_type' => 'Duplicate','updated_at' => NULL),
        array('id' => '4','category' => 'DATAANALYSIS','deal_type' => 'New SAAS','tags' => 'DATAANALYSIS','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => 'At Cost','deal_image' => 'https://dealcode.org/icons/icons8-green-circle-48.png','created_at' => NULL,'report_type' => 'Wrong Category','updated_at' => NULL),
        array('id' => '5','category' => 'DESIGN','deal_type' => 'Bids','tags' => 'DESIGN','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => 'Below Cost','deal_image' => 'https://dealcode.org/icons/imgpsh_fullsize_anim.png','created_at' => NULL,'report_type' => 'Other','updated_at' => NULL),
        array('id' => '6','category' => 'ECOMMERCE','deal_type' => NULL,'tags' => 'ECOMMERCE','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '7','category' => 'EDUCATION','deal_type' => NULL,'tags' => 'EDUCATION','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '8','category' => 'HOSTING','deal_type' => NULL,'tags' => 'HOSTING','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '9','category' => 'HR','deal_type' => NULL,'tags' => 'HR','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '10','category' => 'LEADGEN','deal_type' => NULL,'tags' => 'LEADGEN','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '11','category' => 'LEGAL','deal_type' => NULL,'tags' => 'LEGAL','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '12','category' => 'PRODUCTIVITY','deal_type' => NULL,'tags' => 'PRODUCTIVITY','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '13','category' => 'SECURITY','deal_type' => NULL,'tags' => 'SECURITY','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '14','category' => 'SALES','deal_type' => NULL,'tags' => 'SALES','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '15','category' => 'SEO','deal_type' => NULL,'tags' => 'SEO','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '16','category' => 'SOCIAL MEDIA','deal_type' => NULL,'tags' => 'SOCIAL MEDIA','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '17','category' => 'VISUAL','deal_type' => NULL,'tags' => 'VISUAL','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '18','category' => 'SUPPORT','deal_type' => NULL,'tags' => 'SUPPORT','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '19','category' => 'VIDEO','deal_type' => NULL,'tags' => 'VIDEO','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '20','category' => 'WEB DEV','deal_type' => NULL,'tags' => 'WEB DEV','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '21','category' => 'WORDPRESS','deal_type' => NULL,'tags' => 'WORDPRESS','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '22','category' => NULL,'deal_type' => NULL,'tags' => 'AUDIO','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '23','category' => NULL,'deal_type' => NULL,'tags' => 'CONTENT
      ','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '24','category' => NULL,'deal_type' => NULL,'tags' => 'MARKETING','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL),
        array('id' => '25','category' => NULL,'deal_type' => NULL,'tags' => 'STOCK PHOTOS','tags_2' => NULL,'tags_3' => NULL,'deal_trend' => NULL,'deal_image' => NULL,'created_at' => NULL,'report_type' => NULL,'updated_at' => NULL)
      );

        \App\Models\CombineTable::insert($combine_tables);

        return true;

});
