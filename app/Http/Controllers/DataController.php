<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DataController extends Controller
{
    public function view()
    {
        return view('data');
    }

    // insert 
    public function store(Request $request)
    {
        $request->validate( //validation
            [
                'title' => 'required',
                'desc' => 'required'

            ]
        );

        $file = $request->image;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);


        $insert = new data;
        $insert->title = $request['title'];
        $insert->desc = $request['desc'];
        $insert->user_id = auth()->user()->id;
        $insert->image = $fileName;
        $insert->save();

        return redirect('data')->with('message', 'Data Added Successfully'); // send flash msg to view
    }
    //read data
    public function read(Request $request)
    {

        $search = $request['search'] ?? "";

        $read = data::where('title', 'LIKE', '%' . $search . '%')->where('user_id', auth()->user()->id)->get(); //auth is like work session
        $url = 'data';
        $button = 'Add';
        $heading = 'Welcome To Note Book';
        return view('data', compact('read', 'url', 'heading', 'button', 'search')); //send data to view page
    }
    //delete
    public function delete($id)
    {
        $delete = data::find($id);
        if (!is_null($delete)) {
            $delete->delete();
        }
        return redirect('/data')->with('message', 'Delete Successfully'); // send flash msg
    }
    //update data
    public function edit($id)
    { //perameter id
        $edit = Data::find($id); //get all data
        $read = data::where('user_id', auth()->user()->id)->get(); //chechk where class
        $url = '/data/edit/' . $id;
        $heading = 'Update Your Data'; //dynamic heading
        $button = 'Update'; // dynamic button
        if (is_null($edit)) {
            return redirect('data');
        } else {
            return view('data', compact('edit', 'read', 'url', 'heading', 'button')); //send data to view page
        }
    }
    //update insert data 
    public function update($id, Request $request)
    {$update = Data::find($id);
        $file = $request->image;
        if($request->hasFile('image')){
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
        $update->image = $fileName;
        }
        
        $update->title = $request['title'];
        $update->desc = $request['desc'];
   
        $update->save();
        return redirect('data')->with('message', 'Data Update Successfully '); // send flash msg to view

    }
    public function reading($id)
    {
        $reading = data::where('id', $id)->firstOrFail();
        if (is_null($reading)) {
            return redirect('data');
        } else {
            return view('reading', compact('reading'));
        }
    }
}
