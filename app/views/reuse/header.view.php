
        <div class="nav-container">

            <div class="nav-container-logo">
                <a href="/W3D Coursework/public" class="nav-container-logo-coca">Coca Cola</a>
                <p class="nav-container-logo-tag">A World of Flavours</p>
            </div>

            <div class="nav-container-navlink">
                <p class="nav-container-navlink-p"><a class="navlink navlink-home">HOME</a> <a class="navlink navlink-story">OUR STORY</a> <a class="navlink navlink-drinks">DRINKS</a></p>
                <p class="nav-container-navlink-p2"><a class="navlink navlink-peacetea">{PEACE TEA 3D}</a> <a class="navlink navlink-coke">{COKE 3D}</a> <a class="navlink navlink-costa">{COSTA COFFEE 3D}</a></p>
            </div>

            <div class="nav-container-menu">
                <svg id='burgerMenu' viewBox="0 0 24 24">
                    <path d="M2 5H22V7H2V5ZM2 12H22V14H2V12ZM2 19H22V21H2V19Z" fill="#3F4240"/>
                </svg>
            </div>

        </div>

        <div id="navHidden" class="nav-hidden">
            <div class="nav-hidden-tags">
                <a class="navlink navlink-home">HOME</a>
                <a class="navlink navlink-story">OUR STORY</a>
                <a class="navlink navlink-drinks">DRINKS</a>
                <a class="navlink navlink-peacetea">{PEACE TEA 3D}</a>
                <a class="navlink navlink-coke">{COKE 3D}</a>
                <a class="navlink navlink-costa">{COSTA COFFEE 3D}</a>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $('#burgerMenu').click(function() {
        $('#navHidden').toggleClass('nav-show')
    })

    $('.navlink-home').click(function() {
        $.ajax({
        url: '../app/views/spa.php',
        type: 'POST',
        data: {functionName: 'home'},
        success: function(response) {
            $("body").empty();
            $("body").html(response);
        }
        });
    });

    $('.navlink-story').click(function() {
        $.ajax({
        url: '../app/views/spa.php',
        type: 'POST',
        data: {functionName: 'story'},
        success: function(response) {
            $(".hero-container").empty();
            $(".hero-container").html(response);
        }
        });
    });

    $('.navlink-drinks').click(function() {
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

    $('.navlink-peacetea').click(function() {
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

    $('.navlink-coke').click(function() {
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

    $('.navlink-costa').click(function() {
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

    $('.nav-hidden').click(() => {
        $('#navHidden').toggleClass('nav-show')
    })
</script>

<style>

.nav-hidden {
    width: 100%;
    height: 0;
    overflow: hidden;
    visibility: hidden;
    transition: height 0.5s, visibility 0s 0.5s;
    position: absolute;
    background-color: rgba(32, 29, 29, 0.5);
    z-index: 2;
}
.nav-show {
    height: 87vh;
    min-height: 800px;
    visibility: visible;
    transition: height 0.5s, visibility 0s;
}
.nav-hidden-tags {
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    height: 87vh;
    text-align: center;
}
.nav-hidden-tags a {
    text-decoration: none;
    color: white;
    font-family: 'Amaranth';
    font-weight: 400;
    font-size: 2rem;
}

.nav-container {
    max-width: 1600px;
    height: 8vh;
    min-height: 100px;
    margin: 0 auto;
    display: flex;
}
.nav-container-logo {
    flex: 1;
    font-family: 'Aladin', sans-serif;
    font-weight: 400;
    min-width: 200px;
}
.nav-container-logo a {
    text-decoration: none;
}
.nav-container-logo-coca {
    color: #DD504A;
    font-size: 2.7rem;
    letter-spacing: 1px;
}
.nav-container-logo-tag {
    font-size: 0.8rem;
    letter-spacing: 1px;
    line-height: 1px;
}
.nav-container-menu {
    flex: 1;
    min-width: 50px;
}
.nav-container-navlink {
    flex: 6;
}
.nav-container-navlink-p a {
    margin: 0 30px;
    text-decoration: none;
    color: #3F4240;
    font-family: 'Amaranth', sans-serif;
    font-weight: 400;
    font-size: 1.4rem;
}
.nav-container-navlink-p2 a {
    margin: 0 7px;
    text-decoration: none;
    color: #575C59;
    font-family: 'Amaranth', sans-serif;
    font-weight: 400;
}
.nav-container-navlink-p,
.nav-container-navlink-p2 {
    padding: 5px 0;
}

.nav-container-logo,
.nav-container-menu,
.nav-container-navlink {
    height: 100%;
    display: flex;
    justify-content: center;
    text-align: center;
    flex-direction: column;
    font-size: 0.9rem;
}
.nav-container-menu svg {
    width: 40%;
    height: 40%;
    min-width: 30px;
    min-height: 30px;
    display: none;
}
.nav-container-menu svg:hover {
    cursor: pointer;
}
.nav-container-logo-coca:hover {
    cursor: pointer;
}
.navlink:hover {
    cursor: pointer;
}

/**     MEDIA QUERIES   **/

@media (min-width: 1200px) {
    .nav-hidden {
    display: none;
    }
}

@media (max-width: 1200px) {
    .nav-container-navlink-p,
    .nav-container-navlink-p2 {
        display: none;
    }
    .nav-container-menu svg {
        display: block;
    }
}

@media (max-width: 600px) {
    .nav-hidden-tags a {
        font-size: 1.5rem;
    }
}

@media (max-width: 450px) {
    .nav-container-logo-coca {
        font-size: 2rem;
    }
    .nav-container-logo-tag {
        font-size: 0.7rem;
    }
}

</style>

<!-- QA PASS 09/03 -->