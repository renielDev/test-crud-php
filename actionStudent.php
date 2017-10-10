<?php
    require('app/Students.php');
    use App\Students;

    $student = new Students();

    if (! empty($_POST)) {

        // add
        if (!in_array($_POST['_method'], ['PUT', 'DELETE'])) {
            $student->add($_POST);
        }

        // update
        if ($_POST['_method'] === 'PUT') {
            $student->update($_POST);
        }

        // delete
        if ($_POST['_method'] === 'DELETE') {
            $student->delete($_POST['id']);
        }

    }

    header('location: /dashboard.php');
