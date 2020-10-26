window.onload = function(){
  // Giving all elements in the array a unique id
  function addingIdToElement(elementArray) {
    for (let i = 0; i < elementArray.length; i += 1) {
      elementArray[i].setAttribute('id', i + 1);
    }
  }

  const imgSlider = document.getElementById('img-slider-new');
  const count = 1;
  let position = 0;
  const images = document.getElementsByClassName('img');

  const numberOfImages = images.length;
  const imgWidth = images[0].clientWidth;
  const scrollArea = document.getElementsByClassName('images')[0];

  // Numbering the thumbnails to determine target image of click event
  const captions = document.getElementsByClassName('slider-image-caption');
  const imgThumbs = document.getElementsByClassName('img-small');
  addingIdToElement(imgThumbs);

  // Adjust image size to smaller sized devices
  function resizeImages(imageWidth){
    const windowWidth = document.getElementById('img-slider-new').clientWidth;
    const maxImageWidth = (windowWidth > imageWidth) ? imageWidth : windowWidth;
    for (let i = 0; i < images.length; i++) {
      images[i].style.width = maxImageWidth + 'px';
    }
    return maxImageWidth;
  }

  let maxImageWidth = resizeImages(imgWidth);

  // Make certain the images resize when the window size changes
  window.onresize = function(event) {
    maxImageWidth = resizeImages(imgWidth);
    scrollArea.style.marginLeft = '0px';

    let activeCaption = document.getElementsByClassName('active-caption')[0];
    activeCaption.classList.remove('active-caption');
    activeCaption = captions[0];
    activeCaption.classList.add('active-caption');
  };

  imgSlider.addEventListener('click', function(event) {
    const target = event.target;
    if (!target) return;
    const scrollToId = target.parentElement.id;

    // Changing the caption
    let activeCaption = document.getElementsByClassName('active-caption')[0];
    activeCaption.classList.remove('active-caption');
    activeCaption = captions[scrollToId - 1];
    activeCaption.classList.add('active-caption');

    // Scrolling to image
    position = -count * maxImageWidth * (scrollToId - 1);
    scrollArea.style.marginLeft = `${position}px`;
  });
};
