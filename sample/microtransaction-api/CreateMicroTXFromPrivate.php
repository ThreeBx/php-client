<?php

// # Create and Send MicroTX Sample (server-side signing)
//
// This sample code demonstrate how you can create, sign and send a new microtransaction, as documented here at:
// <a href="http://dev.blockcypher.com/#microtransaction-endpoint">http://dev.blockcypher.com/#microtransaction-endpoint</a>
// API used: POST /v1/btc/main/txs/micro

require __DIR__ . '/../bootstrap.php';

// ### Create, Sign and Send a MicroTX (server-side signing)
try {
    $microTX = \BlockCypher\Client\MicroTXClient::sendWithPrivateKey(
        "2c2cc015519b79782bd9c5af66f442e808f573714e3c4dc6df7d79c183963cff", // private key
        "C4MYFr4EAdqEeUKxTnPUF3d3whWcPMz1Fi", // to address
        10000, // value (satoshis)
        $apiContexts['BCY.test']
    );
} catch (Exception $ex) {
    ResultPrinter::printError("Created and Send MicroTX", "MicroTX", null, null, $ex);
    exit(1);
}

ResultPrinter::printResult("Created and Send MicroTX", "MicroTX", $microTX->getHash(), null, $microTX);