
////////////////////////////////////////////////////////////////////////////////
const menuBtn=document.querySelector('.menu-btn');
const navmenu=document.querySelector('.nav-links');

let menuOpen=false;
menuBtn.addEventListener('click',function(){
  if(!menuOpen){
menuBtn.classList.add('open');
navmenu.classList.add('clicked');
    menuOpen=true;
     }
  else
  {
  menuBtn.classList.remove('open');
  navmenu.classList.remove('clicked');
    menuOpen=false;
          }

}
)
//////////////////////* Top Animation*/////////////////
const hero=document.querySelector(".hero");
const heroLeft=document.querySelector(".hero-left");
const t2=new gsap.timeline();
t2.fromTo(
  hero,
  .7,
  {height:"0%"},
  {height:"90%", ease:Power2.easeInOut}
).fromTo(
  hero,
  .7,
  {width:"100%"},
  {width:"90%", ease:Power2.easeInOut}
).fromTo(
  heroLeft,
  1,
  {width:"100%"},
  {width:"50%", ease:Power2.easeInOut}
)
//////////////////////*SVG Text Animation*/////////////////
const logo=document.querySelectorAll("#logo path");
console.log(logo);
for(let i=0; i<logo.length; i++){
  console.log(`Letter ${i} is ${logo[i].getTotalLength()}`);
}
//////////////////////*Card Flip on Appear Animation*/////////////////
const controller = new ScrollMagic.Controller();
function flipper(){
  var t3 = new gsap.timeline();
  t3.fromTo("#card",{y:100 },{y:0,rotationY:180,   stagger: { // wrap advanced options in an object
    each: 0.1,
    from: "center"

  }})
  var scene = new ScrollMagic.Scene({
    triggerElement: ".testimonial-section",
    triggerHook: .6
  })
    .setTween(t3)
    .addTo(controller);
}
flipper();
//////////////////////* Testimonial Animation*/////////////////
function heroDown(){
  const heroTest=document.querySelector(".hero-test");
  const heroDown=document.querySelector(".hero-down");
  const t5=new gsap.timeline();
  t5.from(
    heroTest,
    1,
    {opacity:0}
  ).from(
    heroDown,
    1,
    {height:"0%"},
    "-=1"
  )
  var scene = new ScrollMagic.Scene({
    triggerElement: ".testimonial-section",
    triggerHook: .5
  })
    .setTween(t5)
    .addTo(controller);
  }
heroDown();
//////////////////////*content3-text Animation*/////////////////
function slideIn(){
  var t4 = new gsap.timeline();
  t4.fromTo(".content3-text",{opacity:0,x:400},{opacity:1,x:0})
  var scene = new ScrollMagic.Scene({
    triggerElement: ".content3-page",
    triggerHook: .3
  })
    .setTween(t4)
    .addTo(controller);
}
slideIn();
//////////////////////////////////// Smooth Sroll To Top ////////////////////////////////////////////
//function call
funcScroll ('.scroll');

//scroll function MAIN
function funcScroll(trigger) {
	const button = document.querySelector(trigger);
	button.addEventListener('click', function(e) {
		e.preventDefault();
		scrollTop();
	});

	function scrollTop() {
		let startPosition = window.pageYOffset;
		let startTime = null;

		function easing(t, b, c, d) {
			t /= d/2;
			if (t < 1) return c/2*t*t + b;
			t--;
			return -c/2 * (t*(t-2) - 1) + b;
		};

		function scroll(currentTime) {
			if(startTime == null) startTime = currentTime;
			let elapsedTime = currentTime - startTime;
			let run = easing(elapsedTime, startPosition, -startPosition,1000);
			window.scrollTo(0,run);
			if(elapsedTime < 1000) requestAnimationFrame(scroll);
		}

		requestAnimationFrame(scroll);
	}
}
//////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', () => {
    let controller = new ScrollMagic.Controller();

    let timeline = new TimelineMax();
    timeline
    .from('.step1', 3, {
        top: '40px',
        autoAlpha: 0
    }, '-=4')
    .from('.step2', 3, {
        top: '40px',
        autoAlpha: 0
    }, '-=3.5')
    .from('.step3', 3, {
        top: '40px',
        autoAlpha: 0
    }, '-=3.5')
    .from('.step4', 3, {
        top: '40px',
        autoAlpha: 0
    }, '-=3.5')

    let scene = new ScrollMagic.Scene({
        triggerElement: '.skills-section',
        duration: '300px',
        triggerHook: .7
    })
    .setTween(timeline)
    .addTo(controller);

})
