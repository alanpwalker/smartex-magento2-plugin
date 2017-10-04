##  Keypairs
All keys implement the KeyInterface and MUST be able to be serialized
and unserialized.

Generating Keypairs
===================

Private
-------

``` {.sourceCode .php}
$priv = new \Smartex\PrivateKey();
$priv->generate();
```

Public
------

``` {.sourceCode .php}
$pub = new \Smartex\PublicKey();
$pub->setPrivateKey($priv);
$pub->generate();
```

SIN
---

``` {.sourceCode .php}
$sin = new \Smartex\SinKey();
$sin->setPublicKey($pub);
$sin->generate();
```

Storing Keys
============

Keys can be stored using the filesystem or you can easily make your own
storage service.

Filesystem
----------

Keys can be store on the filesystem using the following code. Keys MUST
have already been generated.

``` {.sourceCode .php}
$privateKey = new \Smartex\PrivateKey('/path/to/private.key');
$privateKey->generate();

$keyManager = new \Smartex\KeyManager(new \Smartex\Storage\FilesystemStorage());
$keyManager->persist($privateKey);
```

The key can now be found at /path/to/private.key. Loading the key is
just as easy.

``` {.sourceCode .php}
$key = $manager->load('/path/to/private.key');
```

Encrypted on Filesystem
-----------------------

``` {.sourceCode .php}
$privateKey = new \Smartex\PrivateKey('/path/to/private.key');
$privateKey->generate();

$password   = 'qwerty12345';
$keyManager = new \Smartex\KeyManager(new \Smartex\Storage\EncryptedFilesystemStorage($password));
$keyManager->persist($privateKey);
```

Cookbook
========
* [Creating your own storage class](https://github.com/smartexio/smartex-php-library/blob/master/docs/keypairs/storage.md)
