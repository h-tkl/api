> 1. 会员登录
---
>http://192.168.1.145:99/api/user/login?username=admin&    pwd=admin
>方式：get

参数 |是否必须 | 说明
---|---|---
username|是|用户名
pwd|是|密码

```
{
    "success": true,
    "errorMsg": "",
    "result": {
        "id": 26,
        "userName": "admin",
        "userIcon": "https://www.baidu.com/img/bd_logo1.png?where=super",
        "waitPayCount": 1,
        "waitReceiveCount": 1,
        "userLevel": 2
    }
}
```
> 2. 首页
---
>http://192.168.1.145:99/api/user/banner?adKind=1
>方式：get

参数 |是否必须 | 说明
---|---|---
adKind|是|广告类型(1导航banner，2广告banner)

```
{
    "success": true,
    "errorMsg": "",
    "result": [
        {
            "id": 1,
            "type": 1,
            "adUrl": "https://www.baidu.com/img/bd_logo1.png?where=super",
            "webUrl": "",
            "adKind": 1
        }
    ]
}
```
> 3. 秒杀商品
---
>http://192.168.1.145:99/api/user/seckill
>方式：get

参数 |是否必须 | 说明
---|---|---


```
{
    "success": true,
    "errorMsg": "",
    "result": {
        "total": 11,
        "rows": [
            {
                "allPrice": 222,
                "pointPrice": 11,
                "iconUrl": "https://www.baidu.com/img/bd_logo1.png?where=super",
                "timeLeft": 20,
                "type": 1,
                "productId": 11
            }
        ]
    }
}
```

> 4. 猜你喜欢
---
>http://192.168.1.145:99/api/user/getYourFav
>方式：get

参数 |是否必须 | 说明
---|---|---

```
{
    "success": true,
    "errorMsg": "",
    "result": {
        "total": 11,
        "rows": [
            {
                "price": 22,
                "name": "李光明",
                "iconUrl": "https://www.baidu.com/img/bd_logo1.png?where=super",
                "productId": 11
            }
        ]
    }
}
```
> 5. 分类列表
---
>http://192.168.1.145:99/api/user/category?parentId=2
>方式：get

参数 |是否必须 | 说明
---|---|---
parentId|是|父id(如果获取的是首层目录不需要该参数)

```
{
    "success": true,
    "errorMsg": "",
    "result": {
        "id": 4,
        "tree": 2,
        "lft": 4,
        "rgt": 7,
        "depth": 1,
        "name": "男装",
        "parent_id": 2,
        "intro": "家电家电家电"
    }
}
```

> 6. 品牌列表
---
>http://192.168.1.145:99/api/user/brand?id=2
>方式：get

参数 |是否必须 | 说明
---|---|---
parentId|是|父id(如果获取的是首层目录不需要该参数)

```
{
    "success": true,
    "errorMsg": "",
    "result": [
        {
            "id": 2,
            "name": "viwo"
        }
    ]
}
```

> 7. 商品信息
---
>http://192.168.1.145:99/api/user/brand?id=2
>方式：get

参数 |是否必须 | 说明
---|---|---
id|是|品牌id

```
{
    "success": true,
    "errorMsg": "",
    "result": {
        "id": 6,
        "imgUrls": {
            "/img/info/pp1.jpg": "http://p5o73jm4l.bkt.clouddn.com/5abc85b0e2a2d.jpg"
        },
        "price": "0.01",
        "ifSaleOneself": "否",
        "name": "小米5",
        "recomProductId": 2,
        "stockCount": 3,
        "commentCount": 2,
        "typeList": [
            "麦片巧克力",
            "商品版本"
        ],
        "favcomRate": "100%",
        "recomProduct": "很不错"
    }
}
```

> 8. 收货地址
---
>http://192.168.1.145:99/api/user/receiveAddress?userId=26&isDefault=0
>方式：get

参数 |是否必须 | 说明
---|---|---
userId|是|用户id
isDefault|是|地址是否默认

```
{
    "success": true,
    "errorMsg": "",
    "result": [
        {
            "id": 2,
            "isDefault": 0,
            "receiverName": "admin",
            "receiverAddress": "asdsadsadas",
            "receiverPhone": "18782737798"
        }
    ]
}
```

> 9. 删除地址
---
>http://192.168.1.145:99/api/user/delAddress?id=2&user_id=26
>方式：get

参数 |是否必须 | 说明
---|---|---
id|是|地址id
user_id|是|用户id

```
{
    "success": true,
    "errorMsg": "成功",
    "result": "1"
}
```
> 10. 用户注册
---
>http://192.168.1.145:99/api/user/regist?username=asdfg&pwd=asdfg
>方式：get

参数 |是否必须 | 说明
---|---|---
username|是|用户名
pwd|是|密码

```
    {
    "success": true,
    "errorMsg": "添加成功",
    "result": "1"
}

```

