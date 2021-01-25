<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\StudentRegistration;
use App\User;
use Illuminate\Http\Request;
use Importer;

class UserRegistrationController extends Controller
 {

    //Show Registration Form

    public function showRegistrationForm() {

        if ( Auth::user()->role == 'superadmin' ) {
            return view( 'dashboard.user.registration-form' );
        } else {
            return redirect( '/home' );
        }
    }

    public function userSave( Request $request ) {
        $this->validator( $request->all() )->validate();

        event( new Registered( $user = $this->create( $request->all() ) ) );

        return redirect( '/home' )->with( 'message', 'Registration Successfull' );
    }

    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator( array $data )
 {
        return Validator::make( $data, [
            'role' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ] );
    }

    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\User
    */
    protected function create( array $data )
 {
        return User::create( [
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make( $data['password'] )
        ] );
    }

    //Get All Users

    public function userList() {

        $users = User::where( [
            ['role', '!=', 'superAdmin'],
        ] )->get();
        $userCount = $users->count();
        return view( 'dashboard.user.user-list', compact( 'users', 'userCount' ) );

    }

    public function statusActive( $userId ) {
        $user = User::find( $userId );
        $user->status = 1;
        $user->update();
        return redirect( 'user-list' )->with( 'message', 'User Activated' );
    }

    public function statusDeactive( $userId ) {
        $user = User::find( $userId );
        $user->status = 0;
        $user->update();
        return redirect( 'user-list' )->with( 'message', 'User Deactivated' );
    }

    //// Excell upload ///

    public function import_file()
 {
        return view( 'dashboard.user.excell' );
    }

    public function import_excel( Request $request )
 {
        $validator = Validator::make( $request->all(), [
            'file' => 'required|mimes:xlsx, xls,csv'
        ] );

        if ( $validator->passes() ) {
            $file = $request->file( 'file' );
            $date = date( 'Ymd_His' );
            $fileName = $date.'_'.$file->getClientOriginalName();
            $uploadPath = public_path( 'upload/' );
            $file->move( $uploadPath, $fileName );

            $excel = Importer::make( 'Excel' );
            $excel->load( $uploadPath.$fileName );
            $collection = $excel->getCollection();
            // dd($collection);

            if ( sizeof( $collection[1] ) == 7 ) {
                for ( $row = 1; $row < sizeof( $collection );
                $row++ ) {
                    try {
                        $student = new StudentRegistration;
                        $student->id = $collection[$row][0];
                        $student->school = $collection[$row][1];
                        $student->class = $collection[$row][2];
                        $student->roll = $collection[$row][3];
                        $student->name = $collection[$row][4];
                        $student->save();
                        $user = new User;
                        $user->role = "user";
                        $user->student_id = $collection[$row][0];
                        $user->school = $collection[$row][1];
                        $user->class = $collection[$row][2];
                        $user->roll = $collection[$row][3];
                        $user->save();
                    } catch ( Exception $e ) {
                        return redirect()->back()->with( ['errors' => $e->getMessage()] );
                    }
                }
            } else {
                return redirect()->back()->with( ['errors' => [0 => 'Please provide valid data']] );
            }

        } else {
            return redirect()->back()->with( ['errors' => $validator->errors()->all()] );
        }
    }

}