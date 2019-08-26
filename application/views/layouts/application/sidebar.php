<?php

$sidebar = [
  [
    "type" => "header",
    "text" => "Manage User",
  ],
  [
    "type" => "collapse",
    "text" => "Administrator",
    "icon" => "fa-user",
    "item" => [
      [
        "text" => "Add Administrator",
        "link" => "/administrator/new",
      ],
      [
        "text" => "List Administrator",
        "link" => "/administrator",
      ],
    ],
  ],
  [
    "type" => "divider",
  ],
  [
    "type" => "header",
    "text" => "Manage Data",
  ],
  [
    "type" => "collapse",
    "text" => "Organization",
    "icon" => "fa-users",
    "item" => [
      [
        "text" => "Add Organization",
        "link" => "/organization/new",
      ],
      [
        "text" => "List Organization",
        "link" => "/organization",
      ],
    ],
  ],
];
