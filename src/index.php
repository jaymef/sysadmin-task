<?php

require_once __DIR__ . '/vendor/autoload.php';

use Michelf\Markdown;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$dsn = sprintf(
    'pgsql:host=%s;dbname=%s;user=%s;password=%s',
    $_ENV['DB_HOST'],
    $_ENV['DB_NAME'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASSWORD']
);

$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('select * from post order by createdate desc');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_OBJ);

function displayHeader()
{
    echo <<<HTML
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <title>Sysadmin Task</title>
    </head>
    <body>

HTML;
}

function displayPost($post)
{
    echo "        <div class=\"post\">\n";
    printf("            <h1 class=\"title\">%s</h1>\n", htmlspecialchars($post->title));
    echo Markdown::defaultTransform($post->bodytext);
    echo "        </div>\n";
}

function displayFooter()
{
    echo <<<HTML
    </body>
</html>

HTML;
}

displayHeader();
foreach ($posts as $post) {
    displayPost($post);
}
displayFooter();
