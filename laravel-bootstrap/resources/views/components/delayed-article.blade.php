<div>
<p><strong>Title: </strong>{{ $title }}</p>
<p><strong>Author: </strong>{{ $author }}</p>
<p><strong>Lead:</strong> {{$lead}}</p>
<p><strong>Content:</strong>{{ $content }}</p>
<p><strong>Publish Date: </strong> {{$publishDate}}</p>
<p><strong>Will be published in: </strong> {{ Carbon\Carbon::parse($publishDate)->diffForHumans()}}</p>
</div>