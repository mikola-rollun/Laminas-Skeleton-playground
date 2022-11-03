<?php
declare(strict_types=1);

namespace Butler\OpenAPI\V1\DTO;

use Articus\DataTransfer\Annotation as DTA;
use OpenAPI\DataTransfer\Annotation as ODTA;
use ReflectionProperty;
use Traversable;

/**
 * @property string $name
 * @property string $dateGreeted
 */
class Greet implements \IteratorAggregate, \JsonSerializable
{
    /**
     * @ODTA\Data(field="name", required=false)
     * @DTA\Validator(name="Type", options={"type":"string"})
     * @var string
     */
    private string $name;
    /**
     * @ODTA\Data(field="date_greeted", required=false)
     * @DTA\Validator(name="Type", options={"type":"string"})
     * @var string
     */
    private string $dateGreeted;

    public function __get($name)
    {
        return $this->isInitialized($name) ? $this->{$name} : null;
    }

    public function __set(string $name, $value): void
    {
        $this->{$name} = $value;
    }

    public function __isset(string $name): bool
    {
        return $this->isInitialized($name) && isset($this->{$name});
    }

    public function __unset(string $name): void
    {
        unset($this->{$name});
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->toArray());
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        $result = [];
        foreach (self::getAllPropertyNames() as $propertyName) {
            if ($this->isInitialized($propertyName)) {
                $result[$propertyName] = $this->{$propertyName};
            }
        }
        return $result;
    }

    private static function getAllPropertyNames(): array
    {
        return ['name', 'dateGreeted'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function hasName(): bool
    {
        return $this->isInitialized('name');
    }

    public function getDateGreeted(): string
    {
        return $this->dateGreeted;
    }

    public function setDateGreeted(string $dateGreeted): self
    {
        $this->dateGreeted = $dateGreeted;
        return $this;
    }

    public function hasDateGreeted(): bool
    {
        return $this->isInitialized('dateGreeted');
    }

    private function isInitialized(string $property): bool
    {
        $rp = new ReflectionProperty(self::class, $property);
        $rp->setAccessible(true);
        return $rp->isInitialized($this);
    }
}
