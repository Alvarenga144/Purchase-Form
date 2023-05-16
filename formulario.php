<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product billing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/validetta.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="text-center text-danger p-4">Dynamic purchase form</h1>
            </div>
        </div>
        
        <div class="row">            
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive">
                    <form action="php/procesarFactura.php" method="POST" id="formDinamico">                    
                        <table class="table table-bordered" id="table1">
                            <tr class="table-success">
                                <th class="col-2">Number Ticket</th>
                                <th class="col-5">Customer</th>
                                <th class="col-5">Address</th>
                            </tr>
                            <tbody id="tblContenido1">
                                <tr class="tblFilaStatic row-12">
                                    <td>
                                        <input type="number" name="txtNumFactura" class="form-control" data-validetta="required, number">
                                    </td>
                                    <td>
                                        <input type="text" name="txtNombre" class="form-control" data-validetta="required">
                                    </td>                                    
                                    <td>
                                        <input type="text" name="txtDireccion" class="form-control" data-validetta="required, maxLenght[50]">
                                    </td>
                                    <!--<td>
                                        <button type="button" class="btn btn-outline-danger btn-sm" id="btnEliminar">Eliminar</button>
                                    </td>-->
                                </tr>
                            </tbody>
                            
                        </table> 
                        <div class="row text-center pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-sm" id="btnAdd">Add Product</button>
                            </div>
                        </div>
                        
                        <!--           SEGUNDA TABLA                -->
                        <table class="table table-bordered" id="table2">
                            <tr class="table-success">
                                <th class="col-4">Product</th>
                                <th class="col-3">Category</th>
                                <th class="col-2">Quantity</th>
                                <th class="col-2">Unit price</th>
                                <th class="col-1">Actions</th>
                            </tr>
                            <tbody id="tblContenido2">
                                <tr class="tblFila2 row-12">
                                    <td>
                                        <input type="text" name="txtNomProducto[]" class="form-control" data-validetta="required">
                                    </td>
                                    <td>
                                        <select name="sCategoria" id="sCate" class="form-control" data-validetta="required">
                                            <option value="Lacteos">Fruits, Vegetables</option>
                                            <option value="Verduras">Bakery, Coffee</option>
                                            <option value="Bebidas">Drinks, Milky</option>
                                            <option value="Limpieza">Hygiene, Cleanliness</option>
                                            <option value="Carnes">Wine, Spirits</option>
                                            <option value="Carnes">Groceries, Candies</option>
                                            <option value="Carnes">Meats and Soups</option>
                                        </select>
                                    </td>                                    
                                    <td>
                                        <input type="number" name="txtCantidad[]" class="form-control" data-validetta="required">
                                    </td>
                                    <td>
                                        <input type="text" name="txtPrecioUni[]" class="form-control" data-validetta="required">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm" id="btnEliminar">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                        <div class="row text-center pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-success btn-sm" id="btnSave">Guardar / Facturar</button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" id="datosDevueltos">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="validetta/validetta.min.js"></script>
    <script src="validetta/validettaLang-es-ES.js"></script>
    <script src="js/dinamico.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>