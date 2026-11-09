<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Requiero los archivos de clase para incluirlos en este script
        require_once("Autobus.php");
        require_once("Furgoneta.php");
        require_once("Coche.php");
    ?>
<h1>Ejemplo 4: Herencia, Extensión y Polimorfismo</h1>
    <?php
        //Instancio y configuro los vehículos
        $autobus = new Autobus("Volvo","9800 2017","gris","Mario","Desfufor");
        $furgoneta = new Furgoneta("Wolkswagen","Caravelle","blanco","Rebeca",2.2);
        $coche = new Coche("Toyota","Corolla","verde","Marcos");
    ?>
    <div>
        ¿Puedo aparcar el coche en la superficie?:
        <strong><?php echo ($coche->puedeAparcar("superficie")) ? "si" : "no" ?></strong>
    </div>
    <div>
        ¿Puedo aparcar el coche en el subterráneo 2?:
        <strong><?php echo ($coche->puedeAparcar("subterraneo2")) ? "si" : "no" ?></strong>
    </div>
    <div>
        ¿Puedo aparcar la furgoneta en la superficie?:
        <strong><?php echo ($furgoneta->puedeAparcar("superficie")) ? "si" : "no" ?></strong>
    </div>
    <div>
        ¿Puedo aparcar la furgoneta el subterráneo 2?:
        <strong><?php echo ($furgoneta->puedeAparcar("subterraneo2")) ? "si" : "no" ?></strong>
    </div>
    <div>
        ¿Puedo aparcar el autobús en la superficie?:
        <strong><?php echo ($autobus->puedeAparcar("superficie")) ? "si" : "no" ?></strong>
    </div>
    <div>
        ¿Puedo aparcar el autobús el subterráneo 1?:
        <strong><?php echo ($autobus->puedeAparcar("subterraneo1")) ? "si" : "no" ?></strong>
    </div>
    <div>
        ¿A qué empresa pertenece el autobús?:
        <strong><?php echo $autobus->getEmpresa() ?></strong>
    </div>
    <div>
        ¿Cual es la altura de la furgoneta?:
        <strong><?php echo $furgoneta->getAltura() ?></strong>
    </div>
</body>
</html>