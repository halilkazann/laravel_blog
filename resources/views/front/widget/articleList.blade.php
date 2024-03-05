@if(count($articles)>0)
@foreach($articles as $article)
    <!-- Post preview-->
    <div class="post-preview">
        <a href="{{route('single', [$article->getCategory->slug,$article->slug]           )}}">
            <h2 class="post-title">
                {{$article->title}}
            </h2>
            <img src="{{$article->image}}"  >
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
{{{$articles->links('pagination::bootstrap-4') }}}
@else
    <div class="alert alert-danger">
        <h1>İlgili kategoride herhangi bir veri yok</h1>
    </div>
@endif
