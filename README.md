#Sistema de Arranchamento do IME

###Iniciando ambiente de Dev
Instalando composer:
`$ composer i`

Rodando migrations com seeder (alimentador do banco), atualmente o seeder só está preenchendo algumas permissões e roles (ref: `database\seeders`):
`$ php artisan migrate --seed`

Instalando dependências e libs necessárias:
`$npm install`

Subindo aplicação:
`$ php artisan serve`

Em outro terminal, rode o seguinte comando:
`$ npm run dev`

