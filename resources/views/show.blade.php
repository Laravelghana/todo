<h1>{{$todoItem->title}}</h1>
<p>{{$todoItem->description}}</p>
<a href="/">Back to list</a>
<a href="{{route('todo.edit', $todoItem->id)}}">Edit</a>
<a  onclick="return confirm('Are you sure?')" href="{{route('destroy.todo', $todoItem->id)}}">Delete</a>