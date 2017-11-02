@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 content-insert">
            <div class="row button-area">
                <ul class="nav navbar-nav">
                    <li><a href="artistList" class="btn btn-info">List</a></li>
                    <li><a href="artist" class="btn btn-primary">New Artist</a></li>
                </ul>
            </div>
            <div id="row" class="search-area">
                <div class="form-group">
                    <input type="search" class="form-control"  placeholder="Search" id="artistSearch">
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="list"></div>
@endsection