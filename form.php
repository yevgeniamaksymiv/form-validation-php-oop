<?php

require_once 'vendor/autoload.php';

session_start();

$_SESSION['error'] = false;

$title = new \App\TitleValidator();
$annotation = new \App\AnnotationValidator();
$content = new \App\ContentValidator();
$email = new \App\EmailValidator();
$views = new \App\ViewsValidator();
$date = new \App\DateValidator();
$publish = new \App\PublishValidator();
$category = new \App\CategoryValidator();

if (isset($_POST['title'])) {
    $title->validate($_POST['title']);
    $_SESSION['title-error'] = $title->errorTxt;
    if (!empty($title->input)) {
        $_SESSION['title'] = $title->input;
    }
}

if (isset($_POST['annotation'])) {
    $annotation->validate($_POST['annotation']);
    $_SESSION['annotation-error'] = $annotation->errorTxt;
    if (!empty($annotation->input)) {
        $_SESSION['annotation'] = $annotation->input;
    }
}

if (isset($_POST['content'])) {
    $content->validate($_POST['content']);
    $_SESSION['content-error'] = $content->errorTxt;
    if (!empty($content->input)) {
        $_SESSION['content'] = $content->input;
    }
}

if (isset($_POST['email'])) {
    $email->validate($_POST['email']);
    $_SESSION['email-error'] = $email->errorTxt;
    if (!empty($email->input)) {
        $_SESSION['email'] = $email->input;
    }
}

if (isset($_POST['views'])) {
    $views->validate($_POST['views']);
    $_SESSION['views-error'] = $views->errorTxt;
    if (!empty($views->input)) {
        $_SESSION['views'] = $views->input;
    }
}

if (isset($_POST['date']) && !empty($_POST['date'])) {
    $date->validate($_POST['date']);
    $_SESSION['date-error'] = $date->errorTxt;
    if (!empty($date->input)) {
        $_SESSION['date'] = $date->input;
    }
}

if(!isset($_POST['publish_in_index'])) {
    $publish->validate($_POST['publish_in_index']);
    $_SESSION['publish-error'] = $publish->errorTxt;
}

if(isset($_POST)) {
    $category->validate($_POST['category']);
    $_SESSION['category-error'] = $category->errorTxt;
}

if (
    $title->isError ||
    $annotation->isError ||
    $content->isError ||
    $email->isError ||
    $views->isError ||
    (isset($date->isError) && $date->isError === true) ||
    $category->isError
) {
    $_SESSION['error'] = true;
}

if ($_SESSION['error'] === false) {
    session_destroy();
}

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
header("Location: http://$host$uri");
exit;