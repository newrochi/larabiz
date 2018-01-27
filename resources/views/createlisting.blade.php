@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Listing <a href="/dashboard" class="btn btn-default btn-xs pull-right">Go Back</a></div>

                <div class="panel-body">
                    {!! Form::open(['action' => 'ListingsController@store','method'=>'POST']) !!}
                        {{Form::bsText('name','',['placeholder'=>'Enter Name'])}}
                        {{Form::bsText('email','',['placeholder'=>'Enter Email'])}}
                        {{Form::bsText('phone','',['placeholder'=>'Enter Phone Number'])}}
                        {{Form::bsText('website','',['placeholder'=>'Enter Website'])}}
                        {{Form::bsText('address','',['placeholder'=>'Enter Address'])}}
                        {{Form::bsTextArea('bio','',['placeholder'=>'Enter Address'])}}
                        {{Form::bsSubmit('Submit',['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection