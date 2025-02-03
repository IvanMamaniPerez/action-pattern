<?php

namespace Classes;

use Interfaces\ActionInterface;
use Traits\ActionTrait;

abstract class Action  implements ActionInterface
{
    use ActionTrait;
}
