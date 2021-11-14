<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Download;

class NoticeController extends Controller
{
    public function notice(){
    	$notices = DB::table('notices')->get();
        return view('admin.notice.notice',compact('notices'));
    }

        public function notice_store(Request $request){
        $request->validate([
            'title'=> 'required|max:255',
            'type'=> 'required',
            'publish'=> 'required',
            'file'=> 'required|mimes:pdf, application/pdf ,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf|max:10000',
        ]);

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads/notice'), $fileName);
            
            $data =array();
            $data['title']= $request->title;
            $data['type']= $request->type;
            $data['publish']= $request->publish;
            $data['file']=$fileName;
            $data['created_by']=1;

            $store = DB::table('notices')->insert($data);
            return redirect(route('admin.web.notice.notice'))->with('message','Service Added');
        }

    }


    public function notice_delete($id){

        $old = DB::table('notices')->where('id',$id)->first();
            if (file_exists(public_path('uploads/notice/'.$old->file))) {
                unlink(public_path('uploads/notice/'.$old->file));
            }

        $delete = DB::table('notices')->where('id',$id)->delete();
        return redirect(route('admin.web.notice.notice'))->with('error','Service Deleted');
    }



     public function download(){
        $downloads = Download::all();
        return view('admin.notice.download',compact('downloads'));
    }

    public function download_store(Request $request){
        $request->validate([
            'title'            => 'required|max:255',
            'notice_type'      => 'required',
            'publication'      => 'required',
            'file'            => 'required|mimes:pdf, application/pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf|max:10000',
        ]);
         if($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads/download'), $imageName);

            Download::create([
                'title'         => $request->title,
                'notice_type'   => $request->notice_type,
                'publication'   => $request->publication,
                'file'         => $imageName,
                'created_by'    => 1
            ]);  
            return redirect(route('admin.web.notice.download'))->with('message','Download Added');
        }
    }


    public function download_delete($id){

        $old = DB::table('downloads')->where('id',$id)->first();
            if (file_exists(public_path('uploads/download/'.$old->file))) {
                unlink(public_path('uploads/download/'.$old->file));
            }

        $delete = DB::table('downloads')->where('id',$id)->delete();
        return redirect(route('admin.web.notice.download'))->with('error','Download Deleted');
    }



}
