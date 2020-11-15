<ul>
    @foreach($todoList as $todoItem)
    <li><a href="{{route('todo.show', $todoItem->id)}}">{{$todoItem->title}}</a></li>
    @endforeach
</ul>
Pagination
{{ $todoList->links() }}
<a href="{{route('todo.create')}}">Add todo</a>