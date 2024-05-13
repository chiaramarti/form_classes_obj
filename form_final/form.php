<?php

class Form
{
    private $html = '';
    private $method;
    private $action;

    public function __construct($method, $action)
    {
        $this->method = $method;
        $this->action = $action;
    }

    public function addLabel($labelName, $id)
    {
        $this->html .= "<label for='$id'>$labelName:</label><br>";
    }

    public function addInput($type, $name, $value, $id)
    {
        $this->html .= "<input type='$type' name='$name' value='$value' id='$id'><br>";
    }

    public function render()
    {
        echo "<form method='{$this->method}' action='{$this->action}'>";
        echo $this->html;
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    }
}

$myForm = new Form('POST', 'action.php');

$myForm->addLabel('Name', 'id-for1');
$myForm->addInput('text', 'name', '', 'id-for1');

$myForm->addLabel('Surname', 'id-for2');
$myForm->addInput('text', 'surname', '', 'id-for2');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php $myForm->render(); ?>
</body>

</html>