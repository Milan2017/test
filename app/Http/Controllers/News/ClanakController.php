<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clanak;
use App\User;
use App\Kategorija;
use App\Komentar;
use App\Http\Requests\ClanakRequest;
use Illuminate\Support\Facades\Auth;
class ClanakController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
		$this->middleware('clanak', ['only' => ['update', 'destroy','edit']]);
		//$this->middleware('log', ['only' => ['fooAction', 'barAction']]);
	
		//$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
	}
	
    public function index(){
    	
    	$clanci= Clanak::all();
    	$users= User::all();
    	$kategorije= Kategorija::all();
    	//echo $kategorija->naziv;
    	return view('news.clanak', array('clanci'=> $clanci , 'users'=>$users, 'kategorije'=>$kategorije));
    }
    public function create(){
    	//$kategorije= Kategorija::all();
    	
    	$kategorije = Kategorija::orderBy('naziv')->pluck('naziv', 'id');
    	//echo $kategorija->naziv;
    	return view('news.create_clanak', array('kategorije'=> $kategorije));
    }
    
    public function store(ClanakRequest $request){
    	
    	//Kategorija::create($request->all());
    	
    	$clanak = new Clanak;
    	
    	$clanak->naslov = Request()->naslov;
    	$clanak->tekst = Request()->tekst;
    	$clanak->kategorija_id = Request()->kategorija_id;
    	$clanak->autor_id = Auth::id();
    	
    	
    	$clanak->save();
    	
    	
    	return redirect()->route('clanak.index')->with('message','Uspesno ste dodali clanak.');
    }
    public function edit(Clanak $clanak){
    	$kategorije = Kategorija::orderBy('naziv')->pluck('naziv', 'id');
    	 
    	return view('news.edit_clanak',compact('clanak','kategorije'));
    }
    
    public function update(ClanakRequest $request, Clanak $clanak){
    	 
    	$clanak->update($request->all());
    	 
    	return redirect()->route('clanak.index')->with('message','Uspesno ste izmenili kategoriju.');
    }
    
    public function destroy(Clanak $clanak){
    	Komentar::where('clanak_id', $clanak->id)->delete();
    	$clanak->delete();
    
    	return redirect()->route('clanak.index')->with('message','Uspesno ste izbrisali clanak.');
    }
    public function show(Clanak $clanak){
    
    	$komentari=Komentar::where('clanak_id','=',$clanak->id)->get();
    	$users= User::all();
    	$autor=Auth::id();
    	return view('news.show_clanak',compact('clanak', 'komentari','users','autor'));
    } 
}

