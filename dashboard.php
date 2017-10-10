<?php
    require('app/Students.php');
    use App\Students;

    $student = new Students();
    $data = $student->getList($_GET['filter']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script type="text/javascript" src="resource/script/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="resource/script/custom.js"></script>
    </head>
    <body>
        <form class="" action="/dashboard.php" method="get">
            <input type="text" name="filter" value="<?php echo $_GET['filter']; ?>">
            <button type="submit">Search</button>
        </form>
        <form class="frmStudent" action="/actionStudent.php" method="post">
            <input type="hidden" name="_method" value="">
            <input type="hidden" name="id" value="">
            <input type="text" name="email" value="">
            <input type="text" name="first_name" value="">
            <input type="text" name="last_name" value="">
            <input type="text" name="contact" value="">
            <button type="submit" name="button">Save</button>
            <button type="reset" name="button" class="eFormReset">Reset</button>
        </form>

        <ul>
            <?php
                while ($row = $data->fetch_assoc()) {
            ?>
            <li
                data-email="<?php echo $row['email']; ?>"
                data-firstname="<?php echo $row['first_name']; ?>"
                data-lastname="<?php echo $row['last_name']; ?>"
                data-contact="<?php echo $row['contact']; ?>"
            ><?php echo $row['email']; ?> - <?php echo $row['first_name']; ?> -
            <?php echo $row['last_name']; ?> - <?php echo $row['contact']; ?>
                <button data-id="<?php echo $row['id']; ?>" class="eBtnEdit">edit</button>
                <button data-id="<?php echo $row['id']; ?>" class="eBtnDelete">delete</button>
            <?php } ?>
            </li>
        </ul>
    </body>
</html>
