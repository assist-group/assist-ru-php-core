<?php

namespace Assist\Helpers;

class RequestHelper
{
    public const PARAM_BILL_NUMBER = 'Billnumber';
    public const PARAM_MERCHANT_ID = 'Merchant_ID';
    public const PARAM_LOGIN = 'Login';
    public const PARAM_PASSWORD = 'Password';
    public const PARAM_CURRENCY = 'Currency';
    public const PARAM_LANGUAGE = 'Language';
    public const PARAM_AMOUNT = 'Amount';
    public const PARAM_DELAY = 'Delay';
    public const PARAM_CHECKVALUE = 'Checkvalue';
    public const PARAM_URL_RETURN_OK = 'URL_RETURN_OK';
    public const PARAM_URL_RETURN_NO = 'URL_RETURN_NO';
    public const PARAM_PAYMENT_TYPE_UMONEY = 'YMPayment';
    public const PARAM_PAYMENT_TYPE_WEBMONEY = 'WMPayment';
    public const PARAM_PAYMENT_TYPE_QIWI = 'QIWIPayment';
    public const PARAM_PAYMENT_TYPE_APPLE_PAY = 'ApplePayPayment';
    public const PARAM_PAYMENT_TYPE_GOOGLE_PAY = 'GooglePayPayment';
    public const PARAM_PAYMENT_TYPE_MIR_PAY = 'MirPayPayment';
    public const PARAM_PAYMENT_TYPE_SAMSUNG_PAY = 'SamsungPayPayment';
    public const PARAM_PAYMENT_TYPE_SPB = 'FastPayPayment';
    public const PARAM_RECURRING_INDICATOR = 'RecurringIndicator';
    public const PARAM_RECURRING_MIN_AMOUNT = 'RecurringMinAmount';
    public const PARAM_RECURRING_MAX_AMOUNT = 'RecurringMaxAmount';
    public const PARAM_RECURRING_PERIOD = 'RecurringPeriod';
    public const PARAM_RECURRING_MAX_DATE = 'RecurringMaxDate';
    public const PARAM_ORDER_NUMBER = 'OrderNumber';
    public const PARAM_ORDER_AMOUNT = 'OrderAmount';
    public const PARAM_ORDER_CURRENCY = 'OrderCurrency';
    public const PARAM_ORDER_MAX_POINTS = 'OrderMaxPoints';
    public const PARAM_CHEQUE_ITEMS = 'ChequeItems';
    public const PARAM_CUSTOMER_NUMBER = 'CustomerNumber';
    public const PARAM_DISABLE_3DS = 'Disable3DS';
    public const PARAM_PREPAYMENT = 'Prepayment';
    public const PARAM_FIRSTNAME = 'Firstname';
    public const PARAM_LASTNAME = 'Lastname';
    public const PARAM_MIDDLENAME = 'Middlename';
    public const PARAM_EMAIL = 'Email';
    public const PARAM_MOBILE_PHONE = 'MobilePhone';
    public const PARAM_ADDRESS = 'Address';

    public const PATH_CREATE_PAYMENT = '/pay/payrequest.cfm';
    public const PATH_CANCEL = '/cancel/wscancel.cfm';
    public const PATH_CHARGE = '/charge/charge.cfm';
    public const PATH_ORDER_RESULT = '/orderresult/orderresult.cfm';
    public const PATH_ORDER_STATE = '/orderstate/orderstate.cfm';
    public const PATH_RECURRENT = '/recurrent/rp.cfm';
}
