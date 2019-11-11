<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = Person::all();
        return view('people.home')->with('person', $person);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.newperson');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
          ]);
        $person =  Person::create([
            'name' => $request['name'],
            'email' => $request['email'],
           
        ]);

        if($person){
            return $this->sendResponse(null, 'Success');
        }else return $this->sendError('error occurrs');

    }

    public function show(Person $person)
    {
        $id = Person::find($person->id);
        return view('people.details')->with('people', $id);
        
    }

    public function edit(Person $person)
    {
        
    }

    public function update(Request $request)
    {
        request()->validate([
        'name' => 'required',
        'email' => 'required',
        'id' => 'required',
        
        ]);


        $update = Person::where('id', '=', $request->id)->update([
        'name' => $request['name'],
        'email' => $request['email'],
        ]);

        if($update){
            return $this->sendResponse(null, 'Success');
        }else return $this->sendError('error occurrs');
    }


    public function destroy(Person $person)
    {
        
        $delete = Person::find($person->id);
        $delete->delete();

        return redirect('/person'); 

    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
    public function sendResponse($result , $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
}
