<?php

namespace Mnemesong\LangKeeper;

interface LangKeeperInterface
{
    public function in(string $langMark): string;
}