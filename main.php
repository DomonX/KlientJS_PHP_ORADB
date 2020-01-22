<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <button id="createSequence" type="button" class="btn btn-primary">Create Sequence</button>
        <button id="dropSequence" type="button" class="btn btn-primary">Drop Sequences</button>
        <button id="createTable" type="button" class="btn btn-primary">Create Tables</button>
        <button id="dropTable" type="button" class="btn btn-primary">Drop Tables</button>
        <button id="insertAll" type="button" class="btn btn-primary">Insert All</button>
        <button id="deleteAll" type="button" class="btn btn-primary">Delete All</button>
        <button id="selectZasoby" type="button" class="btn btn-primary">Select Zasoby</button>
        <br>
        TableName: <input class="form-control" id="tableName" type="text"></input>
        <div id="selectResult"> </div>
        <div id="toast" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
            <div  class="toast" style="position: absolute; top: 0; right: 0;">
                <div class="toast-header">
                <strong class="mr-auto">Wynik żądania</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div id="requestsResults" class="toast-body"></div>
            </div>
        </div>
    </body>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="js/sendToBackend.js"></script>
    <script>
        $("#createSequence").click(function() {
            sendToEndpoint("php/endpoints/runQueryFromFile.php?filename=sequence");
        })
        $("#dropSequence").click(function() {
            sendToEndpoint("php/endpoints/runQueryFromFile.php?filename=dropSequence");
        })
        $("#createTable").click(function() {
            sendToEndpoint("php/endpoints/runQueryFromFile.php?filename=createTable");
        })
        $("#dropTable").click(function() {
            sendToEndpoint("php/endpoints/runQueryFromFile.php?filename=droptable");
        })
        $("#insertAll").click(function() {
            sendToEndpoint("php/endpoints/runQueryFromFile.php?filename=insert");
        })
        $("#deleteAll").click(function() {
            sendToEndpoint("php/endpoints/runQueryFromFile.php?filename=delete");
        })
        $("#selectZasoby").click(function() {
            var tableN = $("#tableName").val();
            sendToEndpoint("selectZasoby.php?tableName=" + tableN);
        })
    </script>
</html>
