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
                <span style='font-family:monospace;margin-right:3px'>
                [<a style='font-weight:500;text-decoration:underline' href='/blog#{{$d->id}}'>#{{$d->id}}</a>]</span>|                
                {{$d->title}} | {{$d->author}} | {{date("d/M/Y H:i.s", $d->time)}} | 
                <form style='display:inline'>
                    @csrf
                    <input type='submit' value='Delete' name='del'></input>
                    <input type='submit' value='Edit' name='edit'></input>
                    <a href='/blog#{{$d->id}}'><input type='button' value='View' name='view'></input></a>
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