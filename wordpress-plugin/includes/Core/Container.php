<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

use Closure;
use RuntimeException;

final class Container
{
    /**
     * @var array<string, Closure>
     */
    private array $bindings = [];

    /**
     * @var array<string, object>
     */
    private array $instances = [];

    public function singleton(string $id, Closure $factory): void
    {
        $this->bindings[$id] = $factory;
    }

    public function has(string $id): bool
    {
        return isset($this->bindings[$id]);
    }

    public function get(string $id): object
    {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        if (!$this->has($id)) {
            throw new RuntimeException(sprintf('Service "%s" is not registered.', $id));
        }

        $instance = ($this->bindings[$id])($this);

        if (!is_object($instance)) {
            throw new RuntimeException(sprintf('Service "%s" must return an object.', $id));
        }

        $this->instances[$id] = $instance;

        return $instance;
    }
}