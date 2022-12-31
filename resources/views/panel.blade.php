<x-template.master>
    <x-slot:style>
        .post_entry td {
            padding: 6px 3px;
            padding-left:8px;
            border-bottom:1px solid #c2c4c280;
            border-left:1px solid #c2c4c2
        }
        .post_entry td * {
            margin:0;padding:0
        }
        .post_entry td form input {
            padding: 1px 3px;
        }
    </x-slot:style>

    <h2>Admin panel</h2>
    <form>
        <input type='submit' value='Create a new blog record' name='new'></input>
        <input type='submit' value='Migrate' name='migrate'></input>
    </form>

    {{-- Blog --}}
    <div style='max-width:100%;overflow-y:scroll;'>
    <table style='border-collapse:collapse;margin-top:6px;border-top:1px solid #c2c4c280'>
            @if (isset($data))
                @foreach ($data as $i => $d)
                    <tr class='post_entry' style='{!! $d->hidden ? "opacity:0.5;" : "" !!}'>
                        <td style='min-width:70px'>
                            <span style='font-family:monospace;margin-right:3px'>
                                [<a style='font-weight:500;text-decoration:underline' href='/blog#{{$d->id}}'>#{{$d->id}}</a>]
                            </span>
                        </td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->author}}</td>
                        <td>{{date("d/M/Y H:i.s", $d->time)}}</td>
                        <td style='border-left:1px solid #c2c4c2;'>
                            {{-- Controls --}}
                            <form style='display:inline'>
                                @csrf
                                <input type='submit' value='Delete' name='del'></input>
                                <input type='submit' value='Edit' name='edit'></input>
                                <a href='/blog/{{$d->id}}'><input type='button' value='View' name='view'></input></a>
                                <input type='submit' value='{{$d->hidden ? "Un-" : '' }}Hide' name='hide'></input>
                                <input type='hidden' value='{{$d->id}}' name='id'></input>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            @else
                <tr>
                    <td>No data</td>
                </tr>
            @endif
        </table>
    </div>

{{-- Guestbook --}}
<h3>Guestbook</h3>
<table style='border:1px solid #c2c4c2'>
    <tr class='post_entry'>
        <td>ID</td>
        <td>name</td>
        <td>email</td>
        <td>text</td>
        <td>hidemail</td>
        <td>ip</td>
        <td>hidden</td>
        <td>time</td>
        <td>actions</td>
    </tr>
    @foreach ($gb as $i => $v)
    <tr class='post_entry' @if($v->hidden) style='opacity:0.4' @endif>
        <td><a id='gb_{{$i}}'>{{$v->id}}</a></td>
        <td>{{$v->name}}</td>
        <td>{{$v->email}}</td>
        <td>{{$v->text}}</td>
        <td>{{$v->hidemail ? 'true' : 'false'}}</td>
        <td>{{$v->ip}}</td>
        <td>{{$v->hidden ? 'hidden' : 'not hidden'}}</td>
        <td>{{$v->time}}</td>
        <td>
            <form action='/panel/gb_action'>
                @csrf
                <input type='hidden' name='id' value='{{$v->id}}'></input>
                <input type='submit' value='Delete' name='del'></input>
                <input type='submit' value='{{$v->hidden ? 'Unhide' : 'Hide' }}'   name='hide'></input>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</x-template.master>