# Action Pattern
This package implements a basic action pattern, based in command pattern using the Validator by default from laravel

### Features

1. Command for create action 
2. Config file for custom directory based in namespace configured and psr-4 standard


### Instructions
> Important!: Actually the package is in develop, should use with caution.

```bash 
composer require hachicode/action-pattern
```

```bash 
php artisan vendor:publish --tag=action-pattern-config
```

#### Commands

Generate command without validation
```bash 
php artisan make:action LoginAction
```

Generate command with validation
```bash 
php artisan make:action LoginValidatedAction --validated
```

Execute the command 
```php
use App\Actions\LoginValidatedAction;

...

LoginValidatedAction::run();

```

#### Structure the classes

##### Action simple
```php
namespace App\Actions;

use Hachicode\ActionPattern\Classes\Action;

class LoginAction extends Action
{
    /**
     * Execute the action
     *
     * @return mixed
     */
    public function handle(array $data) : mixed
    {
        // Set your logic
        return $data;
    }
}
```

##### Action validated

```php
<?php

namespace App\Actions;

use Illuminate\Support\Facades\Validator;
use Hachicode\ActionPattern\Classes\ActionValidated;

class LoginValidatedAction extends ActionValidated
{
    /**
    * @param array $data Is the validated result from method validation
    */
    public function handle(array $data): mixed
    {
        // Execute your logic with your data validated
        return $data;
    }

    public function validation(array $data): array
    {
        $validator = Validator::make($data, [
            // Set your rules
        ]);

        if ($validator->fails()) {
            throw new \Exception(message: 'Validation failed in {{class}} action' . 
            collect($validator->errors())->join(', '));
        }

        return $validator->validated();
    }
}

```