<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Ads;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAdsMail;


class PageController extends Controller
{

    public function index()

    {
        return view('homepage');
    }

    public function all_page()

    {

        $status  = 'actived';

        $ads = Ads::where('status',$status)->where('draft',null)->latest()->paginate(5);

        return view('page.all_page')->with('ads',$ads);
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

    public function show_category($category)

    {
        $status  = 'actived';

        $ads = Ads::where('category',$category)->where('status',$status)->latest()->paginate(20);
        return view('page.category')->with('ads',$ads)->with('category',$category);
    }

    public function show_location($location)

    {
        $status  = 'actived';

        $ads = Ads::where('location',$location)->where('status',$status)->latest()->paginate(20);
        return view('page.location')->with('ads',$ads)->with('location',$location);
    }

    public function create_post_ads(Request $request)

    {
        $validate = $request->validate([
            'category'  =>'required',
            'sub_category' => 'required',
            'photo1'    =>'required|image|mimes:jpg,png,jpeg|max:2048|',
            'photo2'    =>'required|image|mimes:jpg,png,jpeg|max:2048|',
            'photo3'    =>'required|image|mimes:jpg,png,jpeg|max:2048|',
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
        return view('page.create_ads');
    }

    public function create_new_ads($category, $sub_category)

    {
        $user_id = auth()->user()->user_id;
        $user = User::where('user_id',$user_id)->get();

        return view('page.create_new_ads')

        ->with('category',$category)
        ->with('sub_category',$sub_category)
        ->with('user',$user);
    }

}
