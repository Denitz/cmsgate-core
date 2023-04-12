<?php


namespace esas\cmsgate\utils\htmlbuilder\hro\typography;


use esas\cmsgate\utils\htmlbuilder\hro\HRO;

interface DescriptionListHRO extends HRO
{
    /**
     * @param int $dtDefaultSize
     * @return DescriptionListHRO
     */
    public function setDtDefaultSize($dtDefaultSize);

    /**
     * @param int $ddDefaultSize
     * @return DescriptionListHRO
     */
    public function setDdDefaultSize($ddDefaultSize);

    /**
     * @param $dtText
     * @param null $colX
     * @return DescriptionListHRO
     */
    public function addDt($dtText, $colX = null);

    /**
     * @param $dtText
     * @param null $colX
     * @return DescriptionListHRO
     */
    public function addDd($dtText, $colX = null);
}