<div  ng-controller="explorerController">
<div>
    <div class="container-fluid">
        <div class="row">
            <span class="hidden" ng-bind="folder" id="current-folder"></span>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div fm-loading="explorer" class="text-center" style="margin-top: 10px;">
                                    <i class="fa fa-spin fa-refresh fa-3x"></i>
                                </div>

                                <div id="explorer">
                                    <span ng-show="folders.length+files.length==0 && folder==0">No files found.</span>
                                    <table class="table table-hover table-bordered table-responsive" ng-show="folder==0 ? folders.length + files.length>0 : true">
                                        <thead>
                                        <th class="sortable" ng-click="orderByMe('file_name')"><i class="fa fa-sort"></i>&nbsp;&nbsp;Name</th>
                                        <th>Type</th>
                                        <th class="sortable" ng-click="orderByMe('file_size')"><i class="fa fa-sort"></i>&nbsp;&nbsp;Size</th>
                                        <th class="sortable" ng-click="orderByMe('updated_at')"><i class="fa fa-sort"></i>&nbsp;&nbsp;Date Modified</th>
                                        <th>Actions</th>
                                        </thead>
                                        <tr class="clickable-row" ng-hide="folder==0" ng-click="getParentFolderId()">
                                            <td>
                                                <i class="fa fa-level-up fa-2x"></i>&nbsp;&nbsp;..
                                            </td>
                                            <td></td><td></td><td></td><td></td>
                                        </tr>
                                        {{-- This row is for the folders, they act as a dropzone for files. --}}


                                        <tbody>
                                        <tr class="dropzone clickable-row" data-folder="@{{ f.id }}" ng-repeat="f in folders | orderBy:myOrderBy" ng-click="$parent.folder=f.id; getFiles()" ui-sortable="dropzone" ng-model="dropzoneFiles">
                                            <td><i class="fa fa-folder fa-2x" style="vertical-align:  -20%;"></i>&nbsp;&nbsp;&nbsp;&nbsp;@{{ f.folder_name }}</td>
                                            <td>Folder</td>
                                            <td></td>
                                            <td>@{{ f.updated_at }}</td>
                                            <td>
                                               <!--  <a class="btn btn-default btn-sm" href="{{route('explorer.download')}}/@{{ file.id }}"><i class="fa fa-download"></i></a> -->
                                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#rename-folder-modal" ng-click="$parent.folderName=f.folder_name; $parent.folderId=f.id;$parent.folder_desc=f.folder_desc; showFolderRenameModal($event);"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>



                                        {{-- This section is the files. They can be dragged to folders. --}}



                                        <tbody ui-sortable="draggable" ng-model="files">
                                        <tr ng-repeat="file in files | orderBy:myOrderBy" data-file="@{{ file.id }}">
                                            {{--<td class="hidden">@{{ file.id }}</td>--}}
                                            <td><i class="fa fa-file-text-o fa-2x" style="vertical-align: -20%;"></i>&nbsp;&nbsp;&nbsp;&nbsp;@{{ file.file_name }}</td>
                                            <td>@{{ file.file_extension }}</td>
                                            <td>@{{ file.file_size/1024/1024|number:2 }} MB</td>
                                            <td>@{{ file.updated_at }}</td>
                                            <td>
                                                
                                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#rename-file-modal" ng-click="$parent.fileName=file.file_name; $parent.fileId=file.id;$parent.description=file.description;"><i class="fa fa-pencil"></i></a>
                                               

                                                 <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#move-file-modal" ng-click="$parent.fileName=file.file_name; $parent.fileId=file.id;showMoveFileModal($event);">Move</a>

                                                 <a class="btn btn-primary btn-sm" target="_blank" href="{{route('videoPage')}}/@{{ file.file_hash }}">Open</a>

                                                  <a class="btn btn-default btn-sm" href="{{route('explorer.download')}}/@{{ file.id }}"><i class="fa fa-download"></i></a>
                                                <a class="btn btn-danger btn-sm" ng-click="deleteFile(file.id)"><i class="fa fa-trash"></i></a>
                                                
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- add folder modal -->
<div class="modal fade" id="folder-create-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create Folder</h4>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Folder Name:</b></label>
                        <input type="text" ng-model="folder_name" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label><b>Note:</b></label>
                    <textarea ng-model="folder_desc" class="form-control" rows="5" id="comment"></textarea>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
                <button type="button" class="btn btn-success" ng-click="createFolder()"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create Folder</button>
            </div>
        </div>
    </div>
</div>
<!-- rename file modal -->
<div class="modal fade" id="rename-file-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit File</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><b>File Name:</b></label>
                    <input type="text" ng-model="fileName" class="form-control" />
                </div>
                 <div class="form-group">
                    <label><b>Note:</b></label>
                    <textarea ng-model="description" class="form-control" rows="5" id="comment"></textarea>
                    <!-- <input type="text"  class="form-control" /> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
                <button type="button" class="btn btn-success" ng-click="renameFile()"><i class="fa fa-save"></i>&nbsp;&nbsp;Save Changes</button>
            </div>
        </div>
    </div>
</div>

    <!-- rename folder modal -->
    <div class="modal fade" id="rename-folder-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Folder</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Folder Name:</b></label>
                        <input type="text" ng-model="folderName" class="form-control" />
                    </div>
                     <div class="form-group">
                        <label><b>Note:</b></label>
                    <textarea ng-model="folder_desc" class="form-control" rows="5" id="comment"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
                    <button type="button" class="btn btn-success" ng-click="renameFolder()"><i class="fa fa-save"></i>&nbsp;&nbsp;Save Changes</button>
                </div>
            </div>
        </div>
    </div>



       <!-- Move file modal -->
    <div class="modal fade" id="move-file-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Move File Location</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                         <label><b>Select Folder Name:</b></label>
                        <select ng-model="folderId" class="form-control">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option ng-repeat="item in allFolders" value="@{{item.id}}">@{{item.folder_name}}</option>
                        </select>  
                    </div>

                    <div class="form-group">
                        <label><b>File Name:</b></label>
                        <input type="text" ng-model="fileName" class="form-control" disabled="disabled" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" ng-model="fileId" ng-value="fileId" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
                    <button type="button" class="btn btn-success" ng-click="moveFileModelPopUp()"><i class="fa fa-save"></i>&nbsp;&nbsp;Save Changes</button>
                </div>
            </div>
        </div>
    </div>



    <!-- rename folder modal -->
   <!--  <div class="modal fade" id="video-player-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Player</h4>
                </div>
                <div class="modal-body">


                    <p id="akhram"></p>


                    <video width="320" height="240" controls>
                            <source id="akhr" src="{{storage_path('app/uploads/') }}ZsxGsWo5XgWng5LgM7g3gDJX1v9TXFdJQMGxq4vF.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                    </video>


                    <video width="320" height="240" controls>
                          <source  src="{{URL::asset('/getVideo/ZsxGsWo5XgWng5LgM7g3gDJX1v9TXFdJQMGxq4vF.mp4')}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button>
                    <button type="button" class="btn btn-success" ng-click="renameFolder()"><i class="fa fa-save"></i>&nbsp;&nbsp;Save Changes</button>
                </div>
            </div>
        </div>
    </div> -->






</div>

<script type="text/javascript">
    


</script>