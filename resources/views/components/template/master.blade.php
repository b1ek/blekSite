@php
$noad = request()->session()->get('noad', false);
@endphp

<!DOCTYPE html>
<html>

<head>
<x-embed-style>{{file_get_contents(public_path() . '/static/main.css') . (isset($style) ? "\n$style" : "")}}</x-embed-style>
<title>blek! Site</title>
</head>

@php
$menu_items = array(
    'Main page' => '/',
    'About me' => '/about',
    'Projects' => '/projects',
    'Blog' => '/blog',
    '---',
    'Websites' => '/webs',
    '---',
    'Guestbook' => '/guestbook'
);
@endphp

<body>
    <table class='page_table'><tbody>
        <tr>
            <td class='left_menu_cont'>

                <h1 class='site_title'><a href='/' style='font-weight:400'>blek! Site</a></h1>
                <div class='list_flag_bottom'></div>

                <div class='left_menu'>
                    <ul>
                        @foreach ($menu_items as $text => $path)
                        
                        @if ($path == '---')
                            <hr class='list_separator'/>
                        @else
                            @if (request()->getRequestUri() == $path)
                            <li> > {!! $text !!}</li>
                            @else
                            <li><a href='{!!$path!!}'>{!!$text!!}</a></li>
                            @endif
                        @endif

                        @endforeach
                    </ul>
                </div>
            </td>
            <td class='main_page_cont'>
                @if (!$noad)
                <div class='top_ad'>
                    <table style='width:100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <h1>heeeey!!! your ad could be here!!!!!</h1>
                                </td>
                                <td align='right'>
                                    <form>
                                        <input type='submit' value='X' name='close_ad'></input>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                <div class='main_page'>
                    {!! $slot !!}
                </div>
            </td>
        </tr>
    </tbody></table>
    <p class='bottom_text'>
        Page generated in ~{{floor((microtime(true) - LARAVEL_START) * 100) / 100}} seconds
    </p>
</body>

</html>