<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(210, 225, 236);
        margin: 0;
        padding: 0;
        text-align: justify;
    }
    .about-container {
        padding: 20px;
        max-width: 800px;
        margin: auto;
        line-height: 1.6;
        color: #333;
    }
    h1, h2, h3 {
        color: #005f99;
    }
    ul {
        padding-left: 20px;
    }
    li {
        margin-bottom: 10px;
    }
</style>

<div class="about-container">
    <h1>Acerca de Nosotros</h1><br>
    <h3><img class="iconoMenu" src='/marketplace/public/img/iconos/cog-outline.svg'>Misión</h3>
    <p>
        Proveer una plataforma intuitiva, accesible, inclusiva y personalizada que permita a todos buscar servicios cotidianos en su entorno más inmediato, superando las barreras tecnológicas, las limitaciones geográficas y las capacidades individuales.
    </p>
    
    <h3><img class="iconoMenu" src='/marketplace/public/img/iconos/globe-outline.svg'>Nuestros Valores</h3>
    <ol>
        <li><strong>Inclusión:</strong> Accesibilidad para todos, sin importar capacidades, conocimientos o ubicación.</li>
        <li><strong>Innovación:</strong> Uso de tecnologías avanzadas para facilitar y mejorar la experiencia de búsqueda de servicios locales.</li>
        <li><strong>Sostenibilidad:</strong> Compromiso con prácticas responsables y sostenibles, uniendo a vecino y profesional en distancias cortas para evitar desplazamientos innecesarios.</li>
        <li><strong>Excelencia:</strong> Garantizar altos estándares de calidad en contenidos y servicios.</li>
        <li><strong>Compromiso social:</strong> Apoyar iniciativas comunitarias y ofrecer recursos gratuitos para sectores desfavorecidos.</li>
    </ol>

    <h3><img class="iconoMenu" src='/marketplace/public/img/iconos/eye-outline.svg'>Visión</h3>
    <p>
        Nuestra vocación es convertirnos en una plataforma líder mundial de encuentro entre profesionales y particulares que buscan un servicio determinado en su localidad, conocida por su capacidad de adaptarse a las necesidades de cada usuario y por su impacto positivo en la sociedad.
    </p>

    <h3><img class="iconoMenu" src='/marketplace/public/img/iconos/leaf-outline.svg'>Compromiso Medioambiental</h3>
    <p><strong>Minimizar nuestro impacto ambiental y promover la sostenibilidad.</strong></p>
    <ul>
        <li><img class="iconoSubmenu" src='/marketplace/public/img/iconos/checkmark-outline.svg'><strong>Acción:</strong> Optamos por servicios de hosting ecológico y utilizamos materiales reciclados en nuestra comunicación física. Asimismo, fomentamos la concienciación medioambiental entre nuestros empleados y usuarios.</li>
        <li><img class="iconoSubmenu" src='/marketplace/public/img/iconos/checkmark-outline.svg'><strong>Recursos:</strong> Colaboramos con proveedores de energía renovable y empresas de reciclaje, destinando recursos para adoptar soluciones tecnológicas sostenibles.</li>
    </ul>

    <h3><img class="iconoMenu" src='/marketplace/public/img/iconos/accessibility-outline.svg'>Desarrollo Comunitario</h3>
    <ul>
        <li><img class="iconoSubmenu" src='/marketplace/public/img/iconos/checkmark-outline.svg'><strong>Compromiso:</strong> Contribuir al acercamiento entre profesionales y ciudadanos de las comunidades locales que necesiten servicios de cualquier tipo.</li>
        <li><img class="iconoSubmenu" src='/marketplace/public/img/iconos/checkmark-outline.svg'><strong>Acción:</strong> Organizamos talleres de encuentro entre vecinos de la misma localidad, abiertos a familias y comunidades, para acercar vecinos/usuarios a vecinos/profesionales.</li>
    </ul>

    <p><img class="iconoSubmenu" src='/marketplace/public/img/iconos/happy-outline.svg'>
        En definitiva, nuestra intención es construir día a día una empresa que no solo persiga objetivos económicos, sino que también sea un catalizador de cambio positivo. Creemos firmemente que el éxito de un negocio debe medirse no solo por su rentabilidad, sino también por su capacidad de mejorar la vida de las personas y proteger el entorno. Esta declaración de intenciones guía nuestro camino como emprendedores socialmente responsables, comprometidos con un futuro más justo, inclusivo y sostenible.
    </p>
</div><br>

<!-- Modal de inicio de sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Mensaje de error dinámico -->
                <?php
                include '../user/login.php'; // Incluir el archivo login.php
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Pie de página -->
<footer>
        <p>
            <?php
                include '../../../public/plantillas/pie.php';
            ?>
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>