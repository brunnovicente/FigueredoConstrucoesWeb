<?php

foreach ($clientes as $cliente) {
    unset($cliente->generated_html);
}
echo json_encode(compact('clientes'));

?>
