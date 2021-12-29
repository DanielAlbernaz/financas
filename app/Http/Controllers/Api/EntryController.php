<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\entry\EntryCreateRequest;
use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entry = Entry::all();
        return response()->json($entry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

     /**
     * Display a create new Entry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EntryCreateRequest $request)
    {       
        $fields = $request->validated();
        $entries = Entry::create($request->all());
        
        $response = [
                'status' =>   1,
                'message' =>   'Cadastrado com sucesso!',
                'entry' =>   $entries
            ];
            
        return response($response, 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EntryCreateRequest $request, $id)
    {
        $fields = $request->validated();

        $entries = Entry::find($id);
        $entries->update($request->all());
        
        $response = [
                'status' =>   200,
                'message' =>   'Alterado com sucesso!',
                'entry' =>   $entries
            ];
            
        return response($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entry = Entry::destroy($id);

        $response = [
            'status' =>   'excluído  com sucesso!',
            'entry' =>   $entry
        ];
        
    return response($response, 201);
    }
}
