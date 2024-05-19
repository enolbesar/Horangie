<?php
// Database configuration
$servername = "localhost"; // Change as needed
$username = "root"; // Change as needed
$password = ""; // Change as needed
$dbname = "nodemcu_rfidrc522_mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update user data if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $sql = "UPDATE table_nodemcu_rfidrc522_mysql SET name=?, gender=?, email=?, mobile=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $gender, $email, $mobile, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }

    $stmt->close();
}

// Delete user data if delete is requested
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM table_nodemcu_rfidrc522_mysql WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }

    $stmt->close();
}

// Fetch user data from the database
$sql = "SELECT name, id, gender, email, mobile FROM table_nodemcu_rfidrc522_mysql"; // Adjust the table name and column names as needed
$result = $conn->query($sql);

// Close the connection after fetching data
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Horangie User Data</title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/0eea203261.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/threshold.js"></script>
  <script src="../js/cekdata.js"></script>
  <script src="../js/handleStatus.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <?php include('template/nav.php'); ?>
  
  <main class="main-content position-relative border-radius-lg">
    <?php
    $page_title = "User Data";
    include('template/header.php');
    ?>

    <!-- ===== -->
    <!-- Table -->
    <!-- ===== -->
    <div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center border-3 mb-0 text-center">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile Number</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php if ($result->num_rows > 0) : ?>
                      <?php while($row = $result->fetch_assoc()) : ?>
                        <tr class="text-xs font-weight-bold mb-0">
                          <td><?php echo htmlspecialchars($row['name']); ?></td>
                          <td><?php echo htmlspecialchars($row['id']); ?></td>
                          <td><?php echo htmlspecialchars($row['gender']); ?></td>
                          <td><?php echo htmlspecialchars($row['email']); ?></td>
                          <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                          <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-gender="<?php echo $row['gender']; ?>" data-email="<?php echo $row['email']; ?>" data-mobile="<?php echo $row['mobile']; ?>">Edit</button>
                            <form method="POST" action="userData.php" style="display:inline;">
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                            </form>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    <?php else : ?>
                      <tr>
                        <td colspan="6">No data found</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editUserForm" method="POST" action="userData.php">
              <div class="mb-3">
                <label for="editName" class="form-label">Name</label>
                <input type="text" class="form-control" id="editName" name="name" required>
              </div>
              <div class="mb-3">
                <label for="editId" class="form-label">ID</label>
                <input type="text" class="form-control" id="editId" name="id" readonly>
              </div>
              <div class="mb-3">
                <label for="editGender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="editGender" name="gender" required>
              </div>
              <div class="mb-3">
                <label for="editEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="editEmail" name="email" required>
              </div>
              <div class="mb-3">
                <label for="editMobile" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="editMobile" name="mobile" required>
              </div>
              <button type="submit" name="update" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include('template/footer.php'); ?>

  </main>
  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    // Populate modal with user data for editing
    var editUserModal = document.getElementById('editUserModal');
    editUserModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var id = button.getAttribute('data-id');
      var name = button.getAttribute('data-name');
      var gender = button.getAttribute('data-gender');
      var email = button.getAttribute('data-email');
      var mobile = button.getAttribute('data-mobile');

      var modalTitle = editUserModal.querySelector('.modal-title');
      var modalBodyInputName = editUserModal.querySelector('.modal-body #editName');
      var modalBodyInputId = editUserModal.querySelector('.modal-body #editId');
      var modalBodyInputGender = editUserModal.querySelector('.modal-body #editGender');
      var modalBodyInputEmail = editUserModal.querySelector('.modal-body #editEmail');
      var modalBodyInputMobile = editUserModal.querySelector('.modal-body #editMobile');

      modalTitle.textContent = 'Edit User: ' + name;
      modalBodyInputName.value = name;
      modalBodyInputId.value = id;
      modalBodyInputGender.value = gender;
      modalBodyInputEmail.value = email;
      modalBodyInputMobile.value = mobile;
    });
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
