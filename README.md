# Assist.ru

PHP библиотека для работы с платежным интегратором Assist.ru

## Содержание

- [Установка](#установка)
- [Использование](#использование)
    - [Создание запроса](#создание-запроса)
    - [Получение данных ответа](#получение-данных-ответа)
    - [Подпись и Проверочное значение](#подпись-и-проверочное-значение)
        - [Подпись(Signature)](#подпись-signature)
        - [Проверочное значение(Checkvalue)](#проверочное-значение-checkvalue)
- [Конфигурация](#конфигурация)
    - [Базовая конфигурация SDK клиента](#базовая-конфигурация-sdk-клиента)
    - [Конфигурация запросов](#конфигурация-запросов)
        - [Обычный платёж (CreatePaymentRequest)](#обычный-платёж-assistrequestcreatepaymentcreatepaymentrequest)
        - [Подтверждение платежа (ChargeRequest)](#подтверждение-платежа-assistrequestcreatepaymentchargerequest)
        - [Рекуррентный платёж (RecurrentPaymentRequest)](#рекуррентный-платёж-assistrequestrecurrentpaymentrecurrentpaymentrequest)
        - [Отмена платежа (CancelRequest)](#отмена-платежа-assistrequestcreatepaymentcancelrequest)
        - [Получение результата (OrderResultRequest)](#получение-результата-assistrequestorderresultorderresultrequest)
        - [Получение статуса заказа (OrderStateRequest)](#получение-статуса-заказа-assistrequestorderresultorderstaterequest)
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

### Подпись и Проверочное значение

Для формирования Подписи (Signature) и Проверочного значения (Checkvalue) предоставляется хелпер
Assist\Helpers\SignHelper.

#### Подпись (Signature)

Для формирования подписи (Signature) в Assist\Helpers\SignHelper предусмотрен метод getSignature(array $params,
string $privateKey);

Метод принимает два параметра: массив $params включающий параметры для формирования подписи и строку $privateKey.

Обязательные параметры:

- Merchant_ID
- OrderNumber
- OrderAmount
- OrderCurrency

Необязательные параметры:

- OrderMaxPoints
- CustomerNumber
- Disable3DS
- Prepayment

Параметры в массиве $params передаются в формате ключ => значение.

#### Проверочное значение (Checkvalue)

Для формирования проверочного значения (Checkvalue) в Assist\Helpers\SignHelper предусмотрен метод getCheckValue(array
$params, string $salt);

Метод принимает два параметра: массив $params включающий параметры для формирования подписи и секретное слово $salt.

Обязательные параметры:

- Merchant_ID
- OrderNumber
- OrderAmount
- OrderCurrency

Необязательные параметры:

- OrderMaxPoints
- CustomerNumber
- Disable3DS
- Prepayment

Параметры в массиве $params передаются в формате ключ => значение.

## Конфигурация

### Базовая конфигурация SDK клиента

Список доступных параметров для класса Config

| Имя параметра | Описание                     | Значение по умолчанию              |
|---------------|------------------------------|------------------------------------|
| api_url       | основной URL API Ассист      | https://payments.paysecure.ru      |
| test_api_url  | Тестовый URL API Ассист      | https://payments.demo.paysecure.ru |
| test_mode     | Индикатор тестового режима   | false                              |
| lang          | Язык авторизационных страниц | RU                                 |
| merchant_id   | ID предприятия               | -                                  |
| login         | Логин предприятия            | -                                  |
| password      | Пароль предприятия           | -                                  |

### Конфигурация запросов

Пример конфигурации

```php
$config = [
    'Merchant_ID' => 'string',
    'OrderNumber' => 'string',
    'OrderAmount' => 0,
    'ChequeItems' => [
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

#### Получение статуса заказа (Assist\Request\OrderState\OrderStateRequest)

Конфигурация соответствует параметрам запроса **/orderstate/orderstate.cfm**

[Документация "/orderstate/orderstate.cfm"](https://docs.assist.ru/pages/viewpage.action?pageId=5767492)

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
