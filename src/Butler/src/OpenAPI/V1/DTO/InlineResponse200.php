<?php
declare(strict_types=1);

namespace Butler\OpenAPI\V1\DTO;

use Articus\DataTransfer\Annotation as DTA;
use OpenAPI\DataTransfer\Annotation as ODTA;
use ReflectionProperty;
use Traversable;

/**
 * @property \Butler\OpenAPI\V1\DTO\InlineResponse200Data $data
 */
class InlineResponse200 implements \IteratorAggregate, \JsonSerializable
{
    /**
     * @ODTA\Data(field="data", required=false)
     * @DTA\Strategy(name="Object", options={"type":\Butler\OpenAPI\V1\DTO\InlineResponse200Data::class})
     * @DTA\Validator(name="TypeCompliant", options={"type":\Butler\OpenAPI\V1\DTO\InlineResponse200Data::class})
     * @var \Butler\OpenAPI\V1\DTO\InlineResponse200Data
     */
    private \Butler\OpenAPI\V1\DTO\InlineResponse200Data $data;

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
        return ['data'];
    }

    public function getData(): \Butler\OpenAPI\V1\DTO\InlineResponse200Data
    {
        return $this->data;
    }

    public function setData(\Butler\OpenAPI\V1\DTO\InlineResponse200Data $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function hasData(): bool
    {
        return $this->isInitialized('data');
    }

    private function isInitialized(string $property): bool
    {
        $rp = new ReflectionProperty(self::class, $property);
        $rp->setAccessible(true);
        return $rp->isInitialized($this);
    }
}
