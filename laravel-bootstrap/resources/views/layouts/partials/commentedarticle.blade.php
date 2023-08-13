<x-article title="{{ $article->title }}"
           author="{{ $article->author }}"
           lead="{{$article->lead}}"
           content="{{ $article->content }}"
           viewsCount="{{$article->viewsCount}}">
</x-article>