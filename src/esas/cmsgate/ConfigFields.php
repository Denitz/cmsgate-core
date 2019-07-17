<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 10.08.2018
 * Time: 12:21
 */

namespace esas\cmsgate;


class ConfigFields
{
    private static $cmsKeys;

    /**
     * В некоторых CMS используются определенные соглашения по именования настроек модулей (чаще всего префиксы).
     * Данный метод позволяет использовать в core cms-зависимые ключи (например на client view, при формировании html и т.д.)
     * @param $localkey
     * @return mixed
     */
    protected static function getCmsRelatedKey($localkey)
    {
        if (self::$cmsKeys == null || !in_array($localkey, self::$cmsKeys)) {
            self::$cmsKeys[$localkey] = Registry::getRegistry()->getConfigWrapper()->createCmsRelatedKey($localkey);
        }
        return self::$cmsKeys[$localkey];
    }

    public static function sandbox()
    {
        return self::getCmsRelatedKey("sandbox");
    }

    public static function paymentMethodName()
    {
        return self::getCmsRelatedKey("payment_method_name");
    }

    public static function paymentMethodDetails()
    {
        return self::getCmsRelatedKey("payment_method_details");
    }

    public static function billStatusPending()
    {
        return self::getCmsRelatedKey("bill_status_pending");
    }

    public static function billStatusPayed()
    {
        return self::getCmsRelatedKey("bill_status_payed");
    }

    public static function billStatusFailed()
    {
        return self::getCmsRelatedKey("bill_status_failed");
    }

    public static function billStatusCanceled()
    {
        return self::getCmsRelatedKey("bill_status_canceled");
    }

}