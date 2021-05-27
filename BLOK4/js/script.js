/*************************
 ** nieuwspagina knoppen**
 *************************/

function leesMeerHome() {
    var carouselImage = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (carouselImage.style.display === "none") {
        carouselImage.style.display = "inline";
        btnText.innerHTML = "Lees meer";
        moreText.style.display = "none";
    } else {
        carouselImage.style.display = "none";
        btnText.innerHTML = "Lees minder";
        moreText.style.display = "inline";
    }
}

/*******************
 ** slides        **
 *******************/
var slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {

    slideIndex += n
    showSlides(slideIndex);
}

function currentSlide(n) {
    slideIndex = n
    showSlides(slideIndex);
}

/********************
 ** carousel       **
 ********************/

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var carouselImage = document.getElementsByClassName("carousel");
    if (n > slides.length-1) { slideIndex = 0 }
    if (n < 0) { slideIndex = slides.length-1 }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    for (i = 0; i < carouselImage.length; i++) {
        carouselImage[i].classList.remove("active");
    }
    slides[slideIndex].style.display = "inline-block";
    document.getElementsByClassName("columnShow")[slideIndex].getElementsByTagName("img")[0].classList.add("active");
}

function ShowOrHideElements(classname, displayStyle) {
    var mask = document.getElementsByClassName(classname + "Mask");
    for (let index = 0; index < mask.length; index++) {
        mask[index].style.display = displayStyle
        if (displayStyle === "none") {
            mask[index].classList.remove("columnShow")
        }
        else
        {
            mask[index].classList.add("columnShow")
        }
    }

    var slide = document.getElementsByClassName(classname + "Slide");
    for (let index = 0; index < mask.length; index++) {
        if (displayStyle === "none") {
            slide[index].classList.remove('mySlides');
            slide[index].style.display = "none";
        } else {
            slide[index].classList.add('mySlides');
        }
    }
}

document.getElementById("zwartButton").onclick = function() {
    ShowOrHideElements("blauw", "none");
    ShowOrHideElements("zwart", "initial");
    ShowOrHideElements("groen", "none");
    ShowOrHideElements("roze", "none");
    currentSlide(0);
};

document.getElementById("blauwButton").onclick = function() {
    ShowOrHideElements("blauw", "initial");
    ShowOrHideElements("zwart", "none");
    ShowOrHideElements("groen", "none");
    ShowOrHideElements("roze", "none");
    currentSlide(0);
};

document.getElementById("groenButton").onclick = function() {
    ShowOrHideElements("blauw", "none");
    ShowOrHideElements("zwart", "none");
    ShowOrHideElements("groen", "initial");
    ShowOrHideElements("roze", "none");
    currentSlide(0);
};

document.getElementById("rozeButton").onclick = function() {
    ShowOrHideElements("blauw", "none");
    ShowOrHideElements("zwart", "none");
    ShowOrHideElements("groen", "none");
    ShowOrHideElements("roze", "initial");
    currentSlide(0);
};

/********************
 ** Auto color pro **
 *******************/
if ( (window.location.href).indexOf('color=blue') > -1)
{
    ShowOrHideElements("blauw", "initial");
    ShowOrHideElements("zwart", "none");
    ShowOrHideElements("groen", "none");
    ShowOrHideElements("roze", "none");
    currentSlide(0);
}



/********************
 ** hamburger-menu **
 *******************/

function burgerMenu() {
    var burger = document.querySelectorAll(".fa, .nav-list"),
        i;
    for (i = 0; i < burger.length; ++i) {
        if (burger[i].classList.contains('open')) {
            burger[i].classList.remove('open');
        } else {
            burger[i].classList.add('open');
        }
    }
}

/***********************
 ** Oops-pagina alert **
 ***********************/

function myOops() {
    alert("Dankjewel! Je ontvangt een bericht van ons");
}


/***********************
 ** klikken bestelling**
 ***********************/

 function myAjax() {
    $.ajax({
         type: "POST",
         url: 'your_url/ajax.php',
         data:{action:'call_this'},
         success:function(html) {
           alert(html);
         }

    });
}