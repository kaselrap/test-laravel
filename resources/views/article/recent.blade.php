<div class="article">
    <div class="card mb-4">
        <div class="row">
            <video class="card-img-top col-md-6" style="object-fit: cover; height: 124px;width: 100%; display: block" src="{{ env('APP_URL') . '/storage/videos/' . $article->video }}">
            </video>
            <div class="card-body col-md-6">
                <a href="{{route('article.full', $article->id)}}" class="card-title">
                    {{$article->title}}
                </a>
                <a href="{{route('user.profile', ['id' => $article->user_id ])}}" class="text-muted d-block">{!! $article->user_name !!}</a>
                <span class="text-muted d-block">Views: {{$article->total_views}}</span>
            </div>
        </div>
    </div>
</div>