let Carousel = function(settings){
    this.carousel = document.querySelector(settings.carousel);
    this.slides = this.carousel.querySelectorAll(settings.slides);
    this.nextSlideBtn = this.carousel.querySelector(settings.nextSlideBtn) || null;
    this.prevSlideBtn = this.carousel.querySelector(settings.prevSlideBtn) || null;
    this.slideIndex = settings.slideIndex || 0;
    this.automaticSlideshowDelay = settings.automaticSlideshowDelay || 5000;
    this.carouselDots = this.carousel.querySelectorAll(settings.carouselDots) || null;
    this.carouselDotsModifier = '';
    this.carouselDotActiveClass = ' carousel__dot--active';

    // If the slides use a grid layout, they will need to be treated differently than block level elements
    this.usesGrid = settings.usesGrid || false;

    this.slidesCount = (this.slides !== null) ? this.slides.length : null;

    // Find the modifier that tells the carousel dots color 
    if (this.carouselDots.length > 0){
        if (this.carouselDots[0].classList.length > 0){
            if (this.carouselDots[0].classList[1] != ''){
                var positionOfModifierStart = this.carouselDots[0].classList[1].indexOf('--color');

                if (positionOfModifierStart > -1){
                    this.carouselDotsModifier = this.carouselDots[0].classList[1].substring(positionOfModifierStart, this.carouselDots[0].classList[1].length);
                }
            }
        }
    }

    let self = this;

    // Assign event listeners if we have values for the next and previous buttons
    if ((self.nextSlideBtn !== null) && (self.prevSlideBtn !== null)){
        self.nextSlideBtn.addEventListener('click', function(){ self.moveToSlide(1)} );
        self.prevSlideBtn.addEventListener('click', function(){ self.moveToSlide(-1)} );

        self.carouselDots[0].className += self.carouselDotActiveClass;
    }

    // Handles the direction we move the slider in
    this.moveToSlide = function(direction){
        self.showSlide(self.slideIndex += direction);
    }

    this.showSpecificSlide = function(slideIndex){
        self.showSlide(self.slideIndex = slideIndex);
    }

    // Handles displaying slides one by one
    this.showSlide = function(desiredSlideIndex){

        // If the slide we're moving to has a greater index than the last slide,
        // return the index to the "first" slide
        if (desiredSlideIndex > self.slides.length){
            self.slideIndex = 1;
        }

        // If the slide we're moving to has a value of 0 (meaning we're going backwards)
        // Return the index to the "last" slide
        if (desiredSlideIndex === 0){
            self.slideIndex = self.slides.length;
        }

        // Don't display any slides
        for (let i = 0; i < self.slides.length; i++){
            self.slides[i].style.display = 'none';
        }

        // Remove the active dot if any
        for (i = 0; i < self.carouselDots.length; i++) {
            self.carouselDots[i].className = self.carouselDots[i].className.replace(self.carouselDotActiveClass, '');
        }

        self.slides[self.slideIndex - 1].style.display = 'grid';

        self.carouselDots[self.slideIndex -1].className += self.carouselDotActiveClass;

    }

    this.assignEventListenerToDots = function(){

        if (self.carouselDots !== undefined){
            for (let i = 0; i < self.carouselDots.length; i++){
                self.carouselDots[i].addEventListener('click', function(){ self.showSpecificSlide(i + 1) } );
            }
        }
    }
};
