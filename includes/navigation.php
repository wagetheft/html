<?php
  $current_page = $_SERVER["REQUEST_URI"];

  $URLs = array(
    "About Us" => "/about-us/",
    "Get Involved" => "/get-involved/",
    "API Examples" => "/api-examples/",
  );
?>

<nav id="main-nav">
    <input type="checkbox" id="menu-toggle" />
    <label href="#main-nav" id="menu-icon" for="menu-toggle" class="mobile">
      <span class="icon"><span class="bar">Menu</span></span>
    </label>
    <ul class="main-nav-list">
        <?php
            foreach ($URLs as $key => $value) {
                $classes = 'main-nav-item';
                if ($current_page == $value || strpos($current_page, $value) !== FALSE) { $classes .= ' active'; }
                
                print '<li class="'.$classes.'"><a href="'.$value.'">'.$key.'</a></li>';
            }
        ?>
    </ul>
</nav>
