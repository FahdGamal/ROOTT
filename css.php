<?php
session_start();


include_once './include/header.php';
include_once './include/nav.php';

if (isset ($_SESSION['user_id'])){
    header("Location: ./css.php");
    exit();
}else {
    header("Location:./login.php");
    exit();
}

?>


<!-- courseCss Start -->
<section>

    <div class="text-center p-4">
        <h6 class="section-title bg-white text-center text-primary px-4 h3">Course Css</h6>
    </div>


    <div class="container  border-3 border-secondary ">
        <div class="row g-5">

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_1 _ CSS Syntax _ كيفية كتابة css(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5> CSS Syntax </h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_2 priority in css(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>priority in css</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_3 تعلم ال selectors in css _ class id tag(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>selectors in css</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/بداية كورس css بالعربي _ تعلم css بسهولة(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5> direct child Selector</h5>
                </div>
            </div>



            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_5 شرح كامل عن box model _ border- margin - padding(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>box model and border and margin</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_6 شرح margin auto(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>margin auto</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_7 شرح النسبة المئوية في css(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>width and height </h5>
                </div>
            </div>


            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_8 شرح fit content - min content - max content(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>min content and max content</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_9 شرح خاصية max_min width - max_min height(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>max_min width and max_min height</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_10 شرح كامل لخاصية border radius(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>border radius</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_11 الفرق بين inline _ block(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>inline and block</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_12 شرح بالتفصيل عن خاصية text align(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>text align</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_13 شرح بالتفصيل عن خاصية direction(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>direction</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_14 شرح بالتفصيل عن خاصية text transform(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>text transform</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_15 شرح بالتفصيل عن خاصية text spacing(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>text spacing</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_16 شرح بالتفصيل عن خاصية text decoration(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>text decoration</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_17 شرح بالتفصيل الفرق بين text shadow - box shadow(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>text shadow and box shadow</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_18 شرح بالتفصيل عن خاصية wrapping  و white space(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>wrapping and white space</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_19 شرح بالتفصيل عن خاصية font family(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>font family</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_20 شرح بالتفصيل عن خاصية  font size(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5> font size</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_21 شرح بالتفصيل عن خاصية  font style(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5> font style</h5>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_22 شرح بالتفصيل عن خاصية  font variant(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5> font variant</h5>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_23 شرح بالتفصيل عن خاصية  font weight(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5> font weight</h5>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="bg-light">
                    <video controls width="100%" height="100%">
                        <source src="vedios/Css/_24 شرح بالتفصيل عن خاصية  font shorthand(720P_HD).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5> font shorthand</h5>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- courseCss End -->

<?php
include_once './include/footer.php';
?>