@php
$data = (array) $data;
@endphp

<x-template.master>

    @if (!isset($data))
        <p>Can't get info about this post. It probably doesn't exist or there is some database error.</p>
        @else
        @if ($data == false)
            <p>Can't get info about this post. It probably doesn't exist or there is some database error.</p>
        @else

        <h2 style='margin-bottom:0'>Blog post by {!!$data['author']!!}</h2>
        <p style='color:#424442;font-size:8pt;font-style:oblique'>
            Created on {!! date('d/M/Y H:i.s', $data['time']) !!}
        </p>
        <hr/>
        <h3 style='margin:10px 0'>{{$data['title']}}</h3>
        <div style='max-width:640px'>
            {!! $data['body'] !!}
        </div>


        @endif
    @endif
</x-template.master>