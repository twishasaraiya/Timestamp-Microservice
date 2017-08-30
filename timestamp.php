<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Timestamp Microservice</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class='container'>
        <?php
        $site=$_SERVER['SERVER_NAME'].'/timestamp.php';
        $time=array();
        $format='F d,Y';
        //check if request was made
            if(empty(basename($_SERVER['PATH_INFO']))){
                echo '<div class="container">
                    <h1>API Basejump: Timestamp microservice</h1>
                    <blockquote>User stories:
                        <ol>
                            <li> can pass a string as a parameter, and it will check to see whether that string contains either a unix timestamp or a natural language date (example: January 1, 2016)</li>
                            <li>If it does, it returns both the Unix timestamp and the natural language form of that date.</li>
                            <li>If it does not contain a date or Unix timestamp, it returns null for those properties.</li>
                        </ol>
                    </blockquote>
                    <p>
                        <h2>Example usage:</h2>
                        <p><code>https://timestamp-ms.herokuapp.com/December%2015,%202015</code></p>
                        <p><code>https://timestamp-ms.herokuapp.com/1450137600</code></p>
                    </p>
                    <p>
                        <h2>Example output:</h2>
                        <code>{ "unix": 1450137600, "natural": "December 15, 2015" }</code>
                    </p>
                </div>';
            }else{
                $date=urldecode(basename($_SERVER['PATH_INFO']));
                //echo $date;
                //input is a unix timestamp
                //strtotime will return false if $date is timestamp
                if(!strtotime($date) && is_numeric($date)){
                    $time=[
                        'Unix'=>$date,
                        'Natural'=>date($format,$date)
                    ];
                    echo json_encode($time);
                }else{
                    //input is natural date;
                    $time=[
                        'Unix' => strtotime($date),
                        'Natural' => $date
                    ];
                    echo json_encode($time);
                }
            }
         ?>
    </body>
</html>
