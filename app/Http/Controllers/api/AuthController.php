<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public $successStatus = 200;
    
    public function login(Request $request){
        // echo '<pre>';
        // 	print_r($_POST);
        // echo '</pre>'; die();
        // return 'assadsadd';
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'يرجى إدخال البريد الالكتروني',
            'email.email' => 'يرجى إدخال بريد الكترونى صحيح',
            'password.required' => 'يرجى ادخال كلمة المرور'
        ]);
        if ($validator->fails()) {
            return response([
                'status'    =>      'error',
                'errors'     =>      $validator->errors(),
                'data'      =>      null
            ], 200);
        }
        $input = $request->all();
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            if($user->email_verified_at == null){
                $data = [];
                $data['user'] = $user;
                $data['token'] =  $user->createToken('MyApp')->accessToken;
                return response([
                    'status'    =>      'success',
                    'data'     =>      $data,
                ], 200);
            }
            
            if($user->status == 0){
                return response([
                    'status'    =>      'error',
                    'error'     =>      'تم تعطيل حسابك يرجى التواصل مع مسئولى التطبيق!!',
                ], 200);
            }
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['user'] =  $user = Auth::user();

            /* if($user->device_id == null || $input['device_id'] != $user->device_id){
                $user->device_id = $input['device_id'];
                $user->update();
            } */

            return response([
                'status'    =>      'success',
                'data'      =>      $success
            ], 200);
        }
        else{
            return response([
                'status'    =>      'error',
                'error'     =>      'البريد الالكتروني او كلمه المرور غير صحيح',
            ], 200);
        }
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ],[
            'name.required' => 'يرجى ادخال الاسم ',
            'email.required' => 'يرجى ادخال البريد الالكترونى',
            'email.email' => 'يرجى ادخال البريد الالكترونى بطريقة صحيحة',
            'email.unique' => 'البريد الالكترونى موجود مسبقا !!',
            'phone.required' => 'يرجى ادخال رقم الجوال',
            'phone.unique' => 'رقم الجوال موجود مسبقا !!',
            'password.required' => 'يرجى ادخال كلمة المرور',
            'password_confirmation.required' => 'يرجى ادخال تأكيد كلمة المرور',
            'password_confirmation.same' => 'كلمة المرور و تأكيد كلمه المرور غير متماثلتين',
        ]);
        if ($validator->fails()) {
            return response([
                'status'    =>      'error',
                'errors'     =>      $validator->errors(),
                'data'      =>      null
            ], 200);
        }
        
        $code = rand(10000 , 99999);

        $user = new User();
        $user->name =request('name') ;
        $user->email = request('email');
        $user->phone = request('phone');
        $user->password =bcrypt(request('password')) ;
        $user->save();

        /* $to = request('email');
        $subject = "الرمز التفعيلى";

        $msg = "مرحبا بك بتطبيق إقرار الرمز التفعيلى الخاص بك ".$code;

        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From:info@otextech.net'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        mail($to, $subject, $msg, $headers); */
        
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['user'] =  $user;
        return response([
            'status'    =>      'success',
            'data'      =>      $success
        ], 200);
    }
    
    /* public function verify(Request $request){
        $user = Auth::user();
        $input = $request->all();
        
        $check = User::where('id',$user->id)->where('code',$input['code'])->count();
        
        if($check > 0){
            $user->code = null;
            $user->email_verified_at = now();
            $user->update();
            return response([
                'status'    =>      'success',
            ], 200);
        }else{
            return response([
                'status'    =>      'error',
                'error'     =>      'الرمز التفعيلى غير صحيح !!',
            ], 200);
        }
        
    }
    
    public function reset(Request $request){
        $input = $request->all();
        $data=[];
        $check = User::where('national_id',$input['national_id'])->count();
        if($check > 0){
            $user = User::where('national_id',$input['national_id'])->first();
            $code = rand(10000 , 99999);
            $user->remember_token = $code ;
            $user->update();
    
            $to = $user->email;
            $subject = "اعادة كلمة المرور";
    
            $msg = "الرمز الخاص بإعادة كامة المرور ".$code;
    
            $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From:info@otextech.net'."\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
            mail($to, $subject, $msg, $headers);
            
            $data['token'] =  $user->createToken('MyApp')->accessToken;
            
            return response([
                'status'    =>      'success',
                'data'      =>      $data
            ], 200);
        }else{
            return response([
                'status'    =>      'error',
                'error'     =>      'رقم الهوية او الاقامة غير موجود !!',
            ], 200);
        }
    }
    
    public function user_verify(Request $request){
        $input = $request->all();
        $check = User::where('remember_token',$input['code'])->count();
        if($check > 0){
            $user = User::where('remember_token',$input['code'])->first();

            $user->remember_token = null ;
            $user->update();

            return response([
                'status'    =>      'success',
                'data'      =>      $user,
            ], 200);
        }else{
            return response([
                'status'    =>      'error',
                'error'     =>      'رمز إعادة كلمة المرور غير صحيح !!',
            ], 200);
        }
    }
    
    public function change_password(Request $request){
        $input = $request->all();
        
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ],[
            'new_password.required' => 'يرجى ادخال كلمة المرور',
            'confirm_password.required' => 'يرجى ادخال تأكيد كلمة المرور',
            'confirm_password.same' => 'كلمة المرور و تأكيد كلمه المرور غير متماثلتين',
        ]);
        
        if ($validator->fails()) {
            return response([
                'status'    =>      'error',
                'errors'     =>      $validator->errors(),
                'data'      =>      null
            ], 200);
        }
        
        $user = User::find($input['id']);
        
        $user->password =bcrypt(request('new_password')) ;
        $user->update();
        
        return response([
            'status'    =>      'success',
            'data'      =>      $user,
        ], 200);
    }
    
    public function resend(){
        $user = Auth::user();
        
        if($user->code == null){
            $code = rand(10000 , 99999);
            $user->code = $code ;
            $user->update();
        }else{
            $code = $user->code;
        }
        
        $to = $user->email;
        $subject = "الرمز التفعيلى";

        $msg = "مرحبا بك بتطبيق إقرار الرمز التفعيلى الخاص بك ".$code;

        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From:info@otextech.net'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        mail($to, $subject, $msg, $headers);
        
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['user'] =  $user;
        return response([
            'status'    =>      'success',
            'data'      =>      $success
        ], 200);
    }
    
    public function resend_password(){
        $user = Auth::user();
        
        if($user->remember_token == null){
            $code = rand(10000 , 99999);
            $user->remember_token = $code ;
            $user->update();
        }else{
            $code = $user->remember_token;
        }
        
        $to = $user->email;
        $subject = "اعادة كلمة المرور";
    
        $msg = "الرمز الخاص بإعادة كامة المرور ".$code;
    
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From:info@otextech.net'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        mail($to, $subject, $msg, $headers);
        
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['user'] =  $user;
        return response([
            'status'    =>      'success',
            'data'      =>      $success
        ], 200);
    } */
}
