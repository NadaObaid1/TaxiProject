<?php
require_once("Class.Database.php");
class Tools
{
    static function cleanData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    static function printSuccess($message)
    {
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'success...',
                text: '<?php echo $message; ?>',
                footer: "Success-Yah"
            })
        </script>
    <?php
    }

    static function printError($message)
    {
    ?><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Fail...',
                text: '<?php echo $message; ?>',
                footer: "Please Try again"
            })
        </script>
<?php
    }
}
