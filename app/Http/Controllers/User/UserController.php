<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BannerImage;
use App\User;
use App\CallPaper;
use App\WiseWord;
use App\DB;
use Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.change_pass');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        if(!session()->has('user'))
            return view('user.user_login');
        else
            return redirect('/');
    }

    public function create()
    {
        //
    }

     public function user_registration()
     {
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        return view('front.user_registration',compact('issueImage','wiseWord','callPaper'));
         
     }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
            'name'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'country'=>'required'
        ],[
           'username.required'=>'Username Field is required',
           'password.required'=>'password Field is required',
           'email.required'=>'password Field is required',
           'name.required'=>'password Field is required'
        ]);
         $user = new User();
        
         $user->username = $request->username;
         $user->password = md5($request->password);
         $user->name = $request->name;
         $user->gender = $request->gender;
         $user->email = $request->email;
         $user->additional_email = $request->additional_email;
         $user->phone = $request->phone;
         $user->country = $request->country;
        // $user->forget_password = 0;
         $user->save();
         return redirect()->action('User\UserController@user_registration')->with('success', "User Created Successfully");
        

     }

    public function checkLogin(Request $request)
    {
        $user = User::where([
            ['email', '=', $request->email],
            ['password', '=', md5($request->password)]
        ])->first();

        //$user = User::all('email','password');

        if(!empty($user)){
            //dd($user[0]);
            // dd($user->id);
            // Session::put('user_id',$user->id);
            //Session::put('username',$user->username);
            //Session::put('name',$user->id);
            session([
				'user' =>
				[
					'user_id' => $user->id,
					'name' => $user->name,
					'user_email' => $user->email,
					'username' => $user->username
				]
            ]);
            return redirect('user/submit_paper');
        }

        else{
            $msg = "Try again";

            return redirect()->action('User\UserController@login')->with('danger', $msg);

        }
    }

    public function userLogout()
    {
        session()->flush();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function otp_generate(Request $request)
    {
        $recovery_mail = $request->recovery_mail;

        $user = User::where([
            ['email', '=', $request->recovery_mail]
        ])->first();
        if(!empty($user)){
            $digits = 4;
            $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $name = $user['name'];
            $dataArr = array('recovery_mail'=>$recovery_mail,'name'=>$name,'otp' =>$otp);

            Mail::send('mail', $dataArr, function($message)  use ($dataArr){
                //dd($dataArr);
                $message->to($dataArr['recovery_mail'],$dataArr['name'])->subject
                    ('IRSBD - OTP for password recovery!!!');
                $message->from('admin@irsbd.org','IRSBD');
            });
            echo $otp;
        }
        else{
            return 0;
        }
    }
    public function update_pass(Request $request)
    {
        $new_pass = $request->new_pass;
        $recovery_mail = $request->recovery_mail;
        $affected = \DB::table('users')->where(['email' => $recovery_mail])->update([
            'password' => md5($new_pass)
        ]);
        return 1;

    }
}
