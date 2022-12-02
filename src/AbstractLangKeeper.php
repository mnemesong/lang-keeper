<?php

namespace Mnemesong\LangKeeper;

use Webmozart\Assert\Assert;

abstract class AbstractLangKeeper implements LangKeeperInterface
{
    /* @var string[] $data */
    /* @phpstan-ignore-next-line */
    protected array $data = [];

    /**
     * @param string[] $data
     */
    protected final function __construct(array $data) {
        Assert::isEmpty(array_diff(static::langs(), array_keys($data)), "Data contained in LangKeeper"
            . " not contains all required keys");
        Assert::allString($data, "Translatable data should be array of non-empty strings");
        $this->data = $data;
    }

    /**
     * @param string[] $data
     * @return static
     */
    public static function create(array $data): self
    {
        return new static($data);
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