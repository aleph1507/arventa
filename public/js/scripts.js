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

  function splitEquipment(eq){
    var t = '';
    var l = $(eq).val().split('\n');
    for(i = 0; i<l.length; i++){
      t+='<li>';
      t+=l[i];
      t+='</li>';
    }

    return t;
  }

  var carForm = document.getElementById('car_form');
  if(carForm != null){
    var cfSubmit = document.getElementById('car_form_submit');
    var addEq = document.getElementById('additionalEquipment');
    var furtherEq = document.getElementById('furtherEquipment');
    cfSubmit.addEventListener('click', function(e) {
      e.preventDefault();
      $(addEq).val(splitEquipment(addEq));
      $(furtherEq).val(splitEquipment(furtherEq));
      carForm.submit();
    });
  }



  var galleryUploader = new qq.FineUploader({
      element: document.getElementById("fine-uploader-gallery"),
      template: 'qq-template-gallery',
      request: {
          endpoint: this.endpoint,
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

  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#carFeatImg').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function(e) {
    if($('#carFeatImg').hasClass('d-none'))
      $('#carFeatImg').removeClass('d-none');
    $('#carFeatImg').attr('src', e.target.result);
    readURL(this);
  });

  $('.GIdelete').on('click', function(e) {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: '/admin/cars/' + car.id + '/dgi/' + $(e.target).data('img'),
      method: 'POST',
      contentType: false,
      processData: false,
      cache: false,
      data: {

      },
      success: function(data, textStatus, xhr){
        document.getElementById($(e.target).data('img')).classList.add('d-none');
        console.log('data: ' + data);
        console.log('textStatus: ' + textStatus);
        console.log('xhr: ' + xhr);
      },
      error: function(xhr, status, error, message){
        console.log('xhr: ' + xhr);
        console.log('status: ' + status);
        console.log('error: ' + error);
        console.log('message: ' + message);
      }
    });
  });
});
