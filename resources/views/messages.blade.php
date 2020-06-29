@extends('layouts.app')

@section('content')
<div style=" width: 100%;
             height: 100%;
             background: #f2f3f5;
             padding-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('partials.profile')
            </div>
            <div class="col-md-8">
                @include('partials.messages')
            </div>
        </div>
    </div>
  </div>
@endsection
