<x-template.master>
    <h2>Blog</h2>
    <hr/>

    @if (!isset($data))
    <p>No entries are available (server error)</p>
    @else
    @if ($data == false || count($data) == 0)
    
        <p>No entries are available (maybe temporary database error idk)</p>
    
    @else

        <table class='blog_posts'><tbody>
            @foreach ($data as $i => $d)
            <tr>
                <td class='blog_post'>
                    <p style='margin:0;padding:0;padding-top:10px' id='{{$d->id}}'>
                        <span style='font-size:11pt;font-weight:600'>
                        {{$d->title}}
                        </span>
                        by {{$d->author}} <span style='padding-left:5px'></span>
                        {{date('d/M/Y H:i.s', $d->time)}} (<span style='font-size:6pt;user-select:all'>{{$d->time}}</span>)
                        (<a href='#{{$d->id}}' style='font-size:7pt'>permalink</a>)
                    </p>
                    <p style='margin:0;padding:2px 0;padding-bottom:6px;max-height:256px;overflow-y:scroll'>{!!$d->body!!}</p>
                </td>
            </tr>
            {{-- But it works!™ --}}
            <tr><td><div style='min-height:12px'></div></td></tr>
            @endforeach
        </tbody></table>

        @endif
    @endif
</x-template.master>