# Router 

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

Pequeno, simples e descomplicado. O router é um componentes de rotas PHP com abstração para MVC, trabalha em sua própria camada de forma isolada e pode ser integrado sem segredos a sua aplicação.

## Installation

Router is available via Composer:

```bash
"maiconfss/router": "^1.0"
```

or run

```bash
composer require maiconfss/router
```

## Documentation

Para mais detalhes sobre como usar o router, veja a pasta de exemplo com detalhes no diretório do componente. Para usar o router é preciso redirecionar sua navegação para o arquivo raiz de rotas (index.php) onde todo o tráfego deve ser tratado. O exemplo abaixo mostra como:

Veja os exemplos!

O router é preciso redirecionar sua navegação para o arquivo raiz de rotas (index.php) onde todo o tráfego deve ser tratado. O exemplo abaixo mostra como:

RewriteEngine On
Options All -Indexes

# ROUTER WWW Redirect.
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER HTTPS Redirect
RewriteCond %{HTTP:X-Forwarded-Proto} !https
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER URL Rewrite
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?route=/$1

## Credits

- [Maicon Fernando](https://github.com/maiconfss) (Developer)

## License

The MIT License (MIT). Please see [License File](https://github.com/maiconfss/routes) for more information.