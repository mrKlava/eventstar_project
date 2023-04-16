<?php 

class Router
{
  private $page;

  public function __construct()
  {
    $this->page =  isset($_GET['page']) ? $this->page = $_GET['page'] : 'home';
  }

  public function renderPage()
  {
    if (file_exists(PAGES . "$this->page.php")) {
      include PAGES . "$this->page.php";
    } else {
      header('location:index.php?page=not-found');
    }
  }
}