var dropDiv = document.getElementById('dropDiv');
console.log('dropDiv: ', dropDiv);
if((dropDiv != null) && (dropDiv != undefined)){
  var myDropzone = new Dropzone(dropDiv, {
    url: "/admin/gallery_upload",
    addRemoveLinks : true,
    dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
    dictResponseError: 'Error uploading file!',
    headers: {
        'X-CSRFToken': $('meta[name="csrf-token"]').attr('content')
    }
  });
}

window.addEventListener('load', function() {
  // var carForm = document.getElementById('car_form');
  // var req = new XMLHttpRequest();
  //
  // if((carForm != null) && (carForm != undefined)){
  //   carForm.addEventListener('submit', function(e) {
  //     var formData = new FormData(carform);
  //     req.open('post', '/cars');
  //     req.addEventListener('load', transferComplete);
  //     req.send(formData);
  //   });
  // }
  //
  // function transferComplete() {
  //
  // }

  
  var galleryUploader = new qq.FineUploader({
      element: document.getElementById("fine-uploader-gallery"),
      template: 'qq-template-gallery',
      request: {
          endpoint: '/admin/gallery_upload',
          customHeaders: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      },
      thumbnails: {
          placeholders: {
              waitingPath: "js/fine-uploader/_build/placeholders/waiting-generic.png",
              notAvailablePath: "js/fine-uploader/_build/placeholders/not_available-generic.png"
          }
      },
      validation: {
          allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
      }
  });
});
