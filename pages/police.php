<?php
require '../db/koneksi.php';

// Mulai session
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: ../auth/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Response Unit</title>
    <link rel="stylesheet" href="../css/core.css">
    <link rel="stylesheet" href="../css/customCSS.css">
</head>

<body>
    <div class="sidebar">
        <ul>
            <a href="../index">
                <div class="hover">
                    <li>Home</li>
                </div>
            </a>
            <a href="ambulance">
                <div class="hover">
                    <li>Ambulance</li>
                </div>
            </a>
            <a href="police">
                <div class="hover selected">
                    <li>Police</li>
                </div>
            </a>
            <a href="firefighter">
                <div class="hover">
                    <li>Firefighter</li>
                </div>
            </a>
            <a href="../auth/logout.php">
                <div class="hover">
                    <li>Log Out</li>
                </div>
            </a>
        </ul>
    </div>

    <div class="card">
        <h5 class="card-header">Police Unit Response</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Users</th>
                        <th>Address</th>
                        <th>Situation</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <?php
                        $query = "SELECT request_unit.*, users.name AS nama_pengguna
                        FROM request_unit
                        INNER JOIN users ON request_unit.user_id = users.user_id
                        WHERE request_unit.unit = 'Police'";

                        $result = mysqli_query($koneksi, $query);
                        if ($result) {
                            // Menampilkan data
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <td>
                                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>
                                        <?php echo $row['nama_pengguna']; ?>
                                    </strong>
                                </td>
                                <td>
                                    <?php echo $row['address']; ?>
                                </td>
                                <td>
                                    <?php echo $row['situation']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row['status'] == "Scheduled") {
                                        ?>
                                        <span class="badge bg-label-info me-1">Scheduled</span>
                                        <?php
                                    } elseif ($row['status'] == "Completed") {
                                        ?>
                                        <span class="badge bg-label-success me-1">Completed</span>
                                        <?php
                                    } elseif ($row['status'] == "Pending") {
                                        ?>
                                        <span class="badge bg-label-warning me-1">Pending</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                        } else {
                            // Menampilkan pesan jika terjadi kesalahan dalam eksekusi query
                            echo "Error: " . mysqli_error($koneksi);
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>