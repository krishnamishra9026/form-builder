@extends('layout.master')

@push('plugin-styles')
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.phpformbuilder.pro/documentation/assets/stylesheets/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets/form-builder/css/main.min.css') }}">
    <title>Drag &amp; Drop Form Generator - PHP Form Builder</title>
@endpush

@section('content')
<header class="py-5">

        <h1 class="text-center font-weight-light">Drag &amp; Drop Form Generator</h1>
    </header>
    <div id="form-generator-container" class="container-fluid">
        <div class="row mx-0 mb-1">
            <div id="ui-icon-bars-left-column" class="col-md-3 mb-1 d-none d-md-flex align-items-center justify-content-end">
                <a href="#" class="d-block py-3 pl-5"><i class="icon-bars text-secondary"></i></a>
            </div>
            <div class="col d-flex justify-content-between mb-1">
                <button class="btn btn btn-sm nowrap w-100 h-100 btn-success dropdown-toggle dropdown-light" type="button" id="load-save-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="pr-2">Load / Save</span></button>
                <div class="dropdown-menu font-weight-normal" aria-labelledby="load-save-btn">
                    <p class="dropdown-header h6">Disk</p>
                    <a id="load-json-from-disk-btn" class="dropdown-item d-flex justify-content-between" href="#" data-toggle="modal" data-target="#load-json-from-disk-modal"><span>Load from disk</span> <i class="icon-upload1 text-muted pl-4"></i></a>
                    <a id="save-json-to-disk-btn" class="dropdown-item d-flex justify-content-between" href="#"><span>Save on disk</span> <i class="icon-download1 text-muted pl-4"></i></a>
                    <div class="dropdown-divider"></div>
                    <p class="dropdown-header h6">Server</p>
                    <a id="load-json-from-server-btn" class="dropdown-item d-flex justify-content-between" href="#" data-toggle="modal" data-target="#load-json-from-server-modal"><span>Load from server</span> <i class="icon-upload text-muted pl-4"></i></a>
                    <a id="save-json-on-server-btn" class="dropdown-item d-flex justify-content-between" href="#" data-toggle="modal" data-target="#save-json-on-server-modal"><span>Save on server</span> <i class="icon-download text-muted pl-4"></i></a>
                </div>
                <button id="main-settings-btn" class="btn btn btn-sm nowrap w-100 h-100 mx-1 btn-success" type="button" data-toggle="modal" data-target="#main-settings-modal">Main settings <i class="icon-tools ml-2 text-white"></i></button>
                <div class="text-right">
                    <a id="preview-btn" href="#" class="btn btn btn-sm w-100 mb-1 nowrap btn-warning" data-toggle="modal" data-target="#preview-modal">Preview<i class="icon-eye ml-2"></i></a>
                    <a id="get-code-btn" href="#" class="btn btn btn-sm w-100 nowrap btn-warning" data-toggle="modal" data-target="#get-code-modal">Get code<i class="icon-upload ml-2"></i></a>
                </div>
            </div>
            <div id="ui-icon-bars-right-column" class="col-md-3 mb-1 d-none d-md-flex align-items-center">
                <a href="#" class="d-block py-3 pr-5"><i class="icon-bars text-secondary"></i></a>
            </div>
        </div>
        <div class="row mx-0">

            <!--=====================================
        =              Left column              =
        ======================================-->

            <aside id="ui-left-column" class="col-md-3 mb-3">
                <div class="card border-secondary h-100">
                    <div class="card-header text-white bg-gray-700 text-uppercase small">Components</div>
                    <div class="card-body small">

                        <ul id="sidebar-components" class="list-group list-group-horizontal text-secondary align-items-stretch flex-wrap">
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="input">
                                <i class="icon-input icon-lg text-secondary aria-hidden"></i><span class="text-gray">Input</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="textarea">
                                <i class="icon-textarea icon-lg text-secondary aria-hidden"></i><span class="text-gray">Textarea</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="select">
                                <i class="icon-select icon-lg text-secondary aria-hidden"></i><span class="text-gray">Select</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="radio">
                                <i class="icon-radio-checked icon-lg text-secondary aria-hidden"></i><span class="text-gray">Radio</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="checkbox">
                                <i class="icon-checkbox-checked icon-lg text-secondary aria-hidden"></i><span class="text-gray">Checkbox</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="recaptcha">
                                <i class="icon-recaptcha icon-lg text-secondary aria-hidden"></i><span class="text-gray">Recaptcha</span>
                            </li>
                            <li class="list-unstyled-item w-100">

                                <hr class="mx-5">
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="button">
                                <i class="icon-button icon-lg text-secondary aria-hidden"></i><span class="text-gray">Button</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="buttongroup">
                                <i class="icon-btn-group icon-lg text-secondary aria-hidden"></i><span class="text-gray nowrap">Btn group</span>
                            </li>
                            <li class="list-unstyled-item w-100">

                                <hr class="mx-5">
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center nowrap" data-component="dependent">
                                <i class="icon-bubbles icon-lg text-secondary aria-hidden"></i><span class="text-gray">Start<br>Condition</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center nowrap" data-component="dependentend">
                                <i class="icon-bubbles icon-lg text-gray-300 aria-hidden"></i><span class="text-gray">End<br>Condition</span>
                            </li>
                            <li class="list-unstyled-item w-100">

                                <hr class="mx-5">
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="title">
                                <i class="icon-title icon-lg text-secondary aria-hidden"></i><span class="text-muted">Title</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="paragraph">
                                <i class="icon-short_text icon-lg text-secondary aria-hidden"></i><span class="text-gray">Paragraph</span>
                            </li>
                            <li class="list-group-item d-flex flex-column justify-content-center align-items-center" data-component="html">
                                <i class="icon-html-five icon-lg text-secondary aria-hidden"></i><span class="text-gray">HTML</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>

            <!--=====================================
        =              Main Content             =
        ======================================-->

            <main class="col mb-3">
                <div class="card border-secondary h-100">
                    <div class="card-header text-white bg-gray-700 text-uppercase small">Drop components here to build your form</div>
                    <div class="card-body px-1">
                        <div id="fg-form-wrapper"></div>
                    </div>
                </div>
            </main>

            <!--=====================================
        =              Right column             =
        ======================================-->

            <aside id="ui-right-column" class="col-md-3 mb-3">
                <div class="card border-secondary h-100">
                    <div class="card-header text-white bg-gray-700 text-uppercase small">Component settings</div>
                    <div class="card-body">
                        <div id="components-settings"></div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!--=====================================
    =                Modals                 =
    ======================================-->

    <!-- load JSON from disk -->
    <div id="load-json-from-disk-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="load-json-from-disk-btn" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Upload your form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="json-file-disk-input" style="display: none" type="file" accept=".json">
                    <button class="btn btn-primary" onclick="document.getElementById('json-file-disk-input').click();">Browse</button>
                    <div id="json-file-disk-output"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button id="json-file-disk-load-btn" type="button" class="btn btn-primary">Load <i class="icon-upload1 text-white ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- load JSON from server -->
    <div id="load-json-from-server-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="load-json-from-server-btn" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Upload your form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="demo-server-delete-disabled"></div>
                    <div id="json-file-server-output"></div>
                    <div id="json-forms-file-tree-wrapper">
                        <div class="ft-tree"></div>
                        <div class="ft-explorer"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button id="json-file-server-load-btn" type="button" class="btn btn-primary">Load <i class="icon-upload text-white ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- save JSON on server -->
    <div id="save-json-on-server-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="save-json-on-server-btn" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Save your form on server</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="demo-server-save-disabled"></div>
                    <div id="save-on-server-file-tree-wrapper">
                        <div class="ft-tree"></div>
                        <div class="ft-explorer"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button id="json-file-server-save-btn" type="button" class="btn btn-primary">Save <i class="icon-download text-white ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- main settings -->
    <div id="main-settings-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="main-settings-btn" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="user-form-settings">
                <div class="modal-header">

                    <h5 class="modal-title">Main Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="row justify-content-center">

                            <ul class="col-md-8 nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link text-secondary active" id="nav-tab-main-settings-main" data-toggle="tab" href="#tab-main-settings-main" role="tab" aria-controls="tab-main-settings-main" aria-selected="true">Form settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-secondary" id="nav-tab-main-settings-action" data-toggle="tab" href="#tab-main-settings-action" role="tab" aria-controls="tab-main-settings-action" aria-selected="false">Form action</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-secondary" id="nav-tab-main-settings-plugins" data-toggle="tab" href="#tab-main-settings-plugins" role="tab" aria-controls="tab-main-settings-plugins" aria-selected="false">Form plugins</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-secondary" id="nav-tab-main-settings-ajax" data-toggle="tab" href="#tab-main-settings-ajax" role="tab" aria-controls="tab-main-settings-ajax" aria-selected="false">Ajax loading</a>
                                </li>
                            </ul>
                        </div>
                        <div class="row justify-content-center">
                            <p class="col-md-8 small text-right text-muted py-2 mb-4">All the changes are registered in real time.</p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center tab-content">
                            <div id="tab-main-settings-main" class="col-md-8 tab-pane fade show active" role="tabpanel" aria-labelledby="nav-tab-main-settings-main">

                                <section id="user-form-settings-main"></section>
                            </div>
                            <div id="tab-main-settings-action" class="col-md-8 tab-pane fade" role="tabpanel" aria-labelledby="nav-tab-main-settings-action">

                                <section id="user-form-settings-action"></section>
                                <div id="collapsible-form-actions" class="accordion mt-4">
                                    <fieldset id="send-email" class="collapse" data-parent="#collapsible-form-actions">
                                        <legend class="h4 pb-2 border-bottom border-bottom-gray font-weight-light">Send email</legend>

                                        <section id="user-form-settings-sendmail"></section>
                                    </fieldset>
                                    <fieldset id="db-insert" class="collapse" data-parent="#collapsible-form-actions">
                                        <legend class="h4 pb-2 border-bottom border-bottom-gray font-weight-light">Database insert</legend>

                                        <section id="user-form-settings-db-insert"></section>
                                    </fieldset>
                                    <fieldset id="db-update" class="collapse" data-parent="#collapsible-form-actions">
                                        <legend class="h4 pb-2 border-bottom border-bottom-gray font-weight-light">Database update</legend>

                                        <section id="user-form-settings-db-update"></section>
                                    </fieldset>
                                    <fieldset id="db-delete" class="collapse" data-parent="#collapsible-form-actions">
                                        <legend class="h4 pb-2 border-bottom border-bottom-gray font-weight-light">Database delete</legend>

                                        <section id="user-form-settings-db-delete"></section>
                                    </fieldset>
                                </div>
                            </div>
                            <div id="tab-main-settings-plugins" class="col-md-8 tab-pane fade" role="tabpanel" aria-labelledby="nav-tab-main-settings-plugins">

                                <section id="user-form-settings-plugins"></section>
                            </div>
                            <div id="tab-main-settings-ajax" class="col-md-8 tab-pane fade" role="tabpanel" aria-labelledby="nav-tab-main-settings-ajax">
                                <div class="alert alert-info text-center mb-5">

                                    <h5 class="alert-heading">If you use a CMS, enable Ajax loading</h5>

                                    <hr>
                                    <p>Ajax loading allows you to insert the form into your HTML page without PHP code.</p>
                                    <p class="mb-0">The form is saved in an separate PHP file, called by the Ajax script.</p>
                                </div>

                                <section id="user-form-settings-ajax" class="text-center w-50 mx-auto"></section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- preview -->
    <div id="preview-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="preview-btn" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Form Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- get code -->
    <div id="get-code-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="get-code-btn" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Form Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- errors -->
    <div id="errors-modal" class="modal fade" tabindex="-1" role="dialog" data-show="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title font-weight-light">Your form has errors</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <!-- loadjs src has to be inline, to be loaded later in the preview iFrame -->
    <script id="loadjs">
    loadjs=function(){var a=function(){},c={},u={},f={};function o(e,n){if(e){var t=f[e];if(u[e]=n,t)for(;t.length;)t[0](e,n),t.splice(0,1)}}function l(e,n){e.call&&(e={success:e}),n.length?(e.error||a)(n):(e.success||a)(e)}function h(t,r,s,i){var c,o,e=document,n=s.async,u=(s.numRetries||0)+1,f=s.before||a,l=t.replace(/^(css|img)!/,"");i=i||0,/(^css!|\.css$)/.test(t)?((o=e.createElement("link")).rel="stylesheet",o.href=l,(c="hideFocus"in o)&&o.relList&&(c=0,o.rel="preload",o.as="style")):/(^img!|\.(png|gif|jpg|svg)$)/.test(t)?(o=e.createElement("img")).src=l:((o=e.createElement("script")).src=t,o.async=void 0===n||n),!(o.onload=o.onerror=o.onbeforeload=function(e){var n=e.type[0];if(c)try{o.sheet.cssText.length||(n="e")}catch(e){18!=e.code&&(n="e")}if("e"==n){if((i+=1)<u)return h(t,r,s,i)}else if("preload"==o.rel&&"style"==o.as)return o.rel="stylesheet" ;r(t,n,e.defaultPrevented)})!==f(t,o)&&e.head.appendChild(o)}function t(e,n,t){var r,s;if(n&&n.trim&&(r=n),s=(r?t:n)||{},r){if(r in c)throw"LoadJS";c[r]=!0}function i(n,t){!function(e,r,n){var t,s,i=(e=e.push?e:[e]).length,c=i,o=[];for(t=function(e,n,t){if("e"==n&&o.push(e),"b"==n){if(!t)return;o.push(e)}--i||r(o)},s=0;s<c;s++)h(e[s],t,n)}(e,function(e){l(s,e),n&&l({success:n,error:t},e),o(r,e)},s)}if(s.returnPromise)return new Promise(i);i()}return t.ready=function(e,n){return function(e,t){e=e.push?e:[e];var n,r,s,i=[],c=e.length,o=c;for(n=function(e,n){n.length&&i.push(e),--o||t(i)};c--;)r=e[c],(s=u[r])?n(r,s):(f[r]=f[r]||[]).push(n)}(e,function(e){l(n,e)}),t},t.done=function(e){o(e,[])},t.reset=function(){c={},u={},f={}},t.isDefined=function(e){return e in c},t}();
    </script>
@endpush

@push('custom-scripts')

  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/form-builder/javascripts/bundle.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush