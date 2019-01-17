let galleryImageModal = function(){
    const self = this;

    // Elements that need event handlers/listeners
    const imageModal = $('.open-image');
    const imageElementInModal = $('.open-image__container > img');

    const prevButton = $('.fa-angle-left');
    const nextButton = $('.fa-angle-right');

    const closeButton = $('span.open-image__close-button');

    const totalGalleryImagesOnDom = $('img[data-click="show-gallery-image"]').length;

    let imageData = {
        imagePath: '',
        altText: '',
        position: -1
    };

    // Declare variable to hold the next and prev image positions
    let imageTraversingPositions = {
        next: -1,
        prev: -1
    };

    /**
     * Assign event handlers
     */
    this.initialize = function(){
        // Assign event handlers
        this.handleClickingGalleryImage();
        this.handleNextButton();
        this.handlePrevButton();
        this.handleCloseButton();
        this.handleClosingOutsideImage();
    }

    this.handleClickingGalleryImage = function(){
        $('img[data-click="show-gallery-image"]').on('click', function(e){
            e.preventDefault();

            // Grab data from the image the user clicked
            imageData.position = $(this).data('position');

            self.showImage(imageData.position);

            $(imageModal).show();

        });
    }

    this.handleNextButton = function(){

        $(nextButton).on('click', () => {
            imageTraversingPositions = self.determineImageTraverseValues(imageData.position);

            self.showImage(imageTraversingPositions.next);
        });
    }

    this.handlePrevButton = function(){
        $(prevButton).on('click', () => {
            imageTraversingPositions = self.determineImageTraverseValues(imageData.position);

            self.showImage(imageTraversingPositions.prev);
        });
    }

    this.handleCloseButton = function(){
        $(closeButton).on('click', () => {
            $(imageModal).hide();
        });
    }

    this.handleClosingOutsideImage = function(){
        
        $(imageModal).on('click', (e) => {

            if ($(e.target).is(imageModal)){
                $(imageModal).hide();
            }
        });
    }

    /**
     * Take the image position of the image currently shown and determine what the next and prev positions
     * are so the user can traverse the gallery
     * 
     * @param { int }
     * 
     * @return { object }
     */
    this.determineImageTraverseValues = function(imagePosition){

        // Determine what the positions should be based on the current positions
        if (imagePosition === 0){
            imageTraversingPositions.prev = totalGalleryImagesOnDom - 1;
            imageTraversingPositions.next = imagePosition + 1;
        } else if (imagePosition === totalGalleryImagesOnDom - 1){
            imageTraversingPositions.prev = imagePosition - 1;
            imageTraversingPositions.next = 0;
        } else {
            imageTraversingPositions.prev = imagePosition - 1;
            imageTraversingPositions.next = imagePosition + 1;
        }

        return imageTraversingPositions;
    }

    /**
     * Take the position of the image to be shown, fetch the data for that image and display it in the modal
     * 
     * @param { int }
     * 
     * @return { void }
     */
    this.showImage = function(imagePosition){
        const requestedImageElement = $(`img[data-position="${imagePosition}"]`);

        imageData.imagePath = $(requestedImageElement).attr('src');
        imageData.altText = $(requestedImageElement).attr('alt');
        imageData.position = $(requestedImageElement).data('position');

        // Assign the data to the image element in the modal
        $(imageElementInModal).attr({
            src: imageData.imagePath,
            alt: imageData.altText,
            'data-position': imageData.position
        });
    }


    this.initialize();
};