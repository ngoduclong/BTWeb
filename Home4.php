<?php include("TEMPLATE(CLIENT).php");?>
<head>
    <style>
       * {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
    width:800px;
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
 </style>
</head>




<div id="page-wrapper">
<div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
					<br>
             <h2 style="text-align:center; color:red;"> Welcome to WRU English club</h2>       
             <br>
             <div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="chuan1.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="chuan2.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="chuan3.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="chuan4.jpg" style="width:100%">
  </div>

  
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="chuan1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Lớp học của clb tại cơ sở Hưng Yên">
    </div>
    <div class="column">
      <img class="demo cursor" src="chuan2.jpg" style="width:100%" onclick="currentSlide(2)" alt="WEC Family">
    </div>
    <div class="column">
      <img class="demo cursor" src="chuan3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Cuộc thi nói tiếng Anh không chuyên">
    </div>
    <div class="column">
      <img class="demo cursor" src="chuan4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Cuộc thi nói tiếng Anh không chuyên">
    </div>
    
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<br>
<div style="font-size:18px;">
<p style=" font-weight:bolder;">English Club was founded in September 16, 2009 by enthusiastic students of Water Resources University. We are on the way that creates an academic environment effectively. Let’s remember that our club is your club, where you can:<br>

        <p>1. Practice your four English skills: Speaking, Listening, Reading and Writing<p>
        <p>2. Learn and share experiences</P>
        <p>3. Play English games and do English quizzes freely</P>
        <p>4. Get opportunities to study English from other organizations freely</p>
        <p>5. Make presentations and become a confident person</p>

        <p style="font-weight:bolder;">Our strategy is to divide English into various sections that make you feel easy in all activities:</p>
        <p>1. English vocabulary: In the first week of every month, we have a hot topic for discussion. Members have to prepare new words and ideas for their presentation. It’s the best way for learning vocabulary. Besides, we strongly recommend members have their own hand book to save new words during other activities.</P>
        <p>2. English pronunciation: Make presentations and discuss topics are our ways for solving this problem. We will care about aspects such as word stress, sentences stress and linking.</P>
        <p>3. English Grammar: Self study plays an important role in this section. All the obstacles will be explained if members cannot understand by themselves.</p>
        <p>4. English Listening: English songs and VOA NEWS are preferably used. You also have opportunities to chat with native people who are working in the Water Resources University.</p>

        Our target does not only stop in creating a place for English learner; we are trying to get achievements in other activities. Let’s join with us and write your own chapters of your life now. WRU English Club is a place where you can explore your interests in a way that reflects your values and goals.</p>