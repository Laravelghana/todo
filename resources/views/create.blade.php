@if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    </ul>
    @endforeach
@endif

<form method="POST" action="{{route('todo.store')}}">
    @csrf
    <input type="text" name="title" placeholder="enter todo title"><br>
    <textarea name="description"></textarea><br>
    <button type="submit">Add todo</button>
</form>
<a href="{{route('todo.index')}}">Back</a>