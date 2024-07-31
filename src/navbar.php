<?php
function Navbar()
{
  echo '
      <nav class="flex justify-between"> 
        <div>logo</div>
        <ul class="flex [&>li]:ml-10">
          <li>Home</li>
          <li>About</li>
          <li>Contact</li>
          </ul>
      </nav>
  ';
};
