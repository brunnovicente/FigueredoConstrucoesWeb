<?php

foreach ($produtos as $produto) {
    unset($produto->generated_html);
}
echo json_encode(compact('produtos'));

?>