
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="#">Gestion de comptes bancaires</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
        <?php
        $activeHome = 'active';
        $activeClients = '';
        $activeComptes = '';
        $activeTransactions = '';
        if (!empty($_GET['active'])) {
          if ($_GET['active'] == 'home')
            $activeHome = "active";
          elseif ($_GET['active'] == 'clients') {
            $activeHome = '';
            $activeClients = 'active';
          } elseif ($_GET['active'] == 'comptes') {
            $activeHome = '';
            $activeComptes = 'active';
          } elseif ($_GET['active'] == 'transactions') {
            $activeHome = '';
            $activeTransactions = 'active';
          }
        }
        ?>
          <li class="nav-item <?php echo $activeHome; ?>">
            <a class="nav-link" href="index.php?active=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp; Home</a>
          </li>
          <li class="nav-item <?php echo $activeClients; ?>">
            <a class="nav-link" href="mgrClients.php?active=clients"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Clients</a>
          </li>
          <li class="nav-item <?php echo $activeComptes; ?>">
            <a class="nav-link" href="mgrComptes.php?active=comptes"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>&nbsp; Comptes</a>
          </li>
          <li class="nav-item <?php echo $activeTransactions; ?>">
            <a class="nav-link" href="mgrTransactions.php?active=transactions"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span>&nbsp; Transactions</a>
          </li>
        </ul>
        <!-- <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form> -->
      </div>
    </nav>