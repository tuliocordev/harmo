# 🎵 Harmo — Catálogo de Músicas

Sistema de catálogo musical desenvolvido com Laravel.
Permite cadastrar, buscar e organizar músicas, artistas e álbuns.

## Tecnologias
- PHP 8.1+ / Laravel
- MySQL
- Blade Templates
- Laravel Breeze (autenticação)
- TailwindCSS

## Requisitos
- PHP >= 8.1
- Composer
- Node.js >= 18
- MySQL

## Instalação
```bash
git clone https://github.com/tuliocordev/harmo.git
cd harmo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve
```

## Funcionalidades
- Catálogo de músicas, artistas e álbuns
- Busca por nome, artista ou gênero
- Sistema de favoritos
- Playlists pessoais
- Painel administrativo

## Modelagem do Banco de Dados

Diagrama feito no [dbdiagram.io](https://dbdiagram.io)

```
Table users {
  id bigint [pk, increment]
  name varchar(255) [not null]
  email varchar(255) [not null, unique]
  password varchar(255) [not null]
  role varchar(20) [not null, default: 'user', note: 'user ou admin']
  avatar varchar(255)
  email_verified_at timestamp
  remember_token varchar(100)
  created_at timestamp
  updated_at timestamp
}

Table genres {
  id bigint [pk, increment]
  name varchar(100) [not null, unique]
  slug varchar(100) [not null, unique]
  created_at timestamp
  updated_at timestamp
}

Table artists {
  id bigint [pk, increment]
  name varchar(255) [not null]
  slug varchar(255) [not null, unique]
  bio text
  photo varchar(255)
  country varchar(100)
  created_at timestamp
  updated_at timestamp
}

Table albums {
  id bigint [pk, increment]
  title varchar(255) [not null]
  slug varchar(255) [not null, unique]
  artist_id bigint [not null, ref: > artists.id]
  cover varchar(255)
  release_year year
  created_at timestamp
  updated_at timestamp
}

Table songs {
  id bigint [pk, increment]
  title varchar(255) [not null]
  slug varchar(255) [not null, unique]
  artist_id bigint [not null, ref: > artists.id]
  album_id bigint [ref: > albums.id]
  genre_id bigint [ref: > genres.id]
  duration smallint
  track_number tinyint
  lyrics longtext
  cover varchar(255)
  created_at timestamp
  updated_at timestamp
}

Table favorites {
  id bigint [pk, increment]
  user_id bigint [not null, ref: > users.id]
  song_id bigint [not null, ref: > songs.id]
  created_at timestamp
}

Table playlists {
  id bigint [pk, increment]
  user_id bigint [not null, ref: > users.id]
  name varchar(255) [not null]
  description text
  is_public boolean [default: false]
  created_at timestamp
  updated_at timestamp
}

Table playlist_song {
  playlist_id bigint [not null, ref: > playlists.id]
  song_id bigint [not null, ref: > songs.id]
  order tinyint [default: 0]
  created_at timestamp
}
```

## Autor
Desenvolvido para a disciplina de Desenvolvimento Web.
