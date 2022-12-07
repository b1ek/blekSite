@if (file_exists(public_path() . $src) || filter_var($src, FILTER_VALIDATE_URL))
@php
$data = '';
if (filter_var($src, FILTER_VALIDATE_URL)) {
    $data = base64_encode(file_get_contents($src));
} else {
    $data = base64_encode(file_get_contents(public_path() . $src));
}
@endphp
<img src='data:image/png;base64,{!!$data!!}' {{isset($width) ? "width=$width " : ''}}{{isset($height) ? "height=$height " : ''}}{{isset($style) ? "style=$style " : ''}} ></img>
@endif