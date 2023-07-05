<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiketing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TiketingController extends Controller
{
//get data
    public function index () {
       
        //search data
        $tiketing = Tiketing::paginate(10) ;
        // if(request('search')) {
        //     $tiketing->where('name', 'like', '%' . request('search') . '%');
        //     // ->orWhere('gate', 'like', '%' . request('search') . '%');
        // }
        //get all  
            // $tiketing = DB::table('tiketing')->get(); 

        //get spesifik
            // $tiketing = DB::table('tiketing')->where('gate','sss') 
            //->orderByDesc('id') //mengurutkan data dari id yang paling baru
            // ->limit(1) //menambahkan limit sebelum get
            // ->get(); 

        //get spesifik
            // $tiketing = DB::table('tiketing')
            // ->where('id', 2) 
            // ->get();

        //get data dengan menyambungkan ke models tiketing
            // $tiketing = Tiketing::get();       //get All
            // $tiketing = Tiketing::all();       //get All
            // $tiketing = Tiketing::paginate(10);   //dengan pagination


        //untuk menyambung ke view index dan get data 
            return view('tiketing.index', [
                
                'tiketing' => $tiketing
            ]); 
    }


//untuk get halaman create
    public function create () {

        $this->authorize('admin'); //hanya admin yang bisa masuk

        return view('tiketing.create');
    }


//get halaman by id
    public function page_id ($id) {

        $tiketing = Tiketing::findOrFail($id); 

        return view('tiketing.page_id', compact('tiketing')); 
   }


//get halaman edit
    public function edit ($id) {
        $this->authorize('admin'); 
        $tiketing = Tiketing::findOrFail($id); 

        return view('tiketing.edit', compact('tiketing')); 
   }


//get page dashboard_admin
    public function dashboard_admin() {
        $this->authorize('admin'); 
        $tiketing = Tiketing::paginate(10) ;
        return view('tiketing.dashboard_admin', [
                
            'tiketing' => $tiketing
        ]); 
    }



//update data ke database
    public function update(Request $request, $id) {

        $validateData = $request->validate([
            'concert_name' => 'required|max:255|min:3',
            'address' => 'required|max:255',
            'gate' => 'required|max:255', 
            'seat' => 'required',
            'date' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'image' => 'required|file|max:1024',
        ]);

        $validateData['user_id'] = auth()->user()->id;

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->file('image')->store('post-image'));
            };
             $validateData['image'] = $request->file('image')->store('post-image');
        }
       

        Tiketing::where('id',$id)->update($validateData);
        // DB::table('tiketings')->where('id', $id)->update($validateData);

        $request->session()->flash('success', 'Update data success');

        return redirect ('/tiketing/admin/dashboard');
    } 


//insert ke database
    public function store(Request $request) {

        $validateData = $request->validate([
            'concert_name' => 'required|max:255|min:3',
            'address' => 'required|max:255',
            'gate' => 'required|max:255',
            'seat' => 'required',
            'date' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'image' => 'required|file|max:1024',
        ]);

        $validateData['user_id'] = auth()->user()->id; //mengambil id dari user login

        $validateData['image'] = $request->file('image')->store('post-image');

        // DB::table('tiketings')->insert($data);
        Tiketing::create($validateData);
        
        $request->session()->flash('success', 'insert data success');

        return redirect('/tiketing/admin/dashboard');
    }

//delete data ke database
    public function delete(Request $request, $id) {

        $this->authorize('admin'); 

        $tiketing = Tiketing::findOrFail($id);

        if($tiketing->image) {
            Storage::delete($tiketing->image);
        };

        // DB::table('tiketing')->where('id', $id)->delete();
        $tiketing->delete();

        $request->session()->flash('success', 'Delete data success');

        return redirect('/tiketing/admin/dashboard');
    }





}

