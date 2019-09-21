<?php

$sidebar = [
  [
    "type" => "header",
    "text" => "Manage User",
  ],
  [
    "type" => "collapse",
    "text" => "Super Admin",
    "icon" => "fa-user",
    "item" => [
      [
        "text" => "Add Super Admin",
        "link" => "/superadmin/new",
      ],
      [
        "text" => "List Super Admin",
        "link" => "/superadmin",
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
    "text" => "Division",
    "icon" => "fa-users",
    "item" => [
      [
        "text" => "Add Division",
        "link" => "/division/new",
      ],
      [
        "text" => "List Division",
        "link" => "/division",
      ],
    ],
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
