        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./propiedades.php">
              <i class="material-icons">store</i>
              <p>Propiedades</p>
            </a>
          </li>
          <?php if ($_SESSION['sert_cpanel']['rank'] > 1): ?>
          <li class="nav-item ">
            <a class="nav-link" href="./users.php">
              <i class="material-icons">people_outline</i>
              <p>Asesores</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="./ciudades-barrios.php">
              <i class="material-icons">tour</i>
              <p>Ciudades, Barrios</p>
            </a>
          </li> -->
          <li class="nav-item ">
            <a class="nav-link" href="./blog.php">
              <i class="material-icons">book</i>
              <p>Blog</p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item ">
            <a class="nav-link" href="./mensajeria.php">
              <i class="material-icons">speaker_notes</i>
              <p>Mi Mensajeria</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./perfil.php">
              <i class="material-icons">account_circle</i>
              <p>Mi Perfil</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#" id="logout">
              <i class="material-icons">exit_to_app</i>
              <p>Cerrar Sesión</p>
            </a>
          </li>
        </ul>
        <ul id="rs" hidden><?= $_SESSION['sert_cpanel']['rank'] ?></ul>
        <ul id="id" hidden><?= $_SESSION['sert_cpanel']['id'] ?></ul>