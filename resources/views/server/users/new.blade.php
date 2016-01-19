@extends('layouts.master')

@section('title')
    Create New Subuser
@endsection

@section('content')
<div class="col-md-12">
    <h3 class="nopad">Create New Subuser<hr />
    @can('edit-subuser', $server)
        <form action="{{ route('server.subusers.new', $server->uuidShort) }}" method="POST">
    @endcan
        <?php $oldInput = array_flip(is_array(old('permissions')) ? old('permissions') : []) ?>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="control-label">User Email:</label>
                <div>
                    <input type="text" name="email" autocomplete="off" value="{{ old('email') }}" class="form-control" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 fuelux">
                <h4>Power Management</h4><hr />
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['power-start']))checked="checked"@endif value="power-start"> <strong>Start Server</strong>
                        <p class="text-muted"><small>Allows user to start server.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['power-stop']))checked="checked"@endif value="power-stop"> <strong>Stop Server</strong>
                        <p class="text-muted"><small>Allows user to stop server.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['power-restart']))checked="checked"@endif value="power-restart"> <strong>Restart Server</strong>
                        <p class="text-muted"><small>Allows user to restart server. A user with this permission can stop or start a server even without the above permissions.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['power-kill']))checked="checked"@endif value="power-kill"> <strong>Kill Server</strong>
                        <p class="text-muted"><small>Allows user to kill server process.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['send-command']))checked="checked"@endif value="send-command"> <strong>Send Console Command</strong>
                        <p class="text-muted"><small>Allows sending a command from the console. If the user does not have stop or restart permissions they cannot send the application's stop command.</small><p>
                    </label>
                </div>
            </div>
            <div class="col-md-6 fuelux">
                <h4>File Management</h4><hr />
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['list-files']))checked="checked"@endif value="list-files"> <strong>List Files</strong>
                        <p class="text-muted"><small>Allows user to list all files and folders on the server but not view file contents.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['edit-files']))checked="checked"@endif value="edit-files"> <strong>Edit Files</strong>
                        <p class="text-muted"><small>Allows user to open a file for <em>viewing only</em>.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['save-files']))checked="checked"@endif value="save-files"> <strong>Save Files</strong>
                        <p class="text-muted"><small>Allows user to save modified file contents.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['add-files']))checked="checked"@endif value="add-files"> <strong>Create Files</strong>
                        <p class="text-muted"><small>Allows user to create a new file within the panel.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['upload-files']))checked="checked"@endif value="upload-files"> <strong>Upload Files</strong>
                        <p class="text-muted"><small>Allows user to upload files.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['delete-files']))checked="checked"@endif value="delete-files"> <strong>Delete Files</strong>
                        <p class="text-muted"><small><span class="label label-danger">Danger</span> Allows user to delete files from the system.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['download-files']))checked="checked"@endif value="download-files"> <strong>Download Files</strong>
                        <p class="text-muted"><small><span class="label label-danger">Danger</span> Allows user to download files. If a user is given this permission they can download and view file contents.</small><p>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 fuelux">
                <h4>Subuser Management</h4><hr />
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['list-subusers']))checked="checked"@endif value="list-subusers"> <strong>List Subusers</strong>
                        <p class="text-muted"><small>Allows user to view all subusers assigned to the server.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['view-subuser']))checked="checked"@endif value="view-subuser"> <strong>View Subuser</strong>
                        <p class="text-muted"><small>Allows user to view specific subuser permissions.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['edit-subuser']))checked="checked"@endif value="edit-subuser"> <strong>Edit Subuser</strong>
                        <p class="text-muted"><small>Allows user to modify permissions for a subuser. <em>They will not have permission to modify themselves.</em></small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['create-subuser']))checked="checked"@endif value="create-subuser"> <strong>Create Subuser</strong>
                        <p class="text-muted"><small>Allows a user to create a new subuser.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['delete-subuser']))checked="checked"@endif value="delete-subuser"> <strong>Delete Subuser</strong>
                        <p class="text-muted"><small>Allows a user to delete a subuser.</small><p>
                    </label>
                </div>
            </div>
            <div class="col-md-6 fuelux">
                <h4>Server Management</h4><hr />
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['set-connection']))checked="checked"@endif value="set-connection"> <strong>Set Default Connection</strong>
                        <p class="text-muted"><small>Allows user to set the default connection used for a server as well as view avaliable ports.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['view-startup']))checked="checked"@endif value="view-startup"> <strong>View Startup Command</strong>
                        <p class="text-muted"><small>Allows user to view the startup command and associated variables for a server.</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['edit-startup']))checked="checked"@endif value="edit-startup"> <strong>Edit Startup Command</strong>
                        <p class="text-muted"><small>Allows a user to modify startup variables for a server.</small><p>
                    </label>
                </div>
                <h4>SFTP Management</h4><hr />
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['view-sftp']))checked="checked"@endif value="view-sftp"> <strong>View SFTP Details</strong>
                        <p class="text-muted"><small>Allows user to view the server's SFTP information (not the password).</small><p>
                    </label>
                </div>
                <div class="checkbox highlight">
                    <label class="checkbox-custom highlight" data-initialize="checkbox">
                        <input class="sr-only" name="permissions[]" type="checkbox" @if(isset($oldInput['reset-sftp']))checked="checked"@endif value="reset-sftp"> <strong>Reset SFTP Password</strong>
                        <p class="text-muted"><small>Allows user to change the SFTP password for the server.</small><p>
                    </label>
                </div>
            </div>
        </div>
    @can('edit-subuser', $server)
        <div class="well">
            <div class="row">
                <div class="col-md-12">
                    {!! csrf_field() !!}
                    <input type="submit" class="btn btn-sm btn-primary" value="Add New Subuser" />
                </div>
            </div>
        </div>
    </form>
    @endcan
</div>
<script>
$(document).ready(function () {
    $('.server-users').addClass('active');
});
</script>
@endsection
