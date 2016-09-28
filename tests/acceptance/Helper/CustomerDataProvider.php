<?php

namespace PagarMe\Acceptance\Helper;

trait CustomerDataProvider
{
    public function getValidCustomerData()
    {
        return [
            'born_at'         => '13121988',
            'document_number' => '18152564000105',
            'email'           => uniqid('user') . '@email.com',
            'gender'          => 'M',
            'name'            => 'nome do cliente',
            'address' => [
                'city'          => 'sao paulo,',
                'complementary' => 'apto,',
                'country'       => 'Brasil,',
                'neighborhood'  => 'pinheiros,',
                'state'         => 'SP,',
                'street'        => 'rua qualquer,',
                'street_number' => '13,',
                'zipcode'       => '05444040,',
            ],
            'phone' => [
                'ddd'    => 11,
                'ddi'    => 55,
                'number' => 999887766,
            ]
        ];
    }
}
