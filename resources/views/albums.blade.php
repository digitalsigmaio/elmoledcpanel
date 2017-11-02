@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 content-insert">
            <div class="row button-area">
                <ul class="nav navbar-nav">
                    <li><a href="albumList" class="btn btn-info">List</a></li>
                    <li><a href="album" class="btn btn-primary">New Album</a></li>
                </ul>
            </div>
            <div id="row" class="search-area">
                <div class="input-group">
                    <span class="input-group-addon">
                        <select name="category" id="category">
                            <option value="0">Artist</option>
                            <option value="1">Album</option>
                        </select>
                    </span>
                    <input type="search" class="form-control"  placeholder="Search" id="albumSearch">
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="list"></div>
@endsection