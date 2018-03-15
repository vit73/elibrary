<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
	App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Получение списка авторов
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Author::all();
    }

    /**
     * Получение данных по одному автору
     *
     * @param Author $author
     * @return Author
     */
	public function show(Author $author)
    {
        return $author;
    }

    /**
     * Сохранение данных по автору с предварительной валидацией
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'middlename' => 'required|max:255'
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201); // Объект создан
    }

    /**
     * Обновление данных по автору
     *
     * @param Request $request
     * @param Author $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Author $author)
    {
        $author->update($request->all());

        return response()->json($author, 200); // OK. Стандартный код успешного ответа.
    }

    /**
     * Удаление автора
     *
     * @param Author $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Author $author)
    {
        $author->delete();

        return response()->json(null, 204); // Отсутствует контент. Когда действие выполнено успешно, но не возвращен контент.
    }

    /**
     * Получение списка книг автора
     *
     * @param PublishingHouse $publishing_house
     * @return mixed
     */
    public function getAuthorBooks(Author $author)
    {
        return $author->books;
    }
}
