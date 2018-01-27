@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                   <span class="pull-right"><a href="/listings/create" class="btn btn-primary btn-xs">Add Listing</a></span>
                </div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($listings)>0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tboady>
                                @foreach($listings as $listing)
                                    <tr>
                                        <td>{{$listing->name}}</td>
                                        <td><span class="pull-right"><a href="/listings/{{$listing->id}}/edit" class="btn btn-primary btn-xs">Edit </a></span></td>
                                        <td>
                                            {!! Form::open(['action' => [ 'ListingsController@destroy',$listing->id],'method'=>'POST','class'=>'pull-right','onsubmit'=>'return confirm("Are you sure?")']) !!}
                                            {{Form::bsHidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-xs '])}}
                                            {!! Form::close() !!}
                                        </td>

                                    </tr>
                                @endforeach
                            </tboady>
                        </table>
                        @endif
                </div>
            </div>
        </div>
    </div>

@endsection
