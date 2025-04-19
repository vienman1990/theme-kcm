<div class="navbar bg-base-100 shadow-sm">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
      <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'menu_class' => 'menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow',
        'container' => false,
        'menu_id' => 'mobile-menu',
      ));
      ?>
    </div>
    <a href="<?php echo home_url('/'); ?>" class="btn btn-ghost text-xl">DH</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'menu-1',
      'menu_class' => 'menu menu-horizontal px-1',
      'container' => false,
      'menu_id' => 'mobile-menu',
    ));
    ?>
  </div>
  <div class="navbar-end">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn m-1">
        Theme
        <svg
          width="12px"
          height="12px"
          class="inline-block h-2 w-2 fill-current opacity-60"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 2048 2048">
          <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
        </svg>
      </div>
      <ul tabindex="0" class="dropdown-content bg-base-300 rounded-box z-1 w-52 p-2 shadow-2xl">
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="light"
            value="light" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="dark"
            value="dark" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="cupcake"
            value="cupcake" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="bumblebee"
            value="bumblebee" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="emerald"
            value="emerald" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="corporate"
            value="corporate" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="synthwave"
            value="synthwave" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="retro"
            value="retro" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="cyberpunk"
            value="cyberpunk" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="valentine"
            value="valentine" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="halloween"
            value="halloween" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="garden"
            value="garden" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="forest"
            value="forest" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="aqua"
            value="aqua" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="lofi"
            value="lofi" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="pastel"
            value="pastel" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="fantasy"
            value="fantasy" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="wireframe"
            value="wireframe" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="black"
            value="black" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="luxury"
            value="luxury" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="dracula"
            value="dracula" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="cmyk"
            value="cmyk" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="autumn"
            value="autumn" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="business"
            value="business" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="acid"
            value="acid" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="lemonade"
            value="lemonade" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="night"
            value="night" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="coffee"
            value="coffee" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="winter"
            value="winter" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="dim"
            value="dim" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="nord"
            value="nord" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="sunset"
            value="sunset" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="caramellatte"
            value="caramellatte" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="abyss"
            value="abyss" />
        </li>
        <li>
          <input
            type="radio"
            name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
            aria-label="silk"
            value="silk" />
        </li>
      </ul>
    </div>
  </div>
</div>