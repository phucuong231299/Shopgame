<?php

    return[    

        [
            'label'=>'HOME',
            'route'=>'client.index',
            'icon'=>'bi bi-house-door-fill'
        ],
        [
       
            'label'=>'GAME',
            'route'=>'client.danhmuc',
            'icon'=>'bi bi-controller',
            'item'=>[
                [
                    'label'=>'Playstation',
                    'route'=>'client.ps5',
                    'icon'=>'bi bi-playstation',
                ],
                [
                    'label'=>'Nintendo',
                    'route'=>'client.NTDSO',
                    'icon'=>'bi bi-nintendo-switch'
                ],
                [
                    'label'=>'Xbox',
                    'route'=>'client.danhmuc',
                    'icon'=>'bi bi-xbox'
                ],  
               
            ]
        ],
    [
        'label'=>'IPHONE',
        'route'=>'client.danhmuc',
        'icon'=>'bi bi-apple',
        'item'=>[
            [
                'label'=>'Playstation',
                'route'=>'client.danhmuc',
                'icon'=>'bi bi-playstation',
                'mit'=>[
                    [
                        'label'=>'ps5',
                        'route'=>'client.index'
                    ]
                ]
            ],
            [
                'label'=>'Nintendo',
                'route'=>'client.danhmuc',
                'icon'=>'bi bi-nintendo-switch'
            ],
            [
                'label'=>'Xbox',
                'route'=>'client.danhmuc',
                'icon'=>'bi bi-xbox'
            ],           
        ]
    ],
    [
       
        'label'=>'IPAD',
        'route'=>'client.phukien',
        'icon'=>'bi bi-tablet-fill',
    ],
    [
       
        'label'=>'WATCH',
        'route'=>'client.phukien',
        'icon'=>'bi bi-smartwatch',
    ],
    [
        'label'=>'VR',
        'route'=>'client.phukien',
        'icon'=>'bi bi-headset-vr',
    ],
    [
        'label'=>'ACCESSORIES',
        'route'=>'client.phukien',
        'icon'=>'bi bi-earbuds',
        'item'=>[
            [
                'label'=>'Playstation',
                'route'=>'client.danhmuc',
                'icon'=>'bi bi-playstation',
                'mit'=>[
                    [
                        'label'=>'ps5',
                        'route'=>'client.index'
                    ]
                ]
            ],
            [
                'label'=>'Nintendo',
                'route'=>'client.danhmuc',
                'icon'=>'bi bi-nintendo-switch'
            ],
            [
                'label'=>'Xbox',
                'route'=>'client.danhmuc',
                'icon'=>'bi bi-xbox'
            ],           
        ]
    ],

    
];
?>