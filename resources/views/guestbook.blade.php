<x-template.master>
    <h2>Guestbook</h2>
    <hr/>
    <p>
        Hi. This is my guestbook. The records are shown below. You can write your own message here
    </p>
    <form action='/guestbook'>
        @csrf
        <table><tbody>
            <tr>
                <td>
                    <table><tbody>
                        <tr>
                            <td>Your name:</td>
                            <td><input type='text' name='name'></input></td>
                        </tr>
                        <tr>
                            <td>Your email (optional):</td>
                            <td><input type='text' name='email'></input></td>
                        </tr>
                        <tr>
                            <td>Hide email:</td>
                            <td><input type='checkbox' name='hide_email'></input></td>
                        </tr>
                    </tbody></table>
                    
                </td>
                <td style='vertical-align:top'>
                    <p style='margin:0;padding:3px 1px;color:darkred;font-weight:600'>
                        Warning: your IP ({{request()->ip()}}) will be displayed with your record.<br/>
                        To remove your record, <a href='/contact'>contact me</a>
                    </p>
                </td>
            </tr>
        </tbody></table>
        <p>
            Your text (1000 chars max):<br/>
            <textarea name='text' style='width:320px;height:81px'></textarea>
        </p>
        <p>
            <input type='submit' value='Send'></input>
        </p>
    </form>

    @if (isset($data))
        @foreach ($data as $i => $d)
            <p id='r{{$d->id}}'>
                [<a href='/guestbook#r{{$d->id}}'>#{{$d->id}}</a>]
                {{$d->name}} at
                @if ($d->hidemail || $d->email == '')
                &lt;no@email.com&gt;
                @else
                <a href='mailto:{{$d->email}}'>&lt;{{$d->email}}&gt;</a>
                @endif
                @if ($d->ip == request()->ip())
                <a href='/guestbook/del_{{$d->id}}' title='You can remove your own records' style='color:darkred;font-weight:500;font-size:7pt'>(delete)</a>
                @endif
                says:
                <br/>
                {{$d->text}}<br/>
                <span style='color:#333333;font-size:8pt;font-style:oblique'>
                This was sent from ip {{$d->ip}} at {{date('d/m/Y H:i s', $d->time)}} (<span style='font-size:7pt;user-select:all'>{{$d->time}}</span>)
                </span>
            </p>
        @endforeach
    @else
    <p>There was an error preparing the data.</p>
    @endif

    @if ($errors->any())
    <p style='font-weight:600;color:darkred'>
        @foreach($errors->all() as $i => $error)
            {{$error}}<br/>
        @endforeach
    </p>
    @endif

</x-template.master>