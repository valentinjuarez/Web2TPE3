<?php
require_once './app/controllers/api.controller.php';
require_once './app/models/cat.model.php';

class CatApiController extends ApiController
{
    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new catModel();
    }
    function get($params = [])
    {
        if (empty($params)) {
            $cats = $this->model->getCategory();
            $this->view->response($cats, 200);
        } else {
            $cat = $this->model->getSelectedCat($params[':ID']);
            if (!empty($cat)) {
                $this->view->response($cat, 200);
            } else {
                $this->view->response(
                    'la categoria con el id=' . $params[':ID'] . ' no existe.',
                    404
                );
            }
        }
    }
    function create($params = [])
    {
        $body = $this->getData();

        $requiredFields = ['categoryName', 'descripcion'];

        foreach ($requiredFields as $field) {
            if (!isset($body->$field) || empty($body->$field)) {
                $this->view->response("Complete los datos, el campo '$field' es obligatorio.", 400);
                return; // Detener la ejecución si falta un campo requerido
            }
        }
        // Si todos los campos requeridos están presentes y no están vacíos, procede con la inserción
        $name = $body->categoryName;
        $description = $body->descripcion;
        $id = $this->model->insertCategory($name, $description);

        // En una API REST es buena práctica devolver el recurso creado
        $catCreada = $this->model->getSelectedCat($id);
        $this->view->response($catCreada, 201);
    }

    function update($params = [])
    {
        $id = $params[':ID'];
        $cat = $this->model->getSelectedCat($id);

        if ($cat) {
            $body = $this->getData();
            $name = $body->categoryName;
            $description = $body->descripcion;
            
            $this->model->updateCatData($id, $name, $description);

            $this->view->response('La tarea con id=' . $id . ' ha sido modificada.', 200);
        } else {
            $this->view->response('La tarea con id=' . $id . ' no existe.', 404);
        }
    }
}
