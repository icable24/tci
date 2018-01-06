<!DOCTYPE html>
<html>
<head>
<style>
/* Popup container - can be anything you want */
.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style></head>
<body style="text-align:center">
<div class="row" style="height: 100px;">
    
</div>
<h2>Popup</h2>

<div class="popup" onclick="myFunction()">Click me to toggle the popup!
  <div  class="popuptext" id="myPopup">
    <div class="row">
        <span>Are you sure you want to remove this product?</span>
    </div>
    <div class="row">
      <a class="btn btn-primary btn-md" href="productupdate.php?id='.$row['prod_id'].'" data-toggle="tooltip" title="View"><span class="fa fa-edit">Edit</span></a>
      <a class="btn btn-primary btn-md" href="productupdate.php?id='.$row['prod_id'].'" data-toggle="tooltip" title="View"><span class="fa fa-edit">Edit</span></a>
    </div>
  </div>
</div>

<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>

</body>
</html>
