<?php

namespace Hachicode\ActionPattern\Exceptions;

class ActionException extends \Exception
{
    public function __construct($message = "Action failed.", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}