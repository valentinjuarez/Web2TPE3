<?php
    require_once './config.php';
    require_once 'libs/router.php';

    require_once './app/controllers/api.controller.php';
    require_once './app/controllers/cat.api.controller.php';
    require_once './app/controllers/prod.api.controller.php';

    $router = new Router();

    # TABLA PRODUCTOS
    #                  endpoint                             verbo     controller           método
    $router->addRoute('productos',                          'GET',    'ProdApiController', 'get'   ); 
    $router->addRoute('productos/:ID',                      'GET',    'ProdApiController', 'get'   );
    $router->addRoute('productos/:sort/:order',             'GET',    'ProdApiController', 'get'   );
    $router->addRoute('productos/:filterBy/:filterValue',   'GET',    'ProdApiController', 'get'   );
    $router->addRoute('productos',                          'POST',   'ProdApiController', 'create');
    $router->addRoute('productos/:ID',                      'PUT',    'ProdApiController', 'update');
    
    
    # TABLA CATEGORIAS
    #                  endpoint                    verbo     controller          método
    $router->addRoute('categorias',                'GET',    'CatApiController', 'get'   ); 
    $router->addRoute('categorias/:ID',            'GET',    'CatApiController', 'get'   );
    $router->addRoute('categorias',                'POST',   'CatApiController', 'create');
    $router->addRoute('categorias/:ID',            'PUT',    'CatApiController', 'update');
    
    
    #               del htaccess resource=(), verbo con el que llamo GET/POST/PUT/etc
    $router->route($_GET['resource']        , $_SERVER['REQUEST_METHOD']);
