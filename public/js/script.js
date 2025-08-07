// HAMBURGER MENU
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('open');
});


// DROPDOWN MOBILE
document.querySelectorAll('.dropdown > a').forEach(trigger => {
  trigger.addEventListener('click', function(e) {
    e.preventDefault();
    const parent = this.parentElement;
    document.querySelectorAll('.dropdown').forEach(d => {
      if (d !== parent) d.classList.remove('open');
    });
    parent.classList.toggle('open');
  });
});

document.addEventListener('click', function(e) {
  if (!e.target.closest('.dropdown')) {
    document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('open'));
  }
});


// DROPDOWN LOGOUT
document.addEventListener('DOMContentLoaded', function () {
    const userIcon = document.getElementById('userIcon');
    const logoutMenu = document.getElementById('logoutMenu');

    if (userIcon && logoutMenu) {
        userIcon.addEventListener('click', function (e) {
            e.stopPropagation();
            logoutMenu.style.display = (logoutMenu.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', function () {
            logoutMenu.style.display = 'none';
        });
    }
});


