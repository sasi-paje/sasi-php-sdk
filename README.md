## Modelos SASI
Esses modelos do Eloquent gerados visam auxiliar na integração com o SASI localmente usando PHP/Laravel. 
Esses modelos, juntamente com script `init.sh` foram testados e executados na versão 8.0 do Laravel, mas devem
funcionar em versões anteriores devido a forma que foram gerados utilizando o 
[eloquent-model-generator](https://github.com/krlove/eloquent-model-generator), o que deve ser diferente é apenas
a forma de configuração de conexão com o banco.

## Instalação

### Automática
Você pode executar o script `init.sh` para realizar a instalação caso esteja em ambientes UNIX. Ele irá criar um uma pasta `app/Models/Sasi`, preencherá o arquivo `.env` com as variáveis de ambiente base para o uso, e exibirá qualquer informação importante pra completar a instalação;

```bash
    ./init.sh -d diretorio/do/projeto/laravel
```

Obs.: Todos os modelos estão no mesmo namespace, `App\Models\Sasi`;

### Manual
Caso queira fazer a configuração manualmente:

- Os modelos estão dentro da pasta `models`, só movê-los pra dentro da pasta dos seus modelos ou onde achar melhor;
- É necessário configurar uma nova conexão `sasi_db` em `config/database.php` para os modelos funcionarem, já que o SASI provavelmente estará em um banco externo:
```php
'sasi_db' => [
    'driver' => 'mysql',
    'url' => env('DATABASE_URL'),
    'host' => env('SASI_DB_HOST', '127.0.0.1'),
    'port' => env('SASI_DB_PORT', '3306'),
    'database' => env('SASI_DB_DATABASE', 'forge'),
    'username' => env('SASI_DB_USERNAME', 'forge'),
    'password' => env('SASI_DB_PASSWORD', ''),
    'unix_socket' => env('SASI_DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
    ]) : [],
],
```
- As seguintes variáveis de ambiente são necessárias para configurar o banco:
```
SASI_DB_CONNECTION=mysql
SASI_DB_HOST=127.0.0.1
SASI_DB_PORT=3306
SASI_DB_DATABASE=tenant_tst
SASI_DB_USERNAME=root
SASI_DB_PASSWORD=secret
```