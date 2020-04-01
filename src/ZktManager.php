<?php

namespace Huayu;
/**
 * Created by IntelliJ IDEA.
 * User: hangzhu
 * Date: 2019/7/17
 * Time: 7:51 PM
 */

use cn\hy\zkt\thrift\ZktThriftServiceClient;
use Exception;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

class ZktManager
{
    const $host     =   '';
    const $port     =   '';
    public function __construct($host, $port){
        static::$host   =   $host;
        static::$port   =   $host;
    }

    public function doThriftService($method, $params)
    {
        try {
            $socket     =   new TSocket(static::$host, static::$port);
            $transport  =   new TBufferedTransport($socket,1024,1024);
            $protocol   =   new TBinaryProtocol($transport);
            $transport->open();
            $client     =   new ZktThriftServiceClient($protocol);
            $result     =   call_user_func_array(array($client, $method), $params);
            $transport -> close();
            if(is_object($result)){
                $result =   json_decode(json_encode($result),true);
            }else if(is_array($result)){
                foreach($result as &$vo){
                    $vo =   is_object($vo)?json_decode(json_encode($vo),true):$vo;
                }
            }else{
                $result =   json_decode($result,true)!==false?json_decode($result,true):$result;
            }
            return $result;
        } catch (TException $tx) {
            $transport -> close();
            return [
                'code' => 400,
                'msg' => $tx->getMessage()
            ];
        } catch (Exception $e){
            $transport -> close();
            return [
                'code' => 400,
                'msg' => $e->getMessage()
            ];
        }
    }
}
