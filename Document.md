# Mudanças feitas
## 1° mudança-> Docker-Compose: Alteração nos comandos do HEADME e renomeação dos serviços
O docker-compose tem os comandos desatualizado e por isso não funciona se seguir o README do jeito que ta la.
Para funcionar a instalação das dependencia e ter o docker-compose funcionando perfeitamente, alterei o 
docker-compose colocando nomes nos containers para facilitar a execução e indentificação. Para cada serviço foi dado um nome.

## 2° Mudança-> Docker-compose: Adicionado NetWork no serviço db.
O Serviço db que roda o banco Postgres não estava respondendo devido o mesmo não ter comunicação com os demais containers.
Para resolver, foi adicionado o network ja criado, e o serviço db passou a aparecer para os demais containers. Apos isso instalei todos os serviços rodando composer install e npm install. 

## 3° Mudança-> Error de sintax: Log e Auth não declarados.
Os recursos de Autenticação de Log não estavam com seus "use" declarados. Foi adicionado e o codigo passou a funcionar perfeitamente.

## 4° Mudança-> Tirando do modo produçãono: Arquivo app/config 
A opção 'debug' => (bool) env('APP_DEBUG', true), estava false e coloquei true para aparecer os erros e tirar do modo produção.

## 5° Mudança-> Alteração nas migration Notas_Fiscais: Separação de responsabilidades
Tinha uma migration com muita responsabilidade, onde cadastrava tudo com uma migration e estava dando error de chave 
estrangeira. Dividi a Migration Notas_Fiscais em 4 Migration, onde cada uma tem sua responsabilidade e função especifica.
O error de chave estrangeira foi resolvido também. 

## 6° Mudança-> Persistência de dados: O Postgres agora salva os dados gerados.
O serviço db não estava salvando os dados quando eram gerados pelo Eloquent do laravel ao rodar as migrations. Fiz uma alteração criando um valume no serviço db , onde salva os dados em um directorio chamado pgdata na raiz do user. Foi criado mais um serviço, Adminer para poder checar os dados do banco.

## 7° Mudança-> Tratamento dos dados enviado: Arquivo CSV processado.
Criei um formulario no arquivo home.blade, onde o usuario pode selecionar o arquivo na sua maquina e enviar o arquivo para ser processado. O arquivo depois de processado é adicionado a uma variavel em forma de array de string.