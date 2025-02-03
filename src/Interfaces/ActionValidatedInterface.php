<?php

namespace Hachicode\ActionPattern\Interfaces;

interface ActionValidatedInterface extends ActionInterface
{
    /**
     * Validate the incoming data.
     * @param array $data The incoming data.
     * @return array The validated data.
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validation(array $data): array;
}
