<?php 
    //echo '<pre>';
    //print_r($_POST)
    
    if(!empty($_POST)){
        $table = '<table class="table table-warning">
        <tr>
            <td><b>Ticket Number</b></td>
            <td><b>Cliente Name</b></td>
        </tr>
        <tr>
            <td>'.$_POST['txtNumFactura'].'</td>
            <td>'.$_POST['txtNombre'].'</td>
        </tr>
        <tr>
            <td><b>Product</b></td>
            <td><b>Category</b></td>
            <td><b>Quantity</b></td>
            <td><b>Unit Price</b></td>
            <td><b>Sub Total</b></td>
        </tr>';

        //variables para las formulas
        $cantidadUni[] = 0;
        $cantidadparseada[] = 0;

        $precioUni[] = 0;
        $precioUniParseado[] = 0;

        $totalProducto[] = 0;
        $totalFinal = 0;


        for ($i=0; $i < count($_POST['txtId']); $i++) { 

            $table .= '<tr>
                <td>'.$_POST['txtId'][$i].'</td>
                <td>'.$_POST['txtNomProducto'][$i].'</td>
                <td>'.$_POST['sCategoria'][$i].'</td>';

                $cantidad[$i] = ($_POST['txtCantidad'][$i]);
                $precioUni[$i] = ($_POST['txtPrecioUni'][$i]);

                $table .= '<td>'.$cantidad[$i].'</td>
                <td> $'.$precioUni[$i].'</td>';

                $cantidadparseada[$i] = (int) ($cantidad[$i]);
                $precioUniParseado[$i] = (float) $precioUni[$i];

                $totalProducto[$i] = $cantidadparseada[$i] * $precioUniParseado[$i];
                $totalFinal += $totalProducto[$i];

                //echo $totalProducto[$i];
                //var_dump($cantidadparseada[$i]);die;

                $table .= '<td> $'.$totalProducto[$i].'</td>
            </tr>';
            
        }

        $table .= '<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>TOTAL:</b></td>
            <td>$'.$totalFinal.'</td>

        </tr>';

        $table .= '</table>';

        echo $table;
    }
?>