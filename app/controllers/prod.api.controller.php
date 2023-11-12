<?php
require_once './app/controllers/api.controller.php';
require_once './app/models/prod.model.php';

class ProdApiController extends ApiController
{
    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new prodModel();
    }

    function get($params = [])
    {
        if (isset($_GET['sort']) && isset($_GET['order'])) {
            $sort = $_GET['sort'];
            $order = $_GET['order'];

            $validSortOptions = ['productName', 'model', 'price', 'weightKG', 'height_cm', 'storageGB', 'id_categoria'];
            $validOrderOptions = ['asc', 'desc'];

            if (in_array($sort, $validSortOptions) && in_array($order, $validOrderOptions)) {
                $prodOrd = $this->model->getProdOrderBy($sort, $order);
                $this->view->response($prodOrd, 200);
                return;
            } else {
                $this->view->response('Los parámetros no son válidos', 400);
                return;
            }
        }
        if (isset($_GET['filterBy']) && isset($_GET['filterValue'])) {
            $filterBy = $_GET['filterBy'];
            $filterValue = $_GET['filterValue'];

            $validFilterOptions = ['productName'];
            $validValueOptions = ['Celular', 'Parlante', 'Notebook', 'Tablet', 'Auriculares', 'Microfono', 'TV', 'Computadora'];

            if (in_array($filterBy, $validFilterOptions) && in_array($filterValue, $validValueOptions)) {
                $filterProducts = $this->model->getProdFilter($filterBy, $filterValue);
            
                if ($filterProducts) {
                    $this->view->response($filterProducts, 200);
                    return;
                } else {
                    $this->view->response('El producto con los filtros seleccionados no existe.', 404);
                    return;
                }
            } else {
                $this->view->response('Los parámetros no son válidos', 400);
                return;
            }
        }
            

        if (empty($params)) {
            $prods = $this->model->getDataProduct();
            $this->view->response($prods, 200);
        } else {
            $prod = $this->model->getSelectedProd($params[':ID']);
            if ($prod) {
                $this->view->response($prod, 200);
            } else {
                $this->view->response('El producto con el ID=' . $params[':ID'] . ' no existe.', 404);
            }
        }
    }


    function create($params = [])
    {
        $body = $this->getData();

        $requiredFields = ['productName', 'model', 'price', 'weightKG', 'height_cm', 'storageGB', 'id_categoria'];

        foreach ($requiredFields as $field) {
            if (!isset($body->$field) || empty($body->$field)) {
                $this->view->response("Complete los datos, el campo '$field' es obligatorio.", 400);
                return; // Detener la ejecución si falta un campo requerido
            }
        }

        // Si todos los campos requeridos están presentes y no están vacíos, procede con la inserción
        $name = $body->productName;
        $model = $body->model;
        $price = $body->price;
        $weightKG = $body->weightKG;
        $height_cm = $body->height_cm;
        $storageGB = $body->storageGB;
        $id_categoria = $body->id_categoria;

        $id = $this->model->insertProductToTable($name, $model, $price, $weightKG, $height_cm, $storageGB, $id_categoria);

        // En una API REST es buena práctica devolver el recurso creado
        $prodCreado = $this->model->getSelectedProd($id);
        $this->view->response($prodCreado, 201);
    }

    function update($params = [])
    {
        $id = $params[':ID'];
        $prod = $this->model->getSelectedProd($id);

        if ($prod) {
            $body = $this->getData();
            $name = $body->productName;
            $model = $body->model;
            $price = $body->price;
            $weightKG = $body->weightKG;
            $height_cm = $body->height_cm;
            $storageGB = $body->storageGB;
            $id_categoria = $body->id_categoria;
            $this->model->updateProdData($id, $name, $model, $price, $weightKG, $height_cm, $storageGB, $id_categoria);

            $this->view->response('La tarea con id=' . $id . ' ha sido modificada.', 200);
        } else {
            $this->view->response('La tarea con id=' . $id . ' no existe.', 404);
        }
    }
}
