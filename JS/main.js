//hamburger menuBar
const toggleBtn = document.querySelector('.navbar__toggleBtn');
const menu = document.querySelector('.navbar__menu');
const icons = document.querySelector('.navbar__icons');

toggleBtn.addEventListener('click', () => {
    menu.classList.toggle('active');
    icons.classList.toggle('active');
});

//login button popup script
function togglePopup(){
    document.getElementById("popup-1").classList.toggle("active");
  }

  var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
  })
  
  function discordButton() {
    location.replace("https://discord.gg/4TGdXfrc3F")
  }

//festival.php scroll script
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
  }).resize();

//register.php grade and class only in number
function inNumber(){
  this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
}