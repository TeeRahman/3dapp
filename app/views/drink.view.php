
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coca Cola - Great Britain</title>
    <script type='text/javascript' src='http://www.x3dom.org/download/x3dom.js'> </script> 
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Aladin&family=Amaranth&family=Gloock&display=swap" rel="stylesheet">

</head>

<body>
    <div class="app-container">
        <?php
        require "reuse/header.view.php";
        ?>

        <div class="hero-container">

                <div class="hero-container-child"> 

                    <div class="hero-container-child-row-1 ">
                        <div id="r-1-c-1">
                            <x3d id='wire' width="100%" height="100%">
                                <scene>
                                    <inline id='model-inline' nameSpaceName="model" mapDEFToID="true" url="./assets/x3d/<?= $endpoint ?>.x3d">
                                </scene>
                            </x3d>
                        </div>
                        <div id="r-1-c-2">
                            <div class="slides-image"></div>
                            <div class="slides-image-overlay overlay-msg-0" style="display: none;"><p> <?= $drinksData['coke'] ?> </p></div>
                            <div class="slides-image-overlay overlay-msg-1" style="display: none;"><p> <?= $drinksData['fanta'] ?> </p></div>
                            <div class="slides-image-overlay overlay-msg-2" style="display: none;"><p> <?= $drinksData['sprite'] ?> </p></div>
                        </div>
                    </div>

                    <div class="hero-container-child-row-2">

                        <div class="default-text" id="r-2-c-1">
                            <h3>CAMERA</h3>
                            <div class="control-buttons">
                                <div id="c-b-one" class="control-button-one" onclick="onPreView()">DEFAULT</div>
                                <div id="c-b-two" class="control-button-two" onclick="onFrontView()">FRONT</div>
                                <div id="c-b-three" class="control-button-three" onclick="onTopView()">TOP</div>
                                <div id="c-b-four" class="control-button-four" onclick="onBottomView()">BOTTOM</div>
                            </div>
                            <p>Toggle the model view.</p>
                        </div>
                        <div class="default-text" id="r-2-c-2">
                            <h3>ANIMATION & ZOOM</h3>
                            <div class="control-buttons">
                                <div id="c-b-five" class="control-button-one">STOP</div>
                                <div id="c-b-six" class="control-button-two">SPIN</div>
                                <div id="c-b-seven" class="control-button-three" onclick="onZoom('+')">+ ZOOM</div>
                                <div id="c-b-eight" class="control-button-four" onclick="onZoom('-')">- ZOOM</div>
                            </div>
                            <p>Enjoy the model through animations!</p>
                        </div>
                        <div class="default-text" id="r-2-c-3">
                            <h3>RENDER</h3>
                            <div class="control-buttons">
                                <div id="c-b-nine" class="control-button-one">DEFAULT</div>
                                <div id="c-b-ten" class="control-button-two">WIRE</div>
                                <div id="c-b-eleven" class="control-button-three" onclick="onTexture()">TEXTURE</div>
                                <div id="c-b-twelve" class="control-button-four" onclick="onScene()">SCENE</div>
                            </div>
                            <p>Interested in different renders?</p>
                        </div>
                    </div>

                    <div class="hero-container-child-row-3">
                        <div class="comments-section" id="r-3-c-1">
                            <h3>COMMENTS SECTION</h3>
                                <?php 
                                    foreach ($commentsData as $comment) {
                                        echo "<div class='comment-container'>" .
                                                "<h3 class='comment'>" . $comment[2] . "</h3>" .
                                                "<p class='comment-info'>" . $comment[0] . " ~ " . $comment[1] . "</p>" .
                                             "</div>";
                                    }
                                ?>
                        </div>
                    </div>

                </div>
            </div>

        <?php
        require "reuse/footer.view.php";
        ?>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>

    if (typeof images === 'undefined') {
        const images = ['./assets/images/coke-can.png', './assets/images/fanta-can.png', './assets/images/sprite-can.png']
        const slide = $('.slides-image')
        let index = 0
    

    function changeImage() {
        const imageUrl = images[index]
        index = (index + 1) % images.length

        const img = new Image();
        img.onload = () => {
            slide.css('background-image', `url(${imageUrl})`).addClass('loaded')
        }
        img.src = imageUrl

        slide.removeClass('loaded')
        changeOverlay(index - 1)
    }
    
    function changeOverlay(index) {
        let hideIndex = (index - 1 + images.length) % images.length
        let showIndex = index < 0 ? images.length - 1 : index
        $(`.overlay-msg-${hideIndex}`).hide()
        $(`.overlay-msg-${showIndex}`).show()
    }


    changeImage()
    
    setInterval(() => {
        changeImage()
    }, 30000);

}


if (typeof spinning === 'undefined') {
    let spinning = false
    let wireCount = 0

    function onSpin() {
        spinning = !spinning
        document.getElementById('model__RotationTimer').setAttribute('enabled', spinning.toString())
    }

    function onWire() {
        wireCount ++
        let e = document.getElementById('wire')
        e.runtime.togglePoints(true)
        e.runtime.togglePoints(true)
    }

    $('#c-b-five').click(() => {
        if (spinning) onSpin()
    })

    $('#c-b-six').click(() => {
        onSpin()
    })

    $('#c-b-nine').click(() => {
        $('#r-1-c-1').css("background-color", '#FBD1CF')
        while (wireCount % 3) onWire()
        let rl = $('#model__Texture').attr('url')
        let newUrl = rl.substring(0, rl.indexOf('_X')) + rl.substring(rl.indexOf('_X') + 2);
        $('#model__Texture').attr('url', newUrl)
    })

    $('#c-b-ten').click(() => {
        onWire()
    })
}

