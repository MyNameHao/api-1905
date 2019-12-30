<?php
return $config = array (
		//应用ID,您的APPID。
		'app_id' => "2016101400681561",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEA2aAyAaWOc1n9vQBvrzVcFverr4KKbXh6eiuvUS1gDv0PyLTIk3Egri4Yj0R94hPHwZmQvKHuQOvW5pizwer1nbG27qkko0mOaL6eE+tM6YlKFkopZC1HIp0XoKzpDx1ovVZo66oktvq1deVTcm4xu4N0SYX7b9j1Bm0eqiulc7oiY7WqPOUZJPL9a43A43HT5eMT2gWqn79wvuP8F78tynqpSBV+AbGuoqNv+zU5SefZ9SNdDsvXYWlyV8Vds0LupCy4gKizCDEJuRXxPZFtnEPxnx1yBijCaez/ThFFigo2yUNhmLZnOy4crJB2bnb0KTfehsC7SEuthAz+WEt9uwIDAQABAoIBAQDJG9v6X5cDjC8KwON0w1fFtbzHpVftEAAG9GXAG7GASGWUsVQFxO5RaDGz+7Rk/qiDhTkWyIHXJtpiIM1FL68oujj11gMQjoH20+hbOf/KdN+tN32GoLzzBL738bIyEJhhGAA/f+0L1yVnvLPftGtrAHCvHQydcJ4GAULsOQddp/i3t6FsvO2hXB763ZnN0GrL25sW0Qr3e+oKCpEOcp3JsPCpMDBc2wQtjBwFF+P5tJ7QkmVlWV5pEdaV2ZOhrv8lbQvatH75caHDvkuYb14remiIl6qyu/bFhNId1fsD53DzgdYpAjROnbW9IMjA51wVYDgfTAdPl0hkD0drpqW5AoGBAPxA6kpe7cXkRIcKXacPKfEyPBg4Nyh7n6Jn+twFc/56x8fCJCkgNfvpEuU+rvodc923aGOJ9r4Ztwz3gi8qDPVrszt7EVe6RUCBfIl9ZVV4IoCSItPQpQhdIwMTZOZev6ZL5DvLFJ3CkBlj/ztMD46jzcxLrJcl/rJogeZXqDv3AoGBANzbn3a5oi7v8DZG9gtd7HyY60Qj6cx/AEdgLYsLTs5tVvNaJ+MdczkNay990TMfyVSeVm9/9a1iSsfq0IBLJ+CO+I4c164pj+CcsBGsUXMzLA45Lg4gLqs6YQNu9xWsuF2cCQYdMxWtJFQd/IrceMyX8KTrFP4QH0DUn8MDwLNdAoGASVjWxykzGgd1pY5uDNVr7KYesywlXbAUirSRTMiJIcWxsXPR7+NdzxHGXMINPsyxlBZwVAEZrczsXOjbAbvIaNQYGYN/V3LiEA+WlqPPgzqbTacwWUahtfze4VYSUKncMA6BHqG+LOEV5UweOq+zFlaq0GxwksKJfHbGzqNOV6ECgYBEFIdBZ9OwuFHJyXIK6vb9KX5MUO2/Fd8WIXWoiOHQDDBjb4UgI3HjQlmqGBSmt8OuC+kFEeK/ga8flSiUg5ZVSH0iAY4Sp8ksKeC0cfPhmQKZl9K0lAMO0T4aetg7nDRw1qqJcfLPWcH7FAtHGtM57hRGIhkkf//CUki1KrD6GQKBgFy4P9U9+Db9w9xW4P4IY9mckoCDzjofqP351CswH9Kck7rICJMjqJ9kk2iFHNLPKdSZ+57orSU8HHOTZoXBbB1yolS1z+30ClH0lJpbS0VsXQVQIcibobStKHcqHN/cZBvXiv6FTWE+rLsTGd329shwhnKTS1n5QZW8tNK/7uUL",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzviH+6S9aqlJLNjMcNo38NHfwSEKJE2NcIZnnZ8O1iK5Cft1tN64oQUXTSs4dWdPhrtKir8wG2k02+J7j4q4u3XJQYLpGi29EaENEyOxRwmKYVEzW3MGcq7/PqCca7dY5u75Edw/U3ZYetCmPNxXJcUyRZOFWyIW5Exuv6m55MIFzVbeJDnen97yNGt26G6iYqH8xRsmUqGKU/xkjn8fU4PR53EW2vr+RT7neGumgb00xqHjR6ZUAeN0v4rrgICRcmESctKP12Lzm0TbVrlPTce2ydPxnjTX+JJAMMiblNaP2ae8BO5Y2MkwsgvUTHsDFzspqwemcn+fbjpqO8oB/QIDAQAB",
		
	
);