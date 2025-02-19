

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Entry</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Management:</h6>
            <a class="dropdown-item" href="facilitator.php">Facilitator</a>
            <a class="dropdown-item" href="sporttype.php">Sport Type</a>
            <a class="dropdown-item" href="gametype.php">Game Type</a>
            <a class="dropdown-item" href="mode.php">Game Mode</a>
            <a class="dropdown-item" href="players.php">Players</a>
            <a class="dropdown-item" href="schools.php">Schools</a>
             <a class="dropdown-item" href="sy.php">School Year</a>
              <a class="dropdown-item" href="venue.php">Venue</a>
               <a class="dropdown-item" href="user.php">Users</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sports.php">
            <i class="fas fa-fw fa-basketball-ball"></i>
            <span>Sports</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="match.php">
            <i class="fas fa-fw fa-trophy"></i>
            <span>Tournament</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="result.php">
            <i class="fas fa-fw fa-paperclip"></i>
            <span>Game Result</span></a>
        </li>
          <li class="nav-item">
            <a class="nav-link">
          <div style="font-family: AR BLANCA;color: orange">
                       <?php
                        $Today = strftime("%Y-%m-%d");
                        echo date('l, F d, Y',strtotime($Today) );
                        //echo $time;
                        ?>
                    </div>
                  </a>
                </li>
      </ul>

            <div id="content-wrapper">

        <div class="container-fluid">