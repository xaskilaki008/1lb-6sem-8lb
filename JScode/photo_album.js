$(document).ready(function() {
    var currentIndex = 0;
    var openPhotoDiv = null;

    function openPhoto() {
        var imageUrl = fotos[currentIndex];
        var imageTitle = titles[currentIndex];
    
        // Удаляем предыдущее окно увеличенного фото, если оно существует
        if (openPhotoDiv) {
          openPhotoDiv.remove();
          openPhotoDiv = null;
        }
    
        openPhotoDiv = $("<div></div>").addClass("large-photo");
    
        var closeButton = $("<span></span>").addClass("close-button").text("x").on("click", function () {
          openPhotoDiv.remove(); // Удаляем блок большой фотографии при клике на кнопку "Закрыть"
          openPhotoDiv = null;
        });
    
        var largePhotoImg = $("<img>").attr({
          src: imageUrl,
          alt: imageTitle
        }).css({
          "display": "block",
          "margin": "0 auto"
        });
      
        var prevButton = $("<span></span>").text("<").css({
          "font-size": "2em",
          "color": "azure",
          "position": "absolute",
          "left": "10px",
          "top": "50%",
          "transform": "translateY(-50%)",
          "text-shadow": "2px 2px 4px #000000",
          "cursor": "pointer"
        }).on("click", function () {
          currentIndex = (currentIndex > 0) ? currentIndex - 1 : fotos.length - 1;
          openPhoto();
        });
      
        var nextButton = $("<span></span>").text(">").css({
          "color": "azure",
          "font-size": "2em",
          "position": "absolute",
          "right": "10px",
          "top": "50%",
          "transform": "translateY(-50%)",
          "text-shadow": "2px 2px 4px #000000",
          "cursor": "pointer"
        }).on("click", function () {
          currentIndex = (currentIndex < fotos.length - 1) ? currentIndex + 1 : 0;
          openPhoto();
        });
      
        var titleName = $("<span></span>").text(imageTitle).addClass("largePhotoTitle").css({
          "position": "absolute",
          "align": "center",
          "font-size": "2em",
          "text-shadow": "2px 2px 4px #000000",
          "color": "azure",
          "left": "50%", 
          "top": "0px",
          "transform": "translate(-50%)"
        });
      
        var positionText = $("<span></span>").text((currentIndex + 1) + " / " + fotos.length).addClass("largePhotoPosition").css({
          "position": "absolute",
          "font-size": "2em",
          "text-shadow": "2px 2px 4px #000000",
          "color": "azure",
          "left":"50%",
          "transform": "translate(-50%,-100%)"
        });
      
        openPhotoDiv.append(closeButton).append(largePhotoImg).append(prevButton).append(positionText).append(nextButton).append(titleName);
      
        $("#photo-album").append(openPhotoDiv);
    
        // Добавляем анимацию
        openPhotoDiv.hide().fadeIn(200);
      }
    });