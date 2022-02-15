<?php

// GET /
$base->get("/", function () {
    $controller = new spark\Controllers\Home;
    return $controller->{'getRequest'}();
});

// POST /
$base->post("/", function () {
    $controller = new spark\Controllers\Home;
    return $controller->{'postRequest'}();
});

$base->post("/api/endpoint", function () {
    $controller = new spark\Controllers\Home;
    return $controller->{'apiPostRequest'}();
});