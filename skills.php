<?php
function skill()
{
    mysqli_connect("host", "username", "password") or die("Could not connect");
    mysqli_select_db("ecodb") or die("Could not select database");

    # Perform the query
    $query = sprintf("SELECT id, name from mytable WHERE name LIKE '%%%s%%' ORDER BY popularity DESC LIMIT 10", mysql_real_escape_string($_GET["q"]));
    $arr = array();
    $rs = mysqli_query($query);

    # Collect the results
    while ($obj = mysqli_fetch_object($rs)) {
        $arr[] = $obj;
    }

    # JSON-encode the response
    $json_response = json_encode($arr);

    # Optionally: Wrap the response in a callback function for JSONP cross-domain support
    if ($_GET["callback"]) {
        $json_response = $_GET["callback"] . "(" . $json_response . ")";
    }

    # Return the response
    echo $json_response;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="skillstoken/src/jquery.tokeninput.js"></script>

    <link rel="stylesheet" href="skillstoken/styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="skillstoken/styles/token-input-facebook.css" type="text/css" />
</head>

<body>
    <h2>Simple Local Data Search</h2>
    <div>
        <input type="text" id="demo-input-local" name="blah" />
        <input type="button" value="Submit" />
        <script type="text/javascript">
            $(document).ready(function() {
                $("#demo-input-local").tokenInput([{
                        id: 7,
                        name: "Ruby"
                    },
                    {
                        id: 11,
                        name: "Python"
                    },
                    {
                        id: 13,
                        name: "JavaScript"
                    },
                    {
                        id: 17,
                        name: "ActionScript"
                    },
                    {
                        id: 19,
                        name: "Scheme"
                    },
                    {
                        id: 23,
                        name: "Lisp"
                    },
                    {
                        id: 29,
                        name: "C#"
                    },
                    {
                        id: 31,
                        name: "Fortran"
                    },
                    {
                        id: 37,
                        name: "Visual Basic"
                    },
                    {
                        id: 41,
                        name: "C"
                    },
                    {
                        id: 43,
                        name: "C++"
                    },
                    {
                        id: 47,
                        name: "Java"
                    }
                ]);
            });
        </script>
    </div>
</body>

</html>