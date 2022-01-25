<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;
use App\Models\Visitors;
use GuzzleHttp\Client;

/**
 * 书籍访问记录
 */

trait BooksLookTraits
{
    /**
     * 记录日志
     * $book 书籍信息 ip 来源ip page 页面
     *
     */
    public function BookLogStore($result){

        $server = $result['server'];// 来访信息
        $book = $result['book'];// 书籍信息

        /**
         * 入库数据
         */
        $data = [
            'visitor' => $server['REMOTE_ADDR'],// ip 地址
            'page' => $server['REQUEST_URI'],// 访问页面
            'link_id' => $book->id,// 关联id
            'type' => 'book', // 类型 书籍
            'created_at' => date('Y-m-d H:i:s'),// 来访时间
        ];

        $visitors = new Visitors();

        $visitors->fill($data);

        $address = $this->ipAddress($server['REMOTE_ADDR']);// 获取地区

        // 地区不为空的话
        if(!empty($address) && $address['status'] != 382) {
            $visitors->area = $address['result'];

        }else{
            $visitors->area = $server['REMOTE_ADDR'];
        }

        /**
         * 来访 IP 是否存在
        */
        if($time = $visitors->whereDate('created_at', date('Y-m-d'))->where('visitor', $server['REMOTE_ADDR'])->count()) {

            $visitors->time = $time + 1;// 如果存在 则来访次数 +1

        }

        // 数据入库
        $visitors->save();

    }

    /**
     * 获取 IP 地区
     *
     */
    public function ipAddress($ip)
    {
        $url = "https://apis.map.qq.com/ws/location/v1/ip";

        $client = new Client(); //初始化客户端

        $response = $client->get($url, [
            'query' => [
                    'ip' => $ip,
                    'key' => 'OP5BZ-FEMC3-GKL3Y-3FATG-JBCXZ-T2FMG',
            ],
            'output' => 'json',
            'timeout' => 2.0 //设置请求超时时间
        ]);

        // 响应判断
        if($response->getStatusCode() === 200) {

            $body = $response->getBody();
            $remainingBytes = $body->getContents();
            return json_decode($remainingBytes,true);

        }else{

            return [];
        }
    }
}
