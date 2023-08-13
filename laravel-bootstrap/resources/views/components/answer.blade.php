<div class="card">
    <div class="card-body">
      <h5 class="card-title"><strong>{{$author}}</strong> said:</h5>
      <p class="card-text">{{$content}}</p>
      @if($isYour)
        <a href="{{route('article.editComment', ['id' => $id1, 'id2' => $id2])}}"><button class="btn btn-primary">Edit</button></a>
      @endif
    </div>
  </div>
       


