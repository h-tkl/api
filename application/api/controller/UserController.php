<?php

namespace app\api\controller;

use think\Controller;
use think\Db;
use think\Request;

class UserController extends Controller
{
    /**登录
     *1
     * @param $username
     * @param $pwd
     * @return \think\response\Json
     */
    public function login($username,$pwd){
        $user=Db::name("user")->where("username",$username)->find();
        //判断是否存在
        if($user && password_verify($pwd,$user["password_hash"])){
        return json_api($data=[
            "id"=>$user["id"],
            "userName"=>$user["username"],
            "userIcon"=>"https://www.baidu.com/img/bd_logo1.png?where=super",
            "waitPayCount"=>1,
            "waitReceiveCount"=>1,
            "userLevel"=>2
        ]);
        }else{
            return json_api(null, false, "账号密码错误");
        }

    }

    /** 2
     * 首页banner
     * @param $adKind
     * @return \think\response\Json
     *
     */
    public function banner($adKind){
       $data=[
                 [
                     "id"=>1,
                   "type"=>1,
                   "adUrl"=>"https://www.baidu.com/img/bd_logo1.png?where=super",
                   "webUrl"=>"",
                   "adKind"=>1
                ]
            ];
       return json_api($data);

    }

    /**3
     * 秒杀商品
     * @return \think\response\Json
     *
     */
    public function seckill(){

        $data=[
            "total"=>11,
            "rows"=>[
                [
                "allPrice"=>222,
                "pointPrice"=>11,
                "iconUrl"=>"https://www.baidu.com/img/bd_logo1.png?where=super",
                "timeLeft"=>20,
                "type"=>1,
                "productId"=>11
                ]
            ]
        ];
        return json_api($data);
    }

    /**4
     * 猜你喜欢
     * @return \think\response\Json
     *
     */
    public function getYourFav(){
    $data=[
            "total"=>11,
            "rows"=>[
                 [
               "price"=>22,
               "name"=>"李光明",
               "iconUrl"=>"https://www.baidu.com/img/bd_logo1.png?where=super",
               "productId"=>11
                ]
             ]
        ];

    return json_api($data);

    }

    /**5
     * 分类列表
     * @param $parentId
     * @return \think\response\Json
     *
     */
    public function category($parentId){
        $category=Db::name("goods_category")->where("parent_id",$parentId)->find();
        if($category){
            $result=[
                        [
                      "id"=>$category["id"],
                      "bannerUrl"=>"https://www.baidu.com/img/bd_logo1.png?where=super",
                      "name"=>$category["name"],
                        ]
            ];
            return json_api($category);
        }else{
            return json_api(null,false,"没有此分类");
        }

    }

    /**
     * 6
     * 品牌列表
     * @param $id
     * @return \think\response\Json
     *
     */
    public function brand($id){
        $brand=Db::name("brand")->where("id",$id)->find();
        if($brand){
            $data=[
                    [
                        "id"=>$brand["id"],
                        "name"=>$brand["name"],
                    ]
             ];
            return json_api($data);
        }else{
            return json_api(null,false,"该品牌不存在");
        }
    }

    /**商品信息
     * 7
     * @param $id
     *
     */
    public function productInfo($id){
        $goods=Db::name("goods")->where("id",$id)->find();
        if ($goods){
            //存在
            $data=[
                    "id"=>$goods["id"],
                    "imgUrls"=>[
                                "/img/info/pp1.jpg"=>$goods["logo"],
                            ],
                    "price"=>$goods["shop_price"],
                    "ifSaleOneself"=>"否",
                    "name"=>$goods["name"],
                    "recomProductId"=>2,
                    "stockCount"=>$goods["stock"],
                    "commentCount"=>2,
                    "typeList"=>[
                                "麦片巧克力",
                                "商品版本"
                            ],
                    "favcomRate"=>"100%",
                    "recomProduct"=>"很不错",
            ];
                return json_api($data);
        }else{
            return json_api(null,false,"没有此商品");
        }

    }

    /**8
     * 收货地址
     * @param $userId
     * @param $isDefault
     * @return \think\response\Json
     *
     */
    public function receiveAddress($userId,$isDefault){
        $address=Db::name("address")->where("user_id",$userId)->where("status",$isDefault)->find();
        if($address){
            //存在
           $data=[
                    [
                       "id"=>$address["id"],
                       "isDefault"=>$address["status"],
                       "receiverName"=>$address["name"],
                       "receiverAddress"=>$address["address"],
                       "receiverPhone"=>$address["moblie"],
                    ]
                ];
            return json_api($data);
        }else{
            //不存在
            return json_api(null,false,"没有该地址");
        }
    }

    /**9
     * @param $id
     * @param $user_id
     * @return \think\response\Json
     *
     */
    public function delAddress($id,$user_id){
        $address=Db::name("address")->where(["id"=>$id,"user_id"=>$user_id])->delete();
        if ($address){
            return json_api("1",true,"成功");
        }else{
            //不存在
            return json_api(null,false,"删除失败");
        }
    }

    /***
     * @param $username
     * @param $pwd
     */
    public function regist($username,$pwd){
        $data = ['username' => $username, 'password_hash' =>$pwd];
        $user=Db::name("user")->insert($data);
        if($user){
            return json_api("1",true,"添加成功");
        }else{
            //不存在
            return json_api(null,false,"添加失败");
        }
    }






}
