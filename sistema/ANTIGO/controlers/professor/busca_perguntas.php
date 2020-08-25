<?php

$db = new DB();    
$s = $db->select("SELECT * FROM perguntas_questi WHERE id_quest= '$y'");

if($db->rows($s)){

    while( $row = $db->expand($s) ){

    $pergunta= $row['id_pergunta'];

    $search = $db->select("SELECT * FROM perguntas WHERE id= '$pergunta'");

    if($db->rows($search)){

        while( $row2 = $db->expand($search) ){

        ?>

        <h5 style="display: flex;justify-content: space-between;"><?php echo $row2['pergunta'] ?>
        <a href="../../deleta_pergunta/<?php echo $row2['id'] ?>" class="btn btn-default btn-icon-anim btn-square"><i class="fa fa-trash"></i></a></h5>

        
            <div style="width:100%;height:1px;background-color:#CCC;margin-bottom:20px;margin-top:20px"></div>

        <?php

        }
    }


    }
}