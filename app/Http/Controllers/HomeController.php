<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;
use Illuminate\Pagination;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::paginate(10);
            return view('admin.user.index', compact('users'));
        } catch (Exception $e) {
            abort('error.503');
        }
    }

    // Add User
    public function addUser(Request $request)
    {
        try {
            $data = User::where('email', $request->email)->get();
            if (count($data) == 0) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                return response()->json([
                    'messenger' => 'Success!',
                    'name' => $user->name,
                    'id' => $user->id,
                    'email' => $user->email,
                ]);
            } else {
                return response()->json([
                    'messenger' => 'Error!'
                ]);
            }
        } catch (Exception $e) {
            abort('error.503');
        }
    }

//    DeleteUser
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete($id);
    }
}
