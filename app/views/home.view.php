
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coca Cola - Great Britain</title>
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Aladin&family=Amaranth&family=Gloock&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <div class="app-container">
        <?php
        require "reuse/header.view.php";
        ?>
        
        <div class="hero-container">

            <div class="hero-container-texts">
                <h1 class="hero-container-texts-title">Refreshingly<br>iconic.</h1>
                <p class="hero-container-texts-p">Coca-Cola is a global beverage company with a rich heritage spanning over a century. Committed to promoting sustainability and social responsibility, their portfolio of iconic products and brands has become synonymous with refreshment, enjoyment, and celebration of life's simple pleasures.</p>
                
                <div class="hero-container-texts-b">
                    <p class="hero-container-texts-b-text">Explore Our Drinks</p>
                </div>

                <div class="hero-container-texts-image-hidden"></div>

            </div>

            <div class="hero-container-image"></div>

        </div>

        <?php
        require "reuse/footer.view.php";
        ?>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.hero-container-texts-b').click(function() {
                $.ajax({
                url: '../app/views/spa.php',
                type: 'POST',
                data: {functionName: 'drinks'},
                success: function(response) {
                    $(".hero-container").empty();
                    $(".hero-container").html(response);
                }
                });
            });

            // $('.navlink-home').click(function() {
            //     $.ajax({
            //     url: '../app/views/spa.php',
            //     type: 'POST',
            //     data: {functionName: 'home'},
            //     success: function(response) {
            //         $("body").empty();
            //         $("body").html(response);
            //     }
            //     });
            // });

            // $('.navlink-story').click(function() {
            //     $.ajax({
            //     url: '../app/views/spa.php',
            //     type: 'POST',
            //     data: {functionName: 'story'},
            //     success: function(response) {
            //         $(".hero-container").empty();
            //         $(".hero-container").html(response);
            //     }
            //     });
            // });

            // $('.navlink-drinks').click(function() {
            //     $.ajax({
            //     url: '../app/views/spa.php',
            //     type: 'POST',
            //     data: {functionName: 'drinks'},
            //     success: function(response) {
            //         $(".hero-container").empty();
            //         $(".hero-container").html(response);
            //     }
            //     });
            // });

            // $('.navlink-cokebottle').click(function() {
            //     $.ajax({
            //     url: '../app/views/spa.php',
            //     type: 'POST',
            //     data: {functionName: 'cokebottle'},
            //     success: function(response) {
            //         $("body").empty();
            //         $("body").html(response);
            //     }
            //     });
            // });

            // $('.navlink-coke').click(function() {
            //     $.ajax({
            //     url: '../app/views/spa.php',
            //     type: 'POST',
            //     data: {functionName: 'coke'},
            //     success: function(response) {
            //         $("body").empty();
            //         $("body").html(response);
            //     }
            //     });
            // });

            // $('.navlink-costa').click(function() {
            //     $.ajax({
            //     url: '../app/views/spa.php',
            //     type: 'POST',
            //     data: {functionName: 'costa'},
            //     success: function(response) {
            //         $(".hero-container").empty();
            //         $(".hero-container").html(response);
            //     }
            //     });
            // });

        });



    </script>
    </html>    

<style>
html,
body,
* {
    margin: 0;
    padding: 0;
    width: 100%;
}

body {
    background-color: #F2F4F3;
    min-height: 100vh;
}

.hero-container {
    position: relative;
    z-index: 1;
    height: 87vh;
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    min-height: 800px;
}
.hero-container-texts {
    height: 70%;
    width: 60%;
    padding-left: 50px;
}
.hero-container-texts-title {
    font-family: 'Gloock', sans-serif;
    font-weight: 400;
    color: #DD504A;
    font-size: 6rem;
    letter-spacing: 5px;
}
.hero-container-texts-p {
    font-family: 'Abel', sans-serif;
    font-weight: 400;
    color: #3F4441;
    font-size: 1.8rem;
    letter-spacing: 0.5px;
    margin-top: 30px;
}
.hero-container-texts-b {
    background-color: #DD504A;
    height: 55px;
    width: 280px;
    border-radius: 30px;
    display: flex;
    align-items: center;
    text-align: center;
    color: #F2F4F3;
    font-size: 1.8rem;
    font-family: 'Amaranth';
    font-weight: 400;
    margin-top: 40px;
    letter-spacing: 1px;
}
.hero-container-image {
    margin-left: 40px;
    width: 25%;
    height: 80%;
    background-image: url('./assets/images/coke.svg');
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    transform: rotate(5deg);
}
.hero-container-texts-b:hover {
    background-color: #000000;
    cursor: pointer;
} 

/*    MEDIA QUERIES    */

@media (min-width: 1200px) {
    .nav-hidden {
        display: none;
    }
}

@media (max-width: 900px) {
    .hero-container-image {
        display: none;
    }
    .hero-container-texts-image-hidden {
        height: 30%;
        background-image: url('./assets/images/coke.svg');
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
        transform: rotate(5deg);
        margin-top: 20px;
    }
    .hero-container-texts {
        width: 100%;
        display: flex;
        flex-direction: column;
        padding-right: 50px;
    }
    .hero-container {
        align-items: start;
    }
    .hero-container-texts {
        margin-top: 7%;
        height: 90%;
    }
}

@media (max-width: 700px) {
    .hero-container-texts-title {
        font-size: 4.5rem;
    }
    .hero-container-texts-p {
        font-size: 1.6rem;
    }
}

@media (max-width: 600px) {
    .hero-container-texts-title {
        font-size: 3rem;
    }
    .nav-hidden-tags a {
        font-size: 1.5rem;
    }
}

@media (max-width: 450px) {
    .hero-container-texts {
        padding: 0 20px;
    }
    .hero-container-texts-b {
        height: 39px;
        width: 195px;
    }
    .hero-container-texts-b-text {
        font-size: 1.2rem;
    }
}

@media (max-width: 400px) {
    .hero-container-texts-title {
        font-size: 2.7rem;
    }
    .hero-container-texts-p {
        font-size: 1.4rem;
    }
    .hero-container-texts {
        padding: 0 5px;
    }
}
</style>

<!-- QA PASS 09/03 -->