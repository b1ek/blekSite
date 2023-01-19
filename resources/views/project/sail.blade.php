<x-project name='blek! Sail' link='https://sail.blek.codes' author='blek' author_mail='me@blek.codes' source='https://github.com/b1ek/sail'>
    <p>
        <x-embed-png src='/static/sail_logo.png' style='background:#334448;padding:24px;border-radius:12px;border:1px solid #c2c4c2' width=500/>
        
        <br/>   

        <a href='https://hub.docker.com/r/blekii/sail'><img src='https://img.shields.io/docker/pulls/blekii/sail?style=plastic'></img></a>
        <a href='https://hub.docker.com/r/blekii/sail'><img src='https://img.shields.io/docker/v/blekii/sail?style=plastic'></img></a>
        <a><img src='https://img.shields.io/badge/built%20with-%E2%9D%A4-ff005d?style=plastic'></img></a>
        <a href='https://github.com/b1ek/sail'><img src='https://img.shields.io/github/last-commit/b1ek/sail?style=plastic'></img></a>
    </p>
    <p>
        blek! Sail is a production-ready alternative to Laravel Sail.<br/>
        It runs on nginx + php fpm on alpine linux, and the whole image takes ~35 MB of disk space.
    </p>
    <p>
        <h3>Starting it up</h3>
        <h3>Via docker compose (recommended)</h3>
        <pre>
services:
    sail:
        image: blekii/sail:latest
        build:
            context: directory/with/sail
            dockerfile: Dockerfile
#        volumes:
#            - 'your/project/root:/var/www/html'
#            - 'custom/nginx/config:/etc/nginx'
        ports:
            - '80:80'
        </pre>
        <h3>Via docker run</h3>
        <pre>$ docker run -v '/path/to/laravel/project:/var/www/html' --name sail -p 80:80 -d blekii/sail:latest</pre>
    </p>
</x-project>