<?php

namespace Mnemesong\LangKeeper;

use Webmozart\Assert\Assert;

abstract class AbstractLangKeeper
{
    /* @var string[] $data */
    /* @phpstan-ignore-next-line */
    protected array $data = [];

    protected final function __construct() {}

    /**
     * @param string[] $data
     * @return static
     */
    public static function create(array $data): self
    {
        Assert::isEmpty(array_diff(static::langs(), array_keys($data)), "Data contained in LangKeeper"
            . " not contains all required keys");
        Assert::allStringNotEmpty($data, "Translatable data should be array of non-empty strings");
        $result = new static();
        $result->data = $data;
        return $result;
    }

    /**
     * @param string $langMark
     * @return string
     */
    public function in(string $langMark): string
    {
        Assert::inArray($langMark, static::langs(), "Get incorrect lang-mark");
        return $this->data[$langMark];
    }

    /**
     * @return string[]
     */
    abstract public static function langs(): array;

    /**
     * @return string
     */
    abstract public static function default(): string;
}