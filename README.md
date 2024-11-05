# Tracking application
This a codeIgniter 4 application to track clicks on websites


# How to
1. Insert Application object in the Tracking app, where code='SAMPLE'

<script src="https://jc-apps.fr/Tracking/Client/JsCode/index/SAMPLE"></script>



# Add SQL queries in log

Edit the file 'app/Config/Events.php' and add these lines at the end of the file:
Events::on("DBQuery", static function (\CodeIgniter\Database\Query $query) {

    // Add your SQL query logging logic here. I.e:
    log_message("debug", $query->getQuery());

});