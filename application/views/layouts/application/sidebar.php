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
    "text" => "Departement",
    "icon" => "fa-users",
    "item" => [
      [
        "text" => "Add Departement",
        "link" => "/departement/new",
      ],
      [
        "text" => "List Departement",
        "link" => "/departement",
      ],
    ],
  ],
];
