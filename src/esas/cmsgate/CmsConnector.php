<?php
/**
 * Created by IntelliJ IDEA.
 * User: nikit
 * Date: 13.04.2020
 * Time: 12:22
 */

namespace esas\cmsgate;



use esas\cmsgate\utils\Logger;
use esas\cmsgate\wrappers\OrderWrapper;

abstract class CmsConnector
{

    /**
     * @var Logger
     */
    protected $logger;

    public function __construct()
    {
        $this->logger = Logger::getLogger(get_class($this));
    }

    public abstract function createSystemSettingsWrapper();


    public abstract function createCommonConfigForm($managedFields);

    /**
     * По локальному id заказа возвращает wrapper
     * @param $orderId
     * @return OrderWrapper или null
     */
    public abstract function createOrderWrapperByOrderId($orderId);

    /**
     * По локальному номеру заказа (может отличаться от id) возвращает wrapper.
     * Должен быть переопределен если в CMS есть разница между orderId и orderNumber
     * @param $orderNumber
     * @return OrderWrapper или null
     */
    public function createOrderWrapperByOrderNumber($orderNumber){
        return $this->createOrderWrapperByOrderId($orderNumber);
    }

    /**
     * Возвращает OrderWrapper для текущего заказа текущего пользователя
     * @return OrderWrapper или null
     */
    public abstract function createOrderWrapperForCurrentUser();

    /**
     * По номеру транзакции внешней система возвращает wrapper
     * @param $extId
     * @return OrderWrapper или null
     */
    public abstract function createOrderWrapperByExtId($extId);

    public abstract function createConfigStorage();

    public abstract function createLocaleLoader();
}