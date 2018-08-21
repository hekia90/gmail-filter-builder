<?php

namespace Opdavies\Tests\GmailFilterBuilder\Model;

use Opdavies\GmailFilterBuilder\Service\Addresses;
use PHPUnit\Framework\TestCase;

/**
 * Test loading addresses from a separate file.
 *
 * @coversDefaultClass \Opdavies\GmailFilterBuilder\Service\Addresses
 */
class AddressesTest extends TestCase
{
    /**
     * @covers ::load
     */
    public function testLoad()
    {
        $this->assertEquals([
            'foo@example.com',
            'bar@example.com'
        ], FakeAddresses::load());
    }
}

class FakeAddresses extends Addresses
{
    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return __DIR__ . '/../../stubs/addresses/';
    }
}
