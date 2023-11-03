<?php

require_once './autoload.php';

use Class\DBShop;
use Class\DBProduct;
use Class\DBOrder;

$shop = new DBShop();
$shop->createTable();
$shop->insert(['name', 'address'], ['Ситилинк', 'Московский проспект, 15']);
$shop->insert(['name', 'address'], ['Мвидео', 'Шлиссельбургский проспект, 20']);
$shop->insert(['name', 'address'], ['Эльдорадо', 'Рыбацкий проспект, 1']);
$shop->insert(['name', 'address'], ['ДНС', 'Караваевская улица, 7']);
$shop->insert(['name', 'address'], ['Холодильник', 'Невский проспект, 100']);

$shop1 = $shop->find(1);
foreach ($shop1 as $item) {
    echo "id: $item[id] name: $item[name] address: $item[address]";
}

$shop->update(1, ['name' => 'Ситилинк', 'address' => 'Московский проспект, 16']);
var_dump($shop->delete(3));

$product = new DBProduct();
$product->createTable();
$product->insert(['name', 'price', 'count', 'shop_id'], ['ноутбук', 70000, 2, 1]);
$product->insert(['name', 'price', 'count', 'shop_id'], ['смартфон', 30000, 5, 2]);
$product->insert(['name', 'price', 'count', 'shop_id'], ['монитор', 20000, 3, 3]);
$product->insert(['name', 'price', 'count', 'shop_id'], ['телевизор', 30000, 3, 4]);
$product->insert(['name', 'price', 'count', 'shop_id'], ['клавиатура', 2000, 10, 5]);

$product1 = $product->find(1);

foreach ($product1 as $item) {
    echo "id: $item[id] name: $item[name] price: $item[price]";
}

$product->update(1, ['price' => '65000']);

$order = new DBOrder();
$order->createTable();

$order->insert(['created_at', 'shop_id', 'client_id'], ['2023-10-20 10:10:00', 1, 1]);
$order->insert(['created_at', 'shop_id', 'client_id'], ['2023-10-21 10:10:00', 2, 2]);
$order->insert(['created_at', 'shop_id', 'client_id'], ['2023-10-22 10:10:00', 3, 3]);
$order->insert(['created_at', 'shop_id', 'client_id'], ['2023-10-23 10:10:00', 4, 4]);
$order->insert(['created_at', 'shop_id', 'client_id'], ['2023-10-24 10:10:00', 5, 5]);

$order->delete(5);
