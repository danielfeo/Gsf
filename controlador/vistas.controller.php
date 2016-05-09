<?php

if ($_POST['vista'] == '1') 
{ ?>
          <div id="DIV_CONTENEDOR" class="">
               <?php
                  include_once ("../vistas/register.php");
                ?>
          </div>
        <?php 
}
if ($_POST['vista'] == '2') 
{ ?>
          <div id="DIV_CONTENEDOR" class="">
               <?php
                  include_once ("../vistas/login.php");
                ?>
          </div>
        <?php 
}
if ($_POST['vista'] == '3') 
{ ?>
          <div id="DIV_CONTENEDOR" class="">
               <?php
                  include_once ("../vistas/user.php");
                ?>
          </div>
        <?php 
}
if ($_POST['vista'] == '4') 
{ ?>
          <div id="DIV_CONTENEDOR" class="">
               <?php
                  include_once ("../vistas/admin.php");
                ?>
          </div>
        <?php 
}
if ($_POST['vista'] == '5') 
{ ?>
          <div id="DIV_CONTENEDOR" class="">
               <?php
                  include_once ("../vistas/super.php");
                ?>
          </div>
        <?php 
}

if ($_POST['vista'] == '6') 
{ ?>
          <div id="DIV_CONTENEDOR" class="">
               <?php
                  include_once ("../vistas/asignador.php");
                ?>
          </div>
        <?php 
}


        ?>
