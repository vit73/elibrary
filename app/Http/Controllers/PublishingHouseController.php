<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Models\PublishingHouse;

class PublishingHouseController extends Controller
{
    /**
     * Получение списка издательств
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return PublishingHouse::all();
    }

    /**
     * Получение данных по одному издательству
     *
     * @param PublishingHouse $publishing_house
     * @return PublishingHouse
     */
	public function show(PublishingHouse $publishing_house)
    {
        return $publishing_house;
    }

    /**
     * Сохранение данных по издательству с предварительной валидацией
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'name' => 'required|max:255'
		]);
        $publishing_house = PublishingHouse::create($request->all());

        return response()->json($publishing_house, 201); // Объект создан
    }

    /**
     * Обновление данных по издательству
     *
     * @param Request $request
     * @param PublishingHouse $publishing_house
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, PublishingHouse $publishing_house)
    {
        $publishing_house->update($request->all());

        return response()->json($publishing_house, 200); // OK. Стандартный код успешного ответа.
    }

    /**
     * Удаление издательства
     *
     * @param PublishingHouse $publishing_house
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(PublishingHouse $publishing_house)
    {
        $publishing_house->delete();

        return response()->json(null, 204); // Отсутствует контент. Когда действие выполнено успешно, но не возвращен контент.
    }

    /**
     * Получение списка книг в издательстве
     *
     * @param PublishingHouse $publishing_house
     * @return mixed
     */
    public function getPublishingHouseFromBook(PublishingHouse $publishing_house)
    {
        return $publishing_house->books;
    }
}
