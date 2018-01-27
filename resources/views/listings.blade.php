@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Latest Business Listings</div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($listings)>0)
                        <ul class="list-group">
                            @foreach($listings as $listing)
                                 <li class="list-group-item"><a href="/listings/{{$listing->id}}">{{$listing->name}}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p>No Listings Found!</p>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
