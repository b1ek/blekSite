<!DOCTYPE html>
<html>

<head>
<x-embed-style src='/static/main.css'></x-embed-style>
<x-embed-style>
    .center_no_russia {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: fit-content;
        height: fit-content;
        text-align: center
    }
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
                    <div class='center_no_russia'>
                        <h2>The site is blocked in Russia.</h2>
                        <p>Due to new laws regarding ban on LGBT propaganda
                            (<a href='https://edition.cnn.com/2022/11/30/europe/russia-upper-parliament-lgbt-propaganda-law-intl/index.html' target='_blank'>
                                learn more
                            </a>).<br/>
                            This is an openly hate and discriminatorly law.<br/>
                            Since i live in Russia, i may be fined up to 8000$ for just as much as having a trans flag on my website(which i do have).<br/>
                            <hr/>
                            If you are from Russia, you can use a VPN to access my site, like <a href='https://www.privateinternetaccess.com/' target='_blank'>PIA</a> or <a href='https://surfshark.com' target='_blank'>Surfshark</a>
                        </p>
                        <hr/>
                        <h2>Сайт заблокирован в России.</h2>
                        <p>
                            Сайт заблокирван в связи с новыми законами о пропаганде ЛГБТ (<a href='http://duma.gov.ru/news/55609/' target='_blank'>узнать больше</a>).<br/>
                            Этот закон открыто продвигает ненависть и дискриминацию.<br/>
                            То, что дети не могут определиться с полом, никому не вредит.<br/>
                            Наоборот, это вполне хорошо потому что те, у кого есть проблемы с полом, смогут их решить.<br/>
                            <br/>
                            Надеюсь, что мне удасться уехать отсюда пока не закроют границы.
                            <hr/>
                            Чтобы зайти на сайт, используйте чертов VPN<br/>
                            <a href='https://www.privateinternetaccess.com/' target='_blank'>PIA</a> и <a href='https://surfshark.com' target='_blank'>Surfshark</a> прекрасно принимают оплату из России, даже если не получается оплатить, купите аккаунт на <a href='https://zelenka.guru/forums/346/'>формуах</a>
                        </p>
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