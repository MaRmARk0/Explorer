<?php

declare(strict_types=1);

namespace JeroenG\Explorer\Domain\Syntax;

use Webmozart\Assert\Assert;

class Sort
{
    public const ASCENDING = 'asc';

    public const DESCENDING = 'desc';

    private string $field;

    private string|array $order;

    public function __construct(string $field, string|SortOrder $order = self::ASCENDING)
    {
        
        $this->field = $field;
        
        if (is_string($order)){
            $this->order = $order;
            Assert::inArray($order, [self::ASCENDING, self::DESCENDING]);
        } else {
            $this->order = $order->asArray();
        }
    }

    public function build(): array
    {
        return [$this->field => $this->order];
    }
}
