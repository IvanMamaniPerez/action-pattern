<?php

namespace Hachicode\ActionPattern\Classes;

use Hachicode\ActionPattern\Interfaces\ActionInterface;
use Hachicode\ActionPattern\Traits\ActionTrait;

abstract class Action  implements ActionInterface
{
    use ActionTrait;
}
