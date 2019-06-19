<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <video class="card-img-top" style="object-fit: cover; height: 190px" src="{{ env('APP_URL') . '/storage/videos/' . $article->video }}#t=12" alt="{{ $article->fullName }}">
        </video>
        <div class="card-body">
            <h3 class="card-title"><a href="{{route('article.full', $article->id)}}">{{$article->title}}</a></h3>
            <p class="card-text">{{$article->description}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{route('article.edit', ['id'=>$article->id])}}">{{__('Edit')}}</a>
                    <a class="btn btn-sm btn-primary" href="{{route('article.delete', ['id'=>$article->id])}}"
                       onclick="event.preventDefault();
                        document.getElementById('delete-form-{{$article->id}}').submit();">{{__('Delete')}}</a>
                    <form id="delete-form-{{$article->id}}" action="{{ route('article.delete', ['id'=>$article->id]) }}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
                <small class="text-muted">by {!! $article->user_name !!}</small>
            </div>
        </div>
    </div>
</div>
