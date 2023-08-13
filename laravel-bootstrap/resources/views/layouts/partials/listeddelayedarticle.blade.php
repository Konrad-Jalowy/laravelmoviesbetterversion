<x-delayed-article 
           title="{{$article->title}}"
           author="{{ $article->author }}"
           lead="{{$article->lead}}"
           content="{{ $article->content }}"
           publishDate="{{$article->publish_date}}">
</x-delayed-article>
