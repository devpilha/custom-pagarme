<?php

namespace PagarMe\SdkTest;

use PagarMe\Sdk\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
    **/
    public function shouldSendRequest()
    {
        $guzzleClientMock = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $guzzleClientMock->expects($this->once())
            ->method('createRequest')
            ->willReturn($this->getMock('GuzzleHttp\Message\RequestInterface'));

        $guzzleClientMock->expects($this->once())->method('send');

        $request = $this->getMockBuilder('PagarMe\Sdk\Request')
            ->disableOriginalConstructor()
            ->getMock();

        $request->method('getMethod')->willReturn('POST');
        $request->method('getPath')->willReturn('test');
        $request->method('getPayload')->willReturn(['content' => 'test']);

        $client = new Client($guzzleClientMock, 'myApiKey', 'myEncryptionKey');

        $client->send($request);
    }
}
