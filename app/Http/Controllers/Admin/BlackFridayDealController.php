<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlackFridayDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BlackFridayDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = BlackFridayDeal::orderBy('deal_name','asc')->paginate(10);
        foreach($datas as $data){
            $data['short_url'] = \Str::limit($data->url, $limit = 40, $end = '...');
        }

        return Inertia::render('BlackFridayDeal', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'deal_name'  => 'required',
            'url' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'year' => 'required',
            'discount' => 'required',
            'coupon_code' => 'required',
            'deal_details' => 'required',
            'tier_1' => 'required',
            'tier_2' => 'required',
            'tier_3' => 'required',
        ]);
        $blackFriday  = new BlackFridayDeal();
        $blackFriday->deal_name = $request->deal_name;
        $blackFriday->url = $request->url;
        $blackFriday->from_date = $request->from_date;
        $blackFriday->to_date = $request->to_date;
        $blackFriday->year = $request->year;
        $blackFriday->discount = $request->discount;
        $blackFriday->coupon_code = $request->coupon_code;
        $blackFriday->deal_details = $request->deal_details;
        $blackFriday->tier_1 = $request->tier_1;
        $blackFriday->tier_2 = $request->tier_2;
        $blackFriday->tier_3 = $request->tier_3;
        $blackFriday->save();
     
        return redirect()->route('black_friday_deals');
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
    public function showDeal($id)
    {
      
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDeal(Request $request)
    { 
        
    //     $request->validate([
    //     'deal_name'  => 'required',
    //     'url' => 'required',
    //     'from_date' => 'required',
    //     'to_date' => 'required',
    //     'year' => 'required',
    //     'discount' => 'required',
    //     'coupon_code' => 'required',
    //     'deal_details' => 'required',
    //     'tier_1' => 'required',
    //     'tier_2' => 'required',
    //     'tier_3' => 'required',
    // ]);
        
        $blackFriday  = BlackFridayDeal::find($request->id);
     
        $blackFriday->deal_name = $request->deal_name;
        $blackFriday->url =  $request->url ? $request->url : '';
        $blackFriday->from_date =  $request->from_date ? $request->from_date : '';
        $blackFriday->to_date =  $request->to_date ? $request->to_date : '';
        $blackFriday->year = $request->year ? $request->year : '';
        $blackFriday->discount = $request->discount ? $request->discount : '';
        $blackFriday->coupon_code = $request->coupon_code ? $request->coupon_code : '';
        $blackFriday->deal_details =  $request->deal_details ? $request->deal_details : '';
        $blackFriday->tier_1 = $request->tier_1 ? $request->tier_1 : '';
        $blackFriday->tier_2 = $request->tier_2 ? $request->tier_2 : '';
        $blackFriday->tier_3 = $request->tier_3 ? $request->tier_3 : '';
        $blackFriday->save();
     
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    
     
        BlackFridayDeal::where('id',$id)->first()->delete();
    return redirect()->route('black_friday_deals');
    }
    public function importDeals(Request $request){
       
        $file = $request->fileX;
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

                BlackFridayDeal::create([
                    'deal_name' => $row[1],
                    'url' => $row[2],
                    'from_date' => $row[3],
                    'to_date' => $row[4],
                    'year' => $row[5],
                    'discount' => $row[6],
                    'coupon_code' => $row[7],
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
    }

}
