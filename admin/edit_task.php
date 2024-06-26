<?php
include ('../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_task'])) {
        $task_id = $_POST['task_id'];
        $new_status = $_POST['status'];
        $new_description = $_POST['description'];
        $new_location = $_POST['location'];
        $new_start_date = $_POST['start_date'];
        $new_end_date = $_POST['end_date'];

        if (!empty($task_id) && !empty($new_status) && !empty($new_description) && !empty($new_location) && !empty($new_start_date) && !empty($new_end_date)) {
            $task_id = mysqli_real_escape_string($con, $task_id);
            $new_status = mysqli_real_escape_string($con, $new_status);
            $new_description = mysqli_real_escape_string($con, $new_description);
            $new_location = mysqli_real_escape_string($con, $new_location);



            $query = "UPDATE tasks SET status = '$new_status', description = '$new_description', location = '$new_location', start_date = '$new_start_date', end_date = '$new_end_date' WHERE tid = '$task_id'";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo '<script>alert("Task updated successfully.");</script>';
                echo '<script>window.location.href="admin_dashboard.php";</script>';
            } else {
                echo '<script>alert("Failed to update task.");</script>';
                echo '<script>window.location.href="admin_dashboard.php";</script>';
            }
        } else {
            echo '<script>alert("Invalid task ID or fields are empty.");</script>';
            echo '<script>window.location.href="admin_dashboard.php";</script>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMS | Admin Dashboard</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../includes/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#create_task").click(function () {
                $("#right-sidebar").load("./create_task.php");
            });
        });
        $(document).ready(function () {
            $("#manage_task").click(function () {
                $("#right-sidebar").load("./manage_task.php");
            });
        });
        $(document).ready(function () {
            $("#manage_technicians").click(function () {
                $("#right-sidebar").load("./manage_technicians.php");
            });
        });
    </script>
</head>

<body>
    <div id="header" class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>OMS | Admin</h3>
            </div>
        </div>
    </div>
    <div class="sidebar-container">
        <div class="col-md-2" id="left-sidebar">
            <table class="table">
                <tr>
                    <td><a href="admin_dashboard.php" type="button">Dashboard</a></td>
                </tr>
                <tr>
                    <td><a href="add_technician.php" type="button">Ajouter un technicien</a></td>
                </tr>
                <tr>
                    <td><a href="manage_technician.php" type="button">Gérer les techniciens</a></td>
                </tr>
                <tr>
                    <td><a type="button" id="create_task">Créer tâche</a></td>
                </tr>
                <tr>
                    <td><a type="button" id="manage_task">Gérer tâches</a></td>
                </tr>
                <tr>
                    <td><a type="button" href="statistics.php">Statistiques tâches</a></td>
                </tr>
                <tr>
                    <td><a href="reports.php" type="button" id="reports">Rapports</a></td>
                </tr>
                <tr>
                    <td><a href="../logout.php" type="button" id="logout_link">Se déconnecter</a></td>
                </tr>
            </table>
        </div>
        <div id="right-sidebar">
            <div class="row">
                <div class="col-md-4 m-auto">
                    <h3><i class="fa fa-solid fa-list"></i> Modifier la tâche</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="task_id" value="<?php echo $_GET['id']; ?>">

                        <?php
                        include ('../includes/connection.php');
                        $task_id = $_GET['id'];
                        $query = "SELECT * FROM tasks WHERE tid = '$task_id'";
                        $result = mysqli_query($con, $query);
                        $task = mysqli_fetch_assoc($result);
                        ?>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"
                                required><?php echo htmlspecialchars($task['description']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Date de début</label>
                            <input type="date" name="start_date" class="form-control"
                                value="<?php echo $task['start_date']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Date de fin</label>
                            <input type="date" name="end_date" class="form-control"
                                value="<?php echo $task['end_date']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="<?php echo $task['status']; ?>">--Sélectionner--</option>
                                <option value="En attente">En attente</option>
                                <option value="En cours">En cours</option>
                                <option value="Terminé">Terminée</option>
                                <option value="Annulé">Annulée</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Localisation</label>
                            <input type="text" name="location" class="form-control"
                                value="<?php echo htmlspecialchars($task['location']); ?>" required>
                        </div>

                        <input type="submit" class="btn btn-warning" name="update_task" value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>