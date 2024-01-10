<?php


use App\routes\Router;

require_once __DIR__ . '/../../vendor/autoload.php';

$router = new Router();

$router->setRoutes([
    'GET' => [
        "register" => ["UserController", "viewRegister"],
        "login" => ["UserController", "viewLogin"],
        "index" => ["UserController", "viewHome"],
        "profile" => ["UserController", "viewProfile"],
        "index" => ["CategoryController", "findAllCategories"],
        "index" => ["TagsController", "getAll"],
        "displayWiki" => ["WikiController", "wiki"],
        "displayWiki" => ["WikiController", "findAllWikis"],
        "dashboard" => ["AdminController", "index"],
        "dashboard" => ["AdminController", "Count"],
        "category" => ["CategoryController", "viewcategory"],
        "tags" => ["TagsController", "index"],
        "users" => ["UserController", "viewAdmin"],
        "users" => ["UserController", "getAllUsers"],
        "update" => ["WikiController", "updateview"],
        "logout" => ["UserController", "logoutview"],
        "search" => ["SearchController", "search"],
        "wiki" => ["WikiController", "search"],
        "Adminwiki" => ["AdminController", "routewiki"],
        "Adminwiki" => ["AdminController", "findAllWikis"],
        "editId" => ["AdminController", "editview"],
        "categories" => ["CategoryController", "view"],
        "categories" => ["CategoryController", "getAllcategories"],
        "edit" => ["CategoryController", "edit"],
        "show" => ["TagsController", "viewtags"],
        "edittagView" => ["TagsController", "editbyid"],
        "detail" => ["WikiController", "detail"],
        "detail" => ["WikiController", "detail"]
    ],

    'POST' => [
        "register" => ["UserController", "save"],
        "login" => ["UserController", "login"],
        "wikisave" => ["WikiController", "save"],
        "profile" => ["UserController", "updateProfile"],
        "savecategory" => ["CategoryController", "save"],
        "saveTag" => ["TagsController", "save"],
        "deleteUser" => ["UserController", "deleteUser"],
        "wdelete" => ["WikiController", "deleteWiki"],
        "wupdate" => ["WikiController", "updateWiki"],
        "adminupdatewiki" => ["AdminController", "adminupdatewiki"],
        "deletecategory" => ["CategoryController", "deleteCategory"],
        "editapp" => ["CategoryController", "editc"],
        "deletetag" => ["TagsController", "deleteTag"],
        "updatetag" => ["TagsController", "updatetag"],
        "archiver" => ["AdminController", "archiver"]
    ]
]);

if (isset($_GET['url'])) {
    $uri = trim($_GET['url'], '/');
    $method = $_SERVER['REQUEST_METHOD'];

    try {
        $route = $router->getRoute($method, $uri);

        if ($route) {
            list($controllerName, $methodName) = $route;
            $controllerClass = 'App\\controller\\' . ucfirst($controllerName);
            $controller = new $controllerClass();

            if ($methodName && method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                $controller->index();
            }
        } else {
            throw new Exception('Route not found.');
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}


















// use App\routes\Router;

// require_once __DIR__ . '/../../vendor/autoload.php';

// $router = new Router();

// $router->setRoutes([
//     'GET' => [
//         "register" => ["UserController", "viewRegister"],
//         "login" => ["UserController", "viewLogin"],
//         "index" => [
//             ["UserController", "viewHome"],
//             ["CategoryController", "findAllCategories"],
//         ],
//         "profile" => ["UserController", "viewProfile"],
//         "displayWiki" => ["WikiController", "wiki"],
//         "displayWiki" => ["WikiController", "findAllWikis"],
//         "dashbord" => [
//             ["AdminController", "index"],
//             ["AdminController", "getCategoriesCount"],
//             ["AdminController", "getUsersCount"],
//             ["AdminController", "getWikisCount"],
//         ],
//     ],
//     'POST' => [
//         "register" => ["UserController", "save"],
//         "login" => ["UserController", "login"],
//         "wikisave" => ["WikiController", "save"],
//         "profile" => ["UserController", "updateProfile"],
//     ]
// ]);

// if (isset($_GET['url'])) {
//     $uri = trim($_GET['url'], '/');
//     $method = $_SERVER['REQUEST_METHOD'];

//     try {
//         $route = $router->getRoute($method, $uri);

//         if ($route) {
//             foreach ($route as $method) {
//                 $controllerClass = 'App\\controller\\' . ucfirst($method[0]);
//                 $controller = new $controllerClass();

//                 $methodName = $method[1];
//                 if (method_exists($controller, $methodName)) {
//                     $controller->$methodName();
//                 } else {
//                     $controller->index();
//                 }
//             }
//         } else {
//             throw new Exception('Route not found.');
//         }
//     } catch (Exception $e) {
//         echo 'Caught exception: ', $e->getMessage(), "\n";
//     }
// }
