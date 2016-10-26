SELECT solicitud.*
FROM
    `gestor_solicitudes`.`usuario`
    INNER JOIN `gestor_solicitudes`.`solicitud` 
        ON (`usuario`.`id` = `solicitud`.`id_usuario`) WHERE `documento` =1070952417 ;