<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoración de tu hogar</h1>


        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>


        <div class="resumen-propiedad">

            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                in some
                form, by injected humour, or randomised words which don't look even slightly believable. If you are
                going to use
                a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of
                text.
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making
                this the
                first true generator on the Internet.</p>

            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections
                1.10.32
                and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original
                form,
                accompanied by English.</p>
        </div>

    </main>

<?php 
    incluirTemplate('footer');
?>