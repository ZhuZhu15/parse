<?php 
echo $a . "<br>";

echo $b . "<br>";
//print_r ($c);

//print_r($c->result('Name'));
echo $c->row()->Name . "<br>";
echo $c->row()->Surname . "<br>";
echo $c->row()->Age . "<br>";

foreach ($c->result() as $row)
{
    echo $row->Name . " " . $row->Surname . " " . $row->Age . "<br>";
}

?>

<form method="post">
    <input type="text" value="" name="Name">
    <input type="text" value="" name="Surname">
    <input type="text" value="" name="Age">
    <button type="sumbit" placeholder="отправить" value="отправить">Отправить</button>
</form>