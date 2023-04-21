<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Slider;
use App\Models\Tables;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Sliders;
use App\Models\Category;
use App\Models\Currency;
use App\Models\RateUser;
use App\Models\UserType;
use App\Models\DealTrend;
use App\Models\OpSystems;
use App\Models\Profession;
use App\Models\ReportType;
use App\Models\Subscriber;
use App\Models\ProductList;
use App\Models\DealProvider;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\AlternativeTo;
use App\Models\FacebookGroup;
use App\Models\PaymentMethod;
use App\Models\RolesPermission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AdminLink;
use App\Models\DiscontinuedProduct;
use App\Models\InterestingLink;
use App\Models\KnownIssue;
use App\Models\Message;
use App\Models\Pricing;
use Illuminate\Support\Facades\Hash;
use App\Models\ProductListing as Products;
use App\Models\ProductListing;
use App\Models\ResellerList;
use App\Models\Subscription as Subscriptions;
use App\Models\Tag;
use App\Models\Transaction;
use App\Models\UserReviews;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;
class MainController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * getUserIpAddr
     *
     * @return void
     */
    public function getUserIpAddr(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
     }

     /**
      * userType
      *
      * @return void
      */
     public function userType(){
        $types = UserType::get(['id', 'title as name']);
        return Inertia::render('UserType', compact('types'));
     }

     public function import_user_type(Request $request){
        // dd($request->all());
        $request->validate([
            // 'file' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('file');

        if ($file) {
            $id = time();
            $location = 'uploads'; //Created an "uploads" folder for that
            $extension = $file->getClientOriginalExtension();
            $filename = 'pb_lists-'. $id. '.' . $extension;
            $file->move('uploads/', $filename);

            $filepath = 'uploads/' . $filename;

            $file = fopen($filepath, "r");
            // dd($file);
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
            //Read the contents of the uploaded file
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);
            // Skip first row (Remove below comment if you want to skip the first row)
            if ($i == 0) {
            $i++;
            continue;
            }
            for ($c = 0; $c < $num; $c++) {
            $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
            }
            fclose($file); //Close after reading$j = 0;
            // dd($importData_arr);
            foreach ($importData_arr as $row) {
                UserType::create(['title' => $row[1]]);
           try {
            DB::beginTransaction();



            DB::commit();
            } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            }

            }


    }else{

    }

    return redirect()->back()->withSuccess('User Type Imported Successfully');
    }

     /**
      * import_opsystems
      *
      * @param  mixed $request
      * @return void
      */
     public function import_opsystems(Request $request){
        // dd($request->all());
        $request->validate([
            // 'file' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('file');

        if ($file) {
            $id = time();
            $location = 'uploads'; //Created an "uploads" folder for that
            $extension = $file->getClientOriginalExtension();
            $filename = 'pb_lists-'. $id. '.' . $extension;
            $file->move('uploads/', $filename);

            $filepath = 'uploads/' . $filename;

            $file = fopen($filepath, "r");
            // dd($file);
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
            //Read the contents of the uploaded file
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);
            // Skip first row (Remove below comment if you want to skip the first row)
            if ($i == 0) {
            $i++;
            continue;
            }
            for ($c = 0; $c < $num; $c++) {
            $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
            }
            fclose($file); //Close after reading$j = 0;
            // dd($importData_arr);
            foreach ($importData_arr as $row) {
                OpSystems::create(['title' => $row[1]]);
           try {
            DB::beginTransaction();



            DB::commit();
            } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            }

            }


    }else{

    }

    return redirect()->back()->withSuccess('User Type Imported Successfully');
     }


     /**
      * facebook_groups
      *
      * @return void
      */
     public function    facebook_groups(){
        $groups = FacebookGroup::all();
        return Inertia::render('FacebookGroups', compact('groups'));
     }


     public function import_facebook_groups(Request $request){
        // dd($request->all());
        $request->validate([
            // 'file' => 'required|mimes:xls,xlsx'
        ]);
        $facebookGroup = new FacebookGroup();
        $facebookGroup->name = $request->group_name;
        $facebookGroup->link = $request->url;
        $facebookGroup->save();

    return redirect()->back()->withSuccess('User Type Imported Successfully');
     }

     public function delete_facebook_groups($id){
        FacebookGroup::where('id',$id)->first()->delete();
        return redirect()->back()->withSuccess('Deleted Successfully');
     }
     public function delete_currency($id){
        $currency = Currency::find($id);
        $currency->delete();
        return redirect()->back()->withSuccess('Currency Deleted Successfully');
     }

     public function create_or_edit_currency(Request $request){
        // dd($request->all());
        if($request->id){
            $currency = Currency::find($request->id);
            unset($request['id']);
            $currency->update($request->all());
            return redirect()->back()->withSuccess('Currency Updated Successfully');
        }else{
            unset($request['id']);
            Currency::create($request->all());
            return redirect()->back()->withSuccess('Currency Created Successfully');
        }

     }
     /**
      * alertnative_to
      *
      * @return void
      */
     public function alertnative_to(){

        $alternatives =  AlternativeTo::all();
        return Inertia::render('AlternativeTo', compact('alternatives'));
     }

     public function update_alertnative_to(Request $request){
        try {
            // DB::beginTransaction();
            $alternative_tos =AlternativeTo::where('id',$request->id)->first();
            $alternative_tos->title = $request->title;
            $alternative_tos->link = $request->url;
            $alternative_tos->hashtag = $request->hashtag;
            $alternative_tos->save();
            return redirect()->back()->withSuccess('User Type Imported Successfully');

                DB::commit();
        } catch (\Exception $e) {
        //throw $th;
        dd($e);
        DB::rollBack();
        }
     }
     public function import_alertnative_to(Request $request){
                    try {
                        // DB::beginTransaction();
                        $alternative_tos =new  AlternativeTo();
                        $alternative_tos->title = $request->title;
                        $alternative_tos->link = $request->url;
                        $alternative_tos->hashtag = $request->hashtag;
                        $alternative_tos->save();

                    //  dd(AlternativeTo::create(['title' => $request->title, 'link' => $request->url, 'hashtag' => $request->hashtag]));

  return redirect()->back()->withSuccess('User Type Imported Successfully');

                DB::commit();
                } catch (\Exception $e) {
                //throw $th;
                dd($e);
                DB::rollBack();
                }

    //     if ($file) {
    //         $id = time();
    //         $location = 'uploads'; //Created an "uploads" folder for that
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = 'pb_lists-'. $id. '.' . $extension;
    //         $file->move('uploads/', $filename);

    //         $filepath = 'uploads/' . $filename;

    //         $file = fopen($filepath, "r");
    //         // dd($file);
    //         $importData_arr = array(); // Read through the file and store the contents as an array
    //         $i = 0;
    //         //Read the contents of the uploaded file
    //         while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
    //         $num = count($filedata);
    //         // Skip first row (Remove below comment if you want to skip the first row)
    //         if ($i == 0) {
    //         $i++;
    //         continue;
    //         }
    //         for ($c = 0; $c < $num; $c++) {
    //         $importData_arr[$i][] = $filedata[$c];
    //         }
    //         $i++;
    //         }
    //         fclose($file); //Close after reading$j = 0;
    //         // dd($importData_arr);
    //         foreach ($importData_arr as $row) {


    //         }


    // }else{

    // }


     }
     function delete_alternative_to($id){
        $alternative_tos =AlternativeTo::where('id',$id)->delete();
        return redirect()->back()->withSuccess('User Type Imported Successfully');
     }
    /**
     * dashboard
     *
     * @return void
     */
    public function dashboard(){
        $new_users_this_month = User::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count(); // month
        $new_products_this_month = Products::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();
        // $avarage_rating = RateUser::avg('rate');
        $avarage_price = Products::avg('price');
        $total_amount = Products::sum('price');
        $total_active_posts = Products::count();
        $total_deals = Products::count();
        // dd($total_active_posts);

        // dd($avarage_price);
        $total_users = User::count();
        $latest_five_users = User::latest()->limit(5)->get();
        foreach($latest_five_users as $user){
            $user->created_at_mod = Carbon::parse($user->created_at)->format('d M Y');
        }

        $latest_five_products = Products::with('user','dealType', 'product')
        ->latest()->limit(5)->get();
        // dd($latest_five_products);
        foreach($latest_five_products as $product){
            $product->created_at_mod = Carbon::parse($product->created_at)->format('d M Y');
        }
        $start_time = microtime(true);
        $load = number_format(microtime(true) - $start_time, 2);
        // dd($load);
        // dd($latest_five_products);
        $product_count = Products::count();
        return Inertia::render('Dashboard', compact('total_deals','total_active_posts','total_amount','avarage_price','new_users_this_month', 'new_products_this_month', 'total_users', 'latest_five_users', 'latest_five_products', 'product_count'));
    }


    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id){

        $current_user = auth()->user();
        $user = User::find($id);
        // $user->device_key = Carbon::parse($user->created_at)->format('d M Y');

        return Inertia::render('EditUser', compact('user', 'current_user'));
    }

    /**
     * update
     *
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id){

        $user = User::find($id);

        $user->user_name = $request->username;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->device_key = $request->device_key;
        $user->name = $request->name;
        $user->ip_address = $this->getUserIpAddr();
        $user->save();

        if($user){
            return redirect()->back()->with('success', 'User updated successfully');
        }else{
            return redirect()->back()->with('error', 'User not updated');
        }
    }
    /**
     * users
     *
     * @return void
     */
    public function users(){


        // dd(auth()->user()->roles);

        $users = User::whereNotNull('email')->latest()->get();
        foreach($users as $user){
            $user->created_at_mod = Carbon::parse($user->created_at)->format('d M Y');
            //last_login_at time ago
            $user->last_login_at_mod = $user->last_login_at ? Carbon::parse($user->last_login_at)->diffForHumans() : '';
        }
        $front_end_url = config('app.front_end_url');
        $current_user = auth()->user();
        return Inertia::render('Users', compact('users', 'front_end_url','current_user'));
    }

    public function change_user_status($id){
        $user = User::find($id);
        if($user->status == 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();
        // return redirect()->back()->with('success', 'User status updated successfully');
    }

    public function update_user_role($id, Request $request){
        // dd($id);
        $add = RolesPermission::where('user_id', $id)->first();
        if($add){
            $add->roles = json_encode($request->permissons);
            $add->save();
        }else{
            $add = new RolesPermission();
            $add->user_id = $id;
            $add->roles = json_encode($request->permissons);
            $add->save();
        }
    }

    /**
     * change_user_role
     *
     * @param  mixed $id
     * @return void
     */
    public function change_user_role($id){
        $user = User::find($id);
        if($user->is_admin == 1){
            $user->is_admin = 0;
        }else{
            $user->is_admin = 1;
        }
        $user->save();
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users');
    }

    /**
     * tables
     *
     * @return void
     */
    public function tables(){

        $data = DB::select('SHOW TABLES');
        \DB::connection()->getPDO();
        $db = \DB::connection()->getDatabaseName();

        foreach($data as $table){
            $table_name = 'Tables_in_'.$db;

            $table->name = $table->$table_name;
        }
        unset($data[0],$data[3],$data[5],$data[12],$data[15],$data[16],$data[17],$data[18],$data[21],$data[22],$data[23],$data[26]
        ,$data[27],$data[28],$data[29],$data[30],$data[31],$data[35],$data[36],$data[37]
        ,$data[40],$data[41],$data[42],$data[43],$data[46],$data[47],$data[49],$data[53],$data[54],$data[55],$data[45]);

        // unset($data[0]);
        // dd($data);
        return Inertia::render('Tables', compact('data'));
    }
    public function products(){
        $products = ProductList::with('categories','product_type','provider')->latest()->get();
       
        return Inertia::render('ProductList', compact('products'));
    }
    /**
     * createTable
     *
     * @param  mixed $request
     * @return void
     */
    public function createTable(Request $request){
        //validate
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $table = new Tables();
        $table->name = $request->name;
        $table->url = isset($request->url) ? $request->url : '';
        $table->save();
        return redirect()->route('tables');
    }

    /**
     * updateTable
     *
     * @param  mixed $request
     * @param  mixed $idwhataana$$
     * @return void
     */
    public function updateTable(Request $request, $id){
        $table = Tables::find($id);
        $table->name = $request->name;
        $table->url =  isset($request->url) ? $request->url : '';
        $table->save();
        return redirect()->route('tables');
    }
    /**
     * tags
     *
     * @return void
     */
    public function tags(){
        $datas = Tag::orderBy('title','asc')->get();

        return Inertia::render('Tags', compact('datas'));
    }
    public function createTag(Request $request){
        //validate
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        //db wihtout model
        Tag::create([
            'title' => $request->name,

        ]);

        return redirect()->route('tags');
    }
    public function deleteTag($id){
        $datas = Tag::find($id);
        $datas->delete();
        return redirect()->route('tags');
    }
 /**
     * transactions
     *
     * @return void
     */
    public function transactions(){
        $datas = Transaction::with('productListing.product','user')
        ->when(request()->input('search'), function ($query, $value) {

            $query->where('productListing.product.title', 'Like', '%' . $value . '%')->get();
            // dd($query->get());
        })->paginate(10);
        foreach($datas as $data){
            $data['sold'] = $data->sold_date->format('d-M-Y');
        } $filters =  request()->only(['search']);
        return Inertia::render('Transaction', compact('datas','filters'));
    }



    /**
     * categories
     *
     * @return void
     */
    public function categories(){
        $datas = Category::orderBy('title','asc')->get();
        return Inertia::render('Categories', compact('datas'));
    }

    /**
     * createCategory
     *
     * @param  mixed $request
     * @return void
     */
    public function createCategory(Request $request){
        //validate
        $slug = Str::slug($request->name);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        //db wihtout model
        Category::create([
            'title' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('categories');
    }

    /**
     * updateCategory
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateCategory(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $data = DB::table('categories')->where('id', $id)->update([
            'title' => $request->name,
            'slug' => Str::slug($request->name),

        ]);

    }

    /**
     * deleteCategory
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteCategory($id){
        $datas = Category::find($id);
        $datas->delete();
        return redirect()->route('categories');
    }

    /**
     * pendingProducts
     *
     * @return void
     */
    public function pendingProducts(){
        $url = config('app.front_end_url');
        $products = Product::where('is_user_listed', 1)
        ->where('approved', 0)
        ->latest()->get();
        // dd($products);
        return Inertia::render('PendingProducts', compact('products', 'url'));
    }

    /**
     * approveOrRejectProduct
     *
     * @param  mixed $id
     * @return void
     */

    public function approveOrRejectProduct($id){
        $product = Product::find($id);
        $product->is_user_listed = 0;
        $product->save();
        // dd($product);
        return redirect()->back();
    }

    /**
     * settings
     *
     * @return void
     */
    public function settings(){
        $setting = DB::table('settings')->first();
        $fb = DB::table('settings')->where('id', 10)->first();
        $fbs = json_decode($fb->value ?? '') ?? [];
        $settings = json_decode($setting->value ?? '') ?? [];
        $user = auth()->user();
        return Inertia::render('Settings', compact('settings', 'user', 'fbs'));
    }

    /**
     * updateSettings
     *
     * @param  mixed $request
     * @return void
     */
    public function updateSettings(Request $request){

        $setting = DB::table('settings')->first();
        $setting->value = json_encode($request->all());
        $setting->save();
        return redirect()->route('settings')->with('success', 'Settings updated successfully');
    }

    /**
     * providers
     *
     * @return void
     */
    public function providers(){
        $providers = DealProvider::latest()->get();
        return Inertia::render('Providers', compact('providers'));
    }

    /**
     * deleteProvider
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteProvider($id){
        $provider = DealProvider::find($id);
        $provider->delete();
        return redirect()->route('providers');
    }

    /**
     * updateProvider
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateProvider(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|max:255',
            'code' => 'required|max:255',
            'description' => 'required|max:255',
            // 'email' => 'required|max:255',
            // 'contactname' => 'required|max:255',
        ]);

        $provider = DealProvider::find($id);
        $provider->title = $request->name;
        $provider->link = $request->link;
        $provider->code = $request->code;
        $provider->type = 'seller';
        $provider->short_description = $request->description;
        $provider->save();

    }

    /**
     * createProvider
     *
     * @param  mixed $request
     * @return void
     */
    public function createProvider(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|max:255',
            'code' => 'required|max:255',
            'description' => 'required|max:255',
            // 'email' => 'required|max:255',
            // 'contactname' => 'required|max:255',
        ]);
        // $code = 'PV'. rand(1000, 9999);
        $provider = new DealProvider();
        $provider->title = $request->name;
        $provider->link = $request->link;
        $provider->code = $request->code;
        $provider->type = 'seller';
        $provider->short_description = $request->description;
        $provider->save();
    }

    /**
     * opsystems
     *
     * @return void
     */
    public function opsystems(){
        $opsystems = OpSystems::get(['id', 'title as name']);
        return Inertia::render('Opsystems', compact('opsystems'));
    }
    /**
     * metaTags
     *
     * @return void
     */
    public function metaTags(){
        $metaTags = DB::table('meta_tags')->get();
        return Inertia::render('MetaTags', compact('metaTags'));
    }

    /**
     * updateMetaTags
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateMetaTags(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'id' => 'required'

        ]);

        $id = $request->id;

        $metaTag = DB::table('meta_tags')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            // 'updated_at' => now(),
        ]);
    }

    /**
     * createMetaTags
     *
     * @param  mixed $request
     * @return void
     */
    public function createMetaTags(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
        $metaTag = DB::table('meta_tags')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'page' => $request->name,
            'active' => 1,
        ]);
    }

    /**
     * deleteMetaTags
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteMetaTags(Request $request){
        $request->validate([
            'id' => 'required'
        ]);
        $id = $request->id;
        $metaTag = DB::table('meta_tags')->where('id', $id)->delete();
        return redirect()->route('meta-tags');
    }

    /**
     * paymentMethods
     *
     * @return void
     */
    public function paymentMethods(){
        $paymentMethods = PaymentMethod::get();
        return Inertia::render('PaymentMethods', compact('paymentMethods'));
    }

    /**
     * countries
     *
     * @return void
     */
    public function countries(){
        $paymentMethods = DB::table('countries')->get();
        foreach ($paymentMethods as $key => $value) {
            $value->names = json_decode($value->name)->en;
        }
        // dd($paymentMethods);
        return Inertia::render('Countries', compact('paymentMethods'));
    }

    /**
     * sliders
     *
     * @return void
     */
    public function sliders(){
        $sliders = Slider::all();
        return Inertia::render('Sliders', compact('sliders'));
    }

    /**
     * createSlider
     *
     * @param  mixed $request
     * @return void
     */
    public function createSlider(Request $request){

        // dd($request->all());
        $image = $request->file('image');
        $name = time().'.'. 'png';
        $destinationPath = public_path('/images/sliders');
        $image->move($destinationPath, $name);
        $url = asset('images/sliders/'.$name);
        // dd($url);


        $slider = Slider::create([
            'link' => $request->link,
            'image' => $url,
        ]);

        return redirect()->route('sliders');


    }

    /**
     * updateSlider
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateSlider(Request $request, $id){
        $request->validate([
            // 'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $slider = Slider::find($id);
        $image = $request->file('image');
        if($image){
        $name = time().'.'. 'png';
        $destinationPath = public_path('/images/sliders');
        $image->move($destinationPath, $name);
        $url = asset('images/sliders/'.$name);
        $slider->image = $url;
        }
        // $slider->link = $request->title;
        $slider->link = $request->link;
        $slider->save();
        return redirect()->route('sliders');
        // dd($slider);
    }

    /**
     * deleteSlider
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteSlider($id){
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('sliders');
    }

    /**
     * updateSliderStatus
     *
     * @param  mixed $id
     * @return void
     */
    public function updateSliderStatus($id){
        $slider = Slider::find($id);
        $slider->status = $slider->status == 1 ? 0 : 1;
        $slider->save();
    }

    /**
     * blacklistWords
     *
     * @return void
     */
    public function blacklistWords(){
        $datas = DB::table('blacklist')->get();
        return Inertia::render('BlacklistWords', compact('datas'));
    }

    /**
     * createBlacklistWord
     *
     * @param  mixed $request
     * @return void
     */
    public function createBlacklistWord(Request $request){
        // dd($request->all());
        $request->validate([
            'word' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);
        $word = $request->word;
        $blacklist = DB::table('blacklist')->insert([
            'entry' => $word,
            'type' => $request->type,
        ]);
    }

    /**
     * updateBlacklistWord
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateBlacklistWord(Request $request, $id){
        $request->validate([
            'word' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $word = $request->word;
        $blacklist = DB::table('blacklist')->where('id', $id)->update([
            'entry' => $word,
            'type' => $request->type,
        ]);
    }

    /**
     * deleteBlacklistWord
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteBlacklistWord($id){
        $blacklist = DB::table('blacklist')->where('id', $id)->delete();
    }

    public function dealtrends(){
        $data = DealTrend::all();
        return Inertia::render('DealTrends', compact('data'));
    }

    /**
     * deleteTable
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteTable($id){
        $table = DB::table('tables')->where('id', $id)->delete();

    }


 /**
     * pages
     *
     * @return void
     */
    public function pricings(){
        $pricings = Pricing::with('products')
        ->when(request()->input('search'), function ($query, $value) {
          
            $query->where('product_name', 'Like', '%' . $value . '%');
            // dd($query->get());
        })->latest()->paginate(10);
        $categories = Category::get();

        $filters =  request()->only(['search']);
        return Inertia::render('Pricing', [
            'pricings' => $pricings,
            'categories' => $categories,
            'filters' => $filters,
        ]);
   
    }
    public function createPricing(Request $request){

        $interestingLinks = Pricing::create($request->all());
        return redirect()->back();
     }
     public function updatePricing(Request $request){
        $product = new Product();
        $product->title = $request->editname;
        $product->description = $request->description;
        $product->price = $request->editprice;
        $product->category_id = $request->category_id;
        $product->slug = Str::slug($request->editname);
        $product->license1_tier_price = $request->editprice;
        $product->uuid =  Str::uuid();
        $product->image = 'https://admin-staging.dealcode.org/images/default_image.png';
        $product->save();
         $products = Pricing::where('id',$request->edit_id)->update([
            'product_id' => $product->id,
             'product_name' => $request->editname,
             'price' => $request->editprice,
             'tier' => $request->editprice,
         ]);
         return redirect()->back();
      }
      public function deletePricing(Request $request){
 
         $products =Pricing::where('id',$request->id)->delete();
         return redirect()->back();
      }

      public function importPricing(Request $request){
    
        $file = $request->fileX;
     
        if ($file) {
          
            $id = time();
            $location = 'uploads'; //Created an "uploads" folder for that
            $extension = $file->getClientOriginalExtension();
            $filename = 'pb_lists-'. $id. '.' . $extension;
            $file->move('uploads/', $filename);

            $filepath = 'uploads/' . $filename;

            // dd(Excel::import(new ProductImport, 'pb.xlsx'));


            $file = fopen($filepath, "r");
            // dd($file);
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
            //Read the contents of the uploaded file
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);
            // Skip first row (Remove below comment if you want to skip the first row)
            if ($i == 0) {
            $i++;
            continue;
            }
            for ($c = 0; $c < $num; $c++) {
            $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
            }
            fclose($file); //Close after reading$j = 0;
            // dd($importData_arr);
            foreach ($importData_arr as $row) {
                $provider_code = $importData_arr[1][2];

                if(!isset($row[4]) OR !$row[4]){
                    continue;
                }

           try {
    
            DB::beginTransaction();
            $product = new Product();
            $product->title = $row[2];
            $product->category_id = $row[1] ? $row[1] : 22 ;
            $product->slug = Str::slug($row[2],'-');
            $product->price = $row[3] ?? 0;
            $product->thumbnail = $row[12] ?? asset('/images/default_image.png');
            $product->image = $row[12] ?? asset('/images/default_image.png');
            $product->description = $row[4] ?? '';
            $product->license1_tier_price =  $row[3];

            $product->save();
            $pricing = new Pricing();
            $pricing->product_id = $product->id;
            $pricing->product_name = $row[2];   
            $pricing->price = $row[3] ?? 0;
            $pricing->tier = $row[5] ?? 0;
            $pricing->reseller = $row[4] ?? 0;
            $pricing->notes = $row[5] ?? 0;
            $pricing->save();
            DB::commit();
            } catch (\Exception $e) {
            //throw $th;
            dd($e);
            DB::rollBack();
            }

            }










    }else{

    }
      }
