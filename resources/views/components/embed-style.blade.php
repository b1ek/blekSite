@php
if (!isset($src)) {
    $text = $slot;
} else {
    $text = file_get_contents(public_path() . "$src");
}
$text = (new MatthiasMullie\Minify\CSS($text))->minify();
@endphp
<style>{!!$text!!}</style>