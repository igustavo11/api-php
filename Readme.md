# Desafio Integrador: Sistema de Controle de Estoque com Relatório de Reposição

## 🛠 Contexto

Uma loja de materiais elétricos precisa de um sistema simples em PHP que liste os produtos cadastrados, seus respectivos estoques e identifique automaticamente quais produtos precisam de reposição (quando o estoque estiver abaixo de 10 unidades).

O gestor da loja também deseja visualizar:

- A lista total de produtos e seus estoques.
- A média de estoque da loja.
- Quais produtos estão abaixo do estoque mínimo.
- A porcentagem de produtos que precisam de reposição.

---

## 🎯 Objetivos do Projeto

- Utilizar corretamente estruturas de repetição `for`, `foreach` e/ou `while`.
- Trabalhar com arrays associativos.
- Realizar cálculos dentro de laços.
- Exibir informações de forma organizada (tabelas ou listas).
- Interpretar dados e apresentar resultados com clareza.

No código PHP, é criado um array associativo contendo pelo menos **10 produtos**, com o nome do produto como chave e a **quantidade em estoque como valor**.

**Requisitos funcionais:**

- Exibir todos os produtos e seus estoques usando `foreach` ou `for`.
- Calcular e exibir a **média de estoque** dos produtos.
- Listar os produtos com estoque **inferior a 10 unidades**.
- Calcular a **porcentagem de produtos abaixo do estoque mínimo**.
- Exibir um aviso ao lado dos produtos que precisam de reposição: `"⚠ Repor estoque"`.

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