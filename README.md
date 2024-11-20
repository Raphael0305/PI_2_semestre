## Projeto integrador segundo semestre de Desenvolvimento de Software Multiplataforma

O objetivo do projeto é desenvolver um software em conjunto com outros alunos da sala.
O projeto engloba três matérias do nosso curso, sendo elas:

- Engenharia de Software II (chave)
- Banco de dados relacionais
- Desenvolvimento web II

## Como Executar este Projeto

### Pré-requisitos

Certifique-se de ter o Docker instalado no seu sistema. Caso ainda não tenha, consulte a [documentação oficial do Docker](https://docs.docker.com/get-started/get-docker/) para obter instruções de instalação.

### Executando com Docker

1. Navegue até a pasta raiz do projeto pelo terminal:
   <pre class="!overflow-visible"><div class="contain-inline-size rounded-md border-[0.5px] border-token-border-medium relative bg-token-sidebar-surface-primary dark:bg-gray-950"><div class="flex items-center text-token-text-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md h-9 bg-token-sidebar-surface-primary dark:bg-token-main-surface-secondary select-none">bash</div><div class="sticky top-9 md:top-[5.75rem]"><div class="absolute bottom-0 right-2 flex h-9 items-center"><div class="flex items-center rounded bg-token-sidebar-surface-primary px-2 font-sans text-xs text-token-text-secondary dark:bg-token-main-surface-secondary"><span class="" data-state="closed"></span></div></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-bash">cd /caminho/para/o/projeto
   </code></div></div></pre>
2. Execute o comando abaixo para iniciar os contêineres:
   <pre class="!overflow-visible"><div class="contain-inline-size rounded-md border-[0.5px] border-token-border-medium relative bg-token-sidebar-surface-primary dark:bg-gray-950"><div class="flex items-center text-token-text-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md h-9 bg-token-sidebar-surface-primary dark:bg-token-main-surface-secondary select-none">bash</div><div class="sticky top-9 md:top-[5.75rem]"><div class="absolute bottom-0 right-2 flex h-9 items-center"><div class="flex items-center rounded bg-token-sidebar-surface-primary px-2 font-sans text-xs text-token-text-secondary dark:bg-token-main-surface-secondary"><span class="" data-state="closed"></span></div></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-bash">docker compose up -d
   </code></div></div></pre>
3. Após a inicialização, abra o navegador e acesse o projeto em:
   [http://localhost:8080](http://localhost:8080)

### Executando sem Docker

1. Abra o arquivo `classe-conexao.php` na raiz do projeto.
2. Localize a linha **7** e atualize as configurações de conexão com o banco de dados conforme necessário:
   <pre class="!overflow-visible"><div class="contain-inline-size rounded-md border-[0.5px] border-token-border-medium relative bg-token-sidebar-surface-primary dark:bg-gray-950"><div class="flex items-center text-token-text-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md h-9 bg-token-sidebar-surface-primary dark:bg-token-main-surface-secondary select-none">php</div><div class="sticky top-9 md:top-[5.75rem]"><div class="absolute bottom-0 right-2 flex h-9 items-center"><div class="flex items-center rounded bg-token-sidebar-surface-primary px-2 font-sans text-xs text-token-text-secondary dark:bg-token-main-surface-secondary"><span class="" data-state="closed"></span></div></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-php">$this->conn = new PDO('mysql:host=SEU_HOST;dbname=SEU_BANCO_DE_DADOS', 'USUARIO', 'SENHA');
   </code></div></div></pre>
3. Certifique-se de ter um ambiente local configurado (PHP, MySQL) e um servidor web (como Apache ou Nginx) funcionando.
4. Acesse o projeto pelo navegador no endereço correspondente ao seu servidor local.

### Tecnologias utilizadas

- HTML
- CSS
- JavaScript
- PHP
- Banco de dados relacional (MySQL)

### Membros do projeto

- Vitor Eduardo B. Marciano
- ~~Adinam Conte Cardozo~~
- Rayanne Gabriela da Silva Sebastiao Nunes
- Raphael Reis Rodrigues da Silva
- Izabely do Nascimento Rodrigues de Campos
