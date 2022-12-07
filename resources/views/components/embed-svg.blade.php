@if (file_exists(public_path() . $src) || filter_var($src, FILTER_VALIDATE_URL))
@php
Log::debug($src);
$data = '';
if (!filter_var($src, FILTER_VALIDATE_URL)) {
    $src = public_path() . $src;
}
$data = base64_encode(file_get_contents($src));

@endphp
<img src='data:image/svg+xml;base64,{!!$data!!}' {{isset($width) ? "width=$width " : ''}}{{isset($height) ? "height=$height " : ''}}{{isset($style) ? "style=$style " : ''}} ></img>
@endif