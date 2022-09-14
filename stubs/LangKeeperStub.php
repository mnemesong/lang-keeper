<?php

namespace Mnemesong\LangKeeperStubs;

use Mnemesong\LangKeeper\AbstractLangKeeper;

final class LangKeeperStub extends AbstractLangKeeper
{
    const RU = 'ru';
    const EN = 'en';

    /**
     * @return string
     */
    public static function default(): string
    {
        return self::EN;
    }

    /**
     * @return string[]
     */
    public static function langs(): array
    {
        return [
            self::EN,
            self::RU,
        ];
    }
}