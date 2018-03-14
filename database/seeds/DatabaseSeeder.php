<?php

use Illuminate\Database\Seeder,
    Illuminate\Support\Facades\DB,
    Illuminate\Database\Eloquent\Model,
    App\Models\Author,
    App\Models\Book,
    App\Models\PublishingHouse,
    App\Models\BookPublishingHouse;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(AuthorSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(PublishingHousesSeeder::class);
        $this->call(BookPublishingHousesSeeder::class);
    }
}

class AuthorSeeder extends Seeder
{
    public function run()
    {
        DB::table('authors')->delete();
        Author::create([
            'id' => 1,
            'surname' => 'Достоевский',
            'name' => 'Федор',
            'middlename' => 'Михайлович'
        ]);

        Author::create([
            'id' => 2,
            'surname' => 'Толстой',
            'name' => 'Лев',
            'middlename' => 'Николаевич'
        ]);
    }
}

class BookSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->delete();
        Book::create([
            'id' => 1,
            'name' => 'Война и мир',
            'description' => 'Роман-эпопея, описывающий события войн против Наполеона: 1805 года и отечественной 1812 года. Признан критикой всего мира величайшим эпическим произведением литературы нового времени.',
            'author_id' => 2
        ]);

        Book::create([
            'id' => 2,
            'name' => 'Преступление и наказание',
            'description' => '«Преступление и наказание» (1866) — роман об одном преступлении. Двойное убийство, совершенное бедным студентом из-за денег. Трудно найти фабулу проще, но интеллектуальное и душевное потрясение, которое производит роман, — неизгладимо. В чем здесь загадка? Кроме простого и очевидного ответа — «в гениальности Достоевского» — возможно, существует как минимум еще один: «проклятые» вопросы не имеют простых и положительных ответов. Нищета, собственные страдания и страдания близких всегда ставили и будут ставить человека перед выбором: имею ли я право преступить любой нравственный закон, чтобы потом стать спасителем униженных и утешителем слабых; должен ли я сперва возлюбить себя, а только потом, став сильным, возлюбить ближнего своего? Это вечные вопросы.',
            'author_id' => 1
        ]);

        Book::create([
            'id' => 3,
            'name' => 'Анна Каренина',
            'description' => '«Анна Каренина», один из самых знаменитых романов Льва Толстого, начинается ставшей афоризмом фразой: «Все счастливые семьи похожи друг на друга, каждая несчастливая семья несчастлива по-своему». Это книга о вечных ценностях: о любви, о вере, о семье, о человеческом достоинстве.',
            'author_id' => 2
        ]);
    }
}

class PublishingHousesSeeder extends Seeder
{
    public function run()
    {
        DB::table('publishing_houses')->delete();
        PublishingHouse::create([
            'id' => 1,
            'name' => 'РИПОЛ классик',
            'description' => 'многопрофильное издательство, генеральным директором которого является Сергей Макаренков'
        ]);

        PublishingHouse::create([
            'id' => 2,
            'name' => 'Феникс',
            'description' => 'крупнейшее региональное издательство России, расположенное в Ростове-на-Дону'
        ]);
    }
}

class BookPublishingHousesSeeder extends Seeder
{
    public function run()
    {
        DB::table('book_publishing_houses')->delete();
        BookPublishingHouse::create([
            'id' => 1,
            'book_id' => 1,
            'publishing_house_id' => 1
        ]);

        BookPublishingHouse::create([
            'id' => 2,
            'book_id' => 2,
            'publishing_house_id' => 1
        ]);

        BookPublishingHouse::create([
            'id' => 3,
            'book_id' => 3,
            'publishing_house_id' => 2
        ]);
    }
}