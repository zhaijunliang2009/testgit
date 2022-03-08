<?php
/**
 * Created By PhpStorm
 * @Date: 2022/3/8
 * @Time: 11:26
 * @Author: 烽火连城 <zhaijunliang@vchangyi.com>
 * @File: produce.php
 */


require '../vendor/autoload.php';

date_default_timezone_set('PRC');

/* 创建一个配置实例 */
$config = \Kafka\ProducerConfig::getInstance();

/* Topic的元信息刷新的间隔 */
$config->setMetadataRefreshIntervalMs(10000);

/* 设置broker的地址 */
$config->setMetadataBrokerList('192.168.56.1:9092');

/* 设置broker的代理版本 */
$config->setBrokerVersion('1.0.0');

/* 只需要leader确认消息 */
$config->setRequiredAck(1);

/* 选择异步 */
$config->setIsAsyn(false);

/* 每500毫秒发送消息 */
$config->setProduceInterval(500);

/* 创建一个生产者实例 */
$producer = new \Kafka\Producer();

for ($i = 0; $i < 100; $i++) {
    $producer->send([
        [
            'topic' => 'test',
            'value' => 'test' . $i,
        ],
    ]);
}
