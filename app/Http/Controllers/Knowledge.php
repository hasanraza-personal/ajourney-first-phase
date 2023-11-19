<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Image;
use Redirect;
use File;
use DateTime;

class Knowledge extends Controller
{
    //Retrieving all knowledge details for adminpage
    function getKnowledge(Request $req){
        $data = DB::table('knowledges')->select('knowledgesrno','maintopic','topicheading','topicphoto','topicdetails')->orderBy('knowledgesrno', 'DESC')->get();
        $maintopicphoto = DB::table('knowledges')->select('maintopicphoto')->orderBy('knowledgesrno', 'DESC')->distinct()->get();

        return view('admin.adminaddknowledge',['post'=>$data,'maintopicphoto'=>$maintopicphoto]);
    }

    //Add Knowledge
    function addKnowledge(Request $req){
        $maintopic = $req->input('maintopic');
        $maintopic_photo = $req->file('maintopicphoto');
        $topicheading = $req->input('topicheading');
        $subtopic_photo = $req->file('subtopicphoto');
        $topicdetails = $req->input('topicdetails');

        $check_maintopic_photo = DB::table('knowledges')->where('maintopic',$maintopic)->value('maintopicphoto');
        if($check_maintopic_photo == ""){
            //Main Topic Photo
            $mainphoto_filesize = $req->file('maintopicphoto')->getSize();

            $mainphoto_name = md5(rand()) . '.jpeg';
            $mainphoto_destinationPath = public_path('/knowledge-topic');

            if($mainphoto_filesize<=512000){
                Image::make($maintopic_photo->getRealPath())->save($mainphoto_destinationPath.'/'.$mainphoto_name);
            }else{
                Image::make($maintopic_photo->getRealPath())->save($mainphoto_destinationPath.'/'.$mainphoto_name,40);
            }

            //Sub Topic Photo
            $subphoto_filesize = $req->file('subtopicphoto')->getSize();

            $subphoto_name = md5(rand()) . '.jpeg';
            $subphoto_destinationPath = public_path('/knowledge');

            if($subphoto_filesize<=512000){
                Image::make($subtopic_photo->getRealPath())->save($subphoto_destinationPath.'/'.$subphoto_name);
            }else{
                Image::make($subtopic_photo->getRealPath())->save($subphoto_destinationPath.'/'.$subphoto_name,40);
            }

            $knowledge_details = [
                'maintopic'=>$maintopic,
                'maintopicphoto'=>$mainphoto_name,
                'topicheading'=>$topicheading,
                'topicphoto'=>$subphoto_name,
                'topicdetails'=>$topicdetails,
            ];
            DB::table('knowledges')->insert($knowledge_details);
        }else{
            //If main topic is alreday present then only subtopic photo will be inserted
            //Sub Topic Photo
            $subphoto_filesize = $req->file('subtopicphoto')->getSize();

            $subphoto_name = md5(rand()) . '.jpeg';
            $subphoto_destinationPath = public_path('/knowledge');

            if($subphoto_filesize<=512000){
                Image::make($subtopic_photo->getRealPath())->save($subphoto_destinationPath.'/'.$subphoto_name);
            }else{
                Image::make($subtopic_photo->getRealPath())->save($subphoto_destinationPath.'/'.$subphoto_name,40);
            }

            $knowledge_details = [
                'maintopic'=>$maintopic,
                'maintopicphoto'=>$check_maintopic_photo,
                'topicheading'=>$topicheading,
                'topicphoto'=>$subphoto_name,
                'topicdetails'=>$topicdetails,
            ];
            DB::table('knowledges')->insert($knowledge_details);
        }
        
        //Sending mainphoto data to knowledge/add so that Main Topic Photo input field gets hide
        $_maintopic_photo = DB::table('knowledges')->where('maintopic',$maintopic)->value('maintopicphoto');

        $req->flashOnly('maintopic');        
        return redirect()->back()->with('maintopic_photo',$_maintopic_photo); 
    }

