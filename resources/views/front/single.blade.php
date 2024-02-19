@extends('front.layouts.master')
<!-- Main Content-->
@section('title',$article->title)
@section('bg',$article->image)
@section('content')

                <div class="col-md-9  mx-auto">
                    {{$article->content}}
                    <br><br><span class="text-danger">Okunma Sayısı : {{$article->hit}}</span>
                </div>

    @include('front.widget.categoryWidget')
@endsection
