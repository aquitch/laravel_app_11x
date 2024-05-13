<?php

namespace App\Dictionaries;

class OrderStatus
{   
    protected static $statuses = [ //Свойство
        'Создан',
        'Оплачен',
        'Отправлен',
        'Получен',
    ];

    static public function status($id) //Метод
    {
        return self::$statuses[$id];
    }

    static public function statuses()
    {
        return self::$statuses;
    }
}