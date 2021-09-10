<script>
    function taskManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetFileLocation(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetServisStat(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("service", $(node).find("#service").html())
        request("{{ API('get_service_stat') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#serviceStatModal").modal("show");
            $("#serviceStatContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsKillPid(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('kill_pid') }}", data, function (response) {
            // Başarılıysa
            Swal.close();
            showSwal("Başarıyla sonlandırıldı.", "success", 2000);
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    
    function jsKillAll(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("command", $(node).find("#command").html())
        request("{{ API('kill_all') }}", data, function (response) {
            // Başarılıysa
            Swal.close();
            showSwal("Başarıyla sonlandırıldı.", "success", 2000);
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsProcessTree(node)
    {
         showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('process_tree') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#processTreeModal").modal("show");
            $("#processTreeContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    } 
    
    function jsRunArgumants(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('run_argumant') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#runArgumantModal").modal("show");
            $("#runArgumantContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

</script>