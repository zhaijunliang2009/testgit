<?php
/**
 * Created By PhpStorm
 * @Date: 2022/3/8
 * @Time: 11:26
 * @Author: 烽火连城 <zhaijunliang@vchangyi.com>
 * @File: consumer.php
 */


require '../vendor/autoload.php';

date_default_timezone_set('PRC');

$config = \Kafka\ConsumerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('192.168.56.1:9092');
$config->setGroupId('test');
$config->setBrokerVersion('1.0.0');
$config->setTopics(['test']);

$consumer = new \Kafka\Consumer();
$consumer->start(function ($topic, $part, $message) {
    var_dump($message);
});