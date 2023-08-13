<div class="container">
<form method="POST" action="{{ route('delayed.store') }}">
        @csrf
        <x-label-text name="title" label="Title:">{{old('title')}}</x-label-text>
        @error('title')
        <x-error-msg>{{$message}}</x-error-msg>    
        @enderror
        <br>
        <x-label-textarea name="lead" label="Lead:">{{old('lead')}}</x-label-textarea>
        @error('lead')
        <x-error-msg>{{$message}}</x-error-msg> 
        @enderror
        <br>
        <x-label-textarea name="content" label="Content:">{{old('content')}}</x-label-textarea>
        @error('content')
        <x-error-msg>{{$message}}</x-error-msg> 
        @enderror
        <br>
        <x-label-date name="publish_date" label="Publish Date:"></x-label-date>
        @error('publish_date')
        <x-error-msg>{{$message}}</x-error-msg> 
        @enderror
        <br>
        <input type="submit" value="Submit" class="btn btn-primary">
</form>
</div>