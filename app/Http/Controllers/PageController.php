<?php

namespace App\Http\Controllers;

// use Stevebauman\Location\Facades\Location;
use Adrianorosa\GeoLocation\GeoLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Location;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAdsMail;
use App\Models\Footer;
use App\Models\MainPage;

class PageController extends Controller
{

    public function test()

    {
        return view('page.test');
    }

    public function index()

    {      
        $main_pages = MainPage::where('id',1)->get();

        $footers = Footer::where('id',1)->get();

        $categories = Category::get();
        $locations = Location::get();

        return view('homepage')->with('categories',$categories)->with('locations',$locations)->with('main_pages',$main_pages)->with('footers',$footers);
    }

    public function all_page()  
    
    {

        $status  = 'actived';

        // get current user with geolocation ip 
        $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        // $ip = '203.128.79.246';

        $geoLoc = GeoLocation::lookup($ip);

        $categories = Category::get();
        $locations = Location::where('province','Bali')->get();

        $ads = Ads::where('status',$status)->where('location',$geoLoc->getCity())->where('draft',null)->latest()->paginate(20);

        return view('page.all_page')->with('ads',$ads)->with('categories',$categories)->with('locations',$locations)->with('geoLoc',$geoLoc);
    }

    // function for open search page on mobile view
    public function search_page()
    {
        $status  = 'actived';
        $categories = Category::get();

        $ads =  Ads::where('status',$status)
        ->where('draft',null)
        ->oldest()->paginate(6);

        return view('page.search_page')->with('ads',$ads)
        ->with('categories',$categories);

    }

    //function for search ads
    public function search_ads(Request $request)

    {
        $search_ads = $request->search_ads;

        // indikator for reditect to mobile site or not
        $type_search = $request->type_search;
        $status  = 'actived';
        $categories = Category::get();

        if($request->search_ads == null) {

            return redirect()->back();

        } if($type_search == 'mobile') {

            $ads =  Ads::where('title', 'like' , "%". $search_ads ."%")
            ->where('status',$status)
            ->where('draft',null)
            ->latest()->paginate(20);
            //  if mobile 
            return view('page.search_page')->with('ads',$ads)
            ->with('categories',$categories)
            ->with('search_ads',$search_ads);

        } else {

           $ads =  Ads::where('title', 'like' , "%". $search_ads ."%")
           ->where('status',$status)
           ->where('draft',null)
           ->latest()->paginate(20);
            // if desktop
            return view('page.search_result')->with('ads',$ads)
            ->with('categories',$categories)
            ->with('search_ads',$search_ads);
        }

    }

    //function for filter ads on main homepage

    public function filter_ads(Request $request)

    {
        $status  = 'actived';
        $category = $request->category;
        $location = $request->location;

        $categories = Category::get();

        if( $category == null && $location == null ) 
        {
            return redirect('all_page')->with('e','Harap pilih salah satu atau keduanya.');
            
        } elseif( $category != null && $location == null ) {
            
            $ads = Ads::where('status',$status)->where('draft',null)->where('category',$category)->latest()->paginate(20);

            return view('page.filter_ads')
            ->with('ads',$ads)
            ->with('categories',$categories)
            ->with('category',$category)
            ->with('location',$location);

        } elseif( $location != null && $category == null ) {

            $ads = Ads::where('status',$status)->where('draft',null)->where('location',$location)->latest()->paginate(20);

            return view('page.filter_ads')
            ->with('ads',$ads)
            ->with('categories',$categories)
            ->with('category',$category)
            ->with('location',$location);

        } else {

            $ads = Ads::where('status',$status)->where('draft',null)->where('category',$category)->where('location',$location)->latest()->paginate(20);

            return view('page.filter_ads')
            ->with('ads',$ads)
            ->with('categories',$categories)
            ->with('category',$category)
            ->with('location',$location);
        }
        
    }



    public function ads_page($category, $location, $link, $user_id)

    {
        $status  = 'actived';

        $ads = Ads::where('user_id',$user_id)
        ->where('category',$category)
        ->where('location',$location)
        ->where('link',$link)
        ->where('status', $status)->get();

        $user = User::where('user_id',$user_id)->get();

        // check if user already verified account ot not 
        if($user[0]->email_verified_at !== null) {

            $verified = 'Akun Terverifikasi';

        }

        return view('page.ads_page')->with('ads',$ads)->with('user',$user)->with('verified',$verified);
        
    }

    // public function create_ads()

    // {
    //     $user_id = auth()->user()->user_id;
    //     $user = User::where('user_id',$user_id)->get();
    //     return view('page.create_ads')->with('user',$user);
    // }

    public function delete_ads($ads_id)

    {
        $user_id = Auth::user()->user_id;

        try {

            Ads::where('user_id',$user_id)->where('ads_id',$ads_id)->delete();
            return redirect('/user_dashboard')->with('success','Iklan anda telah dihapus.');

        } catch (Exception $e) {

            return redirect()->back()->with('error','Terjadi kesalahan. Mohon mencoba beberapa saat lagi.');

        }
        
    }

    // show ads by category and location 

