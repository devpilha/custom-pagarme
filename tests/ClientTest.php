<?php

namespace PagarMe\SdkTest;

use PagarMe\Sdk\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
    **/
    public function mustSendRequest()
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

    /**
    * @expectedException PagarMe\Sdk\ClientException
    * @test
    **/
    public function mustReturnClientExeptionWhenGetRequestException()
    {
        $guzzleClientMock = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $requestMock = $this->getMock('GuzzleHttp\Message\RequestInterface');

        $guzzleClientMock->expects($this->once())
            ->method('createRequest')
            ->willReturn($requestMock);

        $guzzleClientMock->method('send')
            ->will(
                $this->throwException(
                    new \GuzzleHttp\Exception\RequestException(
                        'Exception',
                        $requestMock
                    )
                )
            );

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
