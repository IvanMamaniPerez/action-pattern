<?php

namespace Hachicode\ActionPattern\Classes;

use Interfaces\ActionInterface;
use Traits\ActionTrait;

abstract class Action  implements ActionInterface
{
    use ActionTrait;
}
