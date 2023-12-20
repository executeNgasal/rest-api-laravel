<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends BaseController
{

   public function signup(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'email' => 'required|email',
         'password' => 'required',
         'c_password' => 'required|same:password',
      ]);

      if ($validator->fails()) {
         return $this->sendError('Validation Error.', $validator->errors()->toArray());
      }

      $input = $request->all();
      $input['password'] = bcrypt($input['password']);
      $user = User::create($input);
      $success['token'] = $user->createToken('MyAuthApp')->plainTextToken;
      $success['name'] = $user->name;

      return $this->sendResponse($success, 'User created successfully.');
   }

   public function signin(Request $request)
   {
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
         $user = Auth::user();
         $success['token'] = $user->createToken('MyAuthApp')->plainTextToken;
         $success['name'] = $user->name;

         return $this->sendResponse($success, 'User signed in successfully.');
      } else {
         return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
      }
   }
}
