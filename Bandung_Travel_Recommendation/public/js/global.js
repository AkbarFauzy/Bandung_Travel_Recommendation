var myInput = document.getElementById('myInput')

var p = window.location.pathname;

if (p.length === 0 || p === "/" || p.match(/^\/?index/)){
  window.onscroll = function() {scrollFunction()};
}else{
  document.getElementById("navbar").style.backgroundColor = "white";
  let item = document.getElementsByClassName("nav-link");
  for (let i = 0; i < item.length; i++) {
    item[i].style.color = "black";
  }
}

$('a[data-bs-toggle="modal"][data-bs-target]').click(function () {
    var target = $(this).attr('href');
    $('a[data-bs-toggle="tab"][data-bs-target="' + target + '"]').tab('show');
})

$('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
  $(this).removeClass('active');
})

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.backgroundColor = "white";
    let item = document.getElementsByClassName("nav-link");
    for (let i = 0; i < item.length; i++) {
      item[i].style.color = "black";
    }
  } else {
    document.getElementById("navbar").style.backgroundColor = "rgba(0,0,0,0)";
    let item = document.getElementsByClassName("nav-link");
    for (let i = 0; i < item.length; i++) {
      item[i].style.color = "white";
    }
  }
}
