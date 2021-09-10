<div id="task_list">

</div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
])
<pre id="fileLocationContent"
    style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"
></pre>
@endcomponent

@component("modal-component", [
    "id" => "serviceStatModal",
    "title" => "Servis Durumu",
    "notSized" => "true"
])
<pre id="serviceStatContent"
    style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"
></pre>
@endcomponent

@component("modal-component", [
    "id" => "processTreeModal",
    "title" => "Process Tree",
    "notSized" => "true"
])
<pre id="processTreeContent"
    style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"
></pre>
@endcomponent

@component("modal-component", [
    "id" => "runArgumantModal",
    "title" => "Run Argument",
    "notSized" => "true"
])
<pre id="runArgumantContent"
    style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"
></pre>
@endcomponent

@include("taskmanager.scripts")
