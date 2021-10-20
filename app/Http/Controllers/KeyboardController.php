<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KeyboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('manager')->except(['viewKeyboardsByCategory', 'viewKeyboardDetail']);
    }

    public function viewKeyboardsByCategory($categoryId){
        
        //pagination
        $keyboards = Keyboard::where('category_id', $categoryId)->paginate(8);
        $categories = Category::all();

        //search
        if(request('search')){
            //getting field request from the select
            if(request('field') == "name"){
                //searching the query at model
                $keyboards = Keyboard::where('keyboardName','like','%'.request('search').'%')
                ->where('category_id','like','%'.$categoryId.'%')->paginate(8);
            }
            else{
                $keyboards = Keyboard::where('keyboardPrice','like','%'.request('search').'%')
                ->where('category_id','like','%'.$categoryId.'%')->paginate(8);
            }
        }
        // ddd($keyboards);

        return view('keyboard.index', compact('categories','keyboards'));
    }

    public function viewKeyboardDetail($id){
        $keyboard = Keyboard::find($id);
        $categories = Category::all();
        return view('keyboard.detail', compact('categories', 'keyboard'));
    }

    public function create(){
        $categories = Category::all();
        return view('keyboard.create', compact('categories'));
    }

    public function store(Request $request){

        $keyboard = $request->validate([
            'category_id' => 'required',
            'keyboardName' => 'required|unique:keyboards,keyboardName|min:5',
            'keyboardPrice' => 'required|numeric|min:30',
            'description' => 'required|min:20',
            'keyboardImage' => 'required|image'
        ]);


        $keyboard['keyboardImage'] = $request->file('keyboardImage')->store('keyboard-images');

        Keyboard::create($keyboard);

        return redirect('/view/'.$request->category_id);
    }

    public function edit($id){
        $keyboard = Keyboard::find($id);

        $categories = Category::all();
        return view('keyboard.edit', compact('categories','keyboard'));

    }

    public function update(Request $request, $id){

        $request->validate([
            'category_id' => 'required',
            'keyboardName' => 'required|min:5',
            'keyboardPrice' => 'required|numeric|min:30',
            'description' => 'required|min:20',
            'keyboardImage' => 'image'
        ]);

        $keyboard = Keyboard::find($id);

        $keyboard->category_id = $request->category_id;
        $keyboard->keyboardName = $request->keyboardName;
        $keyboard->keyboardPrice = $request->keyboardPrice;
        $keyboard->description = $request->description;

        $img = $request->file('keyboardImage');
        // ddd($img);
        if ($img) {
            File::delete('storage/'.$keyboard->keyboardImage);
            $keyboard->keyboardImage = $img->store('keyboard-images');
        }

        $keyboard->save();

        return redirect('/view/'.$keyboard->category_id);
    }


    public function delete($id){
        $keyboard = Keyboard::find($id);
        File::delete('storage/'.$keyboard->keyboardImage);
        Keyboard::destroy($id);

        return back();
    }
}
