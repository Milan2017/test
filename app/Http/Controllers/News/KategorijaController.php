<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategorija;
use App\Http\Requests\KategorijaRequest;
use Illuminate\Support\Facades\Auth;
class KategorijaController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
		$this->middleware('kategorija', ['only' => ['update', 'destroy','edit']]);
		//$this->middleware('log', ['only' => ['fooAction', 'barAction']]);
	
		//$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
	}
	
    public function index(){
    	
    	$kategorije= Kategorija::all();
    	//echo $kategorija->naziv;
    	return view('news.kategorija', array('kategorije'=> $kategorije));
    }
    public function create(){
    	$kategorije= Kategorija::all();
    	//echo $kategorija->naziv;
    	return view('news.create_kategorija', array('kategorije'=> $kategorije));
    }
    
    public function store(KategorijaRequest $request){
    	
    	//Kategorija::create($request->all());
    	
    	$kategorija = new Kategorija;
    	
    	$kategorija->naziv = Request()->naziv;
    	$kategorija->autor_id = Auth::id();
    	
    	
    	$kategorija->save();
    	
    	
    	return redirect()->route('kategorija.index')->with('message','Uspesno ste dodali kategoriju.');
    }
    public function edit(Kategorija $kategorija){
    	 
    	 
    	return view('news.edit_kategorija',compact('kategorija'));
    }
    
    public function update(KategorijaRequest $request, Kategorija $kategorija){
    	 
    	$kategorija->update($request->all());
    	 
    	return redirect()->route('kategorija.index')->with('message','Uspesno ste izmenili kategoriju.');
    }
    
    public function destroy(Kategorija $kategorija){
    
    	$kategorija->delete();
    
    	return redirect()->route('kategorija.index')->with('message','Uspesno ste izbrisali kategoriju.');
    }
    
}
