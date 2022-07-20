<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Admin;
use App\Models\User;
use App\Models\Ads;

use App\Models\Location;
use App\Models\Category;

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

        $ads = Ads::where('ads_id',$ads_id)
        ->get();

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


    public function view_category() 
    {
        $categories = Category::get();
        return view('admin.view_category')->with('categories',$categories);
    }

    public function view_location() 
    {
        $locations = Location::get();
        return view('admin.view_location')->with('locations',$locations);
    }

    
}
