<div class="col-md-2">
    <div class="article">
        <div class="card mb-4">
                <video class="card-img-top" style="object-fit: cover; height: 115px" src="{{ env('APP_URL') . '/storage/videos/' . $article->video }}#t=12" alt="{{ $article->fullName }}">
                </video>
            <div class="card-body">
                <a class="card-title" title="{{$article->title}}" href="{{route('article.full', $article->id)}}">{{$article->title}}</a>
                <a class="text-muted d-block" href="{{route('user.profile', ['id' => $article->user_id ])}}">{!! $article->user_name !!}</a>
                <span class="text-muted d-block">Просмотры: {{$article->total_views}}</span>
                <span class="text-muted d-block">
                    @include('article.created_at')
                </span>
            </div>
        </div>
    </div>
</div>