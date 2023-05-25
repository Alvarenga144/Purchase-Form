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

<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="text-center p-4 text-light">Dynamic purchase form</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive">
                    <form action="php/procesarFactura.php" method="POST" id="formDinamico">
                        <table class="table table-bordered table-dark" id="table1">
                            <tr class="table">
                                <th class="col-2 text-light">Number Ticket</th>
                                <th class="col-5 text-light">Customer</th>
                                <th class="col-5 text-light">Address</th>
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
                        <div class="row text-right pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-sm py-2" id="btnAdd">Add Product
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!--           SEGUNDA TABLA                -->
                        <table class="table table-bordered table-striped table-dark" id="table2">
                            <tr class="table row-12">
                                <th class="col-1 text-light ">Code</th>
                                <th class="col-3 text-light">Product</th>
                                <th class="col-3 text-light">Category</th>
                                <th class="col-2 text-light">Quantity</th>
                                <th class="col-2 text-light">Unit price</th>
                                <th class="col-1 text-light">Actions</th>
                            </tr>
                            <tbody id="tblContenido2">
                                <tr class="tblFila2 row-12">
                                    <td>
                                        <input id="idrow-0" value="0" type="text" name="txtId[]" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="txtNomProducto[]" class="form-control" data-validetta="required">
                                    </td>
                                    <td>
                                        <select name="sCategoria[]" id="sCate" class="form-control" data-validetta="required">
                                            <option value="F">Fruits, Vegetables</option>
                                            <option value="B">Bakery, Coffee</option>
                                            <option value="D">Drinks, Milky</option>
                                            <option value="H">Hygiene, Cleanliness</option>
                                            <option value="W">Wine, Spirits</option>
                                            <option value="G">Groceries, Candies</option>
                                            <option value="M">Meats and Soups</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="txtCantidad[]" class="form-control" data-validetta="required">
                                    </td>
                                    <td>
                                        <input type="text" name="txtPrecioUni[]" class="form-control" data-validetta="required">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm m-auto px-4 py-2 btnDelete" id="btnEliminar" onclick="btnDelete(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        <div class="row text-center pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-success btn-sm py-2" id="btnSave">Save & bill
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                    </svg>
                                </button>
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