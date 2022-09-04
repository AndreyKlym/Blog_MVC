// <!-- прокрутить до пикселя с y = 100 -->



window.addEventListener('scroll', function() {
  document.getElementById('showScroll').innerHTML = 100 + 'px';
  // document.getElementById('showScroll').innerHTML = pageYOffset + 'px';
});