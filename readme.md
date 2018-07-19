# Binary Studio Academy 2018

## PHP Testing

### Цель

Ознакомиться с основными видами автоматизированного тестирования.
Научиться писать модульные и функциональные тесты при помощи фреймоврка PHPUnit.
Научиться тестировать приложение в фреймворке Laravel.

### Установка

<b>Репозиторий форкать нельзя!</b>

```
git clone <link to repositry>
cd <repository_name>
cp .env.example .env
composer install
php artisan key:generate
cp .env .env.dusk.local
php artisan migrate:fresh
git checkout -b develop
```

Разработку ведите в ветви `develop`.
Также рекомендуется использовать Homestead для поднятия приложения.

### Задание

Прежде всего вам необходимо реализовать следующие интерфейсы:

* [Репозитории](app/Repository/Contracts)
    * [App\Repository\Contracts\CurrencyRepository](app/Repository/Contracts/CurrencyRepository.php)
    * [App\Repository\Contracts\MoneyRepository](app/Repository/Contracts/MoneyRepository.php)
    * [App\Repository\Contracts\LotRepository](app/Repository/Contracts/LotRepository.php)
    * [App\Repository\Contracts\TradeRepository](app/Repository/Contracts/TradeRepository.php)
    * [App\Repository\Contracts\WalletRepository](app/Repository/Contracts/WalletRepository.php)
* [Сервисы](app/Service/Contracts)
    * [App\Service\Contracts\CurrencyService](app/Service/Contracts/CurrencyService.php)
    * [App\Service\Contracts\MarketService](app/Service/Contracts/MarketService.php)
    * [App\Service\Contracts\WalletService](app/Service/Contracts/WalletService.php)
* [Запросы](app/Request/Contracts)
* [Ответ](app/Response/Contracts/LotResponse.php)