    //Update Knowledge topic
    function updateKnowledge(Request $req){
        $knowledgesrno = $req->input('knowledgesrno');
        $topicsrno = $req->input('topicsrno');
        $maintopic = $req->input('maintopic');
        $topicheading = $req->input('topicheading');
        $topicdetails = $req->input('topicdetails');

        //Check if user wants to update knowledge Photo
        if($req->hasFile('topicphoto')){
            //Delete Knowledge Photo
            $knowledgephoto = DB::table('knowledges')->where('knowledgesrno',$knowledgesrno)->value('topicphoto');
            File::delete(public_path('knowledge/'.$knowledgephoto));

            //Insert new Knowledge photo in knowledge folder
            $file = $req->file('topicphoto');
            $file_size = $req->file('topicphoto')->getSize();
            $image_name = md5(rand()) . '.jpeg';
            $destinationPath = public_path('/knowledge');

            if($file_size<=512000){
                Image::make($file->getRealPath())->save($destinationPath.'/'.$image_name);
            }else{
                Image::make($file->getRealPath())->save($destinationPath.'/'.$image_name,40);
            }

            //Update data into database
            $new_knowledge_details = [
                'maintopic'=>$maintopic,
                'topicheading'=>$topicheading,
                'topicphoto'=>$image_name,
                'topicdetails'=>$topicdetails,
            ];
            DB::table('knowledges')->where('knowledgesrno',$knowledgesrno)->update($new_knowledge_details);
        }else{
            //Update data into database with no Knowlege Photo
            $new_knowledge_details = [
                'maintopic'=>$maintopic,
                'topicheading'=>$topicheading,
                'topicdetails'=>$topicdetails,
            ];
            DB::table('knowledges')->where('knowledgesrno',$knowledgesrno)->update($new_knowledge_details);
        }
        return redirect()->back();
    }

    //Delete Knowledge topic
    function deleteKnowledge(Request $req){
        $knowledgesrno = $req->input('knowledgesrno');
        $maintopic = $req->input('maintopic');
        $knowledgephoto = $req->input('knowledgephoto');

        if(File::exists(public_path('knowledge/'.$knowledgephoto))){
            File::delete(public_path('knowledge/'.$knowledgephoto));
        }
        DB::table('knowledges')->where('knowledgesrno',$knowledgesrno)->delete();

        //Delete Main Topic Photo, if last subtopic gets deleted from the Database 
        $maintopicphoto = DB::table('knowledges')->where('maintopic',$maintopic)->value('maintopicphoto');
        if($maintopicphoto == ""){
            if(File::exists(public_path('knowledge-topic/'.$knowledgephoto))){
                File::delete(public_path('knowledge/'.$knowledgephoto));
            }
        }
        return redirect()->back();
    }

    function updatemaintopicImage(Request $req){
        $file = $req->file('updatemaintopicphoto');
        $previousmainphoto = $req->input('previousmaintopicphoto');

        //Delete previous Main Topic Photo
        if(File::exists(public_path('knowledge-topic/'.$previousmainphoto))){
            File::delete(public_path('knowledge-topic/'.$previousmainphoto));
        }

        //Insert new Knowledge photo in knowledge-topic folder
        $file_size = $req->file('updatemaintopicphoto')->getSize();
        $image_name = md5(rand()) . '.jpeg';
        $destinationPath = public_path('/knowledge-topic');

        if($file_size<=512000){
            Image::make($file->getRealPath())->save($destinationPath.'/'.$image_name);
        }else{
            Image::make($file->getRealPath())->save($destinationPath.'/'.$image_name,40);
        }

        //Update data into database
        $new_mainphoto = [
            'maintopicphoto'=>$image_name,
        ];
        DB::table('knowledges')->where('maintopicphoto',$previousmainphoto)->update($new_mainphoto);
        return redirect()->back();
    }

    //Retrieving all Knowledge topic
  	function getknowledgetopic(Request $req){
        $maintopic = DB::table('knowledges')->select('maintopic','maintopicphoto')->distinct()->get();
        return view('knowledge.knowledge-home',compact('maintopic')); 
    }

    //Retrieving Knowledge details of specific topic
    function getKnowledgedetails(Request $req,$id){
        $knowledges = DB::table('knowledges')->select('knowledgesrno','topicheading','topicdetails','topicphoto')->where('maintopic',$id)->get();

        return view('knowledge.displayknowledge',compact('knowledges'));  
    }
}
