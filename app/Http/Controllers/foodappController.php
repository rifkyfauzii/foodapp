<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class foodappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('name','desc')->paginate(2);
        return view('foodapp.index')->with('menu', $menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foodapp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{   
      // Validasi input dari user
      Session::flash('name',$request->name);
      Session::flash('price',$request->price);

     $validateData = $request->validate([
        'name' => 'required|string|unique:menus,name,max:255',
        'image' => 'required|image|file|max:1024|mimes:jpeg,png,jpg,gif|',
        'price' => 'required|integer',
    ],[
        'name.required'=>'Nama Wajib Diisi',
        'name.string'=>'Nama Wajib dalam huruf',
        'name.unique'=>'Nama yang diinput sudah ada di dalam database',
        'price.integer'=>'Harga Wajib dalam Angka',
        'image.required'=>'Gambar Wajib Diisi',
        'price.required'=>'Harga Wajib Diisi',
    ]);

    $imagePath = '';

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images-upload');
    }


    $price = str_replace('.', '', $request->input('price'));

    $menu = new Menu();
    $menu->name = $request->input('name');
    $menu->image = $imagePath;
    $menu->price = $request->input('price'); // Saving price

    $menu->save();

    return redirect()->to('admin')->with('success','Berhasil Menambahkan Menu');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = menu::where('name',$id)->first();
        return view('foodapp.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:menus,name,max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|integer',
        ],[
            'name.required'=>'Nama Wajib Diisi',
            'name.string'=>'Nama Wajib dalam huruf',
            'name.unique'=>'Nama yang diinput sudah ada di dalam database',
            'price.integer'=>'Harga Wajib dalam Angka',
            'image.required'=>'Gambar Wajib Diisi',
            'price.required'=>'Harga Wajib Diisi',
        ]);
    
        $imagePath = '';
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images-upload', 'public');
        }
    
        $data = [
            'name' => $request->input('name'),
            'image' => $imagePath,
            'price' => $request->input('price'),
        ];
    
        $menu = Menu::where('name', $id)->update($data);
        return redirect()->to('admin')->with('success','Berhasil Mengubah Menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::where('name', $id)->delete();
        return redirect()->to('admin')->with('success','Berhasil Menghapus Menu');
    }
    
    public function showMenus()
    {
        $menus = Menu::all(); 
        return view('home', compact('menus')); 
    }
}
