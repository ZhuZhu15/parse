<form method="POST">
<input type="date" id="start" name="date"
               value="<?php echo date('Y-m-d') ?>"
               min="2016-06-01" max="<?php echo date('Y-m-d')?>"
            />
<input type="submit"/>
    </div>
    <br>
<?php
    foreach ($html['Valute'] as $valute) {
       echo $valute['Name'] . "(". $valute['CharCode'].")" . " " .$valute['Value'] . "<br/>";
    }
?>