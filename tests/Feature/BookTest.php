<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User,
    App\Models\Book;

class BookTest extends TestCase
{
    public function testsBooksAreCreatedCorrectly()
    {
        $payload = [
            'id' => 4,
            'name' => 'Кавказский пленник',
            'description' => 'В 1851 году старший брат Николай уговорил Льва Толстого ехать на Кавказ, где шла тогда русско-чеченская война. Поначалу Кавказ не оказал на него того «живительного воздействия», на которое он рассчитывал.',
            'author_id' => 1
        ];

        $this->json('POST', '/api/books', $payload)
            ->assertStatus(201)
            ->assertJson(['id' => 4, 'name' => 'Кавказский пленник', 'description' => 'В 1851 году старший брат Николай уговорил Льва Толстого ехать на Кавказ, где шла тогда русско-чеченская война. Поначалу Кавказ не оказал на него того «живительного воздействия», на которое он рассчитывал.', 'author_id' => 1]);
    }

    public function testsBooksAreUpdatedCorrectly()
    {
        $book = factory(Book::class)->create([
            'id' => 5,
            'name' => 'Кавказский пленник',
            'description' => 'В 1851 году старший брат Николай уговорил Льва Толстого ехать на Кавказ, где шла тогда русско-чеченская война. Поначалу Кавказ не оказал на него того «живительного воздействия», на которое он рассчитывал.',
            'author_id' => 1
        ]);

        $payload = [
            'name' => 'Палата № 6',
            'description' => 'Это произведение Антона Павловича Чехова вошло в школьную программу и является обязательным для прочтения. '
        ];

        $response = $this->json('PUT', '/api/books/' . $book->id, $payload)
            ->assertStatus(200);
    }

    public function testsBooksAreDeletedCorrectly()
    {
        $book = factory(Book::class)->create([
            'name' => 'Кавказский пленник',
            'description' => 'В 1851 году старший брат Николай уговорил Льва Толстого ехать на Кавказ, где шла тогда русско-чеченская война. Поначалу Кавказ не оказал на него того «живительного воздействия», на которое он рассчитывал.',
        ]);

        $this->json('DELETE', '/api/books/' . $book->id, [])
            ->assertStatus(204);
    }

    public function testBooksAreListedCorrectly()
    {
        factory(Book::class)->create([
            'name' => 'Кавказский пленник',
            'description' => 'В 1851 году старший брат Николай уговорил Льва Толстого ехать на Кавказ, где шла тогда русско-чеченская война. Поначалу Кавказ не оказал на него того «живительного воздействия», на которое он рассчитывал.'
        ]);

        factory(Book::class)->create([
            'name' => 'Палата № 6',
            'description' => 'Это произведение Антона Павловича Чехова вошло в школьную программу и является обязательным для прочтения. '
        ]);

        $response = $this->json('GET', '/api/books', [])
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'description', 'created_at', 'updated_at'],
            ]);
    }
}
