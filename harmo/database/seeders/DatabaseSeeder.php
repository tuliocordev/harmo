<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@harmo.com',
            'password' => bcrypt('password'),
        ]);

        $genres = collect([
            'Rock Nacional', 'Rock Alternativo', 'Trap', 'Hard Rock', 'Funk'
        ])->map(fn($name) => Genre::create(['name' => $name, 'slug' => Str::slug($name)]));

        $artistsData = [
            ['name' => 'Los Hermanos', 'photo' => 'los-hermanos.jpg'],
            ['name' => 'The Strokes', 'photo' => 'the-strokes.jpg'],
            ['name' => 'Matue', 'photo' => 'matue.jpg'],
            ['name' => 'Guns N Roses', 'photo' => 'guns-n-roses.jpg'],
            ['name' => 'MC GW', 'photo' => 'mc-gw.jpg'],
        ];

        $artists = collect($artistsData)->map(fn($a) => Artist::create([
            'name' => $a['name'],
            'slug' => Str::slug($a['name']),
            'photo' => $a['photo'],
        ]));

        $albumsData = [
            [
                'title' => 'Bloco do Eu Sozinho',
                'cover' => 'bloco-do-eu-sozinho.jpg',
                'artist' => 0,
                'genre' => 0,
                'year' => 2001,
                'songs' => ['Anna Julia', 'Cara Estranho', 'Morena', 'O Vencedor']
            ],
            [
                'title' => 'Is This It',
                'cover' => 'is-this-it.jpg',
                'artist' => 1,
                'genre' => 1,
                'year' => 2001,
                'songs' => ['Last Nite', 'Someday', 'Hard to Explain', 'New York City Cops']
            ],
            [
                'title' => '333',
                'cover' => '333.jpg',
                'artist' => 2,
                'genre' => 2,
                'year' => 2019,
                'songs' => ['Doce 47', 'Maquina do Tempo', 'Me Paga', 'Supernatural']
            ],
            [
                'title' => 'Appetite for Destruction',
                'cover' => 'appetite-for-destruction.jpg',
                'artist' => 3,
                'genre' => 3,
                'year' => 1987,
                'songs' => ['Welcome to the Jungle', 'Sweet Child O Mine', 'Paradise City', 'Nightrain']
            ],
            [
                'title' => 'Os Melhores do Funk',
                'cover' => 'os-melhores-do-funk.jpg',
                'artist' => 4,
                'genre' => 4,
                'year' => 2022,
                'songs' => ['Quer Namorar', 'Hoje Eu To Solteiro', 'Nao Para', 'Vai Embrazando']
            ],
        ];

        foreach ($albumsData as $data) {
            $album = Album::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'artist_id' => $artists[$data['artist']]->id,
                'cover' => $data['cover'],
                'release_year' => $data['year'],
            ]);

            foreach ($data['songs'] as $songTitle) {
                Song::create([
                    'title' => $songTitle,
                    'slug' => Str::slug($songTitle),
                    'artist_id' => $artists[$data['artist']]->id,
                    'album_id' => $album->id,
                    'genre_id' => $genres[$data['genre']]->id,
                    'duration' => rand(180, 300),
                ]);
            }
        }
    }
}