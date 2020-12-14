<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Coment;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts=Post::all();
         return view('frontend.index', ['posts'=>$posts] );
         
         
    }
    
    public function showPost(Post $post, Coment $coment,  $id)
    {
    
        $post = Post::find($id);
        $coments = Coment::where('idpost', $id)
        ->orderBy('id', 'desc')
        ->get();
        
        
        $path = public_path('logo'); // /var/www/html/laraveles/thirdApplication/public/logo
        $files = \File::files($path);
        $logo = 'logo.png';
        foreach($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            if($filename == $post->id) {
                $logo = $file->getFileName();
                break;
            }else{
                 $logo = 'base.jpg';
            }
        }
        
        
        return view('frontend.base', ['post' => $post, 'coments' => $coments, 'logo' => $logo]);
      
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::find($id);
         return view('frontend.create', ['post' => $post]);
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
            dd($object);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $object->id];
            return redirect('frontend/base/'. $object->idpost)->with($response);
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
    public function show(Post $post)
    {
       
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