Сервисы и репозитории должны быть зарегистрированы как сервис контейнеры в виде интерфейса на реализацию.<br>
Миграции моделей и модели уже созданы в [App\Entity](app/Entity/).<br>
Разрешается добавлять вспомогательные методы, если это необходимо.<br>
Для работы с почтой используйте [драйвер для разработки](https://laravel.com/docs/5.6/mail#mail-and-local-development).

### Описание методов сервисов

* [MarketService](app/Service/Contracts/MarketService.php)
    * `addLot` - выставление лота продажы валюты. Метод должен соответствовать следующим ограничениям:
        * Пользователь не может иметь более одной активной сессии продажи одной и той же валюты
        * Дата закрытия сессии не может быть меньше чем дата открытия
        * Цена лота не может быть отрицательной
        * В случае успешного выполнения должен быть добавлен лот
    * `buyLot` - покупка валюты из лота. Метод должен соответствовать следующим ограничениям:
        * Из кошелька продавца должна быть извлечена купленная валюта
        * В кошелек покупателя должна быть добавлена валюта
        * Пользователь не может покупать собственную валюту
        * Пользователь не может покупать больше валюты чем содержит лот
        * Пользователь не может купить меньше одной единицы валюты
        * Пользователь не может купить валюту из закрытого лота 
        * После успешного выполнения должна быть добавлена сделка (`Trade`)
        * После успешного выполнения на почту продавца должно отправиться электронное письмо [App\Mail\TradeCreated](app/Mail/TradeCreated.php) (Отправляйте при помощи фасада Mail::send()).
    * `getLot` - возвращает информацию о лоте по идентификатору. Метод должен соответствовать следующим ограничениям:
        * Количество валюты должно соответствовать количеству валюты в кошельке пользователя.
        * Даты закрытия и открытия должны быть представлены строкой в формате: `yyyy/mm/dd hh:mm:ss`
        * Цена за единицу валюты должна быть в формате: `00,00`
    * `getLotList` - возвращает массив объектов типа `LotResponse`.
* [WalletService](app/Service/Contracts/WalletService.php)
    * `addWallet` - добавляет кошелек пользователю. Пользователь не может иметь более одного кошелька.
    * `addMoney` - добавляет единицы заданной валюты в кошелек пользователя. Пользователь не может иметь более одной записи с одной валютой в кошельке.
    * `takeMoney` - сокращает количество валюты в кошельке пользователя. Значение количества валюты не должно превышать количество валюты в кошельке пользователя.
* [CurrencyService](app/Service/Contracts/CurrencyService.php)
    * `addCurrency` - добавляет валюту в справочник.

### Задание #1

Вам необходимо написать модульные тесты для методов сервиса [MarketService](app/Service/Contracts/MarketService.php) (`addLot`, `buyLot`, `getLot`, `getLotList`).

В этом задании вы должны использовать создание моков, стабов, а также использовать ассершены, предоставляемые [PHPUnit](https://phpunit.readthedocs.io/en/7.1/assertions.html) и [Laravel](https://laravel.com/docs/5.6/testing).

При создании модульных тестов нельзя проводит никаких операций с базой данных!

### Задание #2

Для выполнения этого задания вам необходимо использовать реализованные сервисы и средства работы с пользователями, предоставляемые фреймворком.

Для начала вам нужно добавить следующие роуты:

* Добавление лота

`POST /api/v1/lots`<br>
`Content-type: application/json`<br>
`Status code: 201`<br>
`Request data: `<br>
```
{ 
    "currency_id": <int>,
    "date_time_open": <int>,
    "date_time_close": <int>,
    "price": <float>
}
```

* Покупка валюты

`POST /api/v1/trades`<br>
`Content-type: application/json`<br>
`Status code: 201`<br>
`Request data: `<br>
```
{ 
    "lot_id": <int>,
    "amount": <float>
}
```

* Детальная информация о лоте

`GET /api/v1/lots/{id}`<br>
`Content-type: application/json`<br>
`Status code: 200`<br>
`Response:`<br>
```
{
    "id": <int>,
    "user_name": <string>,
    "currency_name": <string>,
    "amount": <float>,
    "date_time_open": <string>,
    "date_time_close": <string>,
    "price": <string>
}
```

* Список всех лотов

`GET /api/v1/lots`<br>
`Content-type: application/json`<br>
`Status code: 200`<br>
`Response:`<br>
```
[
    {
        "id": <int>,
        "user": <string>,
        "currency": <string>,
        "amount": <float>,
        "date_time_open": <string>,
        "date_time_close": <string>,
        "price": <string>
    },
    ...
]
```

Добавлять лоты и покупать валюту могут только зарегистрированные пользователи.

В случае возникновения ошибки необходимо вернуть следующий ответ:

`Content-type: application/json`<br>
`Status code: 400`<br>
```
{
    error: {
        message: <string>,
        status_code: <int>
    }
}
```

Если доступ запрещен, то код статуса ответа должен быть `403`.

Используя средства тестирования API и базы данных, предоставляемые фреймворком Laravel, написать тесты для тестирования роутов API. 
Для создания фейковых данных рекомендуется использовать [фабрики Laravel](https://laravel.com/docs/5.6/database-testing#generating-factories).

### Задание #3

Добавьте view с формой добавления лота по маршруту `/market/lots/add`.

В случае успешного добавления лота должно выводиться сообщение: "Lot has been added successfully!".

В случае не удачного добавления должна быть надпись: "Sorry, error has been occurred: `<error text>`",

где `<error text>` - текст ошибки.

Используя Dusk необходимо протестировать отображение формы и вывод соответствующих сообщений.

### Запуск dusk c Homestead

Зайдите на виртуальную машину через ssh из папки, где установлен Homestead
```
vagrant ssh
```

Перейдите в директорию проекта и запустите
```
php artisan serve --host=192.168.10.10 --port=8080
```

Установите в '.env.dusk.local' строку
```
APP_URL=http://192.168.10.10:8080
```

Теперь можно запустить тесты.
```
php artisan dusk
```

### Прием решений

- Создайте репозиторий на github и запушьте обе ветки `master` и `develop`.
- Установите в вашем github аккаунте [Travis CI](https://github.com/marketplace/travis-ci/plan/MDIyOk1hcmtldHBsYWNlTGlzdGluZ1BsYW43MA==#pricing-and-setup0).
- В репозитории перейдите в `Settings->Integrations&Services` и выберите в `Add service` Travis CI.
- Перейдите на сайт [travis-ci.org](https://travis-ci.org/), авторизуйтесь с вашего github аккаунта и включите ваш репозиторий.
- Пошлите пулл реквест из ветки `develop`, где должны быть все изменения, в ветку `master`, но не принимайте его.
- Оставьте ссылку на github репозиторий в личном кабинете.
