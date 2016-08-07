<?php
namespace CrCms\Log\Interfaces;
use CrCms\CrCmsInterface;

interface LogInterface extends CrCmsInterface
{
    public function log(array $data);
}


