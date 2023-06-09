jQuery(function () {
    // agregar producto
    $('#btnAdd').on('click', function (e) {
        e.preventDefault()
        var i = $('.tblFila2').length
        //console.log(i)
        var idcount = i++;
        var filas = `<tr class="tblFila2 row-12">
                        <td>
                            <input id="idrow-`+idcount+`" value="`+idcount+`" type="text" name="txtId[]" class="form-control" readonly>
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
                    </tr>`;

        $('#tblContenido2').append(filas)
    })

    // Procesar Factura
    $('#btnSave').on('click', function (a) {
        $('#formDinamico').validetta({
            realTime: true,
            onValid: function (r) {
                r.preventDefault()
                a.preventDefault()
                Swal.fire({
                    icon: 'question',
                    title: 'Can you Save and Bill?',
                    confirmButtonText: 'Yes',
                    showDenyButton: true,

                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: $('#formDinamico').attr('method'),
                            url: $('#formDinamico').attr('action'),
                            data: $('#formDinamico').serialize(),
                            success: function (response) {
                                //console.log(response)
                                $('#datosDevueltos').html(response)
                                $('#tblContenido').remove()
                            },
                            error: function () {
                                console.log("Error")
                            }
                        })
                    } else if (result.isDenied) {
                        console.log("operation canceled")
                    }
                })
            }

        })
    })

})

const codeinput = document.getElementById('number-ticket'); 
const nombreClie = document.getElementById('txtNombreCliente');

nombreClie.addEventListener('click', ticketNumber)

function ticketNumber () {
    //alert('funcionaaa')
    let random = Math.floor(Math.random() * 10000) + 1;
    codeinput.setAttribute('value', random);
}


function btnDelete (row) {
    $(row).parent().parent().remove();
}