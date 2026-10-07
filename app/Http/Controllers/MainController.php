<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public $products = [
        ['id' => 1, 'title' => 'Музыка', 'price' => 100, 'path' => 'img1.png'],
        ['id' => 2, 'title' => 'Контакт', 'price' => 200, 'path' => 'img2.png'],
        ['id' => 3, 'title' => 'Изображение', 'price' => 300, 'path' => 'img3.png'],
        ['id' => 4, 'title' => 'Телефон', 'price' => 400, 'path' => 'img4.png'],
        ['id' => 5, 'title' => 'Трансляция', 'price' => 500, 'path' => 'img5.png'],
        ['id' => 6, 'title' => 'Сообщение', 'price' => 600, 'path' => 'img6.png'],
        ['id' => 7, 'title' => 'Хранилище', 'price' => 700, 'path' => 'img7.png'],
        ['id' => 8, 'title' => 'Избранное', 'price' => 800, 'path' => 'img8.png'],
    ];

    public function showIndex()
    {
        return view('home');
    }

    public function showArray()
    {
        $array = $this->products;

        return view('array', compact('array'));
    }

    public function shuffleArray()
    {
        $array = $this->products;
        shuffle($array);

        return view('array', compact('array'));
    }

    public function sortArray()
    {
        $array = $this->products;

        $prices = array_column($array, 'price');

        array_multisort($prices, SORT_ASC, $array);

        return view('array', compact('array'));
    }




    public function filterArray()
    {
        $array = array_values(array_filter($this->products, fn($item) => $item['price'] > 500));

        return view('array', compact('array'));
    }
}
