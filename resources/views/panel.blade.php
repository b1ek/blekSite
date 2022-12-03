<x-template.master>
    <h2>Admin panel</h2>
    <form>
        <input type='submit' value='Create a new blog record' name='new'></input>
        <input type='submit' value='Migrate' name='migrate'></input>
    </form>
    <ul>
        @if (isset($data))
        @foreach ($data as $i => $d)
            <li {!! $d->hidden ? 'style="opacity:0.5"' : '' !!}>
                {{$d->title}} | {{$d->author}} | {{date("d/M/Y H:i.s", $d->time)}} | 
                <form style='display:inline'>
                    @csrf
                    <input type='submit' value='Delete' name='del'></input>
                    <input type='submit' value='Edit' name='edit'></input>
                    <input type='submit' value='View' name='view'></input>
                    <input type='submit' value='{{$d->hidden ? "Un-" : '' }}Hide' name='hide'></input>
                    <input type='hidden' value='{{$d->id}}' name='id'></input>
                </form>
            </li>
        @endforeach
        @else
        <li>No data</li>
        @endif
    </ul>
</x-template.master>