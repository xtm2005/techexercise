<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: left;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .content.fiftypercent {
                width: 75vw;
                margin: 0 auto;
                text-align: left;
            }

            .title {
                font-size: 84px;
            }
            .notice {
                font-size:30px;
                padding-bottom:5px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content fiftypercent">
                <p>
                <div class="notice">
                No Authentication / Access Token is needed 
                <br />as not requested in the exercise.
                </div> 
                <div>
                Please access the api via /api/tech_exercise.
                Routes requested in document : <br />
                </div>
                
                <div>

                <span style="padding-top: 9px;display: block;"><strong>Available Routes:</strong></span>
                <ul>
                    <li>get('/tech_exercise/get_all_records'</li>
                    <li>post('/tech_exercise/'</li>
                    <li>get('/tech_exercise/{keyName}'</li>
                </ul>
                Example :<br />
                GET - https://techexercise2021.herokuapp.com/api/tech_exercise
                
                <br />
                JSON Body - {"anothervalue":"new value has been sent x "}
                <br />
                Response :

                {
                   "message": "created at 2021-05-22 14:41:58 : timestamp value = 1621694518"
                }

                </p>
            <div>
        </div>
    </body>
</html>
