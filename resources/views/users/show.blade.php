@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User: {!! $user->name !!} | ID: #{!! $user->id !!}<br/>

            <span class="small-font">Role: </span>
            <span class="give-bottom-space">
                {!! $user->role['name'] !!}
            </span><br />
            <span class="small-font">Email: </span>
            <span class="give-bottom-space">
                    {!! $user->email !!}
            </span><br />
            <span class="small-font">Joined: </span>
            <span class="give-bottom-space">
                {!! $user->created_at->format('D d, M, Y h:i') !!}
            </span><br />
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -30px;margin-bottom: 5px" href="{!! route('users.edit',['id'=> $user->id]) !!}">Edit Profile</a>
        </h1>
    </section>
    <div class="content">

        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                    <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
