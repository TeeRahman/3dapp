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

        <div class="hero-container">
            <div class="hero-container-child">
                <div class="hero-container-child-row-1">
                    <div class="r-1-c r-1-c-1">
                        <div class="overlay" ><p class="drinks-content"> <?= $descriptions['Peace Tea'] ?> </p></div>
                    </div>
                    <div class="r-1-c r-1-c-2">
                        <div class="overlay" ><p class="drinks-content"> <?= $descriptions['Coke'] ?> </p></div>
                    </div>
                    <div class="r-1-c r-1-c-3">
                        <div class="overlay" ><p class="drinks-content"> <?= $descriptions['Costa'] ?> </p></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>
</html>

<!-- 
1. Not much going on here. 
2. The $descriptions variable contains data from the database with model descriptions. The variable is initiased within spa.php.
3. Below are AJAX requests made using JQuery. These are requests being made to spa.php for a new view and data which is specific to the button pressed.
4. In this case, when a user clicks on the Coke model, a request is made to provide a view with appropriate data such as comments which will then be displayed. 
-->

<!-- QA CHECK 09/05 -->

<script>

$('.r-1-c-1').click(function() {
        $.ajax({
        url: '../app/views/spa.php',
        type: 'POST',
        data: {functionName: 'peacetea'},
        success: function(response) {
            $("body").empty();
            $("body").html(response);
        }
        });
    });

$('.r-1-c-2').click(function() {
        $.ajax({
        url: '../app/views/spa.php',
        type: 'POST',
        data: {functionName: 'coke'},
        success: function(response) {
            $("body").empty();
            $("body").html(response);
        }
        });
    });

$('.r-1-c-3').click(function() {
        $.ajax({
        url: '../app/views/spa.php',
        type: 'POST',
        data: {functionName: 'costa'},
        success: function(response) {
            $("body").empty();
            $("body").html(response);
        }
        });
    });

</script>


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
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    min-height: 1000px;
}
.hero-container-child {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    font-family: "Abel", sans-serif;
    font-weight: 400;
    padding: 0 10px;
}
.hero-container-child-row-1 {
    height: 40vh;
    min-height: 450px;
    display: flex;
    justify-content: space-between;
}


.r-1-c {
    height: 90%;
    min-height: 150px;
    width: 31%;
    background: green;
    background-position: center;
    background-size: cover;
    border-radius: 5px;
    border: 5px solid black;
}



.r-1-c:hover {
    cursor: pointer;
    padding: 10px;
}

.r-1-c-1 {
    background-image: url('./assets/images/PeaceThumbnail.png');
}

.r-1-c-2 {
    background-image: url('./assets/images/CokeThumbnail.png');
}

.r-1-c-3 {
    background-image: url('./assets/images/CostaThumbnail.png');
}


.overlay {
    height: 100%;
    width: 100%;
    font-size: 0rem;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}

.overlay p {
    width: 90%;
}

.overlay:hover {
    background-color: rgba(0, 0, 0, 0.8);
    font-size: 1.5rem;
    color: #fff;
}




@media (max-width: 1000px) {

    .hero-container {
        min-height: 1400px;
    }

    .hero-container-child-row-1 {
        flex-direction: column;
        height: 85vh;
        min-height: 800px;
        align-items: center;
    }

    .r-1-c {
        width: 60%;
        margin-bottom: 20px; 
        min-width: 200px;
    }

}

</style>