<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\Adstore;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdController extends Controller
{
    use RegistersUsers;

   public function index()
   {
       $ads = DB::table('ads')->orderBy('created_at', 'DESC')->paginate(3);
       return view('Ad.index',compact('ads'));
   }


   public function create()
   {
       return view('Ad.create');
   }

   public function store(Adstore $request)
   {
       $validated = $request->validated();
      // dd($validated);

      if (!Auth::check()) {
          $request->validated([
             'name' => 'required|unique:users',
             'email' => 'required|email|unique:users',
             'password'  => 'required|confirmed',
             'password_confirmation' => 'required',
          ]);

          $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['email'])
            ]);
            $this->guard()->login($user);
       }

       $ad = new Ad();
       $ad->title = $validated['title'];
       $ad->description = $validated['description'];
       $ad->price = $validated['price'];
       $ad->localisation = $validated['localisation'];
       $ad->user_id = auth()->user()->id;
       $ad->save();
       return redirect()->route('create.ad')->with('success', 'Annonce a ete ajouter');
   }

   /* Fonction de rechercher */

   public function search(Request $request)
   {
        $words = $request->words;
        $ads = DB::table('ads')
        ->where('title','LIKE', "%$words%")
        ->orWhere('description','LIKE', "%$words%")
        ->orderBy('created_at', 'DESC')
        ->get();
        return response()->json(['success' => true , 'ads' => $ads]);
   }
}

