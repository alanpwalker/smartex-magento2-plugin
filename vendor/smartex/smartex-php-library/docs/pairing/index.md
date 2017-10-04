##  Pairing
To create a pairing code, please open the API Tokens page within your
merchant account. You will next need to click the button labeled "Add
New Token". You will be given a Pairing Code that you will need in the
few steps.

Pairing {#pairing-1}
=======

Create an instance of the Smartex class.

``` {.sourceCode .php}
$smartex = new \Smartex\Smartex(
    array(
        'smartex' => array(
            'network'     => 'livenet', // testnet or livenet, default is livenet
            'public_key'  => getenv('HOME').'/.smartex/api.pub',
            'private_key' => getenv('HOME').'/.smartex/api.key',
        )
    )
);
```

Next you will need to get the client.

``` {.sourceCode .php}
// @var \Smartex\Client\Client
$client = $smartex->get('client');
```

You will next need to create a SIN based on your Public Key.

``` {.sourceCode .php}
// @var \Smartex\KeyManager
$manager   = $smartex->get('key_manager');
$publicKey = $manager->load($smartex->getContainer()->getParameter('smartex.public_key'));
$sin = new \Smartex\SinKey();
$sin->setPublicKey($publicKey);
$sin->generate();

// @var \Smartex\TokenInterface
$token = $client->createToken(
    array(
        'id'          => (string) $sin,
        'pairingCode' => 'Enter the Pairing Code',
        'label'       => 'Any label you want',
    )
);
```

The token that you get back will be needed to be sent with future
requests.
