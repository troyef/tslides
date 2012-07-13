var currentSlide = 0;

function TSlides(){
	this.currentSlide = 0;
	this.slides = null;
}

TSlides.prototype.initialize = function(slideInfo){
	this.slides = slideInfo;
	
};



