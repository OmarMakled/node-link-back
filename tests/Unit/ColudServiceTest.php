<?php

namespace App\Tests\Unit;

use App\Contract\NodeServiceInterface;
use App\Service\Node\CloudService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CloudServiceTest extends WebTestCase
{
    public function testItInstanceOfNodeServiceInterface()
    {
        $kernel = static::bootKernel();

        $service = $kernel->getContainer()->get(CloudService::class);

        $this->assertInstanceOf(NodeServiceInterface::class, $service);
    }
}