function onPreView() {
    document.getElementById('model__Camera 1').setAttribute('bind', 'true');
}

function onTopView() {
    document.getElementById('model__Camera 2').setAttribute('bind', 'true');
}

function onBottomView() {
    document.getElementById('model__Camera 3').setAttribute('bind', 'true');
}

function onFrontView() {
    document.getElementById('model__Camera 4').setAttribute('bind', 'true');
}

function onZoom(sign) {
    let e = document.getElementById('wire')
    e.runtime.zoom(`${sign}600`)
}

function getRandomColour() {
  let letters = "0123456789ABCDEF";
  let color = "#";
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function onScene() {
    $('#r-1-c-1').css("background-color", getRandomColour())
}

function onTexture() {
    let rl = $('#model__Texture').attr('url')
    let newUrl = rl.substring(0, rl.length -5)  + '_X' + rl.substring(rl.length -5)
    $('#model__Texture').attr('url', newUrl)
}

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
    min-height: 900px;
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
    height: 50vh;
    min-height: 450px;
    display: flex;
    justify-content: space-between;
}
.hero-container-child-row-2,
.hero-container-child-row-3 {
    min-height: max(112.5px, 12.5vh);
    display: flex;
    justify-content: space-between;
}

.hero-container-child-row-3 {
    height: auto;
}

.hero-container-child-row-3 h3 {
    text-align: center;
    margin-top: 1%;
}

.hero-container-child-row-1,
.hero-container-child-row-2,
.hero-container-child-row-3 {
    margin-bottom: 4vh;
}

#r-1-c-1 {
    width: 65%;
    height: 100%;
    border: 4px solid black;
    background-color: #FBD1CF;
    border-radius: 5px;
}
#r-1-c-2 {
    width: 30%;
    height: 100%;
    border: 4px solid black;
    background-color: #F9F9F9;
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
}
#r-2-c-1,
#r-2-c-2,
#r-2-c-3 {
    width: 30%;
    height: 100%;
    border: 4px solid #984D88;
    background-color: #F9F9F9;
    border-radius: 5px;
}
#r-3-c-1 {
    width: 100%;
    height: 100%;
    border: 4px solid #3D5075;
    background-color: #F9F9F9;
    border-radius: 5px;
    display: flex;
    flex-direction: column;
}
#r-3-c-1 p {
    width: 95%;
    margin: 0 auto;
}

.default-text {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    text-align: center;
}

.control-buttons {
    max-width: 320px;
    width: 100%;
    display: flex;
    justify-content: space-around;
}
.control-button-one,
.control-button-two,
.control-button-three,
.control-button-four {
    width: fit-content;
    padding: 3px 10px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 500;
}
.control-button-one {
    background-color: #009C63;
    border-radius: 10px;
}
.control-button-two,
.control-button-three,
.control-button-four {
    background-color: #9068E9;
    border-radius: 10px;
}
.control-button-one:hover {
    cursor: pointer;
    font-size: 1.2rem;
    background-color: #00CD82;
}
.control-button-two:hover {
    cursor: pointer;
    font-size: 1.2rem;
    background-color: #B18EFF;
}
.control-button-three:hover {
    cursor: pointer;
    font-size: 1.2rem;
    background-color: #7F7F7F;
}
.control-button-four:hover {
    cursor: pointer;
    font-size: 1.2rem;
    background-color: #7F7F7F;
}

.comment-section h3{
    margin-bottom: 5px;
}

.comment-container {
    background-color: #F0F0F0;
    min-height: 50px;
    width: 90%;
    margin: 5px auto;
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    padding: 5px;
}

.comment {
    font-size: 1.1rem;
    font-weight: bold;
}

.comment-info {
    color: #6A6A6A;
}

.slides-image {
    height: 80%;
    width: 100%;
    background-image: url("../../public/assets/images/coke-can.png");
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    transition: opacity 1s, background-image 1s;
    opacity: 0;
}
.loaded {
    opacity: 1;
}
.slides-image-overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 0rem;
    text-align: center;
}

.slides-image-overlay p {
    width: 90%;
}
.slides-image-overlay:hover {
    background-color: rgba(0, 0, 0, 0.5);
    font-size: 1rem;
  }

/**     MEDIA QUERIES   **/

@media (max-width: 1000px) {
    .hero-container-child-row-1,
    .hero-container-child-row-2 {
        flex-direction: column;
    }

    .hero-container-child-row-2 {
        height: 30%;
    }

    #r-1-c-1,
    #r-1-c-2 {
        height: 50%;
    }
    #r-1-c-1,
    #r-1-c-2,
    #r-2-c-1,
    #r-2-c-2,
    #r-2-c-3,
    #r-3-c-1 {
        width: 100%;
        margin: 10px 0;
    }
}

@media (max-width: 550px) {
    .hero-container-child {
        font-size: 0.9rem;
    }
}

@media (max-width: 400px) {
    .hero-container-child-row-3 {
        height: 20%;
    }
}

/** QA PASS 09/03 **/
</style>

<!-- QA PASS 09/03 -->