# User-Color

User-Colors é um projeto simples para criar usuários e vincular/cadastrar cores para esses usuários. Este projeto foi desenvolvido como uma prova de conceito sem o uso de frameworks, apenas PHP puro.

## Funcionalidades

- Criar um novo usuário
- Vincular uma cor a um usuário
- Listar usuários e suas cores associadas

## Pré-requisitos

Para executar este projeto, você precisará ter instalado:
- PHP (versão 8.x recomendada)
- Um servidor web (como Apache ou Nginx)
- Um banco de dados MySQL ou MariaDB (default: sqlite)

Certifique-se de ter configurado corretamente o seu ambiente de desenvolvimento antes de prosseguir.

## Configuração

1. Clone este repositório para o seu ambiente de desenvolvimento local:
   `git clone https://github.com/seu-usuario/user-color.git`
2. Importe o arquivo `database.sql` para o seu banco de dados MySQL ou MariaDB.

3. Edite o arquivo `config.php` e insira as informações de conexão com o seu banco de dados.

## Uso

Após configurar o ambiente, você pode acessar o projeto através do seu navegador web. Certifique-se de que o servidor web está em execução e apontando para a pasta raiz do projeto.

1. Para criar um novo usuário, acesse `/users/create` e preencha o formulário com as informações do usuário.
2.Para criar uma cor, acesse `/colors/create` e preencha o formulário com as informações da cor.

3. Para vincular uma cor a um usuário existente, acesse `/users/update` e selecione o usuário na lista suspensa e escolha uma cor.

4. Para visualizar a lista de usuários e suas cores associadas, acesse `/users`.

## Contribuição

Contribuições são bem-vindas! Se você quiser melhorar este projeto, sinta-se à vontade para criar um fork do repositório e enviar um pull request com suas melhorias.

## Autor

Este projeto foi desenvolvido por [joao bittencourt](https://github.com/Joao-Bittencourt).

## Licença

Este projeto está licenciado sob a Licença [MIT](https://opensource.org/licenses/MIT).

