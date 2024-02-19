@extends('front.layouts.master')
<!-- Main Content-->
@section('title','Anasayfa')
@section('content')
        <div class="col-md-9">
            @foreach($articles as $article)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{route('single', [$article->getCategory->slug,$article->slug]           )}}">
                    <h2 class="post-title">
                        {{$article->title}}
                    </h2>
                    <img src="{{$article->image}}" >
                    <h3 class="post-subtitle">{{Str::limit($article->content,110)}}</h3>
                </a>
                <p class="post-meta">
                    Kategori :
                    <a href="#!">{{$article->getCategory->name}}</a>
                  <span class="float-end">  {{$article->created_at->diffForHumans() }}</span>
                </p>
            </div>
            @if(!$loop->last)
                    <hr class="my-4" />
            @endif

            @endforeach
            <!-- Divider-->

        </div>
@include('front.widget.categoryWidget')
@endsection
