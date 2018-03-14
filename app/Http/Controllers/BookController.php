<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
	App\Models\Book;

class BookController extends Controller
{
    /**
     * Получение списка книг
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Получение данных по одной книге
     *
     * @param Book $book
     * @return Book
     */
	public function show(Book $book)
    {
        return $book;
    }

    /**
     * Сохранение данных по книге с предварительной валидацией
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'name' => 'required|max:255',
			'author_id' => 'required'
		]);
        $book = Book::create($request->all());

        return response()->json($book, 201); // Объект создан
    }

    /**
     * Обновление данных по книге
     *
     * @param Request $request
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        return response()->json($book, 200); // OK. Стандартный код успешного ответа.
    }

    /**
     * Удаление книги
     *
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Book $book)
    {
        $book->delete();

        return response()->json(null, 204); // Отсутствует контент. Когда действие выполнено успешно, но не возвращен контент.
    }

    /**
     * Получение списка издательств по книге
     *
     * @param Book $book
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPublishingHouseFromBook(Book $book)
    {
        return $book->publishing_houses;
    }

    /**
     * Получение данных автора книги
     *
     * @param Book $book
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAuthorFromBook(Book $book)
    {
        return $book->author;
    }
}
