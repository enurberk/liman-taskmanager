<script>
    function fileManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('file_list') }}", data, function (response) {
            // Başarılıysa
            $("#file_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsDeleteFile(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("fileName", $(node).find("#fileName").html())
        request("{{ API('delete_file') }}", data, function (response) {
            // Başarılıysa
            Swal.close();
            showSwal("Başarıyla sonlandırıldı.", "success", 2000);
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }


</script>