<?php

require_once './app/models/categoria_model.php'; 
require_once './app/views/categoria_view.php';    

class catController {

    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new categoriaModel();
        $this->view = new categoriaView($res->user);
    }
    
    function showCategorias() {
        $categorias = $this->model->getCategorias();
        return $this->view->showCategorias($categorias);
    }

    function showJuegosPorCategoria($ID_categoria) {
        $juegos = $this->model->getJuegosPorCategoria($ID_categoria);
        if($juegos){
            
        }
        return $this->view->showHome($juegos);
    }

    public function showAddCategoriaForm() {
        $this->view->addCategoriaForm();
    }

    public function crearCat() {
        if (!isset($_POST['nombre_categoria']) || empty(trim($_POST['nombre_categoria']))) {
            return $this->categoriaView->showError('Falta completar el nombre de la categoría.');
        }

        $nombre_categoria = $_POST['nombre_categoria'];

        $this->model->crearCat($nombre_categoria, $imagen_url);

        header('Location: ' . BASE_URL . 'showCategories');
        exit();
    }

    public function deleteCategory() {
        if (!isset($_POST['id_categoria']) || empty(trim($_POST['id_categoria']))) {
            return $this->categoriaView->showError('Falta el ID de la categoría para eliminar.');
        }

        $id_categoria = $_POST['id_categoria'];

        // Llamar al modelo para eliminar la categoría
        if ($this->model->deleteCategory($id_categoria)) {
            header('Location: ' . BASE_URL . 'showCategories');
            exit();
        } else {
            return $this->categoriaView->showError('Error al eliminar la categoría.');
        }
    }

    // Mostrar el formulario de edición de una categoría
    public function editCategory($id_categoria) {
        $category = $this->model->getCategoryById($id_categoria); // Obtener la categoría por ID
        if ($category) {
            $this->view->editCategoryForm($category); // Llama a la vista para mostrar el formulario de edición
        } else {
            return $this->categoriaView->showError('Categoría no encontrada.');
        }
    }

    // Actualizar una categoría existente
    public function updateCategory() {
        if (!isset($_POST['id_categoria']) || empty(trim($_POST['id_categoria']))) {
            return $this->categoriaView->showError('Falta el ID de la categoría.');
        }

        // Obtener los datos del formulario
        $id_categoria = $_POST['id_categoria'];
        $nombre_categoria = $_POST['nombre_categoria'] ?? null;
        $imagen_url = $_POST['imagen_url'] ?? null;

        // Validar los campos
        if ($nombre_categoria && $imagen_url) {
            if ($this->model->updateCategory($id_categoria, $nombre_categoria, $imagen_url)) {
                header('Location: ' . BASE_URL . 'showCategories');
                exit();
            } else {
                return $this->categoriaView->showError('Error al actualizar la categoría.');
            }
        } else {
            return $this->categoriaView->showError('Completar todos los campos.');
        }
    }
}
