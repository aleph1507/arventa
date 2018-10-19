<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Panel</title>
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

  <!-- Bootstrap core CSS-->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('css/admin.css')}}">

  <link rel="stylesheet" href="{{asset('css/custom.css')}}">

  <script src="{{asset('js/fine-uploader/_build/fine-uploader.js')}}"></script>

  <link href="{{asset('js/fine-uploader/_build/fine-uploader-gallery.css')}}" rel="stylesheet">

  <script type="text/template" id="qq-template-gallery">
       <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
           <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
               <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
           </div>
           <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
               <span class="qq-upload-drop-area-text-selector"></span>
           </div>
           <div class="qq-upload-button-selector qq-upload-button">
               <div>Upload a file</div>
           </div>
           <span class="qq-drop-processing-selector qq-drop-processing">
               <span>Processing dropped files...</span>
               <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
           </span>
           <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
               <li>
                   <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                   <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                       <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                   </div>
                   <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                   <div class="qq-thumbnail-wrapper">
                       <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                   </div>
                   <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                   <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                       <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                       Retry
                   </button>

                   <div class="qq-file-info">
                       <div class="qq-file-name">
                           <span class="qq-upload-file-selector qq-upload-file"></span>
                           <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                       </div>
                       <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                       <span class="qq-upload-size-selector qq-upload-size"></span>
                       <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                           <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                       </button>
                       <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                           <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                       </button>
                       <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                           <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                       </button>
                   </div>
               </li>
           </ul>

           <dialog class="qq-alert-dialog-selector">
               <div class="qq-dialog-message-selector"></div>
               <div class="qq-dialog-buttons">
                   <button type="button" class="qq-cancel-button-selector">Close</button>
               </div>
           </dialog>

           <dialog class="qq-confirm-dialog-selector">
               <div class="qq-dialog-message-selector"></div>
               <div class="qq-dialog-buttons">
                   <button type="button" class="qq-cancel-button-selector">No</button>
                   <button type="button" class="qq-ok-button-selector">Yes</button>
               </div>
           </dialog>

           <dialog class="qq-prompt-dialog-selector">
               <div class="qq-dialog-message-selector"></div>
               <input type="text">
               <div class="qq-dialog-buttons">
                   <button type="button" class="qq-cancel-button-selector">Cancel</button>
                   <button type="button" class="qq-ok-button-selector">Ok</button>
               </div>
           </dialog>
       </div>
   </script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
