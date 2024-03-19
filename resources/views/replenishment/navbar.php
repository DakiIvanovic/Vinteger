<link rel="stylesheet" href="css/navbar.css">
<nav class="main-menu">
      <ul>
        <li>
          <a href="logged_in">
            <i class="fa fa-home nav-icon"></i>
            <span class="nav-text">Home</span>
          </a>
        </li>

        <li>
          <a href="profile">
            <i class="fa fa-image nav-icon"></i>
            <span class="nav-text">Profille</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-envelope nav-icon"></i>
            <span class="nav-text">Messages</span>
          </a>
        </li>

        <li>
          <a href="add_post">
            <i class="fa fa-plus nav-icon"></i>
            <span class="nav-text">Add post</span>
          </a>
        </li>
      </ul>

      <ul class="logout">
        <li>
          <a href="settings">
            <i class="fa fa-cogs nav-icon"></i>
            <span class="nav-text">Settings</span>
          </a>
        </li>
        
        <li>
    <form id="logout-form" action="logout" method="POST" style="display: none;">
        @csrf
    </form>
    
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-right-from-bracket nav-icon"></i>
            <span class="nav-text">Logout</span>
            </a>
        </li>

</ul>
   </nav>