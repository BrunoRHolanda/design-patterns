<?php
/**
 * Inicia as instâncias e dependências do app
 *
 */
require '../../vendor/autoload.php';

use Pattern\Multiton\Tema;

$fire = Tema::getInstance(Tema::FIRE);
$sky = Tema::getInstance(Tema::SKY);

?>
<html>
    <head>
        <title>Multiton</title>
        <style>
            .container {
                width: 700px;
                height: 500px;
                font-size: x-large;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
            }

            .sky {
                background-color: <?php echo $sky->getBackground(); ?>;
                color: <?php echo $sky->getColor(); ?>;
                
            }
            .fire {
                background-color: <?php echo $fire->getBackground(); ?>;
                color: <?php echo $fire->getColor(); ?>;
            }
        </style>
    </head>
    <body>
        <div class="container sky">
            <p>Tema SKY</p>
        </div>
        <div class="container fire">
            <p>Tema Fire</p>
        </div>
    </body>
</html>
