<?php
    function encode($input) {
        if(preg_match("/[^a-zA-Z0-9]/", $input))
            return "Error: Input wrong format";

        $result = "";
        for($i=0;$i<strlen($input);$i++) {
            $ascii = ord($input[$i]);
            if($ascii == 120 || $ascii == 121 || $ascii == 122 || $ascii == 88 || $ascii == 89 || $ascii == 90) {
                $ascii -= 26;
            }
            if($ascii == 55 || $ascii == 56 || $ascii == 57)
                $ascii -= 10;
            $result .= chr($ascii+3);
        }
        return $result;
    }

    function decode($input) {
        if(preg_match("/[^a-zA-Z0-9]/", $input))
            return "Error: Input wrong format";

        $result = "";
        for($i=0;$i<strlen($input);$i++) {
            $ascii = ord($input[$i]);
            if($ascii == 97 || $ascii == 98 || $ascii == 99 || $ascii == 65 || $ascii == 66 || $ascii == 67) {
                $ascii += 26;
            }
            if($ascii == 48 || $ascii == 49 || $ascii == 50)
                $ascii += 10;
            $result .= chr($ascii-3);
        }
        return $result;
    }

    $input = $output = "";
    if(isset($_POST['input']) && isset($_POST['submit'])) {
        $input = $_POST['input'];
        if($_POST['submit'] == 'Encode')
            $output = encode($_POST['input']);
        else
            $output = decode($_POST['input']);
    }

?>

<form action="" method='post'>
    <table>
        <tr>
            <td>Input:</td>
            <td><input type="text" name='input' value='<?=$input?>'></td>
        </tr>
        <tr>
            <td>Output:</td>
            <td><input type="text" name='output' value='<?=$output?>'></td>
        </tr>
        <tr>
            <td colspan=2><input type='submit' name='submit' value='Encode'> <input type='submit' name='submit' value='Decode'></td>
        </tr>
    </table>
</form>