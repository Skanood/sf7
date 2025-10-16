<?php
namespace App\Tests\E2E;

use Symfony\Component\Panther\PantherTestCase;

class HomepageTest extends PantherTestCase
{
    public function testHomepageLoads(): void
    {
        // Use your running Symfony server
        $client = static::createPantherClient([
            'external_base_uri' => 'http://127.0.0.1:8000', // match symfony serve port
            'browser' => PantherTestCase::CHROME       // use ChromeDriver
        ]);

        $client->request('GET', '/');

        $this->assertPageTitleContains('Welcome to Symfony');
        $this->assertSelectorTextContains('h1', 'Welcome');
    }
}
