<?php

namespace Mnemesong\LangKeeperTestUnit;

use Mnemesong\LangKeeperStubs\LangKeeperStub;
use PHPUnit\Framework\TestCase;

class LangKeeperTest extends TestCase
{
    /**
     * @return void
     */
    public function testStub(): void
    {
        $this->assertEquals(['en', 'ru'], LangKeeperStub::langs());
        $this->assertEquals('en', LangKeeperStub::default());
    }

    /**
     * @return void
     */
    public function testBasics(): void
    {
        $lkObj = LangKeeperStub::create([
            'ru' => 'слово',
            'en' => 'word',
        ]);
        $this->assertEquals('слово', $lkObj->in(LangKeeperStub::RU));
        $this->assertEquals('word', $lkObj->in(LangKeeperStub::EN));
    }

    /**
     * @return void
     */
    public function testCreateException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $lkObj = LangKeeperStub::create([
            'ru' => 'слово',
        ]);
    }

    /**
     * @return void
     */
    public function testGetException()
    {
        $lkObj = LangKeeperStub::create([
            'ru' => 'слово',
            'en' => 'word',
        ]);
        $this->expectException(\InvalidArgumentException::class);
        $str = $lkObj->in('ua');
    }
}