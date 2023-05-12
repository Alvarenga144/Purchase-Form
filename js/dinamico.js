jQuery(function(){
    // agregar producto
    $('#btnAdd').on('click', function(e){
        e.preventDefault()
        var i = $('.tblFila2').length
        //console.log(i)
        var filas = `<tr class="tblFila2 row-12">
        <td>
            <input type="text" name="txtNomProducto[]" class="form-control" data-validetta="required">
        </td>
        <td>
            <select name="sCategoria" id="sCategoria" class="form-control" data-validetta="required">
                <option value="Lacteos">Lacteos</option>
                <option value="Verduras">Verduras</option>
                <option value="Bebidas">Bebidas</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Carnes">Carnes</option>
            </select>
            </td>                                    
            <td>
                <input type="number" name="txtCantidad[]" class="form-control" data-validetta="required, number">
            </td>
            <td>
                <input type="text" name="txtPrecioUni[]" class="form-control" data-validetta="required, number">
            </td>
            <td>
                <button type="button" class="btn btn-outline-danger btn-sm" id="btnEliminar">Eliminar</button>
            </td>
        </tr>`;

        $('#tblContenido2').append(filas)
    })

    $('#btnSave').on('click', function(a){
        $('#formDinamico').validetta({
            realTime: true,
            onValid: function(r){
                r.preventDefault()
                a.preventDefault()
                Swal.fire({
                    icon : 'question', 
                    title : 'Desea enviar el formulario',
                    confirmButtonText : 'si', 
                    showDenyButton : true,
    
                }).then((result)=> {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:$('#formDinamico').attr('method'),
                            url:$('#formDinamico').attr('action'),
                            data:$('#formDinamico').serialize(),
                            success: function(response){
                                //console.log(response)
                                $('#datosDevueltos').html(response)
                                //$('#tblContenido>tr').remove()
                            },
                            error: function(){
                                console.log("Error")
                            }
                        })
                    }else if (result.isDenied) {
                        console.log("operation canceled")
                    }
                })
            }

        })
    })


    
})

