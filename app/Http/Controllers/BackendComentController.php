<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Coment;
use Illuminate\Http\Request;

class BackendComentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $coments=Coment::all();
         return view('backend.coment.index', ['coments'=>$coments] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('backend.coment.create', ['posts' => $posts]);
    }
    
    function createComentEp($idpost) {
        $post = Post::find($idpost);
         return view('backend.coment.create', ['post' => $post]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $object = new Coment($request->all());
        // dd($object);
        try {
            
            $result = $object->save();
            
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $object->id];
            return redirect('backend/coment')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coment $coment)
    {
         return view('backend.coment.show', ['coment' => $coment]);
    }
    
    
    function showComents($idpost) {
        $coments = Coment::where('idpost', $idpost)
                ->orderBy('id', 'asc')
                ->get();
        return view('backend.coment.index', ['coments' => $coments]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coment $coment)
    {
         $posts = Post::all();
        return view('backend.coment.edit', ['coment' => $coment, 'posts' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coment $coment)
    {
         try {
            $result = $coment->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        
        if($result) {
            $response = ['op' => 'update', 'r' => $result, 'id' => $coment->id];
            return redirect('backend/coment')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coment $coment)
    {
         $id = $coment->id;
        try {
            $result = $coment->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/coment')->with($response);
    
    }
}
