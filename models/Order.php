<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\OrderDetail;
use app\models\Product;
use app\models\Category;

class Order extends ActiveRecord
{
    const SCENARIO_ADD = 'add';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_SEND = 'send';

    const CREATEORDER = 0;
    const CHECKORDER = 100;
    const PAYFAILED = 201;
    const PAYSUCCESS = 202;
    const SENDED = 220;
    const RECEIVED = 260;
 
    public static $status = [
        self::CREATEORDER => '订单初始化',
        self::CHECKORDER  => '待支付',
        self::PAYFAILED   => '支付失败',
        self::PAYSUCCESS  => '等待发货',
        self::SENDED      => '已发货',
        self::RECEIVED    => '订单完成',
    ];

    public $products;
    public $zhstatus;
    public $username;
    public $address;
    public $email;
    public $telephone;

    public function rules()
    {
        return [
            [['userid', 'status'], 'required', 'on' => [self::SCENARIO_ADD]],
            [['addressid', 'expressid', 'amount', 'status'], 'required', 'on' => [self::SCENARIO_UPDATE]],
            ['expressno', 'required', 'message' => '请输入快递单号', 'on' => self::SCENARIO_SEND],
            ['createtime', 'safe', 'on' => [self::SCENARIO_ADD]],
        ];
    }

    public static function tableName()
    {
        return "{{%order}}";
    }

    public function attributeLabels()
    {
        return [
            'expressno' => '快递单号',
        ];
    }

    public static function getDetail($orders)
    {
        foreach($orders as $order){
            $order = self::getData($order);
        }
        return $orders;
    }

    public static function getData($order)
    {
        $details = OrderDetail::find()->where('orderid = :oid', [':oid' => $order->orderid])->all();
        $products = [];
        foreach($details as $detail) {
            $product = Product::find()->where('productid = :pid', [':pid' => $detail->productid])->one();
            if (empty($product)) {
                continue;
            }
            $product->num = $detail->productnum;
            $products[] = $product;
        }
        $order->products = $products;
        $user = User::find()->where('userid = :uid', [':uid' => $order->userid])->one();
        if (!empty($user)) {
            $order->username = $user->username;
        }
        $order->address = Address::find()->where('addressid = :aid', [':aid' => $order->addressid])->one();
        if (empty($order->address)) {
            $order->address = "";
            $order->email = "";
            $order->telephone = "";
        } else {
            $order->email = $order->address->email;
            $order->telephone = $order->address->telephone;
            $order->address = $order->address->address;
        }
        $order->zhstatus = self::$status[$order->status];
        return $order;
    }

    public static function getProducts($userid)
    {
        $orders = self::find()->where('status > 0 and userid = :uid', [':uid' => $userid])->orderBy('createtime desc')->all();
        foreach($orders as $order) {
            $details = OrderDetail::find()->where('orderid = :oid', [':oid' => $order->orderid])->all();
            $products = [];
            foreach($details as $detail) {
                $product = Product::find()->where('productid = :pid', [':pid' => $detail->productid])->one();
                if (empty($product)) {
                    continue;
                }
                $product->num = $detail->productnum;
                $product->price = $detail->price;
                $product->cate = Category::find()->where('cateid = :cid', [':cid' => $product->cateid])->one()->title;
                $products[] = $product;
            }
            $order->zhstatus = self::$status[$order->status];
            $order->products = $products;
        }
        return $orders;
    }


}