/**
     * Interesting Links
     *
     * @return void
     */
    public function interestingLinks(){
        $interestingLinks = InterestingLink::get();

        return Inertia::render('InterestingLink', compact('interestingLinks'));
    }
    public function storeLinks(Request $request){

        $interestingLinks = InterestingLink::create($request->all());
        return redirect()->back();
     }
     public function updateLinks(Request $request){
 
         $products = InterestingLink::where('id',$request->edit_id)->update([
             'link_name' => $request->editlink_name,
             'link_url' => $request->editlink_url,
 
         ]);
         return redirect()->back();
      }
      public function deleteLinks(Request $request){
 
         $products = InterestingLink::where('id',$request->id)->delete();
         return redirect()->back();
      }
    /**
     * pages
     *
     * @return void
     */
    public function pages(){
        $pages = Page::get(['id', 'title as name', 'slug', 'content']);
        return Inertia::render('Pages', compact('pages'));
    }

    /**
     * createPage
     *
     * @param  mixed $request
     * @return void
     */
    public function createPage(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required',

        ]);

        $page = DB::table('pages')->insert([
            'title' => $request->name,
            'content' => $request->content,
            'slug' => $request->slug,
        ]);

    }
    public function currencies(){
        $currencies = Currency::get(['id', 'title as name', 'symbol']);
        return Inertia::render('Currency', compact('currencies'));
    }
    public function professions(){
        $professions = Profession::get(['id', 'title as name']);
        return Inertia::render('Profession', compact('professions'));
    }

    /**
     * updatePage
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */

    public function updatePage(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required',
            // 'type' => 'required|string|max:255',
        ]);
        $page = Page::find($id);
        $page->title = $request->name;
        $page->slug = $request->slug ??  $page->slug;
        $page->content = $request->content;
        $page->save();

    }


    /**
     * deletePage
     *
     * @param  mixed $id
     * @return void
     */

    public function deletePage($id){
        $page = DB::table('pages')->where('id', $id)->delete();
    }

    /**
     * productLists
     *
     * @return void
     */

     public function reviewProducts(){
        $products = Product::with('category','dealProvider','tags')
        ->where('approved', 0)->where('is_user_listed', 1)
        ->latest()
        ->when(request()->input('search'),function($query, $search) {
            $query->where('title','like','%'.$search.'%');

        })
        ->paginate(10);
        // dd($products);
        $categories = Category::get(['id', 'title as name']);
        return Inertia::render('ReviewProducts', compact('products', 'categories'));
     }


    public function productLists(){

        $products = Product::with('category','dealProvider','tags')
        ->latest()
        ->when(request()->input('search'),function($query, $search) {

            $query->where('title','like','%'.$search.'%');

        })
        ->paginate(10);
       
        $categories = Category::get();
      
        $dealProviders = DealProvider::get();
        $tags = Tag::get();
        return Inertia::render('ProductLists', compact('products','categories','dealProviders','tags'));
    }
    // public function searchProduct(Request $request){
    //     $products = 'g';
    // }
    /**
     * ImportProducts
     *
     * @param  mixed $request
     * @return void
     */
    public function ImportProducts(Request $request){
        $file = $request->file;
        if ($file) {
            $id = time();
            $location = 'uploads'; //Created an "uploads" folder for that
            $extension = $file->getClientOriginalExtension();
            $filename = 'pb_lists-'. $id. '.' . $extension;
            $file->move('uploads/', $filename);

            $filepath = 'uploads/' . $filename;

            // dd(Excel::import(new ProductImport, 'pb.xlsx'));


            $file = fopen($filepath, "r");
            // dd($file);
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
            //Read the contents of the uploaded file
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);
            // Skip first row (Remove below comment if you want to skip the first row)
            if ($i == 0) {
            $i++;
            continue;
            }
            for ($c = 0; $c < $num; $c++) {
            $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
            }
            fclose($file); //Close after reading$j = 0;
            // dd($importData_arr);
            foreach ($importData_arr as $row) {
                $provider_code = $importData_arr[1][2];

                if(!isset($row[7]) OR !$row[7]){
                    continue;
                }

           try {
            DB::beginTransaction();
            $product = new Product();
            $product->deal_provider_id = DealProvider::where('code', $provider_code)->first()->id ?? 1;
            $product->category_id = $row[5] ? $row[5] : 22 ;
            $product->url = $row[6] ?? 'https:://dealcode.org';
            $product->title = $row[7];
            $product->slug = Str::slug($row[7],'-');
            $product->tag_id = $row[8] ?? 22;
            $product->price = $row[11] ?? 0;
            $product->thumbnail = $row[12] ?? asset('/images/default_image.png');
            $product->image = $row[12] ?? asset('/images/default_image.png');
            $product->description = $row[14] ?? '';
            $product->license1_tier_price = is_int($row[15]) ? $row[15] : 0;
            $product->license1_tier_features = $row[16] ?? '';
            $product->license2_tier_price = is_int($row[17] ? $row[17] : 0);
            $product->license2_tier_features = $row[18] ?? '';
            $product->license3_tier_price = is_int($row[19] ? $row[19] : 0);
            $product->license3_tier_features = $row[20] ?? '';
            $product->tldr = $row[21] ?? 0;
            $product->about_all = $row[22] ?? '';
            $product->product_url = Str::limit(isset($row[23]) ?? 'https:://dealcode.org', 150, $end='...') ?? 'https:://dealcode.org';
            $product->save();
            // dd($product);
            DB::commit();
            } catch (\Exception $e) {
            //throw $th;
            dd($e);
            DB::rollBack();
            }

            }










    }else{

    }
    }


    /**
     * discontinuedProducts
     *
     * @return void
     */
    public function discontinuedProductLists(){
        $discontinuedProducts = DiscontinuedProduct::get();

        return Inertia::render('DiscontinuedProductList', compact('discontinuedProducts'));
    }

    public function createDisProduct(Request $request){

       $products = DiscontinuedProduct::create($request->all());
       return redirect()->back();
    }
    public function updateDisProduct(Request $request){

        $products = DiscontinuedProduct::where('id',$request->edit_id)->update([
            'product_name' => $request->editproduct_name,
            'comments' => $request->editcomments,

        ]);
        return redirect()->back();
     }
     public function deleteDisProduct(Request $request){

        $products = DiscontinuedProduct::where('id',$request->id)->delete();
        return redirect()->back();
     }
     public function importDisProduct(Request $request){

        $file = $request->file('fileX');

        if ($file) {
            $id = time();
            $location = 'uploads'; //Created an "uploads" folder for that
            $extension = $file->getClientOriginalExtension();
            $filename = 'pb_lists-'. $id. '.' . $extension;
            $file->move('uploads/', $filename);

            $filepath = 'uploads/' . $filename;

            $file = fopen($filepath, "r");
            // dd($file);
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
            //Read the contents of the uploaded file
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);
            // Skip first row (Remove below comment if you want to skip the first row)
            if ($i == 0) {
            $i++;
            continue;
            }
            for ($c = 0; $c < $num; $c++) {
            $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
            }
            fclose($file); //Close after reading$j = 0;
            // dd($importData_arr);
            foreach ($importData_arr as $row) {

                DiscontinuedProduct::create([
                    'product_name' => $row[1],
                    'comments' => $row[2],
                ]);
           try {
            DB::beginTransaction();



            DB::commit();
            } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            }

            }


    }else{

    }

        return redirect()->back();
     }

