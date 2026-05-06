# 🎵 Harmo — Catálogo de Músicas

Sistema de catálogo musical desenvolvido com Laravel.
Permite cadastrar, buscar e organizar músicas, artistas e álbuns.

## Tecnologias
- PHP 8.2+ / Laravel 11
- MySQL 8
- Blade Templates
- Laravel Breeze (autenticação)
- TailwindCSS

## Requisitos
- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL

## Instalação
git clone https://github.com/tuliocordev/harmo.git
cd harmo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
php artisan serve

## Funcionalidades
- Catálogo de músicas, artistas e álbuns
- Busca por nome, artista ou gênero
- Sistema de favoritos
- Playlists pessoais
- Painel administrativo

## Autor
tuliocordev - Desenvolvido para a disciplina de Desenvolvimento Web.