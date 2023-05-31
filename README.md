Obrigatório docker e docker compose instalado na maquina local de teste.

OBS : ARQUIVO .ENV SERÁ VERSIONADO PARA FACILITAR AS CONFIGURAÇÕES PARA QUEM FOR TESTAR

No arquivo .env versionado, já deve estar declaradas as variaveis que serão usadas para criar o banco de dados <br>

PORTAS DE CONEXÃO ( 80, 443 e 3306) DEVEM ESTAR DISPONIVEIS NA HORA DE INICIAR OS CONTAINERS, PARA QUE NÃO ACONTECA CONFLITO DE PORTAS <br>

---

1° - Clonar o projeto ( skedway ) na maquina que será realizado o teste. <br>

---

2° - Adicionar um host local para o projeto na maquina local editando:<br>
OBS: ( ESTOU USANDO O HOST FAKE walter.skedway.com.br, porém funciona acessando localhost )<br>
2.1 Para Linux - Editar o aquivo ( /etc/hosts ) e adicinonar [ 127.0.0.1 walter.skedway.com.br ] no aquivo de hosts<br>
2.2 Para Windows - Editar o aquivo ( C:\Windows\System32\drivers\etc\hosts ) e adicinonar [ 127.0.0.1 walter.skedway.com.br ] no aquivo de hosts<br>

---

3° - Após clonar o projeto, acesso a pasta raiz via terminal, e execute o comando : docker-compose up -d .<br>

3.1 - Aguarde até que o container do composer desligue, pois na primeira vez que é executado, ele irá instalar as dependências do projeto, e isso pode levar alguns segundos.<br>

---

4° Acessando o container do php, para executar-mos as configurações do projeto:<br>

4.1 - No terminal, ainda na raiz do projeto, execute o comando: docker container ls, para listar todos os containers ativos.<br>

4.2 - Após listar os containers, copie a chave de identificação do container com o nome ( skedway-php ).<br>

4.3 - Acesse o container usando o id copiado com o segunte comando: docker exec -it 1d1c1f8e2dba /bin/sh<br>

4.4 - Em caso de sucesso até a etapa 4.3, vc deve estar acessando o terminal linux do container em /var/www/html<br>

4.5 - Acesse o diretorio em que o projeto está mapeado atualmente dentro do container com o comando: cd /app/skedway/<br>

--

5° - Após as etapas anteriores, você deve estar no terminal linux, dentro da pasta raiz do projeto, então vamos configurar o projeto:<br>

5.1 - Para realizar as migrações de banco de dados do projeto e criar as tabelas, execute o comando: php artisan migrate.<br>

--

6° - Agora para testar o projeto, basta acessar localhost ou https://walter.skedway.com.br/<br>

--

7° - Como solicitado, o sistema contém 3 telas para melhor apresentação:<br>

7.1° - ( 1° Tela para cadastro e edição de eventos ) <br>

7.2° - ( 2° Tela para vizualização de eventos no formato calendário ) <br>

7.3° - ( 3° Tela para vizualização de eventos no formato de tabela paginada. ) <br> <br>

Em caso de dúvidas estou há diposição, e mais uma vez, grato pela oportunidade.
