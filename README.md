# Assist.ru

PHP библиотека для работы с платежным интегратором Assist.ru

## Содержание

- [Установка](#установка)
- [Использование](#использование)
    - [Создание запроса](#создание-запроса)
    - [Получение данных ответа](#получение-данных-ответа)
- [Конфигурация](#конфигурация)
    - [Базовая конфигурация SDK клиента](#базовая-конфигурация-sdk-клиента)
    - [Конфигурация запросов](#конфигурация-запросов)
        - [Обычный платёж (CreatePaymentRequest)](#обычный-платёж-assistrequestcreatepaymentcreatepaymentrequest)
        - [Подтверждение платежа (ChargeRequest)](#подтверждение-платежа-assistrequestcreatepaymentchargerequest)
        - [Рекуррентный платёж (RecurrentPaymentRequest)](#рекуррентный-платёж-assistrequestrecurrentpaymentrecurrentpaymentrequest)
        - [Отмена платежа (CancelRequest)](#отмена-платежа-assistrequestcreatepaymentcancelrequest)
        - [Получение результата (OrderResultRequest)](#получение-результата-assistrequestorderresultorderresultrequest)
- [Обработка ответов с ошибками](#обработка-http-ответов-содержащих-ошибки)
- [Тестирование](#тестирование)

## Установка

```shell
$ composer require assist/assist_ru_php_core
```

## Использование

### Создание запроса

Подготовьте конфигурацию клиента

```php
$config = new \Assist\Config\Config([
    //ID предприятия
    'shop_id' => 999999,
    //Логин аккаунта предприятия
    'login' => 'login',
    //Пароль аккаунта предприятия
    'password' => 'password',
]);
```

Создайте экземпляр класса клиента и передайте конфигурацию

```php
$client = new \Assist\Client($config);
```

Создайте экземпляр класс запроса и передайте параметры запроса

```php
$createPayment = new \Assist\Request\CreatePayment\CreatePaymentRequest([
    'OrderNumber' => 'number',
    'OrderAmount' => 'amount',
    'ChequeItems' => '',
]);
```

Вызовете метод запроса и передайте в него инстанс запроса

```php
$response = $client->createPayment($createPayment);
```

### Получение данных ответа

Все классы ответов имеют метод getResponseData(), который возвращает массив с данными ответа

```php
$responseData = $response->getResponseData();
```

Структура массива соответствует структуре JSON ответа API Ассист

https://docs.assist.ru/swagger/?urls.primaryName=payments.demo.paysecure.ru#

Так-же для каждого параметра доступны соответствующие геттеры

```php
$response = $client->createPayment($createPaymentRequest);

$paymentUrl = $response->getUrl();
$orderState = $response->getOrderState();
$expirationTime = $response->getExpirationTime();
```

## Конфигурация

### Базовая конфигурация SDK клиента

Список доступных параметров для класса Config

| Имя параметра | Описание                     | Значение по умолчанию              |
|---------------|------------------------------|------------------------------------|
| api_url       | основной URL API Ассист      | https://payments.paysecure.ru      |
| test_api_url  | Тестовый URL API Ассист      | https://payments.demo.paysecure.ru |
| test_mode     | Индикатор тестового режима   | false                              |
| lang          | Язык авторизационных страниц | RU                                 |
| merchant_id   | Индикатор тестового режима   | -                                  |
| login         | Индикатор тестового режима   | -                                  |
| password      | Индикатор тестового режима   | -                                  |

### Конфигурация запросов

Пример конфигурации

```php
$config = [
    'OrderNumber' => 'string',
    'OrderAmount' => 0,
    'Check' => [
        [
          "id" => "string",
          "product" => "string",
          "name" => "string",
          "price" => 0,
          "amount" => 0,
          "quantity" => 0,
          "tax" => "string",
          "еancode" => "string",
          "uncode" => "string",
          "gs1code" => "string",
          "furcode" => "string",
          "egaiscode" => "string",
          "hscode" => "string",
          "subjtype" => 0
        ]
    ]
];

$createPaymentRequest = new \Assist\Request\CreatePayment\CreatePaymentRequest($config);
```

#### Обычный платёж (Assist\Request\CreatePayment\CreatePaymentRequest)

Конфигурация соответствует параметрам запроса **/pay/payrequest.cfm**

[Документация "/pay/payrequest.cfm"](https://docs.assist.ru/pages/viewpage.action?pageId=5767488)

#### Подтверждение платежа (Assist\Request\CreatePayment\ChargeRequest)

Конфигурация соответствует параметрам запроса **/charge/charge.cfm**

[Документация "/charge/charge.cfm"](https://docs.assist.ru/pages/viewpage.action?pageId=5767493)

#### Рекуррентный платёж (Assist\Request\RecurrentPayment\RecurrentPaymentRequest)

Конфигурация соответствует параметрам запроса **/recurrent/rp.cfm**

[Документация "/recurrent/rp.cfm"](https://docs.assist.ru/pages/viewpage.action?pageId=17368407)

#### Отмена платежа (Assist\Request\CreatePayment\CancelRequest)

Конфигурация соответствует параметрам запроса **/cancel/wscancel.cfm**

[Документация "/cancel/wscancel.cfm"](https://docs.assist.ru/pages/viewpage.action?pageId=17368389)

#### Получение результата (Assist\Request\OrderResult\OrderResultRequest)

Конфигурация соответствует параметрам запроса **/orderresult/orderresult.cfm**

[Документация "/orderresult/orderresult.cfm"](https://docs.assist.ru/pages/viewpage.action?pageId=5767463)

## Обработка http ответов содержащих ошибки

Коды HTTP ответов отличные от кода 200 обрабатываются handlerError(),
который выбрасывает соответствующее коду ответа исключение.

Исключение унаследованные от класса Assist\Exceptions\HttpException имеют методы getResponseHeaders()
и getResponseBody().

## Тестирование

Для тестирования SDK в проекте применяется библиотека pest

Запуск тестирования

```shell
$ ./vendor/bin/pest
```
