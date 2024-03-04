{{-- @extends('layouts.layout')

@section('content') --}}
<nav class="navbar navbar-expand-lg" style="background-color: #044D0B">
  <div class="container">
      <img src="{{ URL('images/logo2.png') }}" alt="logo" style="width: 4rem" class="pic">
      <h3 class="title">Mabini Farm School</h3>
      <div id="mySidepanel" class="sidepanel">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="#">Home</a>
          <a href="#">Memo</a>
          <a href="#">Programs</a>
          <a href="#">Procurement</a>
          <a href="#">About Us</a>
          <a href="#">Contact Us</a>
          {{-- <a href="#">Log Out</a> --}}
      </div>
    
      <button class="openbtn ms-auto" onclick="openNav()">&#9776;</button>
  </div>
</nav>

<script>
  function openNav() {
      document.getElementById("mySidepanel").style.width = "250px";
      document.getElementById("mySidepanel").style.right = "0";
      document.getElementById("mySidepanel").style.marginRight = "0";
  }

  function closeNav() {
      document.getElementById("mySidepanel").style.width = "0";
      document.getElementById("mySidepanel").style.right = "-450px";
      document.getElementById("mySidepanel").style.marginRight = "-150px";
  }
</script>

<style>
  .title {
      font-style: oblique;
      color: white;
      margin-left: 50px;
  }

  /* The sidepanel menu */
  .sidepanel {
  margin-right: 100px;
  margin-top: 80px;
  height: 350px;
  position: fixed;
  z-index: 1;
  top: 0;
  right: -450px; /* Initially position it off-screen to the right */
  overflow-x: hidden;
  /* padding-top: 30px; */
  transition: right 0.5s; /* Use right property for transition */
  background-color: #174D04;
  border-radius: 20px;
}

  /* The sidepanel links */
  .sidepanel a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #f1f1f1;
      display: block;
      transition: 0.3s;
  }

  /* When you mouse over the navigation links, change their color */
  .sidepanel a:hover {
      background-color: #f1f1f1;
      color: #174D04;
  }

  /* Position and style the close button (top right corner) */
  .sidepanel .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
  }

  /* Style the button that is used to open the sidepanel */
  .openbtn {
      font-size: 20px;
      cursor: pointer;
      color: white;
      padding: 10px 15px;
      border: none;
      background-color: #044D0B;
  }

  .openbtn:hover {
      background-color: #444;
  }

</style>

{{-- @endsection --}}