    public function show_category($category)

    {
        $status  = 'actived';

        $ads = Ads::where('category',$category)->where('status',$status)->latest()->paginate(20);
        $categories = Category::where('category', $category)->get();
      
        return view('page.category')->with('ads',$ads)->with('category',$category)->with('categories',$categories);
    }

    public function show_location($location)

    {
        $status  = 'actived';

        $ads = Ads::where('location',$location)->where('status',$status)->latest()->paginate(20);
        $locations = Location::where('province', $location)->get();

        return view('page.location')->with('ads',$ads)->with('location',$location)->with('locations',$locations);
    }

    public function show_ads_category($category, $sub_category)

    {
        $status  = 'actived';

        $ads = Ads::where('category',$category)->where('sub_category',$sub_category)->where('status',$status)->latest()->paginate(20);

        return view('page.by_sub_category')->with('ads',$ads)->with('category',$category)->with('sub_category',$sub_category);
    }



    public function create_post_ads(Request $request)

    {
        $validate = $request->validate([
            'photo1'    =>'required|image|mimes:jpg,png,jpeg|max:2048|',
            'photo2'    =>'required|image|mimes:jpg,png,jpeg|max:2048|',
            'photo3'    =>'required|image|mimes:jpg,png,jpeg|max:2048|',
            'category'  =>'required',
            'sub_category' => 'required',
            'title'     =>'required|min:10|max:160',
            'price'     =>'required',
            'condition' =>'required',
            'desc'      =>'required|min:10',
            'location'  =>'required',
            'address'   =>'required',
            'name'      =>'required',
            'phone'     =>'required',
            'agreement' =>'required',
        ]);

        $user_id = auth()->user()->user_id;
        $status  = 'pending';
        $ads_id  = Str::random(16);
        $link    = Str::slug($request->title);

        $photo1 = $request->photo1;
        $photo2 = $request->photo2;
        $photo3 = $request->photo3;

        $name_1 = Str::random(10);
        $name_2 = Str::random(10);
        $name_3 = Str::random(10);

        $ext = strtolower($photo1->getClientOriginalExtension());
        $ext = strtolower($photo2->getClientOriginalExtension());
        $ext = strtolower($photo3->getClientOriginalExtension());

        $photo1_name = $name_1.'.'.$ext;
        $photo2_name = $name_2.'.'.$ext;
        $photo3_name = $name_3.'.'.$ext;

        $upload_path = 'images/file_upload/';

        $photo1->move($upload_path, $photo1_name);
        $photo2->move($upload_path, $photo2_name); 
        $photo3->move($upload_path, $photo3_name);

        $data = [

            'ads_id'    => $ads_id,
            'user_id'   => $user_id,
            'category'  => $request->category,
            'sub_category'  => $request->sub_category,
            'photo1'    => $photo1_name,
            'photo2'    => $photo2_name,
            'photo3'    => $photo3_name,
            'title'     => $request->title,
            'price'     => $request->price,
            'condition' => $request->condition,
            'desc'      => $request->desc,
            'location'  => $request->location,
            'address'   => $request->address,
            'name'      => $request->name,
            'phone'     => $request->phone,
            'agreement' => $request->agreement,
            'status'    => $status,
            'link'      => $link,
        ];

        try {

            Mail::to('danayasa2@gmail.com')->send(new NewAdsMail($data));
            Ads::create($data);
            return redirect('/user_dashboard')->with('success','Iklan anda akan dimoderasi oleh admin kami. Terima kasih.');

        } catch (Exception $e) {

            return redirect()->back()->with('error','Terjadi kesalahan. Mohon mencoba beberapa saat lagi.');

        }

    }

    public function edit_ads($ads_id)

    {
        $user_id = auth()->user()->user_id;

        $ads = Ads::where('user_id',$user_id)->where('ads_id',$ads_id)->get(); //get detail for ads field
        $user = User::where('user_id',$user_id)->get(); //get detail for user field

        return view('page.edit_ads')->with('ads',$ads)->with('user',$user);
    }


    public function stop_ads(Request $request)

    {
        $ads_id = $request->ads_id;
        $data = [
            'stop_reason' => $request->stop_reason,
            'status'    => 'stopped',
        ];

        try {

            Ads::where('ads_id',$ads_id)->update($data);
            return redirect('user_dashboard')->with('success','Penayangan iklan anda berhasil dihentikan.');

        } catch (Exception $e) {

            dd($e);
            return redirect('/new_ads')->with('error','Uppss.. Terjadi kesalahan, mohon dicoba kembali nanti.');

        }
        
    }


    //testing  create new ads version 2

    public function create()

    {

        $categories = Category::get();
        
        return view('page.create_ads')->with('categories',$categories);
    }

    public function create_new_ads($category, $sub_category)

    {

        $user_id = auth()->user()->user_id;
        $user = User::where('user_id',$user_id)->get();  
        $locations = Location::where('province','Bali')->get();      

        return view('page.create_new_ads')

        ->with('category',$category)
        ->with('sub_category',$sub_category)
        ->with('locations',$locations)
        ->with('user',$user);
    }


    

}
