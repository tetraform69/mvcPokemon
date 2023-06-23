<?php

include_once("router.php");
include_once("controllers/login.php");
include_once("controllers/rol.php");
include_once("controllers/producto.php");

function rutas()
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/mvcPokemon/login') {
        render("login");
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/mvcPokemon/login') {
        $json_string = file_get_contents('php://input');
        $data = json_decode($json_string);
        echo json_encode(login($data));
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/mvcPokemon/logout') {
        logout();
        header('Location: /mvcPokemon/login');
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && ($_SERVER['REQUEST_URI'] === '/mvcPokemon/home' || $_SERVER['REQUEST_URI'] === '/mvcPokemon/')) {
        validate();
        render("home");
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/mvcPokemon/roles') {
        validate();
        
        render("roles");
        return;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/mvcPokemon/productos') {
        validate();
        render("productos");
        return;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/mvcPokemon/pokemones') {
        validate();
        render("pokemones");
        return;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/mvcPokemon/pokemon') {
        validate();
        render("pokemon");
        return;
    }

    if ($_SERVER['REQUEST_URI'] === '/mvcPokemon/rol') {
        $rol = new rolController;
        $json_string = file_get_contents('php://input');
        $data = json_decode($json_string);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($rol->getAll());
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode($rol->create($data));
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            echo json_encode($rol->state($data));
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
            echo json_encode($rol->update($data));
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            echo json_encode($rol->delete($data));
            return;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/rol\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        $rol = new rolController;
        echo json_encode($rol->getOne($index));
        return;
    }

    if ($_SERVER['REQUEST_URI'] === '/mvcPokemon/producto') {
        $producto = new productoController;
        $json_string = file_get_contents('php://input');
        $data = json_decode($json_string);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($producto->getAll());
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode($producto->create($data));
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            echo json_encode($producto->state($data));
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
            echo json_encode($producto->update($data));
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            echo json_encode($producto->delete($data));
            return;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/producto\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        $producto = new productoController;
        echo json_encode($producto->getOne($index));
        return;
    }

    http_response_code(404);
}
