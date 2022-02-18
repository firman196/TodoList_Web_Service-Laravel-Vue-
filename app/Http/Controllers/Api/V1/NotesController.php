<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NotesResource;
use App\Models\Notes;
use Illuminate\Support\Carbon;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(NotesResource::collection(Notes::orderBy('created_at','DESC'))->additional(['meta' => [
            'code'      =>200,
            'status'    =>'success',
            'message'   => 'get notes data successfully'   
        ]]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $note       = new Notes;
            $note->name = $request->name;
            $note->save();

            return response()->json([new JadwalResource($note),['meta' => [
                'code'      =>200,
                'status'    =>'success',
                'message'   => 'save new notes data successfully'   
            ]]]);

        }catch(\Illuminate\Database\QueryException $exception){
            return response()->json(['data'=>null,['meta' => [
                'code'      =>500,
                'status'    =>'failed',
                'message'   => 'save new notes data failed'   
            ]]]);
        }
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
        //
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
        try{
            $note       = Notes::find($id);
            $note->name = $request->name;
            $note->save();
            return response()->json([new JadwalResource($note),['meta' => [
                'code'      =>200,
                'status'    =>'success',
                'message'   => 'update notes data successfully'   
            ]]]);

        }catch(\Illuminate\Database\QueryException $exception){
            return response()->json(['data'=>null,['meta' => [
                'code'      =>500,
                'status'    =>'failed',
                'message'   => 'update notes data failed'   
            ]]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $note       = Notes::find($id)->delete();
          
            return response()->json(['meta' => [
                'code'      =>200,
                'status'    =>'success',
                'message'   => 'delete notes data successfully'   
            ]]);

        }catch(\Illuminate\Database\QueryException $exception){
            return response()->json(['data'=>null,['meta' => [
                'code'      =>500,
                'status'    =>'failed',
                'message'   => 'delete notes data failed'   
            ]]]);
        }
    }
}
