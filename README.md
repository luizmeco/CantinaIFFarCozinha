# 🍳 Cantina IFFar - Cozinha (Painel de Preparo)

Este é o repositório do painel de controle da cozinha do sistema **Cantina IFFar**, desenvolvido utilizando o framework **CodeIgniter 4**. Através desta interface, a equipe da cozinha gerencia os pedidos pendentes, em preparo e prontos.

---

## 🚀 Como Executar o Projeto

Siga as instruções abaixo para configurar e rodar o projeto da Cozinha localmente em sua máquina.

### 📋 Pré-requisitos
Antes de começar, certifique-se de possuir instalado em seu ambiente:
* **PHP** (versão 8.1 ou superior recomendada)
* **Composer**
* A [API da Cantina IFFar](file:///c:/xampp/htdocs/CantinaIFFarAPI/README.md) configurada e em execução.

---

## 🛠️ Passo a Passo para Configuração

> [!NOTE]
> Todos os comandos abaixo devem ser executados no **Prompt de Comando (cmd)** ou terminal de sua preferência, dentro da pasta raiz deste projeto (`CantinaIFFarCozinha`).

### 1. Clonar e Acessar o Diretório
Se você ainda não estiver na pasta do projeto:
```cmd
cd CantinaIFFarCozinha
```

### 2. Configurar o Arquivo de Ambiente (.env)
Copie o arquivo de exemplo `.env.example` criando o seu arquivo `.env` definitivo:
```cmd
copy .env.example .env
```

> [!IMPORTANT]
> Abra o arquivo `.env` recém-criado e verifique se a URL base da API está devidamente apontada para a API local (ex: `http://localhost:8080`).

### 3. Instalar as Dependências do Composer
Baixe todas as dependências e bibliotecas necessárias para o projeto rodar:
```cmd
composer install
```

### 4. Iniciar o Servidor de Desenvolvimento
Como a API por padrão utiliza a porta `8080` e o cliente utiliza a porta `8081`, rode a cozinha em outra porta alternativa (como a `8082`):
```cmd
php spark serve --port 8082
```

O painel da cozinha estará acessível em: `http://localhost:8082`
