<?php


namespace App\Http\Controllers\Admin;

use DOMXPath;
use DOMDocument;
use Inertia\Inertia;
use App\Models\Products;
use App\Models\ProductFind;
use App\Models\ProductListing as ProductList;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\CombineTable;
use App\Models\DealProvider;
use App\Models\DealTrend;
use App\Models\DealType;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductListingPaymentMode;
use App\Models\ProductListingTag;
use App\Models\Tag;
use App\Models\Tier;
use Illuminate\Support\Str;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = new ProductList();
        if (!isset(request()->id)) {
            $products = ProductList::with('category', 'dealType', 'user', 'product')->where('status',1)->latest();
        } else {
            $products = $products->with('category', 'dealType', 'user', 'tags', 'product')->where('status',1)->where('user_id', request()->id)->latest();
        }

        $search = request()->search;
        $products = $products->whereHas('product', function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%');
        })->paginate(20);

        $types = DealType::all();
        foreach ($products as $product) {
            if (filter_var($product->sec_image, FILTER_VALIDATE_URL)) {
                $product->sec_image = $product->sec_image;
            } else {
                preg_match('@src="([^"]+)"@', $product->sec_image, $match);
                if (isset($match[1])) {
                    $product->sec_image = $match[1];
                }
            }


        }


        return Inertia::render('ProductList', compact('products', 'types')); //
    }


    public function reviewListing()
    {

        $products = new ProductList();
        // dd($products);
        if (!isset(request()->id)) {
            $products = ProductList::with('category', 'dealType', 'user', 'product')
                // ->where('approved_at', null)
                ->latest();
        } else {
            $products = $products->with('category', 'dealType', 'user', 'tags', 'product')->where('user_id', request()->id)->latest();
        }


        $search = request()->search;
        $products = $products->whereHas('product', function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
                ->where('is_user_listed', 1);
            // ->where('approved', 0);
        })->paginate(10);

        // dd($products);

        $types = DealType::all();
        foreach ($products as $product) {
            if (filter_var($product->sec_image, FILTER_VALIDATE_URL)) {
                $product->sec_image = $product->sec_image;
            } else {
                preg_match('@src="([^"]+)"@', $product->sec_image, $match);
                if (isset($match[1])) {
                    $product->sec_image = $match[1];
                }
            }


        }


        return Inertia::render('ReviewProducts', compact('products', 'types')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = DealType::all();
        $categories = Category::all();
        $icons = DealTrend::all();
        $producttags = Tag::all();

        $products = Product::all();
        $paymentMode = PaymentMethod::get();
        return Inertia::render('ProductCreate', compact('types', 'categories', 'icons', 'producttags', 'products', 'paymentMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $products = Product::latest()->get()->take(20);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'a_description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'trend_id' => 'required|string|max:255',
            'url' => 'required',
            'tags' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath, $name);
            $url = asset('images/products/' . $name);
            // dd($url);
        }
        $product = Product::create([
            'title' => $request['title'],
            'category_id' => $request->category_id,
            'post_type_id' => $request->type,
            'tags' => $request->tags,
            'trend_id' => $request->trend_id,
            'price' => $request->price,
            'email' => auth()->user()->email ?? $request->email,
            'payments_methods' => $request->payment,
            'product_links' => $request->deal_url,
            'url' => $request->url,
            'sec_image' => $url ?? '',
            'country_code' => 'IN',
            'user_id' => auth()->user()->id,
            'description' => $request->description,
            'additional_description' => $request->a_description,
            'contact_name' => auth()->user()->name,
            'city_id' => '2325',
            'reviewed' => 0,
            'provider_id' => $request->product['provider_id'] ?? '1',
        ]);

        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $productv = ProductList::with('user', 'dealType', 'product', 'dealTrend', 'currency', 'category', 'tags')->find($id);
        $product = Product::find($productv->product_id);
        $types = DealType::all();
        $categories = Category::all();
        $icons = DealTrend::all();
        $producttags = Tag::all();

        $products = Product::all();
        $paymentMode = PaymentMethod::get();

        $paymentMode = PaymentMethod::get();
        $tiers = Tier::get();
        // dd($product);

        return Inertia::render('EditProduct', compact('product', 'types', 'categories', 'icons', 'producttags', 'products', 'paymentMode','productv','tiers'));
    }
    public function editList($id)
    {

        $productv = ProductList::with('user', 'dealType', 'product', 'dealTrend', 'currency', 'category', 'tags')->find($id);
        $product = Product::find($productv->product_id);
        $types = DealType::all();
        $categories = Category::all();
        $icons = DealTrend::all();
        $producttags = Tag::all();
        $tiers = Tier::get();
        $products = Product::all();
        $paymentMode = PaymentMethod::get();

        $paymentMode = PaymentMethod::get();
        return Inertia::render('EditProductList', compact('product', 'types', 'categories', 'icons', 'producttags', 'products', 'paymentMode','productv','tiers'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath, $name);
            $url = asset('images/products/' . $name);
            // dd($url);
        }

        // dd($request->all());

        if($request->is_new == 'true'){

            $product = new Product();
            $product->title = $request->title;
            $product->category_id = $request->category_id;
            $product->description = $request->description ?? '';
            $product->image = $url ?? $product->image;
            $product->product_url = $request->product_url ?? '';
            $product->price = $request->price;
            $product->thumbnail = $url ?? $product->thumbnail;
            $product->slug = Str::slug($request->title, '-');
            $product->url = $request->url ?? '';
            $product->license1_tier_price = $request->license1_tier_price ?? '';
            $product->license1_tier_features = $request->license1_tier_features ?? '';
            $product->license2_tier_price = $request->license2_tier_price ?? '';
            $product->license2_tier_features = $request->license2_tier_features ?? '';
            $product->license3_tier_price = $request->license3_tier_price ?? '';
            $product->license3_tier_features = $request->license3_tier_features ?? '';
            $product->tldr = $request->tldr ?? '';
            $product->about_all = $request->about_all ?? '';
            $product->is_user_listed = 0;
            $product->save();

            $productv = ProductList::find($request->listing_id);
            $productv->product_id = $product->id;
            $productv->save();


        }else{


        if($request->new_pb_id){
            $product = ProductList::find($request->listing_id);
            $product->product_id = $request->new_pb_id;
            $product->save();
            $product = Product::find($request->product_id);
            $product->title = $request->title;
            $product->category_id = $request->category_id;
            $product->description = $request->description ?? '';
            $product->image = $url ?? $product->image;
            $product->product_url = $request->product_url ?? '';
            $product->price = $request->price;
            $product->thumbnail = $url ?? $product->thumbnail;
            $product->url = $request->url ?? '';
            $product->license1_tier_price = $request->license1_tier_price ?? '';
            $product->license1_tier_features = $request->license1_tier_features ?? '';
            $product->license2_tier_price = $request->license2_tier_price ?? '';
            $product->license2_tier_features = $request->license2_tier_features ?? '';
            $product->license3_tier_price = $request->license3_tier_price ?? '';
            $product->license3_tier_features = $request->license3_tier_features ?? '';
            $product->tldr = $request->tldr ?? '';
            $product->about_all = $request->about_all ?? '';
            $product->is_user_listed = 0;
            $product->save();

        }
            // dd($product, $request->all());



    }


        return redirect()->back()->with('success', 'Product Updated Successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    /**
     * delete
     *
     * @param mixed $id
     * @return void
     */
    public function delete($id)
    {
        $product = ProductList::find($id);
        $product->delete();
        return redirect()->route('products');
    }

    public function deleteProducts($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }


    /**
     * bidProducts
     *
     * @return void
     */
    public function bidProducts()
    {
        $products = ProductList::with('users')->latest()->get();

        return Inertia::render('ProductList', compact('products'));
    }

    /**
     * productFind
     *
     * @return void
     */
    public function productFind()
    {
        $productFinds = ProductFind::get();
        return Inertia::render('ProductFind', compact('productFinds'));
    }

    public function createProductFind(Request $request)
    {
        $product = new ProductFind();
        $product->product_name = $request->name;
        $product->url = $request->url;
        $product->hash_tag = $request->hash_tag;
        $product->save();
        return redirect()->route('productFind');
    }

    /**
     * productTypes
     *
     * @return void
     */
    public function productTypes()
    {
        $productTypes = DealType::get();
        return Inertia::render('ProductType', compact('productTypes'));
    }

    /**
     * productTypeEdit
     *
     * @param mixed $id
     * @return void
     */
    public function productTypeEdit($id)
    {

        $productType = DealType::find($id);

        return Inertia::render('EditProductType', compact('productType'));
    }


    /**
     * createProductType
     *
     * @param mixed $request
     * @return void
     */
    public function createProductType(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        //db wihtout model
        $last_category_row = DB::table('combine_tables')
            ->where('deal_type', '!=', null)
            ->orderBy('id', 'desc')->first();
        if ($last_category_row) {
            //create next row with category
            $next_row = $last_category_row->id + 1;
            if (DB::table('combine_tables')
                ->where('id', $next_row)->exists()) {
                //if row exists
                DB::table('combine_tables')
                    ->where('id', $next_row)
                    ->update(['deal_type' => $request->title]);
            } else {
                // dd('row not exists');
                //if row not exists
                DB::table('combine_tables')->insert([
                    'id' => $next_row,
                    'deal_type' => $request->title,
                ]);

            }
            // $table = new CombineTable();
            // $table->id = $next_row;
            // $table->category = $request->name;
            // $table->save();

            // dd($table);

        }

        return response()->json(['success' => 'Product Type Created successfully.']);

    }

    public function productTypeUpdate(Request $request, $id)
    {

        $product = DealType::where('id', $id);
        $product = $product->update([
            "title" => $request->title,

        ]);
        if ($product) {
            return redirect()->back()->with('success', 'Product type updated successfully');
        } else {
            return redirect()->back()->with('error', 'Product type not updated');
        }
    }

    public function deleteProductType($id)
    {
        $product = DealType::destroy($id);
        return redirect()->back();
    }

    /**
     * createEdit
     *
     * @param mixed $id
     * @return void
     */
    public function createEdit($id)
    {
        $types = DealType::get();

        $categories = Category::get();
        $tag_data = Tag::get();
        $providerMaster = DealProvider::get();
        $paymentMode = PaymentMethod::get();
        $productv = Product::find($id);
        return Inertia::render('EditProductList', compact('productv', 'types', 'categories', 'tag_data', 'providerMaster', 'paymentMode'));
    }

    /**
     * createProductList
     *
     * @return void
     */
    public function createProductList()
    {
        $types = DealType::get();

        $categories = Category::get();
        $tag_data = Tag::get();
        $providerMaster = DealProvider::get();
        $paymentMode = PaymentMethod::get();
        $products = Product::latest()->get();
        return Inertia::render('ProductListCreate', compact('types', 'products', 'categories', 'providerMaster', 'paymentMode', 'tag_data'));
    }
    public function exportProductList()
    {
        $products = Product::with('tags','dealProvider')->latest()->get();

        $n=1;
    $productDetails = [];
        foreach($products as $key=>$value){
            $productDetails[$key]['id'] = $n;
            $productDetails[$key]['title'] =  $value->title;
            $productDetails[$key]['category'] =  $value->category->title;

            $productDetails[$key]['tag'] =  isset($value->tags) ? $value->tags->title : '';
            $productDetails[$key]['price'] =  $value->price;
            $productDetails[$key]['img_url'] = $value->img_url;
            $productDetails[$key]['description'] =  $value->description;
            $productDetails[$key]['product_url'] = $value->product_url;;
            $productDetails[$key]['url'] = $value->url;
            $productDetails[$key]['license1_tier_price'] =  $value->license1_tier_price;
            $productDetails[$key]['license1_tier_features'] =  $value->license1_tier_features;
            $productDetails[$key]['license2_tier_price'] =  $value->license2_tier_price;
            $productDetails[$key]['license2_tier_features'] =  $value->license_2_tier_features;
            $productDetails[$key]['license3_tier_price'] =  $value->license3_tier_price;
            $productDetails[$key]['license3_tier_features'] =  $value->license3_tier_features;
            $productDetails[$key]['tldr'] =  $value->tldr;
            $productDetails[$key]['about_all'] = $value->about_all;
            $n++;
        }
        $filename = 'product_listing'.date('Y-m-d_H-i-s').'.csv';
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$filename,
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];
        $data = [
            ['ID', 'title', 'category', 'tag', 'price', 'img_url', 'description', 'product_url', 'url', 'license_1_tier_price',
             'license_1_tier_features', 'license_2_tier_price', 'license_2_tier_features' ,'license_3_tier_price','license_3_tier_features','tldr','about_all']
        ];


             foreach($productDetails as $pr){
                $data[] = [
                  $pr['title'],
                  $pr['category'],
                  $pr['tag'],
                  $pr['price'],
                  $pr['img_url'],
                  $pr['description'],
                  $pr['product_url'],
                  $pr['url'],
                  $pr['license1_tier_price'],
                  $pr['license1_tier_features'],
                  $pr['license2_tier_price'],
                  $pr['license2_tier_features'],
                  $pr['license3_tier_price'],
                  $pr['license3_tier_features'],
                  $pr['tldr'],
                  $pr['about_all'],
              ];
           }

        $callback = function() use ($data)
        {
            $fp = fopen('php://output', 'w');

            foreach ($data as $fields) {
                fputcsv($fp, $fields);
            }

            fclose($fp);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function storeUpdate(Request $request, $id)
    {




        $productList = ProductList::find($request->listing_id);
        $product = Product::find($request->product_id);

        $productList->product_id = $request->product_id;
        $productList->deal_type_id  = $request->deal_type_id;
        $productList->category_id  = $request->category_id;
        $productList->deal_trend_id  = $request->deal_trend_id;
        $productList->price  = $request->price;
        $productList->currency_id  = 1;
        $productList->notes  = $request->about_all;
        $productList->deal_url  = $product->url;
        $productList->product_url  = $product->url;
        $productList->additional_description  = $request->additional_description;

        $productList->status  = '1';
        $productList->tier_id  = $request->tier_id ? $request->tier_id:  $productList->tier_id;
        $productList->save();
        if($request->tags){
            $tags = (explode(',', $request->tags));
            foreach ($tags as $tag) {
                ProductListingTag::where('id',$request->listing_id)->update([
                    'product_listing_id' => $request->listing_id,
                    'tag_id' => $tag
                ]);
            }

        }
        if($request->payment_method_id){
            $payment_method_id = (explode(',', $request->payment_method_id));
            foreach ($payment_method_id as $method) {
                ProductListingPaymentMode::where('id',$request->listing_id)->update([
                    'product_listing_id' => $request->listing_id,
                    'payment_method_id' => $method
                ]);
            }
        }

        // if ($request->product_image) {
        //     $imageName = time() . '.' . $request->product_image->extension();
        //     $request->product_image->move(public_path('images'), $imageName);
        //     $image = asset('images/' . $imageName);
        // }

        // $product = Product::find($request->product_id);
        // dd($product);
        // $product->save();

        //
    }

    /**
     * storeProductList
     *
     * @param mixed $request
     * @return void
     */
    public function storeProductList(Request $request)
    {

      $request->validate([
        'title' => 'required',
      ]);
        if ($request->hasFile('fileX')) {
            $image = $request->file('fileX');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/sliders');
            $image->move($destinationPath, $name);
            $url = asset('images/sliders/' . $name);
            // dd($url);
        }
// dd($request->all());
        $product = new Product();
       $product->title = $request->title;
       $product->category_id = $request->category_id;
       $product->image =  $url ?? 'https://admin.dealcode.org/images/default_image.png';
       $product->description = $request->description ?? '';
       $product->deal_provider_id = $request->deal_provider_id;
       $product->price = $request->price;
       $product->product_url = $request->product_url;
       $product->slug = Str::slug($request->title);
       $product->uuid = $request->uuid;
       $product->url = $request->url;
       $product->license1_tier_price = $request->license1_tier_price;
       $product->license1_tier_features = $request->license1_tier_features;
       $product->license2_tier_price = $request->license2_tier_price;
       $product->license2_tier_features = $request->license2_tier_features;
       $product->license3_tier_price = $request->license3_tier_price;
       $product->license3_tier_features = $request->license3_tier_features;
       $product->tldr = $request->tldr;
       $product->about_all = $request->about_all;
       $product->save();
        return redirect()->back();
    }

    public function userProduct()
    {
        $products = new ProductList();
        if (!isset(request()->id)) {
            $products = ProductList::with('users')->latest();
        } else {
            $products = $products->with('users')->where('user_id', request()->id)->latest();
        }
        $products = $products->get();
        //  $types = ProductType::all();
        $types = CombineTable::Select('deal_type', 'id')->orWhereNotNull('deal_type')->get();
        foreach ($products as $product) {
            if (filter_var($product->sec_image, FILTER_VALIDATE_URL)) {
                $product->sec_image = $product->sec_image;
            } else {
                preg_match('@src="([^"]+)"@', $product->sec_image, $match);
                if (isset($match[1])) {
                    $product->sec_image = $match[1];
                }
            }
            // $product->imagesc =
        }

        return Inertia::render('ProductList', compact('products', 'types'));
    }
    public function listStatusUpdate(){
        $product = ProductList::find(request()->id);

        $product->status = request()->status==1 ? 0 : 1;

        $product->save();
        return redirect()->back();
    }
}
