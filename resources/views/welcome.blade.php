<x-template.master>

    <x-slot:style>
    @if ($announce->broadcast)
        .announce {
            background: linear-gradient(180deg, rgba(255,248,226,1) 0%, rgba(252,245,222,1) 60%, rgba(244,235,206,1) 100%);
            height: 120px;
            border: 1px solid #c1c4c1;
            border-radius: 7px;
            padding: 6px 3px;
            box-shadow: 0 2px 1px #c2c4c220;
            transform: translateY(-0px);
            transition: 500ms ease;
        }
        .announce:hover {
            transform: translateY(4px)
        }
    @endif
    </x-slot:style>

    <h3>Hi there</h3>
    <hr/>
    <p>
        My name is Alice and i like to build interesting stuff with PHP or C, usually something small but sometimes i do big projects (like blek! ID).<br/>
        <hr/>
        You can contact me through <a href='mailto:me@blek.codes'>email</a> or write in my <a href='/guestbook'>guest book</a>.
    </p>

    {{--
    @if ($announce->broadcast)
    <div class='announce'>
        <span style='font-size:12pt;padding-left:6px;font-weight:600'>Announcement</span>
        <hr/>
        <p style='padding-left:7px'>{!! $announce->data->inline !!}</p>
    </div>
    @endif
    --}}
</x-template.master>