/**
     * reseller lists
     *
     * @return void
     */
    public function resellerLists(){
        $resellerLists = ResellerList::get();

        return Inertia::render('ResellerList', compact('resellerLists'));
    }
    public function createresellerList(Request $request){

        $resellerLists = ResellerList::create($request->all());
        return redirect()->back();
     }
     public function updateresellerList(Request $request){

        $resellerLists = ResellerList::where('id',$request->edit_id)->update([
             'name' => $request->editname,
             'link' => $request->editlink,
             'fb_user_profule' => $request->editfb_user_profule,
             'fb_group' => $request->editfb_group,

         ]);
         return redirect()->back();
      }
      public function deleteresellerList(Request $request){

        $resellerLists = ResellerList::where('id',$request->id)->delete();
        return redirect()->back();
     }
     /**
     * known issues
     *
     * @return void
     */
    public function knownIssues(){
        $knownIssues = KnownIssue::get();

        return Inertia::render('KnownIssue', compact('knownIssues'));
    }
    public function createknownIssue(Request $request){

        $knownIssues = KnownIssue::create($request->all());
        return redirect()->back();
     }
     public function updateknownIssue(Request $request){

        $knownIssues = KnownIssue::where('id',$request->edit_id)->update([
             'product_name' => $request->editproduct_name,
             'issues' => $request->editissues,
             'comments' => $request->editcomments,


         ]);
         return redirect()->back();
      }
      public function deleteknownIssue(Request $request){

        $knownIssues = KnownIssue::where('id',$request->id)->delete();
        return redirect()->back();
     }
        /**
     *Admin links
     *
     * @return void
     */
     public function adminLinks(){
        $adminLinks = AdminLink::get();

        return Inertia::render('AdminLink', compact('adminLinks'));
    }
    public function createadminLink(Request $request){

        $adminLinks = AdminLink::create($request->all());
        return redirect()->back();
     }
     public function updateadminLink(Request $request){

        $adminLinks = AdminLink::where('id',$request->edit_id)->update([
             'name' => $request->editname,
             'url' => $request->editurl,


         ]);
         return redirect()->back();
      }
      public function deleteadminLink(Request $request){

           $adminLinks = AdminLink::where('id',$request->id)->delete();
        return redirect()->back();
     }
  /**
     * report-type
     *
     * @return void
     */
    public function reportTypes(){
        $reportTypes = ReportType::all();
        return Inertia::render('ReportType', compact('reportTypes'));
    }
    /**
     * createReportType
     *
     * @param  mixed $request
     * @return void
     */
    public function createReportType (Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $reportType = ReportType::create([
            'title' => $request->title,
        ]);

    }
    /**
     * updateReportType
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return void
     */
    public function updateReportType($id,Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $reportType = ReportType::find($id);
        $reportType->title = $request->title;
        $reportType->save();
    }
    /**
     * deleteReportType
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteReportType ($id){
        $reportType = ReportType::find($id);
        $reportType->delete();
    }

    /**
     * postReviews
     *
     * @return void
     */
    public function postReviews(){
        $reviews = DB::table('review_posts')
        ->join('posts', 'review_posts.p_id', '=', 'posts.id')
        ->select('p_id', DB::raw('count(*) as total'), 'posts.title', DB::raw('sum(review_rating) as toatal_rating'),
         DB::raw('sum(review_rating)/count(*) as average_rating'))
        ->groupBy('p_id', 'posts.title')
        ->limit(25)->get();

        $front_end_url = config('app.front_end_url');
        return Inertia::render('PostReview', compact('reviews', 'front_end_url'));
    }

    public function userReviews(){
        $reviews = DB::table('rate_users')
        ->join('users', 'rate_users.rated_user_id', '=', 'users.id')
        ->select('rated_user_id','users.name', DB::raw('count(*) as total'), DB::raw('sum(rate) as toatal_rating'),
         DB::raw('sum(rate)/count(*) as average_rating'))
        ->groupBy('rated_user_id','users.name')
        ->limit(25)->get();

        // dd($reviews);

        $front_end_url = config('app.front_end_url');
        return Inertia::render('UserReview', compact('reviews', 'front_end_url'));
    }

    /**
     * subscriptions
     *
     * @return void
     */
    public function subscriptions(){
        $subscriptions = Subscription::with('users')->get();
        foreach($subscriptions as $subscription){
            $subscription->type = $subscription->billing_cycle ? json_decode($subscription->billing_cycle)->billing_cycle_type : 'N/A';
        }
        // dd($subscriptions);
        return Inertia::render('Subscriptions', compact('subscriptions'));
    }
    public function combineTable(){
        // $combineTables = CombineTable::get();
        // // dd($subscriptions);
        // return Inertia::render('CombineTable', compact('combineTables'));
    }

    public function systemInfo(){
        //default system info
        $systemInfo = [
            'php_version' => phpversion(),
            'laravel_version' => app()->version(),
            'mysql_version' => DB::select('select version() as version')[0]->version,
            'server_os' => php_uname(),
            'server_ip' => $_SERVER['SERVER_ADDR'] ?? '127.0.0.1',
            'server_name' => $_SERVER['SERVER_NAME'],
            'server_software' => $_SERVER['SERVER_SOFTWARE'],
            'server_port' => $_SERVER['SERVER_PORT'],
            'server_protocol' => $_SERVER['SERVER_PROTOCOL'],
            'server_admin' => $_SERVER['SERVER_ADMIN'] ?? 'N/A',
            'server_signature' => $_SERVER['SERVER_SIGNATURE'] ?? 'N/A',
            'server_root' => $_SERVER['DOCUMENT_ROOT'],
            'server_time' => date('Y-m-d H:i:s'),
            'server_timezone' => date_default_timezone_get(),
            'server_max_execution_time' => ini_get('max_execution_time'),
            'server_max_input_time' => ini_get('max_input_time'),
            'server_memory_limit' => ini_get('memory_limit'),
            'server_post_max_size' => ini_get('post_max_size'),
            'server_upload_max_filesize' => ini_get('upload_max_filesize'),
            'server_max_file_uploads' => ini_get('max_file_uploads'),
            'server_allow_url_fopen' => ini_get('allow_url_fopen'),
            'server_display_errors' => ini_get('display_errors'),
            'server_log_errors' => ini_get('log_errors'),
            'server_error_log' => ini_get('error_log'),
            'server_session_save_path' => ini_get('session.save_path'),
            'server_session_auto_start' => ini_get('session.auto_start'),
            'server_opcache_enabled' => ini_get('opcache.enable'),
            'server_opcache_enable_cli' => ini_get('opcache.enable_cli'),
            'server_opcache_memory_consumption' => ini_get('opcache.memory_consumption'),
            'server_opcache_max_accelerated_files' => ini_get('opcache.max_accelerated_files'),
            'server_opcache_revalidate_freq' => ini_get('opcache.revalidate_freq'),
            'server_opcache_save_comments' => ini_get('opcache.save_comments'),
            'server_opcache_file_cache' => ini_get('opcache.file_cache'),
        ];

        $requirements = [
            'php_version' => [
                'name' => 'PHP Version',
                'value' => phpversion(),
                'required' => '8.3.0',
                'status' => version_compare(phpversion(), '7.3.0', '>='),
            ],
            'laravel_version' => [
                'name' => 'Laravel Version',
                'value' => app()->version(),
                'required' => '9.0.0',
                'status' => version_compare(app()->version(), '7.0.0', '>='),
            ],
            'mysql_version' => [
                'name' => 'MySQL Version',
                'value' => DB::select('select version() as version')[0]->version,
                'required' => '5.7.0',
                'status' => version_compare(DB::select('select version() as version')[0]->version, '5.7.0', '>='),
            ],
            'openssl' => [
                'name' => 'OpenSSL PHP Extension',
                'value' => extension_loaded('openssl'),
                'required' => 'true',
                'status' => extension_loaded('openssl'),
            ],
            'pdo' => [
                'name' => 'PDO PHP Extension',
                'value' => extension_loaded('pdo'),
                'required' => 'true',
                'status' => extension_loaded('pdo'),
            ],
            'mbstring' => [
                'name' => 'Mbstring PHP Extension',
                'value' => extension_loaded('mbstring'),
                'required' => 'true',
                'status' => extension_loaded('mbstring'),
            ],
            'tokenizer' => [
                'name' => 'Tokenizer PHP Extension',
                'value' => extension_loaded('tokenizer'),
                'required' => 'true',
                'status' => extension_loaded('tokenizer'),
            ],
            'xml' => [
                'name' => 'XML PHP Extension',
                'value' => extension_loaded('xml'),
                'required' => 'true',
                'status' => extension_loaded('xml'),
            ],
            'cURL' => [
                'name' => 'cURL PHP Extension',
                'value' => extension_loaded('curl'),
                'required' => 'true',
                'status' => extension_loaded('curl'),
            ],
        ];

        $permissions = [
            'storage' => [
                'name' => 'storage',
                'value' => is_writable(storage_path()),
                'required' => 'true',
                'status' => is_writable(storage_path()),
            ],
            'bootstrap/cache' => [
                'name' => 'bootstrap/cache',
                'value' => is_writable(base_path('bootstrap/cache')),
                'required' => 'true',
                'status' => is_writable(base_path('bootstrap/cache')),
            ],
            'public/uploads' => [
                'name' => 'public/uploads',
                'value' => is_writable(public_path('uploads')),
                'required' => 'true',
                'status' => is_writable(public_path('uploads')),
            ],
        ];


        // dd($permissions);
        //get server info
        return Inertia::render('ServerInfo', compact('systemInfo', 'requirements', 'permissions'));
    }

    /**
     * createCombineTable
     *
     * @param  mixed $request
     * @return void
     */
    public function createCombineTable(Request $request)
    {
        // dd($request->all());
        // $c = CombineTable::create($request->all());
        // return redirect()->back();
    }

    /**
     * updateCombineTable
     *
     * @param  mixed $request
     * @return void
     */
    public function updateCombineTable(Request $request, $id)
    {
        // dd($request->all());
        // $c = CombineTable::find($id);
        // $c->update($request->all());
        // return redirect()->back();
    }

    public function subcribers()
    {
        $subcribers = Subscriber::all();
        return Inertia::render('Subcribers', compact('subcribers'));
    }

    public function export_subscribers()
    {
       $filename = 'subscribers.csv';
       $subscribers = Subscriber::all();

       $handle = fopen($filename, 'w+');
       fputcsv($handle, ['id', 'email', 'created_at', 'updated_at']);

         foreach($subscribers as $subscriber) {
              fputcsv($handle, [$subscriber->id, $subscriber->email, $subscriber->created_at, $subscriber->updated_at]);
         }

         fclose($handle);

            $headers = array(
                'Content-Type' => 'text/csv',
            );

            return response()->download($filename, 'subscribers.csv', $headers);
    }



    public function contact_us(){
        $contact = Contact::get();
        return Inertia::render('ContactUs', compact('contact'));
    }

    public function export_contact()
    {
        $contact = Contact::get();
        $filename = "contact.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('id', 'name', 'email','message'));

        foreach($contact as $row) {
            fputcsv($handle, array($row['id'], $row['full_name'], $row['email'], $row['message']));
        }
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return response()->download($filename, 'contact.csv', $headers);
    }

    public function paymentCreate(Request $request)
    {
        $payment = PaymentMethod::create($request->all());
        return redirect()->back();
    }

    public function payment_delete($id){
        $payment = PaymentMethod::find($id);
        $payment->delete();
        return redirect()->back();
    }


    public function updateProduct(Request $request, $id){

   
        $product = Product::find($id);
        $request->description = $request->description ?? '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath, $name);
            $url = asset('images/products/' . $name);
            // dd($url);
        }

        $input = $request->data;
        $input['image'] = $url ?? $product->image;

        $product->update($input);
        // return redirect()->back()->with('success', 'Product Created Successfully');
    }
    public function chats(){
        $messages = Message::with('user','receiver')->latest()->paginate(15);

        return Inertia::render('Chat', compact('messages'));
    }
    public function view_chats(Request $request){
       $messages = Message::with('user')->where('user_id',$request->id)->get();
       $user = User::where('id',$request->id)->first();
       $messag = Message::with('user')->where('user_id',$request->id)->whereNotIn('receiver_id',[$request->id])->get();
       $userIDs =  $messag->map(function($q){
        return $q->receiver_id;
       });


       $users = User::with('messages')->whereIn('id',$userIDs)->get();
        return ['user' => $user,'messages' => $messages,'users' => $users];
<<<<<<< HEAD
     
    }
   
=======
>>>>>>> fd2f40e94b892d2931a9f6b00b622eb0931a07dc

    }
    public function paginate($items, $perPage = 30, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $path = $options['path'] ?? Paginator::resolveCurrentPath();
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, compact('path'));
    }
}
