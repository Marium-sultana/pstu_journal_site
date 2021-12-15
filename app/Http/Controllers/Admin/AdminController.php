<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\DB;
use Mail;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin_login');
        
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

    public function login()
    {
        if(!session()->has('admin'))
            return view('admin.admin_login');
        else
            return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkLogin(Request $request)
    {
        $admin = Admin::where([
            ['email_address', '=', $request->admin_email],
            ['password', '=', md5($request->admin_password)]
        ])->first();

        //$user = User::all('email','password');

        if(!empty($admin)){
            //dd($user[0]);
            // dd($user->id);
            // Session::put('user_id',$user->id);
            //Session::put('username',$user->username);
            //Session::put('name',$user->id);
            session([
				'admin' =>
				[
					'admin_id' => $admin->id,
					'name' => $admin->full_name,
					'admin_email' => $admin->email_address
				]
            ]);
            $msg = "Successfully log in";
            return redirect('admin');
        }

        else{
            $msg = "Try again";

            return redirect()->action('Admin\AdminController@login')->with('danger', $msg);

        }
    }

    public function adminLogout()
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

        $admin = Admin::where([
            ['email_address', '=', $request->recovery_mail]
        ])->first();
        if(!empty($admin)){
            $digits = 4;
            $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $name = $admin['full_name'];
            $dataArr = array('recovery_mail'=>$recovery_mail,'name'=>$name,'otp' =>$otp);
            //dd($dataArr);
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
        $affected = \DB::table('admins')->where(['email_address' => $recovery_mail])->update([
            'password' => md5($new_pass)
        ]);
        return 1;

    }
}
