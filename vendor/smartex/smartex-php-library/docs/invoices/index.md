##  Invoices
Creating an invoice allows you to accept payment in ether. You can
also query the Smartex's system to find out more information about the
invoice that you created.

Working with an Invoice Object
==============================

Every invoice can have lots of data that can be used and sent to Smartex
as reference. Feel free to take a look at `Smartex\InvoiceInterface` for
code comments on what each method returns and a more in depth
explanation.

First we need to create a new Invoice object.

``` {.sourceCode .php}
$invoice = new \Smartex\Invoice();
```

> **note**
>
> You can also set an Order ID that you can use to reference Smartex's
> invoice with the invoice in your order system.
>
> `$invoice->setOrderId('You Order ID here')`

To make an invoice valid, it needs a price and a currency. You can see a
list of currencies supported by viewing the [Smartex Exchange
Rates](https://smartex.io/currencies) page on our website.

For this example, we will use `USD` as our currency of choice.

``` {.sourceCode .php}
$invoice->setCurrency(new \Smartex\Currency('USD'));
```

Now the invoice knows what currency to use. Next it needs a price.

``` {.sourceCode .php}
$item = new \Smartex\Item();
$item->setPrice('10.00');
$invoice->setItem($item);
```

The only thing left is to now send the invoice off to Smartex for the
invoice to be created and for you to send it to your customer.

Creating an Invoice
===================

Create an instance of the Smartex class.

``` {.sourceCode .php}
$smartex = new \Smartex\Smartex(
    array(
        'smartex' => array(
            'network'     => 'testnet', // testnet or livenet, default is livenet
            'public_key'  => getenv('HOME').'/.smartex/api.pub',
            'private_key' => getenv('HOME').'/.smartex/api.key',
        )
    )
);
```

> **warning**
>
> If you are running a command line script as a different user, you
> could get a different \$HOME directory. Please be aware. Also the keys
> are chmod'ed when written to disk so the private key can only be read
> by the owner.

Next you will need to get the client.

``` {.sourceCode .php}
// @var \Smartex\Client\Client
$client = $smartex->get('client');
```

Inject your `TokenObject` into the client.

``` {.sourceCode .php}
$token = new \Smartex\Token();
$token->setToken('Insert Token Here');
$client->setToken($token);
```

Now all you need to do is send the `$invoice` object to Smartex.

``` {.sourceCode .php}
$client->createInvoice($invoice);
```

The code will update the `$invoice` object and you will be able to
forward your customer to Smartex's fullscreen invoice.

``` {.sourceCode .php}
header('Location: ' . $invoice->getUrl());
```

Instant Payment Notifications (IPN)
===================================

You can enabled IPNs for an invoice by setting the notificationUrl.
Example:

``` {.sourceCode .php}
$invoice->setNotificationUrl('https://example.com/smartex/ipn');
```

By adding the Notification URL, it will receive an IPN when the invoice
is updated. For more information on IPNs, please see the documentation
on Smartex's website.
