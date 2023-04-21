<?php

use App\Http\Controllers\Admin\BlackFridayDealController;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SeedingController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostReportController;
use App\Http\Controllers\Admin\ProductBidController;
use App\Http\Controllers\Admin\ServiceProviderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
})->name('clear-cache');




Route::get('/', function () {
    return redirect()->route('login');
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     // 'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
});


Route::middleware(['auth','verified','admin'])->group(function () {

    Route::get('/2', function () {
        return Inertia::render('Home2');
    })->name('home2');

    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [MainController::class, 'users'])->name('users');
    Route::get('/users/edit/{id}', [MainController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [MainController::class, 'update'])->name('users.update');
    Route::post('users/delete/{id}', [MainController::class, 'delete'])->name('users.delete');
    Route::post('/change_user_status/{id}', [MainController::class, 'change_user_status'])->name('change_user_status');
    Route::post('/change_user_role/{id}', [MainController::class, 'change_user_role'])->name('users.addAdmin');

    Route::post('update_user_permissions/{id}', [MainController::class, 'update_user_role'])->name('users.permission.upadate');


    //tables
    Route::get('/tables', [MainController::class, 'tables'])->name('tables');
    Route::post('create/table', [MainController::class, 'createTable'])->name('create.table');
    Route::post('update/table/{id}', [MainController::class, 'updateTable'])->name('update.table');
    Route::post('delete/table/{id}', [MainController::class, 'deleteTable'])->name('delete.table');

    //categories
    Route::get('categories', [MainController::class, 'categories'])->name('categories');
    Route::post('create/category', [MainController::class, 'createCategory'])->name('create.category');
    Route::post('update/category/{id}', [MainController::class, 'updateCategory'])->name('update.category');
    Route::post('delete/category/{id}', [MainController::class, 'deleteCategory'])->name('delete.category');
//transaction
Route::get('transactions', [MainController::class, 'transactions'])->name('transactions');
 //tags
 Route::get('tags', [MainController::class, 'tags'])->name('tags');
 Route::post('create/tag', [MainController::class, 'createTag'])->name('create.tag');
 Route::post('update/tag/{id}', [MainController::class, 'updateTag'])->name('update.tag');
 Route::post('delete/tag/{id}', [MainController::class, 'deleteTag'])->name('delete.tag');
    //currencies
    Route::get('currencies', [MainController::class, 'currencies'])->name('currencies');

    //professions
    Route::get('professions', [MainController::class, 'professions'])->name('professions');
    //products
    Route::get('/product_listings', [ProductController::class, 'index'])->name('products');
    Route::get('/products/editlist/{id}', [ProductController::class, 'editList'])->name('products.editList');
    Route::get('/user-products/{id}', [ProductController::class, 'userProduct'])->name('products.readmore');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::post('products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('productlist/create', [ProductController::class, 'createProductList'])->name('productList.create');
    Route::post('productlist/store', [ProductController::class, 'storeProductList'])->name('productList.store');
    Route::get('productlist/update/{id}', [ProductController::class, 'updateProductList'])->name('productList.update');
    Route::get('productlist/edit/{id}', [ProductController::class, 'createEdit'])->name('productList.edit');
    Route::post('productlist/updates/{id}', [ProductController::class, 'storeUpdate'])->name('productList.update2');
    Route::post('productlist/update-status', [ProductController::class, 'listStatusUpdate'])->name('product-lists.update-status');
    

    Route::post('create_or_edit_currency', [MainController::class, 'create_or_edit_currency'])->name('create_or_edit_currency');
    Route::post('delete_currency/{id}', [MainController::class, 'delete_currency'])->name('delete_currency');

    //bid products
    Route::get('/saas_agencies', [ServiceProviderController::class, 'index'])->name('service.provider.index');;
    Route::get('/service-providers/edit/{id}', [ServiceProviderController::class, 'index'])->name('service.provider.edit');;
    Route::post('/service-providers/delete/{id}', [ServiceProviderController::class, 'delete'])->name('service.provider.delete');;
    Route::post('/service-providers/update/{id}', [ServiceProviderController::class, 'update'])->name('service.provider.update');;
    Route::post('service-providers/store', [ServiceProviderController::class, 'store'])->name('service.provider.store');
    Route::get('/bidProducts', [ProductBidController::class, 'index'])->name('bidProducts')->name('products');;
    //product find
    Route::get('/product_finds', [ProductController::class, 'productFind'])->name('productFind');
    Route::post('/create-product-find', [ProductController::class, 'createProductFind'])->name('create.productFind');
    //pending products
    Route::get('pending/products', [MainController::class, 'pendingProducts'])->name('pending.products');
    //product type
    Route::get('deal_types', [ProductController::class, 'productTypes'])->name('productTypes');
    Route::post('create/product-type', [ProductController::class, 'createProductType'])->name('type.create');



    Route::get('product-types/edit/{id}', [ProductController::class, 'productTypeEdit'])->name('productType.edit');
    Route::post('delete/product-types/{id}', [ProductController::class, 'deleteProductType'])->name('delete.productType');
    Route::post('product-types/update/{id}', [ProductController::class, 'productTypeUpdate'])->name('productType.update');
    //aprove or reject product
    Route::post('approve_or_reject/product/{id}', [MainController::class, 'approveOrRejectProduct'])->name('approve.product');
    //post report
    Route::get('product_reports', [PostReportController::class, 'index'])->name('index');

    //general settings
    Route::get('/settings', [MainController::class, 'settings'])->name('settings');
    Route::post('/settings/update', [MainController::class, 'updateSettings'])->name('settings.update');


    //providers
    Route::get('/deal_providers', [MainController::class, 'providers'])->name('providers');
    Route::post('delete/provider/{id}', [MainController::class, 'deleteProvider'])->name('delete.provider');
    Route::post('update/provider/{id}', [MainController::class, 'updateProvider'])->name('update.provider');
    Route::post('/create/provider', [MainController::class, 'createProvider'])->name('create.provider');

    //meta tags
    Route::get('/meta_tags', [MainController::class, 'metaTags'])->name('meta-tags');
    Route::post('/meta-tags/update', [MainController::class, 'updateMetaTags'])->name('meta-tags.update');
    Route::post('/meta-tags/create', [MainController::class, 'createMetaTags'])->name('meta-tags.create');
    Route::post('/meta-tags/delete', [MainController::class, 'deleteMetaTags'])->name('meta-tags.delete');

    //payment methods
    Route::get('/payment_methods', [MainController::class, 'paymentMethods'])->name('payments');
    Route::get('/countries', [MainController::class, 'countries'])->name('countries');

    //sliders
    Route::get('sliders', [MainController::class, 'sliders'])->name('sliders');
    Route::post('sliders/create', [MainController::class, 'createSlider'])->name('sliders-create');
    Route::post('sliders/update/{id}', [MainController::class, 'updateSlider'])->name('update.slider');
    Route::post('sliders/delete/{id}', [MainController::class, 'deleteSlider'])->name('delete.slider');
    Route::post('sliders/update/status/{id}', [MainController::class, 'updateSliderStatus'])->name('slider-status');
    //sliders
    Route::get('report_types', [MainController::class, 'reportTypes'])->name('report-types');
    Route::post('report-types/create', [MainController::class, 'createReportType'])->name('report.types.create');
    Route::post('report-types/update/{id}', [MainController::class, 'updateReportType'])->name('update.report.types');
    Route::post('report-types/delete/{id}', [MainController::class, 'deleteReportType'])->name('delete.report.types');
    //   Route::post('report-types/update/status/{id}', [MainController::class, 'updateSliderStatus'])->name('slider-status');

    //blacklist words
    Route::get('blacklist-words', [MainController::class, 'blacklistWords'])->name('blacklist-words');
    Route::post('blacklist-words/create', [MainController::class, 'createBlacklistWord'])->name('blacklist-words.create');
    Route::post('blacklist-words/update/{id}', [MainController::class, 'updateBlacklistWord'])->name('blacklist-words.update');
    Route::post('blacklist-words/delete/{id}', [MainController::class, 'deleteBlacklistWord'])->name('blacklist-words.delete');



    //black friday deals
    Route::get('black_friday_deals', [BlackFridayDealController::class, 'index'])->name('black_friday_deals');
    Route::post('black_friday_store', [BlackFridayDealController::class, 'store'])->name('blackFriday.store');
    Route::post('black_friday_deals/{id}', [BlackFridayDealController::class, 'delete'])->name('black_friday_deals.delete');
    Route::post('black_friday_update', [BlackFridayDealController::class, 'updateDeal'])->name('black_friday_update.update');
    Route::post('black_friday_import', [BlackFridayDealController::class, 'importDeals'])->name('black_friday_deals.import');


    //Interesting Links
    Route::get('interesting_links', [MainController::class, 'interestingLinks'])->name('interesting_links');
    Route::post('interesting_link_store', [MainController::class, 'storeLinks'])->name('interesting_link.store');
    Route::post('interesting_link/{id}', [MainController::class, 'deleteLinks'])->name('interesting_link.delete');
    Route::post('interesting_link_update', [MainController::class, 'updateLinks'])->name('interesting_link_update.update');
    Route::post('interesting_link_import', [MainController::class, 'importDeals'])->name('interesting_links.import');

    //pricing
    Route::get('pricings', [MainController::class, 'pricings'])->name('pricings');
    Route::post('pricing/create', [MainController::class, 'createPricing'])->name('pricing.create');
    Route::post('pricing/update/', [MainController::class, 'updatePricing'])->name('pricing.update');
    Route::post('pricing/delete/{id}', [MainController::class, 'deletePricing'])->name('pricing.delete');
    Route::post('pricing_import', [MainController::class, 'importPricing'])->name('pricing.import');



    Route::get('pages', [MainController::class, 'pages'])->name('pages');
    Route::post('pages/create', [MainController::class, 'createPage'])->name('pages.create');
    Route::post('pages/update/{id}', [MainController::class, 'updatePage'])->name('pages.update');
    Route::post('pages/delete/{id}', [MainController::class, 'deletePage'])->name('pages.delete');
    //dealtrends
    Route::get('deal_trends', [MainController::class, 'dealtrends'])->name('dealtrends');
//combined table
    Route::get('combine-table', [MainController::class, 'combineTable'])->name('combine-table');
    //product lists
    Route::get('products', [MainController::class, 'productLists'])->name('product-lists');
    Route::get('review_products', [MainController::class, 'reviewProducts'])->name('review-products');
    Route::get('review_listing', [ProductController::class, 'reviewListing'])->name('review.listing');

    Route::get('search-product/{input}', [MainController::class, 'productLists'])->name('search.product');

    Route::post('product-lists/import', [MainController::class, 'ImportProducts'])->name('product-lists.import');
    Route::post('product-lists/delete/{id}', [ProductController::class, 'deleteProducts'])->name('product-lists.delete');

    //discount product lists
    Route::get('discontinued_products', [MainController::class, 'discontinuedProductLists'])->name('discontinued_products');
    Route::post('discontinued_products/create', [MainController::class, 'createDisProduct'])->name('discontinued_products.create');
    Route::post('discontinued_products/update', [MainController::class, 'updateDisProduct'])->name('discontinued_products.update');
    Route::post('discontinued_products/delete', [MainController::class, 'deleteDisProduct'])->name('discontinued_products.delete');
    Route::post('discontinued_products/import', [MainController::class, 'importDisProduct'])->name('discontinued_products.import');

    //Reseller Lits
    Route::get('reseller_lists', [MainController::class, 'resellerLists'])->name('reseller_lists');
    Route::post('reseller_lists/create', [MainController::class, 'createresellerList'])->name('reseller_lists.create');
    Route::post('reseller_lists/update', [MainController::class, 'updateresellerList'])->name('reseller_lists.update');
    Route::post('reseller_lists/delete', [MainController::class, 'deleteresellerList'])->name('reseller_lists.delete');

      //Known Issues
      Route::get('known_issues', [MainController::class, 'knownIssues'])->name('known_issues');
      Route::post('known_issues/create', [MainController::class, 'createknownIssue'])->name('known_issues.create');
      Route::post('known_issues/update', [MainController::class, 'updateknownIssue'])->name('known_issues.update');
      Route::post('known_issues/delete', [MainController::class, 'deleteknownIssue'])->name('known_issues.delete');


        //admin links
        Route::get('admin_links', [MainController::class, 'adminLinks'])->name('admin_links');
        Route::post('admin_links/create', [MainController::class, 'createadminLink'])->name('admin_links.create');
        Route::post('admin_links/update', [MainController::class, 'updateadminLink'])->name('admin_links.update');
        Route::post('admin_links/delete', [MainController::class, 'deleteadminLink'])->name('admin_links.delete');


    Route::get('post_reviews', [MainController::class, 'postReviews'])->name('post_reviews');
    Route::get('user_reviews', [MainController::class, 'userReviews'])->name('user_reviews');

    Route::get('subscriptions', [MainController::class, 'subscriptions'])->name('subscriptions');

    Route::get('system_info', [MainController::class, 'systemInfo'])->name('system_info');
    Route::get('chats', [MainController::class, 'chats'])->name('chats');
    Route::post('view_chats', [MainController::class, 'view_chats'])->name('view_chats');
    Route::get('productList/export', [ProductController::class, 'exportProductList'])->name('productList.export');
    Route::post('create/combine_table', [MainController::class, 'createCombineTable'])->name('create.combine_table');
    Route::post('update/combine_table/{id}', [MainController::class, 'updateCombineTable'])->name('update.combine_table');


    Route::get('user-types', [MainController::class, 'userType'])->name('user-types');
    Route::post('import_user_type', [MainController::class, 'import_user_type'])->name('import_user_type');

    Route::get('op_systems', [MainController::class, 'opsystems'])->name('opsystems');
    Route::post('import_opsystems', [MainController::class, 'import_opsystems'])->name('import_opsystems');

    Route::get('facebook_groups', [MainController::class, 'facebook_groups'])->name('facebook_groups');
    Route::post('import_facebook_groups', [MainController::class, 'import_facebook_groups'])->name('import_facebook_groups');
    Route::get('delete_facebook_groups/{id}', [MainController::class, 'delete_facebook_groups'])->name('delete_facebook_groups');


    Route::get('alternative_tos', [MainController::class, 'alertnative_to'])->name('alertnative_to');
    Route::post('import_alertnative_to', [MainController::class, 'import_alertnative_to'])->name('import_alertnative_to');
    Route::post('update_alertnative_to', [MainController::class, 'update_alertnative_to'])->name('update_alertnative_to');
    Route::get('delete_alternative_to/{id}', [MainController::class, 'delete_alternative_to'])->name('delete_alternative_to');

//    Route::get('contacts', [MainController::class, 'contact_us'])->name('contact_us');
//    Route::get('contact_us', [MainController::class, 'contact_us'])->name('contact_us');
    Route::get('export_contact', [MainController::class, 'export_contact'])->name('contact.export');

    Route::get('subscribers', [MainController::class, 'subcribers'])->name('subscribers');
    Route::get('export_subscribers', [MainController::class, 'export_subscribers'])->name('subcribers.export');


    Route::post('payment_delete/{id}', [MainController::class, 'payment_delete'])->name('payment.delete');
    Route::post('paymentCreate', [MainController::class, 'paymentCreate'])->name('payment.create');

    Route::post('product/update/{id}', [MainController::class, 'updateProduct'])->name('product.edit.new');


});
// Route::get('/dashboard', [MainController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('add_uniques', function(){
    // $products = \App\Models\Products::all();
    // foreach ($products as $product){
    //     $product->tmp_token = uniqid();
    //     $product->save();
    // }

    //add types

    $roles = ['users','products','database','review_listing','settings'];
    foreach ($roles as $role){
        \DB::table('roles')
        ->insert([
            'name' => $role,
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

// $users = User::all();
// foreach($users as $user){
//     $user->unique_id = uniqid();
//     $user->save();
// }
});

Route::get('seed', [SeedingController::class, 'seedSettings'])->name('seed');
//product -seedr
Route::get('productSeed', [SeedingController::class, 'productSeed'])->name('productSeed');
require __DIR__.'/auth.php';

Route::get('temp-login', function(){
    Auth::loginUsingId(11);
    return redirect()->route('dashboard');
});
