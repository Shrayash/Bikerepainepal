<?php

namespace App\Http\Controllers;

use App\User;
use App\videos;
use App\video_contents;
use App\publication;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VideoStatus;
use DB;



class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function video($id)
    {
        // try{
            $users=User::findOrFail($id);
            $videos=$users->videos;
        // } catch(\Exception $exception) { 
        //     throw new NotFoundException();
        // }
        return view('video.publish')->with('users',$users)->with('videos',$videos);
    }

    public function publication($id)
    {
        // try{
            $users=User::findOrFail($id);
            $publications=$users->publication;
        // } catch(\Exception $exception) { 
        //     throw new NotFoundException();
        // }
        return view('publication.publish')->with('users',$users)->with('publications',$publications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        // try{
            $video = videos::findOrfail($id);
            $videostat = $video['status'];
            $video['status'] = $request->get('activeness');
            $video->update();
            $user=$video->user;
            $current_stat=(int)$video['status'];
            if($videostat === $current_stat){
            }else{
                Notification::send($user, new VideoStatus($user));
            }
        // } catch(\Exception $exception) { 
        //     throw new NotFoundException();
        // }
        return  redirect()->route('video.publish',$user->id);
    }

    public function storepub(Request $request,$id)
    {
        
            $publication = publication::findOrfail($id);
            $pubstat = $publication->status;
            $publication->status = $request->get('activeness');
            $publication->update();
            $user=$publication->user;
            $current_stat=(int)$publication->status;
            
            if($pubstat === $current_stat){
            }else{
                Notification::send($user, new VideoStatus($user));
            }
       
        return  redirect()->route('pub.publish',$user->id);
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
