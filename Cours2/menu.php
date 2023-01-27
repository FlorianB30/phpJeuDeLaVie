<?php
$menu = [
    [
        "label" => "login",
        "link" => "index.php"
    ],
    [
        "label" => "page1",
        "link" => "page1.php"
    ],
    [
        "label" => "deconnexion",
        "link" => "page2.php"
    ]
];

foreach($menu as $a) {
    $label = $a['label'];
    $link = $a['link'];
    echo "<a href='$link'>$label</a>";
}

?>