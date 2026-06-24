# 🕯️ Altar Oculto - Loja de Umbanda

[![Status do Projeto](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)]()
[![IFSC](https://img.shields.io/badge/IFSC-Chapec%C3%B3-blue)]()
[![Laravel](https://img.shields.io/badge/Laravel-11.x-red)]()
[![PHP](https://img.shields.io/badge/PHP-8.2+-purple)]()
[![License](https://img.shields.io/badge/license-MIT-green)]()

---

## 📋 Sobre o Projeto

O **Altar Oculto** é um sistema de e-commerce desenvolvido como parte da disciplina de **Desenvolvimento de Aplicações Web** no **IFSC - Câmpus Chapecó**. O projeto consiste em uma loja virtual especializada em artigos para **Umbanda** e religiões de matriz africana, oferecendo produtos como velas, guias, imagens de orixás, ervas, fitas, assentamentos e acessórios para rituais.

O sistema foi desenvolvido utilizando o framework **Laravel** com padrão **MVC**, aplicando conceitos de **Programação Orientada a Objetos**, **Eloquent ORM** e **relacionamentos entre tabelas**. Além do catálogo de produtos, o sistema conta com painel administrativo, carrinho de compras, controle de pedidos e geração de relatórios gerenciais.

---

## 👤 Credenciais de Acesso

### Administrador
Acesso total ao painel administrativo para gerenciar produtos, categorias, pedidos e clientes.

| Campo | Valor |
| :--- | :--- |
| **E-mail** | `admin@teste.com` |
| **Senha** | `admin123` |

### Cliente (Usuário Comum)
Acesso ao catálogo de produtos, carrinho de compras e histórico de pedidos.

| Campo | Valor |
| :--- | :--- |
| **E-mail** | `cliente@teste.com` |
| **Senha** | `password` |

---

## 🚀 Funcionalidades Principais

### 🛍️ Catálogo de Produtos
- Listagem de produtos com imagens, descrições e preços.
- Filtros por categoria (Ex: Velas, Guias, Imagens, Ervas, Acessórios).
- Busca por nome ou descrição do produto.
- Página de detalhes do produto com informações completas.

### 🛒 Carrinho de Compras
- Adição e remoção de produtos.
- Atualização de quantidades.
- Cálculo automático de subtotal e total.

### 📦 Pedidos e Checkout
- Finalização de compra com dados de entrega.
- Status do pedido (Pendente, Pago, Enviado, Entregue).
- Histórico de pedidos do cliente.

### 👥 Autenticação e Usuários
- Registro e login de clientes.
- Perfis de **Administrador** e **Cliente**.
- Controle de acesso baseado em permissões.

### 📊 Dashboards e Relatórios
- Gráficos de produtos mais vendidos (Chart.js).
- Relatórios de faturamento por período.
- Relatório de pedidos em PDF (DomPDF).
- Métricas gerais: total de produtos, pedidos, clientes e faturamento.

---

## 🛠️ Tecnologias Utilizadas

### Back-end
- **PHP 8.2+**
- **Laravel 11.x**
- **Eloquent ORM** (relacionamentos 1:1, 1:N, N:N)
- **MySQL** (banco de dados relacional)

### Front-end
- **Blade** (template engine do Laravel)
- **Bootstrap 5** (estilização e responsividade)
- **Chart.js** (gráficos interativos)
- **DomPDF / Laravel-Snappy** (geração de relatórios)

### Ferramentas
- **Composer** (gerenciador de dependências PHP)
- **NPM** (gerenciador de pacotes front-end)
- **Git & GitHub** (controle de versão)
- **Visual Studio Code** (editor de código)

---

## 📥 Como Executar o Projeto Localmente

### Pré-requisitos

Antes de começar, certifique-se de ter instalado:

| Ferramenta | Download | Finalidade |
| :--- | :--- | :--- |
| **Laravel Herd** | [herd.laravel.com](https://herd.laravel.com/windows) | Ambiente PHP + Nginx para Laravel |
| **Laragon** | [laragon.org](https://laragon.org/download) | Ambiente completo (Apache, MySQL, PHP) |
| **Visual Studio Code** | [code.visualstudio.com](https://code.visualstudio.com/) | Editor de código |

---

### Passo a Passo

#### 1️⃣ Clone o repositório
```bash
git clone https://github.com/Ravemuon/altar-oculto-laravel.git
cd altar-oculto-laravel
