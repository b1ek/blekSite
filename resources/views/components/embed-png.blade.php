@php
$data = base64_encode(file_get_contents(public_path() . $src));
unset($src);
@endphp
<img src='data:image/png;base64,{!!$data!!}' {{isset($width) ? "width=$width " : ''}}{{isset($height) ? "height=$height " : ''}}{{isset($style) ? "style=\"$style\" " : ''}} ></img>