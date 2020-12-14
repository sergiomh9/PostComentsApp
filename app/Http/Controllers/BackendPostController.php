<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class BackendPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
         return view('backend.post.index', ['posts'=>$posts] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     
    public function store(Request $request)
    {
         $post = new Post($request->all());
        try {
            $result = $post->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        if($post->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $post->id];
            return redirect('backend/post')->with($response);
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
        
        $path = public_path('logo'); // /var/www/html/laraveles/thirdApplication/public/logo
        $files = \File::files($path);
        $logo = 'logo.png';
        foreach($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            if($filename == $post->id) {
                $logo = $file->getFileName();
                break;
            }
        }
        
        return view('backend.post.show', ['post' => $post, 'logo' => $logo]);
        
        
        //   return view('backend.post.show', ['post'=>$post] );
    }


     private function uploadFile(Request $request, $id) {
        if($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo'); // $request->logo
            $target = 'logo';
            
            // $fileName = $file->getClientOriginalName();
            // $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION); // 1ra forma
            
            $fileExtension = \File::extension($file->getClientOriginalName());
            
            $name = $id . "." . $fileExtension; // date('YmdHis') . $file->getClientOriginalName();
            $file->move($target, $name);
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
          return view('backend.post.edit', ['post'=>$post] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
         $this->uploadFile($request, $post->id);
         try {
            $result = $post->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        /*$enterprise->fill($request->all());
        $result = $enterprise->save();*/
        if($result) {
            $response = ['op' => 'update', 'r' => $result, 'id' => $post->id];
            return redirect('backend/post')->with($response);
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
    public function destroy(Post $post)
    {
         $id = $post->id;
        try {
            $result = $post->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/post')->with($response);
    }
}
