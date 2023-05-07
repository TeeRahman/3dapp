<div class="footer-container">
        <p id="origin">Statement of Originality + References</p>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $('#origin').click(function() {
        $.ajax({
            url: '../app/views/spa.php',
            type: 'POST',
            data: {functionName: 'origin'},
            success: function(response) {
                $('body').empty();
                $('body').html(response);
            }
        });
    });

</script>

<style>
    .footer-container {
        height: 5vh;
        min-height: 50px;
        background-color: #DD504A;
        display: flex;
        text-align: center;
        align-items: center;
        font-family: 'Amaranth', sans-serif;
        font-weight: 400;
        font-size: 1rem;
        color: #3F4240;
    }

    #origin:hover {
        cursor: pointer;
    }
    
</style>

<!-- QA PASS 09/03 -->