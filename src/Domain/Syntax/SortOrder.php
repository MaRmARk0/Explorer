<?php

declare(strict_types=1);

namespace JeroenG\Explorer\Domain\Syntax;

use Webmozart\Assert\Assert;

class SortOrder
{
    public const ASCENDING = 'asc';

    public const DESCENDING = 'desc';
    
    public const MISSING_FIRST = '_first';
    
    public const MISSING_LAST = '_last';
    
    private string $order;
    
    private string $missing;

    private function __construct(string $order, string $missing )
    {
        $this->order = $order;
        $this->missing = $missing;
        Assert::inArray($order, [self::ASCENDING, self::DESCENDING]);
        Assert::inArray($missing, [self::MISSING_FIRST, self::MISSING_LAST]);
    }
    
    public static function for(string $order = self::ASCENDING, string $missing = self::MISSING_LAST): self
    {
        return new self($order,$missing);
    }
    
    public function asArray(): array
    {
        return [
            'missing' => $this->missing,
            'order' => $this->order
        ];
    }
}
