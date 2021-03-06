        <style>
            @import url(http://fonts.googleapis.com/css?family=Droid+Sans);
            @import url(http://fonts.googleapis.com/css?family=Roboto+Slab);
            * {

                /*with these codes padding and border does not increase it's width.Gives intuitive style.*/

                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            body {
                margin:0;
                padding:0;
                font-family: 'Droid Sans', sans-serif;

            }
            div#envelope{
                width:90%;
                margin: 10px 10px 10px 45px;
                background-color:#f2f4fb;
                padding:10px 0;
                border:1px solid gray;
                border-radius:10px;
            }

            form{
                width:70%;
                margin:0 15%;
            }

            form header {
                text-align:center;
                font-family: 'Roboto Slab', serif;
            }

            /* Makes responsive fields.Sets size and field alignment.*/
            input[type=text], select {
                margin-bottom: 20px;
                margin-top: 10px;
                width:100%;
                padding: 15px;
                border-radius:5px;
                border:1px solid #7ac9b7;
            }

            input[type=submit]
            {
                margin-bottom: 20px;
                width:100%;
                padding: 15px;
                border-radius:5px;
                border:1px solid #7ac9b7;
                background-color:rgb(164, 230, 219);
            }
            textarea{
                width:100%;
                padding: 15px;
                margin-top: 10px;
                border:1px solid #7ac9b7;
                border-radius:5px;
                margin-bottom: 20px;
                resize:none;
            }

            input[type=text]:focus,
            textarea:focus {
                border-color: #4697e4;
            }

            /* By using @ media form can have different layout for screen, mobile phone, tablet.*/

            /* Sets the form layout for mobile phone, tablet*/
            @media screen and (max-device-width: 600px){

                @import url(http://fonts.googleapis.com/css?family=Droid+Sans);
                @import url(http://fonts.googleapis.com/css?family=Roboto+Slab);
                * {

                    /*with these codes padding and border does not increase it's width.Gives intuitive style.*/

                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                }

            }
        </style>	
