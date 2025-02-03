<?php

namespace Hachicode\ActionPattern\Interfaces;

interface ActionInterface
{
    /**
     * Handle the incoming data.
     * @param array $data The incoming data.
     * @return mixed The result of the action.
     */
    public function handle(array $data): mixed;
}
