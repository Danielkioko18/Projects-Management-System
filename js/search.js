
function showResult(str) {
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET", "livesearch.php?q=" + str, true);
    xmlhttp.send();
}


< !DOCTYPE html >
    <html lang="en">
        <head>
            <meta charset="UTF-8">
                <title>PHP Live MySQL Database Search</title>
                <style>
                    body{
                        font - family: Arail, sans-serif;
    }
                    /* Formatting search box */
                    .search-box{
                        width: 300px;
                    position: relative;
                    display: inline-block;
                    font-size: 14px;
    }
                    .search-box input[type="text"]{
                        height: 32px;
                    padding: 5px 10px;
                    border: 1px solid #CCCCCC;
                    font-size: 14px;
    }
                    .result{
                        position: absolute;
                    z-index: 999;
                    top: 100%;
                    left: 0;
    }
                    .search-box input[type="text"], .result{
                        width: 100%;
                    box-sizing: border-box;
    }
                    /* Formatting result items */
                    .result p{
                        margin: 0;
                    padding: 7px 10px;
                    border: 1px solid #CCCCCC;
                    border-top: none;
                    cursor: pointer;
    }
                    .result p:hover{
                        background: #f2f2f2;
    }
                </style>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $('.search-box input[type="text"]').on("keyup input", function () {
                            /* Get input value on change */
                            var inputVal = $(this).val();
                            var resultDropdown = $(this).siblings(".result");
                            if (inputVal.length) {
                                $.get("backend-search.php", { term: inputVal }).done(function (data) {
                                    // Display the returned data in browser
                                    resultDropdown.html(data);
                                });
                            } else {
                                resultDropdown.empty();
                            }
                        });

                    // Set search input value on click of result item
                    $(document).on("click", ".result p", function(){
                        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
    });
});
                </script>
        </head>
        <body>
            <div class="search-box">
                <input type="text" autocomplete="off" placeholder="Search country..." />
                <div class="result"></div>
            </div>
        </body>
    </html>