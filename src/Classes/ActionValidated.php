<?php

namespace Classes\Actions;

use Interfaces\ActionValidatedInterface;
use Traits\ActionTrait;

abstract class ActionValidated  implements ActionValidatedInterface {
    use ActionTrait;
}