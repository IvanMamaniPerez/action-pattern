<?php

namespace Hachicode\ActionPattern\Classes;

use Hachicode\ActionPattern\Interfaces\ActionValidatedInterface;
use Hachicode\ActionPattern\Traits\ActionTrait;

abstract class ActionValidated  implements ActionValidatedInterface {
    use ActionTrait;
}