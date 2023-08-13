<form method="POST" action="{{ route('article.editStore', $article->id) }}">
        @csrf
        <x-label-text name="title" label="Title:">{{$article->title}}</x-label-text>
        <br>
        <x-label-textarea name="lead" label="Lead:">{{$article->lead}}</x-label-textarea>
        <br>
        <x-label-textarea name="content" label="Content:">{{$article->content}}</x-label-textarea>
        <br>
        <input type="submit" value="Submit">
</form>