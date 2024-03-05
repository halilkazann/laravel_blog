@extends('front.layouts.master')
<!-- Main Content-->
@section('title',$category->name . ' Kategorisi')
@section('content')
        <div class="col-md-9">

            @include('front.widget.articleList')

        </div>
@include('front.widget.categoryWidget')
@endsection

