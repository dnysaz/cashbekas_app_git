<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Ads;
use App\Models\Location;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function user_dashboard() //controller untuk melihat dashboard
    {

        $user_id = auth()->user()->user_id;

        $ads = Ads::where('user_id',$user_id)->where('draft',null)->latest()->paginate(10);

        $user = User::where('user_id',$user_id)->get();

        // check if user already verified account or not 
        if($user[0]->email_verified_at !== null) {

            $verified = 'Akun Terverifikasi';

        }
        
        return view('user.dashboard')
        ->with('user',$user)
        ->with('ads',$ads)
        ->with('verified',$verified);
    }

    public function view_user($user_id) //controller untuk melihat user

    {
        $ads = Ads::where('user_id',$user_id)->latest()->paginate(10);
        $user = User::where('user_id',$user_id)->get();

        // check if user already verified account ot not 
        if($user[0]->email_verified_at !== null) {

            $verified = 'Akun Terverifikasi';

        }

        return view('user.view_user')->with('user',$user)->with('ads',$ads)->with('verified',$verified);
    }

    public function update_profile($user_id) //controller untuk membuka form update profile

    {
        $ads = Ads::where('user_id',$user_id)->latest()->paginate(10);
        $user = User::where('user_id',$user_id)->get();
        $locations = Location::where('province','Bali')->get();
        return view('user.update_profile')->with('user',$user)->with('ads',$ads)->with('locations',$locations);
    }


    public function simpan_profile(Request $request, $user_id) //controller untuk men update profile user

    {

        $photo = $request->validate(['photo'  => 'image|mimes:jpg,png,jpeg|max:2048|']);

        if($photo == []) {

            $data = [

                'name' => $request->name,
                'phone' => $request->phone,
                'location' => $request->location,
                'address' => $request->address,
            ];

            // update user details tanpa foto 
            try {

                User::where('user_id',$user_id)->update($data);
                return redirect('/user_dashboard')->with('success','Profile anda berhasil diperbarui.');
    
            } catch (Exception $e) {
    
                return redirect()->back()->with('error','Terjadi kesalahan. Mohon mencoba beberapa saat lagi.');
    
            }
        }

        else {

            // update user details dengan foto 

            $photo = $request->photo; //ambil foto
            $name = Str::random(10); //beri nama 
            $ext = strtolower($photo->getClientOriginalExtension()); //ambil extension file
            $photo_name = $name.'.'.$ext; //gabungkan nama dan extension
            $upload_path = 'images/user_photo/';  //tentukan dimana foto akan di upload
            $photo->move($upload_path, $photo_name); //upload foto kedalam folder

            $data = [

                'photo' => $photo_name, //isikan detail foto yang diupload
                'name' => $request->name,
                'phone' => $request->phone,
                'location' => $request->location,
                'address' => $request->address,
            ];

            try {

                User::where('user_id',$user_id)->update($data);
                return redirect('/user_dashboard')->with('success','Profile anda berhasil diperbarui.');
    
            } catch (Exception $e) {
    
                return redirect()->back()->with('error','Terjadi kesalahan. Mohon mencoba beberapa saat lagi.');
    
            }
            
        }   

    }

}
