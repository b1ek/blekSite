<x-template.master>

    <x-slot:style>
        .proj_data {
            background: antiquewhite;
            border: 1px solid #c2c4c2;
            border-radius: 3px;
            padding: 4px 6px;
            width: 400px;
            margin-top: 8px
        }
        .proj_data_tbody tr td {
            padding-right: 4px;
        }
        .proj_url:hover {
            padding-left: 0;
        }
        .proj_url {
            text-decoration: underline
        }
        .proj_url img {
            width: 14px;
            height: 14px;
            transform: translateY(2px)
        }
        .proj_data a {
            font-weight: 500;
        }
        .back_button {
            margin: 0;
            padding: 4px 0;
        }
        .back_button a {
            font-weight: 500;
            text-decoration: underline
        }
    </x-slot:style>

    <p class='back_button'><a href='/projects'>← Go back</a></p>
    <h3>Project {{$name}}</h3>
    <div class='proj_data'>
        <table><tbody class='proj_data_tbody'>
            <tr>
                <td>Project homepage:</td>
                <td><a href='{{$link}}' class='proj_url' target='_blank'><x-embed-png src='/static/link.png'></x-embed-png> {{$link}}</a></td>
            </tr>
            <tr>
                <td>Source code:</td>
                <td>
                    <a href='{{$source}}' class='proj_url' target='_blank'>
                        @if (str_starts_with($source, "https://github.com"))
                            <x-embed-png src='/static/github.png'></x-embed-png>
                        @else
                            <x-embed-png src='/static/link.png'></x-embed-png>
                        @endif
                        {{$source}}</a>
                </td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><a href='mailto:{{$authorMail}}'>{{$author}}</a> </td>
            </tr>
        </tbody></table>
    </div>
    {{$slot}}
</x-template.master>