<?php
return[
    [
        'label'=>'Dashboard',
        'route'=>'admin.dashboard',
        'icon'=>'fa-home',
    ]
    ,[
        'label'=>'Product Manager',
        'route'=>'product.index',
        'icon'=>'fa-shopping-cart',
        'item'=>[
            [
                'label'=>'All Product',
                'route'=>'product.index',
            ],[
                'label'=>'Create Product',
                'route'=>'product.create',
            ]
            
        ]
    ]
]
?>