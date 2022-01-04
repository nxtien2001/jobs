<?php
return [
    'blogs' => [
        'enable' => [
            1 => 'da_duyet',
            0 => 'cho_duyet'
        ],
        'gender' => [
            "Nam" => 2,
            "Nữ" => 1,
            "Không yêu cầu" => 0
        ],
        'working_time' => [
            "full_time" => 2,
            "part_time" => 1,
        ],
        'blog_order_by' => [
            1 => 'Tin đã được duyệt',
            0 => 'Tin chưa được duyệt',
        ],
        'page_size' => [
            20,
            40,
            80,
            100
        ],
        'default_page_size' => 40
    ],
    'categories' => [
        'enable' => [
            1 => 'Danh mục hiển thị',
            0 => 'Danh mục ẩn',
        ]
    ],
    'users' => [
        200 => "Admin",
        150 => "Nhân viên",
    ],
    'ads' => [
        200 => "Banner",
        0 => "Slider",
    ],
];
