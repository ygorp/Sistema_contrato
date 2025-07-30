# Sistema Gerador de Contratos em PDF

![Logo do Projeto](https://ygornogueiradev.com.br/contratos/assets/images/logo.png)

Aplicação web desenvolvida em PHP para automatizar a criação e o gerenciamento de contratos personalizados, gerando documentos em PDF prontos para uso a partir de um formulário dinâmico.

## 🎯 Visão Geral do Projeto

Este sistema foi criado para resolver a necessidade de gerar contratos de prestação de serviços de forma ágil e padronizada. A aplicação permite que um usuário autenticado preencha os dados variáveis de um contrato (como informações do cliente, valores e prazos) e, com um clique, gere um documento PDF profissional, baseado em um template pré-definido.

O projeto foi construído de forma didática, com foco em boas práticas de programação PHP e na separação de responsabilidades, sendo uma excelente peça para portfólios de desenvolvedores web.

## ✨ Funcionalidades

-   🔐 **Autenticação de Usuários:** Sistema de Login e Logout seguro com senhas criptografadas.
-   📊 **Dashboard Central:** Painel para visualização e gerenciamento de todos os contratos gerados.
-   📄 **Geração de PDF:** Criação de documentos PDF a partir de um template HTML, utilizando a biblioteca Mpdf.
-   📝 **Formulário Dinâmico:** Interface para inserir todas as informações variáveis do contrato.
-   ✏️ **Edição de Contratos:** Altere informações de contratos já salvos no sistema.
-   🗑️ **Exclusão Segura:** Apague contratos do banco de dados com uma etapa de confirmação para evitar acidentes.
-   🗄️ **Persistência de Dados:** Uso de banco de dados MySQL para armazenar informações dos usuários e dos contratos.

## 💻 Tecnologias Utilizadas

-   **Backend:** PHP 8+
-   **Frontend:** HTML5, Tailwind CSS, JavaScript (para interações)
-   **Banco de Dados:** MySQL
-   **Gerenciador de Dependências:** Composer
-   **Biblioteca Principal:** [Mpdf/Mpdf](https://github.com/mpdf/mpdf) - para a geração dos arquivos PDF.

## 🚀 Como Executar o Projeto Localmente

Siga os passos abaixo para configurar e executar o projeto em seu ambiente de desenvolvimento.

### Pré-requisitos

-   Um ambiente de servidor local (XAMPP, WAMP, MAMP, etc.).
-   [PHP](https://www.php.net/) (versão 8.0 ou superior).
-   [MySQL](https://www.mysql.com/) ou MariaDB.
-   [Composer](https://getcomposer.org/) instalado globalmente.

### Guia de Instalação

1.  **Clone o repositório:**
    ```bash
    git clone https://github.com/ygorp/Sistema_contrato.git
    cd nome-da-pasta-do-projeto
    ```

2.  **Instale as dependências do PHP:**
    ```bash
    composer install
    ```
    Este comando irá baixar a biblioteca Mpdf e configurar o autoloader na pasta `vendor/`.

3.  **Configure o Banco de Dados:**
    a. Crie um novo banco de dados no seu phpMyAdmin (ex: `gerador_contratos`).
    b. Selecione o banco criado e vá para a aba "SQL".
    c. Copie e cole todo o conteúdo do arquivo `database.sql` (disponível neste repositório) e execute para criar as tabelas e inserir o usuário padrão.

4.  **Configure as credenciais de acesso ao banco:**
    a. Na pasta `includes/`, renomeie o arquivo `db.php.example` para `db.php`.
    b. Abra o arquivo `db.php` e preencha as variáveis com as suas credenciais locais:
    ```php
    $dbHost = 'localhost';
    $dbUser = 'root';      // Usuário padrão do XAMPP
    $dbPass = '';          // Senha padrão do XAMPP (vazia)
    $dbName = 'gerador_contratos'; // O nome do banco que você criou
    ```

5.  **Execute a Aplicação:**
    Inicie os módulos Apache e MySQL no seu XAMPP e acesse o projeto pelo navegador (ex: `http://localhost/gerador-contratos/`).

    **Credenciais de Acesso Padrão:**
    -   **Email:** `admin@email.com`
    -   **Senha:** `admin123`

## 📂 Estrutura de Arquivos

```
/
├── assets/                 # Imagens e futuramente arquivos CSS/JS compilados
├── includes/               # Scripts de conexão com BD e autenticação
│   ├── auth.php
│   └── db.php
├── templates/              # Template HTML do contrato em PDF
│   └── contrato_template.php
├── vendor/                 # Dependências do Composer (gerado automaticamente)
├── .gitignore              # Arquivos e pastas a serem ignorados pelo Git
├── baixar_contrato.php     # Script para download de um PDF existente
├── dashboard.php           # Painel principal após o login
├── database.sql            # Script para criação do banco de dados
├── editar_contrato.php     # Formulário de edição de um contrato
├── excluir_contrato.php    # Script para exclusão de um contrato
├── gerar_contrato.php      # Script principal que gera e salva o contrato
├── login.php               # Página de login
├── logout.php              # Script para encerrar a sessão
├── novo_contrato.php       # Formulário de criação de um novo contrato
├── salvar_edicao.php       # Script que salva as alterações de um contrato
└── README.md               # Este arquivo
```

## 🔮 Melhorias Futuras

O projeto possui uma base sólida que permite diversas expansões, como:

-   [ ] **Integração com API de Assinatura Digital** (Clicksign, ZapSign, etc.).
-   [ ] Implementação de sistema de **recuperação de senha**.
-   [ ] Criação de **níveis de permissão de usuário** (Admin vs. Usuário comum).
-   [ ] Adição de um **gerador de faturas** com base nos contratos.
-   [ ] Melhoria da interface com um **framework JavaScript** (Vue.js ou React).

## 📜 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
