<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Admin;
use App\Models\User;
use App\Models\Ads;
use Illuminate\Support\Str;

use App\Models\Location;
use App\Models\Category;
use App\Models\Banner;

use Exception;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{

    public function admin_dashboard()

    {
        // ads query
        $new_ads = Ads::where('status','pending')->latest()->paginate();
        $actived_ads = Ads::where('status','actived')->latest()->paginate();
        $rejected_ads = Ads::where('status','rejected')->latest()->paginate();
        $deleted_ads = Ads::where('status','deleted')->latest()->paginate();

        // user query
        $all_user = User::where('role','user')->latest()->paginate();
        $new_user = User::where('role','user')->where('email_verified_at',null)->latest()->paginate();
        $administrator_user = User::where('role','Administrator')->paginate();


        return view('admin.dashboard')

        ->with('new_ads',$new_ads)
        ->with('actived_ads',$actived_ads)
        ->with('rejected_ads',$rejected_ads)
        ->with('deleted_ads',$deleted_ads)
        ->with('all_user',$all_user)
        ->with('new_user',$new_user)
        ->with('administrator_user',$administrator_user);

    }

    public function preview_ads($user_id, $ads_id)

    {
        // $status  = 'pending';

        $ads = Ads::where('ads_id',$ads_id)->get();
        $user = User::where('user_id',$user_id)->get();

        // check if user already verified account ot not 
        if($user[0]->email_verified_at !== null) {

            $verified = 'Akun Terverifikasi';

        }

        return view('admin.preview_ads')->with('ads',$ads)->with('user',$user)->with('verified',$verified);
        
    }

    public function approve_ads($ads_id)

    {
        $data = [

            'status' => 'actived',
            'reason' => null,
            'detail_reason' => null,
        ];

        try {

            Ads::where('ads_id',$ads_id)->update($data);
            return redirect('/actived_ads')->with('success','Ads has been Actived successfully!');
        } catch (Exception $e) {

            return redirect('/new_ads')->with('error','Ups..something went wrong. Please try again latter!');

        }
    }

    public function reject_ads(Request $request)

    {
        $ads_id = $request->ads_id;
        $data = [

            'reason' => $request->reason,
            'detail_reason' => $request->detail_reason,
            'status' => 'rejected',
        ]; 

        try {

            Ads::where('ads_id',$ads_id)->update($data);
            return redirect('/rejected_ads')->with('success','Ads has been Rejected successfully!');

        } catch (Exception $e) {

            dd($e);
            return redirect('/new_ads')->with('error','Ups..something went wrong. Please try again latter!');

        }
        
    }


    public function admin_settings()

    {
        return view('admin.settings');
    }

    public function new_ads()
    
    {
        // ads query
        $new_ads = Ads::where('status','pending')->latest()->paginate(10);

        return view('admin.new_ads')->with('new_ads',$new_ads);
    }

    public function actived_ads()
    
    {
        // ads query
        $actived_ads = Ads::where('status','actived')->latest()->paginate(10);

        return view('admin.actived_ads')->with('actived_ads',$actived_ads);
    }

    public function rejected_ads()
    
    {
        // ads query
        $rejected_ads = Ads::where('status','rejected')->latest()->paginate(10);

        return view('admin.rejected_ads')->with('rejected_ads',$rejected_ads);
    }

    public function deleted_ads()
    
    {
        return view('admin.deleted_ads');
    }




    // USER SHOW AREA

    public function new_user() {

        $users = User::where('email_verified_at',null)->where('role','user')->latest()->paginate();

        return view('admin.users.new_user')->with('users',$users);

    }


    public function verified_user() {

        $users = User::whereNotNull('email_verified_at')->where('role','user')->latest()->paginate();

        return view('admin.users.verified_user')->with('users',$users);
        
    }

    public function all_user() {

        $users = User::where('role','user')->latest()->paginate();

        return view('admin.users.all_user')->with('users',$users);

    }

    // CRUD CATEGORY FUNCTION 

    // VIEW CATEGORY PAGE
    public function view_category() 
    {
        $categories = Category::get();
        return view('admin.view_category')->with('categories',$categories);
    }

    // CREATE NEW CATEGORY FUNCTION 
    public function create_new_category(Request $request)
    {
        $data = ([
            'category' => $request->category,
            'sub_1'    => $request->sub_1,
            'sub_2'    => $request->sub_2,
            'sub_3'    => $request->sub_3,
            'sub_4'    => $request->sub_4,
            'sub_5'    => $request->sub_5,
            'user'     => Auth::user()->name,
            'slug'     => Str::slug($request->category)
        ]);

        try {

            Category::create($data);
            return redirect()->back()->with('success','Category has been added successfully!');

        } catch (Exception $e) {

            return redirect()->back()->with('error','Upss..something went wrong! Please try again later.');

        }
    }

    // VIEW EDIT CATEGORY PAGE
    public function edit_category($slug)
    {
        $categories = Category::get();
        $data_categories = Category::where('slug',$slug)->get();
        return view('admin.edit_category')->with('data_categories',$data_categories)->with('categories',$categories);
    }

    // UPDATE CATEGORY FUNCTION 
    public function update_category(Request $request, $slug)
    {
        $data = ([
            'category' => $request->category,
            'sub_1'    => $request->sub_1,
            'sub_2'    => $request->sub_2,
            'sub_3'    => $request->sub_3,
            'sub_4'    => $request->sub_4,
            'sub_5'    => $request->sub_5,
            'user'     => Auth::user()->name,
            'slug'     => Str::slug($request->category)
        ]);

        try {

            Category::where('slug',$slug)->update($data);
            return redirect('view_category')->with('success','Category has been updated successfully!');

        } catch (Exception $e) {

            return redirect()->back()->with('error','Upss..something went wrong! Please try again later.');

        }
    }

    // DELETE CATEGORY FUNCTION 
    public function delete_category($slug)
    {
        Category::where('slug',$slug)->delete();
        return redirect()->back()->with('success','Category has been deleted successfully!');
    }

    public function view_location() 
    {
        $locations = Location::get();
        return view('admin.view_location')->with('locations',$locations);
    }


    public function view_banner()
    {
        $banners = Banner::get();
        return view('admin.view_banner')->with('banners',$banners);
    }

    public function update_banner(Request $request, $id)
    {
        $banner_1 = $request->validate(['banner_1'  => 'image|mimes:jpg,png,jpeg|max:2048|']);
        $banner_2 = $request->validate(['banner_2'  => 'image|mimes:jpg,png,jpeg|max:2048|']);
        $banner_3 = $request->validate(['banner_3'  => 'image|mimes:jpg,png,jpeg|max:2048|']);

        if($banner_1 == [] && $banner_2 == [] && $banner_3 == [] ) {

           $data = [

            'banner_1_text' => $request->banner_1_text,
            'banner_2_text' => $request->banner_2_text,
            'banner_3_text' => $request->banner_3_text,
            'user'          => Auth::user()->name,

           ];

           try {

            Banner::where('id',$id)->update($data);

            return redirect()->back()->with('success','Banner has been updated successfully!');

            } catch (Exception $e) {

            return redirect()->back()->with('error','Something went wrong! Please try again later.');

            }

        } elseif($banner_1 == [] ) {

            $banner_2 = $request->banner_2;
            $banner_3 = $request->banner_3;

            $name_2 = Str::random(10);
            $name_3 = Str::random(10);

            $ext_2 = strtolower($banner_2->getClientOriginalExtension());
            $ext_3 = strtolower($banner_3->getClientOriginalExtension());

            $banner_2_name = $name_2.'.'.$ext_2; 
            $banner_3_name = $name_3.'.'.$ext_3; 

            $upload_path = 'images/banners/'; 

            $banner_2->move($upload_path, $banner_2_name); 
            $banner_3->move($upload_path, $banner_3_name); 

           $data = [

                'banner_2' => $banner_2_name,
                'banner_3' => $banner_3_name, 
           ];

           try {

            Banner::where('id',$id)->update($data);

            return redirect()->back()->with('success','Banner has been updated successfully!');

            } catch (Exception $e) {

            return redirect()->back()->with('error','Something went wrong! Please try again later.');

            }

        } elseif($banner_2 == [] ) {

            $banner_1 = $request->banner_1;
            $banner_3 = $request->banner_3;

            $name_1 = Str::random(10);
            $name_3 = Str::random(10);

            $ext_1 = strtolower($banner_1->getClientOriginalExtension());
            $ext_3 = strtolower($banner_3->getClientOriginalExtension());

            $banner_1_name = $name_1.'.'.$ext_1; 
            $banner_3_name = $name_3.'.'.$ext_3; 

            $upload_path = 'images/banners/'; 

            $banner_1->move($upload_path, $banner_1_name); 
            $banner_3->move($upload_path, $banner_3_name); 

           $data = [

                'banner_1' => $banner_1_name,
                'banner_3' => $banner_3_name, 
           ];

           try {

            Banner::where('id',$id)->update($data);

            return redirect()->back()->with('success','Banner has been updated successfully!');

            } catch (Exception $e) {

            return redirect()->back()->with('error','Something went wrong! Please try again later.');

            }

        } elseif($banner_3 == [] ) {

            $banner_2 = $request->banner_2;
            $banner_1 = $request->banner_1;

            $name_2 = Str::random(10);
            $name_1 = Str::random(10);

            $ext_2 = strtolower($banner_2->getClientOriginalExtension());
            $ext_1 = strtolower($banner_1->getClientOriginalExtension());

            $banner_2_name = $name_2.'.'.$ext_2; 
            $banner_1_name = $name_1.'.'.$ext_1; 

            $upload_path = 'images/banners/'; 

            $banner_2->move($upload_path, $banner_2_name); 
            $banner_1->move($upload_path, $banner_1_name); 

           $data = [

                'banner_2' => $banner_2_name,
                'banner_1' => $banner_1_name, 
           ];

           try {

            Banner::where('id',$id)->update($data);

            return redirect()->back()->with('success','Banner has been updated successfully!');

            } catch (Exception $e) {

            return redirect()->back()->with('error','Something went wrong! Please try again later.');

            }

        }

    }

    
}
