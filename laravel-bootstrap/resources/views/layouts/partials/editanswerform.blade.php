<div class="container">
<form action="{{ route('answer.storeEdit', ['id' => $article->id, 'id2' => $answer->id]) }}" method="POST">
            @csrf
                <x-label-textarea name="content" label="Your Comment:">{{$answer->content}}</x-label-textarea>
                <input type="submit" value="Submit" class="btn btn-primary">
</form>
</div>