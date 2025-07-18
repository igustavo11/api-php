# 🛡️ Guardião do Estoque

## 💡 Desafio Proposto

### Desafio Integrador: Sistema de Controle de Estoque com Relatório de Reposição

Uma loja de materiais elétricos precisa de um sistema simples em PHP que liste os produtos cadastrados, seus respectivos estoques e identifique automaticamente quais produtos precisam de reposição (quando o estoque estiver abaixo de 10 unidades).

O gestor da loja também deseja visualizar:

- A lista total de produtos e seus estoques.
- A média de estoque da loja.
- Quais produtos estão abaixo do estoque mínimo.
- A porcentagem de produtos que precisam de reposição.

**Requisitos funcionais:**

- Exibir todos os produtos e seus estoques usando `foreach` ou `for`.
- Calcular e exibir a **média de estoque** dos produtos.
- Listar os produtos com estoque **inferior a 10 unidades**.
- Calcular a **porcentagem de produtos abaixo do estoque mínimo**.
- Exibir um aviso ao lado dos produtos que precisam de reposição: `"⚠ Repor estoque"`.


Este projeto é a **API REST** do sistema Guardião do Estoque, responsável por fornecer dados para o frontend. O frontend consome esta API para exibir relatórios, produtos e avisos de reposição em tempo real.

A API foi desenvolvida em **PHP** utilizando **SQLite3** como banco de dados, seguindo boas práticas de organização em camadas (controllers, models, repositories, services, views). O frontend é construído com **Vite**, **TypeScript**, **React**, **shadcn-ui**, **Tailwind CSS** e **Lottie** para animações.

O projeto conta com integração **CI/CD** via **GitHub Actions**, ambiente Docker e deploy automático na **Vercel**.

---

## 🛠️ Tecnologias utilizadas

- **Frontend:** Vite, TypeScript, React, shadcn-ui, Tailwind CSS, Lottie
- **Backend:** PHP, SQLite3
- **DevOps:** CI/CD com GitHub Actions, Docker, deploy automático na Vercel

---

## 🛠 Contexto

A API REST expõe endpoints para consulta, listagem e análise dos produtos em estoque. O frontend consome esses endpoints para exibir dashboards e relatórios dinâmicos.

---

## 🎯 Objetivos do Projeto

### Funcionamento da API

A API retorna os dados em formato **JSON** para fácil integração com o frontend.

### Endpoints da API

A API REST retorna dados em formato **JSON** para fácil integração com o frontend. Veja abaixo as rotas disponíveis:

- **GET /products**: Lista todos os produtos e seus estoques.
- **GET /products/{id}**: Busca um produto pelo ID.
- **POST /products**: Adiciona um novo produto. (body: `{ name, stock }`)
- **PUT /products/{id}**: Atualiza um produto existente. (body: `{ name, stock }`)
- **DELETE /products/{id}**: Remove um produto pelo ID.

> ⚙️ O projeto já está configurado com **CORS** (Cross-Origin Resource Sharing), permitindo que o frontend faça requisições HTTP para a API de qualquer origem, facilitando o desenvolvimento e integração entre as aplicações.

---

## 🚀 Como rodar o projeto com Docker

### Pré-requisitos

- [Docker](https://www.docker.com/) e [Docker Compose](https://docs.docker.com/compose/) instalados.

### Passos

1. **Clone o repositório:**
   ```sh
   git clone <url-do-repo>
   cd php-api
   ```

2. **Estrutura de pastas:**

   O projeto deve ter a seguinte estrutura de pastas:

   ```plaintext
   src/
     controllers/
     models/
     repositories/
     services/
     views/
     db/
   ```

3. **Suba o ambiente de desenvolvimento com Docker Compose:**

   ```sh
   docker compose up --build
   ```
3. **Para parar o container e re-buildar:**

   ```sh
   docker compose down
   docker compose up --build
   ```

## 📄 Licença

Este projeto está licenciado sob a licença **MIT**. Veja o arquivo `LICENSE` para mais detalhes.

---