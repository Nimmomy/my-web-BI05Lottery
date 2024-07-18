<?php
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$file = 'insurance_articles.json';

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$articles = json_decode(file_get_contents($file), true);

if ($method === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $article = array_filter($articles, function($article) use ($id) {
            return $article['id'] === $id;
        });
        if ($article) {
            echo json_encode(array_values($article)[0]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Article not found']);
        }
    } else {
        echo json_encode($articles);
    }
} elseif ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    // Check if title already exists
    foreach ($articles as $article) {
        if ($article['title'] === $input['title']) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Article with the same title already exists']);
            exit;
        }
    }

    $input['id'] = uniqid();
    $input['created_at'] = date(DATE_ISO8601);
    $input['updated_at'] = $input['created_at'];
    $articles[] = $input;
    file_put_contents($file, json_encode($articles));
    echo json_encode($input);
} elseif ($method === 'PUT') {
    $input = json_decode(file_get_contents('php://input'), true);
    foreach ($articles as &$article) {
        if ($article['id'] === $input['id']) {
            $article['title'] = $input['title'];
            $article['content'] = $input['content']; // Update content here
            $article['updated_at'] = date(DATE_ISO8601);
            break;
        }
    }
    file_put_contents($file, json_encode($articles));
    echo json_encode($input);
} elseif ($method === 'DELETE') {
    $id = $_GET['id'];
    $articles = array_filter($articles, function($article) use ($id) {
        return $article['id'] !== $id;
    });
    file_put_contents($file, json_encode(array_values($articles)));
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>