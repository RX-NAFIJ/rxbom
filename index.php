<?php
$request = trim($_SERVER['REQUEST_URI'], '/');

// ফাইল খুঁজে পেলে রান করবে
if ($request && file_exists(__DIR__ . '/' . $request)) {
    require __DIR__ . '/' . $request;
} else {
    http_response_code(404);
    echo json_encode(["status" => "error", "message" => "API endpoint not found"]);
}
