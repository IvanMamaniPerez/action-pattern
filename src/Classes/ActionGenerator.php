<?php

namespace Classes;

class ActionGenerator
{
    public function __construct(
        public string $name,
        public bool $isValidated = false
    ) {}

    public static function make(string $name, bool $isValidated): self
    {
        return new static(
            name: $name,
            isValidated: $isValidated
        );
    }

    public function generate(string $name, bool $isValidated = false): void
    {
        $stub = $this->getStub(
            isValidated: $isValidated
        );
        $this->createFile($name, $stub);
    }

    public function getStub(bool $isValidated): string
    {
        return $isValidated ? $this->getValidatedStub() : $this->getActionStub();
    }

    public function getValidatedStub(): string
    {
        return file_get_contents(__DIR__ . '/../stubs/ActionValidated.stub');
    }

    public function getActionStub(): string
    {
        return file_get_contents(__DIR__ . '/../stubs/Action.stub');
    }

    public function createFile(string $name, string $stub): void
    {
        $path = $this->getPath($name);
        $this->createDirectory($path);

        $nameParts  = explode('/', $name);
        $nameParts  = array_map('ucwords', $nameParts);
        $studlyName = implode('\\', $nameParts);

        $namespace = config('action-pattern.generate-class.namespace');

        $namespace = $this->hasCustomNamespace($name)
            ? 'namespace ' . $namespace . '\\' .  $studlyName . ';'
            : 'namespace ' . $namespace . ';';

        $stub = str_replace(
            ['{{namespace}}', '{{class}}'],
            [$namespace, $name],
            $stub
        );

        file_put_contents($path, $stub);
    }

    public function getPath(string $name): string
    {
        $path = config('action-pattern.generate-class.namespace');
        $name = str_replace('\\', '/', $name);

        return $path . '/' . $name . '.php';
    }

    public function hasCustomNamespace(string $name): bool
    {
        return str_contains($name, '/');
    }

    public function createDirectory(string $path): void
    {
        $directory = dirname($path);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    }
}
