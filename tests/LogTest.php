<?php

namespace Code\Tests;

use Code\Log;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class LogTest extends TestCase
{
    protected function assertPreConditions(): void
    {
        $this->assertTrue(class_exists(Log::class));
    }

    public function testSeLogEFeitoComSucesso()
    {
        $log = new Log();
        $this->assertEquals(
            'Logando dados no sistema: Testando Save de Log no Sistema',
            $log->log('Testando Save de Log no Sistema')
        );
    }
}
