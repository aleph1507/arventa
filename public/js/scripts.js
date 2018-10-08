var dropDiv = document.getElementById('dropDiv');
console.log('dropDiv: ', dropDiv);
if(dropDiv != null){
  var myDropzone = new Dropzone(dropDiv, {url: "/admin/gallery_upload"});
}
