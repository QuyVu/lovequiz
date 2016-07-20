@extends('layouts.app')

@section('css')
    @parent
    {{ Html::style('/css/profile.css') }}
@stop

@section('script')
    @parent
    {{ Html::script('/js/profile.js') }}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size:20px"><b>{{$user->name}}'s Profile Image</b></div>

                <div class="panel-body">
                    <div class="row">
                        <div class = "col-md-3">
                            <div style="border-right:1px solid #ddd;height:180px">
                            <img src="/image/avatar/{{$user->avatar}}" style="height:180px; width:180px; margin:0px 5px; border-radius:50%">
                            </div>
                        </div>
                        <div class = "col-md-6">
                            {!! Form::open(array('action' => 'UserController@updateAvatar', 'enctype' => 'multipart/form-data')) !!}
                                <!--input type="hidden" name="_token" value="{{csrf_token()}}"/-->
                                <label class="control-label">Update Profile's Image</label>
                                <div class="input-group image-preview">
                                    <!-- don't give a name === doesn't send on POST/GET -->
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> 
                                    <span class="input-group-btn">
                                        <!-- image-preview-clear button -->
                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                            <i class="fa fa-times"></i> Clear
                                        </button>
                                        <!-- image-preview-input -->
                                        <div class="btn btn-default image-preview-input">
                                            <i class="fa fa-folder-open"></i>
                                            <span class="image-preview-input-title">Browse</span>
                                            {!!Form::file('avatar',['accept'=>'image/png, image/jpeg, image/gif'])!!}
                                        </div>
                                    </span>
                                </div><!-- /input-group image-preview [TO HERE]--> 
                                {!! Form::submit('Submit',['class'=>'btn btn-primary', 'style'=>'margin-top:10px']) !!}
                            <!--/form-->
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
