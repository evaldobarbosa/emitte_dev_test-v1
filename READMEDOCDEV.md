

## Alterações que eu faria

- Eu teria divido e modularizado em três aréas que seriam: Cadastro de usuário, cadastro da empresa e processamento das notas.
- Ao cadastrar o usuário e empresa poderia vincular um ao outro, o que ficaria simples a implementação da regra de acesso e upload da nota.
- Tornado mais simples o uso para o usuário, e de maior compreensão para qualquer desenvolvedor ao ver a minha aplicação.

### Comandos para rodar

Instale um servidor de banco de dados como postgres, mysql ou sqlite. Configure o seu arquivo .env e depois rode os comandos.

```
composer install
php artisan key:generate
composer renew
npm install
npm run dev
```
