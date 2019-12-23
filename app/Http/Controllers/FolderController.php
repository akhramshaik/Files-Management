<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\File;
use Auth;
use DB;
use Carbon\Carbon;

use Log;

class FolderController extends Controller
{
    public function createFolder(Request $request) {
        $name = $request->input('name');
        $desc = $request->input('description');
        $parent = $request->input('parent');


        $folder = new Folder();
        $folder->folder_name = $name;
        $folder->folder_desc = $desc;
        $folder->category = 0;
        $folder->user_id = Auth::id();
        $folder->parent_folder = $parent;
        $folder->save();

        return response()->json(['msg' => 'Folder created.', 'status' => '200'], 200);
    }

    public function getUserFolders(Request $request) {
        $folder = $request->input('folder');

        if ($folder == 0) {
            // get the parent folders
            $folders = Folder::where('parent_folder', '0')->where('user_id', Auth::id())->orderBy('folder_name', 'asc')->get();

                 foreach ($folders as $key => $value) {
                        # code...
                         $foldersCount = Folder::where('parent_folder', $value->id)->where('user_id', Auth::id())->orderBy('folder_name', 'asc')->count();
              
                          $filesCount = File::where('folder_id', $value->id)->where('user_id', Auth::id())->orderBy('file_name', 'asc')-> count();

                         $count = $foldersCount + $filesCount;
                         $folders[$key]['count'] = $count;
                    }
           
        } else {
            $folders = Folder::where('parent_folder', $folder)->where('user_id', Auth::id())->orderBy('folder_name', 'asc')->get();

             foreach ($folders as $key => $value) {
                # code...
                 $foldersCount = Folder::where('parent_folder', $value->id)->where('user_id', Auth::id())->orderBy('folder_name', 'asc')->count();
      
                  $filesCount = File::where('folder_id', $value->id)->where('user_id', Auth::id())->orderBy('file_name', 'asc')-> count();

                 $count = $foldersCount + $filesCount;
                 $folders[$key]['count'] = $count;
            }
        }

        return $folders->toJson();
    }

    public function getParentFolderId(Request $request) {
        $folder = $request->input('folder');

        return Folder::where('id', $folder)->select('parent_folder')->firstOrFail();
    }

    public function renameFolder(Request $request) {
        $id = $request->input('id');
        $name = $request->input('name');
        $desc = $request->input('folder_desc');

        $folder = Folder::where('id', $id)->first();

        $folder->folder_name = $name;
        $folder->folder_desc = $desc;
        $folder->save();

        return response()->json(['msg' => 'Folder renamed.', 'status' => '200'], 200);
    }

    public function getFolderBreadcrumb(Request $request)
    {
        // This probably could be better.
        $id = $request->input('folder');

        if ($id != 0) {
            // Get the current folder
            $folders = Folder::where('id', $id)->get();

            // See if it has a parent
            $parentId = $folders[0]["parent_folder"];

            if ($parentId != 0) {
                $looping = true;

                while ($looping) {
                    // Get the parent details.
                    $nextFolder = Folder::where('id', $parentId)->get();

                    $parentId = $nextFolder[0]["parent_folder"];

                    $folders = $folders->merge($nextFolder);

                    $looping = $parentId != 0;
                }
            }

            return $folders->toJson();
        }

        return null;
    }

    public function getAllFolders(Request $request) {
     
            $folders = Folder::orderBy('folder_name', 'asc')->get();
    
            return $folders->toJson();
    }

    public function deleteFolder($id){
        try {
            $folder = Folder::where('id', $id)->first();

            $folder->forceDelete();

            return response()->json(['msg' => 'Folder deleted.', 'status' => '200'], 200);
        } catch (\Exception $ex) {
            return response()->json(['msg' => $ex->getMessage(), 'status' => '500'], 500);
        }
    }



}
