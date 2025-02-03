<?php

namespace Hachicode\ActionPattern\Traits;

use Hachicode\ActionPattern\Exceptions\ActionException;
use Hachicode\ActionPattern\Interfaces\ActionValidatedInterface;

trait ActionTrait
{
    /**
     * Make a new instance of the action
     * @return static
     */
    public static function make(): static
    {
        return app(static::class);
    }

    /**
     * Execute the action
     * @param array $data
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     * @throws ActionException
     */
    public static function run($data): mixed
    {
        $instance = static::make();

        if ($instance instanceof ActionValidatedInterface) {
            if (method_exists($instance, 'validation')) {
                $data = $instance->validation($data);
            } else {

                $e = new ActionException(
                    message: 'The validation method is not implemented'
                );

                report($e);

                throw $e;
            }
        }

        /* if (method_exists($instance, 'validation')) {
            $data = $instance->validation($data);
        } */

        return $instance->handle($data);
    }
}
