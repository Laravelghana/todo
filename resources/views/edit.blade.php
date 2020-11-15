@if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    </ul>
    @endforeach
@endif

<form method="POST" action="{{route('todo.update', $todoItem->id)}}">
    @method('patch')
    @csrf
    <input type="text" name="title" placeholder="enter todo title" value="{{$todoItem->title}}"><br>
    <textarea name="description">{{$todoItem->description}}</textarea><br>
    <button type="submit">Update todo</button>
</form>
<a href="{{route('todo.index')}}">Back</a>