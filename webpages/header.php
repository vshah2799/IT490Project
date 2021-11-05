<?php
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="/project/webpages/index.php">oooreo</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/project/webpages/index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled"href="#" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <div class="row mx-2">
    <form class="form-inline my-2 my-lg-0">
        <input type="search" class="form-control" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 type="submit">Search</button>
    </form>
        <button class="btn btn-primary ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
        <button class="btn btn-primary mx-2" data-toggle="modal" data-target="#signupModal">Sign  up</button>
    </div>
    
    
    </div>
</nav>';

include 'loginModal.php';
include 'signupModal.php';
?>
