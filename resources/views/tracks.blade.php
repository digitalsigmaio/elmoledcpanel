@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 content-insert">
            <div class="row button-area">
                <ul class="nav navbar-nav">
                    <li><a href="trackList" class="btn btn-info">List</a></li>
                    <li><a href="track" class="btn btn-primary">New Track</a></li>
                </ul>
            </div>
            <div id="imaginary_container">
                <form action="{{ route('trackSearch') }}" method="post">
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
    <div class="row" id="trackDetails"></div>
@endsection