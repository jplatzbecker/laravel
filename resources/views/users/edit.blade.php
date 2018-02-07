@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                        <div class="panel-heading">
                            Edit Profile
                        </div>
                    @if ($errors->has('avatar'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </div>
                    @endif
                    @if(!empty($avatarSuccess))
                        <div class="alert alert-success">
                            <strong>{{ $avatarSuccess }}</strong>
                        </div>
                    @endif
                        <div class="panel-body">
                            <img src="/uploads/avatars/{{ $currentUser->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            <h2>{{ $currentUser->name }}'s Profile</h2>
                            <form enctype="multipart/form-data" action="/user/edit/profile" method="POST">
                                <label>Update Profile Image</label>
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="pull-right btn btn-sm btn-primary">
                            </form>
                        </div>

                </div>
            </div>
        </div>

    </div>
@endsection
