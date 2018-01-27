@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Listing <a href="/dashboard" class="btn btn-default btn-xs pull-right">Go Back</a></div>

                <div class="panel-body">
                    {!! Form::open(['action' => ['ListingsController@update',$listing->id],'method'=>'POST']) !!}
                    {{Form::bsText('name',$listing->name,['placeholder'=>'Enter Name'])}}
                    {{Form::bsText('email',$listing->email,['placeholder'=>'Enter Email'])}}
                    {{Form::bsText('phone',$listing->phone,['placeholder'=>'Enter Phone Number'])}}
                    {{Form::bsText('website',$listing->website,['placeholder'=>'Enter Website'])}}
                    {{Form::bsText('address',$listing->address,['placeholder'=>'Enter Address'])}}
                    {{Form::bsTextArea('bio',$listing->bio,['placeholder'=>'Enter Address'])}}
                    {{Form::bsHidden('_method','PUT')}}
                    {{Form::bsSubmit('Submit',['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection