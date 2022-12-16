<!DOCTYPE html>
<html>

<head>
{{--<x-embed-style src='/static/main.css'></x-embed-style>--}}
<x-embed-style>
body {
    background: #fff8ee;
    padding: 0;
    margin: 0;
    font-size: 10pt;

    font-family: 'Open Sans';
}

.page_table {
    width: 100%
}

.left_menu_cont {
    border-right: 1px solid #c2c4c2;
    min-width: 160px
}
.main_page_cont {
    width: 100%;
}

.top_ad {
    margin: 0;
    padding: 8px 6px;
    border-bottom: 1px solid black;
    background: white;
    transform: translate(-2px, -2px);
}

.top_ad h1 {
    font-size: 12pt;
    margin: 0;
    padding: 0;
}

.left_menu {
    padding: 8px 14px;
    padding-top: 0;
}
.site_title {
    font-size: 16pt;
    padding: 16px 16px;
    padding-bottom: 3px;
    margin: 0;
}
.left_menu ul {
    list-style: none;
    padding-left: 6px;
    font-size: 10pt;
    margin: 12px 0;
}

.main_page {
    padding: 6px;
}
.main_page h3 {
    margin: 0;
    padding-top: 6px;
}

table.page_table {
    min-height: 100vh;
    padding-bottom: 45px;
}
table.page_table tbody {
    vertical-align: top;
}

hr {
    border: 0px solid black;
    border-bottom: 1px solid #b0b2b0;
    height: 0;
    max-height: 0;
}

hr.list_separator {
    margin: 10px 0;
}
table, tbody, tr, td {
    margin: 0;
    padding: 0;
}
tbody {
    transform: translate(-2px, -2px);
}

a {
    font-weight: bold;
    font-family: 'Open Sans';
    color: #2353ad;
    text-decoration: none;
    font-size: 95%;
    text-shadow: 0 1px 1px #30323005;
    transition: 300ms ease;
    transform: translateY(0px);
    display: inline-block;
    position: relative;
    bottom: 0px;
    cursor: pointer;
}
a:visited {
    color: #236aad;
}
a:hover {
    position: relative;
    bottom: 2px;
}
.bottom_text {
    position: fixed;
    bottom: 0;
    left: 0;
    background: #fff8ee;
    margin: 0;
    padding: 10px 12px;
    width: 100%
}
.blog_post {
    border: 1px solid #c2c4c2;
    padding: 6px 12px;
    border-radius: 8px 6px;
    box-shadow: 0 2px 1px #33333315;
    max-width: 640px;
    margin-bottom: 12px
}
.blog_posts {
    max-width: fit-content;
}
.announcement {
    background: antiquewhite;
    border-bottom: 1px solid #333333;
    padding: 0 8px
}
.announcement h1 {
    font-size: 13pt;
    margin: 0;
    padding: 12px 8px;
}
    .center_no_russia {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: fit-content;
        height: fit-content;
		text-align: center;    }
    .russia_flag {
        background: red;
        height: 20px;
        background: linear-gradient(0deg, #F5A9B8 33.33%, #5BCEFA 33.33%, #5BCEFA 66.67%, white 66.67%, white 100%);
        border-top: 1px solid #c2c4c2;
	}
</x-embed-style>
<link rel="shortcut icon" href="data:image/png;base64," type="image/x-icon"> 
<title>blek! Site</title>
</head>

<body>
    <table class='page_table'><tbody>
        <tr>
            <td class='left_menu_cont'>

                <h1 class='site_title'><a href='/' style='font-weight:400'>blek! Site</a></h1>
                <div class='russia_flag'></div>
            </td>
            <td class='main_page_cont'>
				<div class='main_page'>
					@php
					$count = (rand() % 4) + 8;
					@endphp
					@for ($i = 0; $i != $count; $i++)
					<h4 style='position:absolute;top:{{rand() % 100}}%;left:{{rand() % 75 . '%'}};font-size:{{((rand() % 5) / 2 + 2) . 'em'}}'>pineapple</h4>
					<h2 style='position:absolute;top:{{rand() % 100}}%;left:{{rand() % 75 . '%'}};font-size:{{((rand() % 5) / 2 + 2) . 'em'}}'>banana</h2>
					<h1 style='position:absolute;top:{{rand() % 100}}%;left:{{rand() % 75 . '%'}};font-size:{{((rand() % 1) / 2 + 2) . 'em'}}'>ananas</h1>
					<h3 style='position:absolute;top:{{rand() % 100}}%;left:{{rand() % 75 . '%'}};font-size:{{((rand() % 5) / 2 + 2) . "em"}}'>banana{{str_repeat('na', (rand() % 2) + 4)}}</h3>
					@endfor
					<div class='center_no_russia'>
						<h1>The website is having technical issues.</h1>
						<p>Have a nice day.</p>
					</div>
                </div>
            </td>
        </tr>
    </tbody></table>
    <p class='bottom_text'>
        Page generated in ~{{(floor((microtime(true) - LARAVEL_START) * 100) / 100)}} seconds
    </p>
</body>

</html>
