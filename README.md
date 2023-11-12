# Web2TPE3
## Integrantes:
Juarez, Valentin (Contacto: valenjua06@gmail.com) Miembro A y B.
## EndPoints Product
La dirección base de la API es la siguiente:
{ruta_servidor_apache}/api
Get All Products:
⦿ Endpoint: /productos  
⦿ Verbo: GET
⦿ Descripción: Obtiene todos los productos disponibles.
⦿ Uso: {ruta_servidor_apache}/api/productos
⦿ Respuesta ejemplo: 

    {
        "id_product": 2,
        "productName": "Celular",
        "model": "Iphone '11' Pro Max",
        "price": 636693,
        "weightKG": 0.35,
        "height_cm": 13.2,
        "storageGB": 128,
        "id_categoria": 100,
        "categoryName": "Telefono Movil"
    }

Get Product by ID:
Endpoint: /productos/:ID
Verbo: GET
Descripción: Obtiene un producto específico por su ID.
Uso: {ruta_servidor_apache}/api/productos/10
Respuesta ejemplo:

    {
        "id_product": 10,
        "productName": "Celular",
        "model": "Samsung Galaxy a'40'",
        "price": 299393,
        "weightKG": 0.239,
        "height_cm": 12.3,
        "storageGB": 128,
        "id_categoria": 100,
        "categoryName": "Telefono Movil"
    }

Get Products with Sort and Order:
Endpoint: /productos/:sort/:order
Verbo: GET
Descripción: Obtiene productos ordenados por un campo específico en un orden dado.
Parámetros:
:sort: Campo por el cual se ordenarán (opciones válidas: 'productName', 'model', 'price', 'weightKG', 'height_cm', 'storageGB', 'id_categoria').
:order: Orden de clasificación (opciones válidas:'asc' o 'desc').
Uso: {ruta_servidor_apache}/api/productos?sort=price&order=asc
Respuesta ejemplo: 

    {
        "id_product": 29,
        "productName": "Celular",
        "model": "Samsung Galaxy a'50'",
        "price": 200,
        "weightKG": 0.239,
        "height_cm": 12.3,
        "storageGB": 128,
        "id_categoria": 100
    },
    {
        "id_product": 26,
        "productName": "Celular",
        "model": "Motorola hdr",
        "price": 2040,
        "weightKG": 45,
        "height_cm": 32,
        "storageGB": 128,
        "id_categoria": 104
    }

Get Products with Filtering:
Endpoint: /productos/:filterBy/:filterValue
Verbo: GET
Descripción: Obtiene productos filtrados por un campo específico y su valor.
Parámetros:
:filterBy: Campo por el cual se aplicará el filtro (opciones válidas: 'productName').
:filterValue: Valor por el cual se filtrarán los productos (opciones válidas: 'Celular', 'Parlante', 'Notebook', 'Tablet', 'Auriculares', 'Microfono', 'TV', 'Computadora').
Uso: {ruta_servidor_apache}/api/productos?filterBy=productName&filterValue=Celular
Respuesta ejemplo: 

    {  
        "id_product": 2,
        "productName": "Celular",
        "model": "Iphone '11' Pro Max",
        "price": 636693,
        "weightKG": 0.35,
        "height_cm": 13.2,
        "storageGB": 128,
        "id_categoria": 100
    },
    {
        "id_product": 5,
        "productName": "Celular",
        "model": "locura",
        "price": 735000,
        "weightKG": 1.7,
        "height_cm": 24.7,
        "storageGB": 280,
        "id_categoria": 103
    },
    {
        "id_product": 10,
        "productName": "Celular",
        "model": "Samsung Galaxy a'40'",
        "price": 299393,
        "weightKG": 0.239,
        "height_cm": 12.3,
        "storageGB": 128,
        "id_categoria": 100
    }

Create Product:
Endpoint: /productos
Verbo: POST
Descripción: Crea un nuevo producto.
Uso: {ruta_servidor_apache}/api/productos 
Este Endpoint crea un nuevo producto a partir de los siguientes datos introducidos en el Body:
    {
        "productName": "Celular",
        "model": "Samsung Galaxy a'40'",
        "price": 299393,
        "weightKG": 0.239,
        "height_cm": 12.3,
        "storageGB": 128,
        "id_categoria": 100
    }

Respuesta ejemplo (devuelve el ultimo elemento insertado):

     {
        "id_product": 33,
        "productName": "Celular",
        "model": "Samsung Galaxy a'40'",
        "price": 299393,
        "weightKG": 0.239,
        "height_cm": 12.3,
        "storageGB": 128,
        "id_categoria": 100
    }      

Update Product by ID:
Endpoint: /productos/:ID
Verbo: PUT
Descripción: Actualiza un producto existente por su ID.
Uso: {ruta_servidor_apache}/api/productos/10
Este Endpoint actualiza un producto a partir de los siguientes datos introducidos en el Body (sin incluir el id_product, ni el categoryName):
    {
        "productName": "Celular",
        "model": "Modelo actualizado",
        "price": 299393,
        "weightKG": 0.239,
        "height_cm": 12.3,
        "storageGB": 128,
        "id_categoria": 100
    }

Respuesta ejemplo: 

    {
        "id_product": 10,
        "productName": "Celular",
        "model": "Modelo actualizado",
        "price": 299393,
        "weightKG": 0.239,
        "height_cm": 12.3,
        "storageGB": 128,
        "id_categoria": 100
    }
 
## Endpoints Category






































    
