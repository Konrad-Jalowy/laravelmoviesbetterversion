<form action="{{ route('article.storeComment', $article->id) }}" method="POST">
            @csrf
            <label for="content" class="form-label">Your Comment:</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
<input type="submit" value="Submit" class="btn btn-primary">
</form>