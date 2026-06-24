# 🕯️ Altar Oculto - Loja de Umbanda (Laravel Skeleton)

[![Status do Projeto](https://img.shields.io/badge/status-esqueleto%20inicial-yellow)]()
[![IFSC](https://img.shields.io/badge/IFSC-Chapec%C3%B3-blue)]()
[![Laravel](https://img.shields.io/badge/Laravel-11.x-red)]()
[![PHP](https://img.shields.io/badge/PHP-8.2+-purple)]()
[![License](https://img.shields.io/badge/license-MIT-green)]()

---

## ⚠️ Sobre este Repositório

**Este é um esqueleto (skeleton) de projeto Laravel gerado automaticamente pelo assistente da disciplina.**  
Ele contém a estrutura básica preparada para o **Trabalho Avaliativo (TAV)**. Os arquivos aqui são a base para você construir a aplicação completa.

**Passos para finalizar e transformar este esqueleto em um projeto funcional:**

1. **Mova o conteúdo** para um projeto Laravel real, ou crie um novo projeto com `composer create-project laravel/laravel altar_oculto` e **substitua os arquivos** pelos deste repositório.
2. **Ajuste o arquivo `.env`** com as credenciais do seu banco de dados e crie o banco manualmente.
3. Execute `composer install` para instalar as dependências.
4. Execute `php artisan key:generate` para gerar a chave da aplicação.
5. Execute `php artisan migrate` para criar as tabelas (quando as migrations estiverem prontas).
6. Execute `php artisan db:seed` para popular o banco com dados iniciais (quando os seeds forem implementados).
7. **Ajuste rotas, policies, views e controllers** conforme a necessidade do seu projeto.

---

## 📋 Sobre o Projeto

O **Altar Oculto** é um sistema de e-commerce desenvolvido como parte da disciplina de **Desenvolvimento de Aplicações Web** no **IFSC - Câmpus Chapecó**. O projeto consiste em uma loja virtual especializada em artigos para **Umbanda** e religiões de matriz africana, oferecendo produtos como velas, guias, imagens de orixás, ervas, fitas, assentamentos e acessórios para rituais.

---

## 👤 Credenciais de Acesso (dados fictícios para testes)

### Administrador
| Campo | Valor |
| :--- | :--- |
| **E-mail** | `admin@teste.com` |
| **Senha** | `admin123` |

### Cliente (Usuário Comum)
| Campo | Valor |
| :--- | :--- |
| **E-mail** | `cliente@teste.com` |
| **Senha** | `password` |

---

## 🚀 Funcionalidades Previstas

- Catálogo de produtos com imagens e descrições.
- Filtros por categoria (Velas, Guias, Imagens, Ervas, Acessórios).
- Carrinho de compras.
- Checkout com dados de entrega.
- Histórico de pedidos.
- Painel administrativo para gestão de produtos, categorias e pedidos.
- Gráficos e relatórios de vendas.

---

## 🛠️ Tecnologias Utilizadas

- **PHP 8.2+** / **Laravel 11.x**
- **Eloquent ORM**
- **MySQL**
- **Blade** / **Bootstrap 5**
- **Chart.js** / **DomPDF**
- **Composer** / **NPM**
- **Git & GitHub**

---

## 📥 Como Executar o Projeto (após os passos de finalização)

### Pré-requisitos

| Ferramenta | Download |
| :--- | :--- |
| **Laravel Herd** | [herd.laravel.com](https://herd.laravel.com/windows) |
| **Laragon** | [laragon.org](https://laragon.org/download) |
| **Visual Studio Code** | [code.visualstudio.com](https://code.visualstudio.com/) |

### Passo a passo resumido

```bash
git clone https://github.com/Ravemuon/altar-oculto-laravel.git
cd altar-oculto-laravel
composer install
cp .env.example .env
# edite .env com suas credenciais
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
