<?php
/**
 *作者：誓言
 *日期：2020-12-21
 */
header('Content-type:text/html; Charset=utf-8');
require_once 'ALiH5Pay.php';
/*** 请填写以下配置信息 ***/
$appid = 'xxxxx';  //https://open.alipay.com 账户中心->密钥管理->开放平台密钥，填写添加了电脑网站支付的应用的APPID
$returnUrl = 'http://www.xxx.com/alipay/return.php';     //付款成功后的同步回调地址
$notifyUrl = 'http://www.xxx.com/alipay/notify.php';     //付款成功后的异步回调地址
$outTradeNo = uniqid();     //你自己的商品订单号
$payAmount = 0.01;          //付款金额，单位:元
$orderName = '支付测试';    //订单标题
$signType = 'RSA2';      //签名算法类型，支持RSA2和RSA，推荐使用RSA2
$rsaPrivateKey='xxxxx';    //商户私钥，填写对应签名算法类型的私钥，如何生成密钥参考：https://docs.open.alipay.com/291/105971和https://docs.open.alipay.com/200/105310
/*** 配置结束 ***/
$aliPay = new ALiH5Pay();
$aliPay->setAppid($appid);
$aliPay->setReturnUrl($returnUrl);
$aliPay->setNotifyUrl($notifyUrl);
$aliPay->setRsaPrivateKey($rsaPrivateKey);
$aliPay->setTotalFee($payAmount);
$aliPay->setOutTradeNo($outTradeNo);
$aliPay->setOrderName($orderName);
$sHtml = $aliPay->doPay();
echo $sHtml;