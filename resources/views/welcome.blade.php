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
                justify-content: center;
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

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
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
            <div class="content">
                <p>
                No Authentication / Access Token is needed as not requested in the exercise. 
                <div>
                Please access the api via /api/tech_exercise.
                Routes requested in document :
                </div>
                <div>
                <span>Available Routes:</span>
                <ul>
                    <li>Route::get('/tech_exercise/get_all_records','ApiMaster@getAllResults');</li>
                    <li>Route::post('/tech_exercise/', 'ApiMaster@createEntry');</li>
                    <li>Route::get('/tech_exercise/{keyName}', 'ApiMaster@retrieve');</li>
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
