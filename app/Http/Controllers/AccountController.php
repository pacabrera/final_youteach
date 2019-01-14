<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use Illuminate\Support\Facades\Storage;
use Auth;
use Hash;

class AccountController extends Controller
{
        public function __construct()
    {
        $this->middleware('checkIfAdmin:permissions', ['only' => ['store','update','destroy']]);
        $this->middleware('auth');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if (Auth::user()->permissions == 0){//Only the admin can store teachers
            $out =[
                'id' => $request->input('id'),
                'permissions' => $request->input('permission'),
                'password' => bcrypt($request->input('password')),
            ];

            $usr = User::create($out);


            //$usr = User::select('id')->where('usr', $request->input('usr'))->first();
            
            UserProfile::create([
                'given_name' => $request->input('n_given'),
                'family_name' => $request->input('n_family'),
                'gender' => $request->input('gender'),
                'middle_name' => $request->input('n_middle'),
                'ext_name' => $request->input('n_ext'),
                'profile_pic' => 'no-profile.png',
                'id' => $request->input('id'),
            ]);

            return redirect('/admin/teachers');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if($request->input('update_type') == 0){
            $user = User::find(Auth::id());
            $hashedPassword = $user->password;
    
            if (Hash::check($request->oldPass, $hashedPassword)) {
                $user->fill([
                    'password' => Hash::make($request->newPass)
                ])->save();
    
    
                return response('Password changed', 200);
            }
            return response('Invalid password', 400);
        }else if($request->input('update_type') == 1){
            $user = User::find($id);
            $hashedPassword = $user->password;
            $user->fill([
                    'password' => Hash::make("password")
                ])->save();
    
            
            return response('Password resetted', 200);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->permissions == 0){
            User::destroy($id);
        }else{
            abort(503);
        }
        
    }

    public function changePassStud(Request $request, $id){

            $user = User::find(Auth::id());
            $hashedPassword = $user->password;
    
            if (Hash::check($request->oldPass, $hashedPassword)) {
                $user->fill([
                    'password' => Hash::make($request->newPass)
                ])->save();
    
    
                return response('Password changed', 200);
            }
            return response('Invalid password', 400); 
    }

    public function changeProfilePic(Request $request){
       $file = $request->file('file');
        if($request->hasFile('file')) {
            $filename = $file->getClientOriginalName();
            $file->storeAs($filename, 's3');
            $filePath = 'avatar/' . $filename;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
          }
        else {
          $filename = 'no_image.png';
        }

        $profile = UserProfile::find(Auth::user()->id);
        $profile->profile_pic = $filename;
        $profile->save();

       
        return back();
    }

}
