// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}

function toggleNav() {
    var isActive = document.getElementById("show-side-nav-btn").classList.contains('is-active');
    if (isActive) {
        closeNav();
    } else {
        openNav();
    }
}

/* Open the sidenav */
function openNav() {
    document.getElementById("sidenav").style.width = "80%";
    document.getElementById("body").style.marginLeft = "-100px";
    document.getElementById("body").style.marginRight = "100px";
    // Logo animation
    document.getElementById("sidenav-logo").classList.remove('fadeOut');
    document.getElementById("sidenav-logo").classList.add('fadeIn');
    // Set button indicator
    document.getElementById("show-side-nav-btn").classList.add('is-active');
}

/* Close/hide the sidenav */
function closeNav() {
    document.getElementById("sidenav").style.width = "0";
    document.getElementById("body").style.marginLeft = "0";
    document.getElementById("body").style.marginRight = "0";
    // Logo animation
    document.getElementById("sidenav-logo").classList.remove('fadeIn');
    document.getElementById("sidenav-logo").classList.add('fadeOut');
    // Set button indicator
    document.getElementById("show-side-nav-btn").classList.remove('is-active');
}

var WhenInViewport = window.WhenInViewport;

// slideInLeft
var slideInLeft = Array.prototype.slice.call(
    document.getElementsByClassName('initSlideInLeft')
);

slideInLeft.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('slideInLeft');
    });
});

// slideInRight
var slideInRight = Array.prototype.slice.call(
    document.getElementsByClassName('initSlideInRight')
);

slideInRight.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('slideInRight');
    });
});

// slideOutLeft
var slideOutLeft = Array.prototype.slice.call(
    document.getElementsByClassName('initSlideOutLeft')
);

slideOutLeft.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('slideOutLeft');
    });
});

// fadeInLeft
var fadeInLeft = Array.prototype.slice.call(
    document.getElementsByClassName('initFadeInLeft')
);

fadeInLeft.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('fadeInLeft');
    });
});

// fadeOutLeft
var fadeOutLeft = Array.prototype.slice.call(
    document.getElementsByClassName('initFadeOutLeft')
);

fadeOutLeft.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('fadeOutLeft');
    });
});

// fadeInRight
var fadeInRight = Array.prototype.slice.call(
    document.getElementsByClassName('initFadeInRight')
);

fadeInRight.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('fadeInRight');
    });
});

// fadeInDown
var fadeInDown = Array.prototype.slice.call(
    document.getElementsByClassName('initFadeInDown')
);

fadeInDown.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('fadeInDown');
    });
});

// fadeIn
var fadeIn = Array.prototype.slice.call(
    document.getElementsByClassName('initFadeIn')
);

fadeIn.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('fadeIn');
    });
});

// fadeOut
var fadeOut = Array.prototype.slice.call(
    document.getElementsByClassName('initFadeOut')
);

fadeOut.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('fadeOut');
    });
});

// fadeInUp
var fadeInUp = Array.prototype.slice.call(
    document.getElementsByClassName('initFadeInUp')
);

fadeInUp.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('fadeInUp');
    });
});

// bounceInDown
var bounceInDown = Array.prototype.slice.call(
    document.getElementsByClassName('initBounceInDown')
);

bounceInDown.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('bounceInDown');
    });
});

// bounceInLeft
var bounceInLeft = Array.prototype.slice.call(
    document.getElementsByClassName('initBounceInLeft')
);

bounceInLeft.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('bounceInLeft');
    });
});

// bounceInRight
var bounceInRight = Array.prototype.slice.call(
    document.getElementsByClassName('initBounceInRight')
);

bounceInRight.forEach(function (element) {
    new WhenInViewport(element, function (elementInViewport) {
        elementInViewport.classList.add('animated');
        elementInViewport.classList.add('bounceInRight');
    });
});