<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        if (Auth::guest()) {

            return redirect('login/');
        } else {
            $post = Staff::where('user_id','=', Auth::id())->get();
            return view('home',compact('post'));
        }
    }


        public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'salary' => 'required|integer',
        ]);

        $todo = new Staff();
        $todo->name = $request->input('name');
        $todo->salary = $request->input('salary');
        $todo->user_id = Auth::id();
        $todo->save();
        return redirect('/');
    }

}
