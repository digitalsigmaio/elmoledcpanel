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
            <div id="imaginary_container">
                <form action="{{ route('artistSearch') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group stylish-input-group">
                        <input type="text" class="form-control"  placeholder="Search" name="search">
                        <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" id="artistDetails"></div>
@endsection