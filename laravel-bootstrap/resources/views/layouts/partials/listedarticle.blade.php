@newArticle($article)
    <x-article title="{{ $article->title }} (NEW)"
           author="{{ $article->author }}"
           lead="{{$article->lead}}"
           content="{{ $article->content }}"
           viewsCount="{{$article->viewsCount}}"
           publishDate="{{$article->created_at}}">
    </x-article>
    @else
    <x-article title="{{ $article->title }}"
           author="{{ $article->author }}"
           lead="{{$article->lead}}"
           content="{{ $article->content }}"
           viewsCount="{{$article->viewsCount}}"
           publishDate="{{$article->created_at}}">
    </x-article>
    @endnewArticle
    <a href="{{route('article.id', $article->id)}}"><button>View</button></a>
    <a href="{{route('article.edit-form', $article->id)}}"><button>Edit</button></a>