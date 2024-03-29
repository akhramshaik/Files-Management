<script>
    // urls
    var upload_url = '{{route('file.upload')}}';
    var explorer_files_url = '{{route('explorer.files')}}';
    var explorer_folders_url = '{{route('explorer.folders')}}';
    var explorer_parent_url = '{{route('explorer.folder.parent')}}';
    var explorer_delete_url = '{{route('explorer.delete')}}';
    var explorer_create_url = '{{route('explorer.folder.create')}}';
    var explorer_rename_file_url = '{{route('explorer.file.rename')}}';
    var explorer_rename_folder_url = '{{route('explorer.folder.rename')}}';
    var explorer_move_file_url = '{{route('explorer.file.move')}}';
    var explorer_get_folder_bc_url = '{{route('explorer.folder.getBreadcrumb')}}';
    var explorer_get_quota_url = '{{route('user.getQuota')}}';


    var folder_move_file_url = '{{route('folder.movefile')}}';
    var folder_delete_url = '{{route('folder.delete')}}';

    @if(Auth::user()->user_type == 'admin')
        var admin_users_get_url = '{{route('admin.users.get')}}';
        var admin_users_save_url = '{{route('admin.users.save')}}';
    @endif


    var user_id = '{{Auth::user()->id}}';
</script>