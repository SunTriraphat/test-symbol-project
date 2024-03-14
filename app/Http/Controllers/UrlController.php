<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\Models\shortUrl;
use Illuminate\Http\Request;


class UrlController extends Controller
{
    //
   
    public function destroy(Request $request)
    { 
        $delete_url = shortUrl::where('id',$request->id)->delete();
        return redirect()->back()->with('alert', 'delete success!');
    }
    
    
    public function short(ShortRequest $request)
    { 
        
        if ($request->original_url) {
            if(auth()->user()){
                $new_url = auth()->user()->links()->create([
                    'original_url' => $request->original_url                
                ]);
            }else{
                $new_url = shortUrl::create([
                    'original_url' => $request->original_url                
                ]);
            }
            
            if($new_url){
                $short_url = base_convert($new_url->id,10,36);
                $new_url->short_url = $short_url;
                $new_url->update();
                return redirect()->back()->with('success_message','<h1 class="text-3xl text-red-500 ">Click your url: <a class="underline underline-offset-8 " href="'.url($short_url).'">'.url($short_url).'"</a></h1>');
            }
        }
        return back();
    }
    public function show($code){
       $short_url = shortUrl::where('short_url',$code)->first();
      
       if($short_url){
        return redirect()->to(url($short_url->original_url));
       }
       return redirect()->to(url('/'));
    }

    
}