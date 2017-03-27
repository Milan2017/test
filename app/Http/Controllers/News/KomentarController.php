<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clanak;
use App\User;
use App\Komentar;
use App\Kategorija;
use App\Http\Requests\KomentarRequest;
use Illuminate\Support\Facades\Auth;
class KomentarController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('komentar', ['except' => ['create', 'store']]);
		//$this->middleware('log', ['only' => ['fooAction', 'barAction']]);
	
		//$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
	}
	

    public function create(Clanak $clanak){
    	
    	return view('news.create_komentar', array('clanak'=> $clanak));
    }
    
    public function store(KomentarRequest $request){
    	
    	$komentar = new Komentar;
    	
    	$komentar->sadrzaj = Request()->sadrzaj;
    	$komentar->clanak_id = Request()->clanak_id;
    	$komentar->autor_id = Auth::id();
    	
    	
    	$komentar->save();
    	
    	return redirect()->route('clanak.show', ['clanak' => Request()->clanak_id ])->with('message','Uspesno ste dodali komentar.');
    }
    public function edit(Komentar $komentar){
  
    	$naslov=Clanak::find($komentar->clanak_id)->naslov;
    	return view('news.edit_komentar',compact('komentar','naslov'));
    }
    
    public function update(KomentarRequest $request, Komentar $komentar){
    	 
    	$komentar->update($request->all());
    	 
    	
    	return redirect()->route('clanak.show', ['clanak' => Request()->clanak_id ])->with('message','Uspesno ste izmenili komentar.');
    }
    
    public function destroy(Komentar $komentar){
    	$cl=$komentar->clanak_id;
    	$komentar->delete();
    	
    	
    	return redirect()->route('clanak.show', ['clanak' => $cl ])->with('message','Uspesno ste uklonili komentar.');
    	
    }
     
}